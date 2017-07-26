## Encapsulation (캡슐화)

- Tell, don't ask
- Law of Demeter
- Command and query separation

### 설치 및 실행

저장소 복제 후에..

```sql
~/encapsulation $ composer install
~/encapsulation $ vendor/bin/phpunit
```

### 1. Bad Implementation

```php
<?php // encapsulation/src/Bad/Paperboy.php

class Paperboy
{
    public function collectMonthlySubscriptionFee(
        NewspaperSubscriber $subscriber, int $monthlySubscriptionFee = 20
    ): NewspaperSubscriber {
        // 이 코드에서는 Paperboy가 Subscriber에게 아래와 같이 신문 요금을 받아가는 격입니다.
        // Paperboy: "고객님 지갑 줘 보세요~"
        $subscriberWallet = $subscriber->getWallet();

        // Paperboy: '지갑에 신문값을 지불할 돈이 있나?'
        if ($subscriberWallet->getBalance() >= $monthlySubscriptionFee) {
            $subscriber->setWallet(
                // Paperboy: "신문값을 낼 돈은 있네요.", "신문 값을 가져가겠습니다~"
                $subscriber->getWallet()->moneyOut($monthlySubscriptionFee)
            );

            $this->setWallet(
                // Paperboy: '받은 신문값은 내 지갑에 넣어야지.'
                $this->getWallet()->moneyIn($monthlySubscriptionFee)
            );
        }

        // 신문값을 낼 돈이 충본이 있는지를 판단하는 것은 NewspaperSubscriber의 책임인데,
        // Paperby가 getter로 NewspaperSubscriber의 상태를 쿼리하고,
        // setter를 이용해서 NewspaperSubscriber의 상태를 변경하고 있습니다.
        // 즉, wallet이란 데이터에 의존하는 절차지향적인 코드입니다.
        return $subscriber;
    }
}
```

### 2. Good Implementation

```php
<?php // encapsulation/src/Good/Paperboy.php

class Paperboy
{
    public function collectMonthlySubscriptionFee(
        NewspaperSubscriber $subscriber, int $monthlySubscriptionFee = 20
    ): NewspaperSubscriber {
        // 이 구현에서는 Paperboy는 NewspaperSubscriber의 상태를 쿼리하지 않습니다.
        
        try {
            // Paperboy: 고객님 신문값 20원 주세요.
            $subscriber->getMonthlySubscriptionFee($monthlySubscriptionFee);
            // Paperboy: '받은 신문값은 내 지갑에 넣어야지.'
            $this->earnMoney($monthlySubscriptionFee);
        } catch (NotEnoughMoneyException $e) {
            // NewspaperSubscriber에게 신문값 20원이 없습니다.
            // Handle exception & Rethrow exception
            throw $e;
        }

        // 디자인 원칙을 지킨 코드입니다.
        return $subscriber;
    }
}
```

적나라하게 말하면, 이런 겁니다.

> 왜 지 것도 아닌데, 지가 판단하고, 남한테 감나라 배나라 명령하고 지랄이야~

두 번째 구현에서는 `Paperbody`가 `getMonthlySubscriptionFee(int $monthlySubscriptionFee): void`라는 인터페이스만 의존합니다. `NewspaperSubscriber`는 함수 내부의 구현을 잘 숨기고(==캡슐화) 있습니다. 함수 내부에서 어떻게 작동하는지 `Paperbody` 전혀 알 필요가 없이, 정수를 인자를 넘기면 `void`를 응답 받는다는 시그니처(==Public Interface)에 의존해서 코드를 적성하게 됩니다(**`주`** 시그니처에서 예외를 알 수 없는 것을 PHP의 한계). `NewspaperSubscriber::getMonthlySubscriptionFee()`의 시그니처가 변경되지 않는다면, `NewspaperSubscriber` 클래스의 변경으로 인해 `Paperbody` 클래스를 변경할 필요는 없습니다.

결국 두 클래스간의 결합도는 낮추고, 각 클래스의 책임을 각자에게 캡슐화해서 응집시킨 것입니다.
## TDD Kata

TDD 연습 프로젝트 입니다.

- [1. Prime Number](#1-prime-number)
- [2. Prime Factor](#2-prime-factor)

### 1. Prime Number

- 소수(素數, Prime Number): 1과 자기 자신으로만 나눌 수 있는 1을 제외한 자연수

> *에라토스테네스의 체 [Youtube](https://www.youtube.com/watch?v=fdTzyaDPhdo?t=15m41s)[나무위키](https://namu.wiki/w/소인수분해)*
>
> 3개 이상의 소수로 구성된 합성수는 그 수의 제곱근보다 작거나 같은 약수를 갖는다.
> 
> n을 합성수라 하자. 그러면 n = a * b, 1 < a,b < n이다. 만약 a, b가 둘 다 sqrt(n)보다 크다면, (n = sqrt(n) * sqrt(n)) < (a * b = n)이 되어 모순이다. 따라서 a, b중 적어도 하나는 sqrt(n)보다 작다.
> 
> e.g. 187을 합성수라 하자. 그러면 187 = 11 * 17, 1 < 11, 17 < 187이다. 만약 11, 17 둘 다 sqrt(187) = 13.67 보다 크다면, (187 = sqrt(187) * sqrt(187)) < (11 * 17 = 187)이 되어 모순이다. 따라서, 11, 17중 적어도 하나는 sqrt(187) = 13.67보다 작다.

- [합성수(合成數, Composite Number)](https://namu.wiki/w/합성수): 여러 소수(素數)들이 곱셈으로 합쳐져서 이루어진 수를 말한다. 즉 임의의 자연수 n에 대해 1과 자기 자신을 제외한 다른 약수가 존재할 때, 이 수를 합성수라고 한다.

#### 1.1. 목표

- 매개변수로 주어진 자연수 `n`이 소수인지를 판별하여 `bool`을 응답하는 함수를 개발한다.
- "테스트 코드가 구체화될수록 프로덕션 코드는 더 일반화된다"라는 가치를 체감한다.

#### 1.2. 셋업

[[commit](https://github.com/appkr/pattern/commit/39f7dbba65bce31eae0a5584b71d6be598a6fc68)]

최초 한번 셋팅 후에는 단축키(저의 IDE에서는 <kbd>ctrl</kbd>+<kbd>r</kbd>)로 테스트를 실행할 수 있습니다.

![](docs/01_tdd_setup.png)

#### 1.3. 첫 실패

[[commit](https://github.com/appkr/pattern/commit/bd79f24ce16662ce6668165dc579f1a3265f21d1)]

아래 코드에서 4는 소수가 아닌데, 소수라고 `true`를 잘못 반환합니다.

```php
class PrimeNumber
{
    public function isPrime($n)
    {
        return true;
    }
}
```

```php
class PrimeNumberTest extends TestCase
    function testIsPrime()
    {
        $c = new PrimeNumber();

        assertTrue($c->isPrime(2));
        assertTrue($c->isPrime(3));
        assertFalse($c->isPrime(4));
    }
}
```

#### 1.4. 최소의 노력으로 그린 만들기

[[commit](https://github.com/appkr/pattern/commit/a8732c829b534cab266e2c71c47c5e29e60e8986)]

2와 3은 소수으므로 `true`를 바로 반환하고, 4는 2*2로 소인수 분해할 수 있으므로, 2로 나누어 나머지가 0이면 `false`를 반환하도록 수정했습니다.

```php
class PrimeNumber
{
    public function isPrime($n)
    {
        if ($n == 2) {
            return true;
        }
        if ($n == 3) {
            return true;
        }
        if ($n % 2 == 0) {
            return false;
        }
    
        return true;
    }
}
```

#### 1.5. 두번째 실패

[[commit](https://github.com/appkr/pattern/commit/d924a2f43a27f018c468826d7a9c7fb96e4b2120)]

9는 소수가 아닌데, 우리의 알고리즘은 소수라고 판단합니다. 왜냐하면, 아래에서 어떤 조건문도 타지 않기 때문입니다.

```php
class PrimeNumber
{
    public function isPrime(9)
    {
        if (9 == 2) { // false
            return true;
        }
        if (9 == 3) { // false
            return true;
        }
        if (9 % 2 == 0) { // false
            return false;
        }
    
        return true;
    }
}
``` 

역시 최소의 노력으로 그린을 만듭니다. 9는 3*3으로 소인수 분해할 수 있으므로, 3로 나누어 나머지가 0이면 `false`를 반환하도록 수정했습니다. 이제 9 % 3 == 0 평가식이 `true`가 되어, 9는 소수가 아니라고 정상적으로 판단합니다.

```php
class PrimeNumber
{
    public function isPrime($n)
    {
        // ...
        if ($n % 3 == 0) {
            return false;
        }
    
        return true;
    }
}
```

#### 1.6. 알고리즘 일반화 리팩토링

[[commit](https://github.com/appkr/pattern/commit/0c9c1460a36cb4185099ed6019779483c6918fe0)]

소수의 정의에 따르면, 자연수 n을 2부터 나누기 시작해서 n-1까지 나누어 봤을 때, 나머지가 0으로 떨어지지 않으면 소수라고 할 수 있습니다. 그대로 구현해봤습니다.

```diff
 class PrimeNumber
     public function isPrime($n)
     {
         // ...
-        if ($n % 2 == 0) {
-            return false;
-        }
-        if ($n % 3 == 0) {
-            return false;
-        }
+        for ($i = 2; $i < $n; $i++) {
+            if ($n % $i == 0) {
+                return false;
+            }
+        }

         return true;
 }
```

함수에 10을 넣어 볼까요? $i = 2일 때 10 % 2 == 0 평가식이 `true`가 되어 소수가 아니라고 판단합니다. 

반면, 함수에 11을 넣어 볼까요? 2부터 10까지 총 9번의 루프를 돌았지만, 11을 나눌수 없었습니다. 즉 11은 소수입니다.

```php
class PrimeNumber
    public function isPrime(11)
    {
        if (11 == 2) { // false
            return true;
        }
        if (11 == 3) { // false
            return true;
        }        
        for ($i = 2; $i < 11; $i++) {
            if (11 % $i == 0) { // ($i=2, false), ($i=3, false), ..., ($i=10, false)
                return false;
            }
        }

        return true;
}
```

#### 1.7. 더 많은 수

[[commit](https://github.com/appkr/pattern/commit/b7ebe6729bfefbe9040087e98c06f657e17417d7)]

1,000까지 소수 목록을 찾아서 상수로 선언하고, 알고리즘이 잘 작동하는지 확인해봤습니다.

```php
class PrimeNumberTest extends TestCase
{
    const PRIMES = [11, 13, ..., 991, 997];
    
    function testIsPrime()
    {
        $c = new PrimeNumber();
        // ...
        assertFalse($c->isPrime(10));

        foreach (self::PRIMES as $prime) {
            assertTrue($c->isPrime($prime));
        }

        $nonPrimes = array_diff(range(10, 1000), self::PRIMES);

        foreach ($nonPrimes as $nonPrime) {
            assertFalse($c->isPrime($nonPrime));
        }
    }
}
```

#### 1.8. 성능 개선 리팩토링

[[commit](https://github.com/appkr/pattern/commit/79ce4eef18aca0d3578baa3f7e8a0a238b223a88)]

1.6의 알고리즘에서는 자연수 n이 소수인지 판단하기 위해서는 n-2번의 루프가 필요했습니다. 가령 검사하려는 수가 11이라면, 2부터 10까지 전부 나눠봐야하므로 9번의 루프가 발생했습니다. 즉, 시간복잡도는 `O(n-2)` 입니다.

웹에서 `에라토스테네스의 체`라는 알고리즘을 배우고 적용했습니다. 이 알고리즘 적용으로 시간복잡도는 `O((n-2)^1/2)`로 최적화되었습니다. 가령 위에서 살펴본 11의 제곱근은 3.32 이므로, ($i = 2, 11 % 2 != 0), ($i = 3, 11 % 3 != 0) 총 두번만 루프를 돌게됩니다.

```diff
 class PrimeNumber
-        for ($i = 2; $i < $n; $i++) {
+        for ($i = 2; $i <= sqrt($n); $i++) {
```

### 2. Prime Factor

#### 2.1. 목표

- 매개변수로 주어진 자연수 `n`을 소수로 약분하여, n을 구성하는 소수의 집합을 반환하는 함수를 개발한다.

TBD

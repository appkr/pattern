<?php

namespace Basic\Dependency;

use DateTime;
use DateTimeZone;

class Order
{
    private $customerId;
    private $orderId;
    private $orderedAt;

    public function __construct(Customer $customer)
    {
        $this->customerId = $customer->getCustomerId();
        $this->orderId = uniqid();
        $this->orderedAt = new DateTime(
            'now', new DateTimeZone('Asia/Seoul')
        );
    }

    public function getCustomerId()
    {
        // Customer를 직접 참조하면, Order에서 Customer의 상태를 변경할 가능성이 있다.
        //   e.g. $this->customer->somePublicFunctionThatChangesStateOfCustomer();
        //
        // 이는 디자인 원칙에 어긋나므로, customerId를 이용해서 둘 간의 관계만 연결하고,
        // Order와 Customer의 상태를 변경해야 할 때는 서비스 레이어에서 리포지토리를 통해서
        // 조회한 후 원하는 동작을 하는 것이 더 나은 디자인이다.
        //
        // 반면, Order[]를 처리한다면 Customer를 조회하기 위해 N+1 문제가 발생할 수 있다.
        // 상태를 변경하는 동작이 아니라면, 리포지터리에 읽기 전용 조회 메서드를 만드는 것이 좋다.
        return $this->customerId;
    }

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function getOrderedAt()
    {
        return $this->orderedAt;
    }
}

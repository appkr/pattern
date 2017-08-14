<?php

namespace Basic\Dependency;

use Ramsey\Uuid\Uuid;

class Customer
{
    private $customerId;
    private $customerName;

    public function __construct(string $customerName)
    {
        $this->customerId = Uuid::uuid4();
        $this->customerName = $customerName;
    }

    public function getCustomerId()
    {
        return $this->customerId;
    }

    public function getCustomerName()
    {
        return $this->customerName;
    }
}
<?php

namespace Basic\Dependency;

class Customer
{
    private $customerId;
    private $customerName;

    public function __construct(string $customerName)
    {
        $this->customerId = uniqid();
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

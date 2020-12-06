<?php

namespace Basic\Composition\Common;

use DateTime;

class Package
{
    private $id;
    private $deliveryStatus; // RECEIVED, PICKED_UP, DELIVERED
    private $originAddress;
    private $destAddress;
    private $approxPrice;
    private $size;
    private $weight;
    private $shouldBePickedUpBy;

    public function __construct(
        string $id, string $originAddress, string $destAddress,
        int $approxPrice, int $size, int $weight, DateTime $shouldBePickedUpBy
    ) {
        $this->id = $id;
        $this->deliveryStatus = 'RECEIVED';
        $this->originAddress = $originAddress;
        $this->destAddress = $destAddress;
        $this->approxPrice = $approxPrice;
        $this->size = $size;
        $this->weight = $weight;
        $this->shouldBePickedUpBy = $shouldBePickedUpBy;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getDeliveryStatus(): string
    {
        return $this->deliveryStatus;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function updateDeliveryStatus(string $deliveryStatus): void
    {
        $this->deliveryStatus = $deliveryStatus;
    }

    public function isActive(): bool
    {
        return in_array($this->deliveryStatus, ['RECEIVED', 'PICKED_UP']);
    }
}
<?php

namespace Good;

use Common\Agent;
use Common\DeliveryManager;
use Common\Manager;
use Common\Package;
use Common\PackageNotFoundException;
use Common\UnableToLoadPackageException;
use Illuminate\Support\Collection;

class DeliveryAgent implements Agent
{
    private $id;
    private $manager;
    private $bucketSize;
    private $maxLoadWeight;
    private $bucket;

    public function __construct(
        string $id, DeliveryManager $manager, int $bucketSize, int $maxLoadWeight
    ) {
        $this->id = $id;
        $this->manager = $manager;
        $this->bucketSize = $bucketSize;
        $this->maxLoadWeight = $maxLoadWeight;
        $this->bucket = new Collection;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function noOfActiveDeliveries()
    {
        return $this->bucket->filter(function (Package $package) {
            return $package->isActive();
        })->count();
    }

    public function receive(Package $package): void
    {
        if (! $this->canReceive($package)) {
            throw new UnableToLoadPackageException('적재할 수 있는 총량을 초과합니다.');
        }

        $package->updateDeliveryStatus('RECEIVED');
        $this->bucket->push($package);
        $this->manager->reportPackageDeliveryStatus($package);
    }

    public function pickedUp(Package $package): void
    {
        $package->updateDeliveryStatus('PICKED_UP');
        $this->manager->reportPackageDeliveryStatus($package);
    }

    public function delivered(Package $package): void
    {
        $key = $this->bucket->search(function (Package $incumbent) use ($package) {
            return $incumbent->getId() == $package->getId();
        });

        if ($key === false) {
            throw new PackageNotFoundException('패키지를 찾을 수 없습니다.');
        }

        $package->updateDeliveryStatus('DELIVERED');
        $this->manager->reportPackageDeliveryStatus($package);
        $this->bucket->pull($key);
    }

    public function canReceive(Package $package): bool
    {
        $test1 = $package->getSize() + $this->getCurrentLoadSize() <= $this->bucketSize;
        $test2 = $package->getWeight() + $this->getCurrentLoadWeight() <= $this->maxLoadWeight;

        return $test1 && $test2;
    }

    private function getCurrentLoadSize()
    {
        return $this->bucket->reduce(function (int $carry, Package $package) {
            return $package->isActive()
                ? $carry + $package->getSize()
                : $carry;
        }, 0);
    }

    private function getCurrentLoadWeight()
    {
        return $this->bucket->reduce(function (int $carry, Package $package) {
            return $package->isActive()
                ? $carry + $package->getWeight()
                : $carry;
        }, 0);
    }
}
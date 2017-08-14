<?php

namespace Basic\Composition\Test;

use Basic\Composition\Good\DeliveryAgent;
use Basic\Composition\Common\DeliveryManager;
use Basic\Composition\Common\Package;
use Basic\Composition\Common\UnableToLoadPackageException;
use DateInterval;
use DateTime;
use PHPUnit\Framework\TestCase;

/**
 * @property DeliveryManager $deliveryManager
 * @property DeliveryAgent $deliveryAgent
 * @property Package $package1
 * @property Package $package2
 */
class GoodAgentTest extends TestCase
{
    public function setUp()
    {
        $this->deliveryManager = new DeliveryManager;

        $this->deliveryAgent = new DeliveryAgent(
            $id = 'agent_'.uniqid(), $this->deliveryManager,
            $bucketSize = 10, $maxLoadWeight = 10
        );

        $shouldBePickedUpBy = (new DateTime())->add(new DateInterval('PT1H'));
        $this->package1 = new Package(
            $id = 'package_'.uniqid(), $originAddress = 'Foo 123', $destAddress = 'Bar 456',
            $approxPrice = 10, $size = 5, $weight = 5, $shouldBePickedUpBy
        );
        $this->package2 = new Package(
            $id = 'package_'.uniqid(), $originAddress = 'Baz 789', $destAddress = 'Qux 000',
            $approxPrice = 20, $size = 10, $weight = 10, $shouldBePickedUpBy
        );

        $this->printSeparator(__FUNCTION__);
        $this->deliveryManager->hireAgent($this->deliveryAgent);
        $this->deliveryManager->receiveDeliveryRequestFor($this->package1);
        $this->deliveryManager->receiveDeliveryRequestFor($this->package2);
    }

    /** @test */
    public function a_manager_runs_delivery_business()
    {
        $this->printSeparator(__FUNCTION__);
        $this->deliveryManager->assignDeliveryJobTo($this->deliveryAgent, $this->package1);
        $this->assertEquals(1, $this->deliveryAgent->noOfActiveDeliveries());
        $this->assertEquals('RECEIVED', $this->package1->getDeliveryStatus());

        $this->deliveryAgent->pickedUp($this->package1);
        $this->assertEquals('PICKED_UP', $this->package1->getDeliveryStatus());

        $this->deliveryAgent->delivered($this->package1);
        $this->assertEquals(0, $this->deliveryAgent->noOfActiveDeliveries());
        $this->assertEquals('DELIVERED', $this->package1->getDeliveryStatus());
    }

    /** @test */
    public function an_agent_has_its_delivery_capacity()
    {
        $this->printSeparator(__FUNCTION__);
        $this->deliveryManager->assignDeliveryJobTo($this->deliveryAgent, $this->package1);

        $this->expectException(UnableToLoadPackageException::class);
        $this->deliveryManager->assignDeliveryJobTo($this->deliveryAgent, $this->package2);
    }

    private function printSeparator(string $calledFunction = null)
    {
        $noOfRepeat = (80 - strlen($calledFunction)) > 0
            ? 80 - strlen($calledFunction) : 0;

        echo PHP_EOL;
        echo $calledFunction . str_repeat('-', $noOfRepeat);
        echo PHP_EOL;
    }
}

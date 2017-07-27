<?php

namespace Test;

use Bad\DeliveryAgent;
use Common\DeliveryManager;
use Common\Package;
use Common\UnableToLoadPackageException;
use DateInterval;
use DateTime;
use PHPUnit\Framework\TestCase;

/**
 * @property DeliveryManager $deliveryManager
 * @property DeliveryAgent $deliveryAgent
 * @property Package $package1
 * @property Package $package2
 */
class BadAgentTest extends TestCase
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
        $this->assertEquals(1, $this->deliveryAgent->count());
        $this->assertEquals('RECEIVED', $this->package1->getDeliveryStatus());

        $this->deliveryAgent->pickedUp($this->package1);
        $this->assertEquals('PICKED_UP', $this->package1->getDeliveryStatus());

        $this->deliveryAgent->delivered($this->package1);
        $this->assertEquals(0, $this->deliveryAgent->count());
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

    /** @test */
    public function an_agent_has_been_overloaded_but_the_business_still_runs()
    {
        $this->printSeparator(__FUNCTION__);
        $this->deliveryManager->assignDeliveryJobTo($this->deliveryAgent, $this->package1);

        $this->deliveryAgent->push($this->package2);

        $message =<<<EOT
원래 이곳에서 UnableToLoadPackageException이 발생해야 합니다.
 예외는 발생하지 않았습니다. 이유는 DeliveryAgent::receive() 함수를 사용하지 않고, 
 DeliveryAgent의 부모 클래스인 Collection::push() 함수를 직접 사용해서 
 배송 주문을 추가했기 때문입니다. 
 이 경우 배송 기사의 최대 적재량을 초과해서 배송을 할당하게 될 수 있습니다.
EOT;
        $this->markTestIncomplete($message);
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

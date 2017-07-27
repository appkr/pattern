<?php

namespace Common;

use DateTime;
use Exception;

class DeliveryManager
{
    public function hireAgent(Agent $agent): void
    {
        echo sprintf(
            "Manager: %s 기사를 고용했습니다.%s", $agent->getId(), PHP_EOL
        );
    }

    public function receiveDeliveryRequestFor(Package $package): void
    {
        echo sprintf(
            "Manager: %s 배송 주문을 접수했습니다.%s",
            $package->getId(), PHP_EOL
        );
    }

    public function assignDeliveryJobTo(Agent $agent, Package $package): void
    {
        echo sprintf(
            'Manager: %s 기사에게 %s 배송을 할당했습니다.%s',
            $agent->getId(), $package->getId(), PHP_EOL
        );

        try {
            $agent->receive($package);
        } catch (Exception $e) {
            echo sprintf('Agent  : %s%s', $e->getMessage(), PHP_EOL);
            throw $e;
        }
    }

    public function reportPackageDeliveryStatus(Package $package): void
    {
        echo sprintf(
            "Agent  : %s를 %s에 %s했습니다.%s",
            $package->getid(), (new DateTime())->format('Y-m-d H:i:s'),
            $package->getDeliveryStatus(), PHP_EOL
        );
    }
}
<?php

namespace Behavioral\Observer2;

use DateTime;
use DateTimeZone;

trait Presentable
{
    public function formatContent(Sensor $sensor)
    {
        $date = (new DateTime('now', new DateTimeZone('Asia/Seoul')))->format('Y-m-d H:i:s');

        if ($sensor instanceof HumiditySensor) {
            return "{$date} 현재 습도는 {$sensor->getState()}%입니다.";
        }

        return "{$date} 현재 온도는 {$sensor->getState()}°C입니다.";
    }
}
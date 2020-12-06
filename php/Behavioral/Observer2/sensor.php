<?php

use Behavioral\Observer2\{TemperatureSensor, HumiditySensor, ScreenDisplay, LogWriter};

require __DIR__ . '/../../vendor/autoload.php';

$temperatureSensor = new TemperatureSensor;
$temperatureSensor->add(new ScreenDisplay);
$temperatureSensor->add(new LogWriter('log.txt'));

$humiditySensor = new HumiditySensor;
$humiditySensor->add(new ScreenDisplay);
$humiditySensor->add(new LogWriter('log.txt'));

while (true) {
    $temperature = mt_rand(10, 20);
    $humidity = mt_rand(30, 60);

    $temperatureSensor->setState($temperature);
    $temperatureSensor->notify();

    $humiditySensor->setState($humidity);
    $humiditySensor->notify();

    echo str_repeat('-', 80), PHP_EOL;
    sleep(mt_rand(1, 5));
}

exit(0);
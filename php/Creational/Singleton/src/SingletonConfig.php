<?php

namespace Creational\Singleton;

use Illuminate\Support\Arr;

final class SingletonConfig
{
    private static $instance;
    private $config;

    private function __construct() {
        $this->config = include __DIR__."/../config.php";
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function get(string $key, $default = null)
    {
        return Arr::get($this->config, $key, $default);
    }

    private function __clone() {}

    private function __wakeup() {}
}
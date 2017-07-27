<?php

namespace Common;

interface Agent
{
    public function getId(): string;
    public function receive(Package $package): void;
    public function pickedUp(Package $package): void;
    public function delivered(Package $package): void;
    public function canReceive(Package $package): bool;
}
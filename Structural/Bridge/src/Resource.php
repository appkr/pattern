<?php

namespace Structural\Bridge;

interface Resource
{
    public function title(): string;
    public function image(): string;
    public function description(): string;
}
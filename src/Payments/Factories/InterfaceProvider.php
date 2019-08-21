<?php
declare(strict_types=1);

namespace Setapp\Test\Payments\Factories;

interface InterfaceProvider
{
    public function process(): bool;
}

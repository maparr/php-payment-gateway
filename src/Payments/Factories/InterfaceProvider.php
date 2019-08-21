<?php
declare(strict_types=1);

namespace Setapp\Test\Payments\Factories;

/**
 * Interface InterfaceProvider
 * @package Setapp\Test\Payments\Factories
 */
interface InterfaceProvider
{
    /**
     * @return bool
     */
    public function process(): bool;
}

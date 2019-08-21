<?php
declare(strict_types=1);

namespace Setapp\Test\Payments\Factories;

/**
 * Class ProviderFactory
 * @package Setapp\Test\Payments\Factories
 */
class ProviderFactory
{

    /**
     * @param string $type
     * @return InterfaceProvider
     */
    public function make(string $type): InterfaceProvider
    {
        switch ($type) {
            case DetailedProvider::type():
                return new DetailedProvider;
            case SimpleProvider::type():
                return new SimpleProvider;
            case LambdaProvider::type():
                return new LambdaProvider;
            default:
                throw new \DomainException('Instance not found');
        }
    }
}

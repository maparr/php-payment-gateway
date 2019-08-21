<?php
declare(strict_types=1);

namespace Setapp\Test\Payments\Factories;

use Setapp\Test\Payments\DTO\InvoiceDTO;

class ProviderFactory
{
    public function make(InvoiceDTO $dto): InterfaceProvider
    {
        switch ($dto->getProvider()) {
            case DetailedProvider::type():
                return (new DetailedProvider($dto));
            case SimpleProvider::type():
                return (new SimpleProvider($dto));
            case LambdaProvider::type():
                return (new LambdaProvider($dto));
            default:
                throw new \DomainException('Instance not found');
        }
    }
}

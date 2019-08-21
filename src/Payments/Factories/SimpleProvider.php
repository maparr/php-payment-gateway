<?php
declare(strict_types=1);

namespace Setapp\Test\Payments\Factories;

use Setapp\Test\Payments\DTO\InvoiceDTO;
use Setapp\Test\Payments\Providers\SimpleProvider as Provider;

class SimpleProvider implements InterfaceProvider
{
    /**
     * @var Provider
     */
    private $instance;
    /**
     * @var InvoiceDTO
     */
    private $dto;

    public function __construct(InvoiceDTO $dto)
    {
        $this->instance = new Provider();
        $this->dto = $dto;
    }

    public function process(): bool
    {
        return $this->instance->charge($this->dto->getCustomerId(), $this->dto->getAmount());
    }

    public static function type()
    {
        return Provider::NAME;
    }
}

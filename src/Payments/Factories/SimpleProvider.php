<?php
declare(strict_types=1);

namespace Setapp\Test\Payments\Factories;

use Setapp\Test\Payments\DTO\InvoiceDTO;
use Setapp\Test\Payments\Providers\SimpleProvider as Provider;

/**
 * Class SimpleProvider
 * @package Setapp\Test\Payments\Factories
 */
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

    /**
     * SimpleProvider constructor.
     * @param InvoiceDTO $dto
     */
    public function __construct(InvoiceDTO $dto)
    {
        $this->instance = new Provider();
        $this->dto = $dto;
    }

    /**
     * @return bool
     */
    public function process(): bool
    {
        return $this->instance->charge($this->dto->getCustomerId(), $this->dto->getAmount());
    }

    /**
     * @return string
     */
    public static function type()
    {
        return Provider::NAME;
    }
}

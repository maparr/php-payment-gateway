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
     * SimpleProvider constructor.
     */
    public function __construct()
    {
        $this->instance = new Provider();
    }

    /**
     * @param InvoiceDTO $dto
     * @return bool
     */
    public function process(InvoiceDTO $dto): bool
    {
        return $this->instance->charge($dto->getCustomerId(), $dto->getAmount());
    }

    /**
     * @return string
     */
    public static function type()
    {
        return Provider::NAME;
    }
}

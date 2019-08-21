<?php
declare(strict_types=1);

namespace Setapp\Test\Payments\Factories;

use Setapp\Test\Payments\DTO\InvoiceDTO;
use Setapp\Test\Payments\Providers\LambdaProvider as Provider;

/**
 * Class LambdaProvider
 * @package Setapp\Test\Payments\Factories
 */
class LambdaProvider implements InterfaceProvider
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
     * LambdaProvider constructor.
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
        $result = $this->instance->charge([
            'invoices' => [
                $this->dto->getId() => [
                    $this->dto->getCustomerId(),
                    $this->dto->getAmount()
                ],
            ]
        ]);

        return $result[$this->dto->getId()];
    }

    /**
     * @return string
     */
    public static function type()
    {
        return Provider::NAME;
    }
}

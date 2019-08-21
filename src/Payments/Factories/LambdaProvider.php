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
     * LambdaProvider constructor.
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
        $result = $this->instance->charge([
            'invoices' => [
                $dto->getId() => [
                    $dto->getCustomerId(),
                    $dto->getAmount()
                ],
            ]
        ]);

        return $result[$dto->getId()];
    }

    /**
     * @return string
     */
    public static function type()
    {
        return Provider::NAME;
    }
}

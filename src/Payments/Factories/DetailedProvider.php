<?php
declare(strict_types=1);

namespace Setapp\Test\Payments\Factories;

use Setapp\Test\Payments\DTO\InvoiceDTO;
use Setapp\Test\Payments\Providers\DetailedProvider as Provider;

/**
 * Class DetailedProvider
 * @package Setapp\Test\Payments\Factories
 */
class DetailedProvider implements InterfaceProvider
{
    /**
     * @var Provider
     */
    private $instance;

    /**
     * DetailedProvider constructor.
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
        $this->instance->schedule($dto->getCustomerId(), [
                'amount' => $dto->getAmount(),
                'request_time' => \date('Y-m-d\TH:i:sP'),
                'invoice_id' => $dto->getId()
            ]);

        return true;
    }

    /**
     * @return string
     */
    public static function type()
    {
        return Provider::NAME;
    }
}

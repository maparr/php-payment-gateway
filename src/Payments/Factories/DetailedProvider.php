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
     * @var InvoiceDTO
     */
    private $dto;

    /**
     * DetailedProvider constructor.
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
        $this->instance->schedule($this->dto->getCustomerId(), [
                'amount' => $this->dto->getAmount(),
                'request_time' => \date('Y-m-d\TH:i:sP'),
                'invoice_id' => $this->dto->getId()
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

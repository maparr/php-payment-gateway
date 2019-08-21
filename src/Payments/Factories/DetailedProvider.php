<?php
declare(strict_types=1);

namespace Setapp\Test\Payments\Factories;

use Setapp\Test\Payments\DTO\InvoiceDTO;
use Setapp\Test\Payments\Providers\DetailedProvider as Provider;
use function assert;
use function print_r;

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

    public function __construct(InvoiceDTO $dto)
    {
        $this->instance = new Provider();
        $this->dto = $dto;
    }

    public function process(): bool
    {
        $this->instance->schedule($this->dto->getCustomerId(), [
                'amount' => $this->dto->getAmount(),
                'request_time' => \date('Y-m-d\TH:i:sP'),
                'invoice_id' => $this->dto->getId()
            ]);

        return true;
    }

    public static function type()
    {
        return Provider::NAME;
    }
}

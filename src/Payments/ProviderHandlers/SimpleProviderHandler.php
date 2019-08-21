<?php
declare(strict_types=1);


namespace Setapp\Test\Payments\ProviderHandlers;

use Setapp\Test\Payments\DTO\InvoiceDTO;
use Setapp\Test\Payments\Factories\InterfaceProvider;
use Setapp\Test\Payments\Factories\SimpleProvider;

class SimpleProviderHandler extends AbstractHandler
{
    /**
     * @var InterfaceProvider
     */
    private $handler;

    public function __construct()
    {
        $this->handler = new SimpleProvider();
    }

    /**
     * @param InvoiceDTO $transaction
     * @throws \DomainException
     * @return InvoiceDTO
     */
    public function handle(InvoiceDTO $transaction): InvoiceDTO
    {
        if ($this->handler->process($transaction)) {
            return parent::handle($transaction);
        }

        throw new \DomainException('Transaction failed');
    }
}

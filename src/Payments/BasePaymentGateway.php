<?php
declare(strict_types=1);

namespace Setapp\Test\Payments;

use Setapp\Test\Core\InterfaceInvoice;
use Setapp\Test\Payments\Factories\ProviderFactory;
use Setapp\Test\Payments\DTO\InvoiceDTO;
use Setapp\Test\Tests\Payments\DummyInvoice;

class BasePaymentGateway implements InterfacePaymentGateway
{
    /**
     * @var ProviderFactory
     */
    private $factory;

    public function __construct()
    {
        $this->factory = new ProviderFactory;
    }

    /**
     * @param InterfaceInvoice[]|array $invoices
     *
     * @return boolean[] array for results [INVOICEID => RESULT, ...]
     */
    public function charge(array $invoices): array
    {
        $outer = [];

        /** @var $invoice DummyInvoice */
        foreach ($invoices as $invoice) {
            $dto = new InvoiceDTO(
                $invoice->getCustomerId(),
                $invoice->getAmount(),
                $invoice->getId(),
                $invoice->getProvider()
            );
            $outer[$dto->getId()] = $this->factory->make($dto)->process();
        }

        return $outer;
    }
}

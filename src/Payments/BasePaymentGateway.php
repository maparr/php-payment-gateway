<?php
declare(strict_types=1);

namespace Setapp\Test\Payments;

use Setapp\Test\Core\InterfaceInvoice;

class BasePaymentGateway implements InterfacePaymentGateway
{
    /**
     * @param InterfaceInvoice[]|array $invoices
     *
     * @return boolean[] array for results [INVOICEID => RESULT, ...]
     */
    public function charge(array $invoices): array
    {
        // TODO: IMPLEMENT
        return [];
    }
}

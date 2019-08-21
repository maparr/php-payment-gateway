<?php
declare(strict_types=1);

namespace Setapp\Test\Payments\Contracts;

use Setapp\Test\Tests\Payments\DummyInvoice;

/**
 * Interface InterfaceConsistencyPaymentGateway
 * @package Setapp\Test\Payments
 */
interface InterfaceConsistencyPaymentGateway
{
    /**
     * @param DummyInvoice[] $transactions
     * @return boolean
     */
    public function charge(array $transactions): bool;
}

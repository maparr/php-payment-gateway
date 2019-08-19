<?php
declare(strict_types=1);

namespace Setapp\Test\Payments\Providers;

class LambdaProvider
{
    const NAME = 'lambda';

    /**
     * @param array $data
     *
     * Expected structure:
     *  [
     *      inoices => [
     *         [
     *              INVOICEID => [CUSTOMER_ID, AMOUNT_USD],
     *         ]
     *      ]
     *  ]
     *
     * @return boolean[] array for results [INVOICEID => RESULT, ...]
     */
    public function charge(array $data): array
    {
        assert($data['invoices']);

        $result = [];
        foreach ($data['invoices'] as $invoiceId => [$customerId, $amountUSD])
        {
            $result[$invoiceId] = (bool)($customerId % 2 - 1);
        }
        return $result;
    }
}


<?php
declare(strict_types=1);

namespace Setapp\Test\Payments\Providers;

class DetailedProvider
{
    const NAME = 'detailed';

    /**
     * @param int $customerId
     * @param array $data
     * [
     *      'amount' => AMOUNT(string),
     *      'request_time' => CURRENT_TIME(string RFC3339 - Y-m-d\TH:i:sP),
     *      'invoice_id' => INVOICE_ID(string)
     * ]
     *
     * @return void
     */
    public function schedule(int $customerId, array $data): void
    {
        assert(isset($data['amount']));
        assert(isset($data['request_time']));
        assert(isset($data['invoice_id']));
    }
}


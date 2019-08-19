<?php
declare(strict_types=1);

namespace Setapp\Test\Payments\Providers;

class SimpleProvider
{
    const NAME = 'simple';

    /**
     * @param int $customerId
     * @param string $amount
     *
     * @return bool
     */
    public function charge(int $customerId, string $amount): bool
    {
        return (float)$amount > 0 && (float)$amount < 100;
    }
}


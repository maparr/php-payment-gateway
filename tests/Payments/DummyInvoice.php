<?php
declare(strict_types=1);

namespace Setapp\Test\Tests\Payments;

use Setapp\Test\Core\InterfaceInvoice;

class DummyInvoice implements InterfaceInvoice
{
    /** @var string */
    protected $id;
    /** @var int */
    protected $customerId;
    /** @var string */
    protected $amount;
    /** @var string */
    protected $provider;

    /**
     * @param int $id
     * @param int $customerId
     * @param string $amount
     * @param string $provider
     */
    public function __construct(string $id, int $customerId, string $amount, string $provider)
    {
        $this->id = $id;
        $this->customerId = $customerId;
        $this->amount = $amount;
        $this->provider = $provider;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getProvider(): string
    {
        return $this->provider;
    }
}

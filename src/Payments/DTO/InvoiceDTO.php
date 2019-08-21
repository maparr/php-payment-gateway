<?php
declare(strict_types=1);


namespace Setapp\Test\Payments\DTO;

use Setapp\Test\Core\InterfaceInvoice;

class InvoiceDTO implements InterfaceInvoice
{
    /**
     * @var int
     */
    private $customerId;
    /**
     * @var string
     */
    private $amount;
    /**
     * @var string
     */
    private $invoice_id;
    /**
     * @var string
     */
    private $providerType;


    public function __construct(
        int $customerId,
        string $amount,
        string $invoice_id,
        string $providerType
    ) {
        $this->customerId = $customerId;
        $this->amount = $amount;
        $this->invoice_id = $invoice_id;
        $this->providerType = $providerType;
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
    public function getId(): string
    {
        return $this->invoice_id;
    }

    /**
     * @return string
     */
    public function getProvider(): string
    {
        return $this->providerType;
    }
}

<?php
declare(strict_types=1);

namespace Setapp\Test\Payments\Contracts;

use Setapp\Test\Payments\DTO\InvoiceDTO;

/**
 * Interface Handler
 * @package Setapp\Test\Payments\Contracts
 */
interface Handler
{
    /**
     * @param Handler $handler
     * @return Handler
     */
    public function setNext(Handler $handler): Handler;


    /**
     * @param InvoiceDTO $transaction
     * @return InvoiceDTO
     */
    public function handle(InvoiceDTO $transaction): InvoiceDTO ;
}

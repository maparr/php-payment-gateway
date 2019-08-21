<?php
declare(strict_types=1);


namespace Setapp\Test\Payments\ProviderHandlers;

use Setapp\Test\Payments\Contracts\Handler;
use Setapp\Test\Payments\DTO\InvoiceDTO;

abstract class AbstractHandler implements Handler
{
    /**
     * @var Handler
     */
    private $nextHandler;

    public function setNext(Handler $handler): Handler
    {
        $this->nextHandler = $handler;

        return $handler;
    }

    public function handle(InvoiceDTO $transaction): InvoiceDTO
    {
        if ($this->nextHandler) {
            return $this->nextHandler->handle($transaction);
        }

        return $transaction;
    }
}

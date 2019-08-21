<?php
declare(strict_types=1);


namespace Setapp\Test\Payments\Gateways;

use Setapp\Test\Payments\Contracts\InterfaceConsistencyPaymentGateway;
use Setapp\Test\Payments\DTO\InvoiceDTO;
use Setapp\Test\Payments\ProviderHandlers\AbstractHandler;
use Setapp\Test\Payments\ProviderHandlers\DetailedProviderHandler;
use Setapp\Test\Payments\ProviderHandlers\LambdaProviderHandler;
use Setapp\Test\Payments\ProviderHandlers\SimpleProviderHandler;
use Setapp\Test\Tests\Payments\DummyInvoice;

class ConsistencyPaymentGateway implements InterfaceConsistencyPaymentGateway
{
    /**
     * @var AbstractHandler
     */
    private $chain;

    public function __construct()
    {
        $this->chain = new DetailedProviderHandler();
        $this->chain
            ->setNext(new LambdaProviderHandler())
            ->setNext(new SimpleProviderHandler());
    }

    /**
     * @param DummyInvoice[] $transactions
     * @return boolean
     */
    public function charge(array $transactions): bool
    {
        foreach ($transactions as $transaction) {
            $dto = new InvoiceDTO(
                $transaction->getCustomerId(),
                $transaction->getAmount(),
                $transaction->getId(),
                $transaction->getProvider()
            );

            try {
                $this->chain->handle($dto);
            } catch (\DomainException $exception) {
                return false;
            }
        }

        return true;
    }
}

<?php
declare(strict_types=1);

namespace Setapp\Test\Payments\Factories;

use Setapp\Test\Payments\DTO\InvoiceDTO;

/**
 * Interface InterfaceProvider
 * @package Setapp\Test\Payments\Factories
 */
interface InterfaceProvider
{

    /**
     * @param InvoiceDTO $dto
     * @return bool
     */
    public function process(InvoiceDTO $dto): bool;
}

<?php
declare(strict_types=1);

namespace Setapp\Test\Core;

interface InterfaceInvoice
{
    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @return int
     */
    public function getCustomerId(): int;

    /**
     * @return string
     */
    public function getAmount(): string;

    /**
     * @return string
     */
    public function getProvider(): string;
}


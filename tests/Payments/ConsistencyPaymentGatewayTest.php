<?php
declare(strict_types=1);

namespace Setapp\Test\Tests\Payments;

use PHPUnit\Framework\TestCase;
use Setapp\Test\Payments\Gateways\ConsistencyPaymentGateway;

/**
 * Class ConsistencyPaymentGatewayTest
 * @package Setapp\Test\Tests\Payments
 */
class ConsistencyPaymentGatewayTest extends TestCase
{
    /** @var ConsistencyPaymentGatewayTest */
    protected $testingUnit;

    public function setUp()
    {
        parent::setUp();
        $this->testingUnit = new ConsistencyPaymentGateway();
    }

    /**
     * @return array
     */
    public function getChargeTestsSets(): array
    {

        $transactionSuccess1 = new DummyInvoice('d1-ok', 200, '20.00', '');
        $transactionsFail1 = new DummyInvoice('s-fail', 101, '1000.00', '');
        $transactionSuccess2 = new DummyInvoice('d1-ok', 200, '20.00', '');
        $transactionsFail2 = new DummyInvoice('l1-fail', 301, '50.00', '');
        $transactionSuccess3 = new DummyInvoice('d2-ok', 201, '40.00', '');
        $transactionsFail3 = new DummyInvoice('l2-fail', 303, '80.00', '');

        return [
            'success' => [
                true, $transactionSuccess1, $transactionSuccess2
            ],
            'fail' => [
                false, $transactionsFail1, $transactionsFail2
            ],
            'mixed1' =>  [
                false, $transactionSuccess2, $transactionsFail2, $transactionSuccess3
            ],
            'mixed2' =>  [
                true, $transactionSuccess1, $transactionSuccess2
            ],
            'mixed3' =>  [
                false, $transactionsFail2, $transactionSuccess1, $transactionSuccess3, $transactionSuccess2
            ]
        ];
    }

    /**
     * @dataProvider getChargeTestsSets
     *
     * @param $expectedResult
     * @param array $inputInvoices
     */
    public function testCharge($expectedResult, ...$inputInvoices)
    {
        $result = $this->testingUnit->charge($inputInvoices);
        self::assertSame($expectedResult, $result);
    }
}

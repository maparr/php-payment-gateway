<?php
declare(strict_types=1);

namespace Setapp\Test\Tests\Payments;

use PHPUnit\Framework\TestCase;
use Setapp\Test\Payments\BasePaymentGateway;
use Setapp\Test\Payments\Providers\DetailedProvider;
use Setapp\Test\Payments\Providers\LambdaProvider;
use Setapp\Test\Payments\Providers\SimpleProvider;

class BasePaymentGatewayTest extends TestCase
{
    /** @var BasePaymentGateway */
    protected $testingUnit;

    public function setUp()
    {
        parent::setUp();
        $this->testingUnit = new BasePaymentGateway();
    }

    public function getChargeTestsSets(): array
    {
        $detailedSuccess1 = new DummyInvoice('d1-ok', 200, '20.00', DetailedProvider::NAME);
        $detailedSuccess2 = new DummyInvoice('d2-ok', 201, '40.00', DetailedProvider::NAME);

        $simpleSuccess = new DummyInvoice('s-ok', 100, '10.00', SimpleProvider::NAME);
        $simpleFail = new DummyInvoice('s-fail', 101, '1000.00', SimpleProvider::NAME);

        $lambdaSuccess1 = new DummyInvoice('l1-ok', 300, '30.00', LambdaProvider::NAME);
        $lambdaFail1 = new DummyInvoice('l1-fail', 301, '50.00', LambdaProvider::NAME);
        $lambdaSuccess2 = new DummyInvoice('l2-ok', 302, '70.00', LambdaProvider::NAME);
        $lambdaFail2 = new DummyInvoice('l2-fail', 303, '80.00', LambdaProvider::NAME);

        return [
            'detailed provider' => [['d1-ok' => true], $detailedSuccess1],
            'simple provider' => [['s-ok' => true, 's-fail' => false], $simpleSuccess, $simpleFail],
            'lambda provider' => [['l1-ok' => true, 'l1-fail' => false], $lambdaSuccess1, $lambdaFail1],
            'mixed providers' => [
                ['s-ok' => true, 'l1-ok' => true, 'd2-ok' => true, 'l2-ok' => true, 'l-f1' => true, 'l-f2' => true],
                $simpleSuccess,
                $lambdaSuccess1,
                $detailedSuccess2,
                $lambdaSuccess2,
                $lambdaFail1,
                $lambdaFail2,
            ],
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

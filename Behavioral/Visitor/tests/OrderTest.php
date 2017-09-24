<?php

namespace Behavioral\Visitor;

use Behavioral\Visitor\Model\Order\Order;
use Behavioral\Visitor\Model\Product\AlcoholicBeverage;
use Behavioral\Visitor\Model\Product\PackagedFood;
use Behavioral\Visitor\Model\Product\PerishableFood;
use Behavioral\Visitor\OrderVisitor\DeliveryFeeCalculator;
use Behavioral\Visitor\ProductVisitor\PromotionCalculator;
use Behavioral\Visitor\ProductVisitor\VatCalculator;
use PHPUnit\Framework\TestCase;

/**
 * @property Order order
 */
final class OrderTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $soju = new AlcoholicBeverage('참이슬', $price = 1200, $size = 1);
        $egg = new PerishableFood('계란15입', $price = 4500, $size = 2);
        $cannedTuna = new PackagedFood('참치캔', $price = 2600, $size = 1);
        $this->order = new Order([$soju, $egg, $cannedTuna]);
        echo PHP_EOL;
        echo "참이슬 1,200원, 계란5입 4,500원, 참치캔 2,600원을 구매합니다.", PHP_EOL;
    }

    public function tearDown()
    {
        echo str_repeat('-', 80), PHP_EOL;
        parent::tearDown();
    }

    /** @test */
    public function can_calculate_billable_price_with_vat()
    {
        $vatCalculator = new VatCalculator();
        $deliveryFeeCalculator = new DeliveryFeeCalculator();
        $billable = $this->order->accept($vatCalculator, $deliveryFeeCalculator);

        echo '부가세 10%를 적용하여 전체 가격을 계산합니다.', PHP_EOL;
        echo '참이슬 부가세 120원, 계란 부가세 없음, 참치캔 부가세 260원, 배송비 3,000원을 더해서', PHP_EOL;
        echo '전체 가격은 ', number_format($billable), '원입니다.', PHP_EOL;
        $this->assertEquals(1200 + 120 + 4500 + 0 + 2600 + 260 + 3000, $billable);
    }

    /** @test */
    public function can_calculate_billable_price_with_promotion()
    {
        $promotionCalculator = new PromotionCalculator($offRateInPercent = 10);
        $deliveryFeeCalculator = new DeliveryFeeCalculator();
        $billable = $this->order->accept($promotionCalculator, $deliveryFeeCalculator);

        echo '할인 10%, 부가세 10%를 적용하여 전체 가격을 계산합니다.', PHP_EOL;
        echo '술은 할인되지 않으며, 농축수산물은 부가세가 없습니다.', PHP_EOL;
        echo '전체 가격은 ', number_format($billable), '원입니다.', PHP_EOL;
        $this->assertEquals((1200 * 1.1) + (4500 * 0.9) + (2600 * 0.9 * 1.1) + 3000, $billable);
    }
}
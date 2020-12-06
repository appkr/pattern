<?php

namespace Structural\Decorator;

use PHPUnit\Framework\TestCase;

/**
 * @property Product product
 */
final class PriceCalculatorTest extends TestCase
{
    const PRODUCT_PRICE = 1000;
    const PROMOTION_PERCENT = 50;
    const VAT_PERCENT = 10;

    public function setUp()
    {
        parent::setUp();
        $this->product = new Product('과자', self::PRODUCT_PRICE);
        echo PHP_EOL;
    }

    public function tearDown()
    {
        echo PHP_EOL, str_repeat('-', 80), PHP_EOL;
        parent::tearDown();
    }

    /** @test */
    public function can_calculate_product_price()
    {
        $promotionCalculator = new PromotionCalculator($this->product, self::PROMOTION_PERCENT);
        $vatCalculator = new VatCalculator($promotionCalculator);

        $price = $vatCalculator->getPrice();
        $expected = self::PRODUCT_PRICE * (1 - self::PROMOTION_PERCENT/100) * (1 + self::VAT_PERCENT/100);

        echo '정가가 ', self::PRODUCT_PRICE, '원인 제품 가격을 계산합니다.', PHP_EOL;
        echo '할인율은 ', self::PROMOTION_PERCENT, '%입니다.', PHP_EOL;
        echo '부가세율은 ', self::VAT_PERCENT, '%입니다.', PHP_EOL;
        echo "계산된 제품의 가격은 {$price}원입니다.", PHP_EOL;

        $this->assertEquals($expected, $price);
    }
}
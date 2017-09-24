<?php

namespace Behavioral\Visitor\Model\Order;

use Behavioral\Visitor\Model\Product\Product;
use Behavioral\Visitor\Model\Product\ProductElement;
use Behavioral\Visitor\OrderVisitor\OrderVisitor;
use Behavioral\Visitor\ProductVisitor\ProductVisitor;

class Order implements OrderElement
{
    // 한 배송 패키지가 수용할 수 있는 최대 크기는 10이라 가정합니다.
    // 20이면 2 패키지, 배송비가 2번 발생함을 의미합니다.
    const MAX_SIZE_PER_PACKAGE = 10;

    private $lineItems;

    public function __construct(array $lineItems)
    {
        $this->lineItems = $lineItems;
    }

    public function accept(
        ProductVisitor $productVisitor,
        OrderVisitor $orderVisitor
    ): float
    {
        $totalProductPrice = array_reduce(
            $this->lineItems,
            function (float $carry, ProductElement $product) use ($productVisitor) {
                return $carry + $product->accept($productVisitor);
            },
            0
        );

        return $totalProductPrice + $orderVisitor->visit($this);
    }

    public function getNumberOfPackage()
    {
        $totalSize = array_reduce(
            $this->lineItems,
            function (float $carry, Product $product) {
                return $carry + $product->getSize();
            },
            0
        );

        return ceil($totalSize / self::MAX_SIZE_PER_PACKAGE);
    }
}
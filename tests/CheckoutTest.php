<?php

declare(strict_types=1);

namespace Tests;

use App\Checkout;
use PHPUnit\Framework\TestCase;

class CheckoutTest extends TestCase
{
    public function test_scanning_sku_a_returns_total_of_50()
    {
        $checkout = new Checkout();

        $checkout->scan('A');
        $checkout->generateCard();

        $this->assertEquals(50, $checkout->total(), 'Checkout total does not equal expected value of 50');
    }

    public function testScanningSkuAMultipleTotalOf130(){
        $checkout = new Checkout();
        $checkout->scan('A');
        $checkout->scan('A');
        $checkout->scan('A');
        $checkout->generateCard();

        $this->assertEquals(130, $checkout->total(), 'Product A 3 Item does not equal expected value of 130');
    }

    public function testScanningSkuASpecialAndNormalPriceTotalOf180(){
        $checkout = new Checkout();
        $checkout->scan('A');
        $checkout->scan('A');
        $checkout->scan('A');
        $checkout->scan('A');

        $checkout->generateCard();

        $this->assertEquals(180, $checkout->total(), 'Product A 3 Item does not equal expected value of 180');
    }

    public function testScanningSkuBMultipleTotalOf75(){
        $checkout = new Checkout();
        $checkout->scan('B');
        $checkout->scan('B');
        $checkout->scan('B');

        $checkout->generateCard();

        $this->assertEquals(75, $checkout->total(), 'Product A 3 Item does not equal expected value of 75');
    }

    public function testScanningMultipleRandomOrderSkuTotalOf260(){
        $checkout = new Checkout();
        $checkout->scan('A');
        $checkout->scan('B');
        $checkout->scan('C');
        $checkout->scan('A');
        $checkout->scan('B');
        $checkout->scan('A');
        $checkout->scan('D');
        $checkout->scan('A');

        $checkout->generateCard();

        $this->assertEquals(260, $checkout->total(), 'Product A 3 Item does not equal expected value of 260');
    }

}

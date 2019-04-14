<?php

declare(strict_types=1);

namespace App;

interface CheckoutInterface
{
    /**
     * Adds an item to the checkout
     *
     * @param $sku string
     */
    public function scan(string $sku);

    /**
     * Calculates the total price of all items in this checkout
     *
     * @return float
     */
    public function total(): float;
}

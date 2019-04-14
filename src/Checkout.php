<?php

declare(strict_types=1);

namespace App;

use App\Card\Card;

class Checkout extends Card implements CheckoutInterface
{
    /**
     * Adds an item to the checkout
     *
     * @todo Implement scan() method.
     *
     * @param $sku string
     */
    public function scan(string $sku)
    {
        $this->addProduct($sku);
    }

    /**
     * Calculates the total price of all items in this checkout
     *
     * @todo Implement total() method.
     *
     * Think if we are calculating price, this need to be float type, so we well not loose decimal point
     * Some product maybe has decimal
     *
     * @return float
     */
    public function total(): float
    {
        return $this->getTotal();
    }
}

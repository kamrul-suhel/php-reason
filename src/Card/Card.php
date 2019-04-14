<?php
/**
 * Created by PhpStorm.
 * User: kamrulahmed
 * Date: 14/04/2019
 * Time: 09:40
 */

namespace App\Card;


use App\Product\Product;
use App\Product\Products;

class Card
{
    private $currentProducts;

    public function __construct()
    {
        //Initialize card
        $this->currentProducts = [];
    }

    /**
     * @param string $sku
     */
    public function addProduct(string $sku)
    {
        // Get current product by SKU
        $product = $this->getCurrentProduct($sku);

        /**
         * Make collection of product
         * I believe SKU is product identifier
         * put current scan product into existing group or it will make new group
         */
        $this->currentProducts[$sku][] = $product;
    }

    /**
     * @param string $sku
     * @return Product
     */
    private function getCurrentProduct(string $sku): Product
    {
        $products = Products::getAllProduct();
        // Find the current product & return
        foreach ($products as $product) {
            if ($product->getSku() === $sku) {
                return $product;
            }
        }
    }


    /**
     * @return float
     */
    public function getCard()
    {
        $total = 0.00;
        //Loop into current checkout products
        foreach ($this->currentProducts as $sku => $products) {
            // Get first product form group of product, so we can check is product has special offer
            $product = $this->getCurrentProduct($sku);

            // Count how many product in current group
            $totalProduct = count($products);

            // Check product has special price
            if ($product->isOnOffer()) {
                // If has special price first check how many product in current group
                // If it is more then special unit then do
                if ($totalProduct >= $product->getDiscountUnit()) {
                    // Make group by discountUnit
                    $productGroup = array_chunk($products, $product->getDiscountUnit());

                    // Loop through productGroup
                    foreach ($productGroup as $collection) {
                        // Check collection is more then discount unit
                        if (count($collection) === $product->getDiscountUnit()) {
                            // This collection has special price.
                            $total += $product->getSpecialPrice();
                        } else {
                            // This collection has normal price
                            $total += $product->getPrice();
                        }
                    }
                } else {
                    // Has special price but they did not buy enough item.
                    foreach ($products as $product) {
                        $total += $product->getPrice();
                    }
                }

            } else {
                foreach ($products as $product) {
                    $total += $product->getPrice();
                }
            }

        }

        return $total;
    }


}
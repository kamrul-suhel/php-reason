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
    public function addProduct(string $sku){
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
    private function getCurrentProduct(string $sku) : Product{
        $products = Products::getAllProduct();
        // Find the current product & return
        foreach($products as $product){
            if($product->getSku() === $sku){
                return $product;
            }
        }
    }


    public function getCard(){
        $total = 0;
        //Loop into current checkout products
        foreach($this->currentProducts as $sku => $products){
            // Get first product form group of product, so we can check is product has special offer
            $product = $this->getCurrentProduct($sku);

            // Count how many product in current group
            $totalProduct = count($products);

            // Check product has special price
            if($product->isOnOffer()){
                // If has special price first check how many product in current group
                // If it is more then special unit then do
                if( $totalProduct >= $product->getDiscountUnit()){

                }else{
                    foreach($products as $product){
                        $total += $product->getPrice();
                    }
                }

            }else{
                foreach($products as $product){
                    $total += $product->getPrice();
                }
            }

        }

        return $total;
    }


}
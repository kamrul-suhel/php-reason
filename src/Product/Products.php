<?php
/**
 * Created by PhpStorm.
 * User: kamrulahmed
 * Date: 14/04/2019
 * Time: 09:23
 */

namespace App\Product;


class Products
{
    private $products;

    public function __construct()
    {
        // Initialize product
        $this->products = new \SplDoublyLinkedList();
    }

    /**
     * Defining default product
     * I believe in real project, it will come from database
     */
    public function createDefaultProduct(){
        $product = new Product('Item 1', 'A', 50.00, 3,130);
        $this->products->push($product);

        $product = new Product('Item 2', 'B', 30.00, 2,45);
        $this->products->push($product);

        $product = new Product('Item 3', 'C', 20.00);
        $this->products->push($product);

        $product = new Product('Item 4', 'D', 15.00);
        $this->products->push($product);

        // SplDoublyLinkedList need to rewind after populate
        $this->products->rewind();

        return $this->products;
    }
}
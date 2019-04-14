<?php
/**
 * Created by PhpStorm.
 * User: kamrulahmed
 * Date: 14/04/2019
 * Time: 09:04
 */
declare(strict_types=1);

namespace App\Product;



class Product
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $sku;

    /**
     * @var float
     */
    private $price;

    /**
     * @var int
     */
    private $discountUnit;

    /**
     * @var float
     */
    private $specialPrice;


    /**
     * Product constructor.
     * @param string $name
     * @param string $sku
     * @param float $price
     * @param int $discountUnit
     * @param float $specialPrice
     */
    public function __construct(
        string $name = '',
        string $sku = '',
        float $price = 0.00,
        int $discountUnit = 0,
        float $specialPrice =  0.00
    )
    {
        // Initialise product
        $this->name = $name;
        $this->sku = $sku;
        $this->price = $price;
        $this->discountUnit = $discountUnit;
        $this->specialPrice = $specialPrice;

    }

    // Set product setter & getter

    /**
     * @param string $name
     */
    public function setName(string $name){
        $this->name = $name;
    }

    /**
     * @param string $sku
     */
    public function setSku(string $sku){
        $this->sku = $sku;
    }

    /**
     * @param string $price
     */
    public function setPrice(string $price){
        $this->price = $price;
    }

    /**
     * @param int $unit
     */
    public function setDiscountUnit(int $unit){
        $this->discountUnit = $unit;
    }

    /**
     * @param float $specialPrice
     */
    public function setSpecialPrice(float $specialPrice){
        $this->specialPrice = $specialPrice;
    }

    /**
     * @return string
     */
    public function getName(){
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSku(){
        return $this->sku;
    }

    /**
     * @return float
     */
    public function getPrice(){
        return $this->price;
    }

    public function getDiscountUnit(){
        return $this->discountUnit;
    }

    /**
     * @return float
     */
    public function getSpecialPrice(){
        return $this->specialPrice;
    }


    /**
     * Check is product in offer
     * @return bool
     */
    public function isOnOffer(){
        if($this->specialPrice > 0 && $this->discountUnit > 0){
            return true;
        }
        return false;
    }



}
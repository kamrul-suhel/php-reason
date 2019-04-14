<?php
/**
 * Created by PhpStorm.
 * User: kamrulahmed
 * Date: 14/04/2019
 * Time: 09:17
 */

use App\Card\Card;
use App\Product\Product;

require "./vendor/autoload.php";

$card = new Card();
$card->addProduct('A');
$card->addProduct('A');
$card->addProduct('A');
$card->addProduct('A');
$card->addProduct('A');
$card->addProduct('A');

echo '<pre>';
var_dump($card->getCard());
echo '</pre>';
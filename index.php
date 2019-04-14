<?php
/**
 * Created by PhpStorm.
 * User: kamrulahmed
 * Date: 14/04/2019
 * Time: 09:17
 */

use App\Checkout;

require "./vendor/autoload.php";

$card = new Checkout();
$card->scan('B');
$card->scan('A');
$card->scan('B');
$card->scan('A');
$card->scan('A');
//$card->addProduct('C');
//$card->addProduct('A');
//$card->addProduct('C');
//$card->addProduct('A');

$card->generateCard();



echo '<pre>';
var_dump($card->getTotal());
echo '</pre>';
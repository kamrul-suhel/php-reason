<?php
/**
 * Created by PhpStorm.
 * User: kamrulahmed
 * Date: 14/04/2019
 * Time: 09:17
 */

use App\Checkout;

require "./vendor/autoload.php";

$checkout = new Checkout();
//$checkout->scan('A');
//$checkout->scan('C');
$checkout->scan('B');
$checkout->scan('B');
$checkout->scan('B');
//$checkout->scan('D');

$checkout->generateCard();



echo '<pre>';
var_dump($checkout->getTotal());
echo '</pre>';
<?php


function getPrice($price){
    //$price = floatval($price) /100;
    $price = floatval($price);
    return number_format($price, 2, ',', ' ') . ' $';
}

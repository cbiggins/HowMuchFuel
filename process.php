<?php
include('functions.php');

if (isset($_REQUEST)) {
    
    // Cost to fill
    // tank size / price * 100
    $cost_to_fill = ($_REQUEST['fuel_tank_size'] * $_REQUEST['fuel_price']) / 100;
    $cost_to_fill = round($cost_to_fill, 2);
    
    // Average k's per tank
    // tank size / consumption * 100
    $ks_per_tank = ($_REQUEST['fuel_tank_size'] / $_REQUEST['fuel_consumption']) * 100;
    $ks_per_tank = round($ks_per_tank, 2);
    
    // Average price per k
    // cost to fill / ks per tank
    $price_per_k = round(($cost_to_fill / $ks_per_tank), 2);
    
    if (!isset($_SESSION['fuel_prices'])) {
        $_SESSION['fuel_prices'] = array();
    }
    
    $_SESSION['fuel_prices'][$_REQUEST['name']] = array(
        'vehicle_name'      => $_REQUEST['name'],
        'fuel_consumption'  => $_REQUEST['fuel_consumption'],
        'fuel_tank_size'    => $_REQUEST['fuel_tank_size'],
        'fuel_type'         => $_REQUEST['fuel_type'],
        'fuel_price'        => $_REQUEST['fuel_price'],
        'cost_to_fill'      => $cost_to_fill,
        'ks_per_tank'       => $ks_per_tank,
        'price_per_k'       => sprintf("%.2f", $price_per_k),
    );
}

header("Location: index.php");
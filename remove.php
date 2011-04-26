<?php
include('functions.php');
dump($_SESSION['fuel_prices']);
if (isset($_REQUEST['id'])) {
    unset($_SESSION['fuel_prices'][$_REQUEST['id']]);
}
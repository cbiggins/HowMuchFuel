<?php

function dump($s) {
    $str = "<pre>";
    $str .= print_r($s, true);
    $str .= "</pre>";
    print $str;
}

session_start();
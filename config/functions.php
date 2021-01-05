<?php

function base_url(){
    global $site_url;
    $url = $site_url;
    return $url;
}

function public_url(){
    global $site_url;
    $url = $site_url."public/";
    return $url;
}

function storage_url(){
    global $site_url;
    $url = public_url().'storage/';
    return $url;
}

function redirect_to($new_location){
    header("Location: ".$new_location);
    exit;
}

function truncate_string($string, $limit){
    $allchars = $string;
    $string = substr($string, 0, $limit);
    $string = substr($string, 0, strrpos($string," "));
    return $string;
}

function get_currency_value($value = 0){
    $currency = 'KSHS'.$value;
    return $currency;
}

// check if atable exists
function check_table_exists($conn, $table){
    // Try a select statement against the table
    // Run it in try/catch in case PDO is in ERRMODE_EXCEPTION.
    try {
        $result = $conn->query("SELECT 1 FROM $table LIMIT 1");
    } catch (Exception $e) {
        // We got an exception == table not found
        return FALSE;
    }

    // Result is either boolean FALSE (no table found) or PDOStatement Object (table found)
    return $result !== FALSE;
}
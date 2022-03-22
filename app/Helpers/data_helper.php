<?php

function debug($data=[], $ex=true){
    print '<pre>';
    print_r ($data);
    if($ex == true){
        exit();
    }
}

function generateRandomString($length = 5) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function encodeSet($text = ""){
    $pass = '0123456789abcdefghij21klmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    return [
        $text,
        "AES-128-ECB",
        $pass
    ];
}

function encodeData($text = ""){
    $set = encodeSet($text);
    return openssl_encrypt($set[0], $set[1], $set[2]);
}

function decodeData($text = ""){
    $set = encodeSet($text);
    return openssl_decrypt($set[0], $set[1], $set[2]);
}

function getCurrentURL(){
    return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

function getHost(){
    return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/";
}
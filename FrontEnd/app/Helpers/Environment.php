<?php 

function urlAPI() 
{
    $prod = true;
    $apiProd = "http://api.blog.jordysantamaria.com/";
    $apiLocal = "http://127.0.0.1:8000/";
    
    return ($prod) ? $apiProd : $apiLocal;
}

function urlBase() 
{
    $prod = true;
    $apiProd = "http://blog.jordysantamaria.com/";
    $apiLocal = "http://127.0.0.1:8001/";

    return ($prod) ? $apiProd : $apiLocal;
}
<?php

ini_set('display_errors', 1);
include ('./config.php');

if (!isset($_SESSION)){
  session_start();
}

$dbObject = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
// print($dbObject);

require_once 'application/bootstrap.php';

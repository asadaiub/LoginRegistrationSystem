<?php

$username = 'root';
$dsn = 'mysql:host=localhost; dbname=register';
$password = '';


try {


    $db = new PDO($dsn, $username, $password);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    //echo "connected to to the register system";


} catch (PDOException $exception) {
    echo "Connection failed" . $exception->getMessage();
}

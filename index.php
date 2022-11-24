<?php

require 'flight/Flight.php';
include 'foods.php';
include 'users.php';

Flight::register('db', 'PDO', array('mysql:host=b9qvnncectrawqo3sijd-mysql.services.clever-cloud.com;dbname=b9qvnncectrawqo3sijd','uorffhnmompvgtpf','rImlIENzqMRF1taDzZVI'));
// datos de hola

Flight::route('/', function () {
    echo 'hello world!';
});
Flight::start();


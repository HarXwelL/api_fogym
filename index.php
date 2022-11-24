<?php

require 'flight/Flight.php';

Flight::register('db', 'PDO', array('mysql:host=b9qvnncectrawqo3sijd-mysql.services.clever-cloud.com;dbname=b9qvnncectrawqo3sijd','uorffhnmompvgtpf','rImlIENzqMRF1taDzZVI'));
// datos de hola
//GET
Flight::route('GET /users', function () {
    $sentencia= Flight::db()->prepare("SELECT * FROM `users`");
    $sentencia->execute();
    $datos=$sentencia->fetchAll();
    Flight::json($datos);
});
//GET unitario
Flight::route('GET /users/@id', function ($id) {
    $sentencia= Flight::db()->prepare("SELECT * FROM  `users` WHERE id=?");
    $sentencia->bindParam(1,$id);

    $sentencia->execute();
    $datos=$sentencia->FetchAll();
    Flight::json($datos);
});
//POST
Flight::route('POST /users', function () {
    //recepecion datos
    $username=(Flight::request()->data->username);
    $email=(Flight::request()->data->email);
    $password=(Flight::request()->data->password);
    $gender=(Flight::request()->data->gender);

    $sql="INSERT INTO users (username,email,password,gender) VALUES (?,?,?,?)";
    //agregavalor
    $sentencia= Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $username);
    $sentencia->bindParam(2, $email);
    $sentencia->bindParam(3, $password);
    $sentencia->bindParam(4, $gender);
    $sentencia->execute();
    Flight::jsonp(["Usuario agregado"]);
});
//PUT
Flight::route('PUT /users/@id', function ($id) {
    $username=(Flight::request()->data->username);
    $email=(Flight::request()->data->email);
    $password=(Flight::request()->data->password);
    $gender=(Flight::request()->data->gender);
    //no enviar id
    $sql="UPDATE users SET username=?, email=?, password=?, gender=? WHERE id=?";
    //modificavalor
    $sentencia= Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $username);
    $sentencia->bindParam(2, $email);
    $sentencia->bindParam(3, $password);
    $sentencia->bindParam(4, $gender);
    $sentencia->bindParam(5, $id);

    $sentencia->execute();
    Flight::jsonp(["Usuario modificado"]);
});
//DELETE
Flight::route('DELETE /users/@id', function ($id) {
    $sql="DELETE FROM users WHERE id=?";
    
    $sentencia= Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $id);
    $sentencia->execute();
    Flight::jsonp(["Usuario borrado"]);
});
Flight::start();

//datos de comidas
//GET
Flight::route('GET /foods', function () {
    $sentencia= Flight::db()->prepare("SELECT * FROM `foods`");
    $sentencia->execute();
    $datos=$sentencia->fetchAll();
    Flight::json($datos);
});
//GET unitario
Flight::route('GET /foods/@id', function ($id) {
    $sentencia= Flight::db()->prepare("SELECT * FROM  `foods` WHERE id=?");
    $sentencia->bindParam(1,$id);

    $sentencia->execute();
    $datos=$sentencia->FetchAll();
    Flight::json($datos);
});
//POST
Flight::route('POST /foods', function () {
    //recepecion datos
    $name=(Flight::request()->data->name);
    $calorias=(Flight::request()->data->calorias);
    $imagen=(Flight::request()->data->imagen);

    $sql="INSERT INTO foods (name,calorias,imagen) VALUES (?,?,?)";
    //agregavalor
    $sentencia= Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $name);
    $sentencia->bindParam(2, $calorias);
    $sentencia->bindParam(3, $imagen);
    $sentencia->execute();
    Flight::jsonp(["Comida agregado"]);
});
//PUT
Flight::route('PUT /users/@id', function ($id) {
    $name=(Flight::request()->data->name);
    $calorias=(Flight::request()->data->calorias);
    $imagen=(Flight::request()->data->imagen);
    //no enviar id
    $sql="UPDATE foods SET name=?, calorias=?, imagen=? WHERE id=?";
    //modificavalor
    $sentencia= Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $name);
    $sentencia->bindParam(2, $calorias);
    $sentencia->bindParam(3, $imagen);
    $sentencia->bindParam(4, $id);

    $sentencia->execute();
    Flight::jsonp(["Comida modificado"]);
});
//DELETE
Flight::route('DELETE /foods/@id', function ($id) {
    $sql="DELETE FROM foods WHERE id=?";
    
    $sentencia= Flight::edb()->prepare($sql);
    $sentencia->bindParam(1, $id);
    $sentencia->execute();
    Flight::jsonp(["Comida borrado"]);
});
Flight::start();


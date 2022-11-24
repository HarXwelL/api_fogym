<?php
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
    $nameco=(Flight::request()->data->nameco);
    $calorias=(Flight::request()->data->calorias);
    $imagen=(Flight::request()->data->imagen);

    $sql="INSERT INTO foods (nameco,calorias,imagen) VALUES (?,?,?)";
    //agregavalor
    $sentencia= Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $nameco);
    $sentencia->bindParam(2, $calorias);
    $sentencia->bindParam(3, $imagen);
    $sentencia->execute();
    Flight::jsonp(["Comida agregado"]);
});
//PUT
Flight::route('PUT /users/@id', function ($id) {
    $nameco=(Flight::request()->data->nameco);
    $calorias=(Flight::request()->data->calorias);
    $imagen=(Flight::request()->data->imagen);
    //no enviar id
    $sql="UPDATE foods SET nameco=?, calorias=?, imagen=? WHERE id=?";
    //modificavalor
    $sentencia= Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $nameco);
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
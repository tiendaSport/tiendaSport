<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
require_once("./main.php");
$con=conectar();
$form = $_POST['form'];
switch($form){
    case "categoria":
        $categoria_nombre = $_POST['categoria_nombre'];
        $queryInsert = $con->prepare("INSERT INTO categorias (categoria_nombre) VALUES (:categoria_nombre)");
        $arrayInsert = [
            ":categoria_nombre" => $categoria_nombre
        ];
        $queryInsert->execute($arrayInsert);
        if($queryInsert->rowCount() > 0){
            echo "<div class='notification is-success'>Categoría agregada con éxito</div>";
        }
        break;
    case "deporte":
        $deporte_nombre = $_POST['deporte_nombre'];
        $queryInsert = $con->prepare("INSERT INTO deportes (deporte_nombre) VALUES (:deporte_nombre)");
        $arrayInsert = [
            ":deporte_nombre" => $deporte_nombre
        ];
        $queryInsert->execute($arrayInsert);
        if($queryInsert->rowCount() > 0){
            echo "<div class='notification is-success'>Deporte agregado con éxito</div>";
        }
        break;
    case "marca":
        $marca_nombre = $_POST['marca_nombre'];
        $queryInsert = $con->prepare("INSERT INTO marcas (marca_nombre) VALUES (:marca_nombre)");
        $arrayInsert = [
            ":marca_nombre" => $marca_nombre
        ];
        $queryInsert->execute($arrayInsert);
        if($queryInsert->rowCount() > 0){
            echo "<div class='notification is-success'>Marca agregada con éxito</div>";
        }
        break;
}
}
?>
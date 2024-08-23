<?php 
if($_SERVER['REQUEST_METHOD']=="POST"){
    require_once("../inc/session.php");
    $id_producto=$_POST['id_producto'];
    if(!isset($_SESSION['id'])){
        echo "SESIÓN NO INICIADA";
    }else{
    $id_usuario=$_SESSION['id'];
    require_once('./main.php');
    agregarAlCarrito($id_usuario,$id_producto);
    }
}
?>
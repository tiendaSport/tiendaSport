<?php 
if($_SERVER['REQUEST_METHOD']=="POST"){
    require_once("../inc/session.php");
    $pedido_id=$_POST['pedido_id'];
    if(!isset($_SESSION['id'])){
        echo "SESIÓN NO INICIADA";
    }else{
    $id_usuario=$_SESSION['id'];
    require_once('./main.php');
    $estado=3;
    $con=conectar();
    $CambiarEstadoPedido=$con->prepare("UPDATE pedidos SET pedido_estado = :estado WHERE pedido_id = :id_pedido;");
    $arrayEstadosPedido=[
        "estado"=>$estado,
        "id_pedido"=>$pedido_id
    ];
    $CambiarEstadoPedido->execute($arrayEstadosPedido);
    }
}
?>
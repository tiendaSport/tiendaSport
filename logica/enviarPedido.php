<?php 
if($_SERVER['REQUEST_METHOD']=="POST"){
    require_once("../inc/session.php");
    $pedido_id=$_POST['pedido_id'];
    if(!isset($_SESSION['id'])){
        echo "SESIÓN NO INICIADA";
    }else{
    $id_usuario=$_SESSION['id'];
    $nombreDelUsuario = $_SESSION['nombre_usuario']; // Valor predeterminado
    $email=$_SESSION['email'];// Valor predeterminado
    require_once('./main.php');
    $estado=2;
    $con=conectar();
    $CambiarEstadoPedido=$con->prepare("UPDATE pedidos SET pedido_estado = :estado WHERE pedido_id = :id_pedido;");
    $arrayEstadosPedido=[
        "estado"=>$estado,
        "id_pedido"=>$pedido_id
    ];
    $CambiarEstadoPedido->execute($arrayEstadosPedido);
    if($CambiarEstadoPedido->rowCount()>0){
        echo"
        <div class='notification is-success'>Pedido enviado.</div>
        ";
        $titulo = "¡Pedido Enviado con éxito!";
        $mensaje = "Saludos, ".$nombreDelUsuario.". Su pedido ha sido enviado. Confirme la recepción en el apartado de pedidos.";
        enviarEmail($email, $titulo, $mensaje);
    }
    }
}
?>
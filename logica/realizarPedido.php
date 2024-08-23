<?php 
if($_SERVER['REQUEST_METHOD']=="POST"){
    require_once("./main.php");
    require_once("../inc/session.php");
    $id_usuario=$_POST['id_usuario'];
    $precioTotalPedido=$_SESSION['PrecioTotalPedido'];
    $nombreDelUsuario = $_SESSION['nombre_usuario']; // Valor predeterminado
    $email=$_SESSION['email'];// Valor predeterminado
    $conexion=conectar();
    //TRAEMOS PRODUCOS QUE ESTÉN EN EL CARRITO
    $traerDatosDelCarrito=$conexion->prepare("SELECT * FROM carritodecompras AS cdc 
    INNER JOIN productos as prod ON cdc.producto_id = prod.producto_id 
    INNER JOIN usuarios AS usu ON usu.usuario_id = cdc.usuario_id 
    WHERE cdc.usuario_id = :usuario_id");
    $array=[":usuario_id"=>$id_usuario];
    $traerDatosDelCarrito->execute($array);
    $traerDatosDelCarrito=$traerDatosDelCarrito->fetchAll();
    /* //traer el nombre del usuario
     $datosDelUsuario=$conexion->prepare("SELECT * FROM usuarios WHERE usuario_id = :id_usuario");
    $selectArray=[
        ":id_usuario"=>$id_usuario
    ];
    if($datosDelUsuario->rowCount()>0){
        $datosDelUsuario=$datosDelUsuario->fetch();
        $nombreDelUsuario=$datosDelUsuario['usuario_nombre'];
        $email=$datosDelUsuario['usuario_email'];
    }
    $datosDelUsuario=null;*/
    $pedido_estado=1;
    //CREAR UN PEDIDO, EL CUAL PERTENECE A UN USUARIO EN ESPECÍFICO
    $insertarPedido=$conexion->prepare("insert into pedidos(pedido_usuario, pedido_precio, pedido_estado) values(:usuario_id, :total, :pedido_estado);");
    $arrayInsert=[
        ":usuario_id"=>$id_usuario,
        ":total"=>$precioTotalPedido,
        ":pedido_estado"=>$pedido_estado
    ];
    $insertarPedido->execute($arrayInsert);
    //ID del pedido recién creado
    $pedido_id=$conexion->lastInsertId();
    foreach($traerDatosDelCarrito as $datoCarrito){
        $insertarProducto=$conexion->prepare("insert into pedidos_productos() values(:pedido_id, :producto_id)");
        $arrayPedidos=[
            ":pedido_id"=>$pedido_id,
            ":producto_id"=>$datoCarrito['producto_id'],
        ];
        $insertarProducto->execute($arrayPedidos);
        if($insertarProducto->rowCount()>0){
            $titulo = "¡Pedido Realizado con éxito!";
            $mensaje = "Saludos, ".$nombreDelUsuario.". Muchas gracias por comprar en Tienda Sport. ";
            $mensaje .= "Su pedido será enviado luego de que un administrador lo revise. Se le enviará un Email para confirmar su envío.";
            quitarDelCarrito($id_usuario, $datoCarrito['producto_id']);
            agregarAlHistorial($pedido_id, $id_usuario);
            enviarEmail($email, $titulo, $mensaje);
            echo'
            <div class="notification is-success">
            PEDIDO REALIZADO CON ÉXITO
            </div>
            ';
        }
    }
}
?>
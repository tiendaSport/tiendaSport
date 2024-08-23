<?php 
if($_SERVER['REQUEST_METHOD']=="POST"){
    $form=$_POST['form'];
    $con=conectar();
    switch($form){
        case "producto":
            $id_producto = $_POST['id_producto'];
            $queryDelete=$con->query("DELETE FROM usuarios WHERE producto_id = :id_producto ");
            $arrayDelete=[":id_producto"=>$id_producto];
            $queryDelete->execute($arrayDelete);
            break;
        case "usuario":
            $id_usuario = $_POST['id_usuario'];
            $queryDelete=$con->query("DELETE FROM usuarios WHERE usuario_id = :id_usuario ");
            $arrayDelete=[":id_usuario"=>$id_usuario];
            $queryDelete->execute($arrayDelete);
            break;
        case "categoria":
            $id_categoria = $_POST['id_categoria'];
            $queryDelete=$con->query("DELETE FROM categorias WHERE categoria_id = :id_categoria ");
            $arrayDelete=[":id_categoria"=>$id_categoria];
            $queryDelete->execute($arrayDelete);
            break;        
        case "deporte":
            $id_deporte = $_POST['id_deporte'];
            $queryDelete=$con->query("DELETE FROM deportes WHERE deporte_id = :id_deporte ");
            $arrayDelete=[":id_deporte"=>$id_deporte];
            $queryDelete->execute($arrayDelete);
            break;
        case "marca":
            $id_marca = $_POST['id_marca'];
            $queryDelete=$con->query("DELETE FROM marcas WHERE marca_id = :id_marca ");
            $arrayDelete=[":id_marca"=>$id_marca];
            $queryDelete->execute($arrayDelete);
            break;        
    }
}
?>

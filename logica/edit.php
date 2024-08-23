<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    require_once("./main.php");
    $con=conectar();
    $form=$_POST['form'];
    switch($form){
        case "producto":
            $id_producto = $_POST['id_producto'];
            $nombre_producto = $_POST['producto_nombre'];
            $descripcion_producto = $_POST['producto_descripcion'];
            $precio_producto = $_POST['producto_precio'];
            $queryUpdate=$con->prepare("UPDATE productos SET producto_nombre= :nombre, producto_descripcion= :descripcion, producto_precio= :precio WHERE producto_id = :id");
            $arrayUpdate=[
                ":nombre"=>$nombre_producto,
                ":descripcion"=>$descripcion_producto,
                ":precio"=>$precio_producto,
                ":id"=>$id_producto
            ];
            $queryUpdate->execute($arrayUpdate);
            if($queryUpdate->rowCount()>0){
                echo "
                <div class='notification is-success'>Cambio registrado con éxito</div>
                ";
            }else{
                echo "
                <div class='notification is-danger'>Ocurrió un error</div>
                ";
            }
            break;
        case "categoria":
            $id_categoria=$_POST['id_categoria'];
            $nombre_categoria=$_POST['nombre_categoria'];
            $queryUpdate=$con->prepare("UPDATE categorias SET categoria_nombre = :nombre_categoria WHERE categoria_id = id_categoria");
            $arrayUpdate=[
                "nombre_categoria"=>$nombre_categoria,
                "id_categoria"=>$id_categoria
            ];
            $queryUpdate->execute($arrayUpdate);
            if($queryUpdate->rowCount()>0){
                echo "
                <div class='notification is-success'>Cambio registrado con éxito</div>
                ";
            }
            break;
        case "deporte":
            $id_deporte=$_POST['id_deporte'];
            $nombre_deporte=$_POST['nombre_deporte'];
            $queryUpdate=$con->prepare("UPDATE deportes SET deporte_nombre = :nombre_deporte WHERE deporte_id = id_deporte");
            $arrayUpdate=[
                "nombre_deporte"=>$nombre_deporte,
                "id_deporte"=>$id_deporte
            ];
            $queryUpdate->execute($arrayUpdate);
            if($queryUpdate->rowCount()>0){
                echo "
                <div class='notification is-success'>Cambio registrado con éxito</div>
                ";
            }
            break;
        case "marca":
            $id_marca=$_POST['id_marca'];
            $nombre_marca=$_POST['nombre_marca'];
            $queryUpdate=$con->prepare("UPDATE marcas SET marca_nombre = :nombre_marca WHERE marca_id = id_marca");
            $arrayUpdate=[
                "nombre_marca"=>$nombre_marca,
                "id_marca"=>$id_marca
            ];
            $queryUpdate->execute($arrayUpdate);
            if($queryUpdate->rowCount()>0){
                echo "
                <div class='notification is-success'>Cambio registrado con éxito</div>
                ";
            }
            break;
    }
}
?>
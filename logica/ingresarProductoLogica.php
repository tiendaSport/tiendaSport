<?php
require_once("./main.php");
$con=conectar();
$producto_codigo = $_POST['producto_codigo'];
$producto_nombre = $_POST['producto_nombre'];
$producto_descripcion = $_POST['producto_descripcion'];
$producto_stock=$_POST['producto_stock'];
$producto_precio = $_POST['producto_precio'];
$producto_categoria = $_POST['producto_categoria'];
$producto_deporte = $_POST['producto_deporte'];
$producto_marca = $_POST['producto_marca'];
$insercionProductos = $con->prepare("INSERT INTO productos(producto_id, producto_codigo, producto_nombre, producto_descripcion, producto_stock, producto_precio, producto_categoria, producto_deporte, producto_marca) 
VALUES (NULL, :producto_codigo, :producto_nombre, :producto_descripcion,:producto_stock, :producto_precio, :producto_categoria, :producto_deporte, :producto_marca);");
$arrayInsertarProducto=[
    ":producto_codigo"=>$producto_codigo,
    ":producto_nombre"=>$producto_nombre,
    ":producto_descripcion"=>$producto_descripcion,
    ":producto_stock"=>$producto_stock,
    ":producto_precio"=>$producto_precio,
    ":producto_categoria"=>$producto_categoria,
    ":producto_deporte"=>$producto_deporte,
    ":producto_marca"=>$producto_marca
];
$insercionProductos->execute($arrayInsertarProducto);
if($insercionProductos->rowCount()>0){
    echo "PRODUCTO GUARDADO CON ÉXITO";
}else{
    echo "HUBO UN ERROR AL INGRESAR UN PRODUCTO";
}
?>
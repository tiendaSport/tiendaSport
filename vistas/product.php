<?php 
if (isset($_GET['producto_id'])){
    $producto_id=$_GET['producto_id'];
    $con=conectar();
    $productos = $con->prepare("SELECT * FROM productos 
    INNER JOIN categorias ON productos.producto_categoria = categorias.categoria_id 
    INNER JOIN deportes ON productos.producto_deporte = deportes.deporte_id 
    INNER JOIN marcas ON productos.producto_marca = marcas.marca_id WHERE producto_id = :producto_id");
    $array_productos=[":producto_id"=>$producto_id];
    $productos->execute($array_productos);
    $productos=$productos->fetch();
}else{
    header("Location:../index.php?vista=home");
}
?> 
<main>
<div class="form-rest"></div>
<section>
<div class="product">

    <a class="productcard">
        <figure>
            <img src="./imgs/notfound.png" alt="Producto">
        
        </figure>

        <div>
            <h1><?php echo $productos['producto_nombre'];?></h1>
            <H2>$<?php echo $productos['producto_precio'];?></H2>
            <p><?php echo $productos['producto_descripcion'];?></p>
        </div>
    </a>

</div>

</section>

<div class="product-buttons">
<!-- <a href="" class="vermasdefutbol">COMPRAR AHORA</a> -->
<form action="./logica/agregarAlCarrito.php" method="post" class="FormularioAjax">
    <input type="hidden" name="id_producto" value="<?php echo $productos['producto_id']; ?>">
    <button type="submit" class="vermasdefutbol">AÑADIR AL CARRITO</button>
</form>
<!-- <a href="" class="vermasdefutbol">AÑADIR AL CARRITO</a> -->

</div>
</main>
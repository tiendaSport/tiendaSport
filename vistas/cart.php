<?php
$con=conectar();
if(isset($_SESSION['id'])){
    $usuario_id=$_SESSION['id'];
    $queryCarritoUsuario=$con->prepare("SELECT * FROM carritodecompras AS cdc INNER JOIN productos as prod ON cdc.producto_id = prod.producto_id INNER JOIN usuarios AS usu ON usu.usuario_id = cdc.usuario_id WHERE cdc.usuario_id = :usuario_id");
    $arrayCarritoUsuario=[":usuario_id"=>$usuario_id];
    $queryCarritoUsuario->execute($arrayCarritoUsuario);
    $queryCarritoUsuario=$queryCarritoUsuario->fetchall();
    $totalDelCarrito=0;
}else{
    $queryCarritoUsuario=null;
    $usuario_id=0;
    echo'
    <script>
    alert("Carrito vacío.");
    location.href="./index.php?vista=home"
    </script>
    ';
}
?>
<main>
        <!-- --------------- MAIN --------------- -->
        <h1>MI CARRITO</h1>
        <div class="form-rest"></div>
        <section class="cart-products">
        <?php foreach($queryCarritoUsuario as $carrito): ?>
            <div class="cart-myproduct">
                <img src="./imgs/notfound.png" alt="Product">

                <div class="cart-descripcion">
                <h3><?php echo $carrito['producto_nombre']; ?></h3>
                <span><?php echo $carrito['producto_descripcion']; ?></span>
                </div>


                <h2>Precio :  $<?php echo $carrito['producto_precio']; ?> </h2>
                <div class="cart-actions">
                    <form action="./logica/eliminarDelCarrito.php" method="post" class="FormularioAjax">
                        <input type="hidden" name="id_producto" value="<?php echo $carrito['producto_id']; ?>">
                        <button type="submit" class="borrar-del-carrito">
                            <span class="material-symbols-outlined">delete</span>
                        </button>
                    </form>
                </div>
                <!-- <a href="" class="borrar-del-carrito"><span class="material-symbols-outlined">delete</span></a> -->
            </div>
            <?php 
            $totalDelCarrito=$totalDelCarrito+$carrito['producto_precio'];
            $_SESSION['PrecioTotalPedido']=$totalDelCarrito; 
            ?>
            <?php endforeach;?>
        </section>

        <div class="cart-buttons">
            <h4>TOTAL : $<?php echo $totalDelCarrito; ?></h4>
            <a href="index.php?vista=home" class="vermasdefutbol">SEGUIR NAVEGANDO</a>
            <form action="./logica/realizarPedido.php" method="post" class="FormularioAjax">
            <input type="hidden" name="id_usuario" value="<?php echo $usuario_id; ?>">
            <input type="submit" class="vermasdefutbol" value="REALIZAR PEDIDO">
            </form>
            <!-- <a href="" class="vermasdefutbol">REALIZAR PEDIDO</a> -->
        </div>
</main>
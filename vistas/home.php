<?php
// Conexión a la base de datos
$conexion = conectar();

// Consultas para obtener datos
$productos = $conexion->query("SELECT * FROM productos 
INNER JOIN categorias ON productos.producto_categoria = categorias.categoria_id 
INNER JOIN deportes ON productos.producto_deporte = deportes.deporte_id 
INNER JOIN marcas ON productos.producto_marca = marcas.marca_id");
$productos = $productos->fetchAll();

$categorias = $conexion->query("SELECT * FROM categorias")->fetchAll();
$deportes = $conexion->query("SELECT * FROM deportes")->fetchAll();
$marcas = $conexion->query("SELECT * FROM marcas")->fetchAll();
$ofertas = $conexion->query("SELECT * FROM ofertas")->fetchAll();
?>
<main>
    <?php
    if(isset($_SESSION['cantidadCarrito'])){
        $cantidadCarrito = $_SESSION['cantidadCarrito'];
    }else{
        $cantidadCarrito=0;
    }
    ?>
<section>

<h1>LO MÁS VENDIDO</h1>
    <button id="scroll-left-lmv" class="scroll-left scroll-button"><span class="material-symbols-outlined">chevron_left</span> </button> 
    <button id="scroll-right-lmv" class="scroll-right scroll-button"><span class="material-symbols-outlined">chevron_right</span> </button>

<div class="products lo-mas-vendido">

    <?php foreach($productos as $producto): ?>
    <a href="index.php?vista=product&producto_id=<?= $producto['producto_id']?>" class="productcard">
        <figure>
            <img src="./imgs/notfound.png" alt="Producto">
            <div>
                <span><?php echo $producto['producto_nombre']; ?></span>
                <p><?php echo $producto['producto_precio']; ?></p>
            </div>
        </figure>
    </a>
    <?php endforeach ?>
</div>

<h1>LANZAMIENTOS</h1>
    <button id="scroll-left-nv" class="scroll-left scroll-button"><span class="material-symbols-outlined">chevron_left</span> </button>
    <button id="scroll-right-nv" class="scroll-right scroll-button"><span class="material-symbols-outlined">chevron_right</span> </button>

<div class="products lanzamientos">     

    <a class="productcard">
        <figure>
            <img src="./imgs/test.png" alt="Producto">
            <div>
                <span>Nombre del producto awdawdadawdawdawd</span>
                <p>$100</p>
            </div>
        </figure>
    </a>

</div>

</section>


<a href="" class="vermasdefutbol">VER MÁS</a>
</main>
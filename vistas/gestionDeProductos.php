<?php
if (isset($_SESSION['cargo'])) {
    $id_cargo=$_SESSION['cargo'];
}
if ($id_cargo!=1 or !isset($id_cargo)) {
    echo'
    <script>
    alert("Usted no está autorizado.");
    location.href="./index.php?vista=home"
    </script>
    ';
}
$conexion=conectar();
$categorias = $conexion->query("SELECT * FROM categorias")->fetchAll();
$deportes = $conexion->query("SELECT * FROM deportes")->fetchAll();
$marcas = $conexion->query("SELECT * FROM marcas")->fetchAll();
$productos = $conexion->query("SELECT * FROM productos 
INNER JOIN categorias ON productos.producto_categoria = categorias.categoria_id 
INNER JOIN deportes ON productos.producto_deporte = deportes.deporte_id 
INNER JOIN marcas ON productos.producto_marca = marcas.marca_id");
$productos = $productos->fetchAll();
?>
<main>
<style>
    table {
        margin: 0 auto;
        border-collapse: collapse; 
    }
</style>
    <h1>Gestión de productos</h1>
    <button id="open-modal-btn" class="normal">+ Añadir Producto</button>

    <!-- <section class="search-section">
    <form id="search-form">
        <input type="text" id="search-query" placeholder="Buscar por nombre o categoría" required>
        <button type="submit" class="normal">Buscar</button>
    </form>
    </section> -->

    <section class="productos-section">
            <table>
                <thead>
                <tr>
                    <th>Producto</th>
                    <th>Descripción</th>
                    <th>Categoría</th>
                    <th>Deporte</th>
                    <th>Marca</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                    <th></th>
                </tr>
                </thead>
                <tbody id="product-list">
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td class="casilla-producto">
                            <img src="./imgs/notfound.png" class="img-producto" alt="foto del producto">
                            <?php echo $producto['producto_nombre'];?>
                        </td>
                        <td class="table-cell">
                            <?php echo $producto['producto_descripcion']; ?>
                        </td>
                        <td>
                            <?php echo $producto['categoria_nombre']; ?>
                        </td>
                        <td>
                            <?php echo $producto['deporte_nombre']; ?>
                        </td>
                        <td>
                            <?php echo $producto['marca_nombre']; ?>
                        </td>
                        <td>
                            $<?php echo $producto['producto_precio']; ?>
                        </td>
                        <td>
                        <form action="index.php?vista=editForm" method="POST" class="">
                            <input type="hidden" name="form" value="producto">
                            <input type="hidden" name="id_producto" value="<?php echo $producto['producto_id'] ?>">
                            <input type="hidden" name="producto_nombre" value="<?php echo $producto['producto_nombre'] ?>">
                            <input type="hidden" name="producto_descripcion" value="<?php echo $producto['producto_descripcion'] ?>">
                            <input type="hidden" name="producto_precio" value="<?php echo $producto['producto_precio'] ?>">
                            <input type="hidden" name="categoria_nombre" value="<?php echo $producto['categoria_nombre'] ?>">
                            <input type="hidden" name="deporte_nombre" value="<?php echo $producto['deporte_nombre'] ?>">
                            <input type="hidden" name="marca_nombre" value="<?php echo $producto['marca_nombre'] ?>">
                            <button type="submit" class="normal">Editar</button>
                        </form>
                        </td>
                        <td>
                            <form action="./logica/delete.php" method="POST" class="FormularioAjax">
                                <input type="hidden" name="form" value="producto">
                                <input type="hidden" name="id_producto" value="<?php echo $producto['producto_id'] ?>">
                                <button type="submit" class="delete">Eliminar</button>
                    </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    </section>

    <div id="agregar-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 class="titulo-modal">Añadir Producto</h2>
            <div class="form-rest"></div>
            <form action="./logica/ingresarProductoLogica.php" method="POST" enctype="multipart/form-data" class="FormularioAjax form-producto">
                <label for="producto_codigo">Código del producto</label>
                <input type="text" name="producto_codigo">
                <label for="producto_nombre">Nombre del producto:</label>
                <input type="text" name="producto_nombre">
                <label for="producto_descripcion">Descripción del producto:</label>
                <input type="text" name="producto_descripcion">
                <label for="producto_stock">Stock:</label>
                <input type="text" name="producto_stock">
                <label for="producto_precio">Precio del producto:</label>
                <input type="text" name="producto_precio">
                <label for="producto_categoria">Categoría del producto:</label>
                <select name="producto_categoria">
                <?php foreach($categorias as $rows_cat): ?>
                    <option value="<?php echo $rows_cat['categoria_id'];?>" <?php echo (isset($producto['producto_categoria']) && $producto['producto_categoria'] == $rows_cat['categoria_id']) ? 'selected' : ''; ?>><?php echo $rows_cat['categoria_nombre'];?></option>    
                <?php endforeach ?> 
                </select>
                <label for="producto_deporte">Deporte del producto:</label>
                <select name="producto_deporte">
                <?php foreach($deportes as $rows_deportes): ?>
                    <option value="<?php echo $rows_deportes['deporte_id'];?>" <?php echo (isset($producto['producto_deporte']) && $producto['producto_deporte'] == $rows_deportes['deporte_id']) ? 'selected' : ''; ?>><?php echo $rows_deportes['deporte_nombre'];?></option>    
                <?php endforeach ?>
                </select>
                <label for="producto_marca">Marca del producto:</label>
                <select name="producto_marca">
                <?php foreach($marcas as $rows_marcas): ?>
                    <option value="<?php echo $rows_marcas['marca_id'];?>" <?php echo (isset($producto['producto_marca']) && $producto['producto_marca'] == $rows_marcas['marca_id']) ? 'selected' : ''; ?>><?php echo $rows_marcas['marca_nombre'];?></option>    
                <?php endforeach ?>    
                </select>
                <button type="submit" class="normal">Añadir Producto</button>
            </form>
        </div>
    </div>
    <script>
        // Modal functionality
        var modal = document.getElementById("agregar-modal");
        var btn = document.getElementById("open-modal-btn");
        var span = document.getElementsByClassName("close")[0];

        btn.onclick = function() {
            modal.style.display = "block";
        }

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</main>
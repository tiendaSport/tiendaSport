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
?>
<main>
    <form class="form-control FormularioAjax" action="./logica/ingresarProductoLogica.php" method="POST" enctype="multipart/form-data">
        <h1 class="center">Productos:</h1>
        <div class="form-rest"></div>
        <div class="mb-3">
            <label for="producto_codigo" class="form-label">Código del producto: </label>
            <input type="text" name="producto_codigo" class="form-control">
        </div>
        <div class="mb-3">
            <label for="producto_nombre" class="form-label">Nombre del producto:</label>
            <input type="text" name="producto_nombre" class="form-control">
        </div>
        <div class="mb-3">
            <label for="producto_descripcion" class="form-label">Descripción del producto:</label>
            <input type="text" name="producto_descripcion" class="form-control">
        </div>
        <div class="mb-3">
            <label for="producto_stock" class="form-label">Stock del producto:</label>
            <input type="number" name="producto_stock" class="form-control">
        </div>
        <div class="mb-3">
            <label for="producto_precio" class="form-label">Precio del producto:</label>
            <input type="number" name="producto_precio" class="form-control">
        </div>
        <div class="mb-3">
            <label for="producto_categoria" class="form-label">Categoría del producto:</label>
            <select name="producto_categoria" class="form-select">
        <?php foreach($categorias as $rows_cat): ?>
            <option value="<?php echo $rows_cat['categoria_id'];?>"><?php echo $rows_cat['categoria_nombre']?></option>    
        <?php endforeach ?>    
            </select>
        </div>
        <div class="mb-3">
            <label for="producto_deporte" class="form-label">Deporte del producto:</label>
            <select name="producto_deporte" class="form-select">
        <?php foreach($deportes as $rows_deportes): ?>
            <option value="<?php echo $rows_deportes['deporte_id'];?>"><?php echo $rows_deportes['deporte_nombre']?></option>    
        <?php endforeach ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="producto_marca" class="form-label">Marca del producto:</label>
            <select name="producto_marca" class="form-select">
        <?php foreach($marcas as $rows_marcas): ?>
            <option value="<?php echo $rows_marcas['marca_id'];?>"><?php echo $rows_marcas['marca_nombre']?></option>    
        <?php endforeach ?>    
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</main>
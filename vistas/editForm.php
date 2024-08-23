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
$form=$_POST['form'];
$conexion=conectar();
$categorias = $conexion->query("SELECT * FROM categorias")->fetchAll();
$deportes = $conexion->query("SELECT * FROM deportes")->fetchAll();
$marcas = $conexion->query("SELECT * FROM marcas")->fetchAll();
// echo "Formulario: " . htmlspecialchars($form);
switch($form){
    case "producto":
        $id_producto = $_POST['id_producto'];
        $nombre_producto = $_POST['producto_nombre'];
        $descripcion_producto = $_POST['producto_descripcion'];
        $precio_producto = $_POST['producto_precio'];
        $categoria_nombre = $_POST['categoria_nombre'];
        $deporte_nombre = $_POST['deporte_nombre'];
        $marca_nombre = $_POST['marca_nombre'];
        ?>
        <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
            <div class="form-rest"></div>
            <form id="edit-form" method="post" action="./logica/edit.php" class="FormularioAjax form-producto">
                <input type="hidden" id="id_producto" name="id_producto" value="<?php echo $id_producto; ?>" required>
                <input type="hidden" name="form" value="producto" required>
                <label for="producto_nombre">Nombre del producto:</label>
                <input type="text" id="producto_nombre" name="producto_nombre" value="<?php echo $nombre_producto; ?>" required>
                <label for="producto_descripcion">Descripción del producto:</label>
                <textarea id="producto_descripcion" name="producto_descripcion" required><?php echo $descripcion_producto; ?></textarea>
                <label for="producto_precio">Precio del producto:</label>
                <input type="number" id="producto_precio" name="producto_precio" value="<?php echo $precio_producto; ?>" required>
                <button type="submit" class="normal">Guardar cambios</button>
            </form>
        </div>
        <?php
        break;
    case "usuario":
        $id_usuario=$_POST['id_usuario'];
        $nombre_usuario=$_POST['nombre_usuario'];
        $apellido_usuario=$_POST['apellido_usuario'];
        $email_usuario=$_POST['email_usuario'];
        $cargo_usuario=$_POST['cargo_usuario'];
        ?>
        <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div class="form-rest"></div>
            <form id="edit-form" method="post" action="./logica/edit.php" class="FormularioAjax form-producto">
                <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $id_usuario; ?>" required>
                <input type="hidden" name="form" value="usuario" required>
                <label for="usuario_nombre">Nombre del usuario:</label>
                <input type="text" id="usuario_nombre" name="usuario_nombre" value="<?php echo $nombre_usuario; ?>" required>
                <label for="usuario_apellido">Apellido del usuario:</label>
                <input type="text" id="usuario_apellido" name="usuario_apellido" value="<?php echo $apellido_usuario; ?>" required>
                <label for="usuario_email">Correo electrónico del usuario:</label>
                <input type="email" id="usuario_email" name="usuario_email" value="<?php echo $email_usuario; ?>" required>
                <label for="cargo_usuario">Cargo del usuario:</label>
                <input type="text" id="cargo_usuario" name="cargo_usuario" value="<?php echo $cargo_usuario; ?>" required>
                <button type="submit" class="normal">Guardar cambios</button>
            </form>
        </div>
        <?php
        break;
    case "deporte":
        $id_deporte=$_POST['id_deporte'];
        $nombre_deporte=$_POST['nombre_deporte'];
        ?>
        <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div class="form-rest"></div>
            <form id="edit-form" method="post" action="./logica/edit.php" class="FormularioAjax form-producto">
                <input type="hidden" id="id_deporte" name="id_deporte" value="<?php echo $id_deporte; ?>" required>
                <input type="hidden" name="form" value="deporte" required>
                <label for="nombre_deporte">Nombre del deporte:</label>
                <input type="text" id="nombre_deporte" name="nombre_deporte" value="<?php echo $nombre_deporte; ?>" required>
                <button type="submit" class="normal">Guardar cambios</button>
            </form>
        </div>
        <?php
        break;
    case "categoria":
        $id_categoria=$_POST['id_categoria'];
        $nombre_categoria=$_POST['nombre_categoria'];
        ?>
        <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div class="form-rest"></div>
            <form id="edit-form" method="post" action="./logica/edit.php" class="FormularioAjax form-producto">
                <input type="hidden" id="id_categoria" name="id_categoria" value="<?php echo $id_categoria; ?>" required>
                <input type="hidden" name="form" value="categoria" required>
                <label for="nombre_categoria">Nombre de la categoría:</label>
                <input type="text" id="nombre_categoria" name="nombre_categoria" value="<?php echo $nombre_categoria; ?>" required>
                <button type="submit" class="normal">Guardar cambios</button>
            </form>
        </div>
        <?php
        break;
    case "marca":
        $id_marca=$_POST['id_marca'];
        $nombre_marca=$_POST['nombre_marca'];
        ?>
        <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div class="form-rest"></div>
            <form id="edit-form" method="post" action="./logica/edit.php" class="FormularioAjax form-producto">
                <input type="hidden" id="id_marca" name="id_marca" value="<?php echo $id_marca; ?>" required>
                <input type="hidden" name="form" value="marca" required>
                <label for="nombre_marca">Nombre de la marca:</label>
                <input type="text" id="nombre_marca" name="nombre_marca" value="<?php echo $nombre_marca; ?>" required>
                <button type="submit" class="normal">Guardar cambios</button>
            </form>
        </div>
        <?php
        break;
}

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
require_once("./logica/main.php");
$con = conectar();

// Consulta para obtener categorías
$categorias = $con->query("SELECT * FROM categorias")->fetchAll();
// Consulta para obtener deportes
$deportes = $con->query("SELECT * FROM deportes")->fetchAll();
// Consulta para obtener marcas
$marcas = $con->query("SELECT * FROM marcas")->fetchAll();
?>
<main>
    <h1>Gestión de etiquetas</h1>
        <section class="etiquetas">
            <div class="etiqueta-content">
                <h2 class="titulo_etiqueta">Añadir categoría</h2>
                <form class="etiqueta-form FormularioAjax" method="post" action="./logica/agregarEtiquetas.php">
                    <input type="hidden" name="form" value="categoria">
                    <label for="categoria_nombre">Nombre:</label>
                        <input type="text" name="categoria_nombre" required>
                    <button type="submit" class="normal">Añadir etiqueta</button>
                </form>
            </div>
            <div class="etiqueta-content">
                <h2 class="titulo_etiqueta">Añadir deporte</h2>
                <form class="etiqueta-form FormularioAjax" method="post" action="./logica/agregarEtiquetas.php">
                    <input type="hidden" name="form" value="deporte">
                    <label for="deporte_nombre">Nombre:</label>
                        <input type="text" name="deporte_nombre" required>
                    <button type="submit" class="normal">Añadir etiqueta</button>
                </form>
            </div>
            <div class="etiqueta-content">
                <h2 class="titulo_etiqueta">Añadir marca</h2>
                <form class="etiqueta-form FormularioAjax" method="post" action="./logica/agregarEtiquetas.php">
                    <input type="hidden" name="form" value="marca">
                    <label for="marca_nombre">Nombre:</label>
                        <input type="text" name="marca_nombre" required>
                    <button type="submit" class="normal">Añadir etiqueta</button>
                </form>
            </div>
        </section>
        <section class="tablas-etiquetas">
            <table>
                <thead>
                <tr>
                    <th>Categorías</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($categorias as $categoria): ?>
                        <tr>
                            <td><?php echo $categoria['categoria_nombre']; ?></td>
                            <td>
                                <form action="./logica/delete.php" class="FormularioAjax">
                                    <input type="hidden" name="form" value="<?php echo $categoria['categoria_id']; ?>">
                                    <button type="submit" class="delete">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <table>
                <thead>
                <tr>
                    <th>Deportes</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($deportes as $deporte): ?>
                    <tr>
                        <td><?php echo $deporte['deporte_nombre']; ?></td>
                        <td>
                            <form action="./logica/delete.php" class="FormularioAjax">
                                <input type="hidden"  name="form" value="<?php echo $deporte['deporte_id']; ?>">
                                <button type="submit" class="delete">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <table>
                <thead>
                <tr>
                    <th>Marcas</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($marcas as $marca): ?>
                    <tr>
                        <td><?php echo $marca['marca_nombre']; ?></td>
                        <td>
                            <form action="./logica/delete.php" class="FormularioAjax">
                                <input type="hidden" name="form" value="<?php echo $categoria['categoria_id']; ?>">
                                <button type="submit" class="delete">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>    
                </tbody>
            </table>
        </section>
</main>
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
$con=conectar();
$usuarios=$con->query("SELECT * FROM usuarios inner join cargos on cargos.cargo_id = id_cargo ")->fetchAll();
?>
<main>
    <h1>Gestión de usuarios</h1>
        <section class="search-section">
            <form id="search-form">
                <input type="text" id="search-query" placeholder="Buscar usuarios" required>
                <button type="submit" class="normal">Buscar</button>
            </form>
            </section>
        <section class="usuarios-section">
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Cargo</th>
                    <th>Acciones</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($usuarios as $usuario): ?>
                    <tr>
                        <td><?php echo $usuario['usuario_id']; ?></td>
                        <td><?php echo $usuario['usuario_nombre']; ?></td>
                        <td><?php echo $usuario['usuario_apellido']; ?></td>
                        <td><?php echo $usuario['usuario_email']; ?></td>
                        <td><?php echo $usuario['cargo_nombre']; ?></td>
                        <td>
                            <form action="index.php?vista=editForm" method="post">
                                <input type="hidden" name="form" value="usuario">
                            <input type="hidden" name="id_usuario" value="<?php echo $usuario['usuario_id']; ?>">
                            <input type="hidden" name="nombre_usuario" value="<?php echo $usuario['usuario_nombre']; ?>">
                            <input type="hidden" name="apellido_usuario" value="<?php echo $usuario['usuario_apellido']; ?>">
                            <input type="hidden" name="email_usuario" value="<?php echo $usuario['usuario_email']; ?>">
                            <input type="hidden" name="cargo_usuario" value="<?php echo $usuario['cargo_id']; ?>">
                            <button class="normal">Editar</button>
                            </form>
                        </td>
                        <td>
                            <form action="./logica/delete.php" method="post">
                                <input type="hidden" name="id_usuario" value="<?php echo $usuario['usuario_id']; ?>">
                                <button type="submit" class="delete">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
</main>
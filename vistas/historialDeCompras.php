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
$historial=$conexion->query("select * from historialdecompras as historial 
inner join pedidos on pedidos.pedido_id = historial.compra_pedido 
inner join usuarios on usuarios.usuario_id = historial.compra_usuario;");
if($historial->rowCount()>0){
    $historial=$historial->fetchAll();
}


?>
<main>
<style>
    table {
        margin: 0 auto;
        border-collapse: collapse; 
    }
    th, td {
        padding: 10px; 
        border: 1px solid #ddd; 
    }
</style>
<table>
    <thead>
        <tr>
            <th>Compra ID</th>
            <th>Pedido ID</th>
            <th>Email del Usuario</th>
            <th>Fecha y Hora de Compra</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($historial as $compra): ?>
            <tr>
                <td><?php echo $compra['compra_id']; ?></td>
                <td><?php echo $compra['pedido_id']; ?></td>
                <td><?php echo $compra['usuario_email']; ?></td>
                <td><?php echo $compra['compra_fechayhora']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</main>
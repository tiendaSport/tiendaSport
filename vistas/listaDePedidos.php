<?php
$conexion=conectar();
$pedidos=$conexion->query("SELECT * FROM pedidos_productos AS ped_prod 
INNER JOIN pedidos ON pedidos.pedido_id = ped_prod.pedido_id 
INNER JOIN usuarios ON pedidos.pedido_usuario = usuarios.usuario_id 
INNER JOIN productos ON productos.producto_id = ped_prod.producto_id 
INNER JOIN estados_pedidos ON pedidos.pedido_estado = estados_pedidos.estado_id
GROUP BY pedidos.pedido_id;");
$pedidos=$pedidos->fetchall();
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
    <div class="form-rest"></div>
    <thead>
        <tr>
            <th>Número de pedido</th>
            <th>Usuario</th>
            <th>Productos</th>
            <th>Total</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pedidos as $pedido): ?>
            <tr>
                <td><?php echo $pedido['pedido_id']; ?></td>
                <td><?php echo $pedido['usuario_email']; ?></td>
                <td><?php echo $pedido['producto_nombre']; ?></td>
                <td><?php echo $pedido['pedido_precio']; ?></td>
                <td><?php echo $pedido['estado_nombre']?></td>
                <?php if($pedido['estado_id']==1):?>
                    <td>
                        <form action="./logica/enviarPedido.php" method="post" class="FormularioAjax">
                            <input type="hidden" name="pedido_id" value="<?php echo $pedido['pedido_id']; ?>">
                            <input type="submit" value="Enviar pedido">
                        </form>
                    </td>
                <?php endif;?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</main>
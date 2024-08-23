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
?> 
<main>
    <h1>Panel de administración</h1>
    <div class="container-menu">
        <section class="action-grid">
            <div class="action-card">
                <h2><a href="index.php?vista=gestionDeProductos">Gestionar productos</a></h2>
            </div>
            <div class="action-card">
                <h2><a href="index.php?vista=listaDeUsuarios">Gestionar usuarios</a></h2>
            </div>
            <div class="action-card">
                <h2><a href="index.php?vista=listaDePedidos">Gestionar pedidos</a></h2>
            </div>
            <div class="action-card">
                <h2><a href="index.php?vista=historialDeCompras">Historial de compras</a></h2>
            </div>
            <div class="action-card">
                <h2><a href="index.php?vista=gestionDeEtiquetas">Gestionar etiquetas</a></h2>
            </div>
        </section>
    </div>
</main>
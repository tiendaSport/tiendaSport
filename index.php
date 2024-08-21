<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once ('./inc/session.php'); 
require_once ('./logica/main.php');
if(isset($_SESSION['id'])){
    $id_usuario=$_SESSION['id'];
    $_SESSION['cantidadCarrito']=contarProductos($id_usuario);
}
?>
<!DOCTYPE html>
<html lang="en">
<?php 
include ("./inc/head.php");
?>
<body>
    <!-- --------------- CARGA --------------- -->
    <div id="contenedor_carga">

		<div id="carga">
		</div>

		<div id="text"> <h3>Cargando...</h3> </div>

	</div>
    <?php include("./inc/navbar.php");?>
    <?php include("./inc/sidebar.php");?>
<?php
    $vista = limpiarString(isset($_GET['vista'])) ? limpiarString($_GET['vista']) : 'home';
    switch ($vista) {
        case 'iniciarSesion':
            // include("./inc/2ndnavbar.php");
            include("./vistas/iniciarSesion.php");
            break;
        default:
            if (is_file("./vistas/$vista.php")) {
                include("./vistas/$vista.php");
                // if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
                //     if (isset($_SESSION['estadoSesion']) && $_SESSION['estadoSesion'] == true) {
                //         //include("./inc/navbar.php");
                //         include("./vistas/$vista.php");
                //     } else {
                //         include("./inc/2ndnavbar.php");
                //         include("./vistas/$vista.php");
                //         // include("./inc/script.php");
                //     }
                // } else {
                //     include("./vistas/cerrarSesion.php");
                // }
            } else {
                include("./vistas/404.php");
            }
            break;
    }
	?>
<?php include("./inc/footer.php");?>
<script src="./inc/ajax.js"></script>
<script src="./logica/scripts/sort.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
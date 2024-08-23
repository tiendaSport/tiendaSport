<?php
require_once('./inc/session.php');
require_once('./logica/main.php');
##almaceno los datos
$email=limpiarString($_POST['email_usuario']);
$clave=limpiarString($_POST['clave_usuario']);
if ($email=="" || $clave=="") {
	echo "
	<div>
	<span class='notification is-danger'>DEBE LLENAR TODOS LOS CAMPOS</span>
	</div>";
	exit(); 
}
$check_user=conectar();
$check_user=$check_user->query("SELECT * FROM usuarios WHERE usuario_email = '$email';");
if ($check_user->rowCount()==1) {
	$check_user=$check_user->fetch();
	if ($check_user['usuario_email']==$email && password_verify($clave,$check_user['usuario_clave'])){
		$_SESSION['id']=$check_user['usuario_id'];
		$_SESSION['cargo']=$check_user['id_cargo'];
		$_SESSION['email']=$check_user['usuario_email'];
		$_SESSION['nombre_usuario']=$check_user['usuario_nombre'];
		// echo $autentificacionbd;
		if(headers_sent()){
			echo "<script> window.location.href='index.php?vista=home';</script>";
		}else{
			header("Location:index.php?vista=home");
		}
	}else{
		echo '
			<div class="notification is-danger">
			<strong>ERROR</strong>
			USUARIO O CONTRASEÑA INCORRECTOS
			</div>
			<p>¿Olvidaste tu contraseña? <a style="text-decoration:none;" href="index.php?vista=recuperar_password">click aquí</a></p>
				';}	
}else{
	echo '
		<div class="notification is-danger">
		<strong>ERROR</strong>
		USUARIO O CONTRASEÑA INCORRECTOS
		</div>
    <p>¿Olvidaste tu contraseña? <a style="text-decoration:none;" href="index.php?vista=recuperar_password">click aquí</a></p>
	';}
$check_user=null;
?>
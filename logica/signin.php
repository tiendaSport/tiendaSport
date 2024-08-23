<?php
require_once('../inc/session.php');

require_once('./main.php');
$email=limpiarString($_POST['email']);
$nombre=limpiarString($_POST['usuario_nombre']);
$apellido=limpiarString($_POST['usuario_apellido']);
$clave=limpiarString($_POST['usuario_clave']);
$clave_confirm=limpiarString($_POST['usuario_clave_confirm']);
// $codigoAutentificacion=0;
if(!isset($_SESSION['cargo'])){
	$cargo=3;
	}else{
		$cargo=limpiarString($_POST['usuario_cargo']);
	}
if($clave != $clave_confirm){
    echo '
    <div class="notification is-danger">
        Las contraseñas no coinciden
    </div>
    ';
}else{
    //Hash a la clave
    $claveDefinitiva=encriptar($clave);
} 
//consulta
$conectar=conectar();
$checkEmail=$conectar->query("SELECT * FROM usuarios WHERE usuario_email = '$email';");
if($checkEmail->rowCount()==1){
    echo'
    <div class="button is-danger">
        Este email ya se encuentra registrado. Utilice otro email.
    </div>
    ';
}else{
    $queryInsertar=$conectar->prepare("INSERT INTO usuarios(usuario_id, usuario_nombre, usuario_apellido, usuario_email, usuario_clave, id_cargo) VALUES (NULL,:nombre,:apellido,:email,:clave,:cargo)");
    $arrayClaves=[
        ":nombre"=>$nombre,
        ":apellido"=>$apellido,
        ":email"=>$email,
        ":clave"=>$claveDefinitiva,
        ":cargo"=>$cargo,
];
		$queryInsertar->execute($arrayClaves);
		if ($queryInsertar->rowCount()==1) {
			echo '
			<div class="notification is-success">
				¡Usuario registrado con exito!
			</div>
			';
		}else{
			echo '
			<div class="notification is-danger">
				ERROR
			</div>
			';
		}
		$queryInsertar=null;
	}
?>
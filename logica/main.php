<?php
//inclusión de archivos
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//función de conexión a la base de datos.
function conectar(){
	$pdo = new PDO('mysql:host=localhost;dbname=tiendaSport','root','');
	return $pdo;
}
//función de conexión a la base de datos.
//Función para limpiar una cadena de texto, trata de evitar SQLI y XSS.
function limpiarString($cadena){
	$cadena=trim($cadena);
	$cadena=stripslashes($cadena);
	$cadena=str_ireplace("'", "",$cadena);
	$cadena=str_ireplace("<script>", "", $cadena);
	$cadena=str_ireplace("</script>", "", $cadena);
	$cadena=str_ireplace("<script src>", "", $cadena);
	$cadena=str_ireplace("<script type=>", "", $cadena);
	$cadena=str_ireplace("SELECT * FROM", "", $cadena);
	$cadena=str_ireplace("DELETE FROM", "", $cadena);
	$cadena=str_ireplace("DROP TABLE", "", $cadena);
	$cadena=str_ireplace("DROP DATABASE", "", $cadena);
	$cadena=str_ireplace("TRUNCATE TABLE", "", $cadena);
	$cadena=str_ireplace("SELECT", "", $cadena);
	$cadena=str_ireplace("DROP", "", $cadena);
	$cadena=str_ireplace("TRUNCATE", "", $cadena);
	$cadena=str_ireplace("--", "", $cadena);
	$cadena=str_ireplace("SHOW TABLES", "", $cadena);
	$cadena=str_ireplace("SHOW DATABASES", "", $cadena);
	$cadena=str_ireplace("<?php", "", $cadena);
	$cadena=str_ireplace("?>", "", $cadena);
	$cadena=str_ireplace("--", "", $cadena);
	$cadena=str_ireplace("^", "", $cadena);
	$cadena=str_ireplace("<", "", $cadena);
	$cadena=str_ireplace("[", "", $cadena);
	$cadena=str_ireplace("]", "", $cadena);
	$cadena=str_ireplace("==", "", $cadena);
	$cadena=str_ireplace(";", "", $cadena);
	$cadena=str_ireplace("::", "", $cadena);
	$cadena=str_ireplace("AND", "", $cadena);
	// $cadena=str_ireplace("OR", "", $cadena);
	$cadena=str_ireplace("UNION", "", $cadena);
	$cadena=str_ireplace("-", "", $cadena);
	$cadena=trim($cadena);
	$cadena=stripslashes($cadena); 
	return $cadena;
}
//Función para limpiar una cadena de texto, trata de evitar SQLI y XSS.
//Función para renombrar imágenes
function renombrarFotos($nombreFoto){
	$nombreFoto=str_ireplace(" ","_","$nombreFoto");
	$nombreFoto=str_ireplace("/","_","$nombreFoto");
	$nombreFoto=str_ireplace("#","_","$nombreFoto");
	$nombreFoto=str_ireplace("-","_","$nombreFoto");
	$nombreFoto=str_ireplace("$","_","$nombreFoto");
	$nombreFoto=str_ireplace(".","_","$nombreFoto");
	$nombreFoto=str_ireplace(",","_","$nombreFoto");
	$nombreFoto = $nombreFoto."_".rand(0,100);
	return $nombreFoto;
}
//Función para renombrar imágenes
//Función para encriptar contraseña
function encriptar($clave){
	$claveDefinitiva=password_hash($clave, PASSWORD_BCRYPT,['cost'=>10]);
	return $claveDefinitiva;
}
//Función para encriptar contraseña
//Función para generar un código de autentificación, el cual siempre es aleatorio
function generarCodigoAutentificacion(){
	$codigoAutentificacion=rand(999, 10000);
	return $codigoAutentificacion;
}
//Función para generar un código de autentificación
//función para agregar un elemento al carrito
function agregarAlCarrito($id_usuario, $id_producto){
	$con=conectar();
	$agregarAlCarrito=$con->prepare("INSERT INTO carritodecompras() VALUES (:id_usuario, :id_producto);");
	$arrayCarrito=[
		":id_usuario"=>$id_usuario,
		":id_producto"=>$id_producto
	];
	$agregarAlCarrito->execute($arrayCarrito);
	if($agregarAlCarrito->rowCount()>0){
		$mensaje = 'Producto agregado al carrito exitosamente! :)';
		echo "<script>
			document.getElementById('mensaje').innerHTML = '$mensaje';
			document.getElementById('mensaje').style.display = 'block';
		</script>";
	}else{
		$mensaje = 'No se pudo agregar el producto :(';
		echo "<script>
			document.getElementById('mensaje').innerHTML = '$mensaje';
			document.getElementById('mensaje').classList.remove('mensaje-exito');
			document.getElementById('mensaje').classList.add('mensaje-error');
			document.getElementById('mensaje').style.display = 'block';
		</script>";
	}
}
//función para quitar un elemento del carrito
function quitarDelCarrito($id_usuario, $id_producto){
	$con=conectar();
	$quitarDelCarrito=$con->prepare("DELETE FROM carritodecompras WHERE usuario_id = :id_usuario AND producto_id = :id_producto;");
	$arrayCarrito=[
		":id_usuario"=>$id_usuario,
		":id_producto"=>$id_producto
	];
	return $quitarDelCarrito->execute($arrayCarrito);
}
//Función para contar la cantidad de elementos en el carrito
function contarProductos($id_usuario){
	$con=conectar();
	$contarDelCarrito=$con->prepare("SELECT count(*) FROM `carritodecompras` WHERE usuario_id = :id_usuario;");
	$arrayCarrito=[
		":id_usuario"=>$id_usuario
	];
	return $contarDelCarrito->execute($arrayCarrito);
}
//FUNCIÓN PARA ENVIAR EMAILS
function enviarEmail($emailReceptor, $subject, $message){
	require_once '../librerias/PHPMailer/src/PHPMailer.php';
	require_once '../librerias/PHPMailer/src/Exception.php';
	require_once '../librerias/PHPMailer/src/SMTP.php';
	$appPassword="ewqbkvgxtpmcjgwg";
    //to es el receptor. ej= $to = $email;
    //subject es el título. ej= $subject = "Restablecer contraseña";
    //message es el contenido. ej= $message = "Para restablecer tu contraseña, copia y pega el siguiente enlace: \n\n$resetUrl";
    //$message .= "\n\nEste enlace expirará en 1 hora.";
    $mail = new PHPMailer(true);
    // $mail->SMTPDebug = 2; // Habilita la salida de depuración detallada
    // $mail->Debugoutput = 'html'; // Formatea la salida como HT
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'tiendasport53@gmail.com'; // Tu correo Gmail
    $mail->Password   = $appPassword; // Tu contraseña de aplicación de Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Cambiado a SMTPS (SSL)
    $mail->Port       = 465; // Puerto para SSL

    $mail->setFrom('tiendasport53@gmail.com', 'Tienda Sport');
    $mail->addAddress($emailReceptor);

    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8'; // Asegura que los caracteres especiales se muestren correctamente
    $mail->Subject = $subject;
    $mail->Body    = $message;

    return $mail->send();
}
//FUNCIÓN PARA ENVIAR EMAILS
//FUNCIÓN PARA AGREGAR PEDIDOS AL HISTORIAL DE COMPRAS, me fallaba el trigger...
function agregarAlHistorial($pedido, $usuario){
	$con=conectar();
	$queryAgregarAlHistorial=$con->prepare("INSERT INTO historialdecompras() 
	VALUES(NULL, :compra_pedido, :compra_usuario, current_timestamp());");
	$arrayAdicionHistorial=[
		":compra_pedido"=>$pedido,
		":compra_usuario"=>$usuario
	];
	return $queryAgregarAlHistorial->execute($arrayAdicionHistorial);
}
//FUNCIÓN PARA AGREGAR PEDIDOS AL HISTORIAL DE COMPRAS
?>
<main class="">
    <div class="contenedor2">
        <form action="" method="POST" class="formulario2 form-inic2" >
            <img src="./imgs/page_icon.png" class="icon2">
            <h1 class="titulo_sesion">Tienda Sport</h1>
                <div class="form-rest2"></div>
                <input type="email" class="entrada2" name="email_usuario" placeholder="Ingrese su Email..." required>

                <input type="password" class="entrada2" name="clave_usuario" placeholder="Ingrese su contraseña..." required> 

                <button type="submit" class="submit2">Ingresar</button>
                <p class="texto2">¿No posees una cuenta? <a href="index.php?vista=registroDeUsuario">Regístrate</a></p>
        <?php 
        if (isset($_POST['email_usuario']) && isset($_POST['clave_usuario'])){
            require_once('./logica/login.php');
        }
        ?>
        </form>
    </div>
</main>
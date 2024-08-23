<header> 
        <span> <img src="./imgs/page_icon.png" alt="Icono de página"> <span>Tienda Sport</span> </span> 
        
        <ul>
            <li class="cart-button"> <a href="index.php?vista=cart"> <span class="material-symbols-outlined">shopping_cart</span> </a> </li>
            <li class="account-button"> 
                <label for="account-toggler" class="account">
                    <span class="material-symbols-outlined">account_circle</span>
                    <?php if(!isset($_SESSION['nombre_usuario'])):?>
                    <span> Usuario </span>
                    <?php else: ?>
                    <span><?php echo $_SESSION['nombre_usuario']?></span>
                    <div class="account-info">
                        <img src="./imgs/test.png" alt="Icono de persona">
                        <span> <?php echo $_SESSION['nombre_usuario']?> </span>
                        <strong> 
                        <?php echo $_SESSION['email']?>
                        </strong>
                        <a href="index.php?vista=misPedidos"> MIS PEDIDOS </a>
                        <a href="index.php?vista=cerrarSesion"> CERRAR SESIÓN </a>
                    </div>
                    <?php endif; ?>
                </label>	        
            </li>     

            <li class="cart-button"> <a href="index.php?vista=iniciarSesion" class="iniciarsesion"> INICIAR SESIÓN </a> </li>
        </ul>
        <input type="checkbox" name="" id="account-toggler" class="account-toggler">

    </header>
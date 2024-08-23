<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Tienda web de productos deportivos"/>
    <meta name="author" content="Fausto Díaz Carmody, Valentina Saavedra & Santiago Henze" />
    <meta name="robots" content="Productos deportivos"/>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel="stylesheet" href="./estilo/basic.css">
    <link rel="stylesheet" href="./estilo/load.css">
    <link rel="stylesheet" href="./estilo/cart.css">
    <link rel="stylesheet" href="./estilo/admin.css">
    <link rel="stylesheet" href="./estilo/registro.css">
    <link rel="stylesheet" href="./estilo/iniciarSesion.css">
    <link rel="stylesheet" href="./estilo/adminMenu.css">
    <link rel="stylesheet" href="./estilo/gestionEtiquetas.css">
    <link rel="stylesheet" href="./estilo/gestionUsuarios.css">
    <link rel="stylesheet" href="./estilo/gestionDePedidos.css">
    <link rel="stylesheet" href="./estilo/gestionProductos.css">

    <link rel="icon" href="./imgs/page_icon.png">

    <!-- SCRIPT DARKMODE -->
    <script>

        const storageTheme = localStorage.getItem('theme');
        const systemColorScheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';

        const newTheme = storageTheme ?? systemColorScheme;

        document.documentElement.setAttribute('data-theme', newTheme);

    </script>

    <!-- SCRIPT LOAD -->
    <script>

        window.onload = function(){
        var contenedor = document.getElementById('contenedor_carga');

        contenedor.style.visibility = 'hidden';
        contenedor.style.opacity = '0';
        }

    </script>
    <script src="./logica/scripts/darkmodescroll.js"></script>

    <title>Tienda Sport</title>
</head>
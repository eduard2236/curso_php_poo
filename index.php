<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="assets/css/styles.css"/>
</head>
<body>  
        <!--HEADER-->
        <header id="header">
            <div id="logo" >
                <img src="assets/img/camiseta.png" alt="logo de camiseta" />
                <a href="index.php"> Tienda de camisetas </a>
            </div>
        </header>

        <!--MAIN-->
        <nav>
            <ul>
                <li>
                    <a href="#" >categoria 1</a>
                </li>
                <li>
                    <a href="#" >categoria 2</a>
                </li>
                <li>
                    <a href="#" >categoria 3</a>
                </li>
                <li>
                    <a href="#" >categoria 4</a>
                </li>
                <li>
                    <a href="#" >categoria 5</a>
                </li>
                <li>
                    <a href="#" >categoria 6</a>
                </li>
            </ul>
        </nav>
        <div id="content">
        <!--SIDEBAR-->
        <aside id="lateral">
            <div id="login" class="block_aside">
                <form>
                    <label for="email">Email</label>
                    <input type="email" name="email"/>
                    
                    <label for="password">Contraseña</label>
                    <input type="password" name="password"/>
                    
                    <input type="submit" value="Ingresar"/>

                    <a href="#">mis pedidos</a>
                    <a href="#">gestionar pedidos</a>
                    <a href="#">gestionar categorias</a>
                </form>
            </div>
        </aside>
        <!--central content-->
            <div id="central">
                <div class="product">
                    <img src="assets/img/camiseta.png">
                    <h2>camiseta suave</h2>
                    <p>30 dolares</p>
                    <a href="#">Comprar</a>
                </div>

                <div class="product">
                    <img src="assets/img/camiseta.png">
                    <h2>camiseta suave</h2>
                    <p>30 dolares</p>
                    <a href="#">Comprar</a>
                </div>

            </div>
        </div>
        <!--footer-->
        <footer>
            <p> Desarrollado por Eduard Colmenares &copy; <?= date('y')?> </p>
        </footer>
</body>
</html>
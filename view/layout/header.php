<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="<?=base_url?>assets/css/styles.css"/>
</head>
<body>  
        <!--HEADER-->
        <div id="container">
        <header id="header">
            <div id="logo" >
                <img src="<?=base_url?>assets/img/camiseta.png" alt="logo de camiseta" />
                <a href="<?=base_url?>"> Tienda de camisetas </a>
            </div>
        </header>

        <!--MAIN-->
        <?php $categorias = utils::showCategorias();?>
        <nav id="menu">
            <ul>
                <li>
                    <a href="<?=base_url?>" >Inicio</a>
                </li>
               <?php while($cat = $categorias->fetch_object()): ?>
                    <li>
                        <a href="#" ><?=ucfirst($cat->nombre)?></a>
                    </li>
               <?php endwhile; ?>
                
            </ul>
        </nav>
        <div id="content">
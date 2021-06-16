 <!--SIDEBAR-->
 <aside id="lateral">
     <?php if(isset($_SESSION['carrito'])):?>
     <div class="carrito">
        <h3>Mi Carrito</h3>
        <ul class="carrito">
            <?php $stats = Utils::statsCarrito();?>
            <li><a href="<?=base_url?>carrito/index">Productos (<?=$stats['count']?>) units (<?=$stats['unidades']?>)</a></li>
            <li><a href="<?=base_url?>carrito/index">Total <?=$stats['total']?> $</a></li>
            
        </ul>
     </div>
     <?php endif; ?>
     <div id="login" class="block_aside">
         <?php if (!isset($_SESSION['identity'])) : ?>
             <h3>Entrar a la web</h3>
             <?php if (isset($_SESSION['error_login'])) : ?>
            <strong class="alert_red"> <?= $_SESSION['error_login']?> </strong>
            <?php endif;?>
             <form action="<?=base_url?>usuario/login" method="POST">
                 <label for="email">Email</label>
                 <input type="email" name="email"/>

                 <label for="password">Contraseña</label>
                 <input type="password" name="password" />

                 <input style="display: inline-block;" type="submit" value="Ingresar" />
                 <input style="display: inline-block; margin-left: 45px;" type="button" value="Registrarse" onClick="location.href='<?= base_url ?>usuario/registro'" />
                
             </form>
         <?php else : ?>
             <h3><?= $_SESSION['identity']->nombre ?> <?= $_SESSION['identity']->apellidos ?></h3>
         <?php endif; ?>
         <ul>
         <?php if(isset($_SESSION['admin'])):?>
             <li><a href="<?=base_url?>categoria/index">Gestionar categorias</a></li>
             <li><a href="<?=base_url?>productos/gestion">Gestionar productos</a></li>
             <li><a href="<?=base_url?>pedidos/gestion">Gestionar pedidos</a></li>
        <?php endif; ?>
        <?php if(isset($_SESSION['identity'])):?>
             <li><a href="<?=base_url?>pedidos/mis_pedidos">Mis pedidos</a></li>
             <li><a href="<?=base_url?>usuario/logout">Cerrar Session</a></li>
        <?php endif; ?>
         </ul>
         <?php utils::deleteSession('error_login'); ?>
     </div>
 </aside>
 <!--central content-->
 <div id="central">
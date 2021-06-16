<h1>Carrito de compras</h1>
<?php if(isset($carrito) && $carrito != null): ?>
<table>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
        <th>Accion</th>
    </tr>
    <?php
        
        foreach($carrito as $indice => $elemento):
        $producto = $elemento['producto'];
    ?>
    <tr>
        <td>
                <?php if ($producto->imagen != null) : ?>
                      <img src="<?= base_url ?>./uploads/images/<?= $producto->imagen ?>" alt="imagen <?= $producto->nombre ?>" class="img_carrito">
                  <?php else : ?>
                      <img src="<?= base_url ?>assets/img/camiseta.png" alt="imagen <?= $producto->nombre ?>" class="img_carrito">
                  <?php endif; ?>
        </td>
        <td>
            <a href="<?=base_url?>productos/ver&id=<?=$producto->id?>" class="button-carrito"> <?=ucfirst($producto->nombre)?></a>
        </td>
        <td>
            <?=$producto->precio?> $
        </td>
        <td>
            <a href="<?=base_url?>carrito/down&index=<?=$indice?>" class="button-carrito" >< </a>
            <?=$elemento['unidades']?>
            <a href="<?=base_url?>carrito/up&index=<?=$indice?>" class="button-carrito"> ></a>
        </td>
        <td>
            <a href="<?=base_url?>carrito/delete&index=<?=$indice?>" class="button button-carrito2 button-red">Eliminar</a>
        </td>
    </tr>
       <?php endforeach ?>
                
</table>
<br/>
<div class="delete-carrito">
    <a href="<?=base_url?>carrito/delete_all" class="button button-red">Vaciar carrito</a>
</div>
<div class="carrito-precio">
    <?php $stats = Utils::statsCarrito();?> 
    <h3>Precio Total: <?=$stats['total'] ?> $</h3>
    <a href="<?=base_url?>pedidos/hacer" class="button button-pedido">Efectuar Pedido</a>
</div>
        <?php else : ?> 
        <h3>No hay productos en el carrito</h3>
       <?php endif; ?>
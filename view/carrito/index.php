<h1>carrito de compras</h1>
<table>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
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
            <a href="<?=base_url?>productos/ver&id=<?=$producto->id?>"> <?=$producto->nombre?></a>
        </td>
        <td>
            <?=$producto->precio?> $
        </td>
        <td>
            <?=$elemento['unidades']?>
        </td>
    </tr>
       <?php endforeach ?>             
</table>
<br/>
<div class="carrito-precio">
    <?php $stats = Utils::statsCarrito();?> 
    <h3>Precio Total: <?=$stats['total'] ?> $</h3>
    <a href="<?=base_url?>" class="button button-pedido">Efectuar Pedido</a>
</div>
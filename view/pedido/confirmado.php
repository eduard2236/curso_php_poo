<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete') : ?>
    <H1>tu pedido se ha confirmado</H1>
    <p>Tu pedido ha sido guardado con exito una vez que realices la transferencia bancaria al 0102032566887772252963 bdvz con el coste del pedido, sera procesado y enviado</p>
    <br/>
    <?php if(isset($pedido)):?>
    <h3>Datos del pedido</h3>
    <br/>
    
    Numero de pedido:  <?=$pedido->id ?>  <br/>
    Total a pagar:     <?=$pedido->coste ?> $ <br/>
    <br/>
    Productos:           <br/>
    <table>
    <tr>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
    </tr>
    <?php while($producto = $productos->fetch_object()): ?>
    <tr>
        <td>
            <?=$producto->nombre?></a>
        </td>
        <td>
            <?=$producto->precio?> $
        </td>
        <td>
        <?= $producto->unidades ?>
        </td>
    </tr>   
    <?php endwhile; ?>   
</table>
   
   
    <?php endif; ?>
<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete') : ?>
    <h1>Tu pedido No ha podido procesarse</h1>
<?php endif; ?>
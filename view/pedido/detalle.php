<h1>Detalle del pedido</h1>
<?php if(isset($pedido)):?>
    <?php if(isset($_SESSION['admin'])):?>
        <h3>Cambiar estado del pedido</h3>
        <br/>
        <form action="<?=base_url?>pedidos/estado" method="POST">
            <input type="hidden" value="<?=$pedido->id?>" name="pedido_id">
            <select name="estado">
                <option value="confirm"<?=$pedido->situacion == "confirm" ? 'selected' : '';?> >Pendiente</option>
                <option value="preparation" <?=$pedido->situacion == "preparation" ? 'selected' : '';?> >En preparacion</option>
                <option value="ready" <?=$pedido->situacion == "ready" ? 'selected' : '';?> >Preparado para enviar</option>
                <option value="sended" <?=$pedido->situacion == "sended" ? 'selected' : '';?> >Enviado</option>
            </select>
            <input type="submit" value="cambiar estado" class="button-red"/>
        </form>
        <br/>
    <?php endif ;?> 
    <h3>Datos del usuario</h3>
    <br/>
    <?php $usuario = $usuarios->fetch_object() ?>
    
        Nombre: <?=$usuario->nombre?> <br/>
        
        Apellido: <?=$usuario->apellidos?> <br/>
       

    <br/>
    <h3>Datos del Envio</h3>
    <br/>
    Situacion: <?=Utils::showEstado($pedido->situacion)?>  <br/>
    Pais:  <?=$pedido->pais ?>  <br/>
    Estado:     <?=$pedido->estado ?> <br/>
    Direccion:     <?=$pedido->direccion ?> <br/>
    <br/>

    <h3>Datos del pedido</h3>
    <br/>
    
    Numero de pedido:  <?=$pedido->id ?>  <br/>
    Total a pagar:     <?=$pedido->coste ?> $ <br/>
    <br/>
    <h3>Productos:</h3>           <br/>
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
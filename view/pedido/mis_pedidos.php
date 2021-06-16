<?php if(isset($gestion)): ?>
<h1>Gestionar pedidos</h1>
<?php else : ?> 
<h1>Mis pedidos</h1>
<?php endif ;?>

<?php if(is_object($resultado)){
    $result = $resultado->usuarios_id ;
} ?>
<?php $usuario = $_SESSION['identity'];?>


<?php if(isset($result) && $result == $usuario->id) :?>
<table>
    <tr>
        <th>Nº Pedido</th>
        <th>Coste</th>
        <th>Fecha</th>
        <th>Estado</th>
    </tr>
    <?php 
        while($ped = $pedidos->fetch_object()):
    ?>
    <tr>
        <td>
               <a href="<?=base_url?>pedidos/detalle&id=<?=$ped->id?>" ><?=$ped->id?></a>
        </td>
        <td>
               <?=$ped->coste?> $
        </td>
        <td>
               <?=$ped->fecha?>
        </td>
        <td>
                <?=Utils::showEstado($ped->situacion)?>
        </td>
    </tr>
       <?php endwhile ?>             
</table>
<?php else: ?>
    <h3 class="carrito_logueo">No tiene pedidos efectuados, realice una compra para visualizar un pedido y su detalle</h3>
<?php endif; ?>
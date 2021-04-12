<h1>Productos</h1>
<a href="<?= base_url ?>productos/crear" class="button button-small"> Crear Producto</a>
<?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == "complete") : ?>
    <strong class="alert_green"> Se ha creado el producto correctamente </strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] == "failed"): ?>
    <strong class="alert_red"> Falla al guardar el producto</strong>
<?php endif; ?>

<?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == "exitoso") : ?>
    <strong class="alert_green"> Se ha eliminado el producto correctamente </strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] == "fallido"): ?>
    <strong class="alert_red"> Falla al eliminar el producto</strong>
<?php endif; ?>
<table border="1" >
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>STOCK</th>
        <th>ACCIONES</th>

    </tr>
    <?php while ($pro = $productos->fetch_object()) : ?>
        <tr>
            <td><?= $pro->id; ?></td>
            <td><?= $pro->nombre; ?></td>
            <td><?= $pro->precio; ?></td>
            <td><?= $pro->stock; ?></td>
            <td>
                <div class="alinear">
                <a href="<?=base_url?>productos/editar&id=<?=$pro->id?>" class="button button-green">Editar</a>
                <a href="<?=base_url?>productos/eliminar&id=<?=$pro->id?>" class="button button-red">Eliminar</a>
                </div>
            </td>
            
        </tr>
    <?php endwhile; ?>
</table>
<?php utils::deleteSession('producto') ?>

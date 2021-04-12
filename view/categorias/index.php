<h1>Categorias</h1>
<a href="<?= base_url ?>categoria/crear" class="button button-small"> Crear Categoria</a>
<?php if (isset($_SESSION['categoria']) && $_SESSION['categoria'] == "complete") : ?>
    <strong class="alert_green"> Se ha creado la categoria correctamente </strong>
<?php elseif(isset($_SESSION['categoria']) && $_SESSION['categoria'] == "failed"): ?>
    <strong class="alert_red"> Falla al guardar en la bd </strong>
<?php endif; ?>
<table border="1" style="margin-top: 15px;">
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
    </tr>
    <?php while ($cat = $categorias->fetch_object()) : ?>
        <tr>
            <td><?= $cat->id; ?></td>
            <td><?= $cat->nombre; ?></td>
        </tr>
    <?php endwhile; ?>
</table>
<?php utils::deleteSession('categoria') ?>

<h1>Crear nueva categoria</h1>

<form action="<?= base_url ?>categoria/save" method="POST">
    <label for="nombre" style="margin-bottom: 10px;">Nombre</label>
    <?php if(isset($_SESSION['error_num'])) :?>
        <strong class="alert_red"> Falla al guardar la categoria </strong>
    <?php endif; ?>
    <input type="text" name="nombre" style="margin-top: 10px;" required/>
    <div style="text-align: center; margin-top: 20px">
        <input style="display: inline-block; width:10%;" type="submit" value="Guardar" />
        <input style="display: inline-block; margin-left: 30px; width: 10%" type="button" value="Regresar" onClick="location.href='<?= base_url ?>categoria/index'" />
    </div>
</form>
<?php utils::deleteSession('error_num') ?>
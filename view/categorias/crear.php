<h1>Crear nueva categoria</h1>

<form action="<?= base_url ?>categoria/save" method="POST">
    <label for="nombre" style="margin-bottom: 10px;">Nombre</label>
    <?php if(isset($_SESSION['categoria']) ?? $_SESSION['categoria'] == "failed_num") :?>
        <strong class="alert_red"> el nombre de la categoria no es aceptado intente nuevamente</strong>
    <?php endif; ?>
    <input type="text" name="nombre" style="margin-top: 10px;" />
    <div style="text-align: center; margin-top: 20px">
        <input style="display: inline-block; width:10%;" type="submit" value="Guardar" />
        <input style="display: inline-block; margin-left: 30px; width: 10%" type="button" value="Regresar" onClick="location.href='<?= base_url ?>categoria/index'" />
    </div>
</form>
<?php utils::deleteSession('categoria') ?>
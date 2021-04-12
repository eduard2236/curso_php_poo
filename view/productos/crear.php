<H1>Crear nuevo producto</H1>
<div class="form">
<form action="<?= base_url ?>productos/save" method="POST" enctype="multipart/form-data">

    <label for="nombre" style="margin-bottom: 10px;">Nombre</label>
    <input type="text" name="nombre" style="margin-top: 10px;" />

    <label for="descripcion" >descripcion</label>
    <textarea name="descripcion"></textarea>

    <label for="precio" >Precio</label>
    <input type="number" name="precio"  required/>

    <label for="stock" >Stock</label>
    <input type="number" name="stock" required/>

    <label for="categoria" style="margin-bottom: 10px;">Categoria</label>
    <?php $categorias = utils::showCategorias(); ?>
    <select name="categoria" >
                <?php while($cat = $categorias->fetch_object()): ?>
                    <option value="<?=$cat->id ?>">
                        <?=ucfirst($cat->nombre)?>
                    </option>
               <?php endwhile; ?>
    </select>

    <label for="imagen" >Imagen</label>
    <input type="file" name="imagen" />



    <div style="text-align: center; margin-top: 20px ">
        <input style="display: inline-block; " type="submit" value="Guardar" />
        <input style="display: inline-block; " type="button" value="Regresar" onClick="location.href='<?= base_url ?>productos/gestion'" />
    </div>
</form>
</div>
<?php utils::deleteSession('error_num') ?>
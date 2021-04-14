<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
    <H1>editar producto <?=$pro->nombre?></H1>
    <?php $url_action = base_url."productos/save&id=".$pro->id; ?>
<?php else: ?>
    <H1>Crear nuevo producto</H1>
    <?php $url_action = base_url."productos/save"; ?>
<?php endif; ?>

<div class="form">
<form action="<?= $url_action ?>" method="POST" enctype="multipart/form-data">

    <label for="nombre" style="margin-bottom: 10px;">Nombre</label>
    <input type="text" name="nombre" style="margin-top: 10px;" value="<?=isset($pro) && is_object($pro) ? $pro->nombre : ''; ?>"/>

    <label for="descripcion" >descripcion</label>
    <textarea name="descripcion" ><?=isset($pro) && is_object($pro) ? $pro->descripcion : ''; ?></textarea>

    <label for="precio" >Precio</label>
    <input type="number" name="precio"  value="<?=isset($pro) && is_object($pro) ? $pro->precio : ''; ?>" required />

    <label for="stock" >Stock</label>
    <input type="number" name="stock" value="<?=isset($pro) && is_object($pro) ? $pro->stock : ''; ?>" required/>

    <label for="categoria" style="margin-bottom: 10px;">Categoria</label>
    <?php $categorias = utils::showCategorias(); ?>
    <select name="categoria" >
                <?php while($cat = $categorias->fetch_object()): ?>
                    <option value="<?=$cat->id ?>" <?=isset($pro) && is_object($pro) && $cat->id == $pro->categorias_id ? 'selected' : ''; ?> >
                        <?=ucfirst($cat->nombre)?>
                    </option>
               <?php endwhile; ?>
    </select>

    <label for="imagen" >Imagen</label>
    <?php if(isset($pro) && is_object($pro) && !empty($pro->imagen)) : ?>
        <img src="<?=base_url?>/uploads/images/<?=$pro->imagen?>" class="resize"/>
    <?php endif; ?> 
    <input type="file" name="imagen" />

    <div style="text-align: center; margin-top: 20px ">
        <input style="display: inline-block; " type="submit" value="Guardar" />
        <input style="display: inline-block; " type="button" value="Regresar" onClick="location.href='<?= base_url ?>productos/gestion'" />
    </div>
</form>
</div>
<?php utils::deleteSession('error_num') ?>
  <div id="modal1">
      <?php if (isset($pro)) : ?>
          <div id="product-detail">
              <h1> <?= $pro->nombre ?> </h1>
              <div class="image">
                  <?php if ($pro->imagen != null) : ?>
                      <img src="<?= base_url ?>./uploads/images/<?= $pro->imagen ?>" alt="imagen <?= $pro->nombre ?>">
                  <?php else : ?>
                      <img src="<?= base_url ?>assets/img/camiseta.png" alt="imagen <?= $pro->nombre ?>">
                  <?php endif; ?>
              </div>
              <div class="data">
                  <p class="description"><?= $pro->descripcion ?></p>
                  <p class="price"><?= $pro->precio ?> $</p>
                  <a href="<?=base_url?>carrito/add&id=<?=$pro->id?>" class="button">Comprar</a>
                  <a href="<?=base_url?>categoria/ver&id=<?=$pro->categorias_id?>" class="button2">Regresar</a>
              </div>
          </div>
      <?php else : ?>
          <h1>No hay productos disponibles en esta categoria </h1>
      <?php endif; ?>
  </div>

                <h1> <?= ucfirst($categori->nombre)?> </h1>
                <?php if($productos->num_rows == 0 ) :?>
                    <h1 class="carrito_logueo">No hay productos disponibles en esta categoria </h1>
                <?php else :?>
                <?php while($produ = $productos->fetch_object()) : ?>
                <div class="product">
                    <a href="<?=base_url?>productos/ver&id=<?=$produ->id?>">
                    <?php if($produ->imagen != null) : ?>
                    <img src="<?=base_url?>./uploads/images/<?=$produ->imagen?>" alt="imagen <?=$produ->nombre?>">
                    <?php else: ?>
                        <img src="<?=base_url?>assets/img/camiseta.png" alt="imagen <?=$produ->nombre?>">
                    <?php endif ;?>
                    <h2><?=ucfirst($produ->nombre)?></h2>
                    </a>
                    <p><?= $produ->precio?> $</p>
                    <a href="<?=base_url?>carrito/add&id=<?=$produ->id?>" class="button">Comprar</a>
                </div>
                <?php endwhile ;?>
                <?php endif; ?>
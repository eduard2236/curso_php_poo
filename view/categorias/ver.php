
                <h1> <?= $categori->nombre?> </h1>
                <?php if($productos->num_rows == 0 ) :?>
                    <h1>No hay productos disponibles en esta categoria </h1>
                <?php else :?>
                <?php while($produ = $productos->fetch_object()) : ?>
                <div class="product">
                    <a href="<?=base_url?>productos/ver&id=<?=$produ->id?>">
                    <?php if($produ->imagen != null) : ?>
                    <img src="<?=base_url?>./uploads/images/<?=$produ->imagen?>" alt="imagen <?=$produ->nombre?>">
                    <?php else: ?>
                        <img src="<?=base_url?>assets/img/camiseta.png" alt="imagen <?=$produ->nombre?>">
                    <?php endif ;?>
                    <h2><?= $produ->nombre ?></h2>
                    </a>
                    <p><?= $produ->precio?> $</p>
                    <a href="#" class="button">Comprar</a>
                </div>
                <?php endwhile ;?>
                <?php endif; ?>
<!--central content-->

            <h1>algunos de nuestros productos</h1>
                <?php while($produ = $productos->fetch_object()) : ?>
                <div class="product">
                    <?php if($produ->imagen != null) : ?>
                    <img src="<?=base_url?>./uploads/images/<?=$produ->imagen?>" alt="imagen <?=$produ->nombre?>" >
                    <?php else: ?>
                        <img src="<?=base_url?>assets/img/camiseta.png" alt="imagen <?=$produ->nombre?>" >
                    <?php endif ;?>
                    <h2><?= $produ->nombre ?></h2>
                    <p><?= $produ->precio?></p>
                    <a href="#" class="button">Comprar</a>
                </div>
                <?php endwhile ;?>
                
            
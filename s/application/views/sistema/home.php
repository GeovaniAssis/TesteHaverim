    <div class="row">
        <?php 
            foreach ( $_SESSION['modulos_cadastrar'] as $modulo ) :
        ?>
            <div class="col-lg-6">
                <a href="<?php echo base_url('');?><?php echo $modulo["ds_modulo"]; ?>/cadastrar">
                    <div class="card">
                        <p class="texto">Cadastrar novo <br><span><?php echo $modulo["nm_resumido_modulo"]; ?></span></p>
                        <p class="mais">+</p>
                    </div>
                </a>
            </div>
        <?php
            endforeach;
        ?>
    </div>
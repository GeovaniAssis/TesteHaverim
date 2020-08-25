    	<footer>
    		<div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <hr>
                        <img class="logo" alt="Logo Haverim" src="<?php bloginfo('template_url');?>/imgs/logo/logo.png">
                    </div>
                </div>
                <div class="row">

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 mrg__bot--25">
                        <img class="icon" alt="Imagem Pin" src="<?php bloginfo('template_url');?>/imgs/icon/pin.png">
                        <p><?php the_field('logradouro'); ?></p>
                        <p><?php the_field('bairro'); ?> | <?php the_field('cidade'); ?> | <?php the_field('cep'); ?></p>
                        <p class="destaque">endereço para correspondência</p>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 mrg__bot--25">
                        <img class="icon" alt="Imagem Pin" src="<?php bloginfo('template_url');?>/imgs/icon/email.png">
                        <p><?php the_field('email'); ?></p>
                        <p> &nbsp; </p>
                        <p class="destaque">fale conosco</p>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 mrg__bot--25">
                        <img class="icon" alt="Imagem Pin" src="<?php bloginfo('template_url');?>/imgs/icon/telefone.png">
                        <p><?php the_field('telefone'); ?></p>
                        <p><?php the_field('celular'); ?></p>
                        <p class="destaque">tel para contato</p>
                    </div>
                </div>
            </div>
            <div class="final">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <p>2018 - Haverim - Todos os direitos reservados.</p>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 centro">
                            <a href="http://www.marcasite.com.br"><img  alt="Logo Marca Site" src="<?php bloginfo('template_url');?>/imgs/logo/marcasite.png"></a>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 direita">
                            <p>
                                <a href="<?php echo bloginfo('url'); ?>">Home</a> | <a href="<?php echo bloginfo('url'); ?>/o-grupo/">O grupo</a> | <a href="<?php echo bloginfo('url'); ?>/atuacao/">Atuação</a> | <a href="<?php echo bloginfo('url'); ?>/produtos/">Produtos</a> | <a href="<?php echo bloginfo('url'); ?>/contato/">Contato</a> 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
    	</footer>
        
    	<script src="<?php bloginfo('template_url');?>/js/vendor/jquery-3.3.1.js"></script>
        <script src="<?php bloginfo('template_url');?>/js/vendor/bootstrap.js"></script>
        <script src="<?php bloginfo('template_url');?>/js/vendor/jquery.mask.js"></script>
        <script src="<?php bloginfo('template_url');?>/js/vendor/jquery.validate.js"></script>
        <script src="<?php bloginfo('template_url');?>/js/vendor/slick.js"></script>
        <script src="<?php bloginfo('template_url');?>/js/functions.js"></script>

    </body>
</html>
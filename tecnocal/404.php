<?php get_header(); ?>

    <section class="titulo-top">
        <div class="container">
            <div class="row bord--left">
                <img src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-x.png" style="margin-top: 5px;">
                <h2>ERRO 404</h2>
            </div>
        </div>
    </section>

    <section>
    	<div class="container erro-404">
    		<div class="row">
    			<div class="col-lg-12 txt--cent">
    				<img src="<?php echo bloginfo('template_url'); ?>/img/404.jpg" class="mrg--70-0 max-wdt--100">

    				<p>Ops, a página que você procurou não foi encontrada</p>

    				<p><b>Vá para a página de empreendimentos clicando abaixo</b></p>
    				
    			</div>
    		</div>
    		<div class="row">
				<a href="<?php echo bloginfo('url'); ?>/empreendimento">
					<div class="btn-tecnocal">
						EMPREENDIMENTOS
					</div>
				</a>
			</div>
    	</div>
    </section>



<?php get_footer('interno');?>
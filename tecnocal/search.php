<?php 
    // Template Name: Busca
    session_start();
    $_SESSION['pagina'] = "noticias";

    get_header();
?>
    <section class="titulo-top">
        <div class="container">
            <div class="row bord--left">
                <img src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-pesquisa-titulo.png" style="margin-top: 5px;">
                <h2>Pesquisando por: <?php echo $_GET['s']; ?></h2>
            </div>
        </div>
    </section>

    <section id="index-noticias">
        <div class="container">
            <div class="row">

                <div id="barra-lateral" class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                    <?php get_search_form(); ?>

                    <div id="categorias">
                        <h3 class="col-xs-12">CATEGORIAS</h3>
                                
                        <div>
                            <?php
                                wp_list_categories( 
                                    array(
                                        'show_count'        => false,
                                        'title_li'          => '',
                                        'hierarchical'      => true,
                                        'exclude'           => '1'
                                    ) 
                                );
                            ?>
                        </div>

                        <img class="img-banner" src="<?php echo bloginfo('template_url'); ?>/img/residencial/praia-recreio/mini-banner.jpg"> 

                    </div>

                </div>

                <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12">

					<?php if ( have_posts() ) { ?>

						<?php while (have_posts()) : the_post(); ?> 

                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <div class="col-xl-12 card">

                                    <div class="img">
                                        <?php if ( has_post_thumbnail( $post->ID ) ): ?>

                                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>

                                            <?php 
                                                $d = 0;
                                                $categories = get_the_category( $post_ID );
                                                foreach ( $categories as $category ) {
                                                    if( $category->name == "Vídeos" ) { $d++; };
                                                };
                                             ?>
                                            <img class="img-thumb" src="<?php echo $image[0]; ?>" class="img-responsive imagem-destaque" <?php if( $d >= 1 ) { ?> style="filter: brightness(0.5);" <?php } ?> >

                                        <?php else: ?>

                                            <?php 
                                                $d = 0;
                                                $categories = get_the_category( $post_ID );
                                                foreach ( $categories as $category ) {
                                                    if( $category->name == "Vídeos" ) { $d++; };
                                                };
                                             ?>
                                            <img class="img-thumb" src="<?php bloginfo('template_url') ?>/img/tumb-tecnocal.jpg" class="img-responsive imagem-destaque" <?php if( $d >= 1 ) { ?> style="filter: brightness(0.5);" <?php } ?> >

                                        <?php endif; ?>

                                        <?php
                                            $i = 0;
                                            $categories = get_the_category( $post_ID );
                                            foreach ( $categories as $category ) {
                                                if( $category->name == "Vídeos" ) { $i++; };
                                            };

                                            if( $i >= 1 ) { ?>
                                                <img class="img-cat" src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-play-branco.png">

                                                <img class="img-play" src="<?php echo bloginfo('template_url'); ?>/img/icon/play.png">
                                            <?php }else{ ?>
                                                <img class="img-cat" src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-livro.png">
                                            <?php } 
                                        ?> 
                                    </div>

                                    <div class="data">
                                        <?php the_time('d/m/Y');?>
                                    </div>

                                    <div class="text">
                                        <p class="titulo"><?php echo $post->post_title;?></p>

                                        <p class="txt">
                                            <?php echo excerpt(60); ?>
                                        </p>

                                        <div class="bolq-seta1"></div>
                                        <div class="bolq-seta2"></div>

                                        <p class="p-cat">
                                            <b>Categorias: </b>
                                            <?php 
                                                $categories = get_the_category( $post_ID );
                                                foreach ( $categories as $category ) {
                                                    echo $category -> cat_name;
                                                    echo "; ";

                                                };
                                            ?>
                                        </p>

                                    </div>

                                    <hr>  

                                </div>
                            </a>


                        <?php endwhile;?>
                    <?php }else{ ?>

                        <div class="col-xl-12 card">
	                        <h2>Nenhuma resultado encontrado</h2>
	                    </div>

                    <?php } ?>

                    <div class="col-xs-12 p-0 pager">
                        <?php 
                        wp_pagenavi( array( 'query' => $wp_query ) );
                        ?>
                    </div>

                </div>

            </div>
        </div>
    </section>

<?php 
    get_footer();
?>
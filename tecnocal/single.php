<?php 
    // Single Post Template: Sigle Notícias
    session_start();

    $i = 0;
    while (have_posts()) : the_post();
        $categories = get_the_category( $post_ID );
        foreach ( $categories as $category ) { if( $category->name == "Vídeos" ) { $i++; }; };
    endwhile;

    if( $i >= 1 || $i == "1" ) { $_SESSION['pagina'] = "videos"; }
    else{ $_SESSION['pagina'] = "noticias"; }

    get_header();
?>

    <section class="titulo-top">
        <div class="container">
            <div class="row bord--left">
                <?php 
                    if( $i >= 1 || $i == "1" ) { ?>

                        <img src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-play-titulo-branco.png" style="margin-top: 5px;" alt="icone-play">
                        <h2>Vídeos</h2>

                    <?php }else{ ?>

                        <img src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-noticias-titulo.png" style="margin-top: 5px;" alt="icone-noticias">
                        <h2>Notícias</h2>

                    <?php }
                 ?>
            </div>
        </div>
    </section>

    <section id="index-noticias">
        <div class="container">
            <div class="row">

                <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12">
					<?php while (have_posts()) : the_post(); ?>

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
                                    <img class="img-thumb" src="<?php echo $image[0]; ?>" class="img-responsive imagem-destaque" alt="icone-thumb-noticias" >

                                <?php else: ?>

                                    <?php 
                                        $d = 0;
                                        $categories = get_the_category( $post_ID );
                                        foreach ( $categories as $category ) {
                                            if( $category->name == "Vídeos" ) { $d++; };
                                        };
                                     ?>
                                    <img class="img-thumb" src="<?php bloginfo('template_url') ?>/img/tumb-tecnocal.jpg" class="img-responsive imagem-destaque" alt="foto-thumb-noticias" >

                                <?php endif;
                                
                                    $i = 0;
                                    $categories = get_the_category( $post_ID );
                                    foreach ( $categories as $category ) {
                                        if( $category->name == "Vídeos" ) { $i++; };
                                    };

                                    if( $i >= 1 ) { ?>
                                        <img class="img-cat" src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-play-branco.png" alt="icone-play">

                                    <?php }else{ ?>
                                        <img class="img-cat" src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-livro.png" alt="icone-livro">
                                    <?php } 
                                ?> 
                            </div>

                            <div class="data">
                                <?php the_time('d/m/Y');?>
                            </div>

                            <div class="text">
                                <p class="titulo"><?php echo $post->post_title; ?></p>
								
								<br><br>

                                <div class="txt">
                                    <?php the_content(); ?>
                                </div>

                                <br>

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

                        </div>

						<div>
							<?php// include('comments.php');?>							
						</div>

					<?php endwhile; ?>
                </div>

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

                        <img class="img-banner" src="<?php echo bloginfo('template_url'); ?>/img/residencial/praia-recreio/mini-banner.jpg" alt="foto-mini-banner"> 

                    </div>

                </div>

            </div>
        </div>
    </section>

<?php 
    get_footer();
?>
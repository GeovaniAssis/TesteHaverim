<!-- 
*   Menu lateral de notícias
*	Útil: caso você tenha mais de um menu lateral, salve os arquivos como 'sidebar-nome.php' e na chamada 'get_sidebar("nome");'
 -->
<aside class="sidebar col-md-3 col-sm-5 col-xs-12" >

	<div class="col-xs-12">
		<h3>Leia também</h3>
		
   		<?php 
			$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
			$args = array(
				'posts_per_page' => 3,
				'paged' => $paged
			);
			$wp_query = new WP_Query( $args );
		?>

		<?php if ( $wp_query->have_posts() ) : ?>	 							
			
			<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >		

						<div class="col-xs-12 p-0">
							 <div class="col-xs-5 p-0">
								<?php the_post_thumbnail('post-thumbnail', array('class' => '')); ?>	
							</div>
							<div class="col-xs-7">
								<?php echo excerpt(6);?> ...
							</div>												
						</div>

				</a>
			<?php endwhile;?>

		<?php endif; ?>
	</div>

	<!-- Categorias -->
	<div id="categorias" class="col-xs-12">
		<h3 class="col-xs-12">CATEGORIAS</h3>
				
		<ul class="col-xs-12">
		    <?php
		    wp_list_categories( 
		     	array(
			        'show_count'		=> false,
			        'title_li' 			=> '',
			        'hierarchical'		=> true
	    		) 
	    	);
	    	?>
	    </ul> 
	</div>

</aside>

<section id="blog" class="bloco-branco pad__bot--70">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 titulo">
				<p class="font--open-sans">nosso blog</p>
				<h2 class="font--open-sans">Dicas de saúde</h2>
				<hr>
			</div>
		</div>
		<div class="row conteudo">
			<?php 
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 0;
				$the_query = new WP_Query( 'posts_per_page=2&paged=' . $paged ); 
				if ( $the_query->have_posts() ) :
					while ($the_query->have_posts()) : $the_query->the_post();
			?>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="post-link">
								<div class="thumb">
									<?php the_post_thumbnail('post-thumbnail', array('class' => 'img-responsive')); ?>
									<span></span>
								</div>					
								<h3 class="font--roboto"><?php echo $post->post_title;?></h3>
								<p class="font--roboto">
									<?php echo the_excerpt(); ?>
								</p>
							</a>
						</div>


			<?php
					endwhile;
				else :
				endif;
			?>

		</div>
	</div>
</section>
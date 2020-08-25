<?php /*Single Post Template: Sigle Notícias*/

	if( !isset($_SESSION) ){ session_start(); }

	$_SESSION['page'] = "";

	get_header(); 
	
?>
	<section id="post">	
		<div class="container bloco-branco">
			<div class="row">
				<div class="col-lg-12 titulo">
					<p class="font--open-sans"></p>
					<h2 class="font--open-sans"><?php echo $post->post_title;?></h2>
					<hr>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<?php while (have_posts()) : the_post(); 
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
						<img src="<?php echo $image[0]; ?>" class="thumb">
						<span class="quadrado--imagem"></span>

						<div style="margin: 50px 0;">
							<p><?php the_content(); ?></p>
						</div>


					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</section>

<?php

	include ('pages/include/local.php');

	include ('pages/include/visita.php');

	get_footer();

?>
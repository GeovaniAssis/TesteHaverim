
<?php
if ( post_password_required() ) {
	return;
}
?> 

<div id="comments" class="comments-area">

	<div class="col-xs-12">
		<h2 class="pull-left" >
			<span class="text-uppercase"> Deixe seu comentário </span>
		</h2>		
	</div>

	<div class="col-lg-5 col-md-5 col-xs-12 load hidden">
		<svg width="50px" height="50px" viewBox="0 0 75 75" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
		     <circle class="circle" stroke="#FF7400" stroke-width="10" fill-rule="nonzero" fill="transparent" cx="35" cy="35" r="30"></circle>
		</svg>
	</div> 

	<!-- <?php echo get_option('siteurl'); ?>/wp-comments-post.php -->
	<form action="" method="post" id="commentform" class="comment-form" novalidate="">
		<div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<p class="comment-form-author ">  
					<label>
						<input id="author" name="author" type="text" value="" size="30" aria-required="true">
						<span > Seu nome </span>	

					</label>
					
				</p>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pr-0 xs-p-0">
				<p class="comment-form-email ">
					<label>
						<input id="email" name="email" type="email" value="" size="30" aria-required="true">
						<span > Seu e-mail </span>
					
					</label>
						
				</p>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-0">
				<p class="comment-form-comment ">   
					<label>
						<textarea id="comment" name="comment" aria-required="true"></textarea>
						<span> Seu comentário </span>	
					</label>
					
				</p>
			</div>
			<div>
				<p class="form-submit">

					<!-- <input name="submit" type="submit" id="submit" value="Enviar"> -->

					<button type="submit" id="submit" name="submit">
						Enviar
					</button>
					<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />

					
					<?php do_action('comment_form', $post->ID); ?>
				</p>
			</div>	
		</div>
			
	</form>

</div>

<!-- Comentarios do post  -->
	<?php     $comments = get_comments('status=approve&amp&parent=0'); ?>

	<ul class="comments__section">
		<?php foreach ($comments as $comment) {  ?>
			<li  >
				<div class="comment__user">
					<?php echo get_avatar( $comment, '85' ); ?>										
				</div>
				<div class="comment__comment">
					
					<strong>
						<?php echo strip_tags($comment->comment_author); ?> -

						<?php
							echo date("d", strtotime($comment->comment_date)) ." de ".($mes_extenso[date("M", strtotime($comment->comment_date))]) ." de ".date("Y", strtotime($comment->comment_date));
						?>
					</strong> <br/> 
					<p class="txt-azulescuro"><?php echo  $comment->comment_content ?></p>
					
				</div>
					
			</li>

				<?php foreach ( get_comments('status=approve&amp&parent='.$comment->comment_ID) as $comment_f): 

						
						

					?>
						
						<li class="par" >
							<div class="comment__user">
								<?php echo get_avatar( $comment_f, '85' ); ?>										
							</div>
							<div class="comment__comment">
								
								<strong>
									<?php echo strip_tags($comment_f->comment_author); ?> -
									<?php
										echo date("d", strtotime($comment->comment_date)) ." de ".($mes_extenso[date("M", strtotime($comment->comment_date))]) ." de ".date("Y", strtotime($comment->comment_date));
									?>
								</strong> <br/> 
								<p class="txt-azulescuro"><?php echo $comment_f->comment_content ?> </p>
								
							</div>
								
						</li>

				<?php endforeach;?>
		<?php }  ?>
	</ul>

<!-- Finaliza aqui -->

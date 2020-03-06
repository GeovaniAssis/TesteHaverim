<!-- Inicio do formulário de busca -->
<form id="search" role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="text-center">
									
		<input type="search" class="input-busca" name="s" placeholder="O que você está buscando?" required>
		
		<button type="submit" class="btn-busca">
			<img src="<?php echo bloginfo('template_url'); ?>/img/icon/icon-pesquisa.png" alt="icon-pesquisa">
		</button>

	</div>
</form>
<!-- Final do formulário de busca -->
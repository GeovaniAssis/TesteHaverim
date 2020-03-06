	<?php if ( $permissao == 2): ?>
	<div class="container">
		<div class="">
			<a href="<?php echo site_url('usuarios/editar/');echo $this->session->userdata('codigo'); ?>">
				<div class="col-md-12">
					<img src="<?php echo site_url('assets');?>/images/abq-imagens-banner-site-bem-vindo-ao-portal.jpg" alt="" class="img-fluid">	
				</div>
			</a>
		</div>
	</div>
	<?php else: ?>
	<div class="container">
		<div class="">
			<button class="btn-painel">
				<a href="<?php echo site_url();?>usuarios/cadastrar">
					<img src="<?php echo site_url('assets');?>/images/icon-novo-usuario.png" alt="" class="image-fluid">Novo usuário
				</a>
			</button>
		</div>
		<div class="row"> 			
			<div class="col-md-12">
				<h2>Últimos usuários cadastrados</h2>
				<a href="<?php echo site_url();?>usuarios/consultar" class="btn-ver-todos float-right">Ver todos</a>
				<div class="table-responsive-sm">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Nome</th>
								<th>E-mail</th>
								<th>Bloquear</th>
								<th>Suspender</th>
								<th>Editar</th>
							</tr>
						</thead>
						<tbody>
						<?php  foreach ($usuarios as $usuario): ?>
				            <tr>	
					            <? foreach ($fields_usuarios as $field_name => $field_display): ?>
						            <div class="bloco col-<?php echo $field_display['coluna'] ?> d-flex align-items-center">
										<td><?php  echo $usuario[$field_name]; ?></td>
							    	</div>  
								<?php endforeach; ?> 
								<div class="bloco col-1 d-flex align-items-center">
					                <td class="bloco">	
				                		<? if($usuario['ativo'] == 0)	{ ?>
											<a href="javascript:;" data-codigo="<?php echo $usuario['codigo'];?>" class="controle-desbloquear d-block mx-auto" title="Desbloquear" >Bloqueado</a>
				                		<? }else{ ?>
											<a href="javascript:;" data-codigo="<?php echo $usuario['codigo'];?>" class="controle-bloquear d-block mx-auto" title="Bloquear" >Desbloqueado </a>
				                		<? } ?>
					                </td>
								</div>
								<div class="bloco col-1 d-flex align-items-center">
						
									<td class="bloco">	
										<?
				                		if($usuario['suspenso'] == 1)	{ ?>
											<a href="javascript:;" data-codigo="<?php echo $usuario['codigo'];?>" class="controle-liberar d-block mx-auto" title="Desbloquear" >Suspenso </a>
				                		<? }else{ ?>
											<a href="javascript:;" data-codigo="<?php echo $usuario['codigo'];?>" class="controle-suspenser d-block mx-auto" title="Bloquear" >Liberado </a>
				                		<? } ?>
									</td>

								</div>
								<div class="bloco col-1 d-flex align-items-center">
									<td>	
										<a href="<?php echo site_url() ?>usuarios/editar/<?php echo $usuario['codigo'];?>" class="consulta editar d-block mx-auto" title="Editar" > </a> 
									</td>		
								</div>	
				            </tr> 
				  		<?php endforeach; ?> 
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>


	<div class="modal fade" id="modalBloquear" tabindex="-1" role="dialog" aria-labelledby="myModalTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-body">

	      	<div class="container">
				<div class="row">
					<div class="col">
						<h1 class="w-100 text-center"> DESEJA BLOQUEAR O USUÁRIO SELECIONADO?</h1>
					</div>
				</div>
			</div>	
						
	      </div>
	      <div class="modal-footer">
	      	<a href="javascript:;" class="dismiss" data-dismiss="modal"> <span class="text-white float-left"> VOLTAR </span> </a>
	      	<a href="javascript:;" data-url="<?php echo site_url() ?>usuarios/deletar/" class="ir" id="ir-deletar"> <span class="text-white float-left">BLOQUEAR</span> </a>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade" id="modalDesbloquear" tabindex="-1" role="dialog" aria-labelledby="myModalTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-body">

	      	<div class="container">
				<div class="row">
					<div class="col">
						<h1 class="w-100 text-center"> DESEJA DESBLOQUEAR O USUÁRIO SELECIONADO?</h1>
					</div>
				</div>
			</div>	
						
	      </div>
	      <div class="modal-footer">
	      	<a href="javascript:;" class="dismiss" data-dismiss="modal"> <span class="text-white float-left"> VOLTAR </span> </a>
	      	<a href="javascript:;" data-url="<?php echo site_url() ?>usuarios/ativar/" class="ir" id="ir-ativar"> <span class="text-white float-left">DESBLOQUEAR</span> </a>
	      </div>
	    </div>
	  </div>
	</div>


	<div class="modal fade" id="modalSuspensoBloquear" tabindex="-1" role="dialog" aria-labelledby="myModalTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-body">

	      	<div class="container">
				<div class="row">
					<div class="col">
						<h1 class="w-100 text-center"> DESEJA SUSPENDER O ACESSO DO USUÁRIO SELECIONADO?</h1>
					</div>
				</div>
			</div>	
						
	      </div>
	      <div class="modal-footer">
	      	<a href="javascript:;" class="dismiss" data-dismiss="modal"> <span class="text-white float-left"> VOLTAR </span> </a>
	      	<a href="javascript:;" data-url="<?php echo site_url() ?>usuarios/suspender/" class="ir" id="ir-suspender"> <span class="text-white float-left">SUSPENDER ACESSO</span> </a>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade" id="modalSuspensoDesbloquear" tabindex="-1" role="dialog" aria-labelledby="myModalTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-body">

	      	<div class="container">
				<div class="row">
					<div class="col">
						<h1 class="w-100 text-center"> DESEJA LIBERAR O ACESSO DO USUÁRIO SELECIONADO?</h1>
					</div>
				</div>
			</div>	
						
	      </div>
	      <div class="modal-footer">
	      	<a href="javascript:;" class="dismiss" data-dismiss="modal"> <span class="text-white float-left"> VOLTAR </span> </a>
	      	<a href="javascript:;" data-url="<?php echo site_url() ?>usuarios/liberar/" class="ir" id="ir-liberar"> <span class="text-white float-left">LIBERAR ACESSO</span> </a>
	      </div>
	    </div>
	  </div>
	</div>	
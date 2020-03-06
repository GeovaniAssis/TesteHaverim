    <div class="row">
        <div class="btn-navegacao">
            <a href="<?php echo site_url() ?>usuarios/cadastrar"><button>NOVO</button></a>                        
        </div>
        <h2>Usuários &#8608; Lista</h2>
        <hr class="h2">
    </div>

    <?php if ( $this->session->flashdata('sucesso') != "" ) { ?>
        <div class="alert alert-success alert-dismissible trans-none" role="alert">
            <button type="button" class="close" data-esconder="alert-danger" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            <?php echo '<h4 style="font-size: 20px;"><b>'.$this->session->flashdata('sucesso').'</b></h4>'; ?>
        </div>
    <?php } ?>

    <?php if ( $this->session->flashdata('erro') != "" ) { ?>
        <div class="alert alert-danger alert-dismissible trans-none" role="alert">
            <button type="button" class="close" data-esconder="alert-danger" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            <?php echo '<h4 style="font-size: 20px;"><b>'.$this->session->flashdata('erro').'</b></h4>'; ?>
        </div>
    <?php } ?>

    <?php if ( $this->session->flashdata('suspenso') != "" ) { ?>
        <div class="alert alert-warning alert-dismissible trans-none" role="alert">
            <button type="button" class="close" data-esconder="alert-danger" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            <?php echo '<h4 style="font-size: 20px;"><b>'.$this->session->flashdata('suspenso').'</b></h4>'; ?>
        </div>
    <?php } ?>

    <div class="row">
        <div class="col-lg-12 camp-pesquisa">            
            <h3>Pesquisar por:</h3>
            <?php echo form_open('usuarios/pesquisa') ?>

                <div class="row pd--0">   
                
                    <div class="col-lg-5">
                            
                        <input type="input" class="wd--100" name="nome" id="nome" placeholder="Nome">  
                        
                    </div>

                    <div class="col-lg-5">
                        
                        <input type="input" class=" wd--100" name="email" id="email" placeholder="E-mail">  
                        
                    </div>

                    <div class="col-lg-2"> 
                        
                        <input type="submit" class="submit" value="Pesquisar" />

                    </div>

                </div>

            <?php echo form_close(); ?> 
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <?php 
                $total = 0; 
                foreach ($usuarios as $usuario){ $total = 1; };

                if ($total == 1) { ?>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Perfil</th>
                                    <th>Estado</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <?php 
                                $color = 1;
                                foreach ($usuarios as $usuario){ 
                                    $linha = $color % 2; ?>
                                    <tr class="<?php if( $linha  == 0 ){ echo 'ducolor';} ?>">
                                        <?php if ($usuario['cd_usuario'] != "") { ?>
                                            <td><?php echo $usuario['nm_usuario']; ?></td>

                                            <td><?php echo $usuario['ds_email']; ?></td>

                                            <td><?php echo $usuario['nm_perfil']; ?></td>                                        

                                            <td>                        
                                                <? if($usuario['ic_suspenso'] == 0)   { ?>
                                                    Desbloqueado 
                                                <? }else{ ?>
                                                    Bloqueado
                                                <? } ?>                                                 
                                            </td>

                                            <td>    
                                                <a href="<?php echo site_url() ?>usuarios/editar/<?php echo $usuario['cd_usuario'];?>" class="consulta editar d-block mx-auto" title="Editar"><img src="<?php echo base_url('assets');?>/images/icones/icon-edit.png"></a> 
                                            </td>   
                                        <?php } ?>
                                    </tr>
                                    <?php 
                                    $color++;
                                }; ?> 
                            </tbody>
                        </table>
                    </div>

                <?php }else{

                    echo "<h2 style='text-align: center; margin-top: 55px;'> Nenhum resultado encontrado.</h2>";

                }
            ?>        
        </div>
    </div>
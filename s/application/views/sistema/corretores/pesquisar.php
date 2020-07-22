    <div class="row">
        <div class="btn-navegacao">
            <a href="<?php echo site_url() ?>corretores/exportar"><button>EXPORTAR</button></a>                        
        </div>
        <h2>Corretores &#8608; Pesquisa</h2>
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
            <?php echo form_open('corretores/pesquisa') ?>

                <div class="row pd--0">   
                
                    <div class="col-lg-5">
                            
                        <input type="input" class="wd--100" name="nome" id="nome" placeholder="Corretor">  
                        
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
                foreach ($corretores as $corretore){ $total = 1; };

                if ($total == 1) { ?>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Imobiliária</th>
                                    <th>Corretor</th>
                                    <th>E-mail</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <?php 
                                $color = 1;
                                foreach ($corretores as $corretor){ 
                                    $linha = $color % 2; ?>
                                    <tr class="<?php if( $linha  == 0 ){ echo 'ducolor';} ?>">
                                        <?php if ($corretor['cd_user_tabela'] != "") { ?>
                                            <td><?php echo $corretor['nm_imobiliaria']; ?></td>
                                            
                                            <td><?php echo $corretor['nm_responsavel']; ?></td>
                                            
                                            <td><?php
                                                $email = array( );
                                                $email = explode( "@" , $corretor['nm_email'] );
                                                echo $email[0];
                                                echo "<br>@";
                                                echo $email[1]; ?></td>
                                            <td>    
                                                <a href="<?php echo site_url() ?>corretores/editar/<?php echo $corretor['cd_user_tabela'];?>" class="consulta editar d-block mx-auto" title="Editar"><img src="<?php echo base_url('assets');?>/images/icones/icon-edit.png"></a> 
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
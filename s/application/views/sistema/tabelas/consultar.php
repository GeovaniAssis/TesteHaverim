    <div class="row">
        <div class="btn-navegacao">
            <a href="<?php echo site_url() ?>tabelas/cadastrar"><button>NOVO</button></a>                        
        </div>
        <h2>Tabelas &#8608; Lista</h2>
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
        <div class="col-lg-12">
            <?php 
                $total = 0; 
                foreach ($tabelas as $tabela){ $total = 1; };

                if ($total == 1) { ?>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Validade</th>
                                    <th>Tabela de</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <?php 
                                $color = 1;
                                foreach ($tabelas as $tabela){ 
                                    $linha = $color % 2; ?>
                                    <tr class="<?php if( $linha  == 0 ){ echo 'ducolor';} ?>">
                                        <?php if ($tabela['cd_tabela'] != "") { ?>
                                            <td><?php echo $tabela['nm_tabela']; ?></td>

                                            <td><?php
                                                $mes= 0;                                        
                                                if( $tabela['ds_mes'] == '01'){ $mes = 'Janeiro'; }
                                                    else if( $tabela['ds_mes'] == '02'){ $mes = 'Fevereiro'; }
                                                    else if( $tabela['ds_mes'] == '03'){ $mes = 'Março'; }
                                                    else if( $tabela['ds_mes'] == '04'){ $mes = 'Abril'; }
                                                    else if( $tabela['ds_mes'] == '05'){ $mes = 'Maio'; }
                                                    else if( $tabela['ds_mes'] == '06'){ $mes = 'Junho'; }
                                                    else if( $tabela['ds_mes'] == '07'){ $mes = 'Julho'; }
                                                    else if( $tabela['ds_mes'] == '08'){ $mes = 'Agosto'; }
                                                    else if( $tabela['ds_mes'] == '09'){ $mes = 'Setembro'; }
                                                    else if( $tabela['ds_mes'] == '10'){ $mes = 'Outubro'; }
                                                    else if( $tabela['ds_mes'] == '11'){ $mes = 'Novembro'; }
                                                else{ $mes = 'Dezembro'; }

                                                echo $mes; echo " de "; echo $tabela['ds_ano']; ?></td>

                                            <td><?php if($tabela['ic_precos'] == 1){ echo "Preços"; }else{ echo "Revenda"; } ?></td>

                                            <td>    
                                                <a href="<?php echo site_url() ?>tabelas/editar/<?php echo $tabela['cd_tabela'];?>" class="consulta editar d-block mx-auto" title="Editar"><img src="<?php echo base_url('assets');?>/images/icones/icon-edit.png"></a> 
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
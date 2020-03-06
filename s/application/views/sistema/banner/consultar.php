    <div class="row">
        <div class="btn-navegacao">
            <a href="<?php echo site_url() ?>banner/cadastrar"><button>NOVO</button></a>                        
        </div>
        <h2>Banner &#8608; Lista</h2>
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
            <?php echo form_open('banner/pesquisa') ?>

                <div class="row pd--0">   
                
                    <div class="col-lg-10">
                            
                        <input type="input" class="wd--100" name="nome" id="nome" placeholder="Nome">  
                        
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
                foreach ($banner as $ban){ $total = 1; };

                if ($total == 1) { ?>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Imagem</th>
                                    <th>Posição</th>
                                    <th>Estado</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <?php 
                                $color = 1;
                                foreach ($banner as $ban){ 
                                    $linha = $color % 2; ?>
                                    <tr class="<?php if( $linha  == 0 ){ echo 'ducolor';} ?>">

                                        <td><?php echo $ban['nm_banner']; ?></td>

                                        <td>
                                            <img class="img-demo" src="<?php echo site_url() ?>assets/banner/<?php echo $ban['cd_banner']; ?>/mobile/<?php echo $ban['ds_caminho_mobile']; ?>">
                                        </td>

                                        <td><?php echo $ban['ds_posicao']; ?>º</td>

                                        <td>
                                            <?php if($ban['ic_suspenso'] == 1)   { 
                                                echo "Bloqueado";
                                            }else{

                                                $hoje = date("Y-m-d");
                                                if( $ban["dt_inicio"] <= $hoje && $ban["dt_final"] >= $hoje ){
                                                    echo "No ar";
                                                }else{
                                                    echo "Fora da data";
                                                }

                                            } ?>  
                                        </td>

                                        <td>
                                            <a href="<?php echo site_url() ?>banner/editar/<?php echo $ban['cd_banner'];?>" class="consulta editar d-block mx-auto" title="Editar">
                                                <img src="<?php echo base_url('assets');?>/images/icones/icon-edit.png">
                                            </a>
                                        </td>

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
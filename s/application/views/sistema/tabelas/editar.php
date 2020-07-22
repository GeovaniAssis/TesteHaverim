    <div class="row">
        <div class="btn-navegacao">
            <a href="<?php echo site_url() ?>tabelas"><button>VOLTAR</button></a>
        </div>
        <h2>Tabelas &#8608; Editar</h2>
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

            <?php echo form_open_multipart('tabelas/editar/'.$tabela[0]["cd_tabela"], array('id' => 'formulario','class' => 'tabelas cadastrar padrao') ) ?>

                <div class="row">
                    <div class="col-lg-12">
                        <label for="nome" class="padrao">Nome:</label>
                        <input id="nome" name="nome" type="input" required style="padding-left: 60px;" value="<?php echo $tabela[0]['nm_tabela'] ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <label for="tipo" class="padrao">Tabela de:</label>
                        <select id="tipo" name="tipo" required style="padding-left: 80px;">
                            <option value="0" <?php if($tabela[0]["ic_precos"] == '1' || $tabela[0]["ic_precos"] == 1 ){ echo "selected"; } ?> >
                                Preços
                            </option>
                            <option value="1" <?php if($tabela[0]["ic_revenda"] == '1' || $tabela[0]["ic_revenda"] == 1 ){ echo "selected"; } ?> >
                                Revendas
                            </option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="referencia" class="padrao">Validade:</label>
                        <input type="month" id="referencia" name="referencia" required style="padding-left: 90px;" value="<?php echo $tabela[0]['ds_ano']; echo '-'; echo $tabela[0]["ds_mes"]; ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <input type="file" name="tabela" id="tabela" style="padding: 10px;">
                        <p id="tabela-error" style="font-style: italic;">
                            *Somente arquivos no formato PDF ou DOC
                        </p>

                        <p><a href="<?php echo site_url(); ?>assets/tabelas/<?php echo $tabela[0]['cd_tabela']; ?>/<?php echo $tabela[0]['ds_tabela']; ?>" target="_blank">Clique Aqui</a> para ver a tabela enviada.</p>

                        <input type="hidden" name="tabela_antigo" class="tabela_antigo" id="tabela_antigo" value="<?php echo $tabela[0]['ds_tabela']; ?>">

                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <input type="submit" class="submit salvar" value="Salvar" />
                    </div>
                </div>

            <?php echo form_close(); ?>  
            <button class="submit excluir abrir-excluir">Excluir</button>                      
        </div>
    </div>

    <div class="fundo-preto-exclir"></div>
    <div class="bloco-exclir">
        <div class="conteudo">
            <h2>DESEJA EXCLUIR ESTA TABELA?</h2>
            <?php echo form_open_multipart('tabelas/excluir/'.$tabela[0]["cd_tabela"], array('id' => 'formulario-excluir','class' => 'tabela excluir padrao') ) ?>
                
                <div class="col-lg-12">
                    <input type="submit" class="submit excluir" value="Excluir" />
                </div>

                <div class="col-lg-12">
                    <div class="submit salvar">Voltar</div>
                </div>               

            <?php echo form_close(); ?> 

        </div>
    </div>
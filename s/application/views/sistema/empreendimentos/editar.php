    <div class="row">
        <div class="btn-navegacao">
            <a href="<?php echo site_url() ?>empreendimentos"><button>VOLTAR</button></a>                        
        </div>
        <h2>Empreendimento &#8608; Editar</h2>
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

    <section id="menu-empreendimento"  class="editar-bloco">
        <div class="row">
            <div class="col-lg-12 btns-all">

                <div id="btn-dados" class="btn-empre select" bloco="#bloc-dados">
                    <img src="<?php echo base_url('assets');?>/images/icones/icon-gerais.png"><br>
                    Dados<br>Gerais                    
                </div>

                <div id="btn-fotos" class="btn-empre" bloco="#bloc-fotos">
                    <img src="<?php echo base_url('assets');?>/images/icones/icon-galeria.png"><br>
                    Fotos
                </div>

                <div id="btn-planta" class="btn-empre" bloco="#bloc-planta">
                    <img src="<?php echo base_url('assets');?>/images/icones/icon-planta.png"><br>
                    Planta
                </div>

                <div id="btn-cronograma" class="btn-empre" bloco="#bloc-cronograma">
                    <img src="<?php echo base_url('assets');?>/images/icones/icon-cronograma.png"><br>
                    Cronograma
                </div>

                <div id="btn-obra" class="btn-empre" bloco="#bloc-obra">
                    <img src="<?php echo base_url('assets');?>/images/icones/icon-galeria-obra.png"><br>
                    Galeria<br>da obra
                </div>

                <div id="btn-localizacao" class="btn-empre" bloco="#bloc-localizacao">
                    <img src="<?php echo base_url('assets');?>/images/icones/icon-localizacao.png"><br>
                    Localização
                </div>

                <div id="btn-lazer" class="btn-empre" bloco="#bloc-lazer">
                    <img src="<?php echo base_url('assets');?>/images/icones/icon-lazer.png"><br>
                    Lazer
                </div>

            </div>
        </div>        
    </section>
    
    <div class="row">
        <div class="col-lg-12">

            <?php echo form_open_multipart('empreendimentos/editar/'.$empreendimentos[0]["cd_empreendimento"], array('id' => 'formulario','class' => 'empreendimentos atualizar padrao') ) ?>

                <section id="bloc-dados" class="bloco-btn">
                    <h3>Dados Gerais</h3>

                    <div class="row">
                        <div class="col-lg-12">
                            <label for="nome" class="padrao">Nome:</label>
                            <input id="nome" name="nome" type="input" value="<?php echo $empreendimentos[0]["nm_empreendimento"]; ?>" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <label for="nome_preview" class="padrao">Nome Resumido:</label>
                            <input id="nome_preview" name="nome_preview" type="input" value="<?php echo $empreendimentos[0]["nm_preview_empreendimento"]; ?>" style="padding-left: 140px;" required>  
                        </div>
                        <div class="col-lg-6">
                            <label for="posicao" class="padrao">Posição:</label>
                                <select id="posicao" name="posicao" style="padding-left: 85px;">

                                    <option value="1" <?php if($empreendimentos[0]["cd_posicao"]=="1"){ echo "selected";}?> >
                                        1
                                    </option>
                                    <option value="2" <?php if($empreendimentos[0]["cd_posicao"]=="2"){ echo "selected";}?> >
                                        2
                                    </option>
                                    <option value="3" <?php if($empreendimentos[0]["cd_posicao"]=="3"){ echo "selected";}?> >
                                        3
                                    </option>
                                    <option value="4" <?php if($empreendimentos[0]["cd_posicao"]=="4"){ echo "selected";}?> >
                                        4
                                    </option>
                                    <option value="5" <?php if($empreendimentos[0]["cd_posicao"]=="5"){ echo "selected";}?> >
                                        5
                                    </option>
                                    <option value="6" <?php if($empreendimentos[0]["cd_posicao"]=="6"){ echo "selected";}?> >
                                        6
                                    </option>
                                    <option value="7" <?php if($empreendimentos[0]["cd_posicao"]=="7"){ echo "selected";}?> >
                                        7
                                    </option>
                                    <option value="8" <?php if($empreendimentos[0]["cd_posicao"]=="8"){ echo "selected";}?> >
                                        8
                                    </option>
                                    <option value="9" <?php if($empreendimentos[0]["cd_posicao"]=="9"){ echo "selected";}?> >
                                        9
                                    </option>
                                    <option value="10" <?php if($empreendimentos[0]["cd_posicao"]=="10"){ echo "selected";}?> >
                                        10
                                    </option>
                                </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">

                            <div class="col-lg-12 pd--0">
                                <label for="estado" class="padrao">Stado:</label>
                                <select id="estado" name="estado" required>
                                    <option value="1" <?php if( $empreendimentos[0]["ic_suspenso"] == 1 ){ echo "selected"; } ?> >
                                        Bloqueado
                                    </option>
                                    <option value="0" <?php if( $empreendimentos[0]["ic_suspenso"] == 0 ){ echo "selected"; } ?> >
                                        Desbloqueado
                                    </option>
                                </select>
                            </div>

                            <div class="col-lg-12 pd--0">
                                <label for="situacao" class="padrao">Situação:</label>
                                <select id="situacao" name="situacao" required style="padding-left: 85px;">

                                    <option value="Futuros Lançamentos" <?php if( $empreendimentos[0]["ds_situacao"] == "Futuros Lançamentos" ){ echo "selected"; } ?> >
                                        Futuros Lançamentos
                                    </option>

                                    <option value="Lançamentos" <?php if( $empreendimentos[0]["ds_situacao"] == "Lançamentos" ){ echo "selected"; } ?> >
                                        Lançamentos
                                    </option>

                                    <option value="Em construção" <?php if( $empreendimentos[0]["ds_situacao"] == "Em construção" ){ echo "selected"; } ?> >
                                        Em construção
                                    </option>

                                    <option value="Prontos para Morar" <?php if( $empreendimentos[0]["ds_situacao"] == "Prontos para Morar" ){ echo "selected"; } ?> >
                                        Prontos para Morar
                                    </option>

                                    <option value="Entregues/Portfolio" <?php if( $empreendimentos[0]["ds_situacao"] == "Entregues/Portfolio" ){ echo "selected"; } ?> >
                                        Entregues/Portfolio
                                    </option>

                                    <option value="Entregues" <?php if( $empreendimentos[0]["ds_situacao"] == "Entregues" ){ echo "selected"; } ?> >
                                        Entregues
                                    </option>
                                </select>
                            </div>

                            <div class="col-lg-12 pd--0">
                                <label for="mar" class="padrao">Distancia do Mar:</label>
                                <input id="mar" name="mar" type="input" value="<?php echo $empreendimentos[0]["ds_mar"]; ?>" style="padding-left: 140px;">
                            </div>

                        </div>

                        <div class="col-lg-6">

                            <div class="col-lg-12 pd--0">
                                <label for="dt_empreendimento" class="padrao">Data de Lançamento:</label>

                                <input id="dt_empreendimento" name="dt_empreendimento" type="date" value="<?php echo $empreendimentos[0]["dt_empreendimento"]; ?>" required style="padding-left: 160px;">
                            </div>

                            <div class="col-lg-12 pd--0">
                                <label for="vl_empreendimento" class="padrao">Valor do Empreendimento:</label>

                                <input id="vl_empreendimento" name="vl_empreendimento" type="text" value="<?php echo $empreendimentos[0]["vl_empreendimento"]; ?>" style="padding-left: 200px;">
                            </div>

                            <div class="col-lg-12 pd--0">
                                <div class="col-lg-6 pd--0">
                                    <input type="checkbox" id="perto_praia" name="perto_praia" style="margin-top: 20px;" <?php if( $empreendimentos[0]["ic_perto_praia"] == "on" ){ echo "checked"; } ?>>
                                    <label for="perto_praia">Perto da praia</label>
                                </div>

                                <div class="col-lg-6 pd--0">
                                    <input type="checkbox" id="revenda" name="revenda" style="margin-top: 20px;" <?php if( $empreendimentos[0]["ic_revenda"] == "on" ){ echo "checked"; } ?>>
                                    <label for="revenda">Revenda</label>
                                </div>
                                
                            </div>

                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-lg-12 cores">
                            <h3>Cor do Empreendimento</h3>

                            <input type="hidden" name="txtCor" id="txtCor" value="<?php echo $empreendimentos[0]["cd_cor"]; ?>">
                            
                            <div class="paleta">

                                <?php foreach ($colors as $cor) { ?>
                                    <div class="cor <?php if( $empreendimentos[0]["cd_cor"] == $cor["cd_color"] ){ echo "activo"; } ?>" cor="<?php echo $cor["cd_color"]; ?>" style="background-color: <?php echo $cor["cd_hexadecimal"]; ?> ;"></div>
                                <?php } ?>
                                
                            </div>

                        </div>
                    </div>
                    
                    <hr>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-12 pd--0">
                                <label>Quantos dormitóriso possui o empreendimento:</label>
                            </div>

                            <div class="col-lg-3">
                                <div class="col-lg-12">
                                    <input type="checkbox" id="1_dorm" name="1_dorm" <?php if( $empreendimentos[0]["ic_1_dorm"] == "on" ){ echo "checked"; } ?> >
                                    <label for="1_dorm"> 1 dormitório</label>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="col-lg-12">
                                    <input type="checkbox" id="2_dorm" name="2_dorm" <?php if( $empreendimentos[0]["ic_2_dorm"] == "on" ){ echo "checked"; } ?> >
                                    <label for="2_dorm"> 2 dormitórios</label>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="col-lg-12">
                                    <input type="checkbox" id="3_dorm" name="3_dorm" <?php if( $empreendimentos[0]["ic_3_dorm"] == "on" ){ echo "checked"; } ?> >
                                    <label for="3_dorm"> 3 dormitórios</label>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="col-lg-12">
                                    <input type="checkbox" id="4_dorm" name="4_dorm" <?php if( $empreendimentos[0]["ic_4_dorm"] == "on" ){ echo "checked"; } ?> >
                                    <label for="4_dorm"> 4 dormitórios</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-12 pd--0">
                                <label>Quantas suítes possui o empreendimento:</label>
                            </div>

                            <div class="col-lg-3">
                                <div class="col-lg-12">
                                    <input type="checkbox" id="1_suite" name="1_suite" <?php if( $empreendimentos[0]["ic_1_suite"] == "on" ){ echo "checked"; } ?> >
                                    <label for="1_suite" > 1 suíte</label>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="col-lg-12">
                                    <input type="checkbox" id="2_suite" name="2_suite" <?php if( $empreendimentos[0]["ic_2_suite"] == "on" ){ echo "checked"; } ?> >
                                    <label for="2_suite"> 2 suítes</label>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="col-lg-12">
                                    <input type="checkbox" id="3_suite" name="3_suite" <?php if( $empreendimentos[0]["ic_3_suite"] == "on" ){ echo "checked"; } ?> >
                                    <label for="3_suite"> 3 suítes</label>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="col-lg-12">
                                    <input type="checkbox" id="4_suite" name="4_suite" <?php if( $empreendimentos[0]["ic_4_suite"] == "on" ){ echo "checked"; } ?> >
                                    <label for="4_suite"> 4 suítes</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-12 pd--0">
                                <label>Quantas vagas na garagem possui por apartamento:</label>
                            </div>

                            <div class="col-lg-3">
                                <div class="col-lg-12">
                                    <input type="checkbox" id="1_vaga" name="1_vaga" <?php if( $empreendimentos[0]["ic_1_vaga"] == "on" ){ echo "checked"; } ?> >
                                    <label for="1_vaga"> 1 vaga</label>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="col-lg-12">
                                    <input type="checkbox" id="2_vaga" name="2_vaga" <?php if( $empreendimentos[0]["ic_2_vaga"] == "on" ){ echo "checked"; } ?> >
                                    <label for="2_vaga"> 2 vagas</label>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="col-lg-12">
                                    <input type="checkbox" id="3_vaga" name="3_vaga" <?php if( $empreendimentos[0]["ic_3_vaga"] == "on" ){ echo "checked"; } ?> >
                                    <label for="3_vaga"> 3 vagas</label>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="col-lg-12">
                                    <input type="checkbox" id="4_vaga" name="4_vaga" <?php if( $empreendimentos[0]["ic_4_vaga"] == "on" ){ echo "checked"; } ?> >
                                    <label for="4_vaga"> 4 vagas</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">

                         <div class="col-lg-6">
                            <label for="varanda" class="padrao">Varanda Gourmet:</label>
                            <select id="varanda" name="varanda" required style="padding-left: 140px;">
                                <option value="0" <?php if( $empreendimentos[0]["ic_varanda"] == 0 ){ echo "select"; } ?> >
                                    Não possui
                                </option>
                                <option value="1" <?php if( $empreendimentos[0]["ic_varanda"] == 1 ){ echo "select"; } ?> >
                                    Possui
                                </option>
                            </select>
                        </div>
                        
                        <div class="col-lg-12 pd--0">
                            <div class="col-lg-6">
                                <label for="met_min" class="padrao">Metragem mínima:</label>
                                <input id="met_min" name="met_min" type="number" step="0.01" style="padding-left: 140px;" required value="<?php echo $empreendimentos[0]["ds_metra_min"]; ?>">
                            </div>
                            <div class="col-lg-6">
                                <label for="met_max" class="padrao">Metragem máxima:</label>
                                <input id="met_max" name="met_max" type="number" step="0.01" style="padding-left: 140px;" value="<?php echo $empreendimentos[0]["ds_metra_max"]; ?>">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <label for="lazer" class="padrao">Área de Lazer:</label>
                            <textarea name="lazer" id="lazer" cols="30" rows="5" style="padding: 30px 10px 10px 30px;"><?php echo $empreendimentos[0]["ds_area_lazer"]; ?></textarea>
                        </div>                        
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <label for="descricao" class="padrao">Descrição do Empreendimento:</label>
                            <textarea name="descricao" id="descricao" cols="30" rows="10" style="padding: 30px 10px 10px 30px;"><?php echo $empreendimentos[0]["ds_empreendimento"]; ?></textarea>
                        </div>                        
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <label for="video" class="padrao">Vídeo do Empreendimento:</label>
                            <input id="video" name="video" type="input" value='<?php echo $empreendimentos[0]["ds_video"]; ?>' style="padding-left: 205px;">
                        </div>
                    </div>
                </section>

                <section id="bloc-fotos" class="bloco-btn">

                    <h3>Fotos</h3>

                    <div class="col-lg-12 pd--0">

                        <hr>
                        
                        <h3>Capa do Empreendimento</h3>

                        <div class="row">
                            <div class="col-lg-12">
                                <p><b>Dimensões Ideal:</b><br> Largura: 1920px | Altura: 502px</p>
                            </div>
                        </div>

                        <label for="capa">
                            <img class="img_capa" src="<?php echo site_url() ?>assets/empreendimento/<?php echo $empreendimentos[0]['cd_empreendimento']; ?>/<?php echo $empreendimentos[0]['ds_capa']; ?>">
                        </label>

                        <div id="remove_capa" class="x-banner">X</div>

                        <input type="file" name="capa" id="capa" style="padding: 10px;">

                        <input type="hidden" name="capa_antigo" class="capa_antigo" id="capa_antigo" value="<?php echo $empreendimentos[0]['ds_capa']; ?>">

                    </div>

                    <div class="col-lg-12 pd--0">
                        <hr>

                        <div class="col-lg-6 pd--0">

                            <h3>Thumb do Empreendimento</h3>

                            <div class="row">
                                <div class="col-lg-12">
                                    <p><b>Dimensões Ideal:</b><br> Largura: 491px | Altura: 536px</p>
                                </div>
                            </div>

                            <div id="remove_thumb" class="x-banner">X</div>

                            <input type="file" name="thumb" id="thumb" style="padding: 10px;">

                            <input type="hidden" name="thumb_antigo" class="thumb_antigo" id="thumb_antigo" value="<?php echo $empreendimentos[0]['ds_thumb']; ?>">

                        </div>

                        <div class="col-lg-6 pd--0">
                           <label for="thumb">
                                <img class="img_thumb" src="<?php echo site_url() ?>assets/empreendimento/<?php echo $empreendimentos[0]['cd_empreendimento']; ?>/<?php echo $empreendimentos[0]['ds_thumb']; ?>">
                            </label>

                        </div>

                    </div>

                    <div class="col-lg-12 pd--0">
                        <hr>

                        <div class="col-lg-6 pd--0">

                            <h3>Logo do Empreendimento</h3>

                            <div class="row">
                                <div class="col-lg-12">
                                    <p><b>Dimensões Ideal:</b><br> Largura: 600px | Altura: 265px</p>
                                </div>
                            </div>

                            <div id="remove_logo" class="x-banner">X</div>

                            <input type="file" name="logo_empreendimento" id="logo_empreendimento" style="padding: 10px;">

                            <input type="hidden" name="logo_antigo" value="<?php echo $empreendimentos[0]['ds_logo']; ?>">

                        </div>

                        <div class="col-lg-6 pd--0 bloc-logo">
                            <label for="logo_empreendimento">
                                <img class="img-logo-edit" src="<?php echo site_url() ?>assets/empreendimento/<?php echo $empreendimentos[0]['cd_empreendimento']; ?>/<?php echo $empreendimentos[0]['ds_logo']; ?>">
                            </label>
                        </div>

                    </div>

                    <div class="col-lg-12 pd--0">
                        <hr>

                        <div class="col-lg-6 pd--0">

                            <h3>Imagem de destaque do Empreendimento</h3>

                            <div class="row">
                                <div class="col-lg-12">
                                    <p><b>Dimensões Ideal:</b><br> Largura: 475px | Altura: 290px</p>
                                </div>
                            </div>

                            <div id="remove_destaque1" class="x-banner">X</div>

                            <input type="file" name="destaque1_empreendimento" id="destaque1_empreendimento" style="padding: 10px;">

                            <input type="hidden" name="destaque1_antigo" value="<?php echo $empreendimentos[0]['im_empreendimento1']; ?>">

                        </div>

                        <div class="col-lg-6 pd--0 bloc-logo">
                            <label for="destaque1_empreendimento">
                                <img class="img_empreendimento img_empreendimento1" src="<?php echo site_url() ?>assets/empreendimento/<?php echo $empreendimentos[0]['cd_empreendimento']; ?>/<?php echo $empreendimentos[0]['im_empreendimento1']; ?>">
                            </label>
                        </div>

                        <div class="col-lg-6 pd--0">

                            <div id="remove_destaque2" class="x-banner">X</div>

                            <input type="file" name="destaque2_empreendimento" id="destaque2_empreendimento" style="padding: 10px;">

                            <input type="hidden" name="destaque2_antigo" value="<?php echo $empreendimentos[0]['im_empreendimento2']; ?>">

                        </div>

                        <div class="col-lg-6 pd--0 bloc-logo">
                            <label for="destaque2_empreendimento">
                                <img class="img_empreendimento img_empreendimento2" src="<?php echo site_url() ?>assets/empreendimento/<?php echo $empreendimentos[0]['cd_empreendimento']; ?>/<?php echo $empreendimentos[0]['im_empreendimento2']; ?>">
                            </label>
                        </div>

                    </div>

                    <div class="col-lg-12 pd--0">
                        <hr>

                        <div class="col-lg-6 pd--0">

                            <h3>Imagem de destaque principal do Empreendimento</h3>

                            <div class="row">
                                <div class="col-lg-12">
                                    <p><b>Dimensões Ideal:</b><br> Largura: 765px | Altura: 519px</p>
                                </div>
                            </div>

                            <div id="remove_destaque_principal" class="x-banner">X</div>

                            <input type="file" name="destaque_principal_empreendimento" id="destaque_principal_empreendimento" style="padding: 10px;">

                            <input type="hidden" name="destaque_principal_antigo" value="<?php echo $empreendimentos[0]['im_empreendimento_principal']; ?>">

                        </div>

                        <div class="col-lg-6 pd--0 bloc-logo">
                            <label for="destaque_principal_empreendimento">
                                <img class="wd--100 image_destaque_principal" src="<?php echo site_url() ?>assets/empreendimento/<?php echo $empreendimentos[0]['cd_empreendimento']; ?>/<?php echo $empreendimentos[0]['im_empreendimento_principal']; ?>">
                            </label>
                        </div>
                    </div>
                </section>

                <section id="bloc-planta" class="bloco-btn">
                    <h3>Planta</h3>
                    <?php foreach ($planta as $plant) { ?>
                        <hr>
                        <div class="col-lg-12 pd--0">
                            <div class="col-lg-6 pd--0">
                                <p><b>Dimensões Ideal:</b><br> Largura: 591px | Altura: 417px</p>

                                <input type="hidden" name="bloc_planta_antigo[<?php echo $plant['cd_empreendimento_planta']; ?>]" value="<?php echo $plant['im_planta']; ?>">

                                <input type="hidden" name="bloc_planta_codigo[<?php echo $plant['cd_empreendimento_planta']; ?>]" value="<?php echo $plant['cd_empreendimento_planta']; ?>">

                                <div id="remove_planta<?php echo $plant['cd_empreendimento_planta']; ?>" class="x-banner" style="margin: 0;" codigo="<?php echo $plant['cd_empreendimento_planta']; ?>">X</div>

                                <input type="text" name="imagem_planta<?php echo $plant['cd_empreendimento_planta']; ?>" id="imagem_planta<?php echo $plant['cd_empreendimento_planta']; ?>" style="padding: 10px; margin-bottom: 0; margin-top: 5px;" codigo="<?php echo $plant['cd_empreendimento_planta']; ?>"  onclick="this.type='file'" placeholder="Clique aqui para alterar a imagem.">

                                <label for="nome_imagem_planta<?php echo $plant['cd_empreendimento_planta']; ?>" class="padrao">Nome da planta:</label>
                                <input id="nome_imagem_planta<?php echo $plant['cd_empreendimento_planta']; ?>" name="nome_imagem_planta[<?php echo $plant['cd_empreendimento_planta']; ?>]" type="input" style="padding-left: 135px; margin-bottom: 0;" value="<?php echo $plant['nm_planta']; ?>">

                                <label for="metragem_planta<?php echo $plant['cd_empreendimento_planta']; ?>" class="padrao">Metragem:</label>
                                <input id="metragem_planta<?php echo $plant['cd_empreendimento_planta']; ?>" name="metragem_planta[<?php echo $plant['cd_empreendimento_planta']; ?>]" type="input" style="padding-left: 90px; margin-bottom: 0;" value="<?php echo $plant['ds_metragem']; ?>">

                                <label for="posicao_planta<?php echo $plant['cd_empreendimento_planta']; ?>" class="padrao">Posição:</label>
                                <select id="posicao_planta<?php echo $plant['cd_empreendimento_planta']; ?>" name="posicao_planta[<?php echo $plant['cd_empreendimento_planta']; ?>]" style="padding-left: 85px;">

                                    <option value="1" <?php if($plant['ds_posicao']=="1"){ echo "selected";}?> >
                                        1
                                    </option>
                                    <option value="2" <?php if($plant['ds_posicao']=="2"){ echo "selected";}?> >
                                        2
                                    </option>
                                    <option value="3" <?php if($plant['ds_posicao']=="3"){ echo "selected";}?> >
                                        3
                                    </option>
                                    <option value="4" <?php if($plant['ds_posicao']=="4"){ echo "selected";}?> >
                                        4
                                    </option>
                                    <option value="5" <?php if($plant['ds_posicao']=="5"){ echo "selected";}?> >
                                        5
                                    </option>
                                    <option value="6" <?php if($plant['ds_posicao']=="6"){ echo "selected";}?> >
                                        6
                                    </option>
                                    <option value="7" <?php if($plant['ds_posicao']=="7"){ echo "selected";}?> >
                                        7
                                    </option>
                                    <option value="8" <?php if($plant['ds_posicao']=="8"){ echo "selected";}?> >
                                        8
                                    </option>
                                    <option value="9" <?php if($plant['ds_posicao']=="9"){ echo "selected";}?> >
                                        9
                                    </option>
                                    <option value="10" <?php if($plant['ds_posicao']=="10"){ echo "selected";}?> >
                                        10
                                    </option>
                                </select>
                            </div>

                            <div class="col-lg-6 pd--0">
                                <label for="imagem_planta<?php echo $plant['cd_empreendimento_planta']; ?>">
                                    <img id="img_planta<?php echo $plant['cd_empreendimento_planta']; ?>" class="img_planta img_planta<?php echo $plant['cd_empreendimento_planta']; ?>" src="<?php echo site_url() ?>assets/empreendimento/<?php echo $empreendimentos[0]['cd_empreendimento']; ?>/planta/<?php echo $plant['im_planta']; ?>">
                                </label>

                                <div class="excluir_planta" codigo="<?php echo $plant['cd_empreendimento_planta']; ?>" nome="<?php echo $plant['nm_planta']; ?>">
                                    EXCLUIR
                                </div>
                            </div>

                        </div>
                    <?php } ?>

                    <div class="col-lg-12 pd--0"> <!-- Adicionar Planta -->
                        <hr>
                        
                        <div id="nova_planta" class="submit salvar">Adicionar nova Planta</div>

                        <div id="bloc_nova_planta">
                            <div class="col-lg-12 pd--0">
                                <input type="hidden" name="ic_planta_nova" id="ic_planta_nova">

                                <div class="col-lg-6 pd--0">
                                    <p><b>Dimensões Ideal:</b><br> Largura: 591px | Altura: 417px</p>

                                    <div id="remove_nova_planta" class="x-banner" style="margin: 0;">X</div>

                                    <input type="file" name="imagem_nova_planta" id="imagem_nova_planta" style="padding: 10px; margin-bottom: 0; margin-top: 5px;">

                                    <label for="nome_imagem_nova_planta" class="padrao">Nome da planta:</label>
                                    <input id="nome_imagem_nova_planta" name="nome_imagem_nova_planta" type="input" style="padding-left: 135px; margin-bottom: 0;">

                                    <label for="metragem_nova_planta" class="padrao">Metragem:</label>
                                    <input id="metragem_nova_planta" name="metragem_nova_planta" type="input" style="padding-left: 90px; margin-bottom: 0;">

                                    <label for="posicao_nova_planta" class="padrao">Posição:</label>
                                    <select id="posicao_nova_planta" name="posicao_nova_planta" style="padding-left: 85px;">

                                        <option value="1" >
                                            1
                                        </option>
                                        <option value="2" >
                                            2
                                        </option>
                                        <option value="3" >
                                            3
                                        </option>
                                        <option value="4" >
                                            4
                                        </option>
                                        <option value="5" >
                                            5
                                        </option>
                                        <option value="6" >
                                            6
                                        </option>
                                        <option value="7" >
                                            7
                                        </option>
                                        <option value="8" >
                                            8
                                        </option>
                                        <option value="9" >
                                            9
                                        </option>
                                        <option value="10" >
                                            10
                                        </option>
                                    </select>
                                </div>

                                <div class="col-lg-6 pd--0">
                                    <label for="imagem_nova_planta">
                                        <img id="img_planta_nova" class="img_planta_nova" src="<?php echo site_url() ?>assets/empreendimento/0/planta/planta.jpg">
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>

                <section id="bloc-cronograma" class="bloco-btn">
                    <h3>Cronograma</h3>

                    <hr>

                    <div class="col-lg-12 pd--0">

                        <div class="col-lg-12">
                            <div class="col-lg-12 pd--0">
                                <label for="entrega" class="padrao">Entrega:</label>
                                <input id="entrega" name="entrega" type="month" value="<?php echo $empreendimentos[0]["ds_entrega"]; ?>" style="padding-left: 80px;" >
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="col-lg-12 pd--0">
                                <label for="fundacao" class="padrao">Fundação:</label>
                                <input id="fundacao" name="fundacao" type="number" value="<?php echo $empreendimentos[0]["ds_fundacao"]; ?>" style="padding-left: 90px;" required max="100" min="0" step="0.01">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="col-lg-12 pd--0">
                                <label for="estrutura" class="padrao">Estrutura:</label>
                                <input id="estrutura" name="estrutura" type="number" value="<?php echo $empreendimentos[0]["ds_estrutura"]; ?>" style="padding-left: 80px;" required max="100" min="0" step="0.01">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 pd--0">
                        <hr>
                        <h3>Alvenaria</h3>

                        <div class="col-lg-4">
                            <div class="col-lg-12 pd--0">
                                <label for="interno" class="padrao">Rev. Interno:</label>
                                <input id="interno" name="interno" type="number" value="<?php echo $empreendimentos[0]["ds_interno"]; ?>" style="padding-left: 100px;" required max="100" min="0" step="0.01">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="col-lg-12 pd--0">
                                <label for="externo" class="padrao">Rev. Externo:</label>
                                <input id="externo" name="externo" type="number" value="<?php echo $empreendimentos[0]["ds_externo"]; ?>" style="padding-left: 105px;" required max="100" min="0" step="0.01">
                            </div>
                        </div>                        
                        <div class="col-lg-4">
                            <label for="alvenaria" class="padrao">Alvenaria:</label>
                            <input id="alvenaria" name="alvenaria" type="number" value="<?php echo $empreendimentos[0]["ds_alvenaria"]; ?>" style="padding-left: 90px;" required max="100" min="0" step="0.01">
                        </div>
                    </div>

                    <div class="col-lg-12 pd--0">
                        <hr>
                        <h3>Acabamento</h3>

                        <div class="col-lg-4">
                            <div class="col-lg-12 pd--0">
                                <label for="piso" class="padrao">Piso:</label>
                                <input id="piso" name="piso" type="number" value="<?php echo $empreendimentos[0]["ds_piso"]; ?>" style="padding-left: 50px;" required max="100" min="0" step="0.01">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="col-lg-12 pd--0">
                                <label for="instalacoes" class="padrao">Instalações:</label>
                                <input id="instalacoes" name="instalacoes" type="number" value="<?php echo $empreendimentos[0]["ds_instalacoes"]; ?>" style="padding-left: 95px;" required max="100" min="0" step="0.01">
                            </div>
                        </div>                        
                        <div class="col-lg-4">
                            <label for="pintura" class="padrao">Pintura:</label>
                            <input id="pintura" name="pintura" type="number" value="<?php echo $empreendimentos[0]["ds_pintura"]; ?>" style="padding-left: 70px;" required max="100" min="0" step="0.01">
                        </div>
                    </div>
                </section>

                <section id="bloc-obra" class="bloco-btn">
                    <h3>Galeria da Obra</h3>
                    <hr>

                    <div class="col-lg-12 pd--0">
                        <?php foreach ($obra as $obr) { ?>
                            <div class="col-lg-12 pd--0">

                                <div class="col-lg-6 pd--0">
                                    <p><b>Dimensões Ideal:</b><br> Largura: 381px | Altura: 240px</p>

                                    <input type="hidden" name="bloc_foto_obra_antigo[<?php echo $obr['cd_empreendimento_obra']; ?>]" value="<?php echo $obr['im_obra']; ?>">

                                    <input type="hidden" name="bloc_foto_obra_codigo[<?php echo $obr['cd_empreendimento_obra']; ?>]" value="<?php echo $obr['cd_empreendimento_obra']; ?>">

                                    <div id="remove_foto_obra<?php echo $obr['cd_empreendimento_obra']; ?>" class="x-banner" style="margin: 0;">X</div>

                                    <input type="text" name="foto_obra_bloc<?php echo $obr['cd_empreendimento_obra']; ?>" id="foto_obra_bloc<?php echo $obr['cd_empreendimento_obra']; ?>" class="bloc_file_obra" style="padding: 10px; margin-bottom: 0; margin-top: 5px;" codigo="<?php echo $obr['cd_empreendimento_obra']; ?>" onclick="this.type='file'" placeholder="Clique aqui para alterar a imagem." >

                                    <label for="nome_foto_obra<?php echo $obr['cd_empreendimento_obra']; ?>" class="padrao">Nome da foto da obra:</label>
                                    <input id="nome_foto_obra<?php echo $obr['cd_empreendimento_obra']; ?>" name="nome_foto_obra[<?php echo $obr['cd_empreendimento_obra']; ?>]" type="input" style="padding-left: 165px; margin-bottom: 0;" value="<?php echo $obr['nm_obra']; ?>">

                                    <label for="bloc_foto_obra_data[<?php echo $obr['cd_empreendimento_obra']; ?>]" class="padrao">Data:</label>
                                    <input type="input" id="bloc_foto_obra_data<?php echo $obr['cd_empreendimento_obra']; ?>" name="bloc_foto_obra_data[<?php echo $obr['cd_empreendimento_obra']; ?>]" style="padding-left: 50px; margin-bottom: 0;" value="<?php echo $obr['dt_obra']; ?>">

                                    <label for="bloc_foto_obra_posicao[<?php echo $obr['cd_empreendimento_obra']; ?>]" class="padrao">Posição:</label>
                                    <select id="bloc_foto_obrar_posicao<?php echo $obr['cd_empreendimento_obra']; ?>" name="bloc_foto_obra_posicao[<?php echo $obr['cd_empreendimento_obra']; ?>]" style="padding-left: 85px;">
                                        <option value="1" <?php if($obr['ds_posicao']=="1"){ echo "selected";}?> >
                                            1
                                        </option>
                                        <option value="2" <?php if($obr['ds_posicao']=="2"){ echo "selected";}?> >
                                            2
                                        </option>
                                        <option value="3" <?php if($obr['ds_posicao']=="3"){ echo "selected";}?> >
                                            3
                                        </option>
                                        <option value="4" <?php if($obr['ds_posicao']=="4"){ echo "selected";}?> >
                                            4
                                        </option>
                                        <option value="5" <?php if($obr['ds_posicao']=="5"){ echo "selected";}?> >
                                            5
                                        </option>
                                        <option value="6" <?php if($obr['ds_posicao']=="6"){ echo "selected";}?> >
                                            6
                                        </option>
                                        <option value="7" <?php if($obr['ds_posicao']=="7"){ echo "selected";}?> >
                                            7
                                        </option>
                                        <option value="8" <?php if($obr['ds_posicao']=="8"){ echo "selected";}?> >
                                            8
                                        </option>
                                        <option value="9" <?php if($obr['ds_posicao']=="9"){ echo "selected";}?> >
                                            9
                                        </option>
                                        <option value="10" <?php if($obr['ds_posicao']=="10"){ echo "selected";}?> >
                                            10
                                        </option>
                                    </select> 
                                </div>                                

                                <div class="col-lg-6 pd--0">
                                    <label for="foto_obra_bloc<?php echo $obr['cd_empreendimento_obra']; ?>" class="wd--100">
                                        <img id="img_foto_obra<?php echo $obr['cd_empreendimento_obra']; ?>" class="img_foto_obra<?php echo $obr['cd_empreendimento_obra']; ?> wd--100" src="<?php echo site_url() ?>assets/empreendimento/<?php echo $obr['cd_empreendimento']; ?>/obra/<?php echo $obr['im_obra_thumb']; ?>">
                                    </label>

                                    <div class="excluir_obra" codigo="<?php echo $obr['cd_empreendimento_obra']; ?>" nome="<?php echo $obr['nm_obra']; ?>">
                                        EXCLUIR
                                    </div>
                                </div>

                                <div class="col-lg-12 pd--0">
                                    <hr>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-lg-12 pd--0">
                        <input type="hidden" name="ic_foto_obra_novo" id="ic_foto_obra_novo">

                        <div id="novo_foto_obra" class="submit salvar">Adicionar nova foto na Galeria da Obra</div>

                        <div id="bloc_foto_obra">
                            <div class="col-lg-12 pd--0">

                                <div class="col-lg-6 pd--0">
                                    <p><b>Dimensões Ideal:</b><br> Largura: 381px | Altura: 240px</p>

                                    <div id="remove_foto_obra_novo" class="x-banner" style="margin: 0;">X</div>

                                    <input type="file" name="foto_obra_novo" id="foto_obra_novo" style="padding: 10px; margin-bottom: 0; margin-top: 5px;">

                                    <label for="nome_foto_obra_novo" class="padrao">Nome da foto da obra:</label>
                                    <input id="nome_foto_obra_novo" name="nome_foto_obra_novo" type="input" style="padding-left: 165px; margin-bottom: 0;" >

                                    <label for="novo_foto_obra_data" class="padrao">Data:</label>
                                    <input type="input" id="novo_foto_obra_data" name="novo_foto_obra_data" style="padding-left: 50px; margin-bottom: 0;">

                                    <label for="novo_foto_obra_posicao" class="padrao">Posição:</label>
                                    <select id="novo_foto_obrar_posicao" name="novo_foto_obra_posicao" style="padding-left: 85px;">
                                        <option value="1" >
                                            1
                                        </option>
                                        <option value="2" >
                                            2
                                        </option>
                                        <option value="3" >
                                            3
                                        </option>
                                        <option value="4" >
                                            4
                                        </option>
                                        <option value="5" >
                                            5
                                        </option>
                                        <option value="6" >
                                            6
                                        </option>
                                        <option value="7" >
                                            7
                                        </option>
                                        <option value="8" >
                                            8
                                        </option>
                                        <option value="9" >
                                            9
                                        </option>
                                        <option value="10" >
                                            10
                                        </option>
                                    </select> 

                                </div>

                                <div class="col-lg-6 pd--0">
                                    <label for="foto_obra_novo" class="wd--100">
                                        <img id="img_foto_obra_novo" class="img_foto_obra_novo wd--100" src="<?php echo site_url() ?>assets/empreendimento/0/obra/obra.jpg">
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>

                <section id="bloc-localizacao" class="bloco-btn">
                    <h3>Localização</h3>
                    <hr>

                    <div class="col-lg-12 pd--0">
                        <div class="col-lg-6">
                            <div class="col-lg-12 pd--0">
                                <label for="logradouro" class="padrao">Logradouro:</label>
                                <select name="logradouro" style="padding-left: 95px;" required>
                                    <option value="Rua" <?php if($endereco[0]['ds_logradouro'] == "Rua"){ echo 'selected';} ?> >
                                        Rua
                                    </option> 
                                    <option value="Avenida" <?php if($endereco[0]['ds_logradouro'] == "Avenida"){ echo 'selected';} ?> >
                                        Avenida
                                    </option> 
                                    <option value="Vila" <?php if($endereco[0]['ds_logradouro'] == "Vila"){ echo 'selected';} ?> >
                                        Vila
                                    </option> 
                                    <option value="Travessa" <?php if($endereco[0]['ds_logradouro'] == "Travessa"){ echo 'selected';} ?> >
                                        Travessa
                                    </option> 
                                    <option value="Distrito" <?php if($endereco[0]['ds_logradouro'] == "Distrito"){ echo 'selected';} ?> >
                                        Distrito
                                    </option> 
                                    <option value="Setor" <?php if($endereco[0]['ds_logradouro'] == "Setor"){ echo 'selected';} ?> >
                                        Setor
                                    </option>
                                    <option value="Quadra" <?php if($endereco[0]['ds_logradouro'] == "Quadra"){ echo 'selected';} ?> >
                                        Quadra
                                    </option>
                                    <option value="Parque" <?php if($endereco[0]['ds_logradouro'] == "Parque"){ echo 'selected';} ?> >
                                        Parque
                                    </option>
                                    <option value="Jardim" <?php if($endereco[0]['ds_logradouro'] == "Jardim"){ echo 'selected';} ?> >
                                        Jardim
                                    </option>
                                    <option value="Estrada" <?php if($endereco[0]['ds_logradouro'] == "Estrada"){ echo 'selected';} ?> >
                                        Estrada
                                    </option>
                                    <option value="Rodovia" <?php if($endereco[0]['ds_logradouro'] == "Rodovia"){ echo 'selected';} ?> >
                                        Rodovia
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="col-lg-12 pd--0">
                                <label for="endereco" class="padrao">Endereço:</label>
                                <input name="endereco" type="text" style="padding-left: 85px;" required value="<?php echo $endereco[0]['ds_endereco']; ?>">
                            </div>                            
                        </div>
                    </div>
                    <div class="col-lg-12 pd--0">
                        <div class="col-lg-6">
                            <div class="col-lg-12 pd--0">
                                <label for="numero" class="padrao">Número:</label>
                                <input name="numero" type="text" style="padding-left: 80px;" required value="<?php echo $endereco[0]['ds_numero']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="col-lg-12 pd--0">
                                <label for="bairro" class="padrao">Bairro:</label>
                                <select id="bairro" name="bairro" style="padding-left: 65px;" required>
                                    <option value="Andaraguá" <?php if($endereco[0]['ds_bairro'] == "Andaraguá"){ echo "selected";}; ?> >Andaraguá</option>
                                    <option value="Anhanguera" <?php if($endereco[0]['ds_bairro'] == "Anhanguera"){ echo "selected";}; ?> >Anhanguera</option>
                                    <option value="Antártica" <?php if($endereco[0]['ds_bairro'] == "Antártica"){ echo "selected";}; ?> >Antártica</option>
                                    <option value="Aviação" <?php if($endereco[0]['ds_bairro'] == "Aviação"){ echo "selected";}; ?> >Aviação</option>
                                    <option value="Boqueirão" <?php if($endereco[0]['ds_bairro'] == "Boqueirão"){ echo "selected";}; ?> >Boqueirão</option>
                                    <option value="Caiçara" <?php if($endereco[0]['ds_bairro'] == "Caiçara"){ echo "selected";}; ?> >Caiçara</option>
                                    <option value="Canto do Forte" <?php if($endereco[0]['ds_bairro'] == "Canto do Forte"){ echo "selected";}; ?> >Canto do Forte</option>
                                    <option value="Cidade da Criança" <?php if($endereco[0]['ds_bairro'] == "Cidade da Criança"){ echo "selected";}; ?> >Cidade da Criança</option>
                                    <option value="Esmeralda" <?php if($endereco[0]['ds_bairro'] == "Esmeralda"){ echo "selected";}; ?> >Esmeralda</option>
                                    <option value="Glória" <?php if($endereco[0]['ds_bairro'] == "Glória"){ echo "selected";}; ?> >Glória</option>
                                    <option value="Guilhermina" <?php if($endereco[0]['ds_bairro'] == "Guilhermina"){ echo "selected";}; ?> >Guilhermina</option>
                                    <option value="Imperador" <?php if($endereco[0]['ds_bairro'] == "Imperador"){ echo "selected";}; ?> >Imperador</option>
                                    <option value="Maracanã" <?php if($endereco[0]['ds_bairro'] == "Maracanã"){ echo "selected";}; ?> >Maracanã</option>
                                    <option value="Melvi" <?php if($endereco[0]['ds_bairro'] == "Melvi"){ echo "selected";}; ?> >Melvi</option>
                                    <option value="Mioptiontar" <?php if($endereco[0]['ds_bairro'] == "Mioptiontar"){ echo "selected";}; ?> >Mioptiontar</option>
                                    <option value="Mirim" <?php if($endereco[0]['ds_bairro'] == "Mirim"){ echo "selected";}; ?> >Mirim</option>
                                    <option value="Nova Mirim" <?php if($endereco[0]['ds_bairro'] == "Nova Mirim"){ echo "selected";}; ?> >Nova Mirim</option>
                                    <option value="Ocian" <?php if($endereco[0]['ds_bairro'] == "Ocian"){ echo "selected";}; ?> >Ocian</option>
                                    <option value="Princesa" <?php if($endereco[0]['ds_bairro'] == "Princesa"){ echo "selected";}; ?> >Princesa</option>
                                    <option value="Quietudo" <?php if($endereco[0]['ds_bairro'] == "Quietudo"){ echo "selected";}; ?> >Quietudo</option>
                                    <option value="Real" <?php if($endereco[0]['ds_bairro'] == "Real"){ echo "selected";}; ?> >Real</option>
                                    <option value="Ribeirópooptions" <?php if($endereco[0]['ds_bairro'] == "Ribeirópooptions"){ echo "selected";}; ?> >Ribeirópooptions</option>
                                    <option value="Samambaia" <?php if($endereco[0]['ds_bairro'] == "Samambaia"){ echo "selected";}; ?> >Samambaia</option>
                                    <option value="Santa Marina" <?php if($endereco[0]['ds_bairro'] == "Santa Marina"){ echo "selected";}; ?> >Santa Marina</option>
                                    <option value="Serra do Mar" <?php if($endereco[0]['ds_bairro'] == "Serra do Mar"){ echo "selected";}; ?> >Serra do Mar</option>
                                    <option value="Solemar" <?php if($endereco[0]['ds_bairro'] == "Solemar"){ echo "selected";}; ?> >Solemar</option>
                                    <option value="Sítio do Campo" <?php if($endereco[0]['ds_bairro'] == "Sítio do Campo"){ echo "selected";}; ?> >Sítio do Campo</option>
                                    <option value="Tupi" <?php if($endereco[0]['ds_bairro'] == "Tupi"){ echo "selected";}; ?> >Tupi</option>
                                    <option value="Tupiry" <?php if($endereco[0]['ds_bairro'] == "Tupiry"){ echo "selected";}; ?> >Tupiry</option>
                                    <option value="Vila Sônia" <?php if($endereco[0]['ds_bairro'] == "Vila Sônia"){ echo "selected";}; ?> >Vila Sônia</option>
                                    <option value="Xixová" <?php if($endereco[0]['ds_bairro'] == "Xixová"){ echo "selected";}; ?> >Xixová</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 pd--0">
                        <hr>
                        <h3>Proximidades</h3>
                    </div>                    
                    <div class="col-lg-12 pd--0 txt-center">
                        <div class="col-lg-3">
                            <div class="col-lg-12 pd--0">
                                <input type="checkbox" id="academia" name="academia" <?php if( $endereco[0]['ds_academia'] == 'on' ){ echo 'checked';} ?> >
                                <label for="academia">Academia</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="col-lg-12 pd--0">
                                <input type="checkbox" id="escola" name="escola" <?php if( $endereco[0]['ds_escola'] == 'on' ){ echo 'checked';} ?> >
                                <label for="escola">Escola</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="col-lg-12 pd--0">
                                <input type="checkbox" id="padaria" name="padaria" <?php if( $endereco[0]['ds_padaria'] == 'on' ){ echo 'checked';} ?> >
                                <label for="padaria">Padaria</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="col-lg-12 pd--0">
                                <input type="checkbox" id="shopping" name="shopping" <?php if( $endereco[0]['ds_shopping'] == 'on' ){ echo 'checked';} ?> >
                                <label for="shopping">Shopping</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 pd--0 txt-center">
                        <div class="col-lg-4">
                            <div class="col-lg-12 pd--0">
                                <input type="checkbox" id="banco" name="banco" <?php if( $endereco[0]['ds_banco'] == 'on' ){ echo 'checked';} ?> >
                                <label for="banco">Banco</label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="col-lg-12 pd--0">
                                <input type="checkbox" id="hospital" name="hospital" <?php if( $endereco[0]['ds_hospital'] == 'on' ){ echo 'checked';} ?> >
                                <label for="hospital">Hospital</label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="col-lg-12 pd--0">
                                <input type="checkbox" id="loja" name="loja" <?php if( $endereco[0]['ds_loja'] == 'on' ){ echo 'checked';} ?> >
                                <label for="loja">Loja</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 pd--0">
                        <hr>
                        <h3>Mapa</h3>
                    </div>
                    <div class="col-lg-12 pd--0">

                        <div class="row">
                            <div class="col-lg-12">
                                <p><b>Dimensões Ideal:</b><br> Largura: 1920px | Altura: 427px</p>
                            </div>
                        </div>

                        <label for="mapa">
                            <img class="img_mapa" src="<?php echo site_url() ?>assets/empreendimento/<?php echo $empreendimentos[0]['cd_empreendimento']; ?>/<?php echo $endereco[0]['im_mapa']; ?>">
                        </label>

                        <div id="remove_mapa" class="x-banner">X</div>

                        <input type="file" name="mapa" id="mapa" style="padding: 10px;">

                        <input type="hidden" name="mapa_antigo" class="mapa_antigo" id="mapa_antigo" value="<?php echo $endereco[0]['im_mapa']; ?>">

                    </div>
                </section>

                <section id="bloc-lazer" class="bloco-btn">
                    <h3>Lazer</h3>

                    <div class="col-lg-12 pd--0">
                        <?php foreach ($lazer as $laz) { ?>

                            <hr>
                            <div class="col-lg-12 pd--0">
                                <div class="col-lg-6 pd--0">
                                    <p><b>Dimensões Ideal:</b><br> Largura: 581px | Altura: 371px</p>

                                    <div id="remove_lazer<?php echo $laz['cd_lazer']; ?>" class="x-banner bloc_img_remover" style="margin: 0;" codigo="<?php echo $laz['cd_lazer']; ?>">X</div>

                                    <input type="text" name="bloc_lazer<?php echo $laz['cd_lazer']; ?>" id="bloc_lazer<?php echo $laz['cd_lazer']; ?>" class="bloc_file_icon" style="padding: 10px; margin-bottom: 0; margin-top: 5px;" codigo="<?php echo $laz['cd_lazer']; ?>"  onclick="this.type='file'" placeholder="Clique aqui para alterar a imagem.">

                                    <input type="hidden" name="bloc_lazer_antigo[<?php echo $laz['cd_lazer']; ?>]" value="<?php echo $laz['im_lazer']; ?>">

                                    <input type="hidden" name="bloc_lazer_codigo[<?php echo $laz['cd_lazer']; ?>]" value="<?php echo $laz['cd_lazer']; ?>">

                                    <label for="bloc_nome_lazer[<?php echo $laz['cd_lazer']; ?>]" class="padrao">Nome do Lazer:</label>

                                    <input class="bloc_nome_lazer" name="bloc_nome_lazer[<?php echo $laz['cd_lazer']; ?>]" type="input" value="<?php echo $laz['nm_lazer']; ?>" style="padding-left: 120px; margin-bottom: 0;" >

                                    <label for="bloc_lazer_posicao[<?php echo $laz['cd_lazer']; ?>]" class="padrao">Posição:</label>

                                    <select class="bloc_lazer_posicao" name="bloc_lazer_posicao[<?php echo $laz['cd_lazer']; ?>]"  style="padding-left: 85px;">
                                        <option value="1" <?php if($laz['ds_posicao']=="1"){ echo "selected";}?> >
                                            1
                                        </option>
                                        <option value="2" <?php if($laz['ds_posicao']=="2"){ echo "selected";}?> >
                                            2
                                        </option>
                                        <option value="3" <?php if($laz['ds_posicao']=="3"){ echo "selected";}?> >
                                            3
                                        </option>
                                        <option value="4" <?php if($laz['ds_posicao']=="4"){ echo "selected";}?> >
                                            4
                                        </option>
                                        <option value="5" <?php if($laz['ds_posicao']=="5"){ echo "selected";}?> >
                                            5
                                        </option>
                                        <option value="6" <?php if($laz['ds_posicao']=="6"){ echo "selected";}?> >
                                            6
                                        </option>
                                        <option value="7" <?php if($laz['ds_posicao']=="7"){ echo "selected";}?> >
                                            7
                                        </option>
                                        <option value="8" <?php if($laz['ds_posicao']=="8"){ echo "selected";}?> >
                                            8
                                        </option>
                                        <option value="9" <?php if($laz['ds_posicao']=="9"){ echo "selected";}?> >
                                            9
                                        </option>
                                        <option value="10" <?php if($laz['ds_posicao']=="10"){ echo "selected";}?> >
                                            10
                                        </option>
                                    </select>

                                    <p class="padrao">Icone:</p>

                                    <input type="hidden" name="bloc_icon_lazer[<?php echo $laz['cd_lazer']; ?>]" id="bloc_icon_lazer<?php echo $laz['cd_lazer']; ?>" class="icon_lazer" value="<?php echo $laz['im_icon']; ?>">

                                    <div class="col-lg-12 icones icones<?php echo $laz['cd_lazer']; ?>">

                                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tecnocal2.0/wp-content/themes/tecnocal/img/icon/icon-abc.png" class="icon <?php if( $laz['im_icon'] == 'icon-abc.png' ){ echo 'select';} ?>" name="icon-abc.png" codigo="<?php echo $laz['cd_lazer']; ?>">

                                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tecnocal2.0/wp-content/themes/tecnocal/img/icon/icon-casa-local.png" class="icon <?php if( $laz['im_icon'] == 'icon-casa-local.png' ){ echo 'select';} ?>" name="icon-casa-local.png" codigo="<?php echo $laz['cd_lazer']; ?>">

                                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tecnocal2.0/wp-content/themes/tecnocal/img/icon/icon-chave.png" class="icon <?php if( $laz['im_icon'] == 'icon-chave.png' ){ echo 'select';} ?>" name="icon-chave.png" codigo="<?php echo $laz['cd_lazer']; ?>">

                                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tecnocal2.0/wp-content/themes/tecnocal/img/icon/icon-cronograma2.png" class="icon <?php if( $laz['im_icon'] == 'icon-cronograma2.png' ){ echo 'select';} ?>" name="icon-cronograma2.png" codigo="<?php echo $laz['cd_lazer']; ?>">

                                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tecnocal2.0/wp-content/themes/tecnocal/img/icon/icone-fitness.png" class="icon <?php if( $laz['im_icon'] == 'icone-fitness.png' ){ echo 'select';} ?>" name="icone-fitness.png" codigo="<?php echo $laz['cd_lazer']; ?>">

                                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tecnocal2.0/wp-content/themes/tecnocal/img/icon/icon-empreendimento2.png" class="icon <?php if( $laz['im_icon'] == 'icon-empreendimento2.png' ){ echo 'select';} ?>" name="icon-empreendimento2.png" codigo="<?php echo $laz['cd_lazer']; ?>">

                                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tecnocal2.0/wp-content/themes/tecnocal/img/icon/icon-jogos.png" class="icon <?php if( $laz['im_icon'] == 'icon-jogos.png' ){ echo 'select';} ?>" name="icon-jogos.png" codigo="<?php echo $laz['cd_lazer']; ?>">

                                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tecnocal2.0/wp-content/themes/tecnocal/img/icon/icon-lazer2.png" class="icon <?php if( $laz['im_icon'] == 'icon-lazer2.png' ){ echo 'select';} ?>" name="icon-lazer2.png" codigo="<?php echo $laz['cd_lazer']; ?>">

                                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tecnocal2.0/wp-content/themes/tecnocal/img/icon/icon-local.png" class="icon <?php if( $laz['im_icon'] == 'icon-local.png' ){ echo 'select';} ?>" name="icon-local.png" codigo="<?php echo $laz['cd_lazer']; ?>">

                                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tecnocal2.0/wp-content/themes/tecnocal/img/icon/icon-mae.png" class="icon <?php if( $laz['im_icon'] == 'icon-mae.png' ){ echo 'select';} ?>" name="icon-mae.png" codigo="<?php echo $laz['cd_lazer']; ?>">

                                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tecnocal2.0/wp-content/themes/tecnocal/img/icon/icon-noticias.png" class="icon <?php if( $laz['im_icon'] == 'icon-noticias.png' ){ echo 'select';} ?>" name="icon-noticias.png" codigo="<?php echo $laz['cd_lazer']; ?>">

                                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tecnocal2.0/wp-content/themes/tecnocal/img/icon/icon-obra.png" class="icon <?php if( $laz['im_icon'] == 'icon-obra.png' ){ echo 'select';} ?>" name="icon-obra.png" codigo="<?php echo $laz['cd_lazer']; ?>">

                                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tecnocal2.0/wp-content/themes/tecnocal/img/icon/icon-piscina.png" class="icon <?php if( $laz['im_icon'] == 'icon-piscina.png' ){ echo 'select';} ?>" name="icon-piscina.png" codigo="<?php echo $laz['cd_lazer']; ?>">

                                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tecnocal2.0/wp-content/themes/tecnocal/img/icon/icon-planta2.png" class="icon <?php if( $laz['im_icon'] == 'icon-planta2.png' ){ echo 'select';} ?>" name="icon-planta2.png" codigo="<?php echo $laz['cd_lazer']; ?>">

                                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tecnocal2.0/wp-content/themes/tecnocal/img/icon/icon-som.png" class="icon <?php if( $laz['im_icon'] == 'icon-som.png' ){ echo 'select';} ?>" name="icon-som.png" codigo="<?php echo $laz['cd_lazer']; ?>">

                                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tecnocal2.0/wp-content/themes/tecnocal/img/icon/icon-tempo.png" class="icon <?php if( $laz['im_icon'] == 'icon-tempo.png' ){ echo 'select';} ?>" name="icon-tempo.png" codigo="<?php echo $laz['cd_lazer']; ?>">

                                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tecnocal2.0/wp-content/themes/tecnocal/img/icon/icon-venha.png" class="icon <?php if( $laz['im_icon'] == 'icon-venha.png' ){ echo 'select';} ?>" name="icon-venha.png" codigo="<?php echo $laz['cd_lazer']; ?>">

                                    </div>
                                </div>

                                <div class="col-lg-6 pd--0">
                                    <label for="bloc_lazer<?php echo $laz['cd_lazer']; ?>">
                                        <img id="bloc_img_lazer<?php echo $laz['cd_lazer']; ?>" class="bloc_img_lazer" src="<?php echo site_url() ?>assets/empreendimento/<?php echo $empreendimentos[0]['cd_empreendimento']; ?>/lazer/<?php echo $laz['im_lazer']; ?>">
                                    </label>

                                    <div class="excluir_lazer" codigo="<?php echo $laz['cd_lazer']; ?>" nome="<?php echo $laz['nm_lazer']; ?>">
                                        EXCLUIR
                                    </div>
                                </div>

                                <div class="col-lg-12 pd--0">
                                    <label for="bloc_txt_lazer_<?php echo $laz['cd_lazer']; ?>" class="padrao">Descrição do Lazer:</label>
                                    <textarea name="bloc_txt_lazer[<?php echo $laz['cd_lazer']; ?>]" id="bloc_txt_lazer_<?php echo $laz['cd_lazer']; ?>" cols="30" rows="5" style="padding: 10px 10px 10px 10px; text-indent: 140px;"><?php echo $laz['ds_lazer']; ?></textarea>             
                                </div>
                            </div>

                        <?php } ?>
                    </div>

                    <div class="col-lg-12 pd--0">
                        <hr>

                        <div id="novo_lazer" class="submit salvar">Adicionar novo Lazer</div>

                        <div id="bloc_novo_lazer">
                            <div class="col-lg-12 pd--0">

                                <div class="col-lg-6 pd--0">
                                    <p><b>Dimensões Ideal:</b><br> Largura: 581px | Altura: 371px</p>

                                    <div id="remove_lazer_novo" class="x-banner" style="margin: 0;">X</div>

                                    <input type="file" name="lazer_novo" id="lazer_novo" style="padding: 10px; margin-bottom: 0; margin-top: 5px;">

                                    <label for="nome_lazer_novo" class="padrao">Nome do Lazer:</label>
                                    <input id="nome_lazer_novo" name="nome_lazer_novo" type="input" style="padding-left: 120px; margin-bottom: 0;" >

                                    <label for="novo_lazer_posicao" class="padrao">Posição:</label>
                                    <select id="novo_lazer_posicao" name="novo_lazer_posicao" style="padding-left: 85px;">
                                        <option value="1" >
                                            1
                                        </option>
                                        <option value="2" >
                                            2
                                        </option>
                                        <option value="3" >
                                            3
                                        </option>
                                        <option value="4" >
                                            4
                                        </option>
                                        <option value="5" >
                                            5
                                        </option>
                                        <option value="6" >
                                            6
                                        </option>
                                        <option value="7" >
                                            7
                                        </option>
                                        <option value="8" >
                                            8
                                        </option>
                                        <option value="9" >
                                            9
                                        </option>
                                        <option value="10" >
                                            10
                                        </option>
                                    </select>                                    

                                    <input type="hidden" name="ic_lazer_novo" id="ic_lazer_novo">

                                    <p class="padrao">Icone:</p>
                                    <div id="icones_novo" class="col-lg-12 icones">

                                        <input type="hidden" name="icon-lazer-novo" id="icon-lazer-novo" value="icon-abc.png">

                                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tecnocal2.0/wp-content/themes/tecnocal/img/icon/icon-abc.png" class="icon select" name="icon-abc.png">

                                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tecnocal2.0/wp-content/themes/tecnocal/img/icon/icon-casa-local.png" class="icon" name="icon-casa-local.png">

                                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tecnocal2.0/wp-content/themes/tecnocal/img/icon/icon-chave.png" class="icon" name="icon-chave.png">

                                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tecnocal2.0/wp-content/themes/tecnocal/img/icon/icon-cronograma2.png" class="icon" name="icon-cronograma2.png">

                                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tecnocal2.0/wp-content/themes/tecnocal/img/icon/icone-fitness.png" class="icon" name="icone-fitness.png">

                                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tecnocal2.0/wp-content/themes/tecnocal/img/icon/icon-empreendimento2.png" class="icon" name="icon-empreendimento2.png">

                                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tecnocal2.0/wp-content/themes/tecnocal/img/icon/icon-jogos.png" class="icon" name="icon-jogos.png">

                                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tecnocal2.0/wp-content/themes/tecnocal/img/icon/icon-lazer2.png" class="icon" name="icon-lazer2.png">

                                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tecnocal2.0/wp-content/themes/tecnocal/img/icon/icon-local.png" class="icon" name="icon-local.png">

                                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tecnocal2.0/wp-content/themes/tecnocal/img/icon/icon-mae.png" class="icon" name="icon-mae.png">

                                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tecnocal2.0/wp-content/themes/tecnocal/img/icon/icon-noticias.png" class="icon" name="icon-noticias.png">

                                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tecnocal2.0/wp-content/themes/tecnocal/img/icon/icon-obra.png" class="icon" name="icon-obra.png">

                                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tecnocal2.0/wp-content/themes/tecnocal/img/icon/icon-piscina.png" class="icon" name="icon-piscina.png">

                                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tecnocal2.0/wp-content/themes/tecnocal/img/icon/icon-planta2.png" class="icon" name="icon-planta2.png">

                                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tecnocal2.0/wp-content/themes/tecnocal/img/icon/icon-som.png" class="icon" name="icon-som.png">

                                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tecnocal2.0/wp-content/themes/tecnocal/img/icon/icon-tempo.png" class="icon" name="icon-tempo.png">

                                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tecnocal2.0/wp-content/themes/tecnocal/img/icon/icon-venha.png" class="icon" name="icon-venha.png">

                                    </div>
                                </div>

                                <div class="col-lg-6 pd--0">
                                    <label for="lazer_novo">
                                        <img id="img_lazer_novo" class="img_lazer_novo" src="<?php echo site_url() ?>assets/empreendimento/0/lazer/img_lazer.jpg">
                                    </label>
                                </div>

                                <div class="col-lg-12 pd--0">
                                    <label for="txt_lazer_novo" class="padrao">Descrição do Lazer:</label>
                                    <textarea name="txt_lazer_novo" id="txt_lazer_novo" cols="30" rows="5" style="padding: 10px 10px 10px 10px; text-indent: 140px;"></textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
        
                <div class="row">
                    <hr>
                    <div class="col-lg-6">
                        <input type="submit" class="submit salvar" value="Salvar" />
                    </div>
                </div>

            <?php echo form_close(); ?> 
            <button class="submit excluir abrir-excluir">Excluir</button>                      
        </div>
    </div>

    <div class="fundo-preto-exclir-lazer"></div>
    <div class="bloco-exclir-lazer">
        <div class="conteudo-lazer">
            <h2 style="font-size: 24px;">DESEJA EXCLUIR,<br><span id="nome_do_excluir"></span> ?</h2>

            <?php echo form_open_multipart('empreendimentos/excluirlazer/'.$empreendimentos[0]["cd_empreendimento"], array('id' => 'formulario-excluir','class' => 'empreendimentos excluir padrao') ) ?>
                
                <div class="col-lg-12">
                    <input type="hidden" name="codigo" id="codigo_excluir_lazer" value="Excluir" />
                    <input type="submit" class="submit excluir" value="Excluir" />
                </div>

                <div class="col-lg-12">
                    <div class="submit salvar">Voltar</div>
                </div>               

            <?php echo form_close(); ?> 

        </div>
    </div>

    <div class="fundo-preto-exclir-planta"></div>
    <div class="bloco-exclir-planta">
        <div class="conteudo-planta">
            <h2 style="font-size: 24px;">DESEJA EXCLUIR,<br><span id="nome_do_excluir_planta"></span> ?</h2>

            <?php echo form_open_multipart('empreendimentos/excluirplanta/'.$empreendimentos[0]["cd_empreendimento"], array('id' => 'formulario-excluir','class' => 'empreendimentos excluir padrao') ) ?>
                
                <div class="col-lg-12">
                    <input type="hidden" name="codigo" id="codigo_excluir_planta" value="Excluir" />
                    <input type="submit" class="submit excluir" value="Excluir" />
                </div>

                <div class="col-lg-12">
                    <div class="submit salvar">Voltar</div>
                </div>               

            <?php echo form_close(); ?> 

        </div>
    </div>

    <div class="fundo-preto-exclir-obra"></div>
    <div class="bloco-exclir-obra">
        <div class="conteudo-obra">
            <h2 style="font-size: 24px;">DESEJA EXCLUIR,<br><span id="nome_do_excluir_obra"></span> ?</h2>

            <?php echo form_open_multipart('empreendimentos/excluirobra/'.$empreendimentos[0]["cd_empreendimento"], array('id' => 'formulario-excluir','class' => 'empreendimentos excluir padrao') ) ?>
                
                <div class="col-lg-12">
                    <input type="hidden" name="codigo" id="codigo_excluir_obra" value="Excluir" />
                    <input type="submit" class="submit excluir" value="Excluir" />
                </div>

                <div class="col-lg-12">
                    <div class="submit salvar">Voltar</div>
                </div>               

            <?php echo form_close(); ?> 

        </div>
    </div>

    <div class="fundo-preto-exclir"></div>
    <div class="bloco-exclir">
        <div class="conteudo">
            <h2 style="font-size: 24px;">DESEJA EXCLUIR ESTE EMPREENDIMENTOS?</h2>
            <?php echo form_open_multipart('empreendimentos/excluir/'.$empreendimentos[0]["cd_empreendimento"], array('id' => 'formulario-excluir','class' => 'empreendimentos excluir padrao') ) ?>
                
                <div class="col-lg-12">
                    
                    <input type="submit" class="submit excluir" value="Excluir" />
                </div>

                <div class="col-lg-12">
                    <div class="submit salvar">Voltar</div>
                </div>               

            <?php echo form_close(); ?> 

        </div>
    </div>
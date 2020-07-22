    <div class="row">
        <div class="btn-navegacao">
            <a href="<?php echo site_url() ?>empreendimentos"><button>VOLTAR</button></a>                        
        </div>
        <h2>Empreendimento &#8608; Cadastrar</h2>
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

    <section id="menu-empreendimento" class="cadastrar-bloco">
        <div class="row">
            <div class="col-lg-12 btns-all">

                <div id="btn-dados" class="btn-empre select" bloco="#bloc-dados">
                    <img src="<?php echo base_url('assets');?>/images/icones/icon-gerais.png"><br>
                    Dados<br>Gerais                    
                </div>

                <div id="btn-fotos" class="dpy--none btn-empre" bloco="#bloc-fotos">
                    <img src="<?php echo base_url('assets');?>/images/icones/icon-galeria.png"><br>
                    Fotos
                </div>

                <div id="btn-planta" class="dpy--none btn-empre" bloco="#bloc-planta">
                    <img src="<?php echo base_url('assets');?>/images/icones/icon-planta.png"><br>
                    Planta
                </div>

                <div id="btn-cronograma" class="dpy--none btn-empre" bloco="#bloc-cronograma">
                    <img src="<?php echo base_url('assets');?>/images/icones/icon-cronograma.png"><br>
                    Cronograma
                </div>

                <div id="btn-obra" class="dpy--none btn-empre" bloco="#bloc-obra">
                    <img src="<?php echo base_url('assets');?>/images/icones/icon-galeria-obra.png"><br>
                    Galeria<br>da obra
                </div>

                <div id="btn-localizacao" class="dpy--none btn-empre" bloco="#bloc-localizacao">
                    <img src="<?php echo base_url('assets');?>/images/icones/icon-localizacao.png"><br>
                    Localização
                </div>

                <div id="btn-lazer" class="dpy--none btn-empre" bloco="#bloc-lazer">
                    <img src="<?php echo base_url('assets');?>/images/icones/icon-lazer.png"><br>
                    Lazer
                </div>

            </div>
        </div>        
    </section>    
       
    <div class="row">
        <div class="col-lg-12">
            <?php echo form_open_multipart('empreendimentos/cadastrar', array('id' => 'formulario','class' => 'empreendimentos atualizar padrao') ) ?>

                <section id="bloc-dados" class="bloco-btn">
                    <h3>Dados Gerais</h3>

                    <div class="row">
                        <div class="col-lg-12">
                            <label for="nome" class="padrao">Nome:</label>
                            <input id="nome" name="nome" type="input" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <label for="nome_preview" class="padrao">Nome Resumido:</label>
                            <input id="nome_preview" name="nome_preview" type="input" style="padding-left: 140px;" required>  
                        </div>
                        <div class="col-lg-6">
                            <label for="posicao" class="padrao">Posição:</label>
                                <select id="posicao" name="posicao" style="padding-left: 85px;">

                                    <option value="1">
                                        1
                                    </option>
                                    <option value="2">
                                        2
                                    </option>
                                    <option value="3">
                                        3
                                    </option>
                                    <option value="4">
                                        4
                                    </option>
                                    <option value="5">
                                        5
                                    </option>
                                    <option value="6">
                                        6
                                    </option>
                                    <option value="7">
                                        7
                                    </option>
                                    <option value="8">
                                        8
                                    </option>
                                    <option value="9">
                                        9
                                    </option>
                                    <option value="10">
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
                                    <option value="0" >
                                        Desbloqueado
                                    </option>
                                    <option value="1" >
                                        Bloqueado
                                    </option>
                                </select>
                            </div>

                            <div class="col-lg-12 pd--0">
                                <label for="situacao" class="padrao">Situação:</label>
                                <select id="situacao" name="situacao" required style="padding-left: 85px;">

                                    <option value="Futuros Lançamentos" >
                                        Futuros Lançamentos
                                    </option>

                                    <option value="Lançamentos" >
                                        Lançamentos
                                    </option>

                                    <option value="Em construção" >
                                        Em construção
                                    </option>

                                    <option value="Prontos para Morar" >
                                        Prontos para Morar
                                    </option>

                                    <option value="Entregues/Portfolio" >
                                        Entregues/Portfolio
                                    </option>

                                    <option value="Entregues" >
                                        Entregues
                                    </option>
                                </select>
                            </div>

                            <div class="col-lg-12 pd--0">
                                <label for="mar" class="padrao">Distancia do Mar:</label>
                                <input id="mar" name="mar" type="number" style="padding-left: 140px;">
                            </div>

                        </div>

                        <div class="col-lg-6">

                            <div class="col-lg-12 pd--0">
                                <label for="dt_empreendimento" class="padrao">Data de Lançamento:</label>

                                <input id="dt_empreendimento" name="dt_empreendimento" type="date" required style="padding-left: 160px;">
                            </div>

                            <div class="col-lg-12 pd--0">
                                <label for="vl_empreendimento" class="padrao">Valor do Empreendimento:</label>

                                <input id="vl_empreendimento" name="vl_empreendimento" type="text" style="padding-left: 200px;">
                            </div>

                            <div class="col-lg-12 pd--0">

                                <div class="col-lg-6 pd--0">
                                    <input type="checkbox" id="perto_praia" name="perto_praia" style="margin-top: 20px;">
                                    <label for="perto_praia">Perto da praia</label>
                                </div>

                                <div class="col-lg-6 pd--0">
                                    <input type="checkbox" id="revenda" name="revenda" style="margin-top: 20px;">
                                    <label for="revenda">Revenda</label>
                                </div>
                                    
                            </div>                           

                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-lg-12 cores">
                            <h3>Cor do Empreendimento</h3>
                            <input type="hidden" id="txtCor" name="txtCor" value="<?php echo $colors[0]["cd_color"]; ?>">
                            
                            <div class="paleta">

                                <?php foreach ($colors as $cor) { ?>
                                    <div class="cor <?php if( $colors[0]["cd_color"] == $cor["cd_color"] ){ echo "activo"; } ?>" cor="<?php echo $cor["cd_color"]; ?>" style="background-color: <?php echo $cor["cd_hexadecimal"]; ?> ;"></div>
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
                                    <input type="checkbox" id="1_dorm" name="1_dorm" >
                                    <label for="1_dorm"> 1 dormitório</label>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="col-lg-12">
                                    <input type="checkbox" id="2_dorm" name="2_dorm" >
                                    <label for="2_dorm"> 2 dormitórios</label>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="col-lg-12">
                                    <input type="checkbox" id="3_dorm" name="3_dorm" >
                                    <label for="3_dorm"> 3 dormitórios</label>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="col-lg-12">
                                    <input type="checkbox" id="4_dorm" name="4_dorm" >
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
                                    <input type="checkbox" id="1_suite" name="1_suite" >
                                    <label for="1_suite"> 1 suíte</label>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="col-lg-12">
                                    <input type="checkbox" id="2_suite" name="2_suite" >
                                    <label for="2_suite"> 2 suítes</label>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="col-lg-12">
                                    <input type="checkbox" id="3_suite" name="3_suite" >
                                    <label for="3_suite"> 3 suítes</label>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="col-lg-12">
                                    <input type="checkbox" id="4_suite" name="4_suite" >
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
                                    <input type="checkbox" id="1_vaga" name="1_vaga" >
                                    <label for="1_vaga"> 1 vaga</label>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="col-lg-12">
                                    <input type="checkbox" id="2_vaga" name="2_vaga" >
                                    <label for="2_vaga"> 2 vagas</label>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="col-lg-12">
                                    <input type="checkbox" id="3_vaga" name="3_vaga" >
                                    <label for="3_vaga"> 3 vagas</label>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="col-lg-12">
                                    <input type="checkbox" id="4_vaga" name="4_vaga" >
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
                                <option value="0" >
                                    Não possui
                                </option>
                                <option value="1" >
                                    Possui
                                </option>
                            </select>
                        </div>
                        
                        <div class="col-lg-12 pd--0">
                            <div class="col-lg-6">
                                <label for="met-min" class="padrao">Metragem mínima:</label>
                                <input id="met-min" name="met-min" type="number" step="0.01" style="padding-left: 140px;" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="met-max" class="padrao">Metragem máxima:</label>
                                <input id="met-max" name="met-max" type="number" step="0.01" style="padding-left: 140px;">
                            </div>
                        </div>
                    </div>                    

                    <div class="row">
                        <div class="col-lg-12">
                            <label for="lazer" class="padrao">Área de Lazer:</label>
                            <textarea name="lazer" id="lazer" cols="30" rows="5" style="padding: 30px 10px 10px 30px;"></textarea>
                        </div>                        
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <label for="descricao" class="padrao">Descrição do Empreendimento:</label>
                            <textarea name="descricao" id="descricao" cols="30" rows="10" style="padding: 30px 10px 10px 30px;" required></textarea>
                        </div>                        
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <label for="video" class="padrao">Vídeo do Empreendimento:</label>
                            <input id="video" name="video" type="input" style="padding-left: 205px;">
                        </div>
                    </div>
                    <div id="primeiro_proximo" class="submit salvar">Próximo</div>
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
                            <img class="img_capa" src="<?php echo site_url() ?>assets/empreendimento/0/capa.jpg">
                        </label>

                        <div id="remove_capa" class="x-banner">X</div>
                        <input type="file" name="capa" id="capa" style="padding: 10px;">

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
                        </div>

                        <div class="col-lg-6 pd--0">
                           <label for="thumb">
                                <img class="img_thumb" src="<?php echo site_url() ?>assets/empreendimento/0/thumb.jpg">
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

                        </div>

                        <div class="col-lg-6 pd--0 bloc-logo">
                            <label for="logo_empreendimento">
                                <img class="img-logo-edit" src="<?php echo site_url() ?>assets/empreendimento/0/logo.png">
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

                        </div>

                        <div class="col-lg-6 pd--0 bloc-logo">
                            <label for="destaque1_empreendimento">
                                <img class="img_empreendimento img_empreendimento1" src="<?php echo site_url() ?>assets/empreendimento/0/empreendimento1.jpg">
                            </label>
                        </div>

                        <div class="col-lg-6 pd--0">
                            <div id="remove_destaque2" class="x-banner">X</div>
                            <input type="file" name="destaque2_empreendimento" id="destaque2_empreendimento" style="padding: 10px;">
                        </div>

                        <div class="col-lg-6 pd--0 bloc-logo">
                            <label for="destaque2_empreendimento">
                                <img class="img_empreendimento img_empreendimento2" src="<?php echo site_url() ?>assets/empreendimento/0/empreendimento2.jpg">
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

                        </div>

                        <div class="col-lg-6 pd--0 bloc-logo">
                            <label for="destaque_principal_empreendimento">
                                <img class="wd--100 image_destaque_principal" src="<?php echo site_url() ?>assets/empreendimento/0/destaque_principal.jpg">
                            </label>
                        </div>
                    </div>

                    <div id="segundo_proximo" class="submit salvar" style="display: inline-block;">Próximo</div>
                </section>

                <section id="bloc-planta" class="bloco-btn">
                    <h3>Planta</h3>

                    <div class="col-lg-12 pd--0">
                        <hr>
                        <div id="bloc_nova_planta">
                            <div class="col-lg-12 pd--0">

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
                    <div id="terceiro_proximo" class="submit salvar" style="display: inline-block;">Próximo</div>
                </section>

                <section id="bloc-cronograma" class="bloco-btn">
                    <h3>Cronograma</h3>
                    <hr>
                    <div class="col-lg-12 pd--0">

                        <div class="col-lg-12">
                            <div class="col-lg-12 pd--0">
                                <label for="entrega" class="padrao">Entrega:</label>
                                <input id="entrega" name="entrega" type="month" style="padding-left: 80px;" >
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="col-lg-12 pd--0">
                                <label for="fundacao" class="padrao">Fundação:</label>
                                <input id="fundacao" name="fundacao" type="number" style="padding-left: 90px;" required max="100" min="0" step="0.01">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="col-lg-12 pd--0">
                                <label for="estrutura" class="padrao">Estrutura:</label>
                                <input id="estrutura" name="estrutura" type="number" style="padding-left: 80px;" required max="100" min="0" step="0.01">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 pd--0">
                        <hr>
                        <h3>Alvenaria</h3>

                        <div class="col-lg-4">
                            <div class="col-lg-12 pd--0">
                                <label for="interno" class="padrao">Rev. Interno:</label>
                                <input id="interno" name="interno" type="number" style="padding-left: 100px;" required max="100" min="0" step="0.01">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="col-lg-12 pd--0">
                                <label for="externo" class="padrao">Rev. Externo:</label>
                                <input id="externo" name="externo" type="number" style="padding-left: 105px;" required max="100" min="0" step="0.01">
                            </div>
                        </div>                        
                        <div class="col-lg-4">
                            <label for="alvenaria" class="padrao">Alvenaria:</label>
                            <input id="alvenaria" name="alvenaria" type="number" style="padding-left: 90px;" required max="100" min="0" step="0.01">
                        </div>
                    </div>

                    <div class="col-lg-12 pd--0">
                        <hr>
                        <h3>Acabamento</h3>

                        <div class="col-lg-4">
                            <div class="col-lg-12 pd--0">
                                <label for="piso" class="padrao">Piso:</label>
                                <input id="piso" name="piso" type="number" style="padding-left: 50px;" required max="100" min="0" step="0.01">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="col-lg-12 pd--0">
                                <label for="instalacoes" class="padrao">Instalações:</label>
                                <input id="instalacoes" name="instalacoes" type="number" style="padding-left: 95px;" required max="100" min="0" step="0.01">
                            </div>
                        </div>                        
                        <div class="col-lg-4">
                            <label for="pintura" class="padrao">Pintura:</label>
                            <input id="pintura" name="pintura" type="number" style="padding-left: 70px;" required max="100" min="0" step="0.01">
                        </div>
                    </div>
                    <div id="quarto_proximo" class="submit salvar" style="display: inline-block;">Próximo</div>
                </section>

                <section id="bloc-obra" class="bloco-btn">
                    <h3>Galeria da Obra</h3>
                    <hr>
                    <div class="col-lg-12 pd--0">
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
                                    <select id="novo_foto_obra_posicao" name="novo_foto_obra_posicao" style="padding-left: 85px;">
                                        <option value="01" >
                                            1
                                        </option>
                                        <option value="02" >
                                            2
                                        </option>
                                        <option value="03" >
                                            3
                                        </option>
                                        <option value="04" >
                                            4
                                        </option>
                                        <option value="05" >
                                            5
                                        </option>
                                        <option value="06" >
                                            6
                                        </option>
                                        <option value="07" >
                                            7
                                        </option>
                                        <option value="08" >
                                            8
                                        </option>
                                        <option value="09" >
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
                    <div id="quinto_proximo" class="submit salvar" style="display: inline-block;">Próximo</div>
                </section>

                <section id="bloc-localizacao" class="bloco-btn">
                    <h3>Localização</h3>
                    <hr>
                    <div class="col-lg-12 pd--0">
                        <div class="col-lg-6">
                            <div class="col-lg-12 pd--0">
                                <label for="logradouro" class="padrao">Logradouro:</label>
                                <select name="logradouro" style="padding-left: 95px;" required>
                                    <option value="Rua">
                                        Rua
                                    </option> 
                                    <option value="Avenida">
                                        Avenida
                                    </option> 
                                    <option value="Vila">
                                        Vila
                                    </option> 
                                    <option value="Travessa">
                                        Travessa
                                    </option> 
                                    <option value="Distrito">
                                        Distrito
                                    </option> 
                                    <option value="Setor">
                                        Setor
                                    </option>
                                    <option value="Quadra">
                                        Quadra
                                    </option>
                                    <option value="Parque">
                                        Parque
                                    </option>
                                    <option value="Jardim">
                                        Jardim
                                    </option>
                                    <option value="Estrada">
                                        Estrada
                                    </option>
                                    <option value="Rodovia">
                                        Rodovia
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="col-lg-12 pd--0">
                                <label for="endereco" class="padrao">Endereço:</label>
                                <input id="endereco" name="endereco" type="text" style="padding-left: 85px;" required>
                            </div>                            
                        </div>
                    </div>
                    <div class="col-lg-12 pd--0">
                        <div class="col-lg-6">
                            <div class="col-lg-12 pd--0">
                                <label for="numero" class="padrao">Número:</label>
                                <input id="numero" name="numero" type="text" style="padding-left: 80px;" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="col-lg-12 pd--0">
                                <label for="bairro" class="padrao">Bairro:</label>
                                <select id="bairro" name="bairro" style="padding-left: 65px;" required>
                                    <option value="Andaraguá">Andaraguá</option>
                                    <option value="Anhanguera">Anhanguera</option>
                                    <option value="Antártica">Antártica</option>
                                    <option value="Aviação">Aviação</option>
                                    <option value="Boqueirão">Boqueirão</option>
                                    <option value="Caiçara">Caiçara</option>
                                    <option value="Canto do Forte">Canto do Forte</option>
                                    <option value="Cidade da Criança">Cidade da Criança</option>
                                    <option value="Esmeralda">Esmeralda</option>
                                    <option value="Glória">Glória</option>
                                    <option value="Guilhermina">Guilhermina</option>
                                    <option value="Imperador">Imperador</option>
                                    <option value="Maracanã">Maracanã</option>
                                    <option value="Melvi">Melvi</option>
                                    <option value="Mioptiontar">Mioptiontar</option>
                                    <option value="Mirim">Mirim</option>
                                    <option value="Nova Mirim">Nova Mirim</option>
                                    <option value="Ocian">Ocian</option>
                                    <option value="Princesa">Princesa</option>
                                    <option value="Quietudo">Quietudo</option>
                                    <option value="Real">Real</option>
                                    <option value="Ribeirópooptions">Ribeirópooptions</option>
                                    <option value="Samambaia">Samambaia</option>
                                    <option value="Santa Marina">Santa Marina</option>
                                    <option value="Serra do Mar">Serra do Mar</option>
                                    <option value="Solemar">Solemar</option>
                                    <option value="Sítio do Campo">Sítio do Campo</option>
                                    <option value="Tupi">Tupi</option>
                                    <option value="Tupiry">Tupiry</option>
                                    <option value="Vila Sônia">Vila Sônia</option>
                                    <option value="Xixová">Xixová</option>
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
                                <input type="checkbox" id="academia" name="academia">
                                <label for="academia">Academia</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="col-lg-12 pd--0">
                                <input type="checkbox" id="escola" name="escola">
                                <label for="escola">Escola</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="col-lg-12 pd--0">
                                <input type="checkbox" id="padaria" name="padaria">
                                <label for="padaria">Padaria</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="col-lg-12 pd--0">
                                <input type="checkbox" id="shopping" name="shopping">
                                <label for="shopping">Shopping</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 pd--0 txt-center">
                        <div class="col-lg-4">
                            <div class="col-lg-12 pd--0">
                                <input type="checkbox" id="banco" name="banco">
                                <label for="banco">Banco</label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="col-lg-12 pd--0">
                                <input type="checkbox" id="hospital" name="hospital">
                                <label for="hospital">Hospital</label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="col-lg-12 pd--0">
                                <input type="checkbox" id="loja" name="loja">
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
                            <img class="img_mapa" src="<?php echo site_url() ?>assets/empreendimento/0/mapa.jpg">
                        </label>
                        <div id="remove_mapa" class="x-banner">X</div>
                        <input type="file" name="mapa" id="mapa" style="padding: 10px;">

                    </div>
                    <div id="sexto_proximo" class="submit salvar" style="display: inline-block;">Próximo</div>
                </section>                

                <section id="bloc-lazer" class="bloco-btn">
                    <h3>Lazer</h3>
                    <div class="col-lg-12 pd--0">
                        <hr>
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

                        <div class="row">
                            <hr>
                            <div class="col-lg-12">
                                <input type="submit" class="submit salvar" value="Salvar" />
                            </div>
                        </div>
                    </div>
                </section>
            <?php echo form_close(); ?>
        </div>
    </div>

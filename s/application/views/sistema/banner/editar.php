    <div class="row">
        <div class="btn-navegacao">
            <a href="<?php echo site_url() ?>banner"><button>VOLTAR</button></a>                        
        </div>
        <h2>Banner &#8608; Editar</h2>
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

            <h3>Informações do banner</h3>

            <?php echo form_open_multipart('banner/editar/'.$banner[0]["cd_banner"], array('id' => 'formulario','class' => 'banner atualizar padrao') ) ?>

                <div class="row">
                    <div class="col-lg-12">
                        <label for="nome" class="padrao">Nome:</label>
                        <input id="nome" name="nome" type="input" value="<?php echo $banner[0]["nm_banner"]; ?>" required>  
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <label for="posicao" class="padrao">Posição:</label>
                        <select name="posicao" id="posicao" required>

                            <option value="1" <?php if( $banner[0]["ds_posicao"] == 1 ){ echo "selected"; } ?> >
                                1
                            </option>

                            <option value="2" <?php if( $banner[0]["ds_posicao"] == 2 ){ echo "selected"; } ?> >
                                2
                            </option>

                            <option value="3" <?php if( $banner[0]["ds_posicao"] == 3 ){ echo "selected"; } ?> >
                                3
                            </option>

                            <option value="4" <?php if( $banner[0]["ds_posicao"] == 4 ){ echo "selected"; } ?> >
                                4
                            </option>

                            <option value="5" <?php if( $banner[0]["ds_posicao"] == 5 ){ echo "selected"; } ?> >
                                5
                            </option>

                            <option value="6" <?php if( $banner[0]["ds_posicao"] == 6 ){ echo "selected"; } ?> >
                                6
                            </option>

                            <option value="7" <?php if( $banner[0]["ds_posicao"] == 7 ){ echo "selected"; } ?> >
                                7
                            </option>

                            <option value="8" <?php if( $banner[0]["ds_posicao"] == 8 ){ echo "selected"; } ?> >
                                8
                            </option>

                            <option value="9" <?php if( $banner[0]["ds_posicao"] == 9 ){ echo "selected"; } ?> >
                                9
                            </option>

                            <option value="10" <?php if( $banner[0]["ds_posicao"] == 10 ){ echo "selected"; } ?> >
                                10
                            </option>

                        </select>
                    </div>

                    <div class="col-lg-6">
                        <label for="estado" class="padrao">Estado:</label>
                        <select id="estado" name="estado" required>
                            <option value="1" <?php if( $banner[0]["ic_suspenso"] == 1 ){ echo "selected"; } ?> >
                                Bloqueado
                            </option>
                            <option value="0" <?php if( $banner[0]["ic_suspenso"] == 0 ){ echo "selected"; } ?> >
                                Desbloqueado
                            </option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <label for="dtinicio" class="padrao">Data Inicio:</label>
                        <input id="dtinicio" name="dtinicio" type="date" value="<?php echo $banner[0]["dt_inicio"]; ?>" required style="padding: 10px 10px 10px 90px;">
                    </div>

                    <div class="col-lg-6">
                        <label for="dtfinal" class="padrao">Data Final:</label>
                        <input id="dtfinal" name="dtfinal" type="date" value="<?php echo $banner[0]["dt_final"]; ?>" min="<?php echo $banner[0]["dt_inicio"]; ?>" required style="padding: 10px 10px 10px 90px;">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <label for="link" class="padrao">Link:</label>
                        <input id="link" name="link" type="input" value="<?php echo $banner[0]["ds_link"]; ?>">  
                    </div>
                </div>

                <hr>

                <h3>Banner Desktop</h3>
                    <div class="row">
                        <div class="col-lg-6">
                            <p><b>Dimensões:</b><br> Largura: 1920px | Altura: 540px</p>
                        </div>

                        <div class="col-lg-6">
                            <p><b>Área de Segurança:</b><br> Largura: 1200px | Altura: 540px</p>
                        </div>
                    </div>

                    <label for="banner_desktop">
                        <img class="img_desktop" src="<?php echo site_url() ?>assets/banner/<?php echo $banner[0]['cd_banner']; ?>/desktop/<?php echo $banner[0]['ds_caminho_desktop']; ?>">

                        <img class="filtro filtro-desktop" src="<?php echo site_url() ?>assets/banner/0/desktop/filtro_desktop.png">
                    </label>

                    <div id="remove_banner_desktop" class="x-banner">X</div>

                    <input type="file" name="banner_desktop" id="banner_desktop" style="padding: 10px;">

                    <input type="hidden" name="banner_desktop_antigo" class="banner_desktop_antigo" id="banner_desktop_antigo" value="<?php echo $banner[0]['ds_caminho_desktop']; ?>">

                <hr>

                <h3>Banner Tablet 1</h3>
                    <div class="row">
                        <div class="col-lg-6">
                            <p><b>Dimensões:</b><br> Largura: 1200px | Altura: 470px</p>
                        </div>

                        <div class="col-lg-6">
                            <p><b>Área de Segurança:</b><br> Largura: 991px | Altura: 470px</p>
                        </div>
                    </div>

                    <label for="banner_tablet1">
                        <img class="img_tablet1" src="<?php echo site_url() ?>assets/banner/<?php echo $banner[0]['cd_banner']; ?>/tablet1/<?php echo $banner[0]['ds_caminho_tablet1']; ?>">

                        <img class="filtro filtro-tablet1" src="<?php echo site_url() ?>assets/banner/0/tablet1/filtro_tablet1.png">
                    </label>
                    <div id="remove_banner_tablet1" class="x-banner">X</div>
                    <input type="file" name="banner_tablet1" id="banner_tablet1" style="padding: 10px;">

                    <input type="hidden" name="banner_tablet1_antigo" class="banner_tablet1_antigo" id="banner_tablet1_antigo" value="<?php echo $banner[0]['ds_caminho_tablet1']; ?>">
                <hr>

                <h3>Banner Tablet 2</h3>
                    <div class="row">
                        <div class="col-lg-6">
                            <p><b>Dimensões:</b><br> Largura: 991px | Altura: 360px</p>
                        </div>

                        <div class="col-lg-6">
                            <p><b>Área de Segurança:</b><br> Largura: 767px | Altura: 360px</p>
                        </div>
                    </div>

                    <label for="banner_tablet2">
                        <img class="img_tablet2" src="<?php echo site_url() ?>assets/banner/<?php echo $banner[0]['cd_banner']; ?>/tablet2/<?php echo $banner[0]['ds_caminho_tablet2']; ?>">

                        <img class="filtro filtro-tablet2" src="<?php echo site_url() ?>assets/banner/0/tablet2/filtro_tablet2.png">
                    </label>
                    <div id="remove_banner_tablet2" class="x-banner">X</div>
                    <input type="file" name="banner_tablet2" id="banner_tablet2" style="padding: 10px;">

                    <input type="hidden" name="banner_tablet2_antigo" class="banner_tablet2_antigo" id="banner_tablet2_antigo" value="<?php echo $banner[0]['ds_caminho_tablet2']; ?>">
                <hr>

                <h3>Banner Mobile</h3>
                    <div class="row">
                        <div class="col-lg-6">
                            <p><b>Dimensões:</b><br> Largura: 767px | Altura: 297px</p>
                        </div>

                        <div class="col-lg-6">
                            <p><b>Área de Segurança:</b><br> Largura: 320px | Altura: 297px</p>
                        </div>
                    </div>                    

                    <label for="banner_mobile">
                        <img class="img_mobile" src="<?php echo site_url() ?>assets/banner/<?php echo $banner[0]['cd_banner']; ?>/mobile/<?php echo $banner[0]['ds_caminho_mobile']; ?>">

                        <img class="filtro filtro-mobile" src="<?php echo site_url() ?>assets/banner/0/mobile/filtro_mobile.png">
                    </label>
                    <div id="remove_banner_mobile" class="x-banner">X</div>
                    <input type="file" name="banner_mobile" id="banner_mobile" style="padding: 10px;">

                    <input type="hidden" name="banner_mobile_antigo" class="banner_mobile_antigo" id="banner_mobile_antigo" value="<?php echo $banner[0]['ds_caminho_mobile']; ?>">
                <hr>

                <div class="row">
                    <div class="col-lg-6">
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
            <h2>DESEJA EXCLUIR ESTE BANNER?</h2>
            <?php echo form_open_multipart('banner/excluir/'.$banner[0]["cd_banner"], array('id' => 'formulario-excluir','class' => 'banner excluir padrao') ) ?>
                
                <div class="col-lg-12">
                    <input type="submit" class="submit excluir" value="Excluir" />
                </div>

                <div class="col-lg-12">
                    <div class="submit salvar">Voltar</div>
                </div>               

            <?php echo form_close(); ?> 

        </div>
    </div>
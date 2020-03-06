
    <div class="row">
        <div class="btn-navegacao">
            <a href="<?php echo site_url() ?>banner"><button>VOLTAR</button></a>                        
        </div>
        <h2>Banner &#8608; Cadastrar</h2>
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

            <?php echo form_open_multipart('banner/cadastrar/', array('id' => 'formulario','class' => 'banner cadastrar padrao') ) ?>

                <div class="row">
                    <div class="col-lg-12">
                        <label for="nome" class="padrao">Nome:</label>
                        <input id="nome" name="nome" type="input" required>  
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <label for="posicao" class="padrao">Posição:</label>
                        <select name="posicao" id="posicao" required>

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

                    <div class="col-lg-6">
                        <label for="estado" class="padrao">Estado:</label>
                        <select id="estado" name="estado" required>
                            <option value="1" >
                                Bloqueado
                            </option>
                            <option value="0" selected >
                                Desbloqueado
                            </option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <label for="dtinicio" class="padrao">Data Inicio:</label>
                        <input id="dtinicio" name="dtinicio" type="date" required style="padding: 10px 10px 10px 90px;">
                    </div>

                    <div class="col-lg-6">
                        <label for="dtfinal" class="padrao">Data Final:</label>
                        <input id="dtfinal" name="dtfinal" type="date" required style="padding: 10px 10px 10px 90px;">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <label for="link" class="padrao">Link:</label>
                        <input id="link" name="link" type="input">  
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
                        <img class="img_desktop" src="<?php echo site_url() ?>assets/banner/0/desktop/teste_desktop.jpg">
                        <img class="filtro filtro-desktop" src="<?php echo site_url() ?>assets/banner/0/desktop/filtro_desktop.png">
                    </label>

                    <input type="file" name="banner_desktop" id="banner_desktop" style="padding: 10px;" required>

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
                        <img class="img_tablet1" src="<?php echo site_url() ?>assets/banner/0/tablet1/teste_tablet1.jpg">
                        <img class="filtro filtro-tablet1" src="<?php echo site_url() ?>assets/banner/0/tablet1/filtro_tablet1.png">
                    </label>
                    <input type="file" name="banner_tablet1" id="banner_tablet1" style="padding: 10px;" required>

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
                        <img class="img_tablet2" src="<?php echo site_url() ?>assets/banner/0/tablet2/teste_tablet2.jpg">

                        <img class="filtro filtro-tablet2" src="<?php echo site_url() ?>assets/banner/0/tablet2/filtro_tablet2.png">
                    </label>
                    <input type="file" name="banner_tablet2" id="banner_tablet2" style="padding: 10px;" required>

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
                        <img class="img_mobile" src="<?php echo site_url() ?>assets/banner/0/mobile/teste_mobile.jpg">
                        <img class="filtro filtro-mobile" src="<?php echo site_url() ?>assets/banner/0/mobile/filtro_mobile.png">
                    </label>
                    <input type="file" name="banner_mobile" id="banner_mobile" style="padding: 10px;">
                <hr>

                <div class="row">
                    <div class="col-lg-6">
                        <input type="submit" class="submit salvar" value="Salvar" />
                    </div>
                </div>

            <?php echo form_close(); ?>                     
        </div>
    </div>
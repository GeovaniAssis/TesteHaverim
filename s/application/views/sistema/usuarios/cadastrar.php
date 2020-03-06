    <div class="row">
        <div class="btn-navegacao">
            <a href="<?php echo site_url() ?>usuarios"><button>VOLTAR</button></a>                        
        </div>
        <h2>Usuários &#8608; Cadastrar</h2>
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

            <h3>Informações do usuário</h3>

            <?php echo form_open_multipart('usuarios/cadastrar', array('id' => 'formulario','class' => 'usuarios cadastrar padrao') ) ?>

                <div class="row">
                    <div class="col-lg-12">
                        <label for="nome" class="padrao">Nome:</label>
                        <input id="nome" name="nome" type="input" required>  
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <label for="email" class="padrao">E-mail:</label>
                        <input id="email" name="email" type="input" required>  
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <label for="perfil" class="padrao">Perfil:</label>
                        <select id="perfil" name="perfil" required>
                            <?php foreach ($perfis as $perfil){ ?>
                                <option value="<?php echo $perfil["cd_perfil"] ?>"  >
                                    <?php echo $perfil["nm_perfil"] ?>
                                </option>
                            <?php }; ?>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="estado" class="padrao">Estado:</label>
                        <select id="estado" name="estado" required>
                            <option value="0" >
                                Desbloqueado
                            </option>
                            <option value="1" >
                                Bloqueado
                            </option>
                        </select>
                    </div>
                </div>

                <hr>

                <?php if ( $this->session->userdata("perfil") == "1") { ?>

                    <h3>Permissões</h3>

                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-bordered">
                                <tbody>
                                    <?php
                                        $color = 1;
                                        foreach ($modulos as $modulo){
                                            $linha = $color % 2; ?>
                                            <tr class="<?php if( $linha  == 0 ){ echo 'ducolor';} ?>">
                                                <td class="destaque"><?php echo $modulo['nm_modulo']; ?></td>

                                                <?php foreach ($tipo_permissao as $tipos){ ?>
                                                    <td>
                                                       <input type="checkbox" name="permissoes[<?php echo $modulo['cd_modulo']; ?>][<?php echo $tipos["cd_permissao"]; ?>]" >
                                                        <span class="destaque"><?php echo $tipos["nm_permissao"]; ?></span>
                                                    </td>
                                                <?php } ?>

                                            </tr>
                                        <?php $color++;
                                        };
                                    ?> 
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <hr>

                <?php } ?>

                <div class="row">
                    <div class="col-lg-6">
                        <input type="submit" class="submit salvar" value="Salvar" />
                    </div>
                </div>

            <?php echo form_close(); ?>                      
        </div>
    </div>
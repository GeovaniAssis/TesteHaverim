    <div class="row">
        <div class="btn-navegacao">
            <a href="<?php echo site_url() ?>usuarios"><button>VOLTAR</button></a>                        
        </div>
        <h2>Usuários &#8608; Editar</h2>
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

            <?php echo form_open_multipart('usuarios/editar/'.$usuario[0]["cd_usuario"], array('id' => 'formulario','class' => 'usuarios atualizar padrao') ) ?>

                <div class="row">
                    <div class="col-lg-12">
                        <label for="nome" class="padrao">Nome:</label>
                        <input id="nome" name="nome" type="input" value="<?php echo $usuario[0]["nm_usuario"]; ?>" required>  
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <label for="email" class="padrao">E-mail:</label>
                        <input id="email" name="email" type="input" value="<?php echo $usuario[0]["ds_email"]; ?>" required>  
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <label for="perfil" class="padrao">Perfil:</label>
                        <select id="perfil" name="perfil" required>
                            <?php foreach ($perfis as $perfil){ ?>
                                <option value="<?php echo $perfil["cd_perfil"] ?>" <?php if( $perfil["nm_perfil"] == $usuario[0]["nm_perfil"] ){ echo "selected";} ?> >
                                    <?php echo $perfil["nm_perfil"] ?>
                                </option>
                            <?php }; ?>
                        </select>

                    </div>
                    <div class="col-lg-6">
                        <label for="estado" class="padrao">Estado:</label>
                        <select id="estado" name="estado" required>
                            <option value="1" <?php if( $usuario[0]["ic_suspenso"] == 1 ){ echo "selected"; } ?> >
                                Bloqueado
                            </option>
                            <option value="0" <?php if( $usuario[0]["ic_suspenso"] == 0 ){ echo "selected"; } ?> >
                                Desbloqueado
                            </option>

                        </select>


                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <label for="senha" class="padrao">Senha:</label>
                        <input id="senha" name="senha" type="password" >  
                    </div>
                    <div class="col-lg-6">
                        <label for="email" class="padrao">Confirme a senha:</label>
                        <input id="confsenha" name="confsenha" type="password" style="padding-left: 145px;">  
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
                                                       <input type="checkbox" name="permissoes[<?php echo $modulo['cd_modulo']; ?>][<?php echo $tipos["cd_permissao"]; ?>]" 
                                                            <?php foreach ( $usuario_permissao as $permissao ){
                                                                if($permissao['cd_modulo'] == $modulo["cd_modulo"]){
                                                                    if($permissao['cd_permissao'] == $tipos["cd_permissao"]){ 
                                                                        if( $permissao['ic_usu_perm'] ){ ?>
                                                                            value="<?php echo $permissao['ic_usu_perm']; ?>"
                                                                            <?php if( $permissao["ic_usu_perm"] == 1 || $permissao["ic_usu_perm"] == "1" ){ echo "checked"; } ?>
                                                                        <?php }
                                                                    }
                                                                } 
                                                            } ?> >
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

            <button class="submit excluir abrir-excluir">Excluir</button>

                      
        </div>
    </div>

    <div class="fundo-preto-exclir"></div>
    <div class="bloco-exclir">
        <div class="conteudo">
            <h2>DESEJA EXCLUIR ESTE USUÁRIO?</h2>
            <?php echo form_open_multipart('usuarios/excluir/'.$usuario[0]["cd_usuario"], array('id' => 'formulario-excluir','class' => 'usuarios excluir padrao') ) ?>
                
                <div class="col-lg-12">
                    <input type="submit" class="submit excluir" value="Excluir" />
                </div>

                <div class="col-lg-12">
                    <div class="submit salvar">Voltar</div>
                </div>
                

            <?php echo form_close(); ?> 

        </div>
    </div>
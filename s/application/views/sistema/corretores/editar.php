    <div class="row">
        <div class="btn-navegacao">
            <a href="<?php echo site_url() ?>corretores"><button>VOLTAR</button></a>
        </div>
        <h2>Corretores &#8608; Editar</h2>
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
            <?php echo form_open_multipart('corretores/editar/'.$corretore[0]["cd_user_tabela"], array('id' => 'formulario','class' => 'corretores atualizar padrao') ) ?>

                <div class="row mrg--0" style="padding-bottom: 20px ">
                            <div class="col-xl-6 col-lg-6">
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="check_imobiliaria_autonomo" id="check_imobiliaria" value="check_imobiliaria" <?php if($corretore[0]["nm_imobiliaria"]!="Autônomo"){ echo "checked"; } ?> style="
                                        position: relative;
                                        left: 0px;
                                        width: 25px;">

                                        <label class="form-check-label" for="check_imobiliaria" style="
                                            top: 10px;
                                            left: 30px;
                                            font-size: 24px;
                                            cursor: pointer;">
                                            Imobiliária
                                        </label>
                                    </div>
                             </div>
                            <div class="col-xl-6 col-lg-6">
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="check_imobiliaria_autonomo" id="check_autonomo" value="check_autonomo" <?php if($corretore[0]["nm_imobiliaria"]=="Autônomo"){ echo "checked"; } ?> style="
                                        position: relative;
                                        left: 0px;
                                        width: 25px;">
                                        <label class="form-check-label" for="check_autonomo" style="
                                            top: 10px;
                                            left: 30px;
                                            font-size: 24px;
                                            cursor: pointer;">
                                            Autônomo
                                        </label>
                                    </div>
                             </div>
                        </div>


                <div class="row">
                    <div class="col-lg-12">
                        <label for="imobiliaria" class="padrao">Imobiliária:</label>
                        <input id="imobiliaria" name="imobiliaria" type="text" value="<?php echo $corretore[0]["nm_imobiliaria"]; ?>" required style="padding-left: 87px;">
                        <input type="hidden" id="antiga_imobiliaria" value="<?php echo $corretore[0]["nm_imobiliaria"]; ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <label for="responsavel" class="padrao">Responsável:</label>
                        <input id="responsavel" name="responsavel" type="text" value="<?php echo $corretore[0]["nm_responsavel"]; ?>" required style="padding-left: 104px;">  
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <label for="cnpj" class="padrao">C.N.P.J./C.P.F.:</label>
                        <input id="cnpj" name="cnpj" type="text" value="<?php echo $corretore[0]["ds_cnpj"]; ?>" required style="padding-left: 110px;">  
                    </div>
                    <div class="col-lg-6">
                        <label for="creci" class="padrao">CRECI:</label>
                        <input id="creci" name="creci" type="text" value="<?php echo $corretore[0]["ds_creci"]; ?>" required style="padding-left: 62px;">  
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <label for="email" class="padrao">E-mail:</label>
                        <input id="email" name="email" type="mail" value="<?php echo $corretore[0]["nm_email"]; ?>" required style="padding-left: 62px;">  
                    </div>
                    <div class="col-lg-6">
                        <label for="telefone" class="padrao">Telefone:</label>
                        <input id="telefone" name="telefone" type="text" value="<?php echo $corretore[0]["ds_telefone"]; ?>" required style="padding-left: 75px;">  
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <label for="endereco" class="padrao">Endereço:</label>
                        <input id="endereco" name="endereco" type="text" value="<?php echo $corretore[0]["nm_endereco"]; ?>" required style="padding-left: 80px;">  
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <label for="numero" class="padrao">Número:</label>
                        <input id="numero" name="numero" type="text" value="<?php echo $corretore[0]["nm_numero"]; ?>" required>  
                    </div>
                    <div class="col-lg-6">
                        <label for="bairro" class="padrao">Bairro:</label>
                        <input id="bairro" name="bairro" type="text" value="<?php echo $corretore[0]["nm_bairro"]; ?>" required style="padding-left: 58px;">  
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <label for="cidade" class="padrao">Cidade:</label>
                        <input id="cidade" name="cidade" type="text" value="<?php echo $corretore[0]["nm_cidade"]; ?>" required style="padding-left: 66px;">  
                    </div>
                    <div class="col-lg-6">
                        <label for="estado" class="padrao">Estado:</label>
                        <select name="estado" class="estado" style="padding-left: 66px;">
                            <option value="AC" <?php if( $corretore[0]["nm_estado"] == "AC"){ echo "selected";} ?> >Acre</option>
                            <option value="AL" <?php if( $corretore[0]["nm_estado"] == "AL"){ echo "selected";} ?> >Alagoas</option>
                            <option value="AP" <?php if( $corretore[0]["nm_estado"] == "AP"){ echo "selected";} ?> >Amapá</option>
                            <option value="AM" <?php if( $corretore[0]["nm_estado"] == "AM"){ echo "selected";} ?> >Amazonas</option>
                            <option value="BA" <?php if( $corretore[0]["nm_estado"] == "BA"){ echo "selected";} ?> >Bahia</option>
                            <option value="CE" <?php if( $corretore[0]["nm_estado"] == "CE"){ echo "selected";} ?> >Ceará</option>
                            <option value="DF" <?php if( $corretore[0]["nm_estado"] == "DF"){ echo "selected";} ?> >Distrito Federal</option>
                            <option value="ES" <?php if( $corretore[0]["nm_estado"] == "ES"){ echo "selected";} ?> >Espírito Santo</option>
                            <option value="GO" <?php if( $corretore[0]["nm_estado"] == "GO"){ echo "selected";} ?> >Goiás</option>
                            <option value="MA" <?php if( $corretore[0]["nm_estado"] == "MA"){ echo "selected";} ?> >Maranhão</option>
                            <option value="MT" <?php if( $corretore[0]["nm_estado"] == "MT"){ echo "selected";} ?> >Mato Grosso</option>
                            <option value="MS" <?php if( $corretore[0]["nm_estado"] == "MS"){ echo "selected";} ?> >Mato Grosso do Sul</option>
                            <option value="MG" <?php if( $corretore[0]["nm_estado"] == "MG"){ echo "selected";} ?> >Minas Gerais</option>
                            <option value="PA" <?php if( $corretore[0]["nm_estado"] == "PA"){ echo "selected";} ?> >Pará</option>
                            <option value="PB" <?php if( $corretore[0]["nm_estado"] == "PB"){ echo "selected";} ?> >Paraíba</option>
                            <option value="PR" <?php if( $corretore[0]["nm_estado"] == "PR"){ echo "selected";} ?> >Paraná</option>
                            <option value="PE" <?php if( $corretore[0]["nm_estado"] == "PE"){ echo "selected";} ?> >Pernambuco</option>
                            <option value="PI" <?php if( $corretore[0]["nm_estado"] == "PI"){ echo "selected";} ?> >Piauí </option>
                            <option value="RJ" <?php if( $corretore[0]["nm_estado"] == "RJ"){ echo "selected";} ?> >Rio de Janeiro</option>
                            <option value="RN" <?php if( $corretore[0]["nm_estado"] == "RN"){ echo "selected";} ?> >Rio Grande do Norte</option>
                            <option value="RS" <?php if( $corretore[0]["nm_estado"] == "RS"){ echo "selected";} ?> >Rio Grande do Sul</option>
                            <option value="RO" <?php if( $corretore[0]["nm_estado"] == "RO"){ echo "selected";} ?> >Rondônia</option>
                            <option value="RR" <?php if( $corretore[0]["nm_estado"] == "RR"){ echo "selected";} ?> >Roraima</option>
                            <option value="SC" <?php if( $corretore[0]["nm_estado"] == "SC"){ echo "selected";} ?> >Santa Catarina</option>
                            <option value="SP" <?php if( $corretore[0]["nm_estado"] == "SP"){ echo "selected";} ?> >São Paulo</option>
                            <option value="SE" <?php if( $corretore[0]["nm_estado"] == "SE"){ echo "selected";} ?> >Sergipe</option>
                            <option value="TO" <?php if( $corretore[0]["nm_estado"] == "TO"){ echo "selected";} ?> >Tocantins</option>
                        </select> 
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
            <h2>DESEJA EXCLUIR ESTE CORRETOR?</h2>
            <?php echo form_open_multipart('corretores/excluir/'.$corretore[0]["cd_user_tabela"], array('id' => 'formulario-excluir','class' => 'banner excluir padrao') ) ?>
                
                <div class="col-lg-12">
                    <input type="submit" class="submit excluir" value="Excluir" />
                </div>

                <div class="col-lg-12">
                    <div class="submit salvar">Voltar</div>
                </div>               

            <?php echo form_close(); ?> 

        </div>
    </div>
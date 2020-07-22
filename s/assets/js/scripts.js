$(function(){

    $('input[name="telefone"]').mask('(99) 9999-9999');
    $('input[name="celular"]').mask('(99) 99999-9999');
    $('#vl_empreendimento').maskMoney();

    if($("#antiga_imobiliaria").val()) {
    var nome_imobiliaria = $("#antiga_imobiliaria").val();
    if(nome_imobiliaria == "Autônomo"){
        $("#imobiliaria").prop("readonly", true);
        $("#cnpj").mask('999.999.999-99');
      }
    }

    $('#check_imobiliaria').click(function(){
      var nome = $("#antiga_imobiliaria").val();
      $('#imobiliaria').val(nome);
      $("#imobiliaria").prop("readonly", false);
      $('#cnpj').mask('99.999.999/9999-99');
    });

    $('#check_autonomo').click(function(){
      $('#imobiliaria').val("Autônomo");
      $("#imobiliaria").prop("readonly", true);
      $("#cnpj").mask('999.999.999-99');
    });


    $('.input').focus(function(){
      $(this).prev().addClass('on-focus');
    }).blur(function(){
      if ( $(this).val() === '') {
        $(this).prev().removeClass('on-focus');
      }
    });

    $('.alert .close').click(function(){
    	$('.alert').fadeOut();
    });

    $('.fundo-preto-exclir , .bloco-exclir .salvar').click(function(){
      $('.fundo-preto-exclir').fadeOut();
      $('.bloco-exclir').fadeOut();
    });

    $('.abrir-excluir').click(function(){
      $('.fundo-preto-exclir').fadeIn();
      $('.bloco-exclir').fadeIn();
    });

    $("#dtinicio").change(function() {
      var data_controle = $(this).val();
      $("#dtfinal").attr('min',data_controle);
      $("#dtfinal").val('');
    });

    $("#dtfinal").change(function() {
      var data_controle = $(this).val();
      $("#dtinicio").attr('max',data_controle);
    });

    $('#banner_desktop').change(function(e){
      $('.img_desktop').attr('src', URL.createObjectURL(e.target.files[0]));
      $('#remove_banner_desktop').css({'opacity':'1'});
    });

    $('#remove_banner_desktop').click(function(e){
      $('.img_desktop').attr('src', 'http://concepts.summercomunicacao.com.br/tecnocal2.0/s/assets/banner/0/desktop/teste_desktop.jpg');
      $('#banner_desktop').val('');
      $('#remove_banner_desktop').css({'opacity':'0'});
    });

    $('#banner_tablet1').change(function(e){
      $('.img_tablet1').attr('src', URL.createObjectURL(e.target.files[0]));
      $('#remove_banner_tablet1').css({'opacity':'1'});
    });

    $('#remove_banner_tablet1').click(function(e){
      $('.img_tablet1').attr('src', 'http://concepts.summercomunicacao.com.br/tecnocal2.0/s/assets/banner/0/tablet1/teste_tablet1.jpg');
      $('#banner_tablet1').val('');
      $('#remove_banner_tablet1').css({'opacity':'0'});
    });

    $('#banner_tablet2').change(function(e){
      $('.img_tablet2').attr('src', URL.createObjectURL(e.target.files[0]));
      $('#remove_banner_tablet2').css({'opacity':'1'});
    });
    $('#remove_banner_tablet2').click(function(e){
      $('.img_tablet2').attr('src', 'http://concepts.summercomunicacao.com.br/tecnocal2.0/s/assets/banner/0/tablet2/teste_tablet2.jpg');
      $('#banner_tablet2').val('');
      $('#remove_banner_tablet2').css({'opacity':'0'});
    });

    $('#banner_mobile').change(function(e){
      $('.img_mobile').attr('src', URL.createObjectURL(e.target.files[0]));
      $('#remove_banner_mobile').css({'opacity':'1'});
    });
    $('#remove_banner_mobile').click(function(e){
      $('.img_mobile').attr('src', 'http://concepts.summercomunicacao.com.br/tecnocal2.0/s/assets/banner/0/mobile/teste_mobile.jpg');
      $('#banner_mobile').val('');
      $('#remove_banner_mobile').css({'opacity':'0'});
    });

    $('#destaque_principal_empreendimento').change(function(e){
      $('.image_destaque_principal').attr('src', URL.createObjectURL(e.target.files[0]));
      $('#remove_destaque_principal').css({'opacity':'1'});
    });
    $('#remove_destaque_principal').click(function(e){
      $('.image_destaque_principal').attr('src', 'http://concepts.summercomunicacao.com.br/tecnocal2.0/s/assets/empreendimento/0/destaque_principal.jpg');
      $('#destaque_principal_empreendimento').val('');
      $('#remove_destaque_principal').css({'opacity':'0'});
    });





    $('.cor').click(function(e){
      $('.cor').removeClass('activo');
      $(this).addClass('activo');

      var cor = $(this).attr("cor");
      $('#txtCor').val(cor);
    });

    $('.editar-bloco .btn-empre').click(function(e){
      $('.btn-empre').removeClass('select');
      $(this).addClass('select');
      $('.bloco-btn').css({"transition":"none"});
      $('.bloco-btn').fadeOut();

      var bloco = $(this).attr("bloco");

      setTimeout(function(){
        $(bloco).fadeIn();
      }, 400);
    });

    // PLANTA - EMPREENDIMENTO

      $('#nova_planta').click(function(e){
        $(this).fadeOut();
        $('#ic_planta_nova').val('1');      
        setTimeout(function(){
          $('#bloc_nova_planta').fadeIn();
        }, 400);
      });

      $('#imagem_nova_planta').change(function(e){
        $('.img_planta_nova').attr('src', URL.createObjectURL(e.target.files[0]));
        $('#remove_nova_planta').css({'opacity':'1'});
      });

      $('#remove_nova_planta').click(function(e){
        $('.img_planta_nova').attr('src', 'http://concepts.summercomunicacao.com.br/tecnocal2.0/s/assets/empreendimento/0/planta/planta.jpg');
        $('#imagem_nova_planta').val('');
        $('#remove_nova_planta').css({'opacity':'0'});
      });


      $('.excluir_planta').click(function(e){

        var codigo = $(this).attr("codigo");
        var nome = $(this).attr("nome");

        $('#nome_do_excluir_planta').html(nome);
        $('#codigo_excluir_planta').val(codigo);

        $('.fundo-preto-exclir-planta').fadeIn();
        $('.bloco-exclir-planta').fadeIn();
      });

      $('.fundo-preto-exclir-planta , .bloco-exclir-planta .salvar').click(function(){
        $('.fundo-preto-exclir-planta').fadeOut();
        $('.bloco-exclir-planta').fadeOut();
      });

    // PLANTA - EMPREENDIMENTO
    // FOTOS - EMPREENDIMENTO 

      $('#capa').change(function(e){
        $('.img_capa').attr('src', URL.createObjectURL(e.target.files[0]));
        $('#remove_capa').css({'opacity':'1'});
      });

      $('#remove_capa').click(function(e){
        $('.img_capa').attr('src', 'http://concepts.summercomunicacao.com.br/tecnocal2.0/s/assets/empreendimento/0/capa.jpg');
        $('#capa').val('');
        $('#remove_capa').css({'opacity':'0'});
      });

      $('#thumb').change(function(e){
        $('.img_thumb').attr('src', URL.createObjectURL(e.target.files[0]));
        $('#remove_thumb').css({'opacity':'1'});
      });

      $('#remove_thumb').click(function(e){
        $('.img_thumb').attr('src', 'http://concepts.summercomunicacao.com.br/tecnocal2.0/s/assets/empreendimento/0/thumb.jpg');
        $('#thumb').val('');
        $('#remove_thumb').css({'opacity':'0'});
      });

      $('#logo_empreendimento').change(function(e){
        $('.img-logo-edit').attr('src', URL.createObjectURL(e.target.files[0]));
        $('#remove_logo').css({'opacity':'1'});
      });

      $('#remove_logo').click(function(e){
        $('.img-logo-edit').attr('src', 'http://concepts.summercomunicacao.com.br/tecnocal2.0/s/assets/empreendimento/0/logo.png');
        $('#logo_empreendimento').val('');
        $('#remove_logo').css({'opacity':'0'});
      });

      $('#destaque1_empreendimento').change(function(e){
        $('.img_empreendimento1').attr('src', URL.createObjectURL(e.target.files[0]));
        $('#remove_destaque1').css({'opacity':'1'});
      });

      $('#remove_destaque1').click(function(e){
        $('.img_empreendimento1').attr('src', 'http://concepts.summercomunicacao.com.br/tecnocal2.0/s/assets/empreendimento/0/empreendimento1.jpg');
        $('#destaque1_empreendimento').val('');
        $('#remove_destaque1').css({'opacity':'0'});
      });

      $('#destaque2_empreendimento').change(function(e){
        $('.img_empreendimento2').attr('src', URL.createObjectURL(e.target.files[0]));
        $('#remove_destaque2').css({'opacity':'1'});
      });

      $('#remove_destaque2').click(function(e){
        $('.img_empreendimento2').attr('src', 'http://concepts.summercomunicacao.com.br/tecnocal2.0/s/assets/empreendimento/0/empreendimento2.jpg');
        $('#destaque2_empreendimento').val('');
        $('#remove_destaque2').css({'opacity':'0'});
      });

    // FOTOS - EMPREENDIMENTO
    // ENDEREÇO - EMPREENDIMENTO

      $('#mapa').change(function(e){
        $('.img_mapa').attr('src', URL.createObjectURL(e.target.files[0]));
        $('#remove_mapa').css({'opacity':'1'});
      });

      $('#remove_mapa').click(function(e){
        $('.img_mapa').attr('src', 'http://concepts.summercomunicacao.com.br/tecnocal2.0/s/assets/empreendimento/0/mapa.jpg');
        $('#mapa').val('');
        $('#remove_mapa').css({'opacity':'0'});
      });

    // ENDEREÇO - EMPREENDIMENTO
    // GALERIA DA OBRA - EMPREENDIMENTO

      $('#novo_foto_obra').click(function(e){
        $(this).fadeOut();

        $('#ic_foto_obra_novo').val('1');
        
        setTimeout(function(){
          $('#bloc_foto_obra').fadeIn();
        }, 400);
      });

      $('#foto_obra_novo').change(function(e){
        $('.img_foto_obra_novo').attr('src', URL.createObjectURL(e.target.files[0]));
        $('#remove_foto_obra_novo').css({'opacity':'1'});
      });

      $('#remove_foto_obra_novo').click(function(e){
        $('.img_foto_obra_novo').attr('src', 'http://concepts.summercomunicacao.com.br/tecnocal2.0/s/assets/empreendimento/0/obra/obra.jpg');
        $('#foto_obra_novo').val('');
        $(this).css({'opacity':'0'});
      });

      $('.bloc_file_obra').change(function(e){
        var cd = $(this).attr("codigo");
        var img = '#img_foto_obra'+cd ;
        var remov = '#remove_foto_obra'+cd ;

        $(img).attr('src', URL.createObjectURL(e.target.files[0]));
        $(remov).css({'opacity':'1'});
      });


      $('.excluir_obra').click(function(e){

        var codigo = $(this).attr("codigo");
        var nome = $(this).attr("nome");

        $('#nome_do_excluir_obra').html(nome);
        $('#codigo_excluir_obra').val(codigo);

        $('.fundo-preto-exclir-obra').fadeIn();
        $('.bloco-exclir-obra').fadeIn();
      });

      $('.fundo-preto-exclir-obra , .bloco-exclir-obra .salvar').click(function(){
        $('.fundo-preto-exclir-obra').fadeOut();
        $('.bloco-exclir-obra').fadeOut();
      });

    // GALERIA DA OBRA - EMPREENDIMENTO
    // CRIAR - EMPREENDIMENTO

      $('#primeiro_proximo').click(function(){
        var nome        = $('#nome').val();
        var preview     = $('#nome_preview').val();
        var lancamento  = $('#dt_empreendimento').val();
        var min         = $('#met-min').val();
        var descricao   = $('#descricao').val();

        var dorm1   = $('#1_dorm')[0].checked;
        var dorm2   = $('#2_dorm')[0].checked;
        var dorm3   = $('#2_dorm')[0].checked;
        var dorm4   = $('#2_dorm')[0].checked;
        
        if(nome != ""){
          if(preview != ""){
            if(lancamento != ""){
              if(descricao != ""){
                if(min != ""){

                  $('#btn-fotos').fadeIn();
                  $('.btn-empre').removeClass('select');
                  $('#btn-fotos').addClass('select');
                  $('.bloco-btn').css({"transition":"none"});
                  $('#bloc-dados').fadeOut();

                  setTimeout(function(){ $('#bloc-fotos').fadeIn(); }, 400);
                  if( dorm1 == false && dorm2 == false && dorm3 == false && dorm4 == false ){ $('#1_dorm').attr("checked","checked"); };

                }else{ $('#met-min').focus(); }
              }else{ $('#descricao').focus(); }
            }else{ $('#dt_empreendimento').focus(); }
          }else{ $('#nome_preview').focus(); }
        }else{ $('#nome').focus(); }
      });

      $('#segundo_proximo').click(function(){
        var capa                = $('#capa').val();
        var thumb               = $('#thumb').val();
        var logo                = $('#logo_empreendimento').val();
        var destaque1           = $('#destaque1_empreendimento').val();
        var destaque2           = $('#destaque2_empreendimento').val();
        var destaque_principal  = $('#destaque_principal_empreendimento').val();

        if(capa != ""){ 
          if(thumb != ""){
            if(logo != ""){ 
              if(destaque1 != ""){
                if(destaque2 != ""){ 
                  if(destaque_principal != ""){ 

                    $('#btn-planta').fadeIn();
                    $('.btn-empre').removeClass('select');
                    $('#btn-planta').addClass('select');
                    $('.bloco-btn').css({"transition":"none"});
                    $('#bloc-fotos').fadeOut();

                    setTimeout(function(){ $('#bloc-planta').fadeIn(); }, 400);
                    setTimeout(function(){ $('#bloc_nova_planta').fadeIn(); }, 600);

                  }else{ $('#destaque_principal_empreendimento').focus(); }
                }else{ $('#destaque2_empreendimento').focus(); }
              }else{ $('#destaque1_empreendimento').focus(); }
            }else{ $('#logo_empreendimento').focus(); }
          }else{ $('#thumb').focus(); }
        }else{ $('#capa').focus(); }
      });

      $('#terceiro_proximo').click(function(){
        var imagem    = $('#imagem_nova_planta').val();
        var nome      = $('#nome_imagem_nova_planta').val();
        var metragem  = $('#metragem_nova_planta').val();

        if(imagem != "" || nome != "" || metragem != ""){
          if(imagem != ""){ 
              if(nome != ""){
                if(metragem != ""){ 

                  $('#btn-cronograma').fadeIn();
                  $('.btn-empre').removeClass('select');
                  $('#btn-cronograma').addClass('select');
                  $('.bloco-btn').css({"transition":"none"});
                  $('#bloc-planta').fadeOut();

                  setTimeout(function(){ $('#bloc-cronograma').fadeIn(); }, 400);

                }else{ $('#metragem_nova_planta').focus(); }
              }else{ $('#nome_imagem_nova_planta').focus(); }
            }else{ $('#imagem_nova_planta').focus(); }
        }else{
          $('#btn-cronograma').fadeIn();
          $('.btn-empre').removeClass('select');
          $('#btn-cronograma').addClass('select');
          $('.bloco-btn').css({"transition":"none"});
          $('#bloc-planta').fadeOut();
          setTimeout(function(){ $('#bloc-cronograma').fadeIn(); }, 400);
        }
      });

      $('#quarto_proximo').click(function(){
        var fundacao      = $('#fundacao').val();
        var estrutura     = $('#estrutura').val();
        var entrega       = $('#entrega').val();
        var interno       = $('#interno').val();
        var externo       = $('#externo').val();
        var alvenaria     = $('#alvenaria').val();
        var piso          = $('#piso').val();
        var instalacoes   = $('#instalacoes').val();
        var pintura       = $('#pintura').val();

        if(fundacao != ""){
          if(estrutura != ""){
            if(entrega != ""){
              if(interno != ""){
                if(externo != ""){
                  if(alvenaria != ""){
                    if(piso != ""){
                      if(instalacoes != ""){
                        if(pintura != ""){

                          $('#btn-obra').fadeIn();
                          $('.btn-empre').removeClass('select');
                          $('#btn-obra').addClass('select');
                          $('.bloco-btn').css({"transition":"none"});
                          $('#bloc-cronograma').fadeOut();

                          setTimeout(function(){ $('#bloc-obra').fadeIn(); }, 400);
                          setTimeout(function(){ $('#bloc_foto_obra').fadeIn(); }, 600);

                        }else{ $('#pintura').focus(); }
                      }else{ $('#instalacoes').focus(); }
                    }else{ $('#piso').focus(); }
                  }else{ $('#alvenaria').focus(); }
                }else{ $('#externo').focus(); }
              }else{ $('#interno').focus() }
            }else{ $('#entrega').focus(); }
          }else{ $('#estrutura').focus(); }
        }else{ $('#fundacao').focus(); }
      });

      $('#quinto_proximo').click(function(){
        var imagem  = $('#foto_obra_novo').val();
        var nome    = $('#nome_foto_obra_novo').val();
        var data    = $('#novo_foto_obra_data').val();

        if(imagem != "" || nome != "" || data != ""){
          if(imagem != ""){ 
              if(nome != ""){
                if(data != ""){ 

                  $('#btn-localizacao').fadeIn();
                  $('.btn-empre').removeClass('select');
                  $('#btn-localizacao').addClass('select');
                  $('.bloco-btn').css({"transition":"none"});
                  $('#bloc-obra').fadeOut();

                  setTimeout(function(){ $('#bloc-localizacao').fadeIn(); }, 400);

                }else{ $('#foto_obra_novo').focus(); }
              }else{ $('#nome_foto_obra_novo').focus(); }
            }else{ $('#novo_foto_obra_data').focus(); }
        }else{
          $('#btn-localizacao').fadeIn();
          $('.btn-empre').removeClass('select');
          $('#btn-localizacao').addClass('select');
          $('.bloco-btn').css({"transition":"none"});
          $('#bloc-obra').fadeOut();
          setTimeout(function(){ $('#bloc-localizacao').fadeIn(); }, 400);
        }
      });

      $('#sexto_proximo').click(function(){
        var endereco  = $('#endereco').val();
        var numero    = $('#numero').val();
        var bairro    = $('#bairro').val();
        var mapa      = $('#mapa').val();

        if(endereco != ""){
          if(numero != ""){
            if(bairro != ""){
              if(mapa != ""){

                $('#btn-lazer').fadeIn();
                $('.btn-empre').removeClass('select');
                $('#btn-lazer').addClass('select');
                $('.bloco-btn').css({"transition":"none"});
                $('#bloc-localizacao').fadeOut();

                setTimeout(function(){ $('#bloc-lazer').fadeIn(); }, 400);
                setTimeout(function(){ $('#bloc_novo_lazer').fadeIn(); }, 600);

              }else{ $('#mapa').focus(); }
            }else{ $('#bairro').focus(); }
          }else{ $('#numero').focus(); }
        }else{ $('#endereco').focus(); }
      });

      $('.cadastrar-bloco #btn-dados').click(function(e){
        $('.btn-empre').removeClass('select');
        $(this).addClass('select');
        $('.bloco-btn').css({"transition":"none"});
        $('.bloco-btn').fadeOut();
        var bloco = $(this).attr("bloco");

        $('#btn-fotos, #btn-planta, #btn-cronograma, #btn-obra, #btn-localizacao, #btn-lazer').fadeOut();

        setTimeout(function(){ $(bloco).fadeIn(); }, 400);
      });

      $('.cadastrar-bloco #btn-fotos').click(function(e){
        $('.btn-empre').removeClass('select');
        $(this).addClass('select');
        $('.bloco-btn').css({"transition":"none"});
        $('.bloco-btn').fadeOut();
        var bloco = $(this).attr("bloco");

        $('#btn-planta, #btn-cronograma, #btn-obra, #btn-localizacao, #btn-lazer').fadeOut();

        setTimeout(function(){ $(bloco).fadeIn(); }, 400);
      });

      $('.cadastrar-bloco #btn-planta').click(function(e){
        $('.btn-empre').removeClass('select');
        $(this).addClass('select');
        $('.bloco-btn').css({"transition":"none"});
        $('.bloco-btn').fadeOut();
        var bloco = $(this).attr("bloco");

        $('#btn-cronograma, #btn-obra, #btn-localizacao, #btn-lazer').fadeOut();

        setTimeout(function(){ $(bloco).fadeIn(); }, 400);
      });

      $('.cadastrar-bloco #btn-cronograma').click(function(e){
        $('.btn-empre').removeClass('select');
        $(this).addClass('select');
        $('.bloco-btn').css({"transition":"none"});
        $('.bloco-btn').fadeOut();
        var bloco = $(this).attr("bloco");

        $('#btn-obra, #btn-localizacao, #btn-lazer').fadeOut();

        setTimeout(function(){ $(bloco).fadeIn(); }, 400);
      });

      $('.cadastrar-bloco #btn-obra').click(function(e){
        $('.btn-empre').removeClass('select');
        $(this).addClass('select');
        $('.bloco-btn').css({"transition":"none"});
        $('.bloco-btn').fadeOut();
        var bloco = $(this).attr("bloco");

        $('#btn-localizacao, #btn-lazer').fadeOut();

        setTimeout(function(){ $(bloco).fadeIn(); }, 400);
      });

      $('.cadastrar-bloco #btn-localizacao').click(function(e){
        $('.btn-empre').removeClass('select');
        $(this).addClass('select');
        $('.bloco-btn').css({"transition":"none"});
        $('.bloco-btn').fadeOut();
        var bloco = $(this).attr("bloco");

        $('#btn-lazer').fadeOut();

        setTimeout(function(){ $(bloco).fadeIn(); }, 400);
      });

      $('.cadastrar-bloco #btn-lazer').click(function(e){
        $('.btn-empre').removeClass('select');
        $(this).addClass('select');
        $('.bloco-btn').css({"transition":"none"});
        $('.bloco-btn').fadeOut();
        var bloco = $(this).attr("bloco");
        setTimeout(function(){ $(bloco).fadeIn(); }, 400);
      });

    // CRIAR - EMPREENDIMENTO



    $('#novo_lazer').click(function(e){
      $(this).fadeOut();

      $('#ic_lazer_novo').val('1');
      
      setTimeout(function(){
        $('#bloc_novo_lazer').fadeIn();
      }, 400);
    });

    $('#lazer_novo').change(function(e){
      $('.img_lazer_novo').attr('src', URL.createObjectURL(e.target.files[0]));
      $('#remove_lazer_novo').css({'opacity':'1'});
    });

    $('#remove_lazer_novo').click(function(e){
      $('.img_lazer_novo').attr('src', 'http://concepts.summercomunicacao.com.br/tecnocal2.0/s/assets/empreendimento/0/lazer/img_lazer.jpg');
      $('#lazer_novo').val('');
      $('#remove_lazer_novo').css({'opacity':'0'});
    });

    $('.bloc_file_icon').change(function(e){
      var cd = $(this).attr("codigo");
      var img = '#bloc_img_lazer'+cd ;
      var remov = '#remove_lazer'+cd ;

      $(img).attr('src', URL.createObjectURL(e.target.files[0]));
      $(remov).css({'opacity':'1'});
    });
    
    $('.bloc_img_remover').click(function(e){
      var cd = $(this).attr("codigo");
      var img = '#bloc_img_lazer'+cd ;
      var remov = '#remove_lazer'+cd ;
      var file = '#bloc_lazer'+cd ;

      $(img).attr('src', 'http://concepts.summercomunicacao.com.br/tecnocal2.0/s/assets/empreendimento/0/lazer/img_lazer.jpg');
      $(file).val('');
      $(this).css({'opacity':'0'});
    });

    $('#icones_novo .icon').click(function(e){
      $('#icones_novo .icon').removeClass('select');
      $(this).addClass('select');

      var icon = $(this).attr("name");
      $('#icon-lazer-novo').val(icon);
    });

    $('.icones .icon').click(function(e){
      var cd = $(this).attr("codigo");
      var icones ='.icones'+cd+' .icon';
      var hidden = '#bloc_icon_lazer'+cd;
      var icon = $(this).attr("name");

      $(icones).removeClass('select');
      $(this).addClass('select');

      $(hidden).val(icon);
    });

    $('.excluir_lazer').click(function(e){

      var codigo = $(this).attr("codigo");
      var nome = $(this).attr("nome");

      $('#nome_do_excluir').html(nome);
      $('#codigo_excluir_lazer').val(codigo);

      $('.fundo-preto-exclir-lazer').fadeIn();
      $('.bloco-exclir-lazer').fadeIn();
    });

    $('.fundo-preto-exclir-lazer , .bloco-exclir-lazer .salvar').click(function(){
      $('.fundo-preto-exclir-lazer').fadeOut();
      $('.bloco-exclir-lazer').fadeOut();
    });


    $('#tabela').change(function(){
      var permitido = /(\.pdf|\.doc)$/i;
      if( !permitido.exec( $(this).val() ) ){
        $(this).val('');
        $('#tabela-error').html('*Somente permitido arquivo no formado PDF ou DOC');
        $('#tabela-error').css({'color':'red'});
      }
    });



  
});
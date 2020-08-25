$(function(){

  // --------Mascaras
    $('input[name="telefone"]').mask('(99) 99999-9999');

  // --------Menu Mobile
    $('.hamburguer-bt, #fundoMenu').click(function(){
      $('#opcao_menu').css({'transition':'none'});

      if( $('.hamburguer-bt').hasClass('activo')  ){
        $('.hamburguer-bt').removeClass('activo');
        $('#opcao_menu').slideUp();
        $('#fundoMenu').removeClass('activo');
      }else{
        $('.hamburguer-bt').addClass('activo');
        $('#opcao_menu').slideDown();
        $('#fundoMenu').addClass('activo');
      }
    });

  // --------Carrossel Home 

    $('#carrossel_home').slick({
      dots: false,
      infinite: true,
      arrows: true,
      autoplay: true,
      slidesToShow: 1,
      slidesToScrool: 1,
      speed: 500,
      fade: true,
      cssEase: 'linear'
    });

    $('#produtos_destaques').slick({
      dots: true,
      infinite: true,
      arrows: false,
      autoplay: true,
      slidesToShow: 1,
      slidesToScrool: 1,
      speed: 500,
      fade: true,
      cssEase: 'linear'
    });

  // --------Formulario

    $('#form-visita').submit(function(e){
      e.preventDefault();
    });
    $('#form-visita').validate({
      rules: {
        nome:       { required: true, minlength:2 },
        email:      { required: true, email: true },
        telefone:   { required: true, minlength:14 },
        assunto:    { required: true },
        mensagem:   { required: true }
      },messages: {
        nome:       { required: 'Escreva o seu nome.', minlength: 'Minimo de 2 caracteres.' },
        email:      { required: 'Escreva o seu e-mail.', email: 'Escreva um e-mail válido.' },
        telefone:   { required: 'Escreva o seu telefone.', minlength: 'Minimo de 10 números.' },
        assunto:    { required: 'Escreva o assunto.' },
        mensagem:   { required: 'Escreva a mensagem.' }
      },submitHandler: function(form) {

        $('#form-visita').css({"display":"none"});
        $('#loading').fadeIn();

        $.ajax({
          type: 'POST',
          async: true,
          url: document.location.origin + "/wp-content/themes/haverim/php/enviar.php",
          data: new FormData($('#form-visita')[0]),
          processData: false,
          contentType: false,
          success: function(resposta) {
            $('#loading').css({'display':'none'});

            if(resposta == "sucesso"){
                $('#thank').fadeIn();
            }else{
                $('#error').fadeIn();
                $('#descricao').html(resposta);
            }

          },
          error: function() {
            $('#loading').css({'display':'none'});
            $('#error').fadeIn();
            $('#descricao').html('Por ser uma versão gratuita, esta função esta desabilitada. Erro 403.');
          }
        });

        return false;
      }
    });

    $("#tentar--mensagem").click(function(){
      $('#error').css({'display':'none'})
      $('#form-visita').fadeIn();
    });

});
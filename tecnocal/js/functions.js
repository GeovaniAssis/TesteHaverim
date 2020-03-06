$(function(){

	var url = "http://concepts.summercomunicacao.com.br/tecnocal2.0";

	lazyload();

	// MASCARAS
		$('input[name="telefone"]').mask('(99) 9999-99999');
		$('input[name="lig_telefone"]').mask('(99) 9999-99999');
		$('input[name="celular"]').mask('(99) 9 9999-9999');
		$('input[name="cnpj"]').mask('99.999.999/9999-99');

	// CARROSSEL
		$('#linha-tempo').owlCarousel({
			loop:true,
			nav:true,
			dots:false,
			margin:30,
			center: true,
			lazyLoad: true,
			lazyLoadEager: 1,
			animateOut:'fadeOut',
			animateIn:'fadeIn',
			autoplay: true,
			autoplayTimeout:3000,
			responsive : {
			    0 : {
			        items:1
			    },
			    991 : {
			    	items:3
			    }
			},
			URLhashListener:true,
	        autoplayHoverPause:true,
	        startPosition: 'URLHash'
		});

		$('#linha-tempo').on('changed.owl.carousel', function(event) {
			setTimeout(function(){
				ano = $('#linha-tempo .owl-item.active.center .item').data('hash');
				ano = '.'+ano;
				$('#linha-tempo-bloc .linha .activo').removeClass('activo');
				$(ano).addClass('activo');
			}, 150);
		});

		$('#owl-praia, #owl-grande').owlCarousel({
			loop:true,
			nav:false,
			dots:false,
			margin:0,
			lazyLoad: true,
			lazyLoadEager: 1,
			// items:5,
			animateOut:'fadeOut',
			animateIn:'fadeIn',
			autoplay:true,
			autoplayTimeout:3000,
			responsive : {
			    0 : {
			        items:1
			    },
			    500 : {
			    	items:2
			    },
			    767 : {
			    	items:3
			    },
			    991 : {
			    	items:4
			    },
			    1200 : {		        
			        items:5
			    }
			}
		});

		$('#owl-depoimentos').owlCarousel({
			loop:true,
			nav:true,
			dots:false,
			items: 3,
			lazyLoad: true,
			lazyLoadEager: 1,
			center: true,
			autoplay:true,
			autoplayTimeout:3000,
			responsive : {
			    0 : {
			        items:1
			    },
			    991 : {
			    	items:3
			    }
			}
		});

		$('#owl-banner').owlCarousel({
			loop:true,
			nav:false,
			dots:false,
			items:1,
			touchDrag: false,
			mouseDrag: false,
			margin:0,
			animateOut:'fadeOut',
			animateIn:'fadeIn',
			autoplay:true,
			autoplayTimeout:7000
		});

		$('#owl-obra').owlCarousel({
			loop:true,
			nav:true,
			dots:false,
			margin:15,
			lazyLoad: true,
			lazyLoadEager: 1,
			animateOut:'fadeOut',
			animateIn:'fadeIn',
			autoplay:false,
			responsive : {
			    0 : {
			        items:1
			    },
			    991 : {
			    	items:3
			    }
			}
		});
		
	// FORMULARIO
		$('#form-ligamos, #form-pre-avaliacao, #form-cadastrar-tabela, #form-sac, #form-outros, #form-trabalhe, #form-newsletter, #form-tabela, form-recuperar-senha-tabela').submit(function(e){
			e.preventDefault();
		});

		$('#tentar--novamente--sac').click(function(){
			$('.erro').fadeOut();
			$('#tentar--novamente--sac').fadeOut();
			setTimeout(function(){
				$('#form-sac').fadeIn();
			}, 300);
		});

		$('#tentar--novamente--trabalhe').click(function(){
			$('.erro').fadeOut();
			$('#tentar--novamente--trabalhe').fadeOut();
			setTimeout(function(){
				$('#form-trabalhe').fadeIn();
			}, 300);
		});

		$('#tentar--novamente--outros').click(function(){
			$('.erro').fadeOut();
			$('#tentar--novamente--outros').fadeOut();
			setTimeout(function(){
				$('#form-outros').fadeIn();
			}, 300);
		});

		$('#tentar--novamente--newslatter').click(function(){
			$('.erro').fadeOut();
			$('#tentar--novamente--newslatter').fadeOut();
			setTimeout(function(){
				$('#form-newsletter').fadeIn();
			}, 400);
		});

		$('#tentar--novamente--tabela').click(function(){
			$('.erro').fadeOut();
			$('#tentar--novamente--tabela').fadeOut();
			setTimeout(function(){
				$('#form-tabela').fadeIn();
			}, 400);
		});

		$('#tentar--novamente--rec-senha').click(function(){
			$('.erro').fadeOut();
			$('#tentar--novamente--rec-senha').fadeOut();
			setTimeout(function(){
				$('#form-recuperar-senha-tabela').fadeIn();
			}, 400);
		});

		$('#tentar--novamente--cadastrar-tabela').click(function(){
			$('.erro').fadeOut();
			$('#tentar--novamente--cadastrar-tabela').fadeOut();
			setTimeout(function(){
				$('#form-cadastrar-tabela').fadeIn();
			}, 400);
		});

		$('#tentar--novamente--pre-avaliacao').click(function(){
			$('.erro').fadeOut();
			$('#tentar--novamente--pre-avaliacao').fadeOut();
			setTimeout(function(){
				$('#form-pre-avaliacao').fadeIn();
			}, 400);
		});

		$('#tentar--novamente--voltar').click(function(){
			$('.tab-conteudo .obrigado').fadeOut();
			setTimeout(function(){
				$('#form-tabela').fadeIn();
			}, 400);
		});

		$('#tentar--novamente--ligamos').click(function(){
			$('#vamos-te-ligar .bloco .conteudo .erro').fadeOut();
			setTimeout(function(){
				$('#form-ligamos').fadeIn();
			}, 400);
		});

		$('#esqueci-senha').click(function(){

			$('#form-tabela').fadeOut();

			setTimeout(function(){ 
				document.getElementById("titulo-tabela").innerHTML = "";
				$('.tab-conteudo .loading').fadeIn();
			}, 400);
			setTimeout(function(){ $('.tab-conteudo .loading').fadeOut(); }, 2000);
			setTimeout(function(){ 
				document.getElementById("titulo-tabela").innerHTML = "RECUPERAR SENHA";
				$('#form-recuperar-senha-tabela').fadeIn();
			}, 2400);
		});

		$('.voltar-login').click(function(){

			$('#form-recuperar-senha-tabela').fadeOut();

			setTimeout(function(){ 
				document.getElementById("titulo-tabela").innerHTML = "";
				$('.tab-conteudo .loading').fadeIn();
			}, 400);
			setTimeout(function(){ $('.tab-conteudo .loading').fadeOut(); }, 2000);
			setTimeout(function(){				
				document.getElementById("titulo-tabela").innerHTML = "ACESSAR TABELAS";
				$('#form-tabela').fadeIn();
			}, 2400);
		});


		$('#form-sac').validate({
			rules: {

				nome: { required: true, minlength: 2, number: false },
				telefone: { required: true, minlength: 14 },
				email: { required: true, email: true },
				empreendimento: { required: true },
				assunto: { required: true },
				mensagem: { required: true }

			},
			messages: {

				nome: { required: 'Preencha o campo nome', minlength: 'No mínimo 2 letras', number: 'Apenas letras' },
				telefone: { required: 'Informe o seu telefone', minlength: 'No mínimo 10 números' },
				email: { required: 'Informe o seu email', email: 'informe um email válido' },
				empreendimento: { required: 'Selecione um empreendimento' },
				assunto: { required: 'Escolha um assunto' },
				mensagem: { required: 'Escreva uma mensagem' }

			},submitHandler: function(form) {

				var dados = $(form).serialize();
				$('#form-sac').fadeOut();
				$('#formularios .loading').fadeIn();
				$('.btn--form').addClass('disabled');

				$.ajax({
					type: 'POST',
					url: document.location.origin + '/tecnocal2.0/wp-content/themes/tecnocal/php/contato-sac.php',
					data: dados,
					success: function(resposta) {

				        $('.btn--form').removeClass('disabled');
				        $('#formularios .loading').fadeOut();

						setTimeout(function(){
							 if (resposta == 'true') {
					          	$('#obrigado').fadeIn();
					        } else {
					          	console.log(resposta);
					          	$('.erro').fadeIn();
					          	$('#tentar--novamente--sac').fadeIn();
					       }
						}, 900);

				    }
				});
			}
		});

		$('#form-trabalhe').validate({
			rules: {
				nome: { required: true, minlength: 2, number: false },
				telefone: { required: true, minlength: 14 },
				email: { required: true, email: true },
				curriculo: { required: true },
				area: { required: true },
				mensagem: { required: true }
			},
			messages: {
				nome: { required: 'Preencha o campo nome', minlength: 'No mínimo 2 letras', number: 'Apenas letras' },
				telefone: { required: 'Informe o seu telefone', minlength: 'No mínimo 10 números' },
				email: { required: 'Informe o seu email', email: 'informe um email válido' },
				curriculo: { required: 'Envio o seu curriculo' },
				area: { required: 'Informe uma área de atuação' },
				mensagem: { required: 'Escreva uma mensagem' }
			},submitHandler: function(form) {

				var dados = $(form).serialize();
				$('#form-trabalhe').fadeOut();
				$('#formularios .loading').fadeIn();
				$('.btn--form').addClass('disabled');

				$.ajax({
					type: 'POST',
					async: true,
					url: document.location.origin + '/tecnocal2.0/wp-content/themes/tecnocal/php/contato-trabalhe.php',
					data: new FormData($('#form-trabalhe')[0]),
	      			processData: false,
	      			contentType: false,
					success: function(resposta) {

				        $('.btn--form').removeClass('disabled');
				        $('#formularios .loading').fadeOut();

						setTimeout(function(){
							 if (resposta == 'true') {
					          	$('#obrigado').fadeIn();
					        } else {
					          	console.log(resposta);
					          	$('.erro').fadeIn();
					          	$('.erro p').html(resposta);
					          	$('#tentar--novamente--trabalhe').fadeIn();
					       }
						}, 900);

				    }
				});
			}
		});

		$('#form-outros').validate({
			rules: {

				nome: { required: true, minlength: 2, number: false },
				email: { required: true, email: true },
				telefone: {  },
				celular: { required: true, minlength: 15 },
				assunto: { required: true, minlength: 2 },
				mensagem: { required: true, minlength: 10 }

			},
			messages: {

				nome: { required: 'Preencha o campo nome', minlength: 'No mínimo 2 letras', number: 'Apenas letras' },
				email: { required: 'Informe o seu email', email: 'informe um email válido' },
				telefone: {  },
				celular: { required: 'Informe o seu telefone', minlength: 'No mínimo 11 números' },
				assunto: { required: 'Escolha um assunto', minlength: 'No mínimo 2 letras' },
				mensagem: { required: 'Escreva uma mensagem', minlength: 'No mínimo 10 letras' }

			},submitHandler: function(form) {

				var dados = $(form).serialize();
				$('#form-outros').fadeOut();
				$('#formularios .loading').fadeIn();
				$('.btn--form').addClass('disabled');

				$.ajax({
					type: 'POST',
					url: document.location.origin + '/tecnocal2.0/wp-content/themes/tecnocal/php/contato-outros.php',
					data: dados,
					success: function(resposta) {

				        $('.btn--form').removeClass('disabled');
				        $('#formularios .loading').fadeOut();

						setTimeout(function(){
							 if (resposta == 'true') {
					          	$('#obrigado').fadeIn();
					        } else {
					          	console.log(resposta);
					          	$('.erro').fadeIn();
					          	$('#tentar--novamente--outros').fadeIn();
					       }
						}, 900);

				    }
				});
			}
		});

		$('#form-newsletter').validate({
			rules: {
				nome: { required: true, minlength: 2, number: false },
				email: { required: true, email: true }
			},
			messages: {
				nome: { required: 'Preencha o campo nome', minlength: 'No mínimo 2 letras', number: 'Apenas letras' },
				email: { required: 'Informe o seu email', email: 'informe um email válido' }
			},submitHandler: function(form) {

				var dados = $(form).serialize();
				$('#form-newsletter').fadeOut();
				setTimeout(function(){
					$('#contato-footer .loading').fadeIn();

					$.ajax({
						type: 'POST',
						url: document.location.origin + '/tecnocal2.0/wp-content/themes/tecnocal/php/contato-newslatter.php',
						data: dados,
						success: function(resposta) {

					        $('#contato-footer .loading').fadeOut();

							setTimeout(function(){
								 if (resposta == 'true') {
						          	$('.obrigado').fadeIn();
						        } else {
						          	console.log(resposta);
						          	$('#contato-footer .erro').fadeIn();
						          	$('#tentar--novamente--newslatter').fadeIn();
						       }
							}, 900);

					    }
					});

				}, 400);
			}
		});

		$('#form-tabela').validate({
			rules: {
				tab_email: { required: true, email: true },
				tab_senha: { required: true, minlength: 6}
			},
			messages: {
				tab_email: { required: 'Informe o seu email', email: 'informe um email válido' },
				tab_senha: { required: 'Preencha o campo nome', minlength: 'No mínimo 6 caracter' }

			},submitHandler: function(form) {

				var dados = $(form).serialize();
				$('#form-tabela').fadeOut();
				setTimeout(function(){ $('.tab-conteudo .loading').fadeIn(); }, 400);

				setTimeout(function(){
					$.ajax({
						type: 'POST',
						url: document.location.origin + '/tecnocal2.0/wp-content/themes/tecnocal/php/logar-tabela.php',
						data: dados,
						success: function(resposta) {

							if (resposta != 'true') {
						        $('.tab-conteudo .loading').fadeOut();
						    };

							setTimeout(function(){
								if (resposta != 'true') {
						          	console.log(resposta);
						          	$('.tab-conteudo .erro').fadeIn();
						          	$('#tentar--novamente--tabela').fadeIn();
							    }else{
							    	window.location.href = "http://concepts.summercomunicacao.com.br/tecnocal2.0/tabelas/logado";
							    }
							}, 900);

					    }
					});
				}, 1800);
			}
		});

		$('#form-recuperar-senha-tabela').validate({
			rules: {
				rec_email: { required: true, email: true }
			},
			messages: {
				rec_email: { required: 'Informe o seu email', email: 'informe um email válido' }

			},submitHandler: function(form) {

				var dados = $(form).serialize();
				$('#form-recuperar-senha-tabela').fadeOut();
				setTimeout(function(){ $('.tab-conteudo .loading').fadeIn(); }, 400);

				setTimeout(function(){
					$.ajax({
						type: 'POST',
						url: document.location.origin + '/tecnocal2.0/wp-content/themes/tecnocal/php/recuperar-senha.php',
						data: dados,
						success: function(resposta) {

					        $('.tab-conteudo .loading').fadeOut();
					        console.log(resposta);

							setTimeout(function(){

								if (resposta == 'true') {
						          	$('.tab-conteudo .obrigado').fadeIn();
						        }else if(resposta == 'false'){
						        	console.log(resposta);
						          	$('.tab-conteudo .erro').fadeIn();
						          	document.getElementById("txt-erro").innerHTML = "Não foi localizar o usúario.";
						          	$('#tentar--novamente--rec-senha').fadeIn();
						       	}else{
						        	console.log(resposta);
						          	$('.tab-conteudo .erro').fadeIn();
						          	document.getElementById("txt-erro").innerHTML = "Houve um erro no sistema, por favor tente mais tarde.";
						          	$('#tentar--novamente--rec-senha').fadeIn();
						       	}

							}, 900);

					    }
					});
				}, 1800);
			}
		});

		$('#form-cadastrar-tabela').validate({
			rules: {
				creci: { required: true, minlength: 3 },
				imobiliaria: { required: true, minlength: 3 },
				telefone: { required: true, minlength: 14 },
				cnpj: { required: true, minlength: 18 },
				responsavel: { required: true, minlength: 3 },
				endereco: { required: true, minlength: 5 },
				numero: { required: true },
				bairro: { required: true },
				cidade: { required: true },
				estado: { required: true },
				email: { required: true, email: true },
				senha: { required: true, minlength: 6 }
			},
			messages: {
				creci: { required: 'Informe o CRECI da imobiliaria', minlength: 'No mínimo 3 caracteres' },
				imobiliaria: { required: 'Informe o nome da imobiliaria.', minlength: 'No mínimo 3 caracteres' },
				telefone: { required: 'Informe o telefone de contato', minlength: 'No mínimo 14 caracteres' },
				cnpj: { required: 'Informe o CNPJ da imobiliaria', minlength: 'No mínimo 18 caracteres' },
				responsavel: { required: 'Informe o responsável pela imobiliaria', minlength: 'No mínimo 3 caracteres' },
				endereco: { required: 'Informe o endereço da imobiliaria', minlength: 'No mínimo 5 caracteres' },
				numero: { required: 'Informe o número do local' },
				bairro: { required: 'Informe o bairro' },
				cidade: { required: 'Informe a cidade' },
				estado: { required: 'Informe o estado brasileiro' },
				email: { required: 'Informe o seu email', email: 'informe um email válido' },
				senha: { required: 'Digite uma senha', minlength: 'No mínimo 6 caracteres' }
			},submitHandler: function(form) {

				var dados = $(form).serialize();
				$('#form-cadastrar-tabela').fadeOut();
				setTimeout(function(){ $('.cadastrar .loading').fadeIn(); }, 400);
				
				$.ajax({
					type: 'POST',
					url: document.location.origin + '/tecnocal2.0/wp-content/themes/tecnocal/php/cadastro-tabela.php',
					data: dados,
					success: function(resposta) {
						setTimeout(function(){
							$('.cadastrar .loading').fadeOut();
						}, 900);
						setTimeout(function(){				        	
							if (resposta == 'true') {
					          	$('.cadastrar .obrigado').fadeIn();
					        } else {
					          	$('.cadastrar .erro').fadeIn();
					          	document.getElementById("cad-txt-erro").innerHTML = resposta;						          	
					          	$('#tentar--novamente--cadastrar-tabela').fadeIn();
					       }
						}, 1200);
				    }
				});
			}
		});

		$('#form-pre-avaliacao').validate({
			rules: {
				bairro: 		{ },
				empreendimento: { },
				nome: 			{ required: true },
				email: 			{ required: true, email: true },
				telefone: 		{ },
				celular: 		{ },
				nascimento: 	{ max: false },
				renda: 			{ range: [0, 20000]  },
				fgts: 			{ },
				dependentes: 	{ },
				servidor: 		{ }
			},
			messages: {
				bairro: 		{ },
				empreendimento: { },
				nome: 			{ required: 'Informe o seu nome' },
				email: 			{ required: 'Informe o seu email', email: 'informe um email válido' },
				telefone: 		{ },
				celular: 		{ },
				nascimento: 	{ },
				renda: 			{ },
				fgts: 			{ },
				dependentes: 	{ },
				servidor: 		{ }
			},submitHandler: function(form) {

				var dados = $(form).serialize();
				$('#form-pre-avaliacao').fadeOut();
				setTimeout(function(){ $('.cadastrar .loading').fadeIn(); }, 400);
				
				$.ajax({
					type: 'POST',
					url: document.location.origin + '/tecnocal2.0/wp-content/themes/tecnocal/php/pre-avaliacao.php',
					data: dados,
					success: function(resposta) {
						setTimeout(function(){
								$('.cadastrar .loading').fadeOut(); 
						}, 900);
						setTimeout(function(){
							if (resposta == 'true') {
					          	$('.cadastrar .obrigado').fadeIn();
					        } else {
					          	$('.cadastrar .erro').fadeIn();
					          	document.getElementById("cad-txt-erro").innerHTML = resposta;
					          	$('#tentar--novamente--pre-avaliacao').fadeIn();
					       }
						}, 1300);
				    }
				});
			}
		});

		$('#form-ligamos').validate({
			rules: {
				lig_nome: 		{ required: true },
				lig_telefone: 	{ required: true, minlength: 14 }
			},
			messages: {
				lig_nome: 		{ required: 'Informe o seu nome' },
				lig_telefone: 	{ required: 'Informe o telefone de contato', minlength: 'No mínimo 9 caracteres' }
			},submitHandler: function(form) {

				var dados = $(form).serialize();
				$('#form-ligamos').fadeOut();
				setTimeout(function(){ $('#vamos-te-ligar .loading').fadeIn(); }, 400);
				
				$.ajax({
					type: 'POST',
					url: document.location.origin + '/tecnocal2.0/wp-content/themes/tecnocal/php/te-ligamos.php',
					data: dados,
					success: function(resposta) {
						setTimeout(function(){
								$('#vamos-te-ligar .loading').fadeOut(); 
						}, 900);
						setTimeout(function(){
							if (resposta == 'true') {
					          	$('#vamos-te-ligar .obrigado').fadeIn();
					        } else {
					          	$('#vamos-te-ligar .erro').fadeIn();
					          	document.getElementById("txt-erro-lig").innerHTML = resposta;
					          	$('#tentar--novamente--ligamos').fadeIn();
					       }
						}, 1300);
				    }
				});
			}
		});

	// FUNÇÕES

		$('a[href*="#"]')
		  .not('[href="#"]')
		  .not('[href="#0"]')
		  .click(function(event) {
		  // On-page links
		  if (
		    location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
		    && 
		    location.hostname == this.hostname
		  ) {
		    // Figure out element to scroll to
		    var target = $(this.hash);
		    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
		    // Does a scroll target exist?
		    if (target.length) {
		      // Only prevent default if animation is actually gonna happen
		      event.preventDefault();
		      $('html, body').animate({
		        scrollTop: target.offset().top
		      }, 1000, function() {
		        // Callback after animation
		        // Must change focus!
		        var $target = $(target);
		        $target.focus();
		        if ($target.is(":focus")) { // Checking if the target was focused
		          return false;
		        } else {
		          $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
		          $target.focus(); // Set focus again
		        };
		      });
		    }
		  }
		});

		$('.tel b').click(function(){
			$(this).html('9110');
		});

		$('.whats b').click(function(){
			$(this).html('4990');
		});

		const bloco = $('div.wp-block-embed__wrapper');
		if ( bloco[0] != null) {
			$('.wp-block-embed__wrapper iframe').ready(function(){
				$('.wp-block-embed__wrapper iframe')[0].src += "&autoplay=1";
			});
		}		
		

		$('.sair-tabela').click(function(){
			document.cookie = 'PHPSESSID=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
			window.location.reload();
		});

		$('#vamos-te-ligar .fundo-te-ligamos, .ico-te-ligar, .fechar-te-ligamos').click(function(){
			$('#vamos-te-ligar').fadeToggle();
		});

		$('#outro-empre').click(function(){
			$(this).fadeOut();
		});

		$('.filtro-lancamento').click(function(){
			$('#empreendimento .container').css({"display":"none"});
			$('#busca').val("");
			$('#empreendimento .loading').fadeIn();

			$('.filtro-item').removeClass('ligado');
			$(this).addClass('ligado');
			$('#outro-empre').fadeOut();
   			$('.card').css('transition', 'none');
   			$('.lancamento0').fadeOut();

   			setTimeout(function(){
				$('#empreendimento .loading').fadeOut();
			}, 700);
			setTimeout(function(){
				$('#empreendimento .container').fadeIn();
				$('.lancamento1').fadeIn();
			}, 1100);
		});

		$('.filtro-construcao').click(function(){
			$('#empreendimento .container').css({"display":"none"});
			$('#busca').val("");
			$('#empreendimento .loading').fadeIn();

			$('.filtro-item').removeClass('ligado');
			$(this).addClass('ligado');
			$('#outro-empre').fadeOut();
   			$('.card').css('transition', 'none');
   			$('.construcao0').fadeOut();

   			setTimeout(function(){
				$('#empreendimento .loading').fadeOut();
			}, 700);
			setTimeout(function(){
				$('#empreendimento .container').fadeIn();
				$('.construcao1').fadeIn();
			}, 1100);
		});

		$('.filtro-pronto').click(function(){
			$('#empreendimento .container').css({"display":"none"});
			$('#busca').val("");
			$('#empreendimento .loading').fadeIn();

			$('.filtro-item').removeClass('ligado');
			$(this).addClass('ligado');
			$('#outro-empre').fadeOut();
   			$('.card').css('transition', 'none');
   			$('.pront0').fadeOut();

   			setTimeout(function(){
				$('#empreendimento .loading').fadeOut();
			}, 700);
			setTimeout(function(){
				$('#empreendimento .container').fadeIn();
				$('.pront1').fadeIn();
			}, 1100);
		});

		$('.filtro-dorms').click(function(){
			$('#empreendimento .container').css({"display":"none"});
			$('#busca').val("");
			$('#empreendimento .loading').fadeIn();

			$('.filtro-item').removeClass('ligado');
			$(this).addClass('ligado');
			$('#outro-empre').fadeOut();
   			$('.card').css('transition', 'none');
   			$('.dorm0').fadeOut();

   			setTimeout(function(){
				$('#empreendimento .loading').fadeOut();
			}, 700);
			setTimeout(function(){
				$('#empreendimento .container').fadeIn();
				$('.dorm1').fadeIn();
			}, 1100);
		});

		$('.filtro-vaga').click(function(){
			$('#empreendimento .container').css({"display":"none"});
			$('#busca').val("");
			$('#empreendimento .loading').fadeIn();

			$('.filtro-item').removeClass('ligado');
			$(this).addClass('ligado');
			$('#outro-empre').fadeOut();
   			$('.card').css('transition', 'none');
   			$('.vagas0').fadeOut();

   			setTimeout(function(){
				$('#empreendimento .loading').fadeOut();
			}, 700);
			setTimeout(function(){
				$('#empreendimento .container').fadeIn();
				$('.vagas1').fadeIn();
			}, 1100);
		});

		$('.filtro-suite').click(function(){
			$('#empreendimento .container').css({"display":"none"});
			$('#busca').val("");
			$('#empreendimento .loading').fadeIn();

			$('.filtro-item').removeClass('ligado');
			$(this).addClass('ligado');
			$('#outro-empre').fadeOut();
   			$('.card').css('transition', 'none');
   			$('.suite0').fadeOut();

   			setTimeout(function(){
				$('#empreendimento .loading').fadeOut();
			}, 700);
			setTimeout(function(){
				$('#empreendimento .container').fadeIn();
				$('.suite1').fadeIn();
			}, 1100);
		});

		$('.filtro-praia').click(function(){
			$('#empreendimento .container').css({"display":"none"});
			$('#busca').val("");
			$('#empreendimento .loading').fadeIn();

			$('.filtro-item').removeClass('ligado');
			$(this).addClass('ligado');
			$('#outro-empre').fadeOut();
   			$('.card').css('transition', 'none');
   			$('.praia0').fadeOut();

   			setTimeout(function(){
				$('#empreendimento .loading').fadeOut();
			}, 700);
			setTimeout(function(){
				$('#empreendimento .container').fadeIn();
				$('.praia1').fadeIn();
			}, 1100);
		});

		$('.filtro-revenda').click(function(){
			$('#empreendimento .container').css({"display":"none"});
			$('#busca').val("");
			$('#empreendimento .loading').fadeIn();

			$('.filtro-item').removeClass('ligado');
			$(this).addClass('ligado');
			$('#outro-empre').fadeOut();
   			$('.card').css('transition', 'none');
   			$('.revenda0').fadeOut();

   			setTimeout(function(){
				$('#empreendimento .loading').fadeOut();
			}, 700);
			setTimeout(function(){
				$('#empreendimento .container').fadeIn();
				$('.revenda1').fadeIn();
			}, 1100);
		});

		$('.filtro-todos').click(function(){
			$('#empreendimento .container').css({"display":"none"});
			$('#busca').val("");
			$('#empreendimento .loading').fadeIn();

			$('.filtro-item').removeClass('ligado');
			$(this).addClass('ligado');
			$('#outro-empre').fadeOut();
   			$('.card').css('transition', 'none');
   			$('.praia0').fadeOut();

   			setTimeout(function(){
				$('#empreendimento .loading').fadeOut();
			}, 700);
			setTimeout(function(){
				$('#empreendimento .container').fadeIn();
				$('#cards-empreendimento .ancora').fadeIn();
			}, 1100);
		});

		$('#form-busca .submit').click(function(){
			$('#empreendimento .container').css({"display":"none"});
			$('#empreendimento .loading').fadeIn();
			$('.filtro-item').removeClass('ligado');
			$('#outro-empre').fadeOut();
   			$('.card').css('transition', 'none');

   			setTimeout(function(){
				$('#empreendimento .loading').fadeOut();
			}, 700);
			setTimeout(function(){
				$('#empreendimento .container').fadeIn();

			   	var input, filter, ul, li, a, i;
	    		input = document.getElementById("busca");
	    		filter = input.value.toUpperCase();    		
	    		ul = document.getElementById("cards-empreendimento");
	    		li = ul.getElementsByClassName("ancora");
			    for (i = 0; i < li.length; i++) {
			        a = li[i].getElementsByClassName("nome_empree")[0];
			        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {			        	
			            li[i].style.display = "";
			        } else {
			            li[i].style.display = "none";
			        }
			    }

			}, 1100);
		});

		$('#buscar_residencial').click(function(){
			$('#nao_exite').css({"display":"none"});
			$('#residencial .ancora').css({"display":"none"});
			$('#residencial .loading').fadeIn();

			var bairro 		= $('#bairro').val();
			var estagio 	= $('#estagio').val();
			var dorms 		= $('#dorms').val();
			var metragem	= $('#metragem').val();
			var cards 		= "#residencial .ancora";

   			setTimeout(function(){
				$('#residencial .loading').fadeOut();
			}, 700);
			setTimeout(function(){

				if( (bairro != 0 || bairro != null) && 
					(estagio != 0 || estagio != null) && 
					(dorms != 0 || dorms != null) && 
					(metragem != 0 || metragem != null) ){

					if(bairro != 0 && bairro != null){ cards += "."+bairro; }
					if(estagio != 0 && estagio != null){ cards += "."+estagio; }
					if(dorms != 0 && dorms != null){ cards += "."+dorms; }
					if(metragem != 0 && metragem != null){ cards += "."+metragem; }
				}
				$(cards).fadeIn();
				if( !$(cards).length ){ $('#nao_exite').fadeIn(); }
			}, 1100);
		});

		$('#busca').keypress(function(e){
			if(e.key == "Enter"){
		      document.getElementById("ir_busca").click();
		    }
		});

		if(window.location.hash == "#aviacao"){
			$('#nao_exite').css({"display":"none"});
			$('#residencial .ancora').css({"display":"none"});
			$('#residencial .loading').fadeIn();
   			setTimeout(function(){ $('#residencial .loading').fadeOut(); }, 700);
			setTimeout(function(){ $("#residencial .ancora.Aviação").fadeIn(); }, 1100);
		}
		if(window.location.hash == "#guilhermina"){
			$('#nao_exite').css({"display":"none"});
			$('#residencial .ancora').css({"display":"none"});
			$('#residencial .loading').fadeIn();
   			setTimeout(function(){ $('#residencial .loading').fadeOut(); }, 700);
			setTimeout(function(){ $("#residencial .ancora.Guilhermina").fadeIn(); }, 1100);
		}
		if(window.location.hash == "#boqueirao"){
			$('#nao_exite').css({"display":"none"});
			$('#residencial .ancora').css({"display":"none"});
			$('#residencial .loading').fadeIn();
   			setTimeout(function(){ $('#residencial .loading').fadeOut(); }, 700);
			setTimeout(function(){ $("#residencial .ancora.Boqueirão").fadeIn(); }, 1100);
		}
		if(window.location.hash == "#canto_do_forte"){
			$('#nao_exite').css({"display":"none"});
			$('#residencial .ancora').css({"display":"none"});
			$('#residencial .loading').fadeIn();
   			setTimeout(function(){ $('#residencial .loading').fadeOut(); }, 700);
			setTimeout(function(){ $("#residencial .ancora.Canto_do_Forte").fadeIn(); }, 1100);
		}
		if(window.location.hash == "#ocian"){
			$('#nao_exite').css({"display":"none"});
			$('#residencial .ancora').css({"display":"none"});
			$('#residencial .loading').fadeIn();
   			setTimeout(function(){ $('#residencial .loading').fadeOut(); }, 700);
			setTimeout(function(){ $("#residencial .ancora.Ocian").fadeIn(); }, 1100);
		}

		$('.resize-galeria-obra').click(function(){
			img = $(this).data('imgsrc');
			$('#ampliada .bloco-ampliada img').attr('src', img);
			$('#ampliada').fadeIn();
		});

		$('#ampliada').click(function(){
			$(this).fadeOut();
   			setTimeout(function(){ $('#ampliada .bloco-ampliada img').attr('src', ''); }, 700);
			
		});






		





















	$('#mapa .menu .botao').click(function(){
		$('#mapa .menu .botao').removeClass('ativo');
		$(this).toggleClass('ativo');

		if(window.innerWidth <= 767){
			$(this).insertAfter('#mapa .menu .botao:last-of-type');

			$('html,body').animate({
				scrollTop: $('#top-mapa').offset().top - 100
			},1000);
		};
	});

	if(window.innerWidth <= 992){
		$('.botoes-filtro').fadeOut();
	};

	$('#video img').click(function(){
		$(this).fadeOut();

		setTimeout(function(){
			$('#video iframe').fadeIn();
			$('#video iframe')[0].src += "?autoplay=1";
		}, 400);
	});


	$('.hamburguer-bt').click(function(){
		$('.hamburguer-bt').toggleClass("active");
		$('.btn-menu--menu').toggleClass("active");
		$('#fundo--menu').fadeToggle();
		$('.navbar-collapse').toggleClass("atv--on");
		$('.menu').toggleClass("btn__on");
		$('.navbar-default').toggleClass("bck--white");
	});	 

	


	$('.btn-canto-forte').click(function(){
		$('#mapa .img-mapa img').attr('src','http://concepts.summercomunicacao.com.br/tecnocal2.0/wp-content/themes/tecnocal/img/mapa/forte-mapa.jpg');
	});

	$('.btn-boqueirao').click(function(){
		$('#mapa .img-mapa img').attr('src','http://concepts.summercomunicacao.com.br/tecnocal2.0/wp-content/themes/tecnocal/img/mapa/boqueirao-mapa.jpg');
	});

	$('.btn-aviacao').click(function(){
		$('#mapa .img-mapa img').attr('src','http://concepts.summercomunicacao.com.br/tecnocal2.0/wp-content/themes/tecnocal/img/mapa/aviacao-mapa.jpg');
	});

	$('.btn-guilhermina').click(function(){
		$('#mapa .img-mapa img').attr('src','http://concepts.summercomunicacao.com.br/tecnocal2.0/wp-content/themes/tecnocal/img/mapa/guilhermina-mapa.jpg');
	});

	$('.btn-ocian').click(function(){
		$('#mapa .img-mapa img').attr('src','http://concepts.summercomunicacao.com.br/tecnocal2.0/wp-content/themes/tecnocal/img/mapa/ocian-mapa.jpg');
	});

	$('#plantas .btns-opcao').click(function(){
        var codigo = $(this).attr("codigo");
        var imagem = $(this).attr("imagem");
        $('#plantas .btns-opcao').removeClass('selecte');
        $(this).addClass('selecte');
        $('#plantas .img-planta img').attr('src', url+'/s/assets/empreendimento/'+codigo+'/planta/'+imagem);
        $('.img-planta a').attr('href', url+'/s/assets/empreendimento/'+codigo+'/planta/'+imagem);
        $('.img-planta a').attr('download', imagem);
	});

	$('.tel span').click(function(){
		$(this).html('9110');
	});

	$('.btn--form').click(function(){
		$('.btn--form').removeClass("activ");
		$(this).toggleClass("activ");
	});

	$('.btn-sac').click(function(){

		$('.btn--form').addClass('disabled');

        $('#form-corretor').fadeOut();
        $('#form-trabalhe').fadeOut();
        $('#form-outros').fadeOut();
        $('#obrigado').fadeOut();
        $('.erro').fadeOut();

		setTimeout(function(){
			$('.bloco-formulario').css({'padding':'5px 5px 20px'});
			$('.bloco-formulario').css({'min-height':'318px'});
		}, 300);

		setTimeout(function(){
        	$('#form-sac').fadeIn();
		}, 600);

		setTimeout(function(){
        	$('.btn--form').removeClass('disabled');
		}, 900);	
	});

	$('.btn-trabalhe').click(function(){

		$('.btn--form').addClass('disabled');

        $('#form-sac').fadeOut();
        $('#form-corretor').fadeOut();
        $('#form-outros').fadeOut();
        $('#obrigado').fadeOut();
        $('.erro').fadeOut();

		setTimeout(function(){
			$('.bloco-formulario').css({'padding':'5px 5px 20px'});
			$('.bloco-formulario').css({'min-height':'318px'});
		}, 300);

		setTimeout(function(){
        	$('#form-trabalhe').fadeIn();
		}, 600);	

		setTimeout(function(){
        	$('.btn--form').removeClass('disabled');
		}, 900);
	});

	$('.btn-outros').click(function(){

		$('.btn--form').addClass('disabled');

        $('#form-sac').fadeOut();
        $('#form-corretor').fadeOut();
        $('#form-trabalhe').fadeOut();
        $('#obrigado').fadeOut();
        $('.erro').fadeOut();

		setTimeout(function(){
			$('.bloco-formulario').css({'padding':'5px 5px 20px'});
			$('.bloco-formulario').css({'min-height':'318px'});
		}, 300);

		setTimeout(function(){
        	$('#form-outros').fadeIn();
		}, 600);

		setTimeout(function(){
        	$('.btn--form').removeClass('disabled');
		}, 900);	
	});

	$('.pergunta').click(function(){
		$(this).find('.text').find('p').fadeToggle();
		$(this).toggleClass('ativ');
	});

	$('#trabalhe_curriculo').on('change', function() {
	  var fileName = "Currículo (pdf ou docx): "+$(this)[0].files[0].name;
	  $('.label_curriculo').html(fileName);
	});




	$("#link1").click(function(e){
		window.open("https://www.google.com/");
		clique();
	});

	function clique(){
		setTimeout( function(){
			window.open("https://www.ev.org.br/Cursos");
		}, 2000 );
		
	}

	$("#menu__nav--servicos, .menu__servicos").hover(function(e){

		if( window.innerWidth > 992){
			switch(e.type){
				case "mouseenter":
					mostrarServicos();
					break;
				case "mouseleave":
					esconderServicos();
					break;
			}
		}

	});
	

	$(".menu__btn").click(function(e){
		$(".menu__nav--mobile").parent().toggleClass("hidden");
	});

	jQuery.validator.addMethod("validNumber", function(value, element) {
	  var tel = value;
	        var comparador = tel.slice(1,2); // pega o primeiro numero digitado
	        var i=0;
	        var iguais = false;
	        for(i = 0; i < tel.length; i++){
	            var number = tel.slice(i,i+1);  //percorre a digitaÃ§Ã£o
	            if( !(number == comparador) && number!='(' && number!=')' && number!=' ' &&number!='-' ){ 
	                iguais=true;
	            }
	        }

	         return (iguais) ? true : false;
	}, "Digite um número válido");

	jQuery.validator.addMethod("ddd", function(value, element) {
	    var i = 0, acert = 0;
	    var codigosDDD = 
	    [
	      11, 12, 13, 14, 15, 16, 17, 18, 19,
	      21, 22, 24, 27, 28, 31, 32, 33, 34,
	      35, 37, 38, 41, 42, 43, 44, 45, 46,
	      47, 48, 49, 51, 53, 54, 55, 61, 62,
	      64, 63, 65, 66, 67, 68, 69, 71, 73,
	      74, 75, 77, 79, 81, 82, 83, 84, 85,
	      86, 87, 88, 89, 91, 92, 93, 94, 95,
	      96, 97, 98, 99
	    ];
	    var str = value;
	    var res = parseInt(str.slice(1, 3));
	    for(i = 0; i < codigosDDD.length; i++){
	      if( codigosDDD[i] == res ){
	        acert++;
	      }
	    }
	    return (acert > 0) ? true : false;
	}, "Digite DDD válido");
});

function mostrarServicos(){
	$(".menu__servicos").removeClass("hidden");
}
function esconderServicos(){
	$(".menu__servicos").addClass("hidden");
}



var rangeSlider = function(){
  var slider = $('.range-slider'),
      range = $('.range-slider__range'),
      value = $('.range-slider__value');
    
  slider.each(function(){
    value.each(function(){
      var value = $(this).prev().attr('value');
      $('.range-slider__value').html(value);

      if(this.value == 20000 || this.value == "20000"){
      	$('.segunda b').html('Mais de<br>');
      }else{
      	$('.segunda b').html('Até');
      }

    });
    range.on('input', function(){

      $('.range-slider__value').html(this.value);

      if(this.value == 20000 || this.value == "20000"){
      	$('.segunda b').html('Mais de<br>');
      }else{
      	$('.segunda b').html('Até');
      }

    });
  });
};
rangeSlider();

if (window.location.href == "http://concepts.summercomunicacao.com.br/tecnocal2.0/pre-avaliacao/") {
	document.getElementById("barra-range").oninput = function() {
	  var valor = this.value;
	  var maximo = $(this).attr('max');
	  valor = (valor * 100) / maximo;
	  this.style.background = 'linear-gradient(to right, #fb9124 ' + valor + '%, #f5f5f5 ' + valor + '%)';
	};
}
	
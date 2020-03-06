$(document).ready(function() {

    const url_query = document.location.origin;

    var config = {
        apikey: 'ak_test_mThoTptDvQKGCVwAzSdd70vBEnU2e8', // Conta Teste - André
        brand: '',
        cardhash: '',
        boleto: '',
        id_comprador: '',
        url_atual: window.location.href,
    };

    $('#submit-boleto').click(function(e){
        e.preventDefault();
        $('.erropagarme').html('');

        nome                = $.trim($('#nome').val());
        email               = $.trim($('#email').val());

        cpf_anti            = $.trim($('#cpf').val());
        cpf                 = cpf_anti.replace('.','');
        cpf                 = cpf.replace('.','');
        cpf                 = cpf.replace('-','');
        cpf                 = cpf.replace('/','');

        pais                = "br";
        estado              = "Brasília";
        cidade              = "Asa Sul";
        telefone_anti       = $.trim($('#telefone').val());
        telefone            = telefone_anti.replace(' ','');
        telefone            = telefone.replace('-','');


        config.id_comprador = $.trim($('#usuario').val());
        idProduto           = $.trim($('#produto').val());
        nmProduto           = $.trim($('#nmproduto').val());
        valor_anti           = $.trim($('#vlproduto').val());
        valor               = valor_anti.replace(' ','');
        valor               = valor.replace('R$','');
        valor               = valor.replace('.','');
        valor               = valor.replace('.','');
        valor               = valor.replace('.','');
        valor               = valor.replace(',','');
        valor               = parseInt( valor );
        quantidade          = "1";


        if(nome             == "" || nome       == null){
            $('#erro-nome').html('Preencha o nome');
            $('#nome').focus();
            return false;
        }else if(email      == "" || email      == null){
            $('#erro-email').html('Preencha o email');
            $('#email').focus();
            return false;
        }else if(telefone   == "" || telefone   == null){
            $('#erro-telefone').html('Preencha o telefone');
            $('#telefone').focus();
            return false;
        }else if(cpf        == "" || cpf        == null){
            $('#erro-cpf').html('Preencha o cpf');
            $('#cpf').focus();
            return false;
        }else{

            $('.formpagar').css({'display':'none'});
            $('#loading').css({'display':'block'});

            jQuery.ajax({
                url: document.location.origin+'/abq/s/assets/php/valid_valor.php',
                type: 'POST',
                data: 
                {  
                    idProduto: idProduto,
                    valor: $.trim($('#vlproduto').val())
                },
                success: function ( resposta ) {    

                    if (resposta == 1 || resposta == '1') {

                    // -------> Pagar.Me
                        pagarme.client.connect({ api_key: config.apikey })  
                        .then(client => client.transactions.create({
                            amount: parseInt( valor ),
                            payment_method: 'boleto',
                            postback_url: 'http://associacaoquiropraxia.org.br/post_back/post_back.php',
                            async: false,
                            customer: {
                                type: 'individual',
                                country: 'br',
                                name: nome,
                                email: email,
                                external_id: config.id_comprador,
                                documents: [
                                    {
                                        type: 'cpf',
                                        number: cpf,
                                    },
                                ],
                            },
                            items: [
                                {
                                    id: "08109394",
                                    title: nmProduto,
                                    unit_price: valor,
                                    quantity: quantidade,
                                    tangible: false
                                }
                            ]
                        }))
                        .then( function(transaction){ 
                            jQuery.ajax({
                                url: document.location.origin + '/abq/s/assets/php/este-aqui.php',
                                type: 'POST',
                                data: {  
                                    name: nome,
                                    idComprador: config.id_comprador,
                                    cpf: cpf,
                                    cpf_anti: cpf_anti,
                                    email: email,
                                    telefone: telefone,
                                    telefone_anti: telefone_anti,
                                    pais: pais,
                                    estado: estado,
                                    cidade: cidade,

                                    idProduto: idProduto,
                                    valor: valor,
                                    valor_anti: valor_anti,
                                    nmProduto: nmProduto,

                                    resposta: transaction.status,
                                    modo: 'boleto',
                                    transactionID: transaction.tid,
                                    transactionInfo: transaction,
                                    boleto: transaction.boleto_url
                                },
                                success: function ( resposta ) {                

                                    if (transaction.status == 'refused' || transaction.status == 'pending_refund' || transaction.status == 'refunded'){

                                        $('#erro').css({'display':'block'});
                                        $('#loading').css({'display':'none'});

                                    }else if( transaction.status == 'waiting_payment' ){

                                        $('#aguardando').css({'display':'block'});
                                        $('#loading').css({'display':'none'});

                                    }else{

                                        $('#sucesso').css({'display':'block'});
                                        $('#loading').css({'display':'none'});

                                    }
                  
                                },error: function (ajaxContext) { }
                            });
                        });
                    // -------> Pagar.Me

                    }

                },error: function (ajaxContext) { }
            });
        }
    });

    $('#submit-cartao').click(function(e){

        e.preventDefault();
        $('.erropagarme').html('');

        nome                = $.trim($('#nome--usu').val());
        email               = $.trim($('#email--usu').val());

        cpf_anti            = $.trim($('#cpf--usu').val());
        cpf                 = cpf_anti.replace('.','');
        cpf                 = cpf.replace('.','');
        cpf                 = cpf.replace('-','');
        cpf                 = cpf.replace('/','');

        pais                = "br";
        estado              = "Brasília";
        cidade              = "Asa Sul";
        rua                 = "SGAS";
        numero              = "910";
        cep                 = "70390100";

        telefone_anti       = $.trim($('#telefone--usu').val());
        telefone            = telefone_anti.replace(' ','');
        telefone            = telefone.replace('-','');

        config.id_comprador = $.trim($('#usuario').val());
        idProduto           = $.trim($('#produto').val());
        nmProduto           = $.trim($('#nmproduto').val());
        valor_anti          = $.trim($('#vlproduto').val());
        valor               = valor_anti.replace(' ','');
        valor               = valor.replace('R$','');
        valor               = valor.replace('.','');
        valor               = valor.replace('.','');
        valor               = valor.replace('.','');
        valor               = valor.replace(',','');
        valor               = parseInt( valor );
        quantidade          = "1";        

        card_num_anti       = $.trim($('#num_card').val());
        card_num            = card_num_anti.replace(' ','');
        card_num            = card_num.replace(' ','');
        card_num            = card_num.replace(' ','');

        card_vencimento      = $.trim($('#ven_card').val());
        parcela              = $.trim($('#par_card').val());
        card_nome            = $.trim($('#tit_card').val());
        card_cw              = $.trim($('#cvv_card').val());
        card_cpf_anti        = $.trim($('#cpf_card').val());
        card_cpf             = card_cpf_anti.replace('.','');
        card_cpf             = card_cpf.replace('.','');
        card_cpf             = card_cpf.replace('-','');
        card_cpf             = card_cpf.replace('/','');

        card_nascimento_anti = $.trim($('#nas_card').val());
        card_nascimento      = card_nascimento_anti.replace('/','-');
        card_nascimento      = card_nascimento.replace('/','-');

        if(nome                  == "" || nome            == null){
            $('#erro-nome--usu').html('Preencha o nome.');
            $('#nome').focus();
            return false;
        }else if(cpf             == "" || cpf             == null){
            $('#erro-cpf--usu').html('Preencha o cpf.');
            $('#cpf').focus();
            return false;
        }else if(email           == "" || email           == null){
            $('#erro-email--usu').html('Preencha o email.');
            $('#email').focus();
            return false;
        }else if(telefone        == "" || telefone        == null){
            $('#erro-telefone--usu').html('Preencha o telefone.');
            $('#telefone').focus();
            return false;
        }else if(card_num        == "" || card_num        == null){
            $('#erro-num_card').html('Preencha o número do cartão');
            $('#num_card').focus();
            return false;
        }else if(card_vencimento == '' || card_vencimento == null){
            $('#erro-ven_card').html('Preencha a data de venciamento do cartão');
            $('#ven_card').focus();
            return false;
        }else if(parcela         == '' || parcela         == null){
            $('#erro-par_card').html('Escolha a quantidade de parcelas');
            return false;
        }else if(card_nome       == '' || card_nome       == null){
            $('#erro-tit_card').html('Preencha o nome do titula do cartão');
            $('#tit_card').focus();
            return false;
        }else if(card_cw         == '' || card_cw         == null){
            $('#erro-cvv_card').html('Preencha o CW do cartão');
            $('#cvv_card').focus();
            return false;
        }else if(card_cpf        == '' || card_cpf        == null){
            $('#erro-cpf_card').html('Preencha o CPF do titular do cartão');
            $('#cpf_card').focus();
            return false;
        }else if(card_nascimento == '' || card_nascimento == null){
            $('#erro-nas_card').html('Preencha a data de nascimento do titular do cartão');
            $('#nas_card').focus();
            return false;
        }else{

            $('.formpagar').css({'display':'none'});
            $('#loading').css({'display':'block'});

            jQuery.ajax({
                url: document.location.origin+'/abq/s/assets/php/valid_valor.php',
                type: 'POST',
                data: 
                {  
                    idProduto: idProduto,
                    valor: $.trim($('#vlproduto').val())
                },
                success: function ( resposta ) {    

                    if (resposta == 1 || resposta == '1') {

                    // -------> Pagar.Me
                      
                        const card = {
                          card_number:          card_num,
                          card_holder_name:     card_nome,
                          card_expiration_date: card_vencimento,
                          card_cvv:             card_cw                                         
                        }

                        pagarme.client.connect({ api_key: config.apikey })
                          .then(client => client.security.encrypt(card))
                          .then(card_hash => card_hash)
                          .then(function(card_hash){
                            config.cardhash = card_hash;

                            if(config.cardhash){
                                            
                                pagarme.client.connect({ api_key: config.apikey })
                                .then(client => client.transactions.create({
                                    "amount": parseInt( valor ),
                                    "installments": parseInt( parcela ),
                                    "card_hash": config.cardhash, 
                                    "postback_url": 'http://associacaoquiropraxia.org.br/post_back/post_back.php',
                                    "async": false,
                                    "customer": {
                                        "type": "individual",
                                        "country": "br",
                                        "name": nome,
                                        "email": email,
                                        "external_id": config.id_comprador,
                                        "documents": [
                                            {
                                                "type": "cpf",
                                                "number": cpf
                                            }
                                        ],
                                        "phone_numbers": ["+55"+ telefone],
                                        "birthday": card_nascimento
                                    },
                                    "billing": {
                                        "name": nome,
                                        "address": {
                                            "country": "br", 
                                            "state": estado,
                                            "city": cidade,
                                            "street": rua,
                                            "street_number": numero,
                                            "zipcode": cep
                                        }
                                    },
                                    "shipping": {
                                        "name": nome,
                                        "fee": 0,
                                        "expedited": false,
                                        "address": {
                                            "country": "br", 
                                            "state": estado,
                                            "city": cidade,
                                            "street": rua,
                                            "street_number": numero,
                                            "zipcode": cep
                                        }
                                    },
                                    "items": [{
                                        "id": "01310394",
                                        "title": nmProduto,
                                        "unit_price": parseInt( valor ),
                                        "quantity": quantidade,
                                        "tangible": false
                                    }]
                                }))
                                .then( function(transaction){ 
                                    jQuery.ajax({
                                    url: document.location.origin + '/abq/s/assets/php/este-aqui.php',
                                    type: 'POST',
                                    data: 
                                    {
                                            name:            nome,
                                            idComprador:     config.id_comprador,
                                            cpf:             cpf,
                                            cpf_anti:        cpf_anti,
                                            email:           email,
                                            telefone:        telefone,
                                            telefone_anti:   telefone_anti,
                                            pais:            pais,
                                            estado:          estado,
                                            cidade:          cidade,

                                            idProduto:       idProduto,
                                            valor:           valor,
                                            valor_anti:      valor_anti,
                                            parcela:         parcela,
                                            nmProduto:       nmProduto,

                                            resposta:        transaction.status, 
                                            modo:            'cartao', 
                                            transactionID:   transaction.tid,
                                            transactionInfo: transaction
                                    },
                                    success: function ( resposta ) {
                                      
                                        if (transaction.status == 'refused' || transaction.status == 'pending_refund' || transaction.status == 'refunded'){

                                            $('#erro').css({'display':'block'});
                                            $('#loading').css({'display':'none'});

                                        }else if( transaction.status == 'waiting_payment' ){

                                            $('#aguardandocard').css({'display':'block'});
                                            $('#loading').css({'display':'none'});

                                        }else{

                                            $('#sucesso').css({'display':'block'});
                                            $('#loading').css({'display':'none'});

                                        }
                                    },error: function (ajaxContext) {  }
                                  });
                                });

                            }else{  }

                        });              

                    // -------> Pagar.Me

                    }

                },error: function (ajaxContext) {  }
            });

        }
        
    });








});
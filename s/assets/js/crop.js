$('#busca').change(function handleImage(e){
    $('.upload-img--atencao').remove();
    var nome_img = $(this).val();
    nome_img = nome_img.split('\\').pop();
    $('#busca').siblings().val(nome_img);
    // console.log('IMG RECEBIDA '+$('#busca').val());
    var reader = new FileReader();

    reader.onload = function(event){        
      var image = new Image();               
      image.onload = function(){
        console.log(image.width);
        if(image.width > 180) {
          var canvas = document.createElement('canvas');
          canvas.width = image.width;
          canvas.height = image.height;         
          var ctx = canvas.getContext('2d');
          ctx.drawImage( image, 0, 0, canvas.width, canvas.height );        
          $('#image_input--buscar').html(['<img src="', canvas.toDataURL(), '"/>'].join(''));
          var img = $('#image_input--buscar img')[0];                      
          var canvas = document.createElement('canvas');          
          $('#image_input--buscar img').Jcrop({
            boxWidth: 400,
            bgColor: 'black',
            bgOpacity: .6,
            // setSelect: [0, 0, 200, 400],
            // aspectRatio: .5,
            maxSize: [180,285],
            onChange: imgSelect,
            onSelect: updateCoords
          });

          function updateCoords(c){
            $('#x').val(c.x);
            $('#y').val(c.y);
            $('#w').val(c.w);
            $('#h').val(c.h);
          };
                
          function imgSelect(selection) {
            canvas.width = 180;
            canvas.height = 285;
            var ctx = canvas.getContext('2d');
            ctx.drawImage(img, selection.x, selection.y, selection.w, selection.h, 0, 0, canvas.width, canvas.height);
            $('#image_output--buscar').attr('src', canvas.toDataURL());
            $('#cropbutton--buscar').css('display', 'block');
          }

          $('#modal-wrapper--buscar').toggleClass('open');
        } else {    
          $('.img_foto-busca').attr('src', URL.createObjectURL(e.target.files[0]));
        }
      }
      image.src = event.target.result;
    }
    reader.readAsDataURL(e.target.files[0]);
    
});

$('#buscatratamento').change(function handleImage(e){
    $('.upload-img--atencao').remove();
    var nome_img = $(this).val();
    nome_img = nome_img.split('\\').pop();
    $('#busca').siblings().val(nome_img);
    // console.log('IMG RECEBIDA '+$('#busca').val());
    var reader = new FileReader();

    reader.onload = function(event){        
      var image = new Image();               
      image.onload = function(){
        console.log(image.width);
        if(image.width > 320) {
          var canvas = document.createElement('canvas');
          canvas.width = image.width;
          canvas.height = image.height;         
          var ctx = canvas.getContext('2d');
          ctx.drawImage( image, 0, 0, canvas.width, canvas.height );        
          $('#image_input--buscar').html(['<img src="', canvas.toDataURL(), '"/>'].join(''));
          var img = $('#image_input--buscar img')[0];                      
          var canvas = document.createElement('canvas');          
          $('#image_input--buscar img').Jcrop({
            boxWidth: 400,
            bgColor: 'black',
            bgOpacity: .6,
            // setSelect: [0, 0, 200, 400],
            // aspectRatio: .5,
            maxSize: [320,180],
            onChange: imgSelect,
            onSelect: updateCoords
          });

          function updateCoords(c){
            $('#x').val(c.x);
            $('#y').val(c.y);
            $('#w').val(c.w);
            $('#h').val(c.h);
          };
                
          function imgSelect(selection) {
            canvas.width = 320;
            canvas.height = 180;
            var ctx = canvas.getContext('2d');
            ctx.drawImage(img, selection.x, selection.y, selection.w, selection.h, 0, 0, canvas.width, canvas.height);
            $('#image_output--buscar').attr('src', canvas.toDataURL());
            $('#cropbutton--buscar').css('display', 'block');
          }

          $('#modal-wrapper--buscar').toggleClass('open');
        } else {    
          $('.img_foto-busca').attr('src', URL.createObjectURL(e.target.files[0]));
        }
      }
      image.src = event.target.result;
    }
    reader.readAsDataURL(e.target.files[0]);
    
});

$('#buscatratamento_int').change(function handleImage(e){
    $('.upload-img--atencao_int').remove();
    var nome_img = $(this).val();
    nome_img = nome_img.split('\\').pop();
    $('#busca').siblings().val(nome_img);
    // console.log('IMG RECEBIDA '+$('#busca').val());
    var reader = new FileReader();

    reader.onload = function(event){        
      var image = new Image();               
      image.onload = function(){
        console.log(image.width);
        if(image.width > 780 || image.width < 780) {
          var canvas = document.createElement('canvas');
          canvas.width = image.width;
          canvas.height = image.height;         
          var ctx = canvas.getContext('2d');
          ctx.drawImage( image, 0, 0, canvas.width, canvas.height );        
          $('#image_input--buscar').html(['<img src="', canvas.toDataURL(), '"/>'].join(''));
          var img = $('#image_input--buscar img')[0];                      
          var canvas = document.createElement('canvas');          
          $('#image_input--buscar img').Jcrop({
            boxWidth: 780,
            bgColor: 'black',
            bgOpacity: .6,
            // setSelect: [0, 0, 200, 400],
            // aspectRatio: .5,
            maxSize: [780,400],
            onChange: imgSelect,
            onSelect: updateCoords
          });

          function updateCoords(c){
            $('#x').val(c.x);
            $('#y').val(c.y);
            $('#w').val(c.w);
            $('#h').val(c.h);
          };
                
          function imgSelect(selection) {
            canvas.width = 780;
            canvas.height = 400;
            var ctx = canvas.getContext('2d');
            ctx.drawImage(img, selection.x, selection.y, selection.w, selection.h, 0, 0, canvas.width, canvas.height);
            $('#image_output--buscar').attr('src', canvas.toDataURL());
            $('#cropbutton--buscar').css('display', 'block');
          }

          $('#modal-wrapper--buscar').toggleClass('open');
        } else {    
          $('.img_foto-busca_int').attr('src', URL.createObjectURL(e.target.files[0]));
        }
      }
      image.src = event.target.result;
    }
    reader.readAsDataURL(e.target.files[0]);
    
});

$('.trigger--buscar').click(function() {
  $('#modal-wrapper--buscar').toggleClass('open');
  return false;
});

$('#cropbutton--buscar').click(function(){
  var img_src = $('#image_output--buscar').attr('src');
  // $('.img_foto-busca').attr('src', img_src);
  var link = document.createElement('a');
  link.href = img_src;
  var r = Math.random().toString(36).substring(7);
  link.download = r;
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
  $('#busca').val('');
  $('.upload-img--atencao').append('<p class="atencao">Selecione a imagem que você editou</p>')
  $('#modal-wrapper--buscar').toggleClass('open');
});


$('#principal').change(function handleImage(e){
    $('.upload-img--atencao').remove();
    var nome_img = $(this).val();
    nome_img = nome_img.split('\\').pop();
    $('#principal').siblings().val(nome_img);
    
    var reader = new FileReader();
    reader.onload = function(event){        
      var image = new Image();               
      image.onload = function(){
        console.log(image.width);
        if(image.width > 480) {
          var canvas = document.createElement('canvas');
          canvas.width = image.width;
          canvas.height = image.height;         
          var ctx = canvas.getContext('2d');
          ctx.drawImage( image, 0, 0, canvas.width, canvas.height );        
          $('#image_input--principal').html(['<img src="', canvas.toDataURL(), '"/>'].join(''));
          var img = $('#image_input--principal img')[0];                      
          var canvas = document.createElement('canvas');          
          $('#image_input--principal img').Jcrop({
            boxWidth: 500,
            bgColor: 'black',
            bgOpacity: .6,
            // setSelect: [0, 0, 200, 400],
            // aspectRatio: .5,
            maxSize: [480,573],
            onChange: imgSelect,
            onSelect: updateCoords
          });

          function updateCoords(c){
            $('#x').val(c.x);
            $('#y').val(c.y);
            $('#w').val(c.w);
            $('#h').val(c.h);
          };
                
          function imgSelect(selection) {
            canvas.width = 480;
            canvas.height = 573;
            var ctx = canvas.getContext('2d');
            ctx.drawImage(img, selection.x, selection.y, selection.w, selection.h, 0, 0, canvas.width, canvas.height);
            $('#image_output--principal').attr('src', canvas.toDataURL());
            $('#cropbutton--principal').css('display', 'block');
          }

          $('#modal-wrapper--principal').toggleClass('open');
        } 
      }
      image.src = event.target.result;
    }
    reader.readAsDataURL(e.target.files[0]);
    
});

$('.trigger--principal').click(function() {
  $('#modal-wrapper--principal').toggleClass('open');
  return false;
});

$('#cropbutton--principal').click(function(){
  var img_src = $('#image_output--principal').attr('src');
  var link = document.createElement('a');
  link.href = img_src;
  var r = Math.random().toString(36).substring(7);
  link.download = r;
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
  $('#principal').val('');
  $('.upload-img--atencao').append('<p class="atencao">Selecione a imagem que você editou</p>')
  $('#modal-wrapper--principal').toggleClass('open');
});
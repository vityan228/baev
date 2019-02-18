
dialog = $( "#dialog-form" ).dialog({ // задание  диалогового окна
  autoOpen: false,
  height: 400,
  width: 350,
  modal: true,
  buttons: {

    Отмена: function() {
      dialog.dialog( "close" );
    }
  },
  close: function() {
    form[ 0 ].reset();
    allFields.removeClass( "ui-state-error" );
  }
});

$( function() {
  var dialog, form,

  name = $( "#name" ),
  password = $( "#password" ),
  allFields = $( [] ).add( name ).add( password ),
  tips = $( ".validateTips" );

  function updateTips( t ) {
    tips
    .text( t )
    .addClass( "ui-state-highlight" );
    setTimeout(function() {
      tips.removeClass( "ui-state-highlight", 1500 );
    }, 500 );
  }

  function addUser() {

    $( "#users tbody" ).append( "<tr>" +
      "<td>" + name.val() + "</td>" +
      "<td>" + password.val() + "</td>" +
      "</tr>" );
    dialog.dialog( "close" );
  }

  dialog = $( "#dialog-form" ).dialog({
    autoOpen: false,
    height: 400,
    width: 350,
    modal: true,
    buttons: {


      Отмена: function() {
        dialog.dialog( "close" );
      }
    },
    close: function() {
      form[ 0 ].reset();
      allFields.removeClass( "ui-state-error" );
    }
  });

  form = dialog.find( "form" ).on( "submit", function( event ) {
    event.preventDefault();
    addUser();
  });

  $( ".select-user" ).button().on( "click", function() {
    dialog.dialog( "open" );
  });
} );



$('body').on('click', '.select-user', function(e){                    // выбор 1 пользователя при изменении
  e.preventDefault();
  var id = $(this).attr("data-id");
  var id_tr = $(this).attr("data-id");
  $('#change-user').attr("data-id",id);
  console.log(id_tr);
  $('#hidden').val(id);
  $('#hidden_tr').val(id_tr);
  console.log(id);
  $.ajax({
    type:'POST',
    dataType: 'json',
    url:'ajax.php',
    data:{data_id:id,
      type:"select"},
      success: function(data) {
        $('#name').val(data.login_user);

      }
    });
});



$('body').on('click', '#change-user', function(e){        //при нажатии кнопки изменения пользователя
  e.preventDefault();
  var login = $('#name').val();
  var id = $(this).attr("data-id");
  var password = $('#password').val();
  var hidden = $('#hidden').val();
  var hidden_tr = $('#hidden_tr').val();
  $(".give-child .second-colum[data-id='" + id + "']").text(login);
  $.ajax({
    type:'POST',
    url:'ajax.php',
    data: 
    {
      login:login,
      password:password,
      id:id,
      type:"change-user"
    },
    success: function() 
    {
      dialog.dialog( "close" );
    }
  });
});

$('body').on('click', '#ok-add-user', function(e) {       // при добавлении пользователя
  e.preventDefault();
  var login = $('#login').val();
  var password = $('#pass').val();
  $.ajax({
    type:'POST',
    url:'ajax.php',
    data: {login:login,pass:password,type:"add-user"},
    success: function(data) {
      //alert(data);
      $('#users').append(data);
      //$('.users').load('.users');

    }
  });
});


$('body').on('click', '.delete-user', function(e) {      // при удалении пользователя
  e.preventDefault();
  var id = $(this).attr("data-id");
  console.log(id);
  $(this).closest("tr").remove();
  $.ajax({
    type:'POST',
    url:'ajax.php',
    data:{data_id:id,type:"delete-user"},
    success: function(data) {
      console.log($(this).closest("tr"));
      
    }

  });
});


$('body').on('click', '#ok-set', function(e){         // при смене настроек 
  e.preventDefault();
  console.log("123");
  var square = $('#price_square_m').val();
  var lamp = $('#price_lamp').val();
  var chandelier = $('#price_chandelier').val();
  var tube = $('#price_tube').val();
  var corner = $('#price_corner').val();
  var glossy = $('#price_glossy').val();
  var matt = $('#price_matt').val();
  $.ajax({
    type:'POST',
    url:'ajax.php',
    data: {price_square_m:square,
      price_lamp:lamp,
      price_chandelier:chandelier,
      price_tube:tube,
      price_corner:corner,
      price_glossy:glossy,
      price_matt:matt,
      type:"calc"},
    });
});





$('body').on('click', '.delete-color', function(e) {      // при удалении цвета
  e.preventDefault();
  var color = $(this).attr("data-color");
  $(this).closest(".div-color").remove();
  $.ajax({
    type:'POST',
    url:'ajax.php',
    data:{data_color:color,type:"delete-color"},
    /*success: function(data) {
      console.log(color);

    }*/
  });
});

$('body').on('click', '.openwnd', function(){             // открытие форма при добавдниее цанта
  $('.poup').fadeIn();
});
$('body').on('click', '.poup.close', function(){         // закрытие 
  $('.poup').fadeOut();
});

$('body').on('click', '.submit-color', function(e){         // кнопка добавление цвета
  e.preventDefault();
  var color = $('.color-input').val();
  console.log(color);
  $.ajax({
    type:'POST',
    url:'ajax.php',
    data:{color:color,type:"add-color"},
    success: function(data) {
      $('.colors').append(data);
      console.log(data);
      //$('.colors').append(color+ '<i class="fas fa-times delete-color" data-color=""></i>' );
      $('.poup').fadeOut();

    }

  });
});

$('body').on('click', '.delete-application', function(e){         // кпри нажатии удалении заявки
  e.preventDefault();
  var id = $(this).attr("data-id");
  console.log(id);
  $(this).closest("tr").remove();
  $.ajax({
    type:'POST',
    url:'ajax.php',
    data:{data_id:id,type:"delete-application"},
  });
});


$('body').on('click', '.submit-auth', function(e){                    // выбор 1 пользователя при изменении
  e.preventDefault();
  var login = $('#login_auth').val();
  var password = $('#pass_auth').val();
  $.ajax({
    type:'POST',
    url:'ajax.php',
    data:{login:login,password:password,
      type:"check-auth"},
      success: function(data) {
        //console.log(data);
        window.location.href='admin.php';

      }
    });
});







function calculate() {                            // функция для заявки
  var city =  $( "#city-application option:selected" ).text();
  var birthday = $('#datepick').val();
  var user_phone = $('#user-phone').val();
  var currentdate = new Date(); 
  var square = $('#input-square').val();
  var light = $('#input-light').val();
  var chandelier = $('#input-chand').val(); 
  var tube = $('#input-trub').val(); 
  var corner = $('#input-corner').val(); 
  var fact = $("input[name='input-facture']:checked").val(); 
  var text = "";

  if (square!=0) {
    text = text + "Площадь потолка: " + square + "  кв.м."+"<br>"  ;
  } 
  if (light!=0) {
    text = text + "Светильников: " + light + "  шт."+"<br>"  ;
  } 
  if (chandelier!=0) {
    text = text + "Люстр: " + chandelier + "  шт." +"<br>" ;
  } 
  if (tube!=0) {
    text = text + "Труб: " + tube + "  шт."+"<br>"  ;
  } 
  if (corner!=0) {
    text = text + "Углов: " + corner + "  шт."+"<br>"  ;
  } 
  if (fact!=0) {
    text = text + "Фактура: " + fact +"<br>";
  } 

  text = text + "Итоговая цена :" + $('#FullPrice').text() + " рублей";
  var date = Date();
  + currentdate.getFullYear() + "-"
  + (currentdate.getMonth()+1)  + "-" 
  + currentdate.getDate() + " "
  + currentdate.getHours() + ":"  
  + currentdate.getMinutes() + ":" 
  + currentdate.getSeconds();
  console.log(date);


  $(this).closest('form').find("input").val("");


  
  $.ajax({
    type:'POST',
    url:'ajax.php',
    data: {
      city:city,
      birthday:birthday,
      user_phone:user_phone,
      date:date,
      text:text,
      type:"push-application"},
      success: function(data) {
       $('#FullPrice').text(data);
       console.log(data);

       
     }
   });
} 

  function price(){                           // функция для расччета итоговой стоимости
    var square = $('#input-square').val();
    var light = $('#input-light').val();
    var chandelier = $('#input-chand').val(); 
    var tube = $('#input-trub').val(); 
    var corner = $('#input-corner').val(); 
    var fact = $("input[name='input-facture']:checked").val(); 

    $.ajax({
      type:'POST',
      url:'ajax.php',
      data: {input_square:square,
        input_light:light,
        input_light1:chandelier,
        input_trub:tube,
        input_corner:corner,
        input_facture:fact, 
        
        type:"price-application"},
        success: function(data) {
         $('#FullPrice').text(data);


       }
     });
  }



  $("input[name='input-facture']").change(function(){
  //console.log("123");
  price();
});

  $('.focus').keyup(function(){
    price();
  })


/*$('.focus').focus(function(e){ // появление цены при ухода фокуса из инпутов
  $('.focus').keydown(function() || $('input[name="input-facture"]').change(function() {
 e.preventDefault();
 price();

});
});*/

$('body').on('click', '#push-application', function(e){ // отправка в базу заявки при нажатии кнопки
  //  e.preventDefault();
  calculate();
  $('.focus').val("0");
  $('.dat-tel').val("");

  //console.log('#input-square.val()');
  //$('#client-form').reset();
});






$(document).ready(function() { 
  $('select').niceSelect();
});

$('body').on('click', '.bot-menu h3', function(){        //открытие и закрытие нижнего меню при маленьких экранах
  if($(window).width() < 768) {
    $(this).next().slideToggle("slow");
    $(this).next().toggleClass("hidden");
    $(this).toggleClass("arrt");
  }
});


function validate(evt) {                          //Валидация на ввод только цифр в инпут
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }

}


$("input[name='phone']").mask("+7 (999) 999-99-99");




$(function() {
  $('#datepick').datepicker({dateFormat:'dd.mm.yy'});
});




$(".mobile-menu").on('click', function(event) {    //открытие и закрытие верхнего меню
  $(this).toggleClass('active');
  $(".mobile-menu-content").slideToggle(300);
});



$(".application").on('click', function(event) {   //при нажатии на кнопку оставить заявку запускается скрипт
  event.preventDefault();

    var phone = $(this).closest('form').find("input[name='phone']"), //значение из намбер берется
    phone_value = $(phone).val();

    if(phone_value == "") {     //если поле пустое присвоить ему класс ерорр инпут
      $(phone).addClass('error_input');
      return;
    }


    if (!$('#checkbox').is(':checked')){  // если галочка снята вывести банер чтобы согласиться
      alert('Согласитесь на обработку персональных данных')
    }
    else  {

    if(phone_value.length != 18) {  // проверить длину введенного номера на 18 символов
      $('phone').addClass('error_input');
      return;
    }
    
    $(name).val('');
    

    $.ajax({
      url: 'task.php',    //аякс запрос 
      data: {
        phone: phone_value
      },
      success: function(){   // если все проверки пройдены показать окно
        $('.popup,.popup_overlay').fadeIn(400);

      }

    });


    $('.closer,.popup_overlay').click(function() {  //закрытие всплывшего окна нажатием на клозер
      $('.popup,.popup_overlay').fadeOut(400); 
    });
  };
});






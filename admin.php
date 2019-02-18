<?
session_start();

//$_SERVER["DOCUMENT_ROOT"]."/assets/class/handler.php";
require_once($_SERVER["DOCUMENT_ROOT"]."/assets/class/handler.php");
$listUsers = User::SelectAllUsers();
$listSettings = Calculator::selectSettings();
//$list = User::selectUser($id);
print_r($list);
$allColor1=Calculator::showAllColor();
Calculator::deleteColor($color);
$allApplications = Application::selectAllApplications();
//User::checkAuth();
if ($_SESSION['authorized'] != 1) {
  header("Location: auth.php");
  exit;
}


?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Юкон</title>


  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/nice-select.css">
  <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
  <link rel="stylesheet" href="assets/css/reset.css">
  <link href="assets/css/style.css" rel="stylesheet">



  <link href="assets/css/adaptive.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&amp;subset=cyrillic" rel="stylesheet"> 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

  <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">



</head>
<body>
  <header>
    <div class="container" >
      <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-4  with-white">  
          <div class="mob-content"> 
            <div class="mobile-menu d-md-none ">
              <span class="top"></span>
              <span class="middle"></span>
              <span class="bottom"></span>
            </div>
            <div class="mobile-menu-content" >
              <ul class="mobile-navigation">
                <li><a  href="#">О нас</a></li>
                <li><a href="#">Каталог</a></li>
                <li><a href="#">Услуги</a></li>
                <li><a href="#">Цены</a></li>
                <li><a href="#">Конструкции</a></li>
                <li><a href="#">Акции</a></li>
                <li><a href="#">Наши работы</a></li>
                <li><a href="#">Контакты</a></li>
              </ul>
              <div class="gorod-menu-rostov">
                <address class="address-menu">
                 Ростов-на-Дону, Шаумяна, 73  
               </address><br>
               <a href="tel:+78632298182">
                +7 (863) 229-81-82 
              </a>
            </div>
            <br>
            <div class="gorod-menu-volgodonsk">
              <address class="address-menu">
               г. Волгодонск, ул. Энтузиастов, 13
             </address>
             <br>
             <a href="tel:+78632298182">
              +7 (8639) 24-79-79
            </a>
          </div>
        </div>  

        <a href="#">
          <img src="assets/img/logo.png" alt="">
        </a>
      </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-5  d-none d-md-block top-fields">
      <address class="top-gorod"><i class="fas fa-map-marker-alt marker"></i>
        г. Ростов-на-Дону, Шаумяна, 73
        <br>
        г. Волгодонск, ул. Энтузиастов, 13
      </address>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-3 d-none d-md-block top-fields">
      <span class="phone-info"> <i class="fas fa-phone fad2"></i>
        <a href="tel:+78632298182">
          +7 (863) 229-81-82
        </a>
        <br>
        <a href="tel:+78632298182">
          +7 (8639) 24-79-79
        </a>
      </span>
    </div>
    <div class="col-xl-3 col-lg-3 d-none d-md-block top-fields">
      <a href="#" class="calc-top">
        <i class="fas fa-calculator"></i> 
        Калькулятор онлайн
      </a>
    </div>        
  </div> 
</div>

</header>
<hr style="margin-top: 0;border: 1px solid #005FA3;">



<div class="wrapper">
  <div class="container">
    <div class="row">
      <div id="dialog-form" title="Редактирование профиля">
        <p class="validateTips">Если не хотите менять пароль - оставьте поле без изменений</p>

        <form>
          <fieldset>
            <label for="name">Логин</label>
            <input type="text" name="name" id="name" value="<?=$list['id_user']['login_user']?>" class="text ui-widget-content ui-corner-all">

            <input type="hidden" id="hidden">
            <input type="hidden" id="hidden_tr">

            <label for="password">Пароль</label>
            <input type="password" name="password" id="password" value="" class="text ui-widget-content ui-corner-all">
            <button id="change-user">Редактировать</button>

          </fieldset>
        </form>
      </div>
      <div class="users">
        <div class="name">
          <h2>Пользователи</h2>
        </div>

        


        <div id="users-contain" class="ui-widget">

          <table id="users" class="ui-widget ui-widget-content">
            <thead>
              <tr class="title-table ui-widget-header ">
                <td class="first-colum">ID</td>
                <td>Логин пользователя</td>
                <td>Действия</td>
              </tr>
            </thead>
            <tbody>
              <?

              foreach ($listUsers as $value){

                echo'<tr class="give-child ">';
                echo '<td class="first-colum" data-id ="'.$value['id_user'].'">'.$value['id_user'].'</td>';
                echo '<td class="second-colum" data-id ="'.$value['id_user'].'">'.$value['login_user'].'</td>';
                echo '<td class="third-colum"><i class="fas fa-edit select-user" data-id="'.$value['id_user'].'"></i><i class="fas fa-times delete-user" data-id = "'.$value['id_user'].'"></i></td>';
                echo '</tr>';

              }

              ?>

            </tbody>
          </table>
        </div>
        



        <div class="add-new">
          <form method="Post">
            <span class="head">Добавление нового пользователя</span>
            <div class="log">
              <span class="log-pass">Логин:</span>  
              <input type="text" name="login" id="login" placeholder="Логин пользователя"> 
            </div>
            <div class="pass">
              <span class="log-pass">Пароль</span>
              <input type="text" name="pass" id="pass" placeholder="Пароль пользователя" >
            </div>

            <input  type="submit" name="ok-add" id="ok-add-user" value="Добавить пользователя">
          </form>
        </div>






        <form method="POST">
          <div class="settings">
            <h2>Настройки калькулятора</h2>
            <div class="price">
              <span> Цена за кв.м. потолка:</span>
              <input type="text" id="price_square_m" value="<?=$listSettings['price_square_m']?>">
            </div>
            <div class="price">
              <span> Цена за светильник:</span>
              <input type="text" id="price_lamp" value="<?=$listSettings['price_lamp']?>">
            </div>
            <div class="price">
              <span> Цена за угол:</span>
              <input type="text" id="price_corner" value="<?=$listSettings['price_corner']?>">
            </div>
            <div class="price">
              <span> Цена за глянцевую фактуру:</span>
              <input type="text" id="price_glossy" value="<?=$listSettings['price_glossy']?>">
            </div>
            <div class="price">
              <span> Цена за люстру:</span>
              <input type="text" id="price_chandelier" value="<?=$listSettings['price_chandelier']?>">
            </div>
            <div class="price">
              <span> Цена за матовую фактуру:</span>
              <input type="text" id="price_matt" value="<?=$listSettings['price_matt']?>">
            </div>
            <div class="price">
              <span> Цена за трубу:</span>
              <input type="text" id="price_tube" value="<?=$listSettings['price_tube']?>">
            </div>
            



            <div class="setting-color">
              <div class="colors">
                Варианты цветов :


                <?php 

                foreach ($allColor1 as $value)
                {
                  ?>
                  <div class="div-color">
                   <br><?=$value;?><i class="fas fa-times delete-color" data-color='<?=$value;?>'></i>
                 </div>
                 <?php
               }

               ?>
             </div>
             <div class="poup" style="display:none;">

              <div class="close" >X</div><br><br>
              <input type="text" class="color-input" placeholder="Добавить цвет">
              <input type="submit" class="submit-color" value="Добавить">
            </div>
            <span class="span-add-color openwnd" >Добавить новый цвет <i class="fas fa-plus add-color"></i></span>
          </div>




          <div class="price-submit">

            <input class="ok-set" type="submit" id="ok-set" name="ok-settings" value="Сохранить изменения"> 
          </div>

        </div>
      </form>


      <div class="applications">
        <h2>Заявки</h2>

        <div class="table-applications">
          <table class="allApplications">
            <tr class="title-table">
              <td>ID</td>
              <td>Телефон</td>
              <td>Дата Рождения</td>
              <td>Город доставки</td>
              <td class="text-app">Текст заявки</td>
              <td>Дата заявки</td>
              <td>IP</td>
              <td>Действия</td>
            </tr>
            <?

            foreach ($allApplications as $value){
              ?>
              <tr class="give-child-second">
                <td class="first-colum-app"><?=$value['id_request'];?></td>
                <td><?=$value['phone'];?></td>
                <td ><?=$value['birthday'];?></td>
                <td ><?=$value['city'];?></td>
                <td class="text-app" ><?=$value['text'];?></td>
                <td ><?=date("H:i d.m.Y ",strtotime($value['date']));?></td>
                <td ><?=$value['ip_user'];?></td>
                <td class="delete-app" ><i class="fas fa-times delete-application" data-id = "<?=$value['id_request'];?>"></i></td>


              </tr>
              <?php 
            }

            ?>
          </table>
        </div>
      </div>
    </div> 
  </div>
</div>
<div class="сlearfix"></div>




<footer>
  <div class="container">
    <div class="row">
      <div class="col-xl-9 col-lg-9 col-md-7 bot-col"> 
        <div class="bot-menu">
          <div class="footer-menu  footer-menu-company">       
            <h3 class=" arr">Компания</h3>
            <ul> 
              <li><a href="#">О нас</a></li>
              <li><a href="#">Цены</a></li>
              <li><a href="#">Акции</a></li>
              <li><a href="#">Наши работы</a></li>
              <li><a href="#">Гаратнтии</a></li>
              <li><a href="#">Калькулятор</a></li>
            </ul>
          </div>
          <div class="footer-menu footer-menu-catalog">
            <h3>Католог потолков</h3>
            <ul>
              <li><a href="#">Глянцевые</a></li>
              <li><a href="#">Матовые</a></li>
              <li><a href="#">Сатиновые</a></li>
              <li><a href="#">С фотопечатью</a></li>
              <li><a href="#">Здвездное небо</a></li>
              <li><a href="#">Художетсвенные</a></li>
            </ul>
          </div>
          <div class="footer-menu footer-menu-service">
            <h3>Услуги</h3>
            <ul>
              <li><a href="#">Установка натяжных <br>
              потолков</a></li>
              <li><a href="#">Двухуровневые потолки</a></li>
              <li><a href="#">Потолки с подвеской</a></li>
              <li><a href="#">Ремонт потолков</a></li>
            </ul>
          </div>
          <div class="footer-menu footer-menu-design">
            <h3>Конструкия</h3>
            <ul>
              <li><a href="#">Одноуровневые</a></li>
              <li><a href="#">Двухуровневые</a></li>
              <li><a href="#">Многоуровневые</a></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-3 col-md-5">
        <div class="info-bot">
          <a class="bot-href" href="#">
            <img src="assets/img/silyet.png" class="logo-bot" alt="">
            <h2 class="foot-info-logo">Юкон</h2> 
            <h3 class="foot-info">Натяжные потолки</h3></a>
            <br>
            <div class="bot-address">
              <address>
                г. Ростов-на-Дону, Шаумяна, 73
              </address>
              <a href="tel:+78632298182">+7 (863) 229-81-82</a>
            </div>
            <div class="bot-address">
              <address>
                г. Волгодонск, ул. Энтузиастов, 13
              </address>
              <a href="tel:+78632298182">
                +7 (8639) 24-79-79
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <hr class="hr2">

    <div class="container">
      <div class="row">
        <div class="foot1 col-lg-8 col-md-7 col-sm-6 col-6">
          ООО "ИТ-Групп"
        </div>
        <div class="foot2 col-lg-4 col-md-5 col-sm-6 col-6">
          <a href="#">
            Создание сайта - ЕВРОСАЙТЫ
          </a>
        </div>
      </div>
    </div>     
  </footer>


  <div class="popup_overlay"></div>
  <div class="popup">
    <div class="popup_title">
      <h2>Спасибо заявку</h2>
      <span class="closer">
        X
      </span>
    </div>
    <div class="popup_content">
     <h5>Спасибо за вашу заявку. Наш менеджер свяжется с вами в ближайшее время.</h5>
   </div>
 </div>













 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 <script src="assets/js/jquery.nice-select.min.js"></script>
 <script src="assets/js/jquery.maskedinput.min.js"></script>
 <script src="assets/js/jquery-ui.min.js"></script>
 <script src="assets/js/jquery.validate.min.js"></script>
 <script src="assets/js/bootstrap.min.js"></script>
 <script src="assets/js/scripts.js"></script>
</body>
</html>

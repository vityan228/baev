<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/assets/class/handler.php");
$Price = Application::setFullPrice($square,$lamp,$chandelier,$tube,$corner,$fact);
print_r ($fullPrice);

$allColor1=Calculator::showAllColor();





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
      
                                

    <nav  class= "navbar navbar-inverse d-none d-md-block">
      <div class="container">
        <div class="row">
          <div class="col-12 "> 
            <ul class="nav nav-pills">
              <li><a href="#"><span>О нас</span></a></li>
              <li><a href="#"><span>Каталог</span></a></li>
              <li><a href="#"><span>Услуги</span></a></li>
              <li><a href="#"><span>Цены</span></a></li>
              <li><a href="#"><span>Конструкции</span></a></li>
              <li><a href="#"><span>Акции</span></a></li>
              <li><a href="#"><span>Наши работы</span></a></li>
              <li><a href="#"><span>Контакты</span></a></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>





    <div class="wrapper">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-lg-4 give-blue order-2 order-lg-1  main-left-app">
            <div class="result">
              <h2 class="result-cost">
                Итоговая цена: 
              </h2>
            </div>
            <div class="cost">
              <h2 class="result-cost">
               <span id="FullPrice"> 0 </span>  рублей
            </div>
            
              
                <div class="left-div">
                  <form id="clients-form">
                  <div class="field"><br>
                    Город доставки:
                  </div>
                  <select class="nice-select" id="city-application" size="1">
                    <option selected value="Город не выбран">Город не выбран</option>
                    <option value="Ростов">Ростов</option>
                    <option value="Москва">Москва</option>
                    <option value="Краснодар">Краснодар</option>
                    <option value="Воронеж">Воронеж</option>
                  </select>
                  <br>
                  <br>
                  <div class="field">
                    Дата рождения:
                  </div>
                  <div class="birthdate">
                    <input class="dat-tel" selected value="Год рождения не выбран"  id="datepick"> <i class="fas fa-calculator calc2-icon"></i>
                  </div>
                  <div class="field">
                    Телефон:
                  </div>
                  <div>
                    <input  class="dat-tel " id="user-phone"  name ="phone" type="tel">
                  </div>
                  <div>
                    <input type="button" id="push-application" class="application" value=" ОСТАВИТЬ ЗАЯВКУ ">
                  </div>
                  <div class="field soglas">
                    <input type="checkbox" class="checkbox" checked="checked" id="checkbox" /><label for="checkbox">Я согласен на <a href="#"> обработку персональных даных</a></label>
                  </div>
                
                </div>  
          </div>

    
          <div class="col-xl-8 col-lg-8 order-1 order-lg-2 main-right" >
            <h1 class="text-center wrapper-top" ><i class="fas fa-calculator"></i>  Калькулятор расчета стоимости</h1>
              <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-8 col-7 main-right-characteristic">
                  
                    <h4 class="upper">Характеристики:</h4>
                    <label for="input-square"> Площадь потолка:<input maxlength="4" id="input-square" class="focus" onkeypress="validate(event)"   name="number" placeholder="0" value=""></label>
                    <span class="count">Количество</span>
                    <span class="count-input"><label for="input-light">
                      светильников:<input id="input-light" maxlength="4" class="focus" onkeypress="validate(event)"  placeholder="0" value="" ></label>
                    </span>
                    <span class="count-input"> <label for="input-chand">
                      люстр:<input id="input-chand" maxlength="4" class="focus" onkeypress="validate(event)" placeholder="0" > </label>
                    </span>
                    <span class="count-input"><label for="input-trub">
                      труб:<input id="input-trub" maxlength="4" class="focus" onkeypress="validate(event)"  placeholder="0" > </label>
                    </span>
                    <span class="count-input"><label for="input-corner">
                      углов:<input id="input-corner" maxlength="4" class="focus" onkeypress="validate(event)"  placeholder="0"> </label>
                    </span> 
                  
                </div>
                <div class="units col-lg-2 col-1 col-md-1 col-sm-2">
                  <span >кв.м.</span>
                  <br>
                  <span> шт.</span>
                  <span> шт.</span>
                  <span> шт.</span>
                  <span> шт.</span>
                </div>

                <div class="main-right-facture col-lg-4 col-md-5 col-sm-9 col-12">
                  <div class="facture">
                    <h4 class="upper">Фактура:</h4>
                    <label class="radio">
                      <input id="glyanc" type="radio" name="input-facture" class="focus-facture" value="Глянцевая" checked="" />
                      <div class="radio__text">
                        глянцевая
                      </div>
                    </label>
                    <label class="radio">
                      <input id="matov" type="radio" value="Матовая" name="input-facture" class="focus-facture" />
                      <div class="radio__text">
                        матовая
                      </div>
                    </label>
                    <br>
                  </div>
                  <div class="cvet">
                    <h4 class="upper">Цвет:</h4>


                    <?php 
             
                   


              $min_key = min(array_keys($allColor1));

             foreach ($allColor1 as $key=> $value)
             {
                
                if($key == $min_key) $checked="checked"; 
                else $checked='';
               
              echo 
              '<label class="radio 1">
                      <input type="radio" name="input-color" '.$checked.'>
                      <div class="radio__text">
                        '.$value.'
                      </div>
                    </label>';

             };


              
              ?>


                  </div>
                </div>
              </form>
              </div>
              
          </div> 
        </div>
      </div>
      <div class="сlearfix"></div>
    </div>



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
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jaini+Purva&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
         $(document).ready(function(){
            $(".btn_services").on('click', function(event){
                event.preventDefault();
                let dataId = $(this).data();
                $.post("scripts/services.php", {id: dataId},  function(data){
                    $('#services_box').html(data);
                });
            });    
        });    
    </script>
    <title>Main_string</title>
    <?php 
        require_once '../localhost/scripts/connect.php';
    ?>
</head>
<body>
    <header>
        <div class="menu">
            <div class="logo_menu">
                <h1>Autodiagnostics<h1>
            </div>
            <div class="link_menu">
                <nav>
                    <ul class="link_list_menu">
                        <li>
                            <a href="index.php">Главная страница</a>
                        </li>
                        <li>
                            <a href="goods_list.php">Каталог товаров</a>
                        </li>
                        <li>
                            <a href="bascet.php">Корзина</a>
                        </li>
                        <li>
                            <a>+79005006070</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="connect_menu">
                <nav>
                    <ul class="connect_list_menu">
                        <li>
                            <a>
                                <img src="img/Telegram.svg" alt="#">
                            </a>
                        </li>
                        <li>
                            <a>
                                <img src="img/Whatsapp.svg" alt="#">
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
        <div class="slider">
            <div class="slide_list">
                <img src="img/slide 1.svg" alt="#">
                <img src="img/slide 2.svg" alt="#">
                <img src="img/slide 3.svg" alt="#">
            </div>
            <script src="scripts/slider.js"></script>
        </div>
        <div class="info">
            <div class="txt_info">
                <p class="txt_gl">О компании</p>
                <div class="block_txt">
                    <p>Наша компания - ведущий поставщик</p> 
                    <p>автомобильных запчастей и услуг по </p>  
                    <p>ремонту и диагностике автомобилей. Мы </p>
                    <p>специализируемся на предоставлении </p>
                    <p>широкого ассортимента </p> 
                    <p>высококачественных запчастей для </p>
                    <p>различных марок автомобилей,  </p>
                    <p>обеспечивая наших клиентов надежными </p>
                    <p>решениями для технического  </p>
                    <p>обслуживания. Наша цель - обеспечить</p> 
                    <p>безопасность и надежность автомобилей </p>
                    <p>наших клиентов, обеспечивая им </p>
                    <p> спокойствие и комфорт на дорогах.</p>
                </div>
            </div>
            <div class="img_info">
                <div class="top_img_info">
                    <img src="img/Rectangle 17.svg" alt="">
                </div>
                <div class="bot_img_info">
                    <img src="img/Rectangle 18.svg" alt="">
                    <img src="img/Rectangle 19.svg" alt="">
                </div>
            </div>
        </div>
        <div class="title_services">
            Наши услуги
        </div>
        <div class="services">
            <div class="service_el">
                <img src="img/PC_services.svg" alt="" class="img_service">
                <div class="text_services">
                    Диагностика Авто
                </div>
                <button class="btn_services" data-id="1">Подробнее</button>
            </div>
            <div class="service_el">
                <img src="img/job_icon.svg" alt="" class="img_service">
                <div class="text_services">
                    Ремонт Двигателя
                </div>
                <button class="btn_services" data-id="2">Подробнее</button>
            </div>
            <div class="service_el">
                <img src="img/car_icon.svg" alt="" class="img_service">
                <div class="text_services">
                    Ремонт Подвески
                </div>
                <button class="btn_services" data-id="3">Подробнее</button>
            </div>
            <div class="service_el">
                <img src="img/wheel_icon.svg" alt="" class="img_service">
                <div class="text_services">
                    Ремонт Рулевого Управления
                </div>
                <button class="btn_services" data-id="4">Подробнее</button>
            </div>
            <div class="service_el">
                <img src="img/stop_icon.svg" alt="" class="img_service">
                <div class="text_services">
                    Ремонт Тормозной Системы
                </div>
                <button class="btn_services" data-id="5">Подробнее</button>
            </div>
            <div class="service_el">
                <img src="img/gear_icon.svg" alt="" class="img_service">
                <div class="text_services">
                    Ремонт Трансмиссии
                </div>
                <button class="btn_services" data-id="6">Подробнее</button>
            </div>
        </div>
        <div class="popup-fade">
            <div class="popup">
                <a class="popup-close" href="#">Закрыть</a>
                <h2>Диагностика авто</h2>
                <div id="services_box">
                </div>
            </div>		
        </div>
        <script>
            $(document).ready(function($) {
                $('.btn_services').click(function() {
                    $('.popup-fade').fadeIn();
                    return false;
                });	
                $('.popup-close').click(function() {
                    $(this).parents('.popup-fade').fadeOut();
                    return false;
                });		
                $(document).keydown(function(e) {
                    if (e.keyCode === 27) {
                        e.stopPropagation();
                        $('.popup-fade').fadeOut();
                    }
                });
                    $('.popup-fade').click(function(e) {
                        if ($(e.target).closest('.popup').length == 0) {
                            $(this).fadeOut();					
                        }
                });
            });      
        </script>
        <div class="title_data">
            Свяжитесь с нами!
        </div>
        <div class="data_info">
            <div class="data_contact">
            <br>
            Наш телефон: +79005006070<br>
            <br>
            Наша почта: autodiagnostics@mail.ru<br>
            <br>
            Мы в Telegram: https://web.telegram.org/<br>
            <br>
            Мы в Whatsapp: https://web.whatsapp.com/<br>
            <br>
            </div>
            <div class="data_map">
            <div style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/org/garazh/182195101707/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Гараж</a><a href="https://yandex.ru/maps/10853/vologda-oblast/category/garage_cooperative/184107575/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:14px;">Гаражный кооператив в Вологодской области</a><iframe src="https://yandex.ru/map-widget/v1/?ll=39.752850%2C59.261682&mode=poi&poi%5Bpoint%5D=39.752534%2C59.261716&poi%5Buri%5D=ymapsbm1%3A%2F%2Forg%3Foid%3D182195101707&z=17.29" width="560" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
            </div>
        </div>
    </main>
    <footer>
        <div class="end_index">
            Autodiagnostics
        </div>
    </footer>
</body>
</html>
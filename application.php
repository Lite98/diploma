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
    <title>Application</title>
</head>
<script>
    $(document).ready(function(){
        $(".add_application-btn").on("click", function(event){
            event.preventDefault();
            let nameaddapp = $('#clientname').val();
            let telephonadd = $('#telephon').val();
            let dateadd = $('#dateapplication').val();
            let servicesid = $('#servicesid').val();

            $.get("scripts/addappli.php", {id: servicesid, clientname: nameaddapp, telephon: telephonadd, dataadd: dateadd},  function(data){
                $('#result').html(data);
            });
        });
    });
</script>
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
        <?php 
        require_once '../localhost/scripts/connect.php';
            $idservices = $_GET['id'];
            $nameinput = "text";
            $nameservices = mysqli_query($link, "SELECT * FROM `services` ORDER BY `services`.`id` ASC");
            $nameservices = mysqli_fetch_all($nameservices);
            foreach($nameservices as $nameservices){
                if($idservices == $nameservices[0]){
                    $nameinput = $nameservices[1];
                }
            }
        ?>
        <div class="application">
            <div class="title_add_aplication">
                Новая заявка
            </div>
            <div class="add_aplication">
                <form method="post" action="script/addappli.php">
                    <p>Ваше имя</p>
                    <input type="text" value="" id="clientname">
                    <p>Номер телефона</p>
                    <input type="text" value="" id="telephon">
                    <p>Ваша услуга</p>
                    <input type="text" disabled value="<?=$nameinput?>">
                    <p>День:</p>
                    <input type="date" name="dateapplication" id="dateapplication">
                    <input type="hidden" id="servicesid" value="<?=$idservices?>">
                    <br>
                    <button class="add_application-btn">Отправить</button>
                </form>
            </div>
        </div>
        <div class="application_list">
            <div class="title_your_aplications">
                Ваши заявки
            </div>
            <div class="your_application" id="result">
                <?php 

                // Предполагаем, что $link - это установленное подключение к базе данных
                
                $sql = "SELECT * 
                        FROM application 
                        INNER JOIN client ON application.idclient = client.id 
                        INNER JOIN services ON application.idservices = services.id";
                
                $result = mysqli_query($link, $sql);
                // Получаем все строки результата запроса в виде ассоциативного массива
                $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    // Выводим строки данных
                    foreach ($data as $row) {
                        echo '
                        <div class="applibox">
                            <div class="date_info">
                                ' . $row['dateservices'] . '
                            </div>
                            <br>
                            <div class="list_info_app">
                                <p>' . $row['nameclient'] . '</p>
                                <br>
                                <p>' . $row['nameservices']. '</p>
                            </div>
                        </div>
                        ';
                    }
                ?>
            </div>
        </div>
    </main>
</body>
</html>
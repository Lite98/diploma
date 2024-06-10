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
    <title>Basket</title>
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
        <div class="cost_txt">
            Корзина
        </div>
        <div class="cost-list">
            <div class="cost-content">
            <?php 
                session_start();
                $bascet = unserialize($_COOKIE['bascet']);
                $i = 0;
                $prices = 0;
                if(isset($_GET['delet'])){
                    unset($bascet[$_GET['delet']]);
                    $ser = serialize($bascet);
                    setcookie('bascet', $ser, time() + 3600, 'localhost');
                    unset($_SESSION['bascet'][$_GET['delet']]);
                }
                if(!empty($bascet)){
                    foreach($bascet as $id => $count) { 
                        $cartQ = mysqli_query($link,"SELECT * FROM `products` WHERE `id` = $id");
                        $list_cartQ = mysqli_fetch_assoc($cartQ);
                        $price = $list_cartQ['price'];
                        $prices += $price*$count;
                        $i+=$count;
                        echo '
                            <div class="cost-goods">
                                <div class="cost_img">
                                    <img src="'.$list_cartQ['img'].'" alt="">
                                </div>
                                <div class="cost_description">
                                    <p>'.$list_cartQ['name'].'</p>
                                    <p>'.$count.'.Шт<p>
                                    <br>
                                    <p>'.$list_cartQ['price'].' рублей</p>
                                </div>
                                <div class="delete_cost">
                                    <a href="bascet.php?delet='.$id.'"><img src="img/delete.svg" alt=""></a>
                                </div>
                            </div>
                        ';
                        
                    }
                }
                else {
                    echo 'Здесь пока что пусто';
                }
                ?>
            </div>
            <?php
            if(!empty($bascet)) {
                echo '
            <div class="cost-order">
                <div class="add_order">
                    <p>Товаров в корзине '.$i.'</p>
                    <br>
                    <br>
                    <p>Товаров на сумму '.$prices.' рублей</p>
                    <button id="open-modal" class="btn-order">Оформит заказ</button>
                </div>
            </div>
                ';
            }
            ?>
        </div>
        <div class="modal" id="modal">
            <div class="modal-box">
                <button class="back_modal" id="back_modal-btn">Назад</button>
                <h2>Оформление заказа</h2>
                <br>
                <form action="scripts/order.php" method="post">
                    <p>Ваше имя:</p>
                    <input type="text" name="clientName">
                    <p>Номер телефона:</p>
                    <input type="text" name="telephon"><br>
                    <button type="submit" href="scripts/order.php" class="add_order_btn">Оформить заказ</button>
                </form>
            </div>
        </div> 
        <script defer src="scripts/modal.js"></script>   
    </main>
    <footer>
        <div class="end_index">
            Autodiagnostics
        </div>
    </footer>
</body>
</html>
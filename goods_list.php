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
    <title>Goods-list</title>
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
                            <a href="bascet.php?">Корзина</a>
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
        <div class="goods_book">
            <div class="txt_goods">
                Наши товары
            </div>
            <div class="goods_list">
                <?php
                session_start();
                $goods = mysqli_query($link,"SELECT * FROM `products` ORDER BY `products`.`name` ASC");
                $goods = mysqli_fetch_all($goods);
                foreach ($goods as $goods):?>
                        <div class="map_goods">
                            <div class="imgs_goods">
                                <img src=<?=$goods[2]?>>
                            </div>
                            <div class="name_goods">
                                <h4><?=$goods[1]?></h4>
                            </div>
                            <div class="number" data-step="1" data-min="1" data-max="100">
                                <button class="plus">+</button>
                                <input class="count" type="text" name="count" value="1">
                                <button class="minus">-</button>
                            </div>
                            <div class="price_goods">
                                <p>От <?=$goods[3]?> рублей</p>
                                <p class="return"></p>
                            </div>
                            <button class="btn_cost" data-id="<?=$goods[0]?>">В корзину</button>
                        </div>    
                <?php endforeach; ?>
            </div>
        </div>
        <script>
        $(document).ready(function(){
            let val = 0
            $('body').on('click', '.minus, .plus', function(){
                let $row = $(this).closest('.number');
                let $input = $row.find('.count');
                let step = $row.data('step');
                val = parseFloat($input.val());
                let result;
                if ($(this).hasClass('minus')) {
                    val -= step;
                } else {
                    val += step;
                }
                $input.val(val);
                $input.change();
                return false;
            });
            $('body').on('change', '.count', function(){
                let $input = $(this);
                let $row = $input.closest('.number');
                let step = $row.data('step');
                let min = parseInt($row.data('min'));
                let max = parseInt($row.data('max'));
                val = parseFloat($input.val());
                if (isNaN(val)) {
                    val = step;
                } else if (min && val < min) {
                    val = min;  
                } else if (max && val > max) {
                    val = max;  
                }
                $input.val(val); 
       
            });
            $(".btn_cost").on('click', function(event){
                event.preventDefault();
                let cartbox =  $(this).data();
                let goodsincart = cartbox ["id"]; 
                let count = val;
                $.get("cart.php", {id: goodsincart, count: val},  function(){});
            });
        });
    </script>
    </main>
    <footer>
        <div class="end_index">
            Autodiagnostics
        </div>
    </footer>
</body>
</html>
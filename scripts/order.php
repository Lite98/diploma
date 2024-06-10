<?php 
    require_once '../scripts/connect.php';
    session_start();
    $bascet = unserialize($_COOKIE['bascet']);

    if(empty($bascet)){
        echo 'Заказ не возможно принять! Ваша корзина пуста!';
    }
    else{ 
        if(empty($_POST['clientName'] || $_POST['telephon'])){
            echo 'Данные введены не корректно!';
        }
        else{
            $clientName = $_POST['clientName'];
            $telephon = $_POST['telephon'];
            if (!preg_match('/\+7(\d\d\d)\d\d\d\d\d\d\d$/', $telephon) || !preg_match("/^[a-zA-Zа-яёА-ЯЁ]+$/u",$clientName)) {
                echo 'Данные введены не корректно!';
            } 
            else{
                $messege ='';
                foreach($bascet as $id => $count) { 
                    $cartQ = mysqli_query($link,"SELECT * FROM `products` WHERE `id` = $id");
                    $list_cartQ = mysqli_fetch_assoc($cartQ); 
                    $messege .= $list_cartQ['name'];   
                } 
                    echo 'Заказ принят';
                    $body = "Заказ:
                    Клиент $clientName, Телефон $telephon
                    Заказано 
                    $messege
                    ";
                    $to = "work@mail.ru";
                    $subject = "Новый заказ оформлен";
                    $mail_header = "From: autodiagnostic@site.su\r\n";
                    $mail_header .= "X-Mailer: PHP/".phpversion();
                    mail($to, $subject, $body, $mail_header);
                    unset($_COOKIE['bascet']);
                    setcookie('bascet', null, -1, '/');
            }
        }
    }
?> 

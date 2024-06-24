<?php
    require_once '../scripts/connect.php';

    $clientname = $_GET['clientname'];
    $telephon = $_GET['telephon'];
    $servicesid = $_GET['id'];
    $dateadd = $_GET['dataadd'];
    $status = 1;

    $check_query = "SELECT * FROM application WHERE dateservices = '$dateadd' AND idservices = '$servicesid'";
    $check_result = mysqli_query($link, $check_query);

    if (!$check_result) {
        echo "Ошибка при выполнении запроса: " . mysqli_error($link);
        exit;
    }

    if (mysqli_num_rows($check_result) > 0) {
        echo "Ошибка: Запись с такой датой и услугой уже существует.";
    } else {
        // Создание клиента
        $createclient = "INSERT INTO client (nameclient, telephon) VALUES ('$clientname', '$telephon')";

        if (mysqli_query($link, $createclient)) {
            $clientid = mysqli_insert_id($link);

            // Создание заявки
            $createappli = "INSERT INTO application (idclient, idservices, dateservices, status) VALUES ('$clientid', '$servicesid', '$dateadd', '$status')";

            if (mysqli_query($link, $createappli)) {
                echo "Заявка успешно создана!";
            } else {
                echo "Ошибка при создании заявки: " . mysqli_error($link);
            }
        } else {
            echo "Ошибка при создании клиента: " . mysqli_error($link);
        }
    }
?>
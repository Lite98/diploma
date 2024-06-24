<?php 
    $link = mysqli_connect("localhost", "root", "", "autodatabase");
    
    $dataId = $_POST['id'];
    $services = mysqli_query($link, "SELECT * FROM `services`");
    $services = mysqli_fetch_all($services);
    foreach($services as $services){
        if ($dataId['id'] == $services[3])
        echo'
        <div class = content-box>
            <div class="name_services">'.$services[1].'</div>
            <div class="prices_services">От '.$services[2].' руб.</div>
            <button class="add_service">
                <a href="application.php?id='.$services[0].'">Записаться</a>
            </button>
        </div>
        ';
    }
?>
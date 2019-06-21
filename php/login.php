<?php
    session_start();

    require 'get.php';

    $User = $_POST['User'];
    $Pass = $_POST['Pass'];

    $get = new get();
    $result = $get->getSP("get_UsuarioxUserNamexUserPass('$User', '$Pass')");
    if(mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_assoc()){
            $arreglo[] = array(
                'IdCliente' => $row['id'],
                'Usuario' => $row['Usuario']
            );
        }
        $_SESSION['usuario'] = $arreglo;
        echo 1;
    } else {
        echo 0;
    }
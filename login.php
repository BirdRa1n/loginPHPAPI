<?php
require_once 'warningMSG.php';
header('Content-type: application/json');

if (isset($_GET['req'])) {

    if ($_GET['req'] == 'login') {
        if (empty($_GET['username'] xor empty($_GET['password']))) {
            $obj = array("warning_error" => utf8_encode($form_incomplete));
            echo json_encode($obj, JSON_UNESCAPED_SLASHES);
        } else {
            $username = $_GET['username'];
            $password = $_GET['password'];

            //verificar se o usuário existe no bando de dados;
            $sql = "SELECT * FROM Users WHERE username = '$username'";
            $result = mysqli_query($connect, $sql);
            if (mysqli_num_rows($result) > 0) {
                //verificar se a senha tá correta
                $sql = "SELECT * FROM `Users` WHERE username = '$username' AND password = '$password'";
                $result = mysqli_query($connect, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $data = mysqli_fetch_array($result);
                    $obj = array(
                        "token" => utf8_encode($data['token']),
                        "loginState" => utf8_encode($login_sucess)
                    );
                    echo json_encode($obj, JSON_UNESCAPED_SLASHES);

                }else{
                    $obj = array("warning_error" => utf8_encode($incorrect_password));
                    echo json_encode($obj, JSON_UNESCAPED_SLASHES);
                }
            } else {
                $obj = array("warning_error" => utf8_encode($user_does_not_exist));
                echo json_encode($obj, JSON_UNESCAPED_SLASHES);
            }
        }
    }
}

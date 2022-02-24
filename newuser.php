<?php
require_once 'warningMSG.php';
header('Content-type: application/json');

if (isset($_GET['req'])) {
  if ($_GET['req'] == 'newuser') {
    if(isset($_GET['name']) & isset($_GET['username']) & isset($_GET['email']) & isset($_GET['password'])){
      if (empty($_GET['name']) xor empty($_GET['username']) xor empty($_GET['email']) xor empty($_GET['password'])) {
        $obj = array("warning_error" => utf8_encode($form_incomplete));
        echo json_encode($obj, JSON_UNESCAPED_SLASHES);
      } else {
        $name = $_GET['name'];
        $username = $_GET['username'];
        $email = $_GET['email'];
        $password = $_GET['password'];
        $arduinoid = rand() . "\n";
        $folder = "./Homes/$arduinoid";
        mkdir($folder);

        //checkando se existe um usuário existente no banco de dados
        $sql_check_isset_user = "SELECT * FROM Users WHERE username = '$username'";
        $result = mysqli_query($connect, $sql_check_isset_user);

        if (mysqli_num_rows($result) > 0) {
          $obj = array("warning_error" => utf8_encode($user_exist));
          echo json_encode($obj, JSON_UNESCAPED_SLASHES);
        } else {

          //criando uma nova conta
          $obj = array("warning_error" => utf8_encode($account_created));
          echo json_encode($obj, JSON_UNESCAPED_SLASHES);
          $code_generate = rand() . "\n";
          $create_value = "$username $code_generate $email";
          $cripto = hash('sha256', $encodingo_gen);
          $sql_create_user = "INSERT INTO `Users` (`id`, `username`, `name`, `email`, `password`, `arduinoid`, `token`) VALUES (NULL, '$username', '$name', '$email', '$password', '$arduinoid', '$cripto')";
          $result_create_user = mysqli_query($connect, $sql_create_user);
          $data_create_user = mysqli_fetch_assoc($result_create_user);
        }
      }

    }else{
      $obj = array("warning_error" => utf8_encode($form_incomplete));
        echo json_encode($obj, JSON_UNESCAPED_SLASHES);
    }
  }
} else {
  $obj = array("warning_error" => utf8_encode($form_incomplete));
  echo json_encode($obj, JSON_UNESCAPED_SLASHES);
}

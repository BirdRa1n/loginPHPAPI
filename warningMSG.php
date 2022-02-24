<?php
$option = 'en';
$language = $option;

if($language == 'pt-br'){
    $login_sucess = 'Login efetuado';
    $incorrect_password = 'Senha incorreta';
    $incorrect_username = 'Usuário incorreto';
    $user_exist = 'Usuário já existe';
    $user_does_not_exist = 'Usuário não existe';
    $form_incomplete = 'A requisição está incompleta';
    $form_integrity_ok = 'O formulário enviado não contém erro';
    $account_created = 'Conta criada';
}
if($language == 'en'){
    $incorrect_password = 'Incorrect password';
    $incorrect_username = 'wrong user';
    $user_exist = 'User already exists';
    $user_does_not_exist = 'User does not exist';
    $form_incomplete = 'The request is incomplete';
    $form_integrity_ok = 'The submitted form does not contain an error';
    $account_created = 'Account created';
    $login_sucess = 'Login done';
}
?>

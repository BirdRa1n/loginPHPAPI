<?php

$servername = "localhost:3306";
$username = "root";
$password = "root";
$db_name = "bd_name";

$connect = mysqli_connect($servername, $username, $password, $db_name);


if(mysqli_connect_error()):
	echo "falha na conexão: ".mysqli_connect_error();

endif;
?>

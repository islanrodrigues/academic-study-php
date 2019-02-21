<?php

include "connection.php"; // faz a inclusão de arquivos externos

    $user = $_POST['txtUser'];
    $password = md5($_POST['pwdSenha']);

    $sqlLogin = "SELECT * FROM users WHERE username LIKE '$user' AND password LIKE '$password'";
    $rsLogin = mysqli_query($connection, $sqlLogin) or die(mysqli_error($connection));
    
    if (mysqli_num_rows($rsLogin) > 0) {
        echo "OK";
    } else {
        echo "USUÁRIO OU SENHA INVÁLIDA";
    }
    
?>


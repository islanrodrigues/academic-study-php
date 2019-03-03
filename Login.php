<?php

require_once 'model/Usuarios.php';
require_once 'dao/UsuariosDAO.php';
session_start();

$username = $_POST['txtUser'];
$password = md5($_POST['pwdSenha']);

$objBD = new UsuariosDAO();
$objUser = new Usuarios();

$objUser = $objBD->validarUser($username, $password);

if ($objUser == null) {
    $_SESSION['statusLogin'] = 0;
    echo "<script> alert('Dados Inválidos') </script>";
    echo "<script> location.href = 'index.html' </script>";

} else {
    $_SESSION['user'] = $objUser->getUsername();    
    $_SESSION['password'] = $objUser->getPassword();    
    $_SESSION['permission'] = $objUser->getPermission();    
    $_SESSION['statusLogin'] = 1;    
    
     echo "<script> location.href = 'home.php' </script>";
}
    
?>


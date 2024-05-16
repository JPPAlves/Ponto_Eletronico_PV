<?php

if(!isset($_SESSION)) {
    session_start();
}
session_destroy();
header("Location:/Projeto/PontoEletronicoPV/includes/php/login/login.php");
?>
<?php
// Incluir o arquivo proteção.php
include(__DIR__ . '/../ValidasSessao/protect.php');

if(!isset($_SESSION)) {
    session_start();
}
session_destroy();
header("Location:/Projeto/PontoEletronicoPV/includes/php/login/login.php");
?>
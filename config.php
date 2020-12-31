<?php
$conexao = new mysqli("localhost", "root", "", "politicos");

if (mysqli_connect_errno()) {
    die(mysqli_connect_error());
    exit();
}

?>
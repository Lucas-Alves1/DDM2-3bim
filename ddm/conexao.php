<?php
    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "biblioteca";

    $conexao = new MySQLi("$host","$usuario","$senha","$banco");

    if($conexao->connect_error){
        echo "conexao_erro";
    }
    else{
     //echo "conexao_ok";
    }
?>
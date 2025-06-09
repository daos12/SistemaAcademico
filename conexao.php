<?php
    $conexao = mysqli_connect(
    "localhost","root","","sistemaAcademico");
    
    if(!$conexao){
        die("Erro banco de dados!");
    }
    mysqli_set_charset($conexao,"utf8");
?>
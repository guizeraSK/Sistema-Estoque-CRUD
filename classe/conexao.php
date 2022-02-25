<?php
    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "estoque";
    $mysqli= mysqli_connect($host, $usuario, $senha, $dbname);
    if(!$mysqli) {
        die("Deu guru: ". mysqli_connect_error());   
    }
?>
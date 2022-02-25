<?php 
//Encerrando sessão
    session_start();
    session_unset();
    session_destroy();
    echo "<script>
        location.href='index.php?p=inicial';
        </script>";
?>
<?php  
//Deletando cadastros
    include("classe/conexao.php");

    $usu_id = $_GET['dados'];

    $sql_code = "DELETE FROM dados WHERE id = '$usu_id'";
    $sql_query = $mysqli->query($sql_code) or die ($mysqli->error);

    if($sql_query)
        echo "<script>
        location.href='index.php?p=it_cadastrados';
        </script>";
    else
        echo "<script>
         alert('Não foi possível deletar o usuário');
         location.href='index.php?p=it_cadastrados';
        </script>";
    

?>

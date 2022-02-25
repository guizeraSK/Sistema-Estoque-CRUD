<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="assets/estilo.css">
<title>Controle de Cadastro</title>
</head>
<body>
    <div class=principal>
        <?php  
        //Usei o index para redirecionar o usuário entre as páginas.
            if(isset($_GET['p'])){
                $pagina = $_GET['p'].".php";

                if(is_file("conteudo/$pagina"))
                    include("conteudo/$pagina");
                else
                    include("conteudo/404.php");
            } else
                include("conteudo/inicial.php");
        ?>
    </div>
</body>
</html>
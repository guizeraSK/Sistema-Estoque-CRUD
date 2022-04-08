<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="assets/estilo.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon_io/favicon-16x16.png">
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
<?php 
include("classe/conexao.php");

if(isset($_POST['confirmar'])){
//Iniciando uma sessão
        if(!isset($_SESSION))
            session_start();

        foreach($_POST as $chave=>$valor)
            $_SESSION[$chave]=$mysqli->real_escape_string($valor);

        //Fazendo uma verificação se estes campos serão preenchidos conforme o pedido.
        if(strlen($_SESSION['nome']) == 0)
            $erro[] =  "Preencha o campo Marca.";
        if(strlen($_SESSION['login']) == 0)
            $erro[] =  "Preencha o campo Modelo.";
        if(strlen($_SESSION['senha']) == 0)
            $erro[] =  "Preencha o campo Fornecedor.";
        
       //Realizando a inserção dos dados do cadastro.
        if(count($erro) == 0){

            $senha = md5($_SESSION['senha']);

        
        $sql = "INSERT INTO usuarios (
            nome, 
            login, 
            senha) 
            VALUES (
            '$_SESSION[nome]',
            '$_SESSION[login]',
            '$senha'
            )";

            $confima = $mysqli->query($sql) or die ($mysqli->$error);

            if($confima){
                unset($_SESSION['nome'],
                $_SESSION['login'],
                $_SESSION['senha']);

                echo "<script> location.href='index.php?p=inicial'; </script>";
            } else
                $erro[] = $confima;
        }

    }

?>


<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="assets/css">
        <script src="https://kit.fontawesome.com/0844b1c776.js" crossorigin="anonymous"></script>
        <title>Cadastro de Usuário</title>
    </head>
    <body>
    <a href="index.php?p=inicial"><button><i class="fas fa-door-open"></i>Voltar</button></a>
    <!-- Formulário para cadastrar usuários -->
        <form action="index.php?p=cadastro_usu" method="POST">
            <fieldset>
                <legend>Cadastro de Usuário</legend>
                <label>Nome: <input type="text" name="nome"></label>
                <label>Login: <input type="text" name="login"></label>
                <label>Senha: <input type="password" name="senha"></label><br>
                <button type="submit" name="confirmar">Cadastrar</button>
            </fieldset>
        </form>
    </body>
</html>
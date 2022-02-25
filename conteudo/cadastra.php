<?php
include("classe/conexao.php");

if(isset($_POST['confirmar'])){
//Iniciando uma sessão
        if(!isset($_SESSION))
            session_start();

        foreach($_POST as $chave=>$valor)
            $_SESSION[$chave]=$valor;

        //Fazendo uma verificação se estes campos serão preenchidos conforme o pedido.
        if(strlen($_SESSION['marca']) == 0)
            $erro[] =  "Preencha o campo Marca.";
        if(strlen($_SESSION['modelo']) == 0)
            $erro[] =  "Preencha o campo Modelo.";
        if(strlen($_SESSION['fornecedor']) == 0)
            $erro[] =  "Preencha o campo Fornecedor.";
        if(strlen($_SESSION['telefone']) == 0)
            $erro[] =  "Preencha o campo Telefone.";
        if(substr_count($_SESSION['email'], '@') != 1 || substr_count($_SESSION['email'], '.') < 1 || substr_count($_SESSION['email'], '.') > 2)
            $erro[] = "Preencha o E-mail corretamente.";


       //Realizando a inserção dos dados do cadastro.
        if(count($erro) == 0){
            $mysqli = mysqli_connect($host, $usuario, $senha, $dbname);
        mysqli_select_db($mysqli, '$dbname');
        $sql = "INSERT INTO dados (
            marca, 
            modelo, 
            cor, 
            preco, 
            datafabricacao, 
            datacadastro, 
            fornecedor, 
            telefone, 
            email, 
            rua, 
            rua_num, 
            cidade, 
            estado, 
            cep) 
            VALUES (
            '$_SESSION[marca]',
            '$_SESSION[modelo]',
            '$_SESSION[cor]',
            '$_SESSION[preco]',
            '$_SESSION[datafabricacao]',
            '$_SESSION[datacadastro]',
            '$_SESSION[fornecedor]',
            '$_SESSION[telefone]',
            '$_SESSION[email]',
            '$_SESSION[rua]',
            '$_SESSION[rua_num]',
            '$_SESSION[cidade]',
            '$_SESSION[estado]',
            '$_SESSION[cep]'
            )";

            $confima = $mysqli->query($sql) or die ($mysqli->$error);

            if($confima){
                unset($_SESSION['marca'],
                $_SESSION['modelo'],
                $_SESSION['cor'],
                $_SESSION['preco'],
                $_SESSION['datafabricacao'],
                $_SESSION['datacadastro'],
                $_SESSION['fornecedor'],
                $_SESSION['telefone'],
                $_SESSION['email'],
                $_SESSION['rua'],
                $_SESSION['rua_num'],
                $_SESSION['cidade'],
                $_SESSION['estado'],
                $_SESSION['cep']);

                echo "<script> location.href='index.php?p=it_cadastrados'; </script>";
            } else
                $erro[] = $confima;
        }

    }
?>

<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="assets/estilo.css">
<script src="https://kit.fontawesome.com/0844b1c776.js" crossorigin="anonymous"></script>
<title>Cadastro de Tablets</title>
</head>
<body>
<h1 id="titulo">Cadastro de Dados</h1>
<a href="index.php?p=it_cadastrados"><button><i class="fas fa-door-open"></i>Voltar</button></a>
<!--form utilizado para as informções do produto.--> 
<form action="index.php?p=cadastra" method="POST">
<fieldset class="grupo">
<legend>Informações do Produto</legend>

    <input type="hidden" name="id">
    
    Marca : <input type="text" name="marca">
    <br>
    Modelo : <input type="text" name="modelo">
    <br>
<!-- No campo cor eu preferi botar type text, porque se eu colocar type color, fica em código e eu achei ruim -->
    Cor : <input type="text" name="cor">
    <br>
    Preco : <input type="text" name="preco">
    <br>
    Data de Fabricacao : <input type="date" name="datafabricacao">
    <br>
    Data de Cadastro : <input type="date" name="datacadastro">
    <br>
    Fornecedor : <input type="text" name="fornecedor">
    <br>
    Telefone : <input type="text" name="telefone" placeholder="xx xxxxx-xxxx">
    <br>
    E-mail : <input type="text" name="email">
    <br>
    Rua : <input type="text" name="rua">
    <br>
    Número : <input type="text" name="rua_num">
    <br>
    Cidade  : <input type="text" name="cidade">
    <br>
    Estado  : <select name="estado">
					<option value="vazio"> Selecione </option>
					<option value="AC">Acre</option>
					<option value="AL">Alagoas</option>
					<option value="AP">Amapá</option>
					<option value="AM">Amazonas</option>
					<option value="BA">Bahia</option>
					<option value="CE">Ceará</option>
					<option value="DF">Distrito Federal</option>
					<option value="ES">Espírito Santo</option>
					<option value="GO">Goiás</option>
					<option value="MA">Maranhão</option>
					<option value="MT">Mato Grosso</option>
					<option value="MS">Mato Grosso do Sul</option>
					<option value="MG">Minas Gerais</option>
					<option value="PA">Pará</option>
					<option value="PB">Paraíba</option>
					<option value="PR">Paraná</option>
					<option value="PE">Pernambuco</option>
					<option value="PI">Piauí</option>
					<option value="RJ">Rio de Janeiro</option>
					<option value="RN">Rio Grande do Norte</option>
					<option value="RS">Rio Grande do Sul</option>
					<option value="RO">Rondônia</option>
					<option value="RR">Roraima</option>
					<option value="SC">Santa Catarina</option>
					<option value="SP">São Paulo</option>
					<option value="SE">Sergipe</option>
					<option value="TO">Tocantins</option>
				</select>
    <br>
    CEP:<input type="text" name="cep" placeholder="xxxxx-xxx">

<br>

<br>

<button type="submit" name="confirmar"><i class="fas fa-save"></i> Salvar</button>
</fieldset>
</form>



</body>

</html>
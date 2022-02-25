<?php
include("classe/conexao.php");

$usu_id = $_GET['dados'];

if(isset($_POST['confirmar'])){
//Iniciando uma sessão
        if(!isset($_SESSION))
            session_start();

        foreach($_POST as $chave=>$valor)
            $_SESSION[$chave]=$valor;
//Verificando dados
        
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


       //Realizando o UPDATE do cadastro
        if(count($erro) == 0){
            $mysqli = mysqli_connect($host, $usuario, $senha, $dbname);
        mysqli_select_db($mysqli, '$dbname');
        $sql = "UPDATE dados SET
            marca = '$_SESSION[marca]',
            modelo = '$_SESSION[modelo]',
            cor = '$_SESSION[cor]',
            preco = '$_SESSION[preco]',
            datafabricacao = '$_SESSION[datafabricacao]',
            datacadastro = '$_SESSION[datacadastro]',
            fornecedor = '$_SESSION[fornecedor]',
            telefone = '$_SESSION[telefone]',
            email = '$_SESSION[email]',
            rua = '$_SESSION[rua]',
            rua_num = '$_SESSION[rua_num]',
            cidade = '$_SESSION[cidade]',
            estado = '$_SESSION[estado]',
            cep = '$_SESSION[cep]'
            WHERE id = '$usu_id'";

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

                echo "<script> location.href='index.php?p=inicial'; </script>";
            } else
                $erro[] = $confima;
        }

    }else{

        $sql_code = "SELECT * FROM dados WHERE id = '$usu_id'";
        $sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
        $linha = $sql_query->fetch_assoc();

        if(!isset($_SESSION))
            session_start();

                $_SESSION['marca'] = $linha['marca'];
                $_SESSION['modelo'] = $linha['modelo'];
                $_SESSION['cor'] = $linha['cor'];
                $_SESSION['preco'] = $linha['preco'];
                $_SESSION['datafabricacao'] = $linha['datafabricacao'];
                $_SESSION['datacadastro'] = $linha['datacadastro'];
                $_SESSION['fornecedor'] = $linha['fornecedor'];
                $_SESSION['telefone'] = $linha['telefone'];
                $_SESSION['email'] = $linha['email'];
                $_SESSION['rua'] = $linha['rua'];
                $_SESSION['rua_num'] = $linha['rua_num'];
                $_SESSION['cidade'] = $linha['cidade'];
                $_SESSION['estado'] = $linha['estado'];
                $_SESSION['cep'] = $linha['cep'];
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
<h1>Edição de Produto</h1>
<a href="index.php?p=it_cadastrados"><button><i class="fas fa-door-open"></i>Voltar</button></a>
<!--form utilizado para as informções do produto.--> 
<form action="index.php?p=editar&dados=<?php echo $usu_id; ?>" method="POST">
<fieldset class="grupo">
<legend>Informações do Produto</legend>

    <input type="hidden" name="id">
    
    Marca : <input type="text" name="marca" value="<?php echo $_SESSION['marca']; ?>">
    <br>
    Modelo : <input type="text" name="modelo" value="<?php echo $_SESSION['modelo']; ?>">
    <br>

    Cor : <input type="text" name="cor" value="<?php echo $_SESSION['cor']; ?>">
    <br>
    Preco : <input type="text" name="preco" value="<?php echo $_SESSION['preco']; ?>">
    <br>
    Data de Fabricacao : <input type="date" name="datafabricacao" value="<?php echo $_SESSION['datafabricacao']; ?>">
    <br>
    Data de Cadastro : <input type="date" name="datacadastro" value="<?php echo $_SESSION['datacadastro']; ?>">
    <br>
    Fornecedor : <input type="text" name="fornecedor" value="<?php echo $_SESSION['fornecedor']; ?>">
    <br>
    Telefone : <input type="text" name="telefone" value="<?php echo $_SESSION['telefone']; ?>">
    <br>
    E-mail : <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>">
    <br>
    Rua : <input type="text" name="rua" value="<?php echo $_SESSION['rua']; ?>">
    <br>
    Número : <input type="text" name="rua_num" value="<?php echo $_SESSION['rua_num']; ?>">
    <br>
    Cidade  : <input type="text" name="cidade" value="<?php echo $_SESSION['cidade']; ?>">
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
    CEP:<input type="text" name="cep" value="<?php echo $_SESSION['cep']; ?>">

<br>

<br>

<button type="submit" name="confirmar"><i class="fas fa-save"></i> Salvar</button>
</fieldset>
</form>



</body>

</html>
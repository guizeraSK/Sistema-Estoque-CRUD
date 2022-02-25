<?php
include("classe/conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="assets/estilo.css">
		<script src="https://kit.fontawesome.com/0844b1c776.js" crossorigin="anonymous"></script>
		<title>Pesquisar</title>		
	</head>
	<body>

		<h1>Pesquisar Celular</h1>
        <br>
        <a href="index.php?p=it_cadastrados"><button><i class="fas fa-door-open"></i>Voltar</button></a>
		<!-- Formulário onde mostra o resultado da pesquisa -->
		<form method="POST" action="">
			<label>Nome: </label>
			<input type="text" name="nome" placeholder="Fornecedor ou ID"><br>	
			
			<input name="SendPesqUser" type="submit" value="Pesquisar">
		</form><br><br>
		<form>
		<fieldset>
		<legend>Resultado por Fornecedor</legend>
		<?php
		//Realizando pesquisa, eu tentei usar o like tanto para o ID e o Fornecedor, mas não deu muito certo
		$SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
		if($SendPesqUser){
			$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
			$result_usuario = "SELECT * FROM dados WHERE fornecedor LIKE '%$nome%'";
			$resultado_usuario = mysqli_query($mysqli, $result_usuario);
			while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
				echo "ID: " . $row_usuario['id'] . "<br>";
				echo "Marca: " . $row_usuario['marca'] . "<br>";
				echo "Modelo: " . $row_usuario['modelo'] . "<br>";
				echo "Cor: " . $row_usuario['cor'] . "<br>";
				echo "Fornecedor: " . $row_usuario['fornecedor'] . "<br>";
				echo "E-mail: " . $row_usuario['email'] . "<br>";
				echo "Telefone: " . $row_usuario['telefone'] . "<br>";
				
			}
		}

		?>
		</fieldset>
		</form>
		<hr>
		<form>
		<fieldset>
		<legend>Resultado por ID</legend>
		<?php
		
		$SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
		if($SendPesqUser){

			$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
			$result_usuario = "SELECT * FROM dados WHERE id LIKE '%$nome%'";
			$resultado_usuario = mysqli_query($mysqli, $result_usuario);
			while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
				echo "ID: " . $row_usuario['id'] . "<br>";
				echo "Marca: " . $row_usuario['marca'] . "<br>";
				echo "Modelo: " . $row_usuario['modelo'] . "<br>";
				echo "Cor: " . $row_usuario['cor'] . "<br>";
				echo "Fornecedor: " . $row_usuario['fornecedor'] . "<br>";
				echo "E-mail: " . $row_usuario['email'] . "<br>";
				echo "Telefone: " . $row_usuario['telefone'] . "<br>";
				
			}

		}
		?>
		</fieldset>
		</form>
        
	</body>
</html>
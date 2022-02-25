<html>
    <head>
        <script src="https://kit.fontawesome.com/0844b1c776.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="assets/estilo.css">
    </head>
<body>
<h1>Produtos Cadastrados</h1>
<a href="index.php?p=cadastra"><button><i class="fas fa-plus-circle"></i> Cadastrar Produto</button></a> |
<a href="index.php?p=pesquisa"><button><i class="fas fa-search"></i> Pesquisar Produto</button></a> |
<a href="index.php?p=logout"><button><i class="far fa-times-circle"></i> Logout</button></a>
<?php include_once"classe/conexao.php";
    $consulta = "SELECT * FROM dados";

    $con = $mysqli->query($consulta) or die ($mysqli->error);
?>

<!-- Tabela onde mostra os produtos cadastrados -->
<table border="1">
    <tr>
        <td>Código</td>
        <td>Marca</td>
        <td>Modelo</td>
        <td>Cor</td>
        <td>Preço</td>
        <td>Data de Fabricação</td>
        <td>Data de Cadastro</td>
        <td>Fornecedor</td>
        <td>Telefone</td>
        <td>E-mail</td>
        <td>Rua</td>
        <td>Número</td>
        <td>Cidade</td>
        <td>Estado</td>
        <td>CEP</td>
        <td>Ação</td>
    </tr>
    <?php while($dado = $con->fetch_array()){  ?>
    <tr>
        <td> <?php echo $dado["id"]; ?> </td>
        <td> <?php echo $dado["marca"]; ?> </td>
        <td> <?php echo $dado["modelo"]; ?> </td>
        <td> <?php echo $dado["cor"]; ?> </td>
        <td> <?php echo $dado["preco"]; ?> </td>
        <td> <?php echo date("d/m/Y", strtotime($dado["datafabricacao"])); ?> </td>
        <td> <?php echo date("d/m/Y", strtotime($dado["datacadastro"])); ?> </td>
        <td> <?php echo $dado["fornecedor"]; ?> </td>
        <td> <?php echo $dado["telefone"]; ?> </td>
        <td> <?php echo $dado["email"]; ?> </td>
        <td> <?php echo $dado["rua"]; ?> </td>
        <td> <?php echo $dado["rua_num"]; ?> </td>
        <td> <?php echo $dado["cidade"]; ?> </td>
        <td> <?php echo $dado["estado"]; ?> </td>
        <td> <?php echo $dado["cep"]; ?> </td>
        <td><a href="index.php?p=editar&dados=<?php echo $dado["id"];?>"><button><i class="fas fa-edit"></i> Editar</button></a>
            <a href="javascript: if(confirm('Tem certeza que deseja deletar o usuário <?php echo $dado["id"]; ?>?'))
             location.href='index.php?p=excluir&dados=<?php echo $dado["id"];?>'"><button><i class="fas fa-trash-alt"></i> Excluir</button></a>
        </td>
    </tr>
    <?php } ?>
</table>
</body>


</html>
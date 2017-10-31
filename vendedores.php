<?php
	require_once('vendedorPers.php');
	$a = new VendedorPers();
	if(isset($_POST['btcadastrar'])){
		if(isset($_POST['nome'])){
                    $nome = $_POST['nome'];
                    if (isset($_POST['fone']))
			$fone = $_POST['fone'];
		}else{
			echo "Informe nome e telefone";
			die();
		}
		$last_id = $a->Inserir($nome,$fone);
		if($last_id == NULL)
			echo "Erro ao Cadastrar Categoria";
		else{
			echo "<script>alert('Cadastrado com Sucesso');</script>";	
		}
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>lista 04</title>
    </head>
    <body> 
        <table style="width:10%">
          <tr>
            <th>id</th>
            <th>nome</th> 
            <th>telefone</th>
            <th></th>
          </tr>
          <?php
                $vend = $a->BuscarVendedor();
                foreach ($vend as $dados){
            ?>
          <tr>
            <td><?php
                    echo $dados['id'];
                ?></td>
            <td><?php
                    echo $dados['nome'];
                ?></td> 
            <td><?php
                    echo $dados['telefone'];
                ?></td>
            <td>
                <form method="POST" action="editarVendedor.php">
                    <input type="submit" name="bteditar" value="editar">
                    <input type="hidden" name="_id" value="<?php echo $dados['id'] ?>">
                    <input type="hidden" name="_nome" value="<?php echo $dados['nome'] ?>">
                    <input type="hidden" name="_fone" value="<?php echo $dados['telefone'] ?>">
                </form>
            </td>
          </tr>
           <?php  
                }
            ?>
        </table>
        <h3>Cadastrar</h3>
        <form method="POST" action="vendedores.php">
            <table style="width:10%">
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th> 
                </tr>
                <tr>
                    <td> <input type="text" name="nome"> </td>
                    <td> <input type="tel" name="fone"> </td>
                </tr>
            </table>
            <input type="submit" name="btcadastrar" value="cadastrar">
        </form>
</body>
</html>
   

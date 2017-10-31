 <?php
    if (isset($_POST['bteditar'])):
        $id = $_POST['_id'];
        $nome = $_POST['_nome'];
        $fone = $_POST['_fone'];
        echo 'id: '.$id;
    endif;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Editar Vendedor</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h2>Editar Vendedor</h2>
        <form action="editar.php" method="POST">
            <table>
              <tr>
                <th>Nome</th>
                <th>Telefone</th> 
              </tr>
              <tr>
                  <td>
                      <input type="text" name="ednome" value="<?php echo $nome ?>">
                  </td>
                  <td>
                      <input type="text" name="edtelefone" value="<?php echo $fone ?>">
                      <input type="hidden" name="edid" value="<?php echo $id ?>">
                  </td>
              </tr>
            </table>
            <input type="submit" name="bteditar" value="editar">
        </form>
    </body>
</html>

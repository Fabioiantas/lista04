<?php
    require_once('vendedorPers.php');
    $a = new VendedorPers();
    if(isset($_POST['bteditar'])){
            if(isset($_POST['ednome'])){
                $nomeed = $_POST['ednome'];
                if (isset($_POST['edtelefone']))
                    $foneed = $_POST['edtelefone'];
                if (isset($_POST['edid']))
                    $ided = $_POST['edid'];
            }else{
                    echo "<script>alert('Informe nome e telefone');</script>";	
                    die();
            }
            //session_start();
            $last_id = $a->Alterar($ided, $nomeed, $foneed);
            if($last_id == NULL)
                    echo "<script>alert('Erro ao Alterar');</script>";
            else{
                    echo "<script>alert('Alterado com Sucesso');</script>";	
                    echo '<a href="vendedores.php">Voltar</a>';
            }
    }
?>
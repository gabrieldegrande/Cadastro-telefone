<?php require_once("conexao.php"); ?>
<?php

    /*Consulta para pegar o Id do funcionário
    e exibir os dados do funcionário no formulário*/
    $func = "SELECT * ";
    $func .= "FROM funcionario ";
    
    if(isset($_GET['codigo'])){
        $id = $_GET['codigo'];
        $func .= "WHERE Id = {$id} ";
    }

    $con_func = mysqli_query($conecta, $func);
    if(!$con_func){
        die("Erro!");
    }
    $info = mysqli_fetch_assoc($con_func);

    //Exclusão do funcionário
    if(isset($_POST['Tipo'])){
        $nome   = $_POST['Tipo'];
        $cpf = $_POST['Numero'];
        $tId    = $_POST['Id'];

        $exclusao = "DELETE FROM funcionario ";
        $exclusao .= "WHERE Id = {$tId} ";
        $operacao = mysqli_query($conecta, $exclusao);        

        if(!$operacao){
            die("Erro na exclusão!");
        }else{
            header("location:telefone.php");
        }

    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmar exclusão do funcionário</title>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h3>Confirmar exclusão do funcionário</h3>
        <form action="excluir.php" method="POST">

            <label>Nome do funcionário</label>
            <div class="form-group">
                <input class="form-control" type="text" name="Tipo" value="<?php echo $info['Nome']; ?>">
            </div>

            <div class="form-group">
                <label>CPF do funcionário</label>
                <input class="form-control" type="text" name="Numero" value="<?php echo $info['Cpf']; ?>">
            </div>

            <div class="form-group">
                <input type="hidden" name="Id" value="<?php echo $info['Id']; ?>">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-success btn-block" value="Confirmar">
            </div>

            <div class="form-group">
                <input class="btn btn-danger btn-block" value="Cancelar" onclick="window.location='index.php'">
            </div>
        </form>
    </div>


</body>

</html>

<?php
    mysqli_free_result($con_func);
    mysqli_close($conecta);
?>
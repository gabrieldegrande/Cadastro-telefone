<?php require_once("conexao.php"); ?>
<?php
//Inserir os dados do funcionário
if(isset($_POST["Nome"])){
    $nome   = $_POST['Nome'];
    $cpf    = $_POST['Cpf'];

    $inserir    = "INSERT INTO funcionario ";
    $inserir    .= "(Nome, Cpf) ";
    $inserir    .= "VALUES ";
    $inserir    .= "('$nome', '$cpf') ";
    $operacao = mysqli_query($conecta, $inserir);
    
    if(!$operacao){
        die("Erro!");
    }else{
        header("location:index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar funcionário</title>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h3>Cadastrar Funcionário</h3>
        <form action="cadastrar_funcionario.php" method="POST">
            <label for="Nome">Nome completo do funcionário</label>
            <div class="form-group">
                <input class="form-control" type="text" name="Nome" placeholder="Ex. João Pedro da Silva">
            </div>
            <label for="Cpf">CPF do funcionário</label>
            <div class="form-group">
                <input class="form-control" type="text" name="Cpf" placeholder="Ex: 123.456.789-10">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success btn-block" value="Cadastrar">
            </div>
            <div class="form-group">
                <input class="btn btn-danger btn-block" value="Cancelar" onclick="window.location='index.php'">
            </div>
        </form>
    </div>


</body>

</html>

<?php
    mysqli_close($conecta);
?>
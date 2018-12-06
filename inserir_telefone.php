<?php require_once("conexao.php"); ?>
<?php  

    $Id_funcionario = $_GET['codigo'];

    if(isset($_POST['Tipo'])){
        $tipo = $_POST['Tipo'];
        $numero = $_POST['Numero'];
        $Id = $_POST['Id_funcionario'];
            
        $inserir  = "INSERT INTO telefone ";
        $inserir .= "(Id_funcionario, Tipo, Numero) ";
        $inserir .= "VALUES ";
        $inserir .= "($Id, '$tipo', '$numero' )";
        $operacao = mysqli_query($conecta, $inserir);
            
        if(!$operacao){
            die("Erro!");
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
    <title>Inserir Telefone</title>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h3>Inserir Telefone</h3>
        <form action="inserir_telefone.php" method="POST">

            <label>Tipo:</label>
            <div class="form-group">
                <input class="form-control" type="text" name="Tipo" placeholder="Celular/Residencial/Comercial">
            </div>
            <label>(DDD)+Numero:</label>
            <div class="form-group">
                <input class="form-control" type="text" name="Numero" placeholder="Ex. (19) 9 9234 5678">
            </div>

            <div class="form-group">
                <input type="hidden" value="<?php echo $Id_funcionario;?>" name="Id_funcionario">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-success btn-block" value="Cadastrar">
            </div>

            <div class="form-group">
                <input class="btn btn-danger btn-block" value="Cancelar" onclick="window.location='telefone.php'">
            </div>
        </form>
    </div>


</body>

</html>

<?php
    mysqli_close($conecta);
?>
<?php require_once("conexao.php"); ?>
<?php
    //Consulta para exibir os dados do Telefone do funcionário no formulário
    $tel = "SELECT * ";
    $tel .= "FROM telefone ";
    
    if(isset($_GET['codigo'])){
        $id = $_GET['codigo'];
        $tel .= "WHERE Id = {$id} ";
    }else{
        $tel .= "WHERE Id = 1 ";
    }
    
    $con_tel = mysqli_query($conecta, $tel);
    if(!$con_tel){
        die("Erro ao exibir os dados do telefone!");
    }
    $info = mysqli_fetch_assoc($con_tel);

    //Alterar os dados do telefone
    if(isset($_POST['Tipo'])){
        $tipo   = $_POST['Tipo'];
        $numero = $_POST['Numero'];
        $tId    = $_POST['Id'];

        $alterar = "UPDATE telefone ";
        $alterar .= "SET ";
        $alterar .= "Tipo = '{$tipo}', ";
        $alterar .= "Numero = '{$numero}' ";
        $alterar .= "WHERE Id = {$tId}";
        $operacao = mysqli_query($conecta, $alterar);

        if(!$operacao){
            die("Erro na alteração!");
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
    <title>Alterar dados de contato</title>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h3>Alterar dados de contato</h3>
        <form action="alterar_telefone.php" method="POST">

            <label>Tipo: Celular/Residencial/Comercial</label>
            <div class="form-group">
                <input class="form-control" type="text" name="Tipo" value="<?php echo $info['Tipo']; ?>">
            </div>

            <div class="form-group">
                <label>(DDD)+Número</label>
                <input class="form-control" type="text" name="Numero" value="<?php echo $info['Numero']; ?>">
            </div>

            <div class="form-group">
                <input type="hidden" name="Id" value="<?php echo $info['Id']; ?>">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-success btn-block" value="Alterar">
            </div>

            <div class="form-group">
                <input class="btn btn-danger btn-block" value="Cancelar" onclick="window.location='telefone.php'">
            </div>
        </form>
    </div>


</body>

</html>

<?php
    mysqli_free_result($con_tel);
    mysqli_close($conecta);
?>
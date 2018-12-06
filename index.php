<?php require_once("conexao.php"); ?>
<?php
    //Consulta para exibir os nomes dos funcionários e seu respectivo CPF
    $consulta_func = "SELECT * ";
    $consulta_func .= "FROM funcionario ";
    $funcionarios = mysqli_query($conecta, $consulta_func);
    if(!$funcionarios){
        die("Erro na conexão: " . mysqli_connect_errno());
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Funcionários</title>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.js"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <h3>Funcionários</h3>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <td>CPF</td>
                        <td>Nome</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($registro = mysqli_fetch_assoc($funcionarios)){
                        ?>
                        <tr>
                            <td style="width:150px;"> <?php echo($registro['Cpf']); ?></td>
                            <td> <?php echo($registro['Nome']); ?></td>
                            <td style="width:10%;"><a class="btn btn-info" href="telefone.php?codigo=<?php echo $registro['Id']?>">Telefone(s)</a></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <a class="btn btn-success" href="cadastrar_funcionario.php">Cadastrar Funcionário</a>
        </div>
        

</body>
</html>

<?php
    mysqli_free_result($funcionarios);
    mysqli_close($conecta);
?>
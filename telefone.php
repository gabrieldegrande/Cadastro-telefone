<?php require_once("conexao.php"); ?>
<?php
    if(isset($_GET['codigo'])){
        $funcionario_id = $_GET['codigo'];
    }else{
        Header("location: index.php");
    }

    //Consulta para pegar os dados do funcionário e seus telefones
    $nome   = "SELECT * ";
    $nome   .= "FROM funcionario ";
    $nome   .= "WHERE Id = {$funcionario_id} ";
    $nome_func = mysqli_query($conecta, $nome);
    if(!$nome_func){
        die("Erro!");
    }else{
        $dados_detalhe = mysqli_fetch_assoc($nome_func);
        $nomeF = $dados_detalhe['Nome'];
        $Cpf = $dados_detalhe['Cpf'];
        $IdDoFuncionario = $dados_detalhe['Id'];
    }

    $consulta   = "SELECT * ";
    $consulta   .= "FROM telefone ";
    $consulta   .= "WHERE Id_funcionario = {$funcionario_id} ";
    $detalhe = mysqli_query($conecta, $consulta);
    if(!$detalhe){
        die("Erro!");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.js"></script>
    <title>Telefones</title>
</head>

<body>
    <div class="container">
        <h3>
            <?php echo $nomeF; ?>
        </h3>
        <h4>
            CPF:
            <?php echo $Cpf; ?>
        </h4>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <td>Número</td>
                    <td>Tipo</td>
                    <td style="width:20%;">Opções</td>
                </tr>
            </thead>
            <tbody>
                <?php
        while($registro = mysqli_fetch_assoc($detalhe)){
            ?>
                <tr>
                    <td>
                        <?php echo $registro['Numero'] ?>
                    </td>
                    <td>
                        <?php echo $registro['Tipo'] ?>
                    </td>
                    <td>
                        <a class="btn btn-info" href="alterar_telefone.php?codigo=<?php echo $registro['Id']?>">Alterar</a>
                        <a class="btn btn-danger" href="excluir_telefone.php?codigo=<?php echo $registro['Id']?>">Excluir</a>
                    </td>
                </tr>
                <?php    
        }
    ?>
            </tbody>
        </table>
        <a class="btn btn-success" href="inserir_telefone.php?codigo=<?php echo $funcionario_id ?>">Inserir Telefone</a>
        <a class="btn btn-danger" href="excluir.php?codigo=<?php echo $IdDoFuncionario?>">Excluir funcionário</a>
        <a class="btn btn-danger" href="index.php">Voltar</a>
    </div>
</body>

</html>
<?php
    mysqli_close($conecta);
?>
<?php
require("conexao.php");

if (isset($_GET['apagar'])) {
    $idMatricula = $_GET['apagar'];
    $sql = "DELETE FROM matricula 
        WHERE idMatricula = $idMatricula";

    if (mysqli_query($conexao, $sql)) {
        echo "  <script>
                        alert('Registro deletado!');
                        window.location = 'apagar.php';
                    </script>";
    } else {
        echo "  <script>
                        alert('Erro ao deletar!');
                        window.location = 'apagar.php';
                    </script>";
    }
}
$consulta   = "SELECT * FROM matricula";
$resultado  = mysqli_query($conexao, $consulta);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclur Registros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Sistema Acadêmico</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="cadastro.php">Cadastro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="atualizar.php">Editar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="lendoDados.php">Visualizar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="apagar.php" >Excluir</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="logout.php">Sair</a>
                    </li>
                    
                    
                </ul>
            </div>
        </div>
    </nav>
    <div class="container text-center"><br>
        <h2>Lista de Matriculados</h2><br>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while
                ($linha = mysqli_fetch_assoc($resultado)):?>
                <tr>
                    <td><?=$linha['idMatricula']?></td>
                    <td><?=$linha['nome']?></td>
                    <td><?=$linha['curso']?></td>
                    <td>
                        <a 
                        href="?apagar=<?=$linha['idMatricula']?>" type="button" class="btn btn-outline-danger"
                        onclick="return confirm('Tem certeza que deseja apagar este registro?');"
                        >Excluir</a>
                    </td>
                </tr>
                <?php endwhile;?>
            </tbody>
        </table>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>
<?php
    require("conexao.php");

    if (isset($_POST["atualizar"])) {
        $idMatricula    = $_POST["idMatricula"];
        $nome           = $_POST["nome"];
        $curso          = $_POST["curso"];

        $sql = "UPDATE matricula SET
                nome    ='$nome',
                curso   ='$curso'
                WHERE idMatricula = '$idMatricula'";

        if (mysqli_query($conexao, $sql)) {
            echo
            "<script>
                    alert('Dados atualizados!');
                    window.location = 'atualizar.php';
            </script>";
            exit();
        } else {
            echo
            "<script>
                    alert('Erro ao Atualizar!');
                    window.location = 'atualizar.php';
                </script>";
            exit();
        }
    }

    $editaAluno = null;
    if (isset($_GET["editar"])) {
        $idEditar   = $_GET['editar'];
        $resultado  = mysqli_query($conexao, "SELECT * FROM matricula WHERE idMatricula = $idEditar");
        $editaAluno = mysqli_fetch_assoc($resultado);
    }

    $alunos = mysqli_query($conexao, "SELECT * FROM matricula");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cadastro</title>
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
    <div class="container">
        <h2>Lista de Alunos</h2>
        <table class="table table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($aluno = mysqli_fetch_assoc($alunos)): ?>
                    <tr>
                        <td><?= $aluno["idMatricula"] ?></td>
                        <td><?= $aluno["nome"] ?></td>
                        <td><?= $aluno["curso"] ?></td>
                        <td>
                            <a href="?editar=<?= $aluno['idMatricula'] ?>" type="button" class="btn btn-outline-dark">Editar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php if ($editaAluno):?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <h2>Editar Aluno</h2>
                        <form method="POST">
                            <input type="hidden" name="idMatricula" value="<?= $editaAluno['idMatricula'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome: </label>
                                <input type="text" name="nome" class="form-control" value="<?= $editaAluno['nome'] ?>" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="curso" class="form-label">Curso: </label>
                                <input type="text" name="curso" class="form-control" value="<?= $editaAluno['curso'] ?>">
                            </div>
                            <button type="submit" name="atualizar" class="btn btn-outline-dark">Atualizar</button>
                            <a href="atualizar.php" class="btn btn-outline-dark">Cancelar</a>
                        </form>
                    </div>
                    <div class="col-lg-3"></div>
                </div>
            </div>
        <?php endif;?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
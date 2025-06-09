<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matricula - Cadastro</title>
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
                        <a class="nav-link" href="apagar.php">Excluir</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="logout.php">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav><br>
    <div class="container">
        <h2>Cadastro de Alunos</h2>
        <p>Prezado(a) aluno(a), preencha com os seus dados:</p>
        <br>

        <form method="post" action="">
            <div class="mb-3">
                <label for="aluno" class="form-label">Nome: </label>
                <input type="text" class="form-control" name="aluno" aria-describedby="nomeHelp">
                <div id="nomeHelp" class="form-text">Entre com o seu nome completo.</div>
            </div>
            <div class="mb-3">
                <label for="curso" class="form-label">Curso:</label>
                <input type="text" class="form-control" name="curso"  aria-describedby="cursoHelp">
                <div id="cursoHelp" class="form-text">Adicione o nome do curso que esteja registrado.</div>
            </div>
            <input class="btn btn-outline-dark" type="reset" value="Limpar" name="limpar">
            <input class="btn btn-outline-success" type="submit" value="Enviar" name="submit"><br>

        </form>




<!-- 
        <form method="post" action="">
            <label name="aluno">Nome:</label>
            <input type="text" name="aluno" required><br>

            <label name="curso">Curso:</label>
            <input type="text" name="curso" required><br><br>

            <input type="reset" value="Limpar" name="limpar">
            <input type="submit" value="Enviar" name="submit">
        </form> -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome   = $_POST["aluno"];
    $curso  = $_POST["curso"];

    require("conexao.php");

    $inserir = "INSERT INTO matricula (idMatricula, nome, curso)
        VALUES ('','$nome','$curso')";

    if (mysqli_query($conexao, $inserir)) {
        echo "<script>
    alert('Cadastro realizado com sucesso!');
    </script>";
        exit();
    } else {
        echo "<script>
    alert('Erro ao cadastrar!');
    </script>";
        exit();
    }
}
?>
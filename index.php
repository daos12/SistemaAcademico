<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Controle Acadêmico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    <?php
    session_start();
    ?>

    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Sistema Acadêmico</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?= !isset($_SESSION['usuario']) ? 'disabled' : '' ?>" href="cadastro.php">Cadastro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= !isset($_SESSION['usuario']) ? 'disabled' : '' ?>" href="atualizar.php">Editar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= !isset($_SESSION['usuario']) ? 'disabled' : '' ?>" href="lendoDados.php">Visualizar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= !isset($_SESSION['usuario']) ? 'disabled' : '' ?>" href="apagar.php">Excluir</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="logout.php">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="form-signin w-100 m-auto mt-5" style="max-width: 330px;">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_SESSION['usuario'])) {
            require("conexao.php");
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha' LIMIT 1";
            $resultado = mysqli_query($conexao, $sql);

            if (mysqli_num_rows($resultado) == 1) {
                $_SESSION['usuario'] = $email;
                header("Location: index.php");
                exit();
            } else {
                echo '<div class="alert alert-danger" role="alert">Email ou senha incorretos!</div>';
            }
        }

        // Se não estiver logado, exibir o formulário:
        if (!isset($_SESSION['usuario'])):
        ?>
            <form method="POST" class="text-center">
                <img class="mb-4" src="https://cdn-icons-png.flaticon.com/512/90/90825.png" alt="" width="72" height="57">
                <h1 class="h3 mb-3 fw-normal">Por favor, realize o login:</h1>
                <div class="form-floating mb-2">
                    <input type="email" class="form-control" name="email" placeholder="nome@exemplo.com" required>
                    <label>Email:</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="password" class="form-control" name="senha" placeholder="Senha" required>
                    <label>Senha:</label>
                </div>
                <button class="w-100 btn btn-lg btn-outline-dark" type="submit">Logar</button>
                <p class="mt-5 mb-3 text-muted">&copy; Diego - Senac Patrocínio/MG</p>
            </form>
        <?php else: ?>
            <div class="text-center">
                <h2>Bem-vindo, <?= ($_SESSION['usuario']) ?>!</h2>
                <p>Use o menu acima para navegar no sistema.</p>
            </div>
        <?php endif; ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>
</body>

</html>
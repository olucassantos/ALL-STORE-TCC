<?php
// Inicia a sessão
session_start();

// Inclui o arquivo de conexão com o banco de dados
require_once "admin/classes/DadosDoBanco.php";

// Verifica se foi enviado o formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verifica se é admin ou cliente
    if (isset($_POST['admin'])) {
        // Verifica se o e-mail e a senha do administrador estão corretos
        $dadosAdmin = new DadosAdministrador();
        $dadosAdmin->verAdministracao("SELECT * FROM administracao WHERE email='$email' AND senha='$senha'", 0);

        if ($dadosAdmin->getId() != null) {
            // Inicia a sessão do administrador
            $_SESSION['id_administracao'] = $dadosAdmin->getId();
            header('Location: admin/index.php');
            exit;
        } else {
            // Exibe uma mensagem de erro
            $_SESSION['erro_login'] = 'E-mail ou senha incorretos';
            header('Location: login.php');
            exit;
        }
    } elseif (isset($_POST['cliente'])) {
        $dadosCliente = new DadosCliente();
        $dadosCliente->verCliente("SELECT * FROM cliente WHERE email='$email' AND senha2='$senha'", 0);

        if ($dadosCliente->getId() != null) {
            // Inicia a sessão do cliente
            $_SESSION['id_cliente'] = $dadosCliente->getId();
            header('Location: painel_cliente.php?id=' . $dadosCliente->getId());

            exit;
        } else {
            // Exibe uma mensagem de erro
            $_SESSION['erro_login'] = 'E-mail ou senha incorretos';
            header('Location: login.php');
            exit;
        }
    }
} else {
    // Se não foi enviado o formulário, redireciona para a página de login
    header('Location: index.php');
    exit;
}
?>
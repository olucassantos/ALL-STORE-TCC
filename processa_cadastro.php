<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente = isset($_POST["cliente"]) ? $_POST["cliente"] : "";
    $endereco = isset($_POST["endereco"]) ? $_POST["endereco"] : "";
    $cidade = isset($_POST["cidade"]) ? $_POST["cidade"] : "";
    $bairro = isset($_POST["bairro"]) ? $_POST["bairro"] : "";
    $uf = isset($_POST["uf"]) ? $_POST["uf"] : "";
    $cep = isset($_POST["cep"]) ? $_POST["cep"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $sexo = isset($_POST["sexo"]) ? $_POST["sexo"] : "";
    $fone = isset($_POST["fone"]) ? $_POST["fone"] : "";
    $senha = isset($_POST["senha"]) ? $_POST["senha"] : "";
    $ativo = isset($_POST["ativo_cliente"]) ? $_POST["ativo_cliente"] : "";
    $numero = isset($_POST["numero"]) ? $_POST["numero"] : "";
    $ddd = isset($_POST["ddd"]) ? $_POST["ddd"] : "";
    $complemento = isset($_POST["complemento"]) ? $_POST["complemento"] : "";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lojavirtual";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO cliente (cliente, endereco, cidade, bairro, uf, cep, email, senha2, ativo_cliente, fone, sexo, numero, ddd, complemento) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssssss", $cliente, $endereco, $cidade, $bairro, $uf, $cep, $email, $senha, $ativo, $fone, $sexo, $numero, $ddd, $complemento);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // Redireciona para o arquivo index.php
        
        echo "<script type='text/javascript'> alert('Cadastrado com sucesso!'); location.href='index.php?' </script> ";
        exit(); // Certifica-se de que o script seja encerrado após o redirecionamento
    } else {
        echo "<script type='text/javascript'> alert('Erro ao cadastrar!'); location.href='index.php?' </script> ";
    }

    // Fecha a conexão com o banco de dados
    $stmt->close();
    $conn->close();
}
?>

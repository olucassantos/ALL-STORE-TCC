<?php
include_once("./classes/DadosDoBanco.php");

$acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
$id = isset($_GET["id"]) ? $_GET["id"] : "";
$txt_id_cliente = "";
$txt_cliente = "";
$txt_endereco = "";
$txt_ativo = "";
$txt_cidade = "";
$txt_bairro = "";
$txt_uf = "";
$txt_cep = "";
$txt_email = "";
$txt_sexo = "";
$txt_fone = "";
$txt_senha = "";

if ($acao !== "") {
    $dados = new DadosCliente();
    $dados->setId($id);
    $dados->mostrarDados();

    $txt_cliente = $dados->getCliente();
    $txt_endereco = $dados->getEndereco();
    $txt_ativo = $dados->getAtivo();
    $txt_cidade = $dados->getCidade();
    $txt_bairro = $dados->getBairro();
    $txt_uf = $dados->getUf();
    $txt_cep = $dados->getCep();
    $txt_email = $dados->getEmail();
    $txt_sexo = $dados->getSexo();
    $txt_fone = $dados->getFone();
    $txt_senha = $dados->getSenha();

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $txt_cliente = isset($_POST["txt_cliente"]) ? $_POST["txt_cliente"] : "";
    $txt_endereco = isset($_POST["txt_endereco"]) ? $_POST["txt_endereco"] : "";
    $txt_ativo = isset($_POST["txt_ativo"]) ? $_POST["txt_ativo"] : "";
    $txt_cidade = isset($_POST["txt_cidade"]) ? $_POST["txt_cidade"] : "";
    $txt_bairro = isset($_POST["txt_bairro"]) ? $_POST["txt_bairro"] : "";
    $txt_uf = isset($_POST["txt_uf"]) ? $_POST["txt_uf"] : "";
    $txt_cep = isset($_POST["txt_cep"]) ? $_POST["txt_cep"] : "";
    $txt_email = isset($_POST["txt_email"]) ? $_POST["txt_email"] : "";
    $txt_sexo = isset($_POST["txt_sexo"]) ? $_POST["txt_sexo"] : "";
    $txt_fone = isset($_POST["txt_fone"]) ? $_POST["txt_fone"] : "";
    $txt_senha = isset($_POST["txt_senha"]) ? $_POST["txt_senha"] : "";
    
}
?>

<div id="formulario">
    <h2>Cadastro de Cliente</h2>
    <form action="./op/op_cliente.php" method="post" enctype="multipart/form-data">

        <label>
            <span class="titulo">Cliente</span>
            <input type="text" name="txt_cliente" id="txt_cliente" value="<?php echo htmlspecialchars($txt_cliente); ?>">
        </label>

        <label>
            <span class="titulo">EMAIL</span>
            <input type="text" name="txt_email" id="txt_email" value="<?php echo htmlspecialchars($txt_email); ?>">
        </label>

        <label>
            <span class="titulo">Endereço</span>
            <input type="text" name="txt_endereco" id="txt_endereco" value="<?php echo htmlspecialchars($txt_endereco); ?>">
        </label>

        <label>
            <span class="titulo">Sexo</span>
            <input type="text" name="txt_sexo" id="txt_sexo" value="<?php echo htmlspecialchars($txt_sexo); ?>">
        </label>

        <label>
            <span class="titulo">Fone</span>
            <input type="text" name="txt_fone" id="txt_fone" value="<?php echo htmlspecialchars($txt_fone); ?>">
        </label>

        <label>
            <span class="titulo">Senha (Senha do cliente não irá aparecer!)</span>
            <input type="password" name="txt_senha" id="txt_senha" value="<?php echo $txt_senha ?>">
        </label>

        <div class="tres-campos">
            <label>
                <span class="titulo">Cidade</span>
                <input type="text" name="txt_cidade" id="txt_cidade" value="<?php echo htmlspecialchars($txt_cidade); ?>">
            </label>
            <label>
                <span class="titulo">Bairro</span>
                <input type="text" name="txt_bairro" id="txt_bairro" value="<?php echo htmlspecialchars($txt_bairro); ?>">
            </label>
            <label>
                <span class="titulo">Ativo</span>
                <select name="txt_ativo" id="txt_ativo">
                    <option value="S" <?php if ($txt_ativo == "S") { echo "selected"; } ?>>Sim</option>
                    <option value="N" <?php if ($txt_ativo == "N") { echo "selected"; } ?>>Não</option>
                </select>
            </label>
        </div>

        <label>
            <span class="titulo">UF</span>
            <input type="text" name="txt_uf" id="txt_uf" value="<?php echo htmlspecialchars($txt_uf); ?>">
        </label>

        <div class="dois-campos">
            <label>
                <span class="titulo">CEP</span>
                <input type="text" name="txt_cep" id="txt_cep" value="<?php echo htmlspecialchars($txt_cep); ?>">
            </label>
        </div>

        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <input type="hidden" name="acao" value="<?php if ($acao!=""){ echo $acao;}else{echo "Inserir";} ?>" />
        <input type="submit" value="<?php if ($acao!=""){ echo $acao;}else{echo "Inserir";} ?>" class="botao" />


    </form>
</div>

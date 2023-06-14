<?php
class conexaoMySQL
{
    protected $servidor;
    protected $usuario;
    protected $senha;
    protected $banco;
    protected $conexao;
    protected $qry;
    protected $dados;
    protected $totalDados;
    

    public function __construct()
    {
        $this->servidor = "localhost";
        $this->usuario = "root";
        $this->senha = "";
        $this->banco = "lojavirtual";
        $this->conectar();
    }

    public function conectar()
{
    $this->conexao = mysqli_connect($this->servidor, $this->usuario, $this->senha, $this->banco);

    if (!$this->conexao) {
        throw new Exception("Não foi possível conectar com o servidor de banco de dados: " . mysqli_connect_error());
    }

    return $this->conexao;
}

    public function executarSQL($sql, $parametros = array())
    {
        $stmt = mysqli_prepare($this->conexao, $sql);

        if ($stmt === false) {
            throw new Exception("Erro ao preparar o comando SQL: " . $sql . "<br>" . mysqli_error($this->conexao));
        }

        if (!empty($parametros)) {
            $tipos = str_repeat("s", count($parametros));
            $valores = array_values($parametros);
            array_unshift($valores, $tipos);
            call_user_func_array(array($stmt, "bind_param"), $valores);
        }

        $result = mysqli_stmt_execute($stmt);

        if ($result === false) {
            throw new Exception("Erro ao executar o comando SQL: " . $sql . "<br>" . mysqli_error($this->conexao));
        }

        $this->qry = mysqli_stmt_get_result($stmt);

        mysqli_stmt_close($stmt);

        return $this->qry;
    }

    public function listar($qr)
    {
        $this->dados = mysqli_fetch_assoc($qr);
        return $this->dados;
    }

    public function contaDados($qry)
    {
        $this->totalDados = mysqli_num_rows($qry);
        return $this->totalDados;
    }

    public function fecharConexao()
    {
        mysqli_close($this->conexao);
    }
}



?>
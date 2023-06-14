
<?php
include_once ("conexaoMySQL.php");	
class manipulacaoDeDados extends conexaoMySQL

{
    protected $sql;
    protected $tabela;
    protected $campos;
    protected $dados;
    protected $msg;
    protected $valorNaTabela;
    protected $valorPesquisa;

    public function __construct()
    {
        parent::__construct();
        $this->conexao = $this->getCon();
    }

    public function getSql()
    {
        return $this->sql;
    }

    public function setTabela($tbl)
    {
        $this->tabela = $tbl;
    }

    public function setCampos($campo)
    {
        $this->campos = $campo;
    }

    public function setDados($dado)
    {
        $this->dados = $dado;
    }

    public function getMsg()
    {
        return $this->msg;
    }

    public function setValorNaTabela($val)
    {
        $this->valorNaTabela = $val;
    }

    public function setValorPesquisa($pesq)
    {
        $this->valorPesquisa = $pesq;
    }

    public function inserir()
    {
        $this->sql = "INSERT INTO $this->tabela ($this->campos) VALUES ($this->dados)";

        if($this->executarSQL($this->sql))
        {
            $this->msg = "Registro alterado com sucesso...";
        }
    }

    public function ultimoRegistro($campo, $tabela)
    {
        $sql    = "SELECT $campo FROM $tabela ORDER BY $campo DESC LIMIT 1";
        $qry    = $this->executarSQL($sql);
        $linha  = $this->listar($qry);

        return $linha["$campo"];
    }

    public function getCon() // Adiciona o método getCon()
    {
        return $this->conexao;
    }

    public function excluir()
    {
        $this->sql = "DELETE FROM $this->tabela WHERE $this->valorNaTabela = '$this->valorPesquisa'";
        if(self::executarSQL($this->sql))
        {
            $this->msg = "Registro excluído com sucesso...";
        }		
    }

    public function alterar()
    {
        $this->sql = "UPDATE $this->tabela SET $this->campos WHERE $this->valorNaTabela = '$this->valorPesquisa'";
        if(self::executarSQL($this->sql))
        {
            $this->msg = "Registro alterado com sucesso...";
        }		
    }
    
    public function ultimoRegistro2($campo, $tabela)
    {
        $sql    = "SELECT $campo FROM $tabela ORDER BY $campo DESC LIMIT 1";
        $qry    = self::executarSQL($sql);
        $linha  = self::listar($qry);

        return $linha[$campo];
    }

}
?>


    

<?php
include_once("conexaoMySQL.php");

class DadosCliente extends conexaoMySQL {
    private $id, $cliente, $endereco, $cidade, $bairro, $uf, $cep, $email, $sexo, $fone, $senha2, $ativo, $numero, $ddd, $complemento;

	public function __construct(){
        parent::__construct();
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function getCliente(){
        return $this->cliente;
    }

    public function getEndereco(){
        return $this->endereco;
    }

    public function getCidade(){
        return $this->cidade;
    }

    public function getBairro(){
        return $this->bairro;
    }

    public function getUf(){
        return $this->uf;
    }

    public function getCep(){
        return $this->cep;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getSexo(){
        return $this->sexo;
    }

    public function getFone(){
        return $this->fone;
    }

    public function getSenha(){
        return $this->senha2;
    }

    public function getAtivo(){
        return $this->ativo;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function getDDD(){
        return $this->ddd;
    }

    public function getComplemento(){
        return $this->complemento;
    }

    public function verificarExistencia(){
        $sql = "SELECT COUNT(*) FROM cliente WHERE id_cliente = '$this->id'";
        $qry = self::executarSQL($sql);
        $total = self::contaDados($qry);
        return ($total > 0);
    }

    public function mostrarDados(){
        $sql = "SELECT * FROM cliente WHERE id_cliente = '$this->id'";
        $qry = self::executarSQL($sql);
        $linha = self::listar($qry);

        if ($linha) {
            $this->cliente = $linha["cliente"];
            $this->endereco = $linha["endereco"];
            $this->cidade = $linha["cidade"];
            $this->bairro = $linha["bairro"];
            $this->uf = $linha["uf"];
            $this->cep = $linha["cep"];
            $this->email = $linha["email"];
            $this->sexo = $linha["sexo"];
            $this->fone = $linha["fone"];
            $this->numero = $linha["numero"];
            $this->ddd = $linha["ddd"];
            $this->complemento = $linha["complemento"];
        } else {
            echo "<p>O cliente não foi encontrado.</p>";
        }
    }

		public function totalRegistros($sql){
			$qry = self::executarSQL($sql);
			$total= self::contaDados($qry);			
			return $total;
		}
		
		
		public function verCliente($sql,$i){
			$qry = mysqli_query($this->conexao, $sql); // usei mysqli ao invés de mysql para se adequar a versões mais recentes do PHP e também para evitar problemas de segurança como injeção de SQL
			
			if (!$qry) {
				die('Erro na consulta: ' . mysqli_error($this->conexao));
			}
			
			$resultado = mysqli_fetch_assoc($qry);
			
			$this->id = $resultado['id_cliente'];
			$this->cliente = $resultado['cliente'];
			$this->endereco = $resultado['endereco'];
			$this->cidade = $resultado['cidade'];
			$this->bairro = $resultado['bairro'];
			$this->uf = $resultado['uf'];
			$this->cep = $resultado['cep'];
			$this->email = $resultado['email'];
			$this->sexo = $resultado['sexo'];
			$this->fone = $resultado['fone'];
			$this->senha2 = $resultado['senha2'];
			$this->ativo = $resultado['ativo_cliente'];
		}
		
	}
	
	
	
	
	
	
	class DadosAdministrador extends conexaoMySQL{
		private $id, $nome, $email, $login, $tx_senha;
		
		public function setId($id){
			$this->id = $id;
		}
		public function getId(){
			return $this-> id;
		}
		
		public function getNome(){
			return $this-> nome;
		}
		public function getEmail(){
			return $this-> email;
		}
		public function getLogin(){
			return $this-> login;
		}
		public function getSenha(){
			return $this-> tx_senha;
		}
		
		
		public function mostrarDados(){
			$sql= "SELECT * FROM  administracao WHERE id_administracao = '$this->id'";
			$qry = self::executarSQL($sql);
			$linha = self::listar($qry);
			
			$this->id  		= $linha["id_administracao"];
			$this->nome  	= $linha["nome"];
			$this->email  	= $linha["email"];
			$this->login  	= $linha["login"];
			$this->tx_senha  = $linha["senha"];
			
		
		}
		
	
		public function totalRegistros($sql){
			$qry = self::executarSQL($sql);
			$total= self::contaDados($qry);
			
			return $total;
		}
		
		
		public function verAdministracao($sql, $i) {
			$qry = mysqli_query($this->conexao, $sql); // usei mysqli ao invés de mysql para se adequar a versões mais recentes do PHP e também para evitar problemas de segurança como injeção de SQL
			
			if (!$qry) {
				die('Erro na consulta: ' . mysqli_error($this->conexao));
			}
			
			$resultado = mysqli_fetch_assoc($qry);
			
			$this->id = $resultado['id_administracao'];
			$this->nome = $resultado['nome'];
			$this->email = $resultado['email'];
			$this->login = $resultado['login'];
			$this->tx_senha = $resultado['senha'];
		}
		
	
	
	}
	class DadosBanner extends conexaoMySQL{
		private $id, $titulo_banner, $alt, $url_banner, $ativo_banner, $imagem_banner;
		
		public function setId($id){
			$this->id = $id;
		}
		public function getId(){
			return $this-> id;
		}
		
		public function getTituloBanner(){
			return $this-> titulo_banner;
		}
		public function getAlt(){
			return $this-> alt;
		}
		public function getUrlBanner(){
			return $this-> url_banner;
		}
		public function getAtivo(){
			return $this-> ativo_banner;
		}
		public function getImagem(){
			return $this-> imagem_banner;
		}
		
		public function mostrarDados(){
			$sql= "SELECT * FROM  banner WHERE id_banner = '$this->id'";
			$qry = self::executarSQL($sql);
			$linha = self::listar($qry);
			
			$this->id  				= $linha["id_banner"];
			$this->titulo_banner  	= $linha["titulo_banner"];
			$this->alt  			= $linha["alt"];
			$this->url_banner  		= $linha["url_banner"];
			$this->ativo_banner  	= $linha["ativo_banner"];
			$this->imagem_banner  	= $linha["imagem_banner"];
		
		}
	
	
	}

	
	class DadosProduto extends conexaoMySQL{
		private $id, $id_categoria, $titulo_produto, $preco, $autor, $duracao,
				$descricao, $conteudo, $slug_produto, $ativo_produto, $imagem_produto;
				
		private $categoria, $slug_categoria;
		
		public function setId($id){
			$this->id = $id;
		}
		public function getId(){
			return $this-> id;
		}	
		
		public function getIdCategoria(){
			return $this-> id_categoria;
		}
		public function getTituloProduto(){
			return $this-> titulo_produto;
		}
		public function getPreco(){
			return $this-> preco;
		}

		public function getAutor(){
			return $this-> autor;
		}		
		public function getDuracao(){
			return $this-> duracao;
		}
		public function getDescricao(){
			return $this-> descricao;
		}
		public function getConteudo(){
			return $this-> conteudo;
		}
		public function getSlugProduto(){
			return $this-> slug_produto;
		}
		public function getAtivoProduto(){
			return $this-> ativo_produto;
		}		
		public function getImagemProduto(){
			return $this-> imagem_produto;
		}
		
		public function getCategoria(){
			return $this-> categoria;
		}
		
		public function getSlugCategoria(){
			return $this-> slug_categoria;
		}

		public function setIdCategoria($id_categoria){
			$this->id_categoria = $id_categoria;
		}
		
		public function setTituloProduto($titulo_produto){
			$this->titulo_produto = $titulo_produto;
		}
		
		public function setPreco($preco){
			$this->preco = $preco;
		}
		
		public function setAutor($autor){
			$this->autor = $autor;
		}
		
		public function setDuracao($duracao){
			$this->duracao = $duracao;
		}
		
		public function setDescricao($descricao){
			$this->descricao = $descricao;
		}
		
		public function setConteudo($conteudo){
			$this->conteudo = $conteudo;
		}
		
		public function setSlugProduto($slug_produto){
			$this->slug_produto = $slug_produto;
		}
		
		public function setAtivoProduto($ativo_produto){
			$this->ativo_produto = $ativo_produto;
		}
		
		public function setImagemProduto($imagem_produto){
			$this->imagem_produto = $imagem_produto;
		}
		
		
		public function mostrarDados(){
			$sql= "SELECT c.*, p.* FROM categoria c,  produto p WHERE c.id_categoria=p.id_categoria and id_produto = '$this->id'";
			$qry = self::executarSQL($sql);
			$linha = self::listar($qry);
			
			$this->id  				= $linha["id_produto"];
			$this->id_categoria  	= $linha["id_categoria"];
			$this->titulo_produto  	= $linha["titulo_produto"];
			$this->preco  			= $linha["preco"];
			$this->autor  			= $linha["autor"];
			$this->duracao  		= $linha["duracao"];
			$this->descricao  		= $linha["descricao"];
			$this->conteudo  		= $linha["conteudo"];
			$this->slug_produto  	= $linha["slug_produto"];
			$this->ativo_produto  	= $linha["ativo_produto"];
			$this->imagem_produto  	= $linha["imagem_produto"];		
			
			$this->categoria  		= $linha["categoria"];
			$this->slug_categoria  	= $linha["slug_categoria"];	
		}
	
		public function totalRegistros($sql){
			$qry = self::executarSQL($sql);
			$total= self::contaDados($qry);
			
			return $total;
		}
		
		
		public function verProdutos($sql)
		{
			$resultado = self::executarSQL($sql);
			$produtos = array();
			while ($linha = self::listar($resultado)) {
				$produto = new DadosProduto();
				$produto->setId($linha['id_produto']);
				$produto->setIdCategoria($linha['id_categoria']);
				$produto->setTituloProduto($linha['titulo_produto']);
				$produto->setPreco($linha['preco']);
				$produto->setAutor($linha['autor']);
				$produto->setDuracao($linha['duracao']);
				$produto->setDescricao($linha['descricao']);
				$produto->setConteudo($linha['conteudo']);
				$produto->setSlugProduto($linha['slug_produto']);
				$produto->setAtivoProduto($linha['ativo_produto']);
				$produto->setImagemProduto($linha['imagem_produto']);
				$produtos[] = $produto;
			}
			return $produtos;
		}
		



		public function listarProdutos($sql_prod){
			define("pg", "http://example.com");
			$total_prod = $this->totalRegistros($sql_prod);
			for($j = 0; $j < $total_prod; $j++){
				$this->verProdutos($sql_prod,);
				$idproduto = $this->getId();
				
				$endereco = pg . "/detalhe/" . $this->getSlugCategoria() . "/" . $this->getSlugProduto() . "/" . $this->getId();
				$img = pg . "/admin/fotos/" . $this->getImagemProduto();
				$prod = $this->getTituloProduto();
				$preco = $this->getPreco();
				$action = pg . "/op_carrinho.php";
				
				echo "        
					<li>                    
						<a href='$endereco'>
							<figure>
								<img src='$img' alt='$prod' width='92' height='139'>
								<figcaption>$prod</figcaption>
							</figure>
							<span>$preco</span>
						</a>
						<form action='$action' method='post'>
							<input type='hidden' name='txt_valor' value='$preco' />
							<input type='hidden' name='id_produto' value='$idproduto' />
							<input type='hidden' name='acao' value='INSERIR' /> 
							<input type='submit' value='' /> 
						</form>
					</li>";            
			} 
		}
		

	}		
		
		class DadosCarrinho extends conexaoMySQL{
		
		private $id,$id_pedido, $id_produto, $valor, $qtde;
		
		private $id_categoria, $titulo_produto, $preco, $autor, $duracao,
				$descricao, $conteudo, $slug_produto, $ativo_produto, $imagem_produto;
		
		public function setId($id){
			$this->id = $id;
		}
		public function getId(){
			return $this-> id;
		}		
		public function getIdCategoria(){
			return $this-> id_categoria;
		}
		public function getTituloProduto(){
			return $this-> titulo_produto;
		}
		public function getPreco(){
			return $this-> preco;
		}
		public function getAtivo(){
			return $this-> ativo_produto;
		}
		public function getAutor(){
			return $this-> autor;
		}		
		public function getDuracao(){
			return $this-> duracao;
		}
		public function getDescricao(){
			return $this-> descricao;
		}
		public function getConteudo(){
			return $this-> conteudo;
		}
		public function getSlugProduto(){
			return $this-> slug_produto;
		}
		public function getAtivoProduto(){
			return $this-> ativo_produto;
		}		
		public function getImagemProduto(){
			return $this-> imagem_produto;
		}

	
		public function getIdPedido(){
			return $this-> id_pedido;
		}
		public function getIdProduto(){
			return $this-> id_produto;
		}
		public function getValor(){
			return $this-> valor;
		}		
		public function getQtde(){
			return $this-> qtde;
		}
		
		public function mostrarDados(){
			$sql= "SELECT c.*, p.* FROM carrinho c, produto p where  c.id_produto = p.id_produto and id_pedido = '$this->id_pedido'";
			$qry = self::executarSQL($sql);
			$linha = self::listar($qry);
			
			$this->id  				= $linha["id_produto"];
			$this->id_categoria  	= $linha["id_categoria"];
			$this->titulo_produto  	= $linha["titulo_produto"];
			$this->preco  			= $linha["preco"];
			$this->autor  			= $linha["autor"];
			$this->duracao  		= $linha["duracao"];
			$this->descricao  		= $linha["descricao"];
			$this->conteudo  		= $linha["conteudo"];
			$this->slug_produto  	= $linha["slug_produto"];
			$this->ativo_produto  	= $linha["ativo_produto"];
			$this->imagem_produto  	= $linha["imagem_produto"];	
			
			$this->id_pedido  	= $linha["id_pedido"];	
			$this->id_produto  	= $linha["id_produto"];	
			$this->valor  		= $linha["valor"];	
			$this->qtde  		= $linha["qtde"];	
			
		}
	
		public function totalRegistros($sql){
			$qry = self::executarSQL($sql);
			$total= self::contaDados($qry);
			
			return $total;
		}
		
		
		public function verCarrinho($sql, $i) {
			$qry = mysqli_query($this->conexao, $sql);
			
			//tabela de produto
			$this->id              = mysqli_fetch_field_direct($qry, $i)->id_produto;
			$this->id_categoria   = mysqli_fetch_field_direct($qry, $i)->id_categoria;
			$this->titulo_produto = mysqli_fetch_field_direct($qry, $i)->titulo_produto;
			$this->preco           = mysqli_fetch_field_direct($qry, $i)->preco;
			$this->autor           = mysqli_fetch_field_direct($qry, $i)->autor;
			$this->duracao         = mysqli_fetch_field_direct($qry, $i)->duracao;
			$this->descricao       = mysqli_fetch_field_direct($qry, $i)->descricao;
			$this->conteudo        = mysqli_fetch_field_direct($qry, $i)->conteudo;
			$this->slug_produto    = mysqli_fetch_field_direct($qry, $i)->slug_produto;
			$this->ativo_produto   = mysqli_fetch_field_direct($qry, $i)->ativo_produto;
			$this->imagem_produto  = mysqli_fetch_field_direct($qry, $i)->imagem_produto;
			//tabela do carrinho
			$this->id_pedido       = mysqli_fetch_field_direct($qry, $i)->id_pedido;
			$this->id_produto      = mysqli_fetch_field_direct($qry, $i)->id_produto;
			$this->valor           = mysqli_fetch_field_direct($qry, $i)->valor;
			$this->qtde            = mysqli_fetch_field_direct($qry, $i)->qtde;
		}
		
		
		
	}
	
	class DadosVenda extends conexaoMySQL{
		
		private $id,$id_cliente, $data_venda, $codigo_rastreamento, $pago, $status_venda;
		
		
		
		public function setId($id){
			$this->id = $id;
		}
		public function getId(){
			return $this-> id;
		}		
		public function getIdCliente(){
			return $this-> id_cliente;
		}
		public function getDataVenda(){
			return $this-> data_venda;
		}
		public function getCodigoRastreamento(){
			return $this-> codigo_rastreamento;
		}
		public function getPago(){
			return $this-> pago;
		}
		public function getStatusVenda(){
			return $this-> status_venda;
		}	

		
		public function mostrarDados(){
			$sql= "SELECT * FROM venda WHERE id_venda = '$this->id'";
			$qry = self::executarSQL($sql);
			$linha = self::listar($qry);			
		
			
			$this->id  					= $linha["id_venda"];
			$this->id_cliente  			= $linha["id_cliente"];
			$this->data_venda  			= $linha["data_venda"];
			$this->codigo_rastreamento 	= $linha["codigo_rastreamento"];
			$this->pago  				= $linha["pago"];
			$this->status_venda  		= $linha["status_venda"];				
			
		}
	
		public function totalRegistros($sql){
			$qry = self::executarSQL($sql);
			$total= self::contaDados($qry);
			
			return $total;
		}
		
		
		
		public function verVenda($sql, $i) {
			$qry = mysqli_query($this->conexao, $sql);
			
			$this->id                  = mysqli_fetch_array($qry)[$i]['id_venda'];
			$this->id_cliente          = mysqli_fetch_array($qry)[$i]['id_cliente'];
			$this->data_venda          = mysqli_fetch_array($qry)[$i]['data_venda'];
			$this->codigo_rastreamento = mysqli_fetch_array($qry)[$i]['codigo_rastreamento'];
			$this->pago                = mysqli_fetch_array($qry)[$i]['pago'];
			$this->status_venda        = mysqli_fetch_array($qry)[$i]['status_venda'];                     
		}
		
		
	}
	
	
		class DadosItensVenda extends conexaoMySQL{
		
		private $id,$id_venda, $id_produto, $valor, $qtde;
		
		private $id_categoria, $titulo_produto, $preco, $autor, $duracao,
				$descricao, $conteudo, $slug_produto, $ativo_produto, $imagem_produto;
		
		public function setId($id){
			$this->id = $id;
		}
		public function getId(){
			return $this-> id;
		}		
		public function getIdCategoria(){
			return $this-> id_categoria;
		}
		public function getTituloProduto(){
			return $this-> titulo_produto;
		}
		public function getPreco(){
			return $this-> preco;
		}
		public function getAtivo(){
			return $this-> ativo_produto;
		}
		public function getAutor(){
			return $this-> autor;
		}		
		public function getDuracao(){
			return $this-> duracao;
		}
		public function getDescricao(){
			return $this-> descricao;
		}
		public function getConteudo(){
			return $this-> conteudo;
		}
		public function getSlugProduto(){
			return $this-> slug_produto;
		}
		public function getAtivoProduto(){
			return $this-> ativo_produto;
		}		
		public function getImagemProduto(){
			return $this-> imagem_produto;
		}

	
		public function getIdVenda(){
			return $this-> id_venda;
		}
		public function getIdProduto(){
			return $this-> id_produto;
		}
		public function getValor(){
			return $this-> valor;
		}		
		public function getQtde(){
			return $this-> qtde;
		}
		
		public function mostrarDados(){
			$sql= "SELECT i.*, p.* FROM itens_venda i, produto p where  i.id_produto = p.id_produto and id_venda = '$this->id_venda'";
			$qry = self::executarSQL($sql);
			$linha = self::listar($qry);
			
			$this->id  				= $linha["id_item"];
			$this->id_categoria  	= $linha["id_categoria"];
			$this->titulo_produto  	= $linha["titulo_produto"];
			$this->preco  			= $linha["preco"];
			$this->autor  			= $linha["autor"];
			$this->duracao  		= $linha["duracao"];
			$this->descricao  		= $linha["descricao"];
			$this->conteudo  		= $linha["conteudo"];
			$this->slug_produto  	= $linha["slug_produto"];
			$this->ativo_produto  	= $linha["ativo_produto"];
			$this->imagem_produto  	= $linha["imagem_produto"];	
			
			$this->id_venda  	= $linha["id_venda"];	
			$this->id_produto  	= $linha["id_produto"];	
			$this->valor  		= $linha["valor_item"];	
			$this->qtde  		= $linha["qtde"];	
			
		}
	
		
		public function totalRegistros($sql){
			$qry = self::executarSQL($sql);
			$total= self::contaDados($qry);

			
			return $total;
		}
		
		public function somaVendas($id){
			$sql = "SELECT SUM(valor_item * qtde) as totalVenda FROM itens_venda WHERE id_venda= '$id'";
			$qry = self::executarSQL($sql);
			$linha = self::listar($qry);
			
			return $linha["totalVenda"];
		}
		
		public function verItens($sql, $i) {
			$qry = mysqli_query($this->conexao, $sql);
		
			// tabela de produto
			$this->id              = mysqli_fetch_assoc($qry)['id_item'];
			$this->id_categoria   = mysqli_fetch_assoc($qry)['id_categoria'];
			$this->titulo_produto = mysqli_fetch_assoc($qry)['titulo_produto'];
			$this->preco           = mysqli_fetch_assoc($qry)['preco'];
			$this->autor           = mysqli_fetch_assoc($qry)['autor'];
			$this->duracao         = mysqli_fetch_assoc($qry)['duracao'];
			$this->descricao       = mysqli_fetch_assoc($qry)['descricao'];
			$this->conteudo        = mysqli_fetch_assoc($qry)['conteudo'];
			$this->slug_produto    = mysqli_fetch_assoc($qry)['slug_produto'];
			$this->ativo_produto   = mysqli_fetch_assoc($qry)['ativo_produto'];
			$this->imagem_produto  = mysqli_fetch_assoc($qry)['imagem_produto'];
			// tabela do carrinho
			$this->id_venda        = mysqli_fetch_assoc($qry)['id_venda'];
			$this->id_produto      = mysqli_fetch_assoc($qry)['id_produto'];
			$this->valor           = mysqli_fetch_assoc($qry)['valor_item'];
			$this->qtde            = mysqli_fetch_assoc($qry)['qtde'];
		}
		
		
	}
?>

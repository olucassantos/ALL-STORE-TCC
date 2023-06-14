	<?php
	include_once ("conexaoMySQL.php");
	    class DadosCategoria extends conexaoMySQL{
		private $id, $categoria, $slug_categoria, $ordem_categoria, $ativo_categoria;
		
		public function setId($id){
		   $this->id = $id;
		}
	
		public function getId(){
		   return $this->id;
		}
	
		public function getCategorias() {
		   return $this->categoria;
		}
	
		public function getOrdemCategoria() {
			return $this->ordem_categoria;
		 }
	
		 public function getAtivo() {
			return $this->ativo_categoria;
		}
		public function mostrarDados(){
		   $sql= "SELECT * FROM categoria WHERE id_categoria = '$this->id'";
		   $qry = self::executarSQL($sql);
		   $linha = self::listar($qry);
	
		   if ($linha) {
			  $this->id                = $linha["id_categoria"];
			  $this->categoria         = $linha["categoria"];
			  $this->slug_categoria    = $linha["slug_categoria"];
			  $this->ordem_categoria   = $linha["ordem_categoria"];
			  $this->ativo_categoria   = $linha["ativo_categoria"];
		   }
		}
	
		public function comboCategoria($id){
		   $sql= "SELECT * FROM categoria ";
		   $qry = self::executarSQL($sql);
	
		   while($linha = self::listar($qry)){
			  $selecionado = "";
			  if($id==$linha["id_categoria"]){
				 $selecionado = "selected='selected' ";
			  }
	
			  echo "<option value='{$linha['id_categoria']}' $selecionado>{$linha['categoria']}</option>\n";
		   }
		}
	
		public function totalRegistros($sql){
		   $qry = self::executarSQL($sql);
		   $total= self::contaDados($qry);
	
		   return $total;
		}
	
		public function verCategorias($sql) {
		   $qry = self::executarSQL($sql);
		   $this->categoria = array();
		   while ($linha = self::listar($qry)) {
			  $this->categoria[] = $linha;
		   }
		}
	
		public function getTodasCategorias() {
			$sql= "SELECT * FROM categoria";
			$qry = self::executarSQL($sql);
			$categorias = array();
			while($linha = mysqli_fetch_assoc($qry)){
				$categorias[] = $linha;
			}
			return $categorias;
		}
	}

    ?>
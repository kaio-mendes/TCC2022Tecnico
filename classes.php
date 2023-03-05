<?php
	
	class Peca {
		private $codigo;
		private $nome;
		private $valor;
		private $categoria;
		private $obs;
		private $img;
		
		public function __construct($codigo, $nome, $valor, $categoria, $obs, $img) {
			$this->codigo=$codigo;
			$this->nome=$nome;
			$this->valor=$valor;
			$this->categoria=$categoria;
			$this->img=$img;
			$this->obs=$obs;
		}
		
		public function getCodigo() {
			return $this->codigo;
		}
		
		public function setCodigo($codigo) {
			$this->codigo=$codigo;
		}
		
		public function getNome() {
			return $this->nome;
		}
		
		public function setNome($nome) {
			$this->nome=$nome;
		}
		
		public function getValor() {
			return $this->valor;
		}
		
		public function setValor($valor) {
			$this->valor=$valor;
		}
		
		public function getCategoria() {
			return $this->categoria;
		}
		
		public function setCategoria($categoria) {
			$this->categoria=$categoria;
		}
		
		public function getObs() {
			return $this->obs;
		}
		
		public function setObs($obs) {
			$this->obs=$obs;
		}
		
		public function getImg() {
			return $this->img;
		}
		
		public function setImg($img) {
			$this->img=$img;
		}
	}
	
		
?>

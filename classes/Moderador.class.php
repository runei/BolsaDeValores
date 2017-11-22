<?php

include_once("Instituicao.class.php");

class Moderador{

	private $id;
	private $nome;
	private $data_nasc;
	private $instituicao;
	private $email;
	private $data_ini;
	private $data_fim;
	private $descricao;
	private $protocolo;
	private $funcao;

	public function __construct()
	{
		$this->instituicao = new Instituicao();
	}

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getData_nasc(){
		return $this->data_nasc;
	}

	public function setData_nasc($data_nasc){
		$this->data_nasc = $data_nasc;
	}

	public function getInstituicao(){
		return $this->instituicao;
	}

	public function setInstituicao($instituicao){
		$this->instituicao = $instituicao;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getData_ini(){
		return $this->data_ini;
	}

	public function setData_ini($data_ini){
		$this->data_ini = $data_ini;
	}

	public function getData_fim(){
		return $this->data_fim;
	}

	public function setData_fim($data_fim){
		$this->data_fim = $data_fim;
	}

	public function getDescricao(){
		return $this->descricao;
	}

	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}

	public function getProtocolo(){
		$res = 1;
		$new = 1;
		$ant = 1;
		for ($i = 2; $i < $this->protocolo; $i++) {
			$res = $new + $ant;
			$ant = $new;
			$new = $res;
		}
		return $res;
	}

	public function setProtocolo($protocolo){
		$this->protocolo = $protocolo;
	}

	public function getFuncao(){
		return $this->funcao;
	}

	public function setFuncao($funcao){
		$this->funcao = $funcao;
	}

}

?>


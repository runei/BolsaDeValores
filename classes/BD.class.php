<?php
include_once("config.inc.php");

class BD {
	private $mysqli;

	public function __construct(){
		// var_dump(1);die();
		$this->mysqli = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DBNAME);
		//$this->mysqli->select_db($this->mysqli);
		$this->mysqli->set_charset('utf8');
		$this->mysqli->autocommit(true);
	}

	//TODO
	public function prepare($sql)
	{
		$this->mysqli->prepare($sql);
	}

	//TODO
	public function execute()
	{
		$this->mysqli->execute();
		$retorno = array();
		$dados = array();
		while($retorno = @mysqli_fetch_array($query)) {
			$dados[] = $retorno;
		}
		return $dados;
	}

	public function consulta($select){
		$query = $this->mysqli->query($select);
		$retorno = array();
		$dados = array();
		while($retorno = @mysqli_fetch_array($query)) {
			$dados[] = $retorno;
		}
		return $dados;
	}

	public function altera($sql){
		$RetornoExecucao = $this->mysqli->query($sql);
		if (!$RetornoExecucao)
		{
			printf("Erro de SQL: %s\r\n", $this->mysqli->error);
			echo $sql;
			die();
		}
		return $RetornoExecucao;
	}

	public function __destruct(){
		$this->mysqli->close();
	}
}
?>
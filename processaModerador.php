<?php
include_once("classes/Moderador.class.php");
include_once("classes/ControleModerador.class.php");

error_reporting(E_ALL); ini_set('display_errors', '1');
//echo 123;die();

$moderador = new Moderador();
$controleModerador = new ControleModerador();
//insere no bd
if(isset($_POST["botao"])){
	$acao = "inserir";
	if($_POST["botao"] == "Alterar"){
		$moderador->setId($_POST["id"]);
		$acao = "alterar";
	}
	$moderador->setId($_POST["id"]);
	$moderador->setNome($_POST["nome"]);
	$moderador->setData_nasc($_POST["data_nasc"]);
	$moderador->setEmail($_POST["email"]);
	$moderador->setData_ini($_POST["data_ini"]);
	$moderador->setData_fim($_POST["data_fim"]);
	$moderador->setDescricao($_POST["descricao"]);
	$moderador->setProtocolo($_POST["protocolo"]);
	$moderador->setFuncao($_POST["funcao"]);
	$moderador->getInstituicao()->setId($_POST["instituicao"]);

	if ($controleModerador->existeMesmoNome($moderador))
	{

	}
	else
	{
		$res = $controleModerador->controleAcao($acao, $moderador);
		// var_dump($res);
		header("location: moderadores.php");
	}
}
elseif (isset($_GET["id"])) {
	$moderador->setId($_GET["id"]);
	$res = $controleModerador->controleAcao("deletar", $moderador);
	header("location: moderadores.php");
}
?>
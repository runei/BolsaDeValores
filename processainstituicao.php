<?php
include_once("classes/Instituicao.class.php");
include_once("classes/ControleInstituicao.class.php");

error_reporting(E_ALL); ini_set('display_errors', '1');
//echo 123;die();

$instituicao = new Instituicao();
$controleInstituicao = new ControleInstituicao();
//insere no bd
if(isset($_POST["botao"])){
	$acao = "inserir";
	if($_POST["botao"] == "Alterar"){
		$instituicao->setId($_POST["id"]);
		$acao = "alterar";
	}
	$instituicao->setNome($_POST["nome"]);
	$instituicao->setCnpj($_POST["cnpj"]);
	$instituicao->setCep($_POST["cep"]);
	$instituicao->setEndereco($_POST["endereco"]);
	$instituicao->setNumero($_POST["numero"]);
	$instituicao->setComplemento($_POST["complemento"]);
	$instituicao->setBairro($_POST["bairro"]);
	$instituicao->setCidade($_POST["cidade"]);
	$instituicao->setUf($_POST["uf"]);
	$instituicao->setTipo($_POST["tipo"]);
	$res = $controleInstituicao->controleAcao($acao, $instituicao);
	// var_dump($res);
	header("location: instituicoes.php");
}
elseif (isset($_GET["id"])) {
	$instituicao->setId($_GET["id"]);
	$res = $controleInstituicao->controleAcao("deletar", $instituicao);
	header("location: instituicoes.php");
}
?>
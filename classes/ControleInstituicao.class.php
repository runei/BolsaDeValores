<?php

include_once("BD.class.php");
include_once("Instituicao.class.php");


class ControleInstituicao {

		public function selecionar(){
			$bd = new BD();
			$instituicoes = array();
			$res = $bd->consulta("SELECT id, nome, cnpj, cep, endereco, numero, complemento, bairro, cidade, uf, tipo FROM instituicoes");
			if(is_array($res)){
				foreach($res as $linha){
					$instituicao = new Instituicao();
					$instituicao->setId($linha["id"]);
					$instituicao->setNome($linha["nome"]);
					$instituicao->setCnpj($linha["cnpj"]);
					$instituicao->setCep($linha["cep"]);
					$instituicao->setEndereco($linha["endereco"]);
					$instituicao->setNumero($linha["numero"]);
					$instituicao->setComplemento($linha["complemento"]);
					$instituicao->setBairro($linha["bairro"]);
					$instituicao->setCidade($linha["cidade"]);
					$instituicao->setUf($linha["uf"]);
					$instituicao->setTipo($linha["tipo"]);
					$instituicoes[] = $instituicao;
				}
			}
			return $instituicoes;
		}

		public function selecionarPorId($id)
		{
			$instituicao = new Instituicao();
			$instituicao->setId($id);
			return $this->selecionarUm($instituicao);
		}

		public function selecionarUm($instituicao){
			$bd = new BD();
			$sql = sprintf("select id, nome, cnpj, complemento, cep, endereco, numero, bairro, cidade, uf, tipo from instituicoes where id = %d", $instituicao->getId());
			// echo $sql;
			$res = $bd->consulta($sql);
			if(is_array($res)){
				$linha = $res[0];
				$instituicaoUm = new Instituicao();
				$instituicaoUm->setId($linha["id"]);
				$instituicaoUm->setNome($linha["nome"]);
				$instituicaoUm->setCnpj($linha["cnpj"]);
				$instituicaoUm->setCep($linha["cep"]);
				$instituicaoUm->setEndereco($linha["endereco"]);
				$instituicaoUm->setNumero($linha["numero"]);
				$instituicaoUm->setComplemento($linha["complemento"]);
				$instituicaoUm->setBairro($linha["bairro"]);
				$instituicaoUm->setCidade($linha["cidade"]);
				$instituicaoUm->setUf($linha["uf"]);
				$instituicaoUm->setTipo($linha["tipo"]);
			}
			return $instituicaoUm;
		}

		public function controleAcao($acao, $instituicao){
			if ($acao == "inserir"){
				$res = $this->inserir($instituicao);
			}
			elseif($acao == "alterar"){
				$res = $this->alterar($instituicao);
			}
			elseif($acao == "deletar"){
				$res = $this->deletar($instituicao);
			}
			return $res;
		}

		public function inserir(&$instituicao){
			$bd = new BD();
			$sql = "INSERT INTO instituicoes (nome, CNPJ, CEP, endereco, numero, complemento, bairro, cidade, uf, tipo) VALUES('".$instituicao->getNome()."', '".$instituicao->getCnpj()."', '".$instituicao->getCep()."', '".$instituicao->getEndereco()."', '".$instituicao->getNumero()."', '".$instituicao->getComplemento()."', '".$instituicao->getBairro()."', '".$instituicao->getCidade()."', '".$instituicao->getUf()."', '".$instituicao->getTipo()."')";
			// var_dump($sql);die();
			$res = $bd->altera($sql);
			return $res;
		}

		public function alterar($instituicao){
			$bd = new BD();
			$sql = "UPDATE instituicoes SET nome = '".$instituicao->getNome()."', cnpj = '".$instituicao->getCnpj()."', cep = '".$instituicao->getCep()."', numero = '".$instituicao->getNumero()."', endereco = '".$instituicao->getEndereco()."', complemento = '".$instituicao->getComplemento()."', bairro = '".$instituicao->getBairro()."', cidade = '".$instituicao->getCidade()."', uf = '".$instituicao->getUf()."', tipo = '".$instituicao->getTipo()."' WHERE id = '".$instituicao->getId()."'";
			$res = $bd->altera($sql);
			return $res;
		}

		public function deletar($instituicao){
			$bd = new BD();
			$res = $bd->altera("DELETE FROM instituicoes WHERE id = ".$instituicao->getId());
			return $res;
		}

}
?>

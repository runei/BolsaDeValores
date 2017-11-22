<?php

include_once("BD.class.php");
include_once("Moderador.class.php");
include_once("ControleInstituicao.class.php");


class ControleModerador {

		public function existeMesmoNome($moderador)
		{
			$bd = new BD();
			$res = $bd->consulta("SELECT count(*) as total FROM moderadores WHERE nome=".$moderador->getNome()."");
			return $res[0]["total"] > 0;
		}

		public function selecionarPorId($id)
		{
			$moderador = new Moderador();
			$moderador->setId($id);
			return $this->selecionarUm($moderador);
		}

		public function selecionar(){
			$bd = new BD();
			$moderadores = array();
			$ci = new ControleInstituicao();
			$res = $bd->consulta("SELECT id, nome, data_nasc, id_instituicao, email, data_ini, data_fim, descricao, protocolo, funcao FROM moderadores");
			if(is_array($res)){
				foreach($res as $linha){
					$moderador = new Moderador();
					$moderador->setId($linha["id"]);
					$moderador->setNome($linha["nome"]);
					$moderador->setData_nasc($linha["data_nasc"]);
					$moderador->setEmail($linha["email"]);
					$moderador->setData_ini($linha["data_ini"]);
					$moderador->setData_fim($linha["data_fim"]);
					$moderador->setDescricao($linha["descricao"]);
					$moderador->setProtocolo($linha["protocolo"]);
					$moderador->setFuncao($linha["funcao"]);
					$moderador->setInstituicao($ci->selecionarPorId($linha["id_instituicao"]));
					$moderadores[] = $moderador;
				}
			}
			return $moderadores;
		}

		public function selecionarUm($moderador){
			$bd = new BD();
			$ci = new ControleInstituicao();
			$res = $bd->consulta("select id, nome, data_nasc, data_fim, id_instituicao, email, data_ini, descricao, protocolo, funcao from moderadores where id = ".$moderador->getId());
			if(is_array($res)){
				$linha = $res[0];
				$moderadorUm = new Moderador();
				$moderadorUm->setId($linha["id"]);
				$moderadorUm->setNome($linha["nome"]);
				$moderadorUm->setData_nasc($linha["data_nasc"]);
				$moderadorUm->setEmail($linha["email"]);
				$moderadorUm->setData_ini($linha["data_ini"]);
				$moderadorUm->setData_fim($linha["data_fim"]);
				$moderadorUm->setDescricao($linha["descricao"]);
				$moderadorUm->setProtocolo($linha["protocolo"]);
				$moderadorUm->setFuncao($linha["funcao"]);
				$moderadorUm->setInstituicao($ci->selecionarPorId($linha["id_instituicao"]));
			}
			return $moderadorUm;
		}

		public function controleAcao($acao, $moderador){
			if ($acao == "inserir"){
				$res = $this->inserir($moderador);
			}
			elseif($acao == "alterar"){
				$res = $this->alterar($moderador);
			}
			elseif($acao == "deletar"){
				$res = $this->deletar($moderador);
			}
			return $res;
		}

		public function inserir(&$moderador){
			$bd = new BD();
			$sql = "INSERT INTO moderadores (nome, data_nasc, id_instituicao, email, data_ini, data_fim, descricao, protocolo, funcao)
					select '".$moderador->getNome()."', '".$moderador->getData_nasc()."', '".$moderador->getInstituicao()->getId()."', '".$moderador->getEmail()."', '".$moderador->getData_ini()."', '".$moderador->getData_fim()."', '".$moderador->getDescricao()."', max(protocolo) + 1, '".$moderador->getFuncao()."' from moderadores";
			// var_dump($sql);die();
			$res = $bd->altera($sql);
			return $res;
		}

		public function alterar($moderador){
			$bd = new BD();
			$sql = "UPDATE moderadores SET nome = '".$moderador->getNome()."', data_nasc = '".$moderador->getData_nasc()."', id_instituicao = '".$moderador->getInstituicao()->getId()."', data_ini = '".$moderador->getData_ini()."', email = '".$moderador->getEmail()."', data_fim = '".$moderador->getData_fim()."', descricao = '".$moderador->getDescricao()."', funcao = '".$moderador->getFuncao()."' WHERE id = ".$moderador->getId();
			$res = $bd->altera($sql);
			return $res;
		}

		public function deletar($moderador){
			$bd = new BD();
			$res = $bd->altera("DELETE FROM moderadores WHERE id = ".$moderador->getId());
			return $res;
		}

}
?>

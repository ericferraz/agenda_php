<?php
/**
 *
 * Classe que representa a camada de persistência de nosso Equipamento.
 *
 * Esta classe recebe os dados da camada de Negocio (MODEL) e com eles monta as
 * SQLs e as QUERYs necessrias para o funcionamento correto do processo
 * solicitado.
 *@autor Eric Luiz Ferras<ciencias_exatas@hotmail.com.br>
 *@version 1.0
 *@since  17/03/2014
 */
require_once '../../interfaces/InterfaceCRUD.php';
final class ContatoDAO extends AbstractDAO implements InterfaceCRUD{

	public function __construct(){
	}
	/**
	 * (non-PHPdoc)
	 * @see InterfaceCRUD::inserir()
	 */
	public function  inserir(AbstractPO $po) {
		if ($po == null) {
			throw new InserirException("Objeto encontra-se nulo.");
		}

		try{
			//objeto
			$meuPo = null;
			// Verificando se o obj é do tipo ContatoPO
			if($po instanceof ContatoPO ){
				$meuPo = $po;
			}else{
				throw new InserirException("Objeto não condiz com o contexto: ".$po);
			}
		}catch (Exception $e){
			throw new Exception(" Erro desconhecido ".$e->getMessage());
		}

		try{
			//define a sql
			$sql = "INSERT INTO
		 		contatos SET 
		 		codigo=?,nome=?,sobrenome=?,data_nascimento=?,email=?,observacao=? ";

			//prepara a consulta
			$stmt = $this->abrirConexao(true)->prepare($sql);

			//substitui os ? pelos valores
			$stmt->bindParam(1, $meuPo->getCodigo());
			$stmt->bindParam(2, $meuPo->getNome());
			$stmt->bindParam(3, $meuPo->getSobreNome());
			$stmt->bindParam(4, $meuPo->getDataNascimento());
			$stmt->bindParam(5, $meuPo->getEmail());
			$stmt->bindParam(6, $meuPo->getObservacao());

			//executa a sql
			$stmt->execute();
			$this->fecharConexao();
		}catch (InserirException $e){
			throw new InserirException("Falha ao inserir: ".$e);
		}
	}

	/**
	 * (non-PHPdoc)
	 * @see InterfaceCRUD::alterar()
	 */
	public function alterar(AbstractPO $po) {
		if ($po == null) {
			throw new AlterarException("Objeto encontra-se nulo.",$po);
		}

		try{
			//objeto
			$meuPo = null;
			// Verificando se o obj é do tipo ContatoPO
			if($po instanceof ContatoPO ){
				$meuPo = $po;
			}else{
				throw new AlterarException("Objeto não condiz com o contexto: ".$po);
			}
		}catch (Exception $e){
			throw new Exception(" Erro desconhecido ".$e->getMessage());
		}

		try{
			//define a sql
			$sql = "UPDATE 
		 		contatos SET 
		 		codigo=?,nome=?,sobrenome=?,data_nascimento=?,email=?,observacao=? 
		 		WHERE id=?";

			//prepara a consulta
			$stmt = $this->abrirConexao(true)->prepare($sql);
			

			//substitui os ? pelos valores
			$stmt->bindParam(1, $meuPo->getCodigo());
			$stmt->bindParam(2, $meuPo->getNome());
			$stmt->bindParam(3, $meuPo->getSobreNome());
			$stmt->bindParam(4, $meuPo->getDataNascimento());
			$stmt->bindParam(5, $meuPo->getEmail());
			$stmt->bindParam(6, $meuPo->getObservacao());
			$stmt->bindParam(7, $meuPo->getId());

			//executa a sql
			$stmt->execute();
			$this->fecharConexao();

		}catch (InserirException $e){
			throw new InserirException("Falha ao editar: ".$e);
		}
	}

	/**
	 * (non-PHPdoc)
	 * @see InterfaceCRUD::buscarTodos()
	 */
	public function buscarTodos(){

		$meuPo = null;
		try{
			//define a sql
			$sql = "SELECT
		 		    id,codigo,nome,sobrenome,data_nascimento,email,observacao
		 		 FROM
		 		   contatos LIMIT 30000 ";

			//prepara a consulta
			$stmt = $this->abrirConexao(true)->query($sql);

			//executa a sql
			$stmt->execute();

		 //conta o número de ocorrências da consulta
		 $linhas = $stmt->rowCount();
		 if($linhas<1){
		 	return $meuPo;
		 }

		 $meuPo = $stmt->fetchAll();
		 //fecha a conexão
		$this->fecharConexao();
		 return $meuPo;
		}catch(Exception $e){
			throw new FiltrarException("Falha ao pesquisar registros: ",$e);
		}
	}

	/**
	 * (non-PHPdoc)
	 * @see InterfaceCRUD::buscarPorCodigo()
	 */
	public function buscarPorCodigo(AbstractPO $po){

		if ($po == null) {
			throw new FiltrarException("Objeto encontra-se nulo.");
		}

		try{
			//objeto
			$meuPo = null;
			// Verificando se o obj é do tipo ContatoPO
			if($po instanceof ContatoPO ){
				$meuPo = $po;
			}else{
				throw new FiltrarException("Objeto não condiz com o contexto: ".$po);
			}
		}catch (Exception $e){
			throw new Exception(" Erro desconhecido ".$e->getMessage());
		}
		try{
			//define a sql
			$sql = "SELECT
		 		    id,codigo,nome,sobrenome,data_nascimento,email,observacao
		 		 FROM
		 		   contatos WHERE id=? ";

			//prepara a consulta
			$stmt = $this->abrirConexao(true)->prepare($sql);
				
			$stmt->bindParam(1,$meuPo->getId());

			//executa a sql
			$stmt->execute();

		 //conta o número de ocorrências da consulta
		 $linhas = $stmt->rowCount();
		 if($linhas<1){
		 	return $meuPo;
		 }

		 $meuPo = $stmt->fetchAll();
		 //fecha a conexão
			$this->fecharConexao();
		 return $meuPo;
		}catch(Exception $e){
			throw new FiltrarException("Falha ao pesquisar registros: ",$e);
		}
	}

	/**
	 * (non-PHPdoc)
	 * @see InterfaceCRUD::excluir()
	 */
	public function excluir(AbstractPO $po){
		if ($po == null) {
			throw new ExcluirException("Objeto encontra-se nulo.",$po);
		}

		try{
			//objeto
			$meuPo = null;
			// Verificando se o obj é do tipo ContatoPO
			if($po instanceof ContatoPO ){
				$meuPo = $po;
			}else{
				throw new ExcluirException("Objeto não condiz com o contexto: ".$po);
			}
		}catch (Exception $e){
			throw new Exception(" Erro desconhecido ".$e->getMessage());
		}

		try{

			$sql = "DELETE FROM contatos WHERE id=? ";
			//abre a conexão e prepara a consulta
			$stmt = $this->abrirConexao(true)->prepare($sql);

			$stmt->bindParam(1, $meuPo->getId());
			$stmt->execute();
			$this->fecharConexao();
		}catch (Exception $e){
			throw new ExcluirException("Falha ao deletar ",$e);
		}
	}

}
?>
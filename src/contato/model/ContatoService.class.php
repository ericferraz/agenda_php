<?php
/**
 * Classe responsável por conter as regras de negócios do nosso sistema. Esta
 * classe representa a camada Model(M) do MVC. Será nesta Classe que iremos
 * pegar os dados dos campos da tela( V ) e preencher o nosso PO(M) enviando-o á
 * camada DAO para consultas e persistencias. Neste nosso sistema, todos os
 * tratamentos de exceção estarão centralizados aqui, juntamente com as
 * possíveis validações de campos e regras.
 *
 * @author Eric
 * @since 17/03/2014
 * @version 1.0
 *
 */
class ContatoService {
	/**
	 * Atributo responsável por possibilitar o acesso da Camada Model a Camada
	 */
	private $dao;

	public function __construct($id){
		$this->dao = new ContatoDAO();
	}

	/**
	 * Método responsável por trabalhar os dados antes de mandar para a Camada
	 * de persitência(DAO).
	 *
	 * @param ContatoPO
	 *            po - Objeto contendo todos os dados a serem persistidos.
	 * @throws ApplicationException
	 *             -Caso ocorra algum erro na aplicação.
	 * @param po
	 */
	public function inserir(ContatoPO $po)  {
		/** Criando um Bloco de Transação */
		try {
			/* Abre a conexão */
			$this->dao->abrirConexao(AbstractDAO::$PERSISTENCIA);
			$this->dao->inserir($po);
			$this->dao->fecharConexao();
		} catch (ConexaoException $e) {
			throw new ApplicationException($e->getMessage(), $e);
		} catch (InserirException $e) {

			throw new ApplicationException($e->getMessage(), $e);
		} catch (Exception $e) {

			throw new ApplicationException("Erro desconhecido", $e);
		} 
	}//fim do inserir
	
	/**
	 * Método responsável por trabalhar os dados antes de mandar para a Camada
	 * de persitência(DAO).
	 *
	 * @param ContatoPO
	 *            po - Objeto contendo todos os dados a serem persistidos.
	 * @throws ApplicationException
	 *             -Caso ocorra algum erro na aplicação.
	 * @param po
	 */
	public function alterar(ContatoPO $po)  {
		/** Criando um Bloco de Transação */
		try {
			/* Abre a conexão */
			$this->dao->abrirConexao(AbstractDAO::$PERSISTENCIA);
			$this->dao->alterar($po);
			$this->dao->fecharConexao();
		} catch (ConexaoException $e) {
			throw new ApplicationException($e->getMessage(), $e);
		} catch (AlterarException $e) {

			throw new ApplicationException($e->getMessage(), $e);
		} catch (Exception $e) {

			throw new ApplicationException("Erro desconhecido", $e);
		} 
	}//fim do inserir

	/**
	 *
	 *Método responsável por buscar todos registros
	 *@autor Eric Luiz Ferras<ciencias_exatas@hotmail.com.br>
	 *@version 1.0
	 *@since 17/03/2014
	 *@param
	 * @return objeto
	 */
	public function buscarTodos(){
		/** Criando um Bloco de Transação */
		try {
			/* Abre a conexão */
			$this->dao->abrirConexao(AbstractDAO::$CONSULTA);
			$this->dao->fecharConexao();
			return $this->dao->buscarTodos();
		}catch (ConexaoException $e) {
			throw new ApplicationException($e->getMessage(), $e);
		} catch (FiltrarException $e) {
			throw new ApplicationException($e->getMessage(), $e);
		} 
	}
	/**
	 *
	 *Método responsável por buscar registro por id(codigo)
	 *@autor Eric Luiz Ferras<ciencias_exatas@hotmail.com.br>
	 *@version 1.0
	 *@since 19/03/2014
	 *@param
	 * @return the bare_field_name
	 */
	public function buscarCodigo(ContatoPO $po){
		/** Criando um Bloco de Transação */
		try {
			/* Abre a conexão */
			$this->dao->abrirConexao(AbstractDAO::$CONSULTA);
			$this->dao->fecharConexao();
			return $this->dao->buscarPorCodigo($po);
		}catch (ConexaoException $e) {
			throw new ApplicationException($e->getMessage(), $e);
		} catch (FiltrarException $e) {
			throw new ApplicationException($e->getMessage(), $e);
		} catch (Exception $e) {
			throw new ApplicationException("Erro desconhecido", $e);
		} 

	}

	/**
	 *
	 *Método responsável por excluir registros da base de dados
	 *@autor Eric Luiz Ferras<ciencias_exatas@hotmail.com.br>
	 *@version 1.0
	 *@since 19/03/2014
	 *@param
	 * @return the bare_field_name
	 */
	public function excluir(ContatoPO $po){
		/** Criando um Bloco de Transação */
		try {
			/* Abre a conexão */
			$this->dao->abrirConexao(AbstractDAO::$PERSISTENCIA);
			$this->dao->excluir($po);
			$this->dao->fecharConexao();
		} catch (ConexaoException $e) {
			throw new ApplicationException($e->getMessage(), $e);
		} catch (ExcluirException $e) {
			throw new ApplicationException($e->getMessage(), $e);
		} catch (Exception $e) {

			throw new ApplicationException("Erro desconhecido", $e);
		}
	}


}
?>
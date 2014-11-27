<?php
/**
 * Classe respons�vel por conter as regras de neg�cios do nosso sistema. Esta
 * classe representa a camada Model(M) do MVC. Ser� nesta Classe que iremos
 * pegar os dados dos campos da tela( V ) e preencher o nosso PO(M) enviando-o �
 * camada DAO para consultas e persistencias. Neste nosso sistema, todos os
 * tratamentos de exce��o estar�o centralizados aqui, juntamente com as
 * poss�veis valida��es de campos e regras.
 *
 * @author Eric
 * @since 17/03/2014
 * @version 1.0
 *
 */
class ContatoService {
	/**
	 * Atributo respons�vel por possibilitar o acesso da Camada Model a Camada
	 */
	private $dao;

	public function __construct($id){
		$this->dao = new ContatoDAO();
	}

	/**
	 * M�todo respons�vel por trabalhar os dados antes de mandar para a Camada
	 * de persit�ncia(DAO).
	 *
	 * @param ContatoPO
	 *            po - Objeto contendo todos os dados a serem persistidos.
	 * @throws ApplicationException
	 *             -Caso ocorra algum erro na aplica��o.
	 * @param po
	 */
	public function inserir(ContatoPO $po)  {
		/** Criando um Bloco de Transa��o */
		try {
			/* Abre a conex�o */
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
	 * M�todo respons�vel por trabalhar os dados antes de mandar para a Camada
	 * de persit�ncia(DAO).
	 *
	 * @param ContatoPO
	 *            po - Objeto contendo todos os dados a serem persistidos.
	 * @throws ApplicationException
	 *             -Caso ocorra algum erro na aplica��o.
	 * @param po
	 */
	public function alterar(ContatoPO $po)  {
		/** Criando um Bloco de Transa��o */
		try {
			/* Abre a conex�o */
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
	 *M�todo respons�vel por buscar todos registros
	 *@autor Eric Luiz Ferras<ciencias_exatas@hotmail.com.br>
	 *@version 1.0
	 *@since 17/03/2014
	 *@param
	 * @return objeto
	 */
	public function buscarTodos(){
		/** Criando um Bloco de Transa��o */
		try {
			/* Abre a conex�o */
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
	 *M�todo respons�vel por buscar registro por id(codigo)
	 *@autor Eric Luiz Ferras<ciencias_exatas@hotmail.com.br>
	 *@version 1.0
	 *@since 19/03/2014
	 *@param
	 * @return the bare_field_name
	 */
	public function buscarCodigo(ContatoPO $po){
		/** Criando um Bloco de Transa��o */
		try {
			/* Abre a conex�o */
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
	 *M�todo respons�vel por excluir registros da base de dados
	 *@autor Eric Luiz Ferras<ciencias_exatas@hotmail.com.br>
	 *@version 1.0
	 *@since 19/03/2014
	 *@param
	 * @return the bare_field_name
	 */
	public function excluir(ContatoPO $po){
		/** Criando um Bloco de Transa��o */
		try {
			/* Abre a conex�o */
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
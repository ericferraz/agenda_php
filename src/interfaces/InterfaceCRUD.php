<?php
/**
 * Interface respons�vel por representar os m�todos de um CRUD.
 * Interface usada para exemplificar na pratica o uso de Interfaces.
 * @author Eric Luiz Ferras <ciencias_exatas@hotmail.com.br>
 * @since 09/03/2014 10:58:42
 * @version 1.0
 */

interface InterfaceCRUD{

	/**
	 *
	 *M�todo respons�vel por inserir registro na base de dados
	 *@autor Eric Luiz Ferras<ciencias_exatas@hotmail.com.br>
	 *@version 1.0
	 *@since 16/03/2014
	 *@param AbstractPO
	 * @return void
	 */
	public function inserir(AbstractPO $po);


	/**
	 *
	 *M�todo respons�vel por alterar registro na base de dados
	 *@autor Eric Luiz Ferras<ciencias_exatas@hotmail.com.br>
	 *@version 1.0
	 *@since 16/03/2014
	 *@param AbstractPO
	 * @return void
	 */
	public function alterar(AbstractPO $po);

	/**
	 *
	 *M�todo respons�vel por excluir registro da base de dados
	 *@autor Eric Luiz Ferras<ciencias_exatas@hotmail.com.br>
	 *@version 1.0
	 *@since 16/03/2014
	 *@param AbstractPO
	 * @return void
	 */
	public function excluir(AbstractPO $po);


	/**
	 *
	 *M�todo respons�vel por buscar todos registros da base de dados
	 *@autor Eric Luiz Ferras<ciencias_exatas@hotmail.com.br>
	 *@version 1.0
	 *@since 16/03/2014
	 * @return Objeto
	 */
	public function buscarTodos();
	
	/**
	 *
	 *M�todo respons�vel por buscar por c�digo registros da base de dados
	 *@autor Eric Luiz Ferras<ciencias_exatas@hotmail.com.br>
	 *@version 1.0
	 *@since 16/03/2014
	 *@param AbstractPO
	 * @return Objeto
	 */
	public function buscarPorCodigo(AbstractPO $po);

	/**
	 * M�todo respons�vel por abrir uma conex�o com o banco de dados.
	 *@autor Eric Luiz Ferras<ciencias_exatas@hotmail.com.br>
	 *@version 1.0
	 *@since 16/03/2014
	 * @param boolean persistencia - Informa se a conex�o ser� utilizada para persistencia.
	 * @throws ConexaoException
	 *
	 * @param persistencia true or false
	 * @throws ConexaoException
	 */
	public function abrirConexao($persistencia);

	/**
	 *
	 * M�todo respons�vel por fechar uma conex�o com o banco de dados.
	 *
	 * @param boolean persistencia - Informa se a conex�o ser� utilizada para persistencia.
	 * @throws ConexaoException
	 *
	 * @throws ConexaoException
	 *
	 * @autor Eric Luiz Ferras<ciencias_exatas@hotmail.com.br>
	 *@version 1.0
	 *@since 16/03/2014
	 */
	public function  fecharConexao();

}
?>
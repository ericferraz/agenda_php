<?php
/**
 * Interface responsável por representar os métodos de um CRUD.
 * Interface usada para exemplificar na pratica o uso de Interfaces.
 * @author Eric Luiz Ferras <ciencias_exatas@hotmail.com.br>
 * @since 09/03/2014 10:58:42
 * @version 1.0
 */

interface InterfaceCRUD{

	/**
	 *
	 *Método responsável por inserir registro na base de dados
	 *@autor Eric Luiz Ferras<ciencias_exatas@hotmail.com.br>
	 *@version 1.0
	 *@since 16/03/2014
	 *@param AbstractPO
	 * @return void
	 */
	public function inserir(AbstractPO $po);


	/**
	 *
	 *Método responsável por alterar registro na base de dados
	 *@autor Eric Luiz Ferras<ciencias_exatas@hotmail.com.br>
	 *@version 1.0
	 *@since 16/03/2014
	 *@param AbstractPO
	 * @return void
	 */
	public function alterar(AbstractPO $po);

	/**
	 *
	 *Método responsável por excluir registro da base de dados
	 *@autor Eric Luiz Ferras<ciencias_exatas@hotmail.com.br>
	 *@version 1.0
	 *@since 16/03/2014
	 *@param AbstractPO
	 * @return void
	 */
	public function excluir(AbstractPO $po);


	/**
	 *
	 *Método responsável por buscar todos registros da base de dados
	 *@autor Eric Luiz Ferras<ciencias_exatas@hotmail.com.br>
	 *@version 1.0
	 *@since 16/03/2014
	 * @return Objeto
	 */
	public function buscarTodos();
	
	/**
	 *
	 *Método responsável por buscar por código registros da base de dados
	 *@autor Eric Luiz Ferras<ciencias_exatas@hotmail.com.br>
	 *@version 1.0
	 *@since 16/03/2014
	 *@param AbstractPO
	 * @return Objeto
	 */
	public function buscarPorCodigo(AbstractPO $po);

	/**
	 * Método responsável por abrir uma conexão com o banco de dados.
	 *@autor Eric Luiz Ferras<ciencias_exatas@hotmail.com.br>
	 *@version 1.0
	 *@since 16/03/2014
	 * @param boolean persistencia - Informa se a conexão será utilizada para persistencia.
	 * @throws ConexaoException
	 *
	 * @param persistencia true or false
	 * @throws ConexaoException
	 */
	public function abrirConexao($persistencia);

	/**
	 *
	 * Método responsável por fechar uma conexão com o banco de dados.
	 *
	 * @param boolean persistencia - Informa se a conexão será utilizada para persistencia.
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
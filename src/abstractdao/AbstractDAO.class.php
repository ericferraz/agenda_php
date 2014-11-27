<?php
/**
 *
 *Classe que representa todos da'os do sistema
 *@autor Eric Luiz Ferras<ciencias_exatas@hotmail.com.br>
 *@version 1.0
 *@since  17/03/2014
 */
abstract class AbstractDAO{

	/**
	 * Atributo utilizado para armazenar uma conexгo
	 */
	private  $conexao;

	/* usado para saber quando uma conexгo deve ser comitada ou nгo */
	private  $persistencia;

	public static  $PERSISTENCIA = true;
	public static  $CONSULTA     = false;

	/**
	 * Mйtodo responsбvel por adquirir uma conexгo vбlida e nгo auto-commit.
	 *
	 * @author Eric
	 * @since 17/03/2014
	 * @param boolean persistencia - Informa se a conexгo criada sera de
	 *        transaзгo.
	 * @throws ConexaoException
	 * @param persistencia
	 */

	public function abrirConexao($persistencia) {
		$this->persistencia = $persistencia;
		// Se o a instancia nгo existe eu faзo uma
		if(!isset( $this->conexao )){
			try {
				$this->conexao = new PDO("mysql:host=localhost;dbname=sua_base_dados", "root", "");
				echo "Conexao aberta com sucesso";
			} catch ( ConexaoException $e ) {
				throw new ConexaoException("Possivel problema ao adquirir uma conexгo." .$e);
			}
		}
			
		//define que a conexгo nгo serб commitada automaticamente

		// Se jб existe instancia na memуria eu retorno ela
		return $this->conexao;
	}


	/**
	 * Mйtodo responsбvel por fechar a conexгo corrente (conexao).
	 *
	 * @throws ConexaoException
	 *             - Caso ocorra um erro ao fechar a conexгo
	 * @version 1.0
	 */
	public  function  fecharConexao() {
		try {
			if ($this->conexao != null && !$this->conexao->errorInfo()) {
				try {
					/**
					 * se for persistкncia, realiza o commit
					 */
					if ($this->persistencia) {
						$this->conexao->commit();
					}
				} catch (Exception $e) {
						
					try {
						$this->conexao->rollBack();
					} catch (Exception $e) {
						$this->conexao=null;
						$this->persistencia=false;
						throw new RollbackException("Falha no rollback".$e);
					}
				}
			}

		} catch (Exception $e) {
			throw new ConexaoException("Problema ao fechar conexao." .$e);
		}
	}
}

?>
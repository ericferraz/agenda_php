<?php
/**
 * Classe que representa a interligação do Sistema com a camada de Front-end.
 *
 * Aqui entende-se como camada de Front-end toda classe e/ou arquivos criados
 * especialmente para a visualização.
 *
 * Ex: Framework Zend, Framework CI, php GTK,Magento
 * etc...
 *
 * @author Eric
 * @since 17/03/2014
 * @version 1.0
 *
 */
class ContatoFacade{
	/**
	 * Atributo responsável por possibilitar o acesso da Camada Controller a
	 * Camada MODEL
	 */
	private $service;

	/**
	 * Declaração do atributo que auxilia o <b>SINGLETON</b>
	 */
	private static  $instance;

	// **************************************************** \\
	// ************ APLICANDO SINGLETON ******************* \\
	// **************************************************** \\

	/**
	 * Método construtor resposável por inicializar os atributos e/ou executar
	 * qualquer ação no momento da criação da classe.
	 *
	 * <b>SINGLETON</b> Construtor privado que permite apenas que a propria
	 * classe se instancie. Isso para garantir o SINGLETON.
	 *
	 */
	private function __construct()  {
		$this->service = new ContatoService(null);
	}

	/**
	 * <b>SINGLETON</b> Método responsável por retornar uma instancia de
	 * ContatoFacade.
	 *
	 * @return ContatoFacade instance - Uma instancia da própria Classe.
	 * @return
	 * @throws ApplicationException
	 */
	public static function  getInstance()  {
		if (self::$instance == null) {
			self::$instance = new ContatoFacade();
		}
		return self::$instance;
	}

	// ************************FIM********************** \\
	// ************ APLICANDO SINGLETON ***************** \\
	// **************************FIM********************** \\

	/**
	 *
	 Método responsável por iniciar o processo de inserção com a aplicação.
	 * Este método tem como objetivo pegar os dados vindo como parametro e
	 * realizar conversões para seus respectivos tipo na Camada de Negócio.
	 *
	 * Este método faz parte da classe Facade que esta localizada na camada de
	 * Controle da Aplicação; as classes localizadas nesta camada são
	 * responsável por interligar a camada de Visualização(V) com a camada de
	 * Negocio(M).
	 *
	 * @param codigo
	 * @param nome
	 * @param sobrenome
	 * @param dataNascimento
	 * @param email
	 * @param observacao
	 *
	 * @author Eric Luiz Ferras <ciencias_exatas@hotmail.com.br>
	 * @since 16/03/2014 09:11:08
	 * @version 1.0
	 * @throws ApplicationException
	 */
	public function  inserir($codigo,$nome, $sobrenome, $dataNascimento, $email, $observacao) {

		$po = new ContatoPO(null, $codigo, $nome, $sobrenome,$dataNascimento, $email, $observacao);
		$this->service->inserir($po);

	}
	
/**
	 *
	 Método responsável por iniciar o processo de alterar com a aplicação.
	 * Este método tem como objetivo pegar os dados vindo como parametro e
	 * realizar conversões para seus respectivos tipo na Camada de Negócio.
	 *
	 * Este método faz parte da classe Facade que esta localizada na camada de
	 * Controle da Aplicação; as classes localizadas nesta camada são
	 * responsável por interligar a camada de Visualização(V) com a camada de
	 * Negocio(M).
	 *
	 * @param codigo
	 * @param nome
	 * @param sobrenome
	 * @param dataNascimento
	 * @param email
	 * @param observacao
	 *
	 * @author Eric Luiz Ferras <ciencias_exatas@hotmail.com.br>
	 * @since 16/03/2014 09:11:08
	 * @version 1.0
	 * @throws ApplicationException
	 */
	public function alterar($id,$codigo,$nome, $sobrenome, $dataNascimento, $email, $observacao) {
		try{
		$po = new ContatoPO($id, $codigo, $nome, $sobrenome,$dataNascimento, $email, $observacao);
		$this->service->alterar($po);
		}catch(AlterarException $e){
			throw new AlterarException("Falha ao alterar", $e);
		}
	}

	/**
	 *
	 *Método responsável por buscar todos registros
	 *@autor Eric Luiz Ferras<ciencias_exatas@hotmail.com.br>
	 *@version 1.0
	 *@since 17/03/2014
	 *@param
	 * @return the bare_field_name
	 */
	public function buscarTodos(){

		try{
			$retorno = $this->service->buscarTodos();
		 return $retorno;
		}catch (Exception $e){
			throw new FiltrarException("Falha ao buscar", $e);
		}
	}

	/**
	 *
	 *Método responsável por buscar por codigo(id)
	 *@autor Eric Luiz Ferras<ciencias_exatas@hotmail.com.br>
	 *@version 1.0
	 *@since 19/03/2014
	 *@param
	 * @return the bare_field_name
	 */
	public function  buscarPorCodigo($id){
		try{
		$po = new ContatoPO($id);
		$retorno = $this->service->buscarCodigo($po);
		return $retorno;
	}catch(Exception $e){
		throw new FiltrarException("Falha ao buscar", $e);
	}
}
/**
 *
 *Método responsável por exceluir
 *@autor Eric Luiz Ferras<ciencias_exatas@hotmail.com.br>
 *@version 1.0
 *@since 19/03/2014
 *@param
 * @return the bare_field_name
 */
public  function excluir($id){
	$po = new ContatoPO($id);
	$this->service->excluir($po);
}


}
?>
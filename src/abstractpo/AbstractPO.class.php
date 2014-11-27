<?php
/**
 * 
*Classe representa a mãe de todos po's do sistema 
*@autor Eric Luiz Ferras<ciencias_exatas@hotmail.com.br>
*@version 1.0
*@since  16/03/2014
 */
abstract  class AbstractPO{
	private $id;
	
	/**
	 * 
	*Método contrutor do objeto
	*@autor Eric Luiz Ferras<ciencias_exatas@hotmail.com.br>
	*@version 1.0
	*@since 16/03/2014
	*@param $id
	*@return void
	 */
	public function __construct($id){
		$this->setId($id);
	}
	
	/**
	 * 
	*Método responsável por setar o id
	*@autor Eric Luiz Ferras<ciencias_exatas@hotmail.com.br>
	*@version 1.0
	*@since 16/03/2014
	*@param $id
	 * @return void
	 */
	public function setId($id){
		$this->id = $id;
	}
	
	/**
	*Método get reponsável por retornar o atributo id
	*@autor Eric Luiz Ferras<ciencias_exatas@hotmail.com.br>
	*@version 1.0
	*@since 16/03/2014
	*@param
	 * @return int $id
	 */
	public function getId(){
		return $this->id;
	}
	
	/**
	 * 
	*Método mágico toString
	*@autor Eric Luiz Ferras<ciencias_exatas@hotmail.com.br>
	*@version 1.0
	*@since 16/03/2014
	*@param
	 * @return atributos do objeto
	 */
	public function __toString(){
		return "Id:".$this->id;
	}
	
}
?>
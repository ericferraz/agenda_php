<?php
/**
 * 
*Classe representa a m�e de todos po's do sistema 
*@autor Eric Luiz Ferras<ciencias_exatas@hotmail.com.br>
*@version 1.0
*@since  16/03/2014
 */
abstract  class AbstractPO{
	private $id;
	
	/**
	 * 
	*M�todo contrutor do objeto
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
	*M�todo respons�vel por setar o id
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
	*M�todo get repons�vel por retornar o atributo id
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
	*M�todo m�gico toString
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
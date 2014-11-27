<?php
/**
 *
 *Classe responsável por todas exceções de alteração no sistema
 *@autor Eric Luiz Ferras<ciencias_exatas@hotmail.com.br>
 *@version 1.0
 *@since  16/03/2014
 */
final class AlterarException extends Exception{
	
 public  function __construct($mensagem){
 	parent::__construct($mensagem);
 }
 	
public function __construct($mensagem,$codigo){
	parent::__construct($mensagem, $codigo);
}
	
}
?>
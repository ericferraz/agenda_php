<?php
/**
 * fun��o autoload para incluir classes de v�rios diret�rios sem precisar incluir manualmente
 * @author Eric Ferraz
 * @since 23/02/2014
 * @version 1.0
 * @version 2.0 adicionado diret�rios da camada mvc
 */
 function __autoload($classes) {
 	
    /* diret�rio principal das classes */
 	
 	/**
 	exten��o dos meus arquivos
 	 */
 	$extencao 	  = ".class";
 	$exetencaoFim = ".php";
 	
 	//subdiret�rios
    $diretorios = array('../../abstractdao/','../../abstractpo/','../../exceptions/','../controller/','../dao/','../model/');
    
    foreach ($diretorios as $valor) {
        if (file_exists($valor . $classes .$extencao.$exetencaoFim)) {
            require_once $valor . $classes .$extencao.$exetencaoFim;
        }
        
    }
}
?>
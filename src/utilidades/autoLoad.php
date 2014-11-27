<?php
/**
 * funзгo autoload para incluir classes de vбrios diretуrios sem precisar incluir manualmente
 * @author Eric Ferraz
 * @since 23/02/2014
 * @version 1.0
 * @version 2.0 adicionado diretуrios da camada mvc
 */
 function __autoload($classes) {
 	
    /* diretуrio principal das classes */
 	
 	/**
 	extenзгo dos meus arquivos
 	 */
 	$extencao 	  = ".class";
 	$exetencaoFim = ".php";
 	
 	//subdiretуrios
    $diretorios = array('../../abstractdao/','../../abstractpo/','../../exceptions/','../controller/','../dao/','../model/');
    
    foreach ($diretorios as $valor) {
        if (file_exists($valor . $classes .$extencao.$exetencaoFim)) {
            require_once $valor . $classes .$extencao.$exetencaoFim;
        }
        
    }
}
?>
<?php
/*
* Smarty plugin
* ————————————————————-
* File:     function.page_recurse.php
* Type:     function
* Name:     page_recurse
* Purpose:  prints out elements of an array recursively
* ————————————————————-
*/

function smarty_function_page_recurse($params, &$smarty){
	$markup = '';
	if(isset($params['option'])){
		switch (strtolower($params['option'])){
			case 'dropdown':
				foreach ($params['array'] as $element) {								
					if(isset($params['selected']) && $element['id_page']==$params['selected']){
						$markup .= '<option value="'.$element['id_page'].'" selected=selected style="padding-left:'.intval(($element['depth']-1)*20).'px;">';
					}else{
						$markup .= '<option value="'.$element['id_page'].'" style="padding-left:'.intval(($element['depth']-1)*20).'px;">';
					}
					$markup .= $element['title'];		  	
					if ($element['child']) {
						$markup .= smarty_function_page_recurse(array('array' => $element['pages'], 'option' => 'dropdown', 'selected' => $params['selected']), $smarty);
					}	
					$markup .= '</option>';
				}
				break;
			case 'list':
				
				break;
		}
	
	}
	
	return $markup;	
}
?>
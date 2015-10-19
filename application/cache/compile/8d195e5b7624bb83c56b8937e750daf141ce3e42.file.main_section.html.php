<?php /* Smarty version Smarty-3.0.6, created on 2015-10-14 11:17:30
         compiled from "C:\xampp\htdocs\samplewebsite30\skin/vii_ChangeThisToProjectName/include/main_section.html" */ ?>
<?php /*%%SmartyHeaderCode:27816561e1daa040737-92671922%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d195e5b7624bb83c56b8937e750daf141ce3e42' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samplewebsite30\\skin/vii_ChangeThisToProjectName/include/main_section.html',
      1 => 1444808047,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27816561e1daa040737-92671922',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('_page_curr_page')->value['sections']){?>
	<?php $_smarty_tpl->tpl_vars["layout"] = new Smarty_variable($_smarty_tpl->getVariable('_page_curr_page')->value['layout'], null, null);?>
	<?php $_smarty_tpl->tpl_vars["format"] = new Smarty_variable(explode("_",$_smarty_tpl->getVariable('layout')->value['format']), null, null);?>
	<?php $_smarty_tpl->tpl_vars["sections"] = new Smarty_variable($_smarty_tpl->getVariable('_page_curr_page')->value['sections'], null, null);?>
	<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('layout')->value['html_file'], $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?> 
<?php }?>
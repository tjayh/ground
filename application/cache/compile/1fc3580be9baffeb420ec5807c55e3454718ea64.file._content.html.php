<?php /* Smarty version Smarty-3.0.6, created on 2015-10-14 10:54:48
         compiled from "C:\xampp\htdocs\samplewebsite30\skin/default/modules/pages/_content.html" */ ?>
<?php /*%%SmartyHeaderCode:7812561e18585c9c18-64761582%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1fc3580be9baffeb420ec5807c55e3454718ea64' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samplewebsite30\\skin/default/modules/pages/_content.html',
      1 => 1441241029,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7812561e18585c9c18-64761582',
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
<?php }else{ ?>
	<div id="_page_content"><?php echo html_entity_decode($_smarty_tpl->getVariable('_page')->value['content'],@ENT_QUOTES,'utf-8');?>
 <!-- |strip_tags:false --></div>
<?php }?>
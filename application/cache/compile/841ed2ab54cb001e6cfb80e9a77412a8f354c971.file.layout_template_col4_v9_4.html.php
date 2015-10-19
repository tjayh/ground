<?php /* Smarty version Smarty-3.0.6, created on 2015-10-14 11:17:30
         compiled from "C:\xampp\htdocs\samplewebsite30\skin//default/includes/layout_templates/layout_template_col4_v9_4.html" */ ?>
<?php /*%%SmartyHeaderCode:9153561e1daa0a2f00-38535786%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '841ed2ab54cb001e6cfb80e9a77412a8f354c971' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samplewebsite30\\skin//default/includes/layout_templates/layout_template_col4_v9_4.html',
      1 => 1441246758,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9153561e1daa0a2f00-38535786',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1>3 WIDTH - 4 columns</h1>

<div class="col-md-3">
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('sections')->value['col0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<div class="<?php echo $_smarty_tpl->tpl_vars['item']->value['section_class'];?>
">
	<?php $_smarty_tpl->tpl_vars["html_file"] = new Smarty_variable($_smarty_tpl->tpl_vars['item']->value['template_html'], null, null);?>
	<?php $_smarty_tpl->tpl_vars["colnum"] = new Smarty_variable('col0', null, null);?>
	<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('html_file')->value), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	</div>
	<?php }} ?>
</div>
<div class="col-md-3">
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('sections')->value['col1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<div class="<?php echo $_smarty_tpl->tpl_vars['item']->value['section_class'];?>
">
	<?php $_smarty_tpl->tpl_vars["html_file"] = new Smarty_variable($_smarty_tpl->tpl_vars['item']->value['template_html'], null, null);?>
	<?php $_smarty_tpl->tpl_vars["colnum"] = new Smarty_variable('col1', null, null);?>
	<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('html_file')->value), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	</div>
	<?php }} ?>
</div>
<div class="col-md-3">
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('sections')->value['col2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<div class="<?php echo $_smarty_tpl->tpl_vars['item']->value['section_class'];?>
">
	<?php $_smarty_tpl->tpl_vars["html_file"] = new Smarty_variable($_smarty_tpl->tpl_vars['item']->value['template_html'], null, null);?>
	<?php $_smarty_tpl->tpl_vars["colnum"] = new Smarty_variable('col2', null, null);?>
	<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('html_file')->value), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	</div>
	<?php }} ?>
</div>
<div class="col-md-3">
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('sections')->value['col3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<div class="<?php echo $_smarty_tpl->tpl_vars['item']->value['section_class'];?>
">
	<?php $_smarty_tpl->tpl_vars["html_file"] = new Smarty_variable($_smarty_tpl->tpl_vars['item']->value['template_html'], null, null);?>
	<?php $_smarty_tpl->tpl_vars["colnum"] = new Smarty_variable('col3', null, null);?>
	<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('html_file')->value), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	</div>
	<?php }} ?>
</div>

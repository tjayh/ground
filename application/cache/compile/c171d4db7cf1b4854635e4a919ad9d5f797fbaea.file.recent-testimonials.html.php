<?php /* Smarty version Smarty-3.0.6, created on 2015-10-22 06:40:09
         compiled from "C:\xampp\htdocs\viiworks_cms_git\skin/vii_ChangeThisToProjectName/include/recent-testimonials.html" */ ?>
<?php /*%%SmartyHeaderCode:465562868a92c5076-12567148%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c171d4db7cf1b4854635e4a919ad9d5f797fbaea' => 
    array (
      0 => 'C:\\xampp\\htdocs\\viiworks_cms_git\\skin/vii_ChangeThisToProjectName/include/recent-testimonials.html',
      1 => 1445488792,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '465562868a92c5076-12567148',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h4>Recent Testimonials Per Item</h4>
<div class="row">
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('_testimonials')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<div class="col-md-3">
	<p><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</p>
	<p><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</p>
	<p><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
</p>
	<p><?php echo $_smarty_tpl->tpl_vars['item']->value['message'];?>
</p>
	</div>
	<?php }} ?>
</div>
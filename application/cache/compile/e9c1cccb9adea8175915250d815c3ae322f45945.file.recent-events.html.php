<?php /* Smarty version Smarty-3.0.6, created on 2015-10-22 06:40:09
         compiled from "C:\xampp\htdocs\viiworks_cms_git\skin/vii_ChangeThisToProjectName/include/recent-events.html" */ ?>
<?php /*%%SmartyHeaderCode:18523562868a918c823-10825068%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9c1cccb9adea8175915250d815c3ae322f45945' => 
    array (
      0 => 'C:\\xampp\\htdocs\\viiworks_cms_git\\skin/vii_ChangeThisToProjectName/include/recent-events.html',
      1 => 1445488792,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18523562868a918c823-10825068',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h4>Recent Events Per Item</h4>
<div class="row">
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('_events')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<div class="col-md-3">
	<p><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</p>
	<p><?php echo $_smarty_tpl->tpl_vars['item']->value['image_title'];?>
</p>
	<p><?php echo $_smarty_tpl->tpl_vars['item']->value['image_sub_title'];?>
</p>
	<p><?php echo strip_tags($_smarty_tpl->tpl_vars['item']->value['image_desc']);?>
</p>
	<p><?php if ($_smarty_tpl->tpl_vars['item']->value['image_src_thumb']){?><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['image_src_thumb'];?>
" style="max-height: 150px; max-width: 150px;"><?php }?></p>
	<p><?php if ($_smarty_tpl->tpl_vars['item']->value['image_src']){?><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['image_src'];?>
" style="max-height: 150px; max-width: 150px;"><?php }?></p>
	<p><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['image_link'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['image_link'];?>
</a></p>
	</div>
	<?php }} ?>
</div>
<?php /* Smarty version Smarty-3.0.6, created on 2015-10-14 11:17:30
         compiled from "C:\xampp\htdocs\samplewebsite30\skin/vii_ChangeThisToProjectName/include/recent-events.html" */ ?>
<?php /*%%SmartyHeaderCode:2553561e1daa7c19b0-03690101%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e27c1581ba28fa3d37b1edcc16e006cffe453e85' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samplewebsite30\\skin/vii_ChangeThisToProjectName/include/recent-events.html',
      1 => 1444808047,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2553561e1daa7c19b0-03690101',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
 <h4>Recent Events Per Item</h4>
<!-- <div class="row">
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
</div> -->



<div class="row">
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('_events')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
    <div class="col-md-3">
        <h1><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['image_link'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['image_title'];?>
</a></h1>
        <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['image_link'];?>
/"><?php if ($_smarty_tpl->tpl_vars['item']->value['image_src_thumb']){?><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['image_src_thumb'];?>
" class="img-responsive"><?php }?></a>
        <br/>
        <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['image_link'];?>
/"><?php if ($_smarty_tpl->tpl_vars['item']->value['image_src']){?><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['image_src'];?>
" class="img-responsive"><?php }?></a>
        <h4><?php echo $_smarty_tpl->tpl_vars['item']->value['image_sub_title'];?>
</h4>
        <p><?php echo strip_tags($_smarty_tpl->tpl_vars['item']->value['image_desc']);?>
</p>
    </div>
    <?php }} ?>
</div>
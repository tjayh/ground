<?php /* Smarty version Smarty-3.0.6, created on 2015-10-14 11:17:30
         compiled from "C:\xampp\htdocs\samplewebsite30\skin/vii_ChangeThisToProjectName/include/recent-gallery.html" */ ?>
<?php /*%%SmartyHeaderCode:19774561e1daa8a0b96-20555120%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f46a47d9f964294230cd148ab9d9b508e5ae3702' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samplewebsite30\\skin/vii_ChangeThisToProjectName/include/recent-gallery.html',
      1 => 1444808047,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19774561e1daa8a0b96-20555120',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
 <h4>Recent Gallery Per Category</h4>
<!-- <div class="row">
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('_gallery')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<div class="col-md-3">
	<p><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</p>
	<p><?php echo $_smarty_tpl->tpl_vars['item']->value['category_title'];?>
</p>
	<p><?php echo $_smarty_tpl->tpl_vars['item']->value['category_sub_title'];?>
</p>
	<p><?php echo strip_tags($_smarty_tpl->tpl_vars['item']->value['category_desc']);?>
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
 $_from = $_smarty_tpl->getVariable('_gallery')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
        <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['image_link'];?>
" class="thumbnail">
					<?php if ($_smarty_tpl->tpl_vars['item']->value['image_src']){?><img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['item']->value['image_src'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['category_title'];?>
"><?php }?>
				</a>
    </div>
    <?php }} ?>
</div>
<?php /* Smarty version Smarty-3.0.6, created on 2015-10-22 06:40:09
         compiled from "C:\xampp\htdocs\viiworks_cms_git\skin/vii_ChangeThisToProjectName/include/footer.html" */ ?>
<?php /*%%SmartyHeaderCode:3895562868a9355919-82970195%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac70f7f87d82abff4fbaed166a467154030c2b33' => 
    array (
      0 => 'C:\\xampp\\htdocs\\viiworks_cms_git\\skin/vii_ChangeThisToProjectName/include/footer.html',
      1 => 1445488792,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3895562868a9355919-82970195',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'application/libraries/smarty/plugins\modifier.date_format.php';
?><div class="row">
    <div class="col-md-4">
        <h4>About Us</h4>
        <p><?php echo $_smarty_tpl->getVariable('_page_about')->value;?>
</p>
    </div>
    <div class="col-md-4">
        <h4>Recent News Per Item</h4>
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('_news')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
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
			<?php }} ?> 
    </div>
    <div class="col-md-4">
        <h4>Contact Us</h4>
        <div class="list"> <i class="icon-phone"></i> Phone: <?php echo $_smarty_tpl->getVariable('_contact_no')->value;?>

            <hr /> <i class="icon-envelope-alt"></i> Email: <?php echo $_smarty_tpl->getVariable('_contact_email')->value;?>

            <hr /> <i class="icon-home"></i> Address: <?php echo $_smarty_tpl->getVariable('_contact_address')->value;?>

		</div>
    </div>
</div>
<hr />
<div class="row">
    <div class="col-md-12">
        <p class="copy"> Copyright &copy; <?php echo smarty_modifier_date_format(time(),"%Y");?>
 <a href="<?php echo $_smarty_tpl->getVariable('base_url')->value;?>
"><?php echo $_smarty_tpl->getVariable('_site_title')->value;?>
</a>
        </p>
    </div>
</div>
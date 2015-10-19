<?php /* Smarty version Smarty-3.0.6, created on 2015-10-14 11:17:29
         compiled from "C:\xampp\htdocs\samplewebsite30\skin/vii_ChangeThisToProjectName/include/slider.html" */ ?>
<?php /*%%SmartyHeaderCode:15563561e1da9eb9b79-64163674%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f6f7add4a9b1938e2d63827a8939fd5153db313' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samplewebsite30\\skin/vii_ChangeThisToProjectName/include/slider.html',
      1 => 1444808047,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15563561e1da9eb9b79-64163674',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'application/libraries/smarty/plugins\modifier.date_format.php';
?><!-- <div class="flexslider">
	<ul class="slides">
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('_banner')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		<li> 
			<p><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</p>
			<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['image_src'];?>
"/>
			<h1><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['image_src2'];?>
" style="max-height: 150px; max-width: 150px;"/></h1>
			<h2><?php echo $_smarty_tpl->tpl_vars['item']->value['image_title'];?>
</h2>
			<h3><?php echo $_smarty_tpl->tpl_vars['item']->value['image_sub_title'];?>
</h3>
			<h4><?php echo $_smarty_tpl->tpl_vars['item']->value['image_sub_title2'];?>
</h4>
			<h5><?php echo $_smarty_tpl->tpl_vars['item']->value['image_desc'];?>
</h5>
			<h6><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['date']);?>
</h6>
			<h7><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['image_link'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['image_link'];?>
</a></h7>
		</li>
		<?php }} ?>
	</ul>
</div>
 -->

<section class="slider">
    <div class="flexslider">
        <ul class="slides">
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('_banner')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
            <li style="background: url('<?php echo $_smarty_tpl->tpl_vars['item']->value['image_src'];?>
') center center no-repeat">
                <div class="slide-bg-container">
                    <img class="slide-bg hidden-lg" src="<?php echo $_smarty_tpl->tpl_vars['item']->value['image_src'];?>
" />
                </div>
                <!--<p class="flex-caption">Adventurer Cheesecake Brownie</p>-->
            </li>
            <?php }} ?>
        </ul>
    </div>
</section>





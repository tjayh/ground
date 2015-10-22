<?php /* Smarty version Smarty-3.0.6, created on 2015-10-22 06:40:07
         compiled from "C:\xampp\htdocs\viiworks_cms_git\skin/vii_ChangeThisToProjectName/include/header-nav.html" */ ?>
<?php /*%%SmartyHeaderCode:22681562868a79063c8-02403116%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '84c71929f276e737d23bcbfa2231fc750ee6fbb7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\viiworks_cms_git\\skin/vii_ChangeThisToProjectName/include/header-nav.html',
      1 => 1445488792,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22681562868a79063c8-02403116',
  'function' => 
  array (
    'navmenu' => 
    array (
      'parameter' => 
      array (
        'level' => '0',
      ),
      'compiled' => '',
    ),
  ),
  'has_nocache_code' => 0,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!function_exists('smarty_template_function_navmenu')) {
    function smarty_template_function_navmenu($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->template_functions['navmenu']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable(trim($value,'\''));};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
	<?php  $_smarty_tpl->tpl_vars['element'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['element']->key => $_smarty_tpl->tpl_vars['element']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['element']->key;
?>
		<?php if (count($_smarty_tpl->tpl_vars['element']->value['child'])>0){?>
		<li class="dropdown"> <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_smarty_tpl->tpl_vars['element']->value['title'];?>
<b class="caret"></b></a>
			<ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
				<?php smarty_template_function_navmenu($_smarty_tpl,array('data'=>$_smarty_tpl->tpl_vars['element']->value['child'],'level'=>$_smarty_tpl->getVariable('level')->value+1));?>

			</ul>
		</li>
		<?php }else{ ?>
			<li>
				<a href="<?php if ($_smarty_tpl->tpl_vars['element']->value['absolute_link']!=''){?><?php echo $_smarty_tpl->getVariable('base_url')->value;?>
<?php echo $_smarty_tpl->tpl_vars['element']->value['absolute_link'];?>
<?php }else{ ?>javascript:;<?php }?>"><?php echo $_smarty_tpl->tpl_vars['element']->value['title'];?>
</a>
			</li>
		<?php }?>
	<?php }} ?><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>


<div class="container-fluid">
	<div class="navbar-header">
		<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-example-js-navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <a class="navbar-brand" href="#">Project Name</a> </div>
	<div class="collapse navbar-collapse bs-example-js-navbar-collapse">
		<ul class="nav navbar-nav">
			<?php smarty_template_function_navmenu($_smarty_tpl,array('data'=>$_smarty_tpl->getVariable('navItems')->value,'level'=>0));?>
 <!-- calls function navmenu, always after the function -->
		</ul>
	</div>
</div>
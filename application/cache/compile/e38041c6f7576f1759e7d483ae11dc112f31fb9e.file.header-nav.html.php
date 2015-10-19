<?php /* Smarty version Smarty-3.0.6, created on 2015-10-14 10:54:48
         compiled from "C:\xampp\htdocs\samplewebsite30\skin/vii_ChangeThisToProjectName/include/header-nav.html" */ ?>
<?php /*%%SmartyHeaderCode:23703561e1858514ce3-74101373%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e38041c6f7576f1759e7d483ae11dc112f31fb9e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samplewebsite30\\skin/vii_ChangeThisToProjectName/include/header-nav.html',
      1 => 1444808047,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23703561e1858514ce3-74101373',
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
<!-- Fixed navbar -->
<nav class="navbar navbar-inverse bg-gray navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">
				  Toggle navigation
				</span> <span class="icon-bar">
				</span> <span class="icon-bar">
				</span> <span class="icon-bar">
				</span> </button>
			<a class="navbar-brand" href="<?php echo $_smarty_tpl->getVariable('base_url')->value;?>
">
				<!-- <img src="<?php echo $_smarty_tpl->getVariable('_logo')->value;?>
"/> -->LOGO </a>
		</div>
		
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
		<li class="dropdown"> <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
			<?php echo $_smarty_tpl->tpl_vars['element']->value['title'];?>

			<b class="caret">
			</b>
			</a>
			<ul class="dropdown-menu" role="menu" aria-labelledby="drop1"> 
				<?php smarty_template_function_navmenu($_smarty_tpl,array('data'=>$_smarty_tpl->tpl_vars['element']->value['child'],'level'=>$_smarty_tpl->getVariable('level')->value+1));?>

			</ul>
		</li>
		<?php }else{ ?>
		<li class="<?php if ($_smarty_tpl->tpl_vars['key']->value==0){?>active<?php }?>">
		  <a href="<?php if ($_smarty_tpl->tpl_vars['element']->value['absolute_link']!=''){?><?php echo $_smarty_tpl->getVariable('base_url')->value;?>
<?php echo $_smarty_tpl->tpl_vars['element']->value['absolute_link'];?>
<?php }else{ ?>javascript:;<?php }?>">
			<?php echo $_smarty_tpl->tpl_vars['element']->value['title'];?>

		  </a>
		</li>
		<?php }?>
		<?php }} ?><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>

		
		
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav"> <?php smarty_template_function_navmenu($_smarty_tpl,array('data'=>$_smarty_tpl->getVariable('navItems')->value,'level'=>0));?>
 </ul>
			</li>
			</ul>
		</div>
	</div>
</nav>






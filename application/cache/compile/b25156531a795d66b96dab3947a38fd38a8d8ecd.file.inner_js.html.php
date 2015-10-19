<?php /* Smarty version Smarty-3.0.6, created on 2015-10-14 10:54:48
         compiled from "C:\xampp\htdocs\samplewebsite30\skin/vii_ChangeThisToProjectName/include/inner_js.html" */ ?>
<?php /*%%SmartyHeaderCode:7920561e18587f5951-77865917%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b25156531a795d66b96dab3947a38fd38a8d8ecd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samplewebsite30\\skin/vii_ChangeThisToProjectName/include/inner_js.html',
      1 => 1444808047,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7920561e18587f5951-77865917',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('_theme')->value)."/include/bsplugins.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?> <!-- html that calls booststrap js plugins -->
<script src="js/jquery.flexslider.js"></script> <!-- js slider -->
<script src="js/jquery.validationEngine-en.js"></script> <!-- js validation rquire -->
<script src="js/jquery.validationEngine.js"></script> <!-- js validation rquire -->
<script src="js/init.js"></script> <!-- for developers js script only -->
<script src="js/custom.js"></script> <!-- for designers js script only -->
<script src="js/includes/<?php echo $_smarty_tpl->getVariable('thisModule')->value;?>
.js"></script> <!-- js script for specific module -->
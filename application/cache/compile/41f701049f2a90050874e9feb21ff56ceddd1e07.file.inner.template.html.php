<?php /* Smarty version Smarty-3.0.6, created on 2015-10-14 10:54:48
         compiled from "C:\xampp\htdocs\samplewebsite30\skin/vii_ChangeThisToProjectName/inner.template.html" */ ?>
<?php /*%%SmartyHeaderCode:19222561e18582cab71-05691663%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41f701049f2a90050874e9feb21ff56ceddd1e07' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samplewebsite30\\skin/vii_ChangeThisToProjectName/inner.template.html',
      1 => 1444808047,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19222561e18582cab71-05691663',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html lang="en">
<!-------------------------------------------------- INNER TEMPLATE -------------------------------------------------->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<base href="<?php echo $_smarty_tpl->getVariable('base_url')->value;?>
skin/<?php echo $_smarty_tpl->getVariable('_theme')->value;?>
/" />
	<!-- Title -->
	<title><?php echo $_smarty_tpl->getVariable('_site_title')->value;?>
</title>
	<link rel="shortcut icon" href="<?php echo $_smarty_tpl->getVariable('_favicon')->value;?>
">
	
	<!-- SEO META TAGS -->
	<meta name="title" content="<?php echo $_smarty_tpl->getVariable('_meta_title')->value;?>
">
	<meta name="description" content="<?php echo $_smarty_tpl->getVariable('_meta_description')->value;?>
">
	<meta name="keywords" content="<?php echo $_smarty_tpl->getVariable('_meta_keywords')->value;?>
">
	<meta name="author" content="<?php echo $_smarty_tpl->getVariable('_meta_author')->value;?>
">
	<meta name="robots" content="<?php echo $_smarty_tpl->getVariable('_meta_robots')->value;?>
">

	<!-- FACEBOOK META TAGS -->
	<meta property="og:title" content="<?php echo $_smarty_tpl->getVariable('_meta_title')->value;?>
" />
	<meta property="og:url" content="<?php echo $_SERVER['HTTP_HOST'];?>
<?php echo $_SERVER['REQUEST_URI'];?>
" />
	<meta property="og:description" content="<?php echo $_smarty_tpl->getVariable('_meta_description')->value;?>
" />
	<meta property="og:image" content="<?php echo $_smarty_tpl->getVariable('_meta_image')->value;?>
" />
	<meta property="og:type" content="website" />

</head>

<body>
	<!------------------------------ Navigation ------------------------------>
	<div  id="navbar_include"><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('_theme')->value)."/include/header-nav.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></div>
	<!------------------------------ END ------------------------------>   
	
	<!------------------------------ Page Title ------------------------------>
	  <div class="container"><h1 class="page-header"><?php echo $_smarty_tpl->getVariable('_page_title')->value;?>
</h1></div>
	<!------------------------------ END ------------------------------>
	
	
	<!------------------------------ Content ------------------------------>
	<div class="content container" id="content_include"><?php if ($_smarty_tpl->getVariable('_content')->value){?><?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('_content')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?><?php }?><?php if ($_smarty_tpl->getVariable('_template')->value){?><?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('_template')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?><?php }?></div>
	<!------------------------------ END ------------------------------>
		
	<!------------------------------ Footer ------------------------------>
	<footer id="footer-include"><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('_theme')->value)."/include/footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></footer>		
	<!------------------------------ END ------------------------------>

	<!------------------------------ Others ------------------------------>
	<div class="others" id="others_include" ><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('_theme')->value)."/include/others.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></div>
	<!------------------------------ END ------------------------------>

	<!-- Styles -->
	<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('_theme')->value)."/include/inner_styles.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	
	<!-- JS -->
	<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('_theme')->value)."/include/inner_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</body>
</html>
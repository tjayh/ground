<?php /* Smarty version Smarty-3.0.6, created on 2015-10-22 06:40:07
         compiled from "C:\xampp\htdocs\viiworks_cms_git\skin/vii_ChangeThisToProjectName/main.template.html" */ ?>
<?php /*%%SmartyHeaderCode:16355562868a729d849-06722291%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1482cefbf20e9cebb4af1a78edbd40fb0fab20c3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\viiworks_cms_git\\skin/vii_ChangeThisToProjectName/main.template.html',
      1 => 1445488793,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16355562868a729d849-06722291',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html lang="en">
<!-------------------------------------------------- MAIN TEMPLATE -------------------------------------------------->
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
	<meta property="og:url" content="<?php echo $_smarty_tpl->getVariable('base_url')->value;?>
" />
	<meta property="og:description" content="<?php echo $_smarty_tpl->getVariable('_meta_description')->value;?>
" />
	<meta property="og:image" content="ENTER WEBSITE IMAGE PATH MANUALLY" />
	<meta property="og:type" content="website" />

	<!-- Stylesheets -->
	<link href="style/bootstrap.css" rel="stylesheet">
	<link href="style/flexslider.css" rel="stylesheet">
	<link href="style/font-awesome.css" rel="stylesheet">
	<link href="style/validationEngine.jquery.css" rel="stylesheet">
	<link href="style/style.css" rel="stylesheet"> 	<!-- for theme style css codes only -->
	<link href="style/custom.css" rel="stylesheet">	<!-- for designers css custom codes only -->
	<style><?php echo $_smarty_tpl->getVariable('_site_css')->value;?>
</style>
	
	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
</head>

<body>
	<!------------------------------ Header ------------------------------>
	<header id="header-include"><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('_theme')->value)."/include/header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></header>
	<!------------------------------ END ------------------------------>

	<!------------------------------ Navigation ------------------------------>
	<div class="navbar" id="navbar_include"><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('_theme')->value)."/include/header-nav.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></div>
	<!------------------------------ END ------------------------------>   

	<!------------------------------ Search ------------------------------>
	<div class="search" id="search_include"><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('_theme')->value)."/include/search.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></div>
	<!------------------------------ END ------------------------------>   

	<!------------------------------ Slider ------------------------------>
	<div class="slider" id="slider_include"><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('_theme')->value)."/include/slider.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></div>
	<!------------------------------ END ------------------------------>

	<!------------------------------ Recent News ------------------------------>
	<div class="recent-news" id="recent_news_include"><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('_theme')->value)."/include/recent-news.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></div>
	<!------------------------------ END ------------------------------>

	<!------------------------------ Recent Blog ------------------------------>
	<div class="recent-blog" id="recent_blog_include"><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('_theme')->value)."/include/recent-blog.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></div>
	<!------------------------------ END ------------------------------>

	<!------------------------------ Recent Promo ------------------------------>
	<div class="recent-promo" id="recent_promo_include"><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('_theme')->value)."/include/recent-promo.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></div>
	<!------------------------------ END ------------------------------>

	<!------------------------------ Recent Events ------------------------------>
	<div class="recent-promo" id="recent_events_include"><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('_theme')->value)."/include/recent-events.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></div>
	<!------------------------------ END ------------------------------>

	<!------------------------------ Recent Gallery ------------------------------>
	<div class="recent-gallery" id="recent_gallery_include"><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('_theme')->value)."/include/recent-gallery.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></div>
	<!------------------------------ END ------------------------------>

	<!------------------------------ Recent Testimonials ------------------------------>
	<div class="recent-testimonials" id="recent_testimonials_include"><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('_theme')->value)."/include/recent-testimonials.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></div>
	<!------------------------------ END ------------------------------>

	<!------------------------------ Subscribe ------------------------------>
	<div class="subscribe" id="subscribe_include"><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('_theme')->value)."/include/subscribe.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></div>
	<!------------------------------ END ------------------------------>
			
	<!------------------------------ Footer ------------------------------>
	<footer id="footer-include"><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('_theme')->value)."/include/footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></footer>		
	<!------------------------------ END ------------------------------>

	<!------------------------------ Others ------------------------------>
	<div class="others" id="others_include" ><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('_theme')->value)."/include/others.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></div>
	<!------------------------------ END ------------------------------>
		
	<!-- JS -->
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('_theme')->value)."/include/bsplugins.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?> <!-- html that calls booststrap js plugins -->
	<script src="js/jquery.flexslider.js"></script> <!-- js script for slider -->
    <script src="js/jquery.validationEngine-en.js"></script> <!-- js validation rquire -->
	<script src="js/jquery.validationEngine.js"></script> <!-- js validation rquire -->
	<script src="js/init.js"></script> <!-- for developers js script only -->
	<script src="js/custom.js"></script> <!-- for designers js script only -->
</body>
</html>
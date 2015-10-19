<?php /* Smarty version Smarty-3.0.6, created on 2015-10-14 11:17:29
         compiled from "C:\xampp\htdocs\samplewebsite30\skin/vii_ChangeThisToProjectName/main.template.html" */ ?>
<?php /*%%SmartyHeaderCode:18501561e1da9905ac4-93937510%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3133748d13d632e9c68aeeaf12648d7a9ac3f08' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samplewebsite30\\skin/vii_ChangeThisToProjectName/main.template.html',
      1 => 1444808048,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18501561e1da9905ac4-93937510',
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

</head>

<body>
	<!------------------------------ Header ------------------------------>
	<!-- <header id="header-include"><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('_theme')->value)."/include/header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></header> -->
	<!------------------------------ END ------------------------------>

	<!------------------------------ Navigation ------------------------------>
	<div><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('_theme')->value)."/include/header-nav.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></div>
	<!------------------------------ END ------------------------------>   

	<!------------------------------ Slider ------------------------------>
	<div class="slider" id="slider_include"><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('_theme')->value)."/include/slider.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></div>
	<!------------------------------ END ------------------------------>

	<!------------------------------ MAIN SECTION ------------------------------>
	<div class="section" id="main_section_include"><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('_theme')->value)."/include/main_section.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></div>
	<!------------------------------ END ------------------------------>

	<!------------------------------ Additional template ------------------------------>
	<div class="section-break">
</div>
<!-- 1 COLUMN -->
<div class="theme-showcase" role="main">
  
       <div class="page-header text-center">
         <h4>
           1 Column [Either text or Banner]
         </h4>
       </div>
</div>

<div class="container">
  <h1>
    Header Title
  </h1>
  <h4>
    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
  </h4>
  <p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  </p>
  <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" alt="Banner" />
  <div>
    <br />
  </div>
</div>
<!-- 2 COLUMNS EVEN -->
<div class="theme-showcase" role="main">
  
  <div class="page-header text-center">
    <h4>
      2 Columns[Text / Image]
    </h4>
  </div>
</div>

<div class="container theme-showcase" role="main">
  
  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="row">
    <div class="col-md-6 col-sm-6">
      <h1>
        Header Title
      </h1>
      <h4>
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
      </h4>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
    </div>
    <div class="col-md-6 col-sm-6 ">
      <h1>
        Header Title
      </h1>
      <h4>
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
      </h4>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-6 col-sm-6">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" class="img-thumbnail"  alt="Banner">
    </div>
    <div class="col-md-6 col-sm-6  ">
      <h1>
        Header Title
      </h1>
      <h4>
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
      </h4>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
    </div>
  </div>
  
</div>

<!-- /container -->

<!-- 2 COLUMNS UNEVEN -->
<div class="theme-showcase" role="main">
  
  <div class="page-header text-center">
    <h4>
      2 Columns Uneven [Text / Image]
    </h4>
  </div>
</div>

<div class="container theme-showcase" role="main">
  
  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="row">
    <div class="col-md-2">
      <img data-src="holder.js/100%x150/auto/#777:#555/text:2 Col" class="img-thumbnail"  alt="Banner">
    </div>
    <div class="col-md-10">
      <h1>
        Header Title
      </h1>
      <h4>
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
      </h4>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-3">
      <img data-src="holder.js/100%x200/auto/#777:#555/text:3 Col" class="img-thumbnail"  alt="Banner">
    </div>
    <div class="col-md-9">
      <h1>
        Header Title
      </h1>
      <h4>
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
      </h4>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-4">
      <img data-src="holder.js/100%x200/auto/#777:#555/text:4 Col" class="img-thumbnail"  alt="Banner">
    </div>
    <div class="col-md-8">
      <h1>
        Header Title
      </h1>
      <h4>
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
      </h4>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-5">
      <img data-src="holder.js/100%x200/auto/#777:#555/text:5 Col" class="img-thumbnail"  alt="Banner">
    </div>
    <div class="col-md-7">
      <h1>
        Header Title
      </h1>
      <h4>
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
      </h4>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
    </div>
  </div>
  
  
</div>

<!-- /container -->
<!-- 3 COLUMNS -->
<div class="theme-showcase" role="main">
  
  <div class="page-header text-center">
    <h4>
      3 Columns[Text / Image]
    </h4>
  </div>
</div>

<div class="container theme-showcase" role="main">
  
  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="row">
    <div class="col-md-4">
      <h1>
        Header Title
      </h1>
      <h4>
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
      </h4>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
    </div>
    <div class="col-md-4">
      <h1>
        Header Title
      </h1>
      <h4>
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
      </h4>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
    </div>
    <div class="col-md-4">
      <h1>
        Header Title
      </h1>
      <h4>
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
      </h4>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-4">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" class="img-thumbnail"  alt="Banner">
    </div>
    <div class="col-md-4">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" class="img-thumbnail"  alt="Banner">
    </div>
    <div class="col-md-4">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" class="img-thumbnail"  alt="Banner">
    </div>
  </div>
  
</div>

<!-- /container -->
<!-- 3 COLUMNS UNEVEN -->
<div class="theme-showcase" role="main">
  
  <div class="page-header text-center">
    <h4>
      3 Columns Uneven[Text / Image]
    </h4>
  </div>
</div>

<div class="container theme-showcase" role="main">
  
  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="row">
    <div class="col-md-6">
      <h1>
        Header Title
      </h1>
      <h4>
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
      </h4>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
    </div>
    <div class="col-md-3">
      <h1>
        Header Title
      </h1>
      <h4>
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
      </h4>
      
    </div>
    <div class="col-md-3">
      <h1>
        Header Title
      </h1>
      <h4>
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
      </h4>
      
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-4">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" class="img-thumbnail"  alt="Banner">
    </div>
    <div class="col-md-4">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" class="img-thumbnail"  alt="Banner">
    </div>
    <div class="col-md-4">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" class="img-thumbnail"  alt="Banner">
    </div>
  </div>
  
</div>

<!-- /container -->
<!-- 4 COLUMNS -->
<div class="theme-showcase" role="main">
  
  <div class="page-header text-center">
    <h4>
      4 Columns[Text / Image]
    </h4>
  </div>
</div>

<div class="container theme-showcase" role="main">
  
  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="row">
    <div class="col-md-3">
      <h1>
        Header Title
      </h1>
      <h4>
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
      </h4>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
    </div>
    <div class="col-md-3">
      <h1>
        Header Title
      </h1>
      <h4>
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
      </h4>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
    </div>
    <div class="col-md-3">
      <h1>
        Header Title
      </h1>
      <h4>
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
      </h4>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
    </div>
    <div class="col-md-3">
      <h1>
        Header Title
      </h1>
      <h4>
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
      </h4>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-3">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" class="img-thumbnail"  alt="Banner">
    </div>
    <div class="col-md-3">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" class="img-thumbnail"  alt="Banner">
    </div>
    <div class="col-md-3">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" class="img-thumbnail"  alt="Banner">
    </div>
    <div class="col-md-3">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" class="img-thumbnail"  alt="Banner">
    </div>
  </div>
  
</div>

<!-- /container -->
<div class="section-break">
</div>

<!-- JAVASCRIPT-->
<!-- TAB LAYOUT-->
<div class="theme-showcase" role="main">
  
  <div class="page-header text-center">
    <h4>
      Tab Layout
    </h4>
  </div>
</div>

<div class="container theme-showcase" role="main">
  
  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="row">
    
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active">
        <a href="#home" aria-controls="home" role="tab" data-toggle="tab">
          Home
        </a>
      </li>
      <li role="presentation">
        <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
          Profile
        </a>
      </li>
      <li role="presentation">
        <a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">
          Messages
        </a>
      </li>
      <li role="presentation">
        <a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">
          Settings
        </a>
      </li>
    </ul>
	
        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="home">
            Home
          </div>
          <div role="tabpanel" class="tab-pane" id="profile">
            Profile
          </div>
          <div role="tabpanel" class="tab-pane" id="messages">
            Messages
          </div>
          <div role="tabpanel" class="tab-pane" id="settings">
            Settings
          </div>
        </div>
      </div>
</div>

</div>

<!-- /container -->
<div class="section-break">
</div>

<!--ACCORDION-->
<div class="theme-showcase" role="main">
  
  <div class="page-header text-center">
    <h4>
      Accordion
    </h4>
  </div>
</div>

<div class="container theme-showcase" role="main">
  
  <!-- Main jumbotron for a primary marketing message or call to action -->
  <!-- 	  
<div class="row">

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<div class="panel panel-default">
<div class="panel-heading" role="tab" id="headingOne">
<h4 class="panel-title">
<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
Collapsible Group Item #1
</a>
</h4>
</div>
<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
<div class="panel-body">
Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading" role="tab" id="headingTwo">
<h4 class="panel-title">
<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
Collapsible Group Item #2
</a>
</h4>
</div>
<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
<div class="panel-body">
Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading" role="tab" id="headingThree">
<h4 class="panel-title">
<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
Collapsible Group Item #3
</a>
</h4>
</div>
<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
<div class="panel-body">
Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
</div>
</div>
</div>
</div>
</div>
-->
      
</div>

<!-- /container -->
<div class="section-break">
</div>

<!-- FLUID LAYOUT -->
<div class="theme-showcase" role="main">
  
  <div class="page-header text-center">
    <h4>
      Fuild Layout 
    </h4>
  </div>
</div>

<div class="container-fluid theme-showcase" role="main">
  
  <div class="row-fluid">
    <div class="col-md-4 col-sm-6">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" class="img-thumbnail"  alt="Banner">
    </div>
    <div class="col-md-4 col-sm-6  ">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" class="img-thumbnail"  alt="Banner">
    </div>
    <div class="col-md-4 col-sm-6  ">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" class="img-thumbnail"  alt="Banner">
    </div>
    <div class="col-md-4 col-sm-6  ">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" class="img-thumbnail"  alt="Banner">
    </div>
    <div class="col-md-4 col-sm-6  ">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" class="img-thumbnail"  alt="Banner">
    </div>
    <div class="col-md-4 col-sm-6  ">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" class="img-thumbnail"  alt="Banner">
    </div>
    
    <div class="col-md-4 col-sm-6  ">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" class="img-thumbnail"  alt="Banner">
    </div>
    <div class="col-md-4 col-sm-6  ">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" class="img-thumbnail"  alt="Banner">
    </div>
    <div class="col-md-4 col-sm-6  ">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" class="img-thumbnail"  alt="Banner">
    </div>
    
    <div class="col-md-4 col-sm-6  ">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" class="img-thumbnail"  alt="Banner">
    </div>
    <div class="col-md-4 col-sm-6  ">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" class="img-thumbnail"  alt="Banner">
    </div>
    <div class="col-md-4 col-sm-6  ">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" class="img-thumbnail"  alt="Banner">
    </div>
    
  </div>
  
</div>

<!-- /container -->
<div class="section-break">
</div>
<div class="theme-showcase" role="main">
  
  <div class="page-header text-center">
    <h4>
      No Gutter Layout - Applicable for images only 
    </h4>
  </div>
</div>

<div class="container no-gutter" role="main">
  
  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="row">
    <div class="col-md-4 col-sm-6">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" alt="Banner">
    </div>
    <div class="col-md-4 col-sm-6  ">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" alt="Banner">
    </div>
    <div class="col-md-4 col-sm-6  ">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" alt="Banner">
    </div>
    <div class="col-md-4 col-sm-6  ">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" alt="Banner">
    </div>
    <div class="col-md-4 col-sm-6  ">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" alt="Banner">
    </div>
    <div class="col-md-4 col-sm-6  ">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" alt="Banner">
    </div>
    
    <div class="col-md-4 col-sm-6  ">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" alt="Banner">
    </div>
    <div class="col-md-4 col-sm-6  ">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" alt="Banner">
    </div>
    <div class="col-md-4 col-sm-6  ">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" alt="Banner">
    </div>
    
    <div class="col-md-4 col-sm-6  ">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" alt="Banner">
    </div>
    <div class="col-md-4 col-sm-6  ">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" alt="Banner">
    </div>
    <div class="col-md-4 col-sm-6  ">
      <img data-src="holder.js/100%x250/auto/#777:#555/text:Banner" alt="Banner">
    </div>
    
  </div>
  
</div>

<!-- /container -->

	<!------------------------------ END ------------------------------>
	
	<!------------------------------ Search ------------------------------>
	<div class="section-break"></div>
	<div class="theme-showcase" role="main"> <div class="page-header text-center"><h4>Search </h4></div></div>  
	<div class="container">
	<div class="search" id="search_include"><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('_theme')->value)."/include/search.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></div>
	</div>
	<!------------------------------ END ------------------------------>   

	<!------------------------------ Recent News ------------------------------>
	<div class="section-break"></div>
	<div class="theme-showcase" role="main"> <div class="page-header text-center"><h4>Recent News </h4></div></div>  
	<div class="container">
	<div class="recent-news" id="recent_news_include"><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('_theme')->value)."/include/recent-news.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></div>
	</div>
	<!------------------------------ END ------------------------------>

	<!------------------------------ Recent Blog ------------------------------>
	<div class="section-break"></div>
	<div class="theme-showcase" role="main"> <div class="page-header text-center"><h4>Recent Blog </h4></div></div>  
	<div class="container">
	<div class="recent-blog" id="recent_blog_include"><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('_theme')->value)."/include/recent-blog.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></div>
	</div>
	<!------------------------------ END ------------------------------>

	<!------------------------------ Recent Promo ------------------------------>
	<div class="section-break"></div>
	<div class="theme-showcase" role="main"> <div class="page-header text-center"><h4>Recent Promo </h4></div></div>  
	<div class="container">
	<div class="recent-promo" id="recent_promo_include"><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('_theme')->value)."/include/recent-promo.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></div>
	</div>
	<!------------------------------ END ------------------------------>

	<!------------------------------ Recent Events ------------------------------>
	<div class="section-break"></div>
	<div class="theme-showcase" role="main"> <div class="page-header text-center"><h4>Recent Events </h4></div></div>  
	<div class="container">
	<div class="recent-promo" id="recent_events_include"><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('_theme')->value)."/include/recent-events.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></div>
	</div>
	<!------------------------------ END ------------------------------>

	<!------------------------------ Recent Gallery ------------------------------>
	<div class="section-break"></div>
	<div class="theme-showcase" role="main"> <div class="page-header text-center"><h4>Recent Gallery </h4></div></div>  
	<div class="container">
	<div class="recent-gallery" id="recent_gallery_include"><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('_theme')->value)."/include/recent-gallery.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></div>
	</div>
	<!------------------------------ END ------------------------------>

	<!------------------------------ Recent Testimonials ------------------------------>
	<div class="section-break"></div>
	<div class="theme-showcase" role="main"> <div class="page-header text-center"><h4>Recent Testimonials </h4></div></div>  
	<div class="container">
	<div class="recent-testimonials" id="recent_testimonials_include"><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('_theme')->value)."/include/recent-testimonials.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></div>
	</div>
	<!------------------------------ END ------------------------------>

	<!------------------------------ Subscribe ------------------------------>
	<div class="section-break"></div>
	<div class="theme-showcase" role="main"> <div class="page-header text-center"><h4>Subscribe </h4></div></div>
	<div class="container">
	<div class="subscribe" id="subscribe_include"><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('_theme')->value)."/include/subscribe.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></div>
	</div>
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
	<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('_theme')->value)."/include/main_styles.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	
	<!-- JS -->
	<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('_theme')->value)."/include/main_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</body>
</html>
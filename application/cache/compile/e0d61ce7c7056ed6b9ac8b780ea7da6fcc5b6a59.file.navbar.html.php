<?php /* Smarty version Smarty-3.0.6, created on 2015-10-14 10:42:01
         compiled from "C:\xampp\htdocs\samplewebsite30\skin/aceadmin/includes/templates/navbar.html" */ ?>
<?php /*%%SmartyHeaderCode:29503561e1559ccd622-94048779%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e0d61ce7c7056ed6b9ac8b780ea7da6fcc5b6a59' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samplewebsite30\\skin/aceadmin/includes/templates/navbar.html',
      1 => 1439793505,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29503561e1559ccd622-94048779',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="navbar" class="navbar navbar-default">

	<div class="navbar-container" id="navbar-container">
		<!-- #section:basics/sidebar.mobile.toggle -->
		<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler">
			<span class="sr-only">Toggle sidebar</span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>
			
			<span class="menu_text">MENU</span>
		</button>

		<!-- /section:basics/sidebar.mobile.toggle -->
		<div class="navbar-header pull-left">
			<!-- #section:basics/navbar.layout.brand -->
			<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
" class="navbar-brand">
				<small>
					<i class="fa fa-leaf"></i>
					Administrator
				</small>
			</a>

			<!-- /section:basics/navbar.layout.brand -->

			<!-- #section:basics/navbar.toggle -->

			<!-- /section:basics/navbar.toggle -->
		</div>
		<div class="navbar-buttons navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">
				<li class="light-blue">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						Welcome, <?php echo $_smarty_tpl->getVariable('_admin')->value['firstname'];?>

						<i class="ace-icon fa fa-caret-down"></i>
					</a>

					<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						<li>
							<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
logout" class = "ignore">
								<i class="fa fa-off"></i>
								Logout
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>
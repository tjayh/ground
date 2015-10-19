<?php /* Smarty version Smarty-3.0.6, created on 2015-10-14 10:42:01
         compiled from "C:\xampp\htdocs\samplewebsite30\skin/aceadmin/includes/templates/sidebar.html" */ ?>
<?php /*%%SmartyHeaderCode:29708561e1559d15e02-96460183%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3436b56ea7da47e6bc6cb78467885a45080254c8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samplewebsite30\\skin/aceadmin/includes/templates/sidebar.html',
      1 => 1441188411,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29708561e1559d15e02-96460183',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="sidebar responsive" id="sidebar">
	<div class="sidebar-shortcuts" id="sidebar-shortcuts">
		<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
			<?php if ($_smarty_tpl->getVariable('bcCMS')->value){?><a class="btn btn-small btn-info" href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
pages" title="Content Manager"> <i class="fa fa-file-text"></i> </a><?php }?>
			<?php if ($_smarty_tpl->getVariable('bcContactIndex')->value){?><a class="btn btn-small btn-success" href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
contactus" title="Contact Us"> <i class="fa fa-envelope-o"></i> </a><?php }?>
			<?php if ($_smarty_tpl->getVariable('bcSeoManStat')->value){?><a class="btn btn-small btn-yellow" href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
seo" title="SEO"> <i class="fa fa-bar-chart"></i> </a><?php }?>
			<?php if ($_smarty_tpl->getVariable('bcSettingsGeneral')->value){?><a class="btn btn-small btn-pink" href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
settings" title="Settings"> <i class="fa fa-cogs"></i> </a><?php }?>
		</div>
		<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini"> <span class="btn btn-success"></span> <span class="btn btn-info"></span> <span class="btn btn-warning"></span> <span class="btn btn-danger"></span> </div>
	</div>
	<div id = "pilit"></div>
	<ul class="nav nav-list">
		<li id = "bcHome">
			<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
">
				<i class="menu-icon fa fa-home"></i>
				<span class="menu-text"> Dashboard </span>
			</a>
		</li>
		<li id = "bcPreview">
			<a href="<?php echo $_smarty_tpl->getVariable('base_url')->value;?>
" class="ignore" target="_blank">
				<i class="menu-icon fa fa-desktop"></i>
				<span class="menu-text">Website Preview</span>
			</a>
		</li>
		<?php if ($_smarty_tpl->getVariable('_admin')->value['id_admin_group']==1){?>
		<?php if ($_smarty_tpl->getVariable('bcBcAdmin')->value){?>
		<li id = "bcBc">
			<a href="javascript:;"  class="dropdown-toggle">
				<i class="menu-icon fa fa-link"></i>
				<span class="menu-text"> Breadcrumbs </span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<ul class="submenu">
				<li id = "bcBcAdmin">
					<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
breadcrumbs">
						<i class="fa fa-double-angle-right"></i>
						Admin
					</a>
				</li>
				<!-- <?php if ($_smarty_tpl->getVariable('_admin')->value['id_admin_group']==1){?><li id = "bcBcDash">
					<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
breadcrumbs/dashboard">
						<i class="fa fa-double-angle-right"></i>
						Dashboard
					</a>
				</li><?php }?> -->
			</ul>
		</li>
		<?php }?>
		<?php }?>
		<?php if ($_smarty_tpl->getVariable('bcBanner')->value){?>
		<li id = "bcBanner">
			<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
bannermanager">
				<i class="menu-icon fa fa-flag"></i>
				<span class="menu-text">Banner</span>
			</a>
		</li>
		<?php }?>
		<?php if ($_smarty_tpl->getVariable('bcBlogItems')->value){?>
		<li id = "bcBlogItems">
			<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
blog_manager">
				<i class="menu-icon fa fa-comments-o"></i>
				<span class="menu-text"> Blog Manager </span>
			</a>
		</li>
		<!-- <?php if ($_smarty_tpl->getVariable('_admin')->value['id_admin_group']==1){?><li id="bcBlog">
			<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
" class="dropdown-toggle">	
				<i class="menu-icon fa fa-comments-o"></i>		
				<span class="menu-text"> Blog Manager </span>		
				<b class="arrow fa fa-angle-down"></b>	
			</a>
			<ul class="submenu">
				<li id="bcBlogItems">
					<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
blog_manager">	
					<i class="fa fa-double-angle-right"></i>	Items</a>
				</li>
				<li id = "bcBlogCategories">
				<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
blog_manager/category">
					<i class="fa fa-double-angle-right"></i>
					Categories
				</a>
				</li>
			</ul>
		</li><?php }?> -->
		<?php }?>
		<?php if ($_smarty_tpl->getVariable('bcCMS')->value){?>		
		<li id = "bcCMS">
			<a href="javascript:;" class="dropdown-toggle">
				<i class="menu-icon fa fa-file-text-o"></i>
				<span class="menu-text"> Content Manager </span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<ul class="submenu">
				<li id = "bcPages">
					<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
pages">
						<i class="fa fa-double-angle-right"></i>
						Pages
					</a>
				</li>
				<li id = "bcSection">
					<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
pages/section">
						<i class="fa fa-double-angle-right"></i>
						Section
					</a>
				</li>
			</ul>
		</li>
		<?php }?>
		<?php if ($_smarty_tpl->getVariable('bcManageNav')->value){?>
		<li id = "bcManageNav">
			<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
manage_navigation">
				<i class="menu-icon fa fa-arrows"></i>
				<span class="menu-text"> Navigation Manager </span>
			</a>
		</li>
		<?php }?>
		<?php if ($_smarty_tpl->getVariable('bcContactIndex')->value){?>
		<li id = "bcContact">
			<a href="javascript:;"  class="dropdown-toggle">
				<i class="menu-icon fa fa-envelope-o"></i>
				<span class="menu-text"> Contact Us </span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<ul class="submenu">
				<li id = "bcContactIndex">
					<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
contactus">
						<i class="fa fa-double-angle-right"></i>
						Messages
					</a>
				</li>
				<li id = "bcContactSettings">
					<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
contactus/settings">
						<i class="fa fa-double-angle-right"></i>
						Settings
					</a>
				</li>
			</ul>
		</li>
		<?php }?>
		<?php if ($_smarty_tpl->getVariable('bcEventsItems')->value){?>
		<li id = "bcEventsItems">
			<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
events_manager">
				<i class="menu-icon fa fa-calendar"></i>
				<span class="menu-text"> Events Manager </span>
			</a>
		</li>
		<!-- <?php if ($_smarty_tpl->getVariable('_admin')->value['id_admin_group']==1){?><li id="bcEvents">
			<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
" class="dropdown-toggle">	
				<i class="menu-icon fa fa-bullhorn"></i>		
				<span class="menu-text"> Events Manager </span>		
				<b class="arrow fa fa-angle-down"></b>	
			</a>
			<ul class="submenu">
				<li id="bcEventsItems">
					<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
events_manager">	
					<i class="fa fa-double-angle-right"></i>	Items</a>
				</li>
				<li id = "bcEventsCategories">
				<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
events_manager/category">
					<i class="fa fa-double-angle-right"></i>
					Categories
				</a>
				</li>
			</ul>
		</li><?php }?> -->
		<?php }?>
		<?php if ($_smarty_tpl->getVariable('bcFAQItems')->value){?>
		<li id = "bcFAQManager">
			<a href="javascript:;" class="dropdown-toggle">
				<i class="menu-icon fa fa-question"></i>
				<span class="menu-text"> FAQ </span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<ul class="submenu">
				<li id = "bcFAQItems">
					<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
faq">
						<i class="fa fa-double-angle-right"></i>
						Items
					</a>
				</li>
				<li id = "bcFAQCategories">
					<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
faq/category">
						<i class="fa fa-double-angle-right"></i>
						Categories
					</a>
				</li>
			</ul>
		</li>
		<?php }?>
		<?php if ($_smarty_tpl->getVariable('bcGalleryItems')->value){?>
		<li id = "bcGallery">
			<a href="javascript:;" class="dropdown-toggle">
				<i class="menu-icon fa fa-picture-o"></i>
				<span class="menu-text"> Gallery Manager </span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<ul class="submenu">
				<li id = "bcGalleryItems">
					<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
gallery_manager">
						<i class="fa fa-double-angle-right"></i>
						Items
					</a>
				</li>
				<li id = "bcGalleryCategories">
					<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
gallery_manager/category">
						<i class="fa fa-double-angle-right"></i>
						Categories
					</a>
				</li>
			</ul>
		</li>
		<?php }?>
		
		<?php if ($_smarty_tpl->getVariable('bcNewsItems')->value){?>
		<li id = "bcNewsItems">
			<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
news_manager">
				<i class="menu-icon fa fa-bullhorn"></i>
				<span class="menu-text"> News Manager </span>
			</a>
		</li>
		<!-- <?php if ($_smarty_tpl->getVariable('_admin')->value['id_admin_group']==1){?><li id="bcNews">
			<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
" class="dropdown-toggle">	
				<i class="menu-icon fa fa-bullhorn"></i>		
				<span class="menu-text"> News Manager </span>		
				<b class="arrow fa fa-angle-down"></b>	
			</a>
			<ul class="submenu">
				<li id="bcNewsItems">
					<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
news_manager">	
					<i class="fa fa-double-angle-right"></i>	Items</a>
				</li>
				<li id = "bcNewsCategories">
				<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
news_manager/category">
					<i class="fa fa-double-angle-right"></i>
					Categories
				</a>
				</li>
			</ul>
		</li><?php }?> -->
		<?php }?>
		<?php if ($_smarty_tpl->getVariable('bcNewsSub')->value){?>
		<li id = "bcNews">
			<a href="javascript:;"  class="dropdown-toggle">
				<i class="menu-icon fa fa-envelope"></i>
				<span class="menu-text"> Newsletter </span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<ul class="submenu">
				<li id = "bcNewsSub">
					<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
newsletter">
						<i class="fa fa-double-angle-right"></i>
						Subscribers
					</a>
				</li>
				<?php if ($_smarty_tpl->getVariable('_admin')->value['id_admin_group']==1){?>
				<li id = "bcNewsCampaigns">
					<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
newsletter/campaigns">
						<i class="fa fa-double-angle-right"></i>
						Campaigns
					</a>
				</li>
				<li id = "bcNewsSettings">
					<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
newsletter/settings">
						<i class="fa fa-double-angle-right"></i>
						Settings
					</a>
				</li>
				<?php }?>
			</ul>
		</li>
		<?php }?>
		<?php if ($_smarty_tpl->getVariable('bcPromoItems')->value){?>
		<li id = "bcPromoItems">
			<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
promo_manager">
				<i class="menu-icon fa fa-tag"></i>
				<span class="menu-text"> Promo Manager </span>
			</a>
		</li>
		<!-- <?php if ($_smarty_tpl->getVariable('_admin')->value['id_admin_group']==1){?><li id="bcPromo">
			<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
" class="dropdown-toggle">	
				<i class="menu-icon fa fa-tag"></i>		
				<span class="menu-text"> Promo Manager </span>		
				<b class="arrow fa fa-angle-down"></b>	
			</a>
			<ul class="submenu">
				<li id="bcPromoItems">
					<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
promo_manager">	
					<i class="fa fa-double-angle-right"></i>	Items</a>
				</li>
				<li id = "bcPromoCategories">
				<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
promo_manager/category">
					<i class="fa fa-double-angle-right"></i>
					Categories
				</a>
				</li>
			</ul>
		</li><?php }?> -->
		<?php }?>
		<?php if ($_smarty_tpl->getVariable('bcTestimonialItems')->value){?>
		<li id = "bcTestimonialItems">
			<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
testimonial_manager">
				<i class="menu-icon fa fa-quote-left"></i>
				<span class="menu-text"> Testimonial Manager </span>
			</a>
		</li>
		<?php }?>
		<?php if ($_smarty_tpl->getVariable('bcSeoManStat')->value){?>
		<li id = "bcSeoManager">
			<a href="javascript:;"  class="dropdown-toggle">
				<i class="menu-icon fa fa-bar-chart"></i>
				<span class="menu-text"> SEO </span>
				<b class="arrow fa fa-angle-down"></b>
				
			</a>
			<ul class="submenu">
				<li id = "bcSeoManStat">
					<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
seo">
						<i class="fa fa-double-angle-right"></i>
						Statistics
					</a>
				</li>
				<li id = "bcSeoManSettings">
					<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
seo/settings">
						<i class="fa fa-double-angle-right"></i>
						Settings
					</a>
				</li>
				<li id = "bcSeoManSocialMedia">
					<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
seo/socialmedia">
						<i class="fa fa-double-angle-right"></i>
						Social Media
					</a>
				</li>
			</ul>
		</li>
		<?php }?>
		<?php if ($_smarty_tpl->getVariable('bcSettingsGeneral')->value){?>
		<li id = "bcSettings">
			<a href="javascript:;" class="dropdown-toggle">
				<i class="menu-icon fa fa-cogs"></i>
				<span class="menu-text"> Settings </span>
				<b class="arrow fa fa-angle-down"></b>
			</a>

			<ul class="submenu">
				<li id = "bcSettingsGeneral">
					<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
settings/">
						<i class="fa fa-double-angle-right"></i>
						General
					</a>
				</li>
				<li id = "bcSettingsUsers">
					<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
settings/users">
						<i class="fa fa-double-angle-right"></i>
						Users
					</a>
				</li>
				<li id = "bcSettingsGroups">
					<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
settings/groups">
						<i class="fa fa-double-angle-right"></i>
						Groups
					</a>
				</li>
				<?php if ($_smarty_tpl->getVariable('_admin')->value['id_admin_group']==1){?>
				<li id = "bcSettingsModules">
					<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
settings/modules">
						<i class="fa fa-double-angle-right"></i>
						Modules
					</a>
				</li>
				<?php }?>
				<li id = "bcSettingsPermissions">
					<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
settings/permissions">
						<i class="fa fa-double-angle-right"></i>
						Permissions
					</a>
				</li>
				<!-- <?php if ($_smarty_tpl->getVariable('_admin')->value['id_admin_group']==1){?><li id = "bcSettingsServer">
					<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
settings/server">
						<i class="fa fa-double-angle-right"></i>
						Server
					</a>
				</li><?php }?> -->
			</ul>
		</li>
		<?php }?>
	</ul>

	<div class="sidebar-collapse" id="sidebar-collapse">
		<i class="fa fa-double-angle-left"></i>
	</div>
</div>
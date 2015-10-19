<?php /* Smarty version Smarty-3.0.6, created on 2015-10-14 10:42:01
         compiled from "C:\xampp\htdocs\samplewebsite30\skin/aceadmin/admin.template.html" */ ?>
<?php /*%%SmartyHeaderCode:29849561e1559af2b18-38885824%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '644e8e320858531a1942e915aee2f4d44756df23' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samplewebsite30\\skin/aceadmin/admin.template.html',
      1 => 1439859765,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29849561e1559af2b18-38885824',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<<?php ?>?php  
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?<?php ?>>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $_smarty_tpl->getVariable('_site_title')->value;?>
 - Administration Panel</title> 
		
		<base href="<?php echo $_smarty_tpl->getVariable('base_url')->value;?>
skin/<?php echo $_smarty_tpl->getVariable('admin_theme')->value;?>
/"/>
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="shortcut icon" href="img/favicon/favicon.png">
		
		<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('skin_url')->value).($_smarty_tpl->getVariable('admin_theme')->value)."/includes/templates/css_head.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
		
	</head>

	<body class="skin-1 custom_skin">
		<div id="pageLoader" style='background: rgb(249, 249, 249) url("./img/admin_page_load.gif") no-repeat scroll 50% 50%;height: 100%;left: 0;position: fixed;top: 0;width: 100%;z-index: 9999;'></div>
		<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('skin_url')->value).($_smarty_tpl->getVariable('admin_theme')->value)."/includes/templates/navbar.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
		<div class="main-container" id="main-container">
			
			<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('skin_url')->value).($_smarty_tpl->getVariable('admin_theme')->value)."/includes/templates/sidebar.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
			
			<div class="main-content"> 
				<div id="notification"></div>
				
				<div class="breadcrumbs">
					
					<script type="text/javascript">
						try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
					</script>
					
					<ul class="breadcrumb"  id="breadcrumbs">
						<span class = "hid" id ="bcActive"><?php echo $_smarty_tpl->getVariable('_breadcrumbs')->value['bcActive'];?>
</span>
						<li>
							<i class="fa fa-home home-icon" id = "home"></i>
							<a href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
">Home</a>
						</li>
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('_breadcrumbs')->value['bcPathMenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
							<?php if ($_smarty_tpl->tpl_vars['item']->value['name']!='Home'){?>
							<li>
								<a href="javascript:;" data-smID = "<?php echo $_smarty_tpl->tpl_vars['item']->value['html_id'];?>
" ><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
							</li>
							<?php }?>
						<?php }} ?>
					</ul>
				</div>
				<script>
					
						var CMS = {};
					
				</script>
				<div class="page-content">
					<span class = "hid" id = "thisModule" ><?php echo $_smarty_tpl->getVariable('_curr_module')->value['link_rewrite'];?>
</span>
					<span class = "hid" id = "thisMethod" ><?php echo $_smarty_tpl->getVariable('_curr_method')->value;?>
</span>
					<?php if ($_smarty_tpl->getVariable('_curr_module')->value){?>
						<?php if ($_smarty_tpl->getVariable('_template')->value){?><?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('_template')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?><?php }?>  
					<?php }?>
				</div>
			</div>
		</div>
		<span class = "hid" id = "thisURL"><?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
</span>
		<span class = "hid" id = "skinPath"><?php echo $_smarty_tpl->getVariable('skin_url')->value;?>
<?php echo $_smarty_tpl->getVariable('admin_theme')->value;?>
/</span>
		
		<div id="globalModal" class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="blue bigger"></h4>
					</div>
					<div class="modal-body">
						<div class="row-fluid">
							Are you sure?
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-xs hideWhile" data-dismiss="modal">
							<i class="fa fa-remove"></i>
							No
						</button>
						<button class="btn btn-xs btn-primary hideWhile" id = "globalYes">
							<i class="fa fa-ok"></i>
							Yes
						</button>
						<img src = "img/loading.gif" id = "sgLoading" class ="hid" style = "vertical-align:bottom !Important;"/>&nbsp;&nbsp;&nbsp;
						<img src = "img/3d.gif" id = "sgLoader" class ="hid"/>
					</div>
				</div>
			</div>
		</div>
		<a class = "hid" id = "forcedRefresh"></a>
		<a href="javascript:;" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="fa fa-double-angle-up fa fa-only bigger-110"></i>
		</a>
		
		<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('skin_url')->value).($_smarty_tpl->getVariable('admin_theme')->value)."/includes/templates/js_bottom.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

	</body>
</html>

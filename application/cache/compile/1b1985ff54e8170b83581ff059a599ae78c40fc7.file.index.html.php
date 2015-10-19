<?php /* Smarty version Smarty-3.0.6, created on 2015-10-14 10:54:30
         compiled from "C:\xampp\htdocs\samplewebsite30\skin/aceadmin/modules/seomanager/index.html" */ ?>
<?php /*%%SmartyHeaderCode:17856561e1846a01db9-53299424%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1b1985ff54e8170b83581ff059a599ae78c40fc7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samplewebsite30\\skin/aceadmin/modules/seomanager/index.html',
      1 => 1440390459,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17856561e1846a01db9-53299424',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="page-content-area">
	<div class="page-header">
		<h1>
			Web Statistics
			<small style="display: none;">
				<i class="ace-icon fa fa-angle-double-right"></i>
			</small>
		</h1> </div>
	<div class="row">
		<div class="col-xs-12">
			<iframe src="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
<?php echo $_smarty_tpl->getVariable('_curr_module')->value['link_rewrite'];?>
/ndawstats/" style="width:100%; height:1000px;"></iframe>
		</div>
	</div>
</div>
<?php /* Smarty version Smarty-3.0.6, created on 2015-10-14 11:17:30
         compiled from "C:\xampp\htdocs\samplewebsite30\skin/vii_ChangeThisToProjectName/include/search.html" */ ?>
<?php /*%%SmartyHeaderCode:15101561e1daa4267a9-21319914%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '837b05230c0ed0a6757096c3e575814469a871d0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samplewebsite30\\skin/vii_ChangeThisToProjectName/include/search.html',
      1 => 1444808047,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15101561e1daa4267a9-21319914',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
 <div class="row">
<div class="col-md-3">
	<form class="form-inline" id="searchForm" action="<?php echo $_smarty_tpl->getVariable('base_url')->value;?>
search" method="get">
		<input class="form-control" type="text" name="search" placeholder="Search">
		<button type="submit"  class="btn btn-default" id="searchBtn">Search</button> 
		<img src="img/loading.gif" class="loadingGif" style="display:none;">
		<div id="subNotif"></div>
	</form>
</div>
</div>
<br/>
<div class="row">
<div class="col-md-3">
	<form role="form" id="searchForm" action="<?php echo $_smarty_tpl->getVariable('base_url')->value;?>
search" method="get">
		<div class="form-group input-group">
			<input type="text" name="search" placeholder="Search" class="form-control">
			<span class="input-group-btn">
				<button type="submit"  class="btn btn-default" id="searchBtn"><i class="fa fa-search"></i>
					<img src="img/loading.gif" class="loadingGif" style="display:none;">
					<div id="subNotif"></div>
				</button>
			</span>
		</div>
	</form>
</div>
</div>


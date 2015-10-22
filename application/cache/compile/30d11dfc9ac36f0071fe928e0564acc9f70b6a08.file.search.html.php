<?php /* Smarty version Smarty-3.0.6, created on 2015-10-22 06:40:07
         compiled from "C:\xampp\htdocs\viiworks_cms_git\skin/vii_ChangeThisToProjectName/include/search.html" */ ?>
<?php /*%%SmartyHeaderCode:1886562868a7b6f753-43911551%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '30d11dfc9ac36f0071fe928e0564acc9f70b6a08' => 
    array (
      0 => 'C:\\xampp\\htdocs\\viiworks_cms_git\\skin/vii_ChangeThisToProjectName/include/search.html',
      1 => 1445488792,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1886562868a7b6f753-43911551',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form id="searchForm" action="<?php echo $_smarty_tpl->getVariable('base_url')->value;?>
search" method="get">
    <input type="text" name="search" placeholder="Search">
    <button type="submit" id="searchBtn">Search</button> <img src="img/loading.gif" class="loadingGif" style="display:none;">
    <div id="subNotif"></div>
</form>
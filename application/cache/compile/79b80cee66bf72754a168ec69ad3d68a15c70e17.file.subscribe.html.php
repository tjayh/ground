<?php /* Smarty version Smarty-3.0.6, created on 2015-10-22 06:40:09
         compiled from "C:\xampp\htdocs\viiworks_cms_git\skin/vii_ChangeThisToProjectName/include/subscribe.html" */ ?>
<?php /*%%SmartyHeaderCode:9270562868a9326b08-28586409%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79b80cee66bf72754a168ec69ad3d68a15c70e17' => 
    array (
      0 => 'C:\\xampp\\htdocs\\viiworks_cms_git\\skin/vii_ChangeThisToProjectName/include/subscribe.html',
      1 => 1445488792,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9270562868a9326b08-28586409',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="row">
<form id="subscribeForm" onsubmit="return false;">
    <input type="email" class="validate[required,custom[email]]" name="data[email]" id="email" placeholder="Enter email" >
	<button type="submit" id="subscribeSubmit">Subscribe</button>
	<img src="img/loading.gif" id="subscribeLoading" style="display:none;">
    <div id="subscribeNotif"></div>
</form>
</div>
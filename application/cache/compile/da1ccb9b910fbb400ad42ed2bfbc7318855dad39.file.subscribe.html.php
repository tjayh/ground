<?php /* Smarty version Smarty-3.0.6, created on 2015-10-14 11:17:30
         compiled from "C:\xampp\htdocs\samplewebsite30\skin/vii_ChangeThisToProjectName/include/subscribe.html" */ ?>
<?php /*%%SmartyHeaderCode:4332561e1daa9fcb08-06664327%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da1ccb9b910fbb400ad42ed2bfbc7318855dad39' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samplewebsite30\\skin/vii_ChangeThisToProjectName/include/subscribe.html',
      1 => 1444808047,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4332561e1daa9fcb08-06664327',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="row">
    <div class="col-md-5">
        <form class="form-inline subscribe-form" id="subscribeForm1" onsubmit="return false;">
            <input class="form-control" type="email" class="validate[required,custom[email]]" name="data[email]" id="email" placeholder="Enter email">
            <button type="submit" class="btn btn-default" id="subscribeSubmit">Subscribe</button>
            <img src="img/loading.gif" id="subscribeLoading" style="display:none;">
            <div id="subscribeNotif"></div>
        </form>
    </div>
</div>
<br/>
<div class="row">
    <div class="col-md-3">
        <form class="form-inline subscribe-form" id="subscribeForm2" onsubmit="return false;">
            <div class="form-group input-group">
                <input class="form-control" type="email" class="validate[required,custom[email]]" name="data[email]" id="email" placeholder="Enter email">
                <span class="input-group-btn">
				<button type="submit" class="btn btn-default" id="subscribeSubmit">Subscribe
				<img src="img/loading.gif" id="subscribeLoading" style="display:none;">
				<div id="subscribeNotif"></div>
				</button>
				</span>
            </div>
        </form>
    </div>
</div>
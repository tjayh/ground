<?php /* Smarty version Smarty-3.0.6, created on 2015-10-14 11:17:30
         compiled from "C:\xampp\htdocs\samplewebsite30\skin//default/includes/section_templates/item_with_colmd5image_title_caption_description_1.html" */ ?>
<?php /*%%SmartyHeaderCode:11092561e1daa34d7a6-55481210%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b988f5c9df6d4af19ed201afbdfed5075d6487e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samplewebsite30\\skin//default/includes/section_templates/item_with_colmd5image_title_caption_description_1.html',
      1 => 1440647957,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11092561e1daa34d7a6-55481210',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!-- item_with_colmd5image_title_caption_description_1 -->

<div class="theme-showcase" role="main">
	<div class="page-header text-center">
		<h3><?php echo $_smarty_tpl->getVariable('item')->value['section_title'];?>
</h3>
		<h5><?php echo $_smarty_tpl->getVariable('item')->value['section_subtitle'];?>
</h5>
	</div>
</div>




		<div class="col-md-5">
			<img src="<?php echo $_smarty_tpl->getVariable('item')->value['pages'][0]['image_src'];?>
" class="img-responsive" class="img-thumbnail">
		</div>
		<div class="col-md-7">
			<h1><?php echo $_smarty_tpl->getVariable('item')->value['pages'][0]['title'];?>
</h1>
			<h4><?php echo $_smarty_tpl->getVariable('item')->value['pages'][0]['caption'];?>
</h4>
			<p><?php echo $_smarty_tpl->getVariable('item')->value['pages'][0]['content'];?>
</p>
		</div>





<?php /* Smarty version Smarty-3.0.6, created on 2015-10-14 11:17:30
         compiled from "C:\xampp\htdocs\samplewebsite30\skin//default/includes/section_templates/item_with_title_caption_description_image_1.html" */ ?>
<?php /*%%SmartyHeaderCode:23207561e1daa2cb373-44300775%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b65c1ffc1c05f43da85a21fa2eae1dd9c5905dce' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samplewebsite30\\skin//default/includes/section_templates/item_with_title_caption_description_image_1.html',
      1 => 1441245298,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23207561e1daa2cb373-44300775',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!-- item_with_title_caption_description_image_1 -->
<div class="theme-showcase" role="main">
	<div class="page-header text-center">
		<h3><?php echo $_smarty_tpl->getVariable('item')->value['section_title'];?>
</h3>
		<h5><?php echo $_smarty_tpl->getVariable('item')->value['section_subtitle'];?>
</h5>
	</div>
</div>




		<h1><?php echo $_smarty_tpl->getVariable('item')->value['pages'][0]['title'];?>
</h1>
		<h4><?php echo $_smarty_tpl->getVariable('item')->value['pages'][0]['caption'];?>
</h4>
		<p><?php echo $_smarty_tpl->getVariable('item')->value['pages'][0]['content'];?>
</p>
		<img src="<?php echo $_smarty_tpl->getVariable('item')->value['pages'][0]['image_src'];?>
" class="img-responsive" class="img-thumbnail">






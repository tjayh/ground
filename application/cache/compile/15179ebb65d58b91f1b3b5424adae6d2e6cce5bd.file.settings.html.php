<?php /* Smarty version Smarty-3.0.6, created on 2015-10-14 10:54:34
         compiled from "C:\xampp\htdocs\samplewebsite30\skin/aceadmin/modules/seomanager/settings.html" */ ?>
<?php /*%%SmartyHeaderCode:30879561e184ad237b6-40533945%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15179ebb65d58b91f1b3b5424adae6d2e6cce5bd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samplewebsite30\\skin/aceadmin/modules/seomanager/settings.html',
      1 => 1440390467,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30879561e184ad237b6-40533945',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="page-content-area">
	<div class="page-header">
		<h1>
			SEO Settings
			<small style="display: none;">
				<i class="ace-icon fa fa-angle-double-right"></i>
			</small>
		</h1> </div>
	<div class="row">
		<div class="col-xs-12">
			<!-- Content Starts Here -->
			<div class="widget-box widget-color-blue" id="widge">
				<div class="widget-header">
					<div class="widget-toolbar no-border widgeToolRemSpace" id="widgetItemActions">
						<button id="btnEditForm" class="btn btn-success btn-xs"> <i class="fa fa-pencil"></i> Edit </button>
					</div>
				</div>
				<div class="widget-body">
					<form id="genSettingsForm" class="form-horizontal" role="form">
						<div class="widget-main">
							<!-- Widget Content / Editor Form -->
							<div class="row">
								<div class="col-xs-12">
									<div class="step-pane" id="step1">
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="meta_title"> Site Meta Title </label>
											<div class="col-sm-9">
												<input type="text" placeholder="Site Meta Title" class="col-xs-12 col-sm-8 fieldEditable" id="meta_title" name="data[meta_title]" disabled="disabled" value="<?php echo $_smarty_tpl->getVariable('meta_title')->value;?>
" /> </div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="meta_tags"> Site Meta Keyword </label>
											<div class="col-sm-9">
												<input type="text" placeholder="Site Meta Keyword" class="col-xs-12 col-sm-8 fieldEditable" id="meta_tags" name="data[meta_tags]" disabled="disabled" value="<?php echo $_smarty_tpl->getVariable('meta_tags')->value;?>
" /> </div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="meta_description"> Site Meta Description </label>
											<div class="col-sm-9">
												<input type="text" placeholder="Site Meta Description" class="col-xs-12 col-sm-8 fieldEditable" id="meta_description" name="data[meta_description]" disabled="disabled" value="<?php echo $_smarty_tpl->getVariable('meta_description')->value;?>
" /> </div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="meta_author"> Site Meta Author </label>
											<div class="col-sm-9">
												<input type="text" placeholder="Site Meta Author" class="col-xs-12 col-sm-8 fieldEditable" id="meta_author" name="data[meta_author]" disabled="disabled" value="<?php echo $_smarty_tpl->getVariable('meta_author')->value;?>
" /> </div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="meta_robots"> Site Meta Robots </label>
											<div class="col-sm-9">
												<input type="text" placeholder="Site Meta Robots" class="col-xs-12 col-sm-8 fieldEditable" id="meta_robots" name="data[meta_robots]" disabled="disabled" value="<?php echo $_smarty_tpl->getVariable('meta_robots')->value;?>
" /> </div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="seo_google_ua"> Google Analytics </label>
											<div class="col-sm-9">
												<input type="text" placeholder="Google Analytics" class="col-xs-12 col-sm-8 fieldEditable" id="seo_google_ua" name="data[seo_google_ua]" disabled="disabled" value="<?php echo $_smarty_tpl->getVariable('seo_google_ua')->value;?>
" /> </div>
										</div>
									</div>
								</div>
							</div>
							<!-- Widget End -->
						</div>
						<div class="widget-toolbox padding-8 clearfix hid" id="formActions">
							<a class="btn btn-xs btn-danger closeWidge ignore"> <i class="ace-icon fa fa-times"></i> <span class="bigger-110">Cancel</span> </a>
							<input type="reset" id="resetForm" class="hid">
							<button class="btn btn-xs btn-success" data-last="Finish"> <span class="bigger-110">Submit</span> <i class="ace-icon fa fa-arrow-right icon-on-right"></i> </button>
						</div>
					</form>
				</div>
			</div>
			<!-- Content Ends Here -->
		</div>
	</div>
</div>
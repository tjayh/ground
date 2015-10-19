<?php /* Smarty version Smarty-3.0.6, created on 2015-10-14 10:54:41
         compiled from "C:\xampp\htdocs\samplewebsite30\skin/aceadmin/modules/seomanager/socialmedia.html" */ ?>
<?php /*%%SmartyHeaderCode:13749561e1851623bc6-21999623%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a58fed2e0f62241d000ca2e74ac3ac873c788466' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samplewebsite30\\skin/aceadmin/modules/seomanager/socialmedia.html',
      1 => 1440390473,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13749561e1851623bc6-21999623',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="page-content-area">
	<div class="page-header">
		<h1>
			Social Media Settings
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
											<label class="col-sm-3 control-label no-padding-right" for="smedia_facebook"> Facebook </label>
											<div class="col-sm-9">
												<input type="text" placeholder="Facebook" class="col-xs-12 col-sm-8 fieldEditable" id="smedia_facebook" name="data[smedia_facebook]" disabled="disabled" value="<?php echo $_smarty_tpl->getVariable('smedia_facebook')->value;?>
" /> </div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="smedia_twitter"> Twitter </label>
											<div class="col-sm-9">
												<input type="text" placeholder="Twitter" class="col-xs-12 col-sm-8 fieldEditable" id="smedia_twitter" name="data[smedia_twitter]" disabled="disabled" value="<?php echo $_smarty_tpl->getVariable('smedia_twitter')->value;?>
" /> </div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="smedia_googleplus"> Google+ </label>
											<div class="col-sm-9">
												<input type="text" placeholder="Google+" class="col-xs-12 col-sm-8 fieldEditable" id="smedia_googleplus" name="data[smedia_googleplus]" disabled="disabled" value="<?php echo $_smarty_tpl->getVariable('smedia_googleplus')->value;?>
" /> </div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="smedia_instagram"> Instagram </label>
											<div class="col-sm-9">
												<input type="text" placeholder="Instagram" class="col-xs-12 col-sm-8 fieldEditable" id="smedia_instagram" name="data[smedia_instagram]" disabled="disabled" value="<?php echo $_smarty_tpl->getVariable('smedia_instagram')->value;?>
" /> </div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="smedia_linkedin"> LinkedIn </label>
											<div class="col-sm-9">
												<input type="text" placeholder="LinkedIn" class="col-xs-12 col-sm-8 fieldEditable" id="smedia_linkedin" name="data[smedia_linkedin]" disabled="disabled" value="<?php echo $_smarty_tpl->getVariable('smedia_linkedin')->value;?>
" /> </div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="smedia_pinterest"> Pinterest </label>
											<div class="col-sm-9">
												<input type="text" placeholder="Pinterest" class="col-xs-12 col-sm-8 fieldEditable" id="smedia_pinterest" name="data[smedia_pinterest]" disabled="disabled" value="<?php echo $_smarty_tpl->getVariable('smedia_pinterest')->value;?>
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
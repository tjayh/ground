<?php /* Smarty version Smarty-3.0.6, created on 2015-10-14 10:54:47
         compiled from "C:\xampp\htdocs\samplewebsite30\skin/aceadmin/modules/settings/index.html" */ ?>
<?php /*%%SmartyHeaderCode:32699561e185778e583-23343505%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f96fa3802506d8896ccaf294461dbbca72be7e10' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samplewebsite30\\skin/aceadmin/modules/settings/index.html',
      1 => 1444647424,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32699561e185778e583-23343505',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="page-content-area">
	<div class="page-header">
		<h1>General Settings</h1> 
	</div>
	<div class="row">
		<div class="col-xs-12">
			<!-- Content Starts Here -->
			<div class="widget-box widget-color-blue" id="widge">
				<div class="widget-header">
					<div class="widget-toolbar no-border widgeToolRemSpace" id="widgetItemActions">
						<button class="btn btn-xs btn-success" id="btnEditForm"> <i class="fa fa-pencil"></i> Edit </button>
					</div>
				</div>
				<div class="widget-body">
					<form id="genSettingsForm" class="form-horizontal" role="form">
						<div class="widget-main">
							<!-- Widget Content / Editor Form -->
							<div class="row">
								<div class="col-xs-12">
									<div>
										<div class="tabbable">
											<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
												<li class="active">
													<a data-toggle="tab" href="#general">General</a>
												</li>

												<?php if ($_smarty_tpl->getVariable('_admin')->value['id_admin_group']==1){?><li>
													<a data-toggle="tab" href="#image_dimensions">Image Dimensions</a>
												</li><?php }?>
												<!-- <li>
													<a data-toggle="tab" href="#dropdown14">More</a>
												</li> -->
											</ul>

											<div class="tab-content">
												<div id="general" class="tab-pane in active">
													<div class="form-group">
														<label class="col-sm-2 control-label no-padding-right" for="site_name"> Site </label>
														<div class="col-sm-10">
															<input type="text" placeholder="" class="col-xs-10 col-sm-5 fieldEditable" id="site_name" value="<?php echo $_smarty_tpl->getVariable('site_name')->value;?>
" name="data[site_name]" disabled="disabled" required /> </div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label no-padding-right" for="admin_name"> Admin </label>
														<div class="col-sm-10">
															<input type="text" placeholder="" class="col-xs-10 col-sm-5 fieldEditable" id="admin_name" value="<?php echo $_smarty_tpl->getVariable('admin_name')->value;?>
" name="data[admin_name]" disabled="disabled" required /> </div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label no-padding-right" for="admin_email"> Email </label>
														<div class="col-sm-10">
															<input type="text" placeholder="" class="col-xs-10 col-sm-5 fieldEditable" id="admin_email" value="<?php echo $_smarty_tpl->getVariable('admin_email')->value;?>
" name="data[admin_email]" disabled="disabled" required /> </div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label no-padding-right" for="site_css"> Override CSS </label>
														<div class="col-sm-10">
															<textarea type="text" class="fieldEditable col-xs-10 col-sm-5" disabled="disabled" style="overflow: scroll; word-wrap: break-word; resize: horizontal; height: 170px;" id="site_css" name="data[site_css]"><?php echo $_smarty_tpl->getVariable('site_css')->value;?>
</textarea>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label no-padding-right" for="site_logo"> Logo Image </label>
														<div class="col-sm-10">
															<div style="width:200px;">
																<input data-value="<?php echo $_smarty_tpl->getVariable('site_logo')->value;?>
" class="span8 fieldEditable imgupload " type="hidden" id="site_logo" name="data[site_logo]" data-upload-fxn="" data-img-src="" data-img-type="" data-upload-folder="images/logo" data-file-path="<?php echo $_smarty_tpl->getVariable('base_url')->value;?>
upload/images/logo/" data-dashboard-url="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
" data-upload-url="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
<?php echo $_smarty_tpl->getVariable('thisModule')->value;?>
/process/upload-logo" /> </div>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label no-padding-right" for="site_favicon"> Favicon Image </label>
														<div class="col-sm-10">
															<div style="width:200px;">
																<input data-value="<?php echo $_smarty_tpl->getVariable('site_favicon')->value;?>
" class="span8 fieldEditable imgupload " type="hidden" id="site_favicon" name="data[site_favicon]" data-upload-fxn="" data-img-src="" data-img-type="" data-upload-folder="images/favicon" data-file-path="<?php echo $_smarty_tpl->getVariable('base_url')->value;?>
upload/images/favicon/" data-dashboard-url="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
" data-upload-url="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
<?php echo $_smarty_tpl->getVariable('thisModule')->value;?>
/process/upload-favicon" /> </div>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label no-padding-right" for="new_theme"> Custom Theme </label>
														<div class="col-sm-10">
															<select name="new_theme" class="span6 fieldEditable" id="new_theme" disabled="disabled"> <?php  $_smarty_tpl->tpl_vars['theme'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('themes')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['theme']->key => $_smarty_tpl->tpl_vars['theme']->value){
?>
																<option value="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['theme']->value==$_smarty_tpl->getVariable('current_theme')->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
</option> <?php }} ?> </select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label no-padding-right" for="new_theme"> Custom CSS</label>
														<div class="col-sm-10">
															<select name="data[theme_css]" class="span6 fieldEditable" id="theme_css" disabled="disabled"> <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('css_lists')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
?>
																<option value="<?php echo $_smarty_tpl->tpl_vars['val']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['val']->value==$_smarty_tpl->getVariable('theme_css')->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</option> <?php }} ?> </select>
														</div>
													</div>
												</div>

												<div id="image_dimensions" class="tab-pane">
													<div class="form-group">
														<label class="col-sm-2 control-label no-padding-right" for="site_name"> Gallery Category </label>
														<div class="col-sm-9">
															<span>
																<input type="hidden" id="gallery" value="gallery" name="data[gallery_mod]" disabled="disabled" required />
																<input type="text" placeholder="Main Image Width" class="fieldEditable" id="gallery_wd" value="<?php echo $_smarty_tpl->getVariable('image_dimensions')->value['gallery_cat_wd'];?>
" name="data2[gallery_cat_wd]" disabled="disabled" />
															</span>
															<span>
																<input type="text" placeholder="Main Image Height" class="fieldEditable" id="gallery_hg" value="<?php echo $_smarty_tpl->getVariable('image_dimensions')->value['gallery_cat_hg'];?>
" name="data2[gallery_cat_hg]" disabled="disabled" />
															</span>
															&nbsp;
															<span>
																<input type="text" placeholder="Thumbnail Width" class="fieldEditable" id="gallery_th_wd" value="<?php echo $_smarty_tpl->getVariable('image_dimensions')->value['gallery_cat_th_wd'];?>
" name="data2[gallery_cat_th_wd]" disabled="disabled" />
															</span>
															<span>
																<input type="text" placeholder="Thumbnail Height" class="fieldEditable" id="gallery_th_hg" value="<?php echo $_smarty_tpl->getVariable('image_dimensions')->value['gallery_cat_th_hg'];?>
" name="data2[gallery_cat_th_hg]" disabled="disabled" />
															</span>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label no-padding-right" for="site_name"> Gallery Item </label>
														<div class="col-sm-9">
															<span>
																<input type="hidden" id="gallery" value="gallery" name="data[gallery_mod]" disabled="disabled" required />
																<input type="text" placeholder="Main Image Width" class="fieldEditable" id="gallery_wd" value="<?php echo $_smarty_tpl->getVariable('image_dimensions')->value['gallery_itm_wd'];?>
" name="data2[gallery_itm_wd]" disabled="disabled" />
															</span>
															<span>
																<input type="text" placeholder="Main Image Height" class="fieldEditable" id="gallery_hg" value="<?php echo $_smarty_tpl->getVariable('image_dimensions')->value['gallery_itm_hg'];?>
" name="data2[gallery_itm_hg]" disabled="disabled" />
															</span>
															&nbsp;
															<span>
																<input type="text" placeholder="Thumbnail Width" class="fieldEditable" id="gallery_th_wd" value="<?php echo $_smarty_tpl->getVariable('image_dimensions')->value['gallery_itm_th_wd'];?>
" name="data2[gallery_itm_th_wd]" disabled="disabled" />
															</span>
															<span>
																<input type="text" placeholder="Thumbnail Height" class="fieldEditable" id="gallery_th_hg" value="<?php echo $_smarty_tpl->getVariable('image_dimensions')->value['gallery_itm_th_hg'];?>
" name="data2[gallery_itm_th_hg]" disabled="disabled" />
															</span>
														</div>
													</div>
												</div>

												<!-- <div id="dropdown14" class="tab-pane">
													<p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade.</p>
												</div> -->
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Widget End -->
						</div>
						<div class="widget-toolbox padding-8 clearfix hid" id="formActions">
							<a class="btn btn-xs btn-danger closeWidge ignore"> <i class="ace-icon fa fa-times"></i> <span class="bigger-110">Cancel</span> </a>
							<input type="reset" id="resetForm" class="hid">
							<button class="btn btn-xs btn-success" id="submit" data-last="Finish"> <span class="bigger-110">Submit</span> <i class="ace-icon fa fa-arrow-right icon-on-right"></i> </button> <img src="img/admin_submit_loader.gif" id="sgLoader_whitebg" class="hid loaderGif" /> 
						</div>
					</form>
				</div>
			</div>
			<!-- Content Ends Here -->
		</div>
	</div>
</div> <span class="hid" id="cancelImage0" data-mtitle="<span class ='red'>Delete Image</span>" data-mbody="Are you sure you want to remove image for logo?" data-myes="CMS.removeUserImage(0,logo);"></span>
</div><span class="hid" id="cancelImage1" data-mtitle="<span class ='red'>Delete Image</span>" data-mbody="Are you sure you want to remove image for favicon?" data-myes="CMS.removeUserImage(1,favicon);"></span>
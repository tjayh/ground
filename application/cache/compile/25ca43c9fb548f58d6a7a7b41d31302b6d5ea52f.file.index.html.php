<?php /* Smarty version Smarty-3.0.6, created on 2015-10-14 10:52:11
         compiled from "C:\xampp\htdocs\samplewebsite30\skin/aceadmin/modules/bannermanager/index.html" */ ?>
<?php /*%%SmartyHeaderCode:23653561e17bbddd296-82593269%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '25ca43c9fb548f58d6a7a7b41d31302b6d5ea52f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samplewebsite30\\skin/aceadmin/modules/bannermanager/index.html',
      1 => 1440584578,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23653561e17bbddd296-82593269',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include 'application/libraries/smarty/plugins\modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include 'application/libraries/smarty/plugins\modifier.date_format.php';
?><div class="page-content-area">
	<div class="page-header">
		<h1>Banner Items</h1> 
	</div>
	<div class="row">
		<div class="col-xs-12">
			<!-- Content Starts Here -->
			<div class="widget-box widget-color-blue hid" id="widge">
				<div class="widget-header">
					<div class="widget-toolbar no-border widgeToolRemSpace" id="widgetItemActions">
						<button class="btn btn-xs btn-success" id="btnEditForm"> <i class="fa fa-pencil"></i> Edit </button>
						<button class="btn btn-xs showGlobal btn-danger colorImportant" data-getDetails="forDeleteFxn"> <i class="fa fa-trash"></i> Delete </button>
						<button class="btn btn-xs btn-info closeWidge"> <i class="ace-icon fa fa-arrow-left"></i> Back </button>
					</div>
					<div class="widget-toolbar no-border widgeToolRemSpace" id="widgetListBack">
						<button class="btn btn-xs btn-info closeWidge"> <i class="ace-icon fa fa-arrow-left"></i> Back </button>
					</div>
				</div>
				<div class="widget-body">
					<form id="genericForm" class="form-horizontal" role="form">
						<div class="widget-main">
							<!-- Widget Content / Editor Form -->
							<div class="row">
								<div class="col-xs-12">
									<div class="step-pane" id="step1">
										<input type="hidden" id="id_banner" name="where[id_banner]" value="" />
										<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right" for="image_src"> Image </label>
											<div class="col-sm-10">
												<div style="width:200px;">
													<input class="span8 fieldEditable imgupload" type="hidden" id="image_src" name="data[image_src]" data-upload-fxn="" data-img-src="" data-img-type="" data-upload-folder="images/banner" data-file-path="<?php echo $_smarty_tpl->getVariable('images_path')->value;?>
" data-dashboard-url="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
" data-upload-url="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
<?php echo $_smarty_tpl->getVariable('thisModule')->value;?>
/process/upload-image" /> </div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right" for="image_src"> Image 2</label>
											<div class="col-sm-10">
												<div style="width:200px;">
													<input class="span8 fieldEditable imgupload" type="hidden" id="image_src2" name="data[image_src2]" data-upload-fxn="" data-img-src="" data-img-type="" data-upload-folder="images/banner" data-file-path="<?php echo $_smarty_tpl->getVariable('images_path')->value;?>
" data-dashboard-url="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
" data-upload-url="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
<?php echo $_smarty_tpl->getVariable('thisModule')->value;?>
/process/upload-image" /> </div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right" for="date"> Date </label>
											<div class="col-sm-10">
												<input type="text" placeholder="" class="col-xs-10 col-sm-5 fieldEditable date-picker" id="date" name="data[date]" disabled="disabled" required /> </div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right" for="image_title"> Title </label>
											<div class="col-sm-10">
												<input type="text" placeholder="" class="col-xs-10 col-sm-5 fieldEditable" id="image_title" name="data[image_title]" disabled="disabled" required /> </div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right" for="image_sub_title"> Sub Title </label>
											<div class="col-sm-10">
												<input type="text" placeholder="" class="col-xs-10 col-sm-5 fieldEditable" id="image_sub_title" name="data[image_sub_title]" disabled="disabled" required /> </div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right" for="image_sub_title"> Sub Title 2 </label>
											<div class="col-sm-10">
												<input type="text" placeholder="" class="col-xs-10 col-sm-5 fieldEditable" id="image_sub_title2" name="data[image_sub_title2]" disabled="disabled" required /> </div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right" for="image_desc"> Description </label>
											<div class="col-sm-10">
												<textarea type="text" class="col-xs-10 col-sm-5 fieldEditable content_display" disabled="disabled" id="image_desc" name="data[image_desc]"></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right" for="image_sub_title"> Link </label>
											<div class="col-sm-10">
												<input type="text" placeholder="" class="col-xs-10 col-sm-5 fieldEditable" id="image_link" name="data[image_link]" disabled="disabled" required /> </div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right" for="image_meta_title"> Active </label>
											<div class="col-sm-10">
												<input type="checkbox" class="ace-checkbox-2 fieldEditable ace" disabled="disabled" id="status" name="data[status]" /> <span class="lbl"></span> </div>
										</div>
									</div>
								</div>
							</div>
							<!-- Widget End -->
						</div>
						<div class="widget-toolbox padding-8 clearfix" id="formActions">
							<a class="btn btn-xs btn-danger closeWidge ignore"> <i class="ace-icon fa fa-times"></i> <span class="bigger-110">Cancel</span> </a>
							<input type="reset" id="resetForm" class="hid">
							<button class="btn btn-xs btn-success" id="submit" data-last="Finish"> <span class="bigger-110">Submit</span> <i class="ace-icon fa fa-arrow-right icon-on-right"></i> </button> <img src="img/admin_submit_loader.gif" id="sgLoader_whitebg" class="hid loaderGif" /> 
						</div>
					</form>
				</div>
			</div><!-- Content Ends Here -->
		</div>
		<div class="col-xs-12">
			<div class="table-header">
				<button id="dtAddRow" class="btn btn-sm pull-right btn-info showWidge addReset"> <i class="icon-plus"></i> Add Banner </button>
				<div class="clearfix"></div>
			</div>
			<div class="table-responsive">
				<div class="dataTables_borderWrap">
					<table id="DT_Generic" style="display:none;" class="table table-striped table-bordered table-hover dataTable">
						<thead>
							<tr>
								<th>Title</th>
								<th>Image</th>
								<th>Date</th>
								<th>Active</th>
								<th></th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Title</th>
								<th>Image</th>
								<th>Date</th>
								<th>Active</th>
								<th></th>
							</tr>
						</tfoot>
						<tbody> <?php if ($_smarty_tpl->getVariable('banner')->value){?> <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('banner')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
							<tr>
								<td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['item']->value['image_title'],40);?>
</td>
								<td class="center"><?php if ($_smarty_tpl->tpl_vars['item']->value['image_src_thumb_link']){?><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['image_src_thumb_link'];?>
" style="max-height: 100px; max-width: 100px;"><?php }?></td>
								<td class="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['date']);?>
</td>
								<td class="center"> 
									<?php if ($_smarty_tpl->tpl_vars['item']->value['status']=='0'){?>
										<a class="showGlobal ignore" id="stat<?php echo $_smarty_tpl->tpl_vars['item']->value['id_banner'];?>
" style="color:#d15b47 !Important;" data-getDetails="enableFxn" data-modID="jdata<?php echo $_smarty_tpl->tpl_vars['item']->value['id_banner'];?>
" title="Enable item status"> <span class="label label-danger">InActive</span> </a> 
										<?php }else{ ?>
										<a class="showGlobal ignore" id="stat<?php echo $_smarty_tpl->tpl_vars['item']->value['id_banner'];?>
" style="color:#87b87f !Important;" data-getDetails="disableFxn" data-modID="jdata<?php echo $_smarty_tpl->tpl_vars['item']->value['id_banner'];?>
" title="Diable item status"> <span class="label label-success"> Active </span> </a> 
									<?php }?> 
								</td>
								<td class="td-actions" id="jdata<?php echo $_smarty_tpl->tpl_vars['item']->value['id_banner'];?>
" data-var="modules">
									<div class="hid" id="jd<?php echo $_smarty_tpl->tpl_vars['item']->value['id_banner'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['json'];?>
</div>
									<div class="center">
										<div class="inline position-relative">
											<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto"> <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i> </button>
											<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
												<li>
													<a href="javascript:;" class="showWidge setFormValues tooltip-info ignore btn-yellow" data-rel="tooltip" title="View"> <span class="blue">
															<i class="fa fa-search-plus"></i>
															</span> </a>
												</li>
												<li>
													<a href="javascript:;" class="showWidge setFormValues editItem tooltip-success ignore" data-rel="tooltip" title="Edit"> <span class="green">
															<i class="fa fa-pencil"></i>
															</span> </a>
												</li>
												<li>
													<a href="javascript:;" class="tooltip-error showGlobal ignore tooltip-error" data-rel="tooltip" title="Delete" title="Delete" data-modID="jdata<?php echo $_smarty_tpl->tpl_vars['item']->value['id_banner'];?>
" data-getDetails="forDeleteFxn"> <span class="red">
															<i class="fa fa-trash"></i>
															</span> </a>
												</li>
											</ul>
										</div>
									</div>
								</td>
							</tr> <?php }} ?> <?php }?> 
						</tbody>
					</table>
				</div>
			</div> 
			<span class = "hid" id = "forDeleteFxn" data-mtitle = "Delete" data-mbody = "Are you sure you want to delete this item?" data-myes = "deleteRow();"></span>
			<span class = "hid" id = "disableFxn" data-mtitle = "Disable Item Status" data-mbody = "Are you sure you want to Disable this item?" data-myes = "disableMod();"></span>
			<span class = "hid" id = "enableFxn" data-mtitle = "Enable Item Status" data-mbody = "Are you sure you want to Enable this item?" data-myes = "enableMod();"></span>
		</div>
	</div>
</div>
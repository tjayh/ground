<?php /* Smarty version Smarty-3.0.6, created on 2015-10-14 11:22:46
         compiled from "C:\xampp\htdocs\samplewebsite30\skin/aceadmin/modules/settings/modules.html" */ ?>
<?php /*%%SmartyHeaderCode:10565561e1ee69efcd6-29352833%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64b4107338eab390092cf9a4785a98b5041e3bb0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samplewebsite30\\skin/aceadmin/modules/settings/modules.html',
      1 => 1440585396,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10565561e1ee69efcd6-29352833',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="page-content-area">
	<div class="page-header">
		<h1>Modules</h1> 
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
										<input type="hidden" id="id_module" name="data[whr_id_module]" value="" />
										<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right" for="module_name"> Module Name </label>
											<div class="col-sm-10">
												<input type="text" placeholder="Module Name" class="col-xs-10 col-sm-5 fieldEditable" id="module_name" name="data[clmn_module_name]" disabled="disabled" required /> </div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right" for="module_description"> Module Description </label>
											<div class="col-sm-10">
												<textarea type="text" class="fieldEditable col-xs-10 col-sm-5" id="module_description" disabled="disabled" style="overflow: scroll; word-wrap: break-word; resize: horizontal; height: 170px;" id="site_css" name="data[clmn_module_description]"></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right" for="module_class"> Module Class </label>
											<div class="col-sm-10">
												<input type="text" placeholder="Module Class" class="col-xs-10 col-sm-5 fieldEditable" id="module_class" name="data[clmn_module_class]" disabled="disabled" required /> </div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right" for="link_rewrite"> Link Rewrite </label>
											<div class="col-sm-10">
												<input type="text" placeholder="Link Rewrite" class="col-xs-10 col-sm-5 fieldEditable" id="link_rewrite" name="data[clmn_link_rewrite]" disabled="disabled" required /> </div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right" for="isAdmin">Is Admin</label>
											<div class="col-sm-10">
												<input type="checkbox" class="ace fieldEditable" checked="checked" disabled="disabled" id="isAdmin" name="data[clmn_isAdmin]" /> <span class="lbl"></span> </div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right" for="isActive">Is Active</label>
											<div class="col-sm-10">
												<input type="checkbox" class="ace fieldEditable" checked="checked" disabled="disabled" id="isActive" name="data[clmn_isActive]" /> <span class="lbl"></span> </div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right" for="form-field-1">Upload Module</label>
											<div class="col-sm-10">
												<input type="hidden" id="moduleFolderName" name="data[moduleFolderName]" />
												<div id="moduleUploadDiv">
													<div class="btn btn-info btn-sm"><i class="fa fa-cloud-upload"></i> Upload Module</div>
												</div> <span id="moduleNameHolder"></span>&nbsp; <span class="red hid showGlobal" id="removeModule" data-getDetails="cancelModule"><i class = "icon-remove-sign"></i></span> </div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right" for="date_add"> Date Added </label>
											<div class="col-sm-10">
												<div class="input-group col-xs-10 col-sm-5">
													<input type="text" placeholder="Date Added" class=" date-picker form-control" disabled="disabled" data-date-format="mm-dd-yyyy" id="date_add" value="auto" required /> <span class="input-group-addon">
														<i class="fa fa-calendar bigger-110"></i>
													</span> </div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right" for="date_upd"> Date Updated </label>
											<div class="col-sm-10">
												<div class="input-group col-xs-10 col-sm-5">
													<input type="text" placeholder="Date Updated" class=" date-picker form-control" disabled="disabled" data-date-format="mm-dd-yyyy" id="date_upd" value="auto" required /> <span class="input-group-addon">
														<i class="fa fa-calendar bigger-110"></i>
													</span> </div>
											</div>
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
			</div>
			<!-- Content Ends Here -->
		</div>
		<div class="col-xs-12">
			<div class="table-header">
				<button id="dtAddRow" class="btn btn-sm pull-right btn-info showWidge addReset"> <i class="icon-plus"></i> Add Modules </button>
				<div class="clearfix"></div>
			</div>
			<div class="table-responsive">
				<div class="dataTables_borderWrap">
					<div>
						<table id="DT_Generic" style="display:none;" class="table table-striped table-bordered table-hover dataTable">
							<thead>
								<tr>
									<th>Module Name</th>
									<th>Class</th>
									<th>isAdmin</th>
									<th>isActive</th>
									<th></th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Module Name</th>
									<th>Class</th>
									<th>isAdmin</th>
									<th>isActive</th>
									<th></th>
								</tr>
							</tfoot>
							<tbody> <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('modules')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
								<tr>
									<td><?php echo $_smarty_tpl->tpl_vars['item']->value['module_name'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['item']->value['module_class'];?>
</td>
									<td class="center"> <?php if ($_smarty_tpl->tpl_vars['item']->value['isAdmin']){?> <span class="green"><i class="fa fa-check fa-lg"></i></span> <?php }else{ ?> <span class="red"><i class="fa fa-remove fa-lg"></i></span> <?php }?> </td>
									<td class="center"> <?php if ($_smarty_tpl->tpl_vars['item']->value['isActive']){?> <span class="green"><i class="fa fa-check fa-lg"></i></span> <?php }else{ ?> <span class="red"><i class="fa fa-remove fa-lg"></i></span> <?php }?> </td>
									<td class="td-actions" id="jdata<?php echo $_smarty_tpl->tpl_vars['item']->value['id_module'];?>
" data-var="modules">
										<div class="hid" id="jd<?php echo $_smarty_tpl->tpl_vars['item']->value['id_module'];?>
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
														<a href="javascript:;" class="tooltip-error showGlobal ignore tooltip-error" data-rel="tooltip" title="Delete" title="Delete" data-modID="jdata<?php echo $_smarty_tpl->tpl_vars['item']->value['id_module'];?>
" data-getDetails="forDeleteFxn"> <span class="red">
																<i class="fa fa-trash"></i>
																</span> </a>
													</li>
												</ul>
											</div>
										</div>
									</td>
								</tr> <?php }} ?> </tbody>
						</table>
					</div>
				</div>
			</div>
			<span class = "hid" id = "forDeleteFxn" data-mtitle = "Delete" data-mbody = "Are you sure you want to delete this item?" data-myes = "deleteRow();"></span>
			<span class = "hid" id = "disableFxn" data-mtitle = "Disable Item Status" data-mbody = "Are you sure you want to Disable this item?" data-myes = "disableMod();"></span>
			<span class = "hid" id = "enableFxn" data-mtitle = "Enable Item Status" data-mbody = "Are you sure you want to Enable this item?" data-myes = "enableMod();"></span>
		</div>
	</div>
</div>
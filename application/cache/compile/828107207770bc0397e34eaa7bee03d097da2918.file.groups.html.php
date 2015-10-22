<?php /* Smarty version Smarty-3.0.6, created on 2015-10-14 11:22:42
         compiled from "C:\xampp\htdocs\samplewebsite30\skin/aceadmin/modules/settings/groups.html" */ ?>
<?php /*%%SmartyHeaderCode:15791561e1ee234ac48-13533352%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '828107207770bc0397e34eaa7bee03d097da2918' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samplewebsite30\\skin/aceadmin/modules/settings/groups.html',
      1 => 1440585285,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15791561e1ee234ac48-13533352',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="page-content-area">
	<div class="page-header">
		<h1>Groups</h1> 
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
										<input type="hidden" id="id_admin_group" name="data[whr_id_admin_group]" value="" />
										<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right" for="group_name"> Group Name </label>
											<div class="col-sm-10">
												<input type="text" placeholder="Group Name" class="col-xs-10 col-sm-5 fieldEditable" id="group_name" name="data[clmn_group_name]" disabled="disabled" required /> </div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right" for="group_description"> Group Description </label>
											<div class="col-sm-10">
												<textarea type="text" class="fieldEditable col-xs-10 col-sm-5" id="group_description" disabled="disabled" style="overflow: scroll; word-wrap: break-word; resize: horizontal; height: 170px;" id="site_css" name="data[clmn_group_description]"></textarea>
											</div>
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
				<button id="dtAddRow" class="btn btn-sm pull-right btn-info showWidge addReset"> <i class="icon-plus"></i> Add Group </button>
				<div class="clearfix"></div>
			</div>
			<div class="table-responsive">
				<div class="dataTables_borderWrap">
					<div>
						<table id="DT_Generic" style="display:none;" class="table table-striped table-bordered table-hover dataTable">
							<thead>
								<tr>
									<th>Name</th>
									<th>Description</th>
									<th>date_add</th>
									<th></th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Name</th>
									<th>Description</th>
									<th>date_add</th>
									<th></th>
								</tr>
							</tfoot>
							<tbody> <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('groups')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
								<tr>
									<td><?php echo $_smarty_tpl->tpl_vars['item']->value['group_name'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['item']->value['group_description'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_add'];?>
</td>
									<td class="td-actions" id="jdata<?php echo $_smarty_tpl->tpl_vars['item']->value['id_admin_group'];?>
" data-var="modules">
										<div class="hid" id="jd<?php echo $_smarty_tpl->tpl_vars['item']->value['id_admin_group'];?>
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
														<a href="javascript:;" class="tooltip-error showGlobal ignore tooltip-error" data-rel="tooltip" title="Delete" title="Delete" data-modID="jdata<?php echo $_smarty_tpl->tpl_vars['item']->value['id_admin_group'];?>
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
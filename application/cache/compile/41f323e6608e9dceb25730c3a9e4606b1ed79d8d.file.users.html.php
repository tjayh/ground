<?php /* Smarty version Smarty-3.0.6, created on 2015-10-14 11:22:30
         compiled from "C:\xampp\htdocs\samplewebsite30\skin/aceadmin/modules/settings/users.html" */ ?>
<?php /*%%SmartyHeaderCode:15753561e1ed6d02eb5-09533058%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41f323e6608e9dceb25730c3a9e4606b1ed79d8d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samplewebsite30\\skin/aceadmin/modules/settings/users.html',
      1 => 1444020080,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15753561e1ed6d02eb5-09533058',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="page-content-area">
	<div class="page-header">
		<h1>Users</h1> 
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
										<input type="hidden" id="id_admin" name="data[whr_id_admin]" value="" />
										<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right" for="firstname"> First Name </label>
											<div class="col-sm-10">
												<input type="text" placeholder="First Name" class="col-xs-10 col-sm-5 fieldEditable" id="firstname" name="data[clmn_firstname]" disabled="disabled" required /> </div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right" for="lastname"> Last Name </label>
											<div class="col-sm-10">
												<input type="text" placeholder="Last Name" class="col-xs-10 col-sm-5 fieldEditable" id="lastname" name="data[clmn_lastname]" disabled="disabled" required /> </div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right" for="username"> Username </label>
											<div class="col-sm-10">
												<input type="text" placeholder="Last Name" class="col-xs-10 col-sm-5 fieldEditable" id="username" name="data[clmn_username]" disabled="disabled" required /> </div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right" for="password"> Password </label>
											<div class="col-sm-10">
												<input type="text" placeholder="Last Name" class="col-xs-10 col-sm-5 fieldEditable" id="password" name="data[clmn_password]" disabled="disabled" required />
												<a href="javascript:;" id="changePass" class="btn btn-success btn-mini hid" title="Change Password"> <i class="fa fa-pencil bigger-lg"></i> </a>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right" for="password"> Is Active </label>
											<div class="col-sm-10">
													<input type="checkbox" class="ace fieldEditable" checked="checked" disabled="disabled" id="isActive" name="data[clmn_isActive]" /> <span class="lbl"></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right" for="password"> Group </label>
											<div class="col-sm-10">
												<select id="id_admin_group" name="data[clmn_id_admin_group]" class="chozn-select col-xs-10 col-sm-5 fieldEditable" data-placeholder="Choose a Country..."> <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('groups')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
													<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id_admin_group'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['group_name'];?>
</option> <?php }} ?> </select>
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
				<button id="dtAddRow" class="btn btn-sm pull-right btn-info showWidge addReset"> <i class="icon-plus"></i> Add User </button>
				<div class="clearfix"></div>
			</div>
			<div class="table-responsive">
				<div class="dataTables_borderWrap">
					<div>
						<table id="DT_Generic" style="display:none;" class="table table-striped table-bordered table-hover dataTable">
							<thead>
								<tr>
									<th>Username</th>
									<th>Name</th>
									<th>Group</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Username</th>
									<th>Name</th>
									<th>Group</th>
									<th>Status</th>
									<th></th>
								</tr>
							</tfoot>
							<tbody> <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('users')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
								<tr>
									<td><?php echo $_smarty_tpl->tpl_vars['item']->value['username'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['item']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['item']->value['lastname'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['item']->value['group_name'];?>
</td>
									<td class="center"> 
										<?php if ($_smarty_tpl->tpl_vars['item']->value['isActive']=='0'){?>
											<a class="showGlobal ignore" id="stat<?php echo $_smarty_tpl->tpl_vars['item']->value['id_admin'];?>
" style="color:#d15b47 !Important;" data-getDetails="enableFxn" data-modID="jdata<?php echo $_smarty_tpl->tpl_vars['item']->value['id_admin'];?>
" title="Enable item status"> <span class="label label-danger">InActive</span> </a> 
											<?php }else{ ?>
											<a class="showGlobal ignore" id="stat<?php echo $_smarty_tpl->tpl_vars['item']->value['id_admin'];?>
" style="color:#87b87f !Important;" data-getDetails="disableFxn" data-modID="jdata<?php echo $_smarty_tpl->tpl_vars['item']->value['id_admin'];?>
" title="Diable item status"> <span class="label label-success"> Active </span> </a> 
										<?php }?> 
									</td>
									<td class="td-actions" id="jdata<?php echo $_smarty_tpl->tpl_vars['item']->value['id_admin'];?>
" data-var="modules">
										<div class="hid" id="jd<?php echo $_smarty_tpl->tpl_vars['item']->value['id_admin'];?>
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
														<a href="javascript:;" class="tooltip-error showGlobal ignore tooltip-error" data-rel="tooltip" title="Delete" title="Delete" data-modID="jdata<?php echo $_smarty_tpl->tpl_vars['item']->value['id_admin'];?>
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
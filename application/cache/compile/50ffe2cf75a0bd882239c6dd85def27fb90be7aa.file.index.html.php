<?php /* Smarty version Smarty-3.0.6, created on 2015-10-15 05:36:58
         compiled from "C:\xampp\htdocs\samplewebsite30\skin/aceadmin/modules/newslettermanager/index.html" */ ?>
<?php /*%%SmartyHeaderCode:13177561f1f5ad09780-30854538%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50ffe2cf75a0bd882239c6dd85def27fb90be7aa' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samplewebsite30\\skin/aceadmin/modules/newslettermanager/index.html',
      1 => 1444810918,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13177561f1f5ad09780-30854538',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="page-content-area">
	<div class="page-header">
		<h1>Subscribers</h1> 
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="widget-box widget-color-blue hid" id="widge">
				<div class="widget-header">
					<div class="widget-toolbar no-border widgeToolRemSpace" id="widgetItemActions">
						<button class="btn btn-xs showGlobal btn-danger colorImportant" data-getDetails="forDeleteFxn"> <i class="fa fa-trash"></i> Delete </button>
						<button class="btn btn-xs btn-info closeWidge"> <i class="ace-icon fa fa-arrow-left"></i> Back </button>
					</div>
					<div class="widget-toolbar no-border widgeToolRemSpace" id="widgetListBack">
						<button class="btn btn-xs btn-info closeWidge"> <i class="ace-icon fa fa-arrow-left"></i> Back </button>
					</div>
				</div>
				<div class="widget-body">
					<form id="genericForm" class="form-horizontal">
						<div class="widget-main">
							<div class="row">
								<div class="col-xs-12">
									<div class="step-pane" id="step1">
										<input type="hidden" id="id_subscriber" name="data[whr_id_subscriber]" value="" />
										<div class="form-group">
											<label class="col-sm-2 control-label" for="form-field-1">E-mail</label>
											<div class="col-sm-10">
												<input type="text" class="col-xs-10 col-sm-5 fieldEditable" id="email" disabled="disabled" required/> </div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label" for="form-field-1">Is Active</label>
											<div class="col-sm-10">
												<input type="checkbox" class="ace-checkbox-2 fieldEditable" disabled="disabled" id="isActive" /> <span class="lbl"></span> </div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label" for="form-field-1">Date Subscribed</label>
											<div class="row-fluid input-append col-sm-10" style="width:64.812%">
												<input class="col-xs-10 col-sm-5 date-picker" data-date-format="mm-dd-yyyy" type="text" disabled="disabled" id="date_add" value="auto"> <span class="add-on">
									<i class="icon-calendar"></i>
									</span> </div>
													</div>
									</div>
								</div>
								<div class="widget-toolbox padding-8 clearfix" id="formActions">
									<a class="btn btn-xs btn-danger closeWidge ignore"> <i class="ace-icon fa fa-times"></i> <span class="bigger-110">Cancel</span> </a>
									<input type='reset' id="resetForm" class="hid" />
									<button class="btn btn-xs btn-success" data-last="Finish" id="submit"> <span class="bigger-110">Submit</span> <i class="ace-icon fa fa-arrow-right icon-on-right"></i> </button> <img src="img/loading_whitebg.gif" id="sgLoading_whitebg" class="hid loaderGif" style="vertical-align:bottom !Important;" />&nbsp;&nbsp;&nbsp; <img src="img/admin_submit_loader.gif" id="sgLoader_whitebg" class="hid loaderGif" /> </div>
							</div>
						</div>
					</form>
					<!--/widget-main-->
				</div>
				<!--/widget-body-->
			</div>
		</div>
		<div class="col-xs-12">
			<div class="table-header">
				<a class="btn btn-sm pull-right btn-info ignore" href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
newsletter/process/export-subscribers-list" target="_blank"> <i class="icon-plus"></i> Export </a>
				<div class="clearfix"></div>
			</div>
			<div class="table-responsive">
				<div class="dataTables_borderWrap">
					<table aria-describedby="sample-table-2_info" id="DT_Generic" style="display:none;" class="table table-striped table-bordered table-hover dataTable">
						<thead>
							<tr>
								<th>Email</th>
								<th>Date Subscribed</th>
								<th>Active</th>
								<th></th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Email</th>
								<th>Date Subscribed</th>
								<th>Active</th>
								<th></th>
							</tr>
						</tfoot>
						<tbody> <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('subscribers')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
							<tr>
								<td> <?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
 </td>
								<td> <?php echo $_smarty_tpl->tpl_vars['item']->value['date_add'];?>
 </td>
								<td class="center"> <?php if ($_smarty_tpl->tpl_vars['item']->value['status']=='1'){?> <span class="label label-success"> Active </span> <?php }else{ ?> <span class="label label-danger">InActive</span> <?php }?> </td>
								<td class="td-actions" id="jdata<?php echo $_smarty_tpl->tpl_vars['item']->value['id_subscriber'];?>
" data-var="modules">
									<div class="hid" id="jd<?php echo $_smarty_tpl->tpl_vars['item']->value['id_subscriber'];?>
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
													<a href="javascript:;" class="tooltip-error showGlobal ignore tooltip-error" data-rel="tooltip" title="Delete" title="Delete" data-modID="jdata<?php echo $_smarty_tpl->tpl_vars['item']->value['id_subscriber'];?>
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
			</div> <span class="hid" id="forDeleteFxn" data-mtitle="Delete" data-mbody="Are you sure you want to delete this subscriber?" data-myes="deleteRow();"></span> </div>
	</div>
</div>
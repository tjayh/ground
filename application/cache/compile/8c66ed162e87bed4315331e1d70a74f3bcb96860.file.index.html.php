<?php /* Smarty version Smarty-3.0.6, created on 2015-10-14 10:53:54
         compiled from "C:\xampp\htdocs\samplewebsite30\skin/aceadmin/modules/testimonial_manager/index.html" */ ?>
<?php /*%%SmartyHeaderCode:23009561e1822e9eae1-02388366%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c66ed162e87bed4315331e1d70a74f3bcb96860' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samplewebsite30\\skin/aceadmin/modules/testimonial_manager/index.html',
      1 => 1440584087,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23009561e1822e9eae1-02388366',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include 'application/libraries/smarty/plugins\modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include 'application/libraries/smarty/plugins\modifier.date_format.php';
?><div class="page-content-area">
	<div class="page-header">
		<h1>Testimonial Items</h1> 
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
					<form id="genericForm" class="form-horizontal" role="form">
						<div class="widget-main">
							<!-- Widget Content / Editor Form -->
							<div class="row">
								<div class="col-xs-12">
									<div>
										<div class="step-pane" id="step1">
											<input type="hidden" id="id_testimonial" name="where[id_testimonial]" value="" />
											<div class="form-group">
												<label class="col-sm-2 control-label no-padding-right" for="testimonialDate"> Date </label>
												<div class="col-sm-10">
													<div id="testimonialDate" class="itemValue col-xs-10 col-sm-5 "></div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label no-padding-right" for="testimonialName"> Name </label>
												<div class="col-sm-10">
													<div id="testimonialName" class="itemValue col-xs-10 col-sm-5 "></div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label no-padding-right" for="testimonialMessage"> Message </label>
												<div class="col-sm-10">
													<div id="testimonialMessage" class="itemValue col-xs-10 col-sm-5 "></div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label no-padding-right" for="testimonialEmail"> Email </label>
												<div class="col-sm-10">
													<div id="testimonialEmail" class="itemValue col-xs-10 col-sm-5 "></div>
												</div>
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
					<!--/widget-main-->
				</div>
				<!--/widget-body-->
			</div>
		</div>
		<div class="col-xs-12">
			<div class="table-header">
				<div class="clearfix"></div>
			</div>
			<div class="table-responsive">
				<div class="dataTables_borderWrap">
					<table aria-describedby="sample-table-2_info" id="DT_Generic" style="display:none;" class="table table-striped table-bordered table-hover dataTable">
						<thead>
							<tr>
								<th>Name</th>
								<th>Message</th>
								<th>Email</th>
								<th>Status</th>
								<th>Date</th>
								<th></th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Name</th>
								<th>Message</th>
								<th>Email</th>
								<th>Date</th>
								<th>Status</th>
								<th></th>
							</tr>
						</tfoot>
						<tbody> <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('testimonial')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
								<td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['item']->value['message'],100);?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
</td>
								<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['date_add'],"F j, Y");?>
</td>
								<td class="center"> 
									<?php if ($_smarty_tpl->tpl_vars['item']->value['status']=='0'){?>
										<a class="showGlobal ignore" id="stat<?php echo $_smarty_tpl->tpl_vars['item']->value['id_testimonial'];?>
" style="color:#d15b47 !Important;" data-getDetails="enableFxn" data-modID="jdata<?php echo $_smarty_tpl->tpl_vars['item']->value['id_testimonial'];?>
" title="Enable item status"> <span class="label label-danger">InActive</span> </a> 
										<?php }else{ ?>
										<a class="showGlobal ignore" id="stat<?php echo $_smarty_tpl->tpl_vars['item']->value['id_testimonial'];?>
" style="color:#87b87f !Important;" data-getDetails="disableFxn" data-modID="jdata<?php echo $_smarty_tpl->tpl_vars['item']->value['id_testimonial'];?>
" title="Diable item status"> <span class="label label-success"> Active </span> </a> 
									<?php }?> 
								</td>
								<td class="td-actions" id="jdata<?php echo $_smarty_tpl->tpl_vars['item']->value['id_testimonial'];?>
" data-var="modules">
									<div class="hid" id="jd<?php echo $_smarty_tpl->tpl_vars['item']->value['id_testimonial'];?>
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
													<a href="javascript:;" class="tooltip-error showGlobal ignore tooltip-error" data-rel="tooltip" title="Delete" title="Delete" data-modID="jdata<?php echo $_smarty_tpl->tpl_vars['item']->value['id_testimonial'];?>
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
			<span class = "hid" id = "forDeleteFxn" data-mtitle = "Delete" data-mbody = "Are you sure you want to delete this item?" data-myes = "deleteRow();"></span> 
			<span class = "hid" id = "disableFxn" data-mtitle = "Disable Item Status" data-mbody = "Are you sure you want to Disable this item?" data-myes = "disableMod();"></span>
			<span class = "hid" id = "enableFxn" data-mtitle = "Enable Item Status" data-mbody = "Are you sure you want to Enable this item?" data-myes = "enableMod();"></span>
		</div>
	</div>
</div>
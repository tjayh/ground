<?php /* Smarty version Smarty-3.0.6, created on 2015-10-15 09:48:42
         compiled from "C:\xampp\htdocs\samplewebsite30\skin/aceadmin/modules/admindashboard/index.html" */ ?>
<?php /*%%SmartyHeaderCode:12300561f5a5a9549c7-45947964%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '13afabd21e65329937c4b0aba77b45eb8f8a6236' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samplewebsite30\\skin/aceadmin/modules/admindashboard/index.html',
      1 => 1444895319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12300561f5a5a9549c7-45947964',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include 'application/libraries/smarty/plugins\modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include 'application/libraries/smarty/plugins\modifier.date_format.php';
?><?php if ($_smarty_tpl->getVariable('bcContactIndex')->value){?>
<div class="col-xs-12">
<h3 class="header smaller lighter blue">Last 10 Visitor Contacted Us</h3>
	<div class="table-header">
		<a class="btn btn-sm pull-right btn-info ignore" href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
contactus"> <i class="icon-plus"></i> View </a>
		<div class="clearfix"></div>
	</div>
	<div class="table-responsive">
		<div class="dataTables_borderWrap">
			<div>
				<table id="sample-table-1" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>Name</th>
							<th>Message</th>
							<th>Email</th>
							<th>Date</th>
						</tr>
					</thead>
					<tbody> <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('contacts')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
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
							
						</tr> 
						<?php if ($_smarty_tpl->tpl_vars['key']->value==9){?><?php break 1?><?php }?>
						<?php }} ?> </tbody>
				</table>
			</div>
		</div> 
		<span class = "hid" id = "forDeleteFxn" data-mtitle = "Delete" data-mbody = "Are you sure you want to delete this item?" data-myes = "deleteRow();"></span>
	</div>
</div>
<?php }?>
<?php if ($_smarty_tpl->getVariable('bcNewsSub')->value){?>
<div class="col-xs-12">
<h3 class="header smaller lighter blue">Last 10 Subscribed Visitors</h3>
	<div class="table-header">
		<a class="btn btn-sm pull-right btn-info ignore" href="<?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
newsletter"> <i class="icon-plus"></i> View </a>
		<div class="clearfix"></div>
	</div>
	<div class="table-responsive">
		<div class="dataTables_borderWrap">
			<div>
				<table id="sample-table-1" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>Email</th>
							<th>Date Subscribed</th>
							<th>Active</th>
						</tr>
					</thead>
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
						</tr> <?php if ($_smarty_tpl->getVariable('key')->value==9){?><?php break 1?><?php }?> <?php }} ?> </tbody>
				</table>
			</div>
		</div> <span class="hid" id="forDeleteFxn" data-mtitle="Delete" data-mbody="Are you sure you want to delete this subscriber?" data-myes="deleteRow();"></span> </div>
</div>
<?php }?>
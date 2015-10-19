<?php /* Smarty version Smarty-3.0.6, created on 2015-10-14 11:17:30
         compiled from "C:\xampp\htdocs\samplewebsite30\skin/vii_ChangeThisToProjectName/include/recent-testimonials.html" */ ?>
<?php /*%%SmartyHeaderCode:30623561e1daa94ade3-03587191%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '531707d6fd5824ce58b958373da7619879d2c16f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samplewebsite30\\skin/vii_ChangeThisToProjectName/include/recent-testimonials.html',
      1 => 1444808047,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30623561e1daa94ade3-03587191',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
 <h4>Recent Testimonials Per Item</h4>
<!-- <div class="row">
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('_testimonials')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<div class="col-md-3">
	<p><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</p>
	<p><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</p>
	<p><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
</p>
	<p><?php echo $_smarty_tpl->tpl_vars['item']->value['message'];?>
</p>
	</div>
	<?php }} ?>
</div> -->
<div class="row">

    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('_testimonials')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
                <h4 class="panel-title">
          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" aria-expanded="true" aria-controls="collapse<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
            <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

          </a>
        </h4>
            </div>
            <div id="collapse<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
                <div class="panel-body">
                    <h4>
            <?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>

          </h4>
                    <p>
                        <?php echo $_smarty_tpl->tpl_vars['item']->value['message'];?>

                    </p>
                </div>
            </div>
        </div>
        <?php }} ?>
    </div>

    <a href="<?php echo $_smarty_tpl->getVariable('base_url')->value;?>
testimonial" class="btn btn-primary">
    View All Testimonials
  </a>

</div>
		
		
		
		
		
		
		
		
		
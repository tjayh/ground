<?php /* Smarty version Smarty-3.0.6, created on 2015-10-14 10:54:48
         compiled from "C:\xampp\htdocs\samplewebsite30\skin/vii_ChangeThisToProjectName/include/footer.html" */ ?>
<?php /*%%SmartyHeaderCode:26221561e18586709e9-47444338%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70762072984fc7e63cf0a299ad608856ba5304ca' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samplewebsite30\\skin/vii_ChangeThisToProjectName/include/footer.html',
      1 => 1444808047,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26221561e18586709e9-47444338',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'application/libraries/smarty/plugins\modifier.date_format.php';
?><footer class="bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-4"> <span class="copyright">
          Copyright © 
          <a href="<?php echo $_smarty_tpl->getVariable('base_url')->value;?>
">
            <?php echo $_smarty_tpl->getVariable('_site_title')->value;?>

          </a>
          <?php echo smarty_modifier_date_format(time(),"%Y");?>

        </span> </div>
			<div class="col-md-4">
				<ul class="list-inline social-buttons">
					<li>
						<a href="<?php echo $_smarty_tpl->getVariable('_sm_facebook')->value;?>
"> <i class="fa fa-twitter">
              </i> </a>
					</li>
					<li>
						<a href="<?php echo $_smarty_tpl->getVariable('_sm_twitter')->value;?>
"> <i class="fa fa-facebook">
              </i> </a>
					</li>
					<li>
						<a href="<?php echo $_smarty_tpl->getVariable('_sm_linkedin')->value;?>
"> <i class="fa fa-linkedin">
              </i> </a>
					</li>
				</ul>
			</div>
			<div class="col-md-4">
				<ul class="list-inline quicklinks">
					<li> <a href="<?php echo $_smarty_tpl->getVariable('base_url')->value;?>
privacypolicy">
              Privacy Policy
            </a> </li>
					<li> <a href="<?php echo $_smarty_tpl->getVariable('base_url')->value;?>
termscondition">
              Terms of Use
            </a> </li>
				</ul>
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-4">
				<h4>
          About Us
      </h4>
				<p> <?php echo $_smarty_tpl->getVariable('_page_about')->value;?>
 </p>
			</div>
			<div class="col-md-4">
				<h4>
              Recent News Per Item
            </h4> <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('_news')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
				<!-- <p><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</p> -->
				<p> <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['image_link'];?>
/"><?php if ($_smarty_tpl->tpl_vars['item']->value['image_src_thumb']){?>
							<img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['item']->value['image_src_thumb'];?>
" >
						<?php }?></a> </p>
				<p> <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['image_link'];?>
/"><?php if ($_smarty_tpl->tpl_vars['item']->value['image_src']){?>
						<img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['item']->value['image_src'];?>
">
						<?php }?></a> </p>
				<h3><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['image_link'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['image_title'];?>
</a></h3>
				<h4><?php echo $_smarty_tpl->tpl_vars['item']->value['image_sub_title'];?>
</h4>
				<p><?php echo strip_tags($_smarty_tpl->tpl_vars['item']->value['image_desc']);?>
</p>
				<hr/> <?php }} ?> </div>
			<div class="col-md-4">
				<h4>
              Contact Us
            </h4>
				<div class="list"> <i class="icon-phone">
              </i> Phone: <?php echo $_smarty_tpl->getVariable('_contact_no')->value;?>

					<hr /> <i class="icon-envelope-alt">
              </i> Email: <?php echo $_smarty_tpl->getVariable('_contact_email')->value;?>

					<hr /> <i class="icon-home">
              </i> Address: <?php echo $_smarty_tpl->getVariable('_contact_address')->value;?>
 </div>
			</div>
		</div>
	</div>
</footer>
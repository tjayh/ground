<?php /* Smarty version Smarty-3.0.6, created on 2015-10-14 11:17:33
         compiled from "C:\xampp\htdocs\samplewebsite30\skin/vii_ChangeThisToProjectName/modules/promo/index.html" */ ?>
<?php /*%%SmartyHeaderCode:21901561e1dadf3afa9-61240243%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '475e00af84a161032d980de4d16a0dcd48a4b6d4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samplewebsite30\\skin/vii_ChangeThisToProjectName/modules/promo/index.html',
      1 => 1444814240,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21901561e1dadf3afa9-61240243',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'application/libraries/smarty/plugins\modifier.date_format.php';
if (!is_callable('smarty_modifier_truncate')) include 'application/libraries/smarty/plugins\modifier.truncate.php';
?><!---------- All ---------->
<!-- <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('recent_promo')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<p><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</p>
	<?php if ($_smarty_tpl->getVariable('year')->value!=$_smarty_tpl->tpl_vars['item']->value['year']){?><?php $_smarty_tpl->tpl_vars["year"] = new Smarty_variable($_smarty_tpl->tpl_vars['item']->value['year'], null, null);?> =====<?php echo $_smarty_tpl->tpl_vars['item']->value['year'];?>
===== <?php }?>
	<?php if ($_smarty_tpl->getVariable('month')->value!=$_smarty_tpl->tpl_vars['item']->value['month']){?><?php $_smarty_tpl->tpl_vars["month"] = new Smarty_variable($_smarty_tpl->tpl_vars['item']->value['month'], null, null);?> =====<?php echo $_smarty_tpl->tpl_vars['item']->value['month'];?>
===== <?php }?>
	<p><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['image_link'];?>
"><?php echo ucwords($_smarty_tpl->tpl_vars['item']->value['image_title']);?>
</a></p>
	<?php if ($_smarty_tpl->tpl_vars['key']->value==4){?><?php break 1?><?php }?> 
<?php }} ?> -->
<!---------- All ---------->

<!---------- List ---------->
<!-- <?php if ($_smarty_tpl->getVariable('promo')->value){?>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('promo')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	 <?php if ($_smarty_tpl->getVariable('month')->value!=$_smarty_tpl->tpl_vars['item']->value['month']){?><?php $_smarty_tpl->tpl_vars["month"] = new Smarty_variable($_smarty_tpl->tpl_vars['item']->value['month'], null, null);?> =====<?php echo $_smarty_tpl->tpl_vars['item']->value['month'];?>
===== <?php }?>
		<p><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</p>
		<p><?php echo $_smarty_tpl->tpl_vars['item']->value['id_promo_item'];?>
</p>
		<p><?php echo $_smarty_tpl->tpl_vars['item']->value['image_sub_title'];?>
</p>
		<p><a  href="<?php echo $_smarty_tpl->tpl_vars['item']->value['image_link'];?>
"><?php echo ucwords($_smarty_tpl->tpl_vars['item']->value['image_title']);?>
</a></p>
		<p><?php if ($_smarty_tpl->tpl_vars['item']->value['image_src_thumb']){?><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['image_src_thumb'];?>
" style="max-height: 150px; max-width: 150px;"/><?php }?></p>
		<p><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['date']);?>
</p>
		<p><?php echo smarty_modifier_truncate(strip_tags($_smarty_tpl->tpl_vars['item']->value['image_desc']),1000);?>
</p>
	<?php }} ?>
<?php }?> -->
<!---------- List ---------->

<!---------- Pagination ---------->
<!-- <?php if ($_smarty_tpl->getVariable('promo')->value){?>
<ul class="pagination">
	<?php if ($_smarty_tpl->getVariable('int_page')->value>1){?><li><a href="<?php echo $_smarty_tpl->getVariable('base_url')->value;?>
<?php echo $_smarty_tpl->getVariable('thisModule')->value;?>
/page/<?php echo $_smarty_tpl->getVariable('int_page')->value-1;?>
" rel="prev">Prev</a></li><?php }?>
		<?php $_smarty_tpl->tpl_vars['page'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['page']->step = 1;$_smarty_tpl->tpl_vars['page']->total = (int)ceil(($_smarty_tpl->tpl_vars['page']->step > 0 ? $_smarty_tpl->getVariable('num_pages')->value+1 - (1) : 1-($_smarty_tpl->getVariable('num_pages')->value)+1)/abs($_smarty_tpl->tpl_vars['page']->step));
if ($_smarty_tpl->tpl_vars['page']->total > 0){
for ($_smarty_tpl->tpl_vars['page']->value = 1, $_smarty_tpl->tpl_vars['page']->iteration = 1;$_smarty_tpl->tpl_vars['page']->iteration <= $_smarty_tpl->tpl_vars['page']->total;$_smarty_tpl->tpl_vars['page']->value += $_smarty_tpl->tpl_vars['page']->step, $_smarty_tpl->tpl_vars['page']->iteration++){
$_smarty_tpl->tpl_vars['page']->first = $_smarty_tpl->tpl_vars['page']->iteration == 1;$_smarty_tpl->tpl_vars['page']->last = $_smarty_tpl->tpl_vars['page']->iteration == $_smarty_tpl->tpl_vars['page']->total;?>
			<?php if ($_smarty_tpl->getVariable('int_page')->value==$_smarty_tpl->tpl_vars['page']->value){?>
				<li><span class="current"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</span></li>
			<?php }else{ ?>
				<li><a href="<?php echo $_smarty_tpl->getVariable('base_url')->value;?>
<?php echo $_smarty_tpl->getVariable('thisModule')->value;?>
/page/<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a></li>
			<?php }?>
		<?php }} ?>
	<?php if ($_smarty_tpl->getVariable('int_page')->value<$_smarty_tpl->getVariable('num_pages')->value){?><li><a href="<?php echo $_smarty_tpl->getVariable('base_url')->value;?>
<?php echo $_smarty_tpl->getVariable('thisModule')->value;?>
/page/<?php echo $_smarty_tpl->getVariable('int_page')->value+1;?>
" rel="next">Next</a></li><?php }?>
</ul>
<?php }?> -->
<!---------- Pagination ---------->

<div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-8">
        <!-- First Blog Post -->
        <?php if ($_smarty_tpl->getVariable('promo')->value){?> <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('promo')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>

        <h2>
							<a  href="<?php echo $_smarty_tpl->tpl_vars['item']->value['image_link'];?>
"><?php echo ucwords($_smarty_tpl->tpl_vars['item']->value['image_title']);?>
</a>
						</h2>
        <p class="lead">
            by
            
            <a href="javacript:;">
          <?php echo $_smarty_tpl->tpl_vars['item']->value['image_author'];?>
</a>
        </p>
        <p>
            <span class="glyphicon glyphicon-time"></span> Posted on <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['date']);?>

		<a href="http://www.facebook.com/sharer.php?u=<?php echo $_smarty_tpl->tpl_vars['item']->value['image_link'];?>
" target="_blank">
			<img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
		</a>
		<a href="https://twitter.com/share?url=<?php echo $_smarty_tpl->tpl_vars['item']->value['image_link'];?>
&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons" target="_blank">
			<img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
		</a>
		<a href="https://plus.google.com/share?url=<?php echo $_smarty_tpl->tpl_vars['item']->value['image_link'];?>
" target="_blank">
			<img src="https://simplesharebuttons.com/images/somacro/google.png" alt="Google" />
		</a>
		<a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());">
			<img src="https://simplesharebuttons.com/images/somacro/pinterest.png" alt="Pinterest" />
		</a>
            <!-- at 10:00 PM  -->
        </p>
        <hr>
        <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['image_link'];?>
"><img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['item']->value['image_src_thumb'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['image_title'];?>
" style="width:100%"></a>
        <hr>
        <p><?php echo smarty_modifier_truncate(strip_tags($_smarty_tpl->tpl_vars['item']->value['image_desc']),1000);?>
</p>
        <a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['item']->value['image_link'];?>
">Read More 
										<span class="glyphicon glyphicon-chevron-right"></span>
									</a>
        <hr> <?php }} ?> <?php }?>

        <!-- Pager -->
        <?php if ($_smarty_tpl->getVariable('promo')->value){?>
        <ul class="pager">
            <li class="previous">
                <?php if ($_smarty_tpl->getVariable('int_page')->value>1){?><a href="<?php echo $_smarty_tpl->getVariable('base_url')->value;?>
<?php echo $_smarty_tpl->getVariable('thisModule')->value;?>
/page/<?php echo $_smarty_tpl->getVariable('int_page')->value-1;?>
">&larr; Older</a><?php }?>
            </li>
            <li class="next">
                <?php if ($_smarty_tpl->getVariable('int_page')->value<$_smarty_tpl->getVariable('num_pages')->value){?><a href="<?php echo $_smarty_tpl->getVariable('base_url')->value;?>
<?php echo $_smarty_tpl->getVariable('thisModule')->value;?>
/page/<?php echo $_smarty_tpl->getVariable('int_page')->value+1;?>
">Newer &rarr;</a><?php }?>
            </li>
        </ul>
        <?php }?>

        <!-- Pagination -->
        <?php if ($_smarty_tpl->getVariable('promo')->value){?>
        <ul class="pagination">
            <?php if ($_smarty_tpl->getVariable('int_page')->value>1){?>
            <li><a href="<?php echo $_smarty_tpl->getVariable('base_url')->value;?>
<?php echo $_smarty_tpl->getVariable('thisModule')->value;?>
/page/<?php echo $_smarty_tpl->getVariable('int_page')->value-1;?>
" rel="prev">Prev</a></li><?php }?> <?php $_smarty_tpl->tpl_vars['page'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['page']->step = 1;$_smarty_tpl->tpl_vars['page']->total = (int)ceil(($_smarty_tpl->tpl_vars['page']->step > 0 ? $_smarty_tpl->getVariable('num_pages')->value+1 - (1) : 1-($_smarty_tpl->getVariable('num_pages')->value)+1)/abs($_smarty_tpl->tpl_vars['page']->step));
if ($_smarty_tpl->tpl_vars['page']->total > 0){
for ($_smarty_tpl->tpl_vars['page']->value = 1, $_smarty_tpl->tpl_vars['page']->iteration = 1;$_smarty_tpl->tpl_vars['page']->iteration <= $_smarty_tpl->tpl_vars['page']->total;$_smarty_tpl->tpl_vars['page']->value += $_smarty_tpl->tpl_vars['page']->step, $_smarty_tpl->tpl_vars['page']->iteration++){
$_smarty_tpl->tpl_vars['page']->first = $_smarty_tpl->tpl_vars['page']->iteration == 1;$_smarty_tpl->tpl_vars['page']->last = $_smarty_tpl->tpl_vars['page']->iteration == $_smarty_tpl->tpl_vars['page']->total;?> <?php if ($_smarty_tpl->getVariable('int_page')->value==$_smarty_tpl->tpl_vars['page']->value){?>
            <li><span class="current"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</span></li>
            <?php }else{ ?>
            <li><a href="<?php echo $_smarty_tpl->getVariable('base_url')->value;?>
<?php echo $_smarty_tpl->getVariable('thisModule')->value;?>
/page/<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a></li>
            <?php }?> <?php }} ?> <?php if ($_smarty_tpl->getVariable('int_page')->value<$_smarty_tpl->getVariable('num_pages')->value){?>
            <li><a href="<?php echo $_smarty_tpl->getVariable('base_url')->value;?>
<?php echo $_smarty_tpl->getVariable('thisModule')->value;?>
/page/<?php echo $_smarty_tpl->getVariable('int_page')->value+1;?>
" rel="next">Next</a></li><?php }?>
        </ul>
        <?php }?>





    </div>
    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">
        <!-- Blog Search Well -->
        <div class="well">
            <h4>Search</h4>


            <form role="form" id="searchForm" action="<?php echo $_smarty_tpl->getVariable('base_url')->value;?>
search" method="get">
                <div class="form-group input-group">
                    <input type="text" name="search" placeholder="Search" class="form-control">
                    <input type="hidden" name="k" value="<?php echo $_smarty_tpl->getVariable('thisModule')->value;?>
">
                    <span class="input-group-btn">
							<button type="submit"  class="btn btn-default" id="searchBtn"><i class="fa fa-search"></i>
								<img src="img/loading.gif" class="loadingGif" style="display:none;">
								<div id="subNotif"></div>
							</button>
						</span>
                </div>
            </form>


            <!-- /.input-group -->
        </div>
        <!-- Blog Categories Well -->
        <div class="well">
            <h4>Recent Promo</h4>
            <div class="row">
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('recent_promo')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['image_link'];?>
"><?php echo ucwords($_smarty_tpl->tpl_vars['item']->value['image_title']);?>
</a></li>
                        <?php if ($_smarty_tpl->tpl_vars['key']->value==4){?><?php break 1?><?php }?> <?php }} ?>

                    </ul>
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- Side Widget Well -->
        <div class="well">
            <h4>Side Widget Well</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
        </div>
    </div>
</div>
<?php /* Smarty version Smarty-3.0.6, created on 2015-10-14 11:24:10
         compiled from "C:\xampp\htdocs\samplewebsite30\skin/vii_ChangeThisToProjectName/modules/promo/view.html" */ ?>
<?php /*%%SmartyHeaderCode:424561e1f3a1ab596-09712455%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52ae183912a9b4a31791472a654f073450d5e915' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samplewebsite30\\skin/vii_ChangeThisToProjectName/modules/promo/view.html',
      1 => 1444808048,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '424561e1f3a1ab596-09712455',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'application/libraries/smarty/plugins\modifier.date_format.php';
?><!---------- Recent ---------->
<!-- <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('recent_promo')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<p><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</p>
	<p><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['image_link'];?>
"><?php echo ucwords($_smarty_tpl->tpl_vars['item']->value['image_title']);?>
</a></p>
	<?php if ($_smarty_tpl->tpl_vars['key']->value==4){?><?php break 1?><?php }?> 
<?php }} ?> -->
<!---------- Recent ---------->

<!---------- Article ---------->
<!-- <p><?php echo ucwords($_smarty_tpl->getVariable('data')->value['image_title']);?>
</p>
<p><?php echo $_smarty_tpl->getVariable('data')->value['image_sub_title'];?>
</p>
<p><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('data')->value['date']);?>
</p>
<p><?php if ($_smarty_tpl->getVariable('data')->value['image_src']){?><img src="<?php echo $_smarty_tpl->getVariable('data')->value['image_src'];?>
" style="max-height: 150px; max-width: 150px;"/><?php }?></p>
<p><?php echo $_smarty_tpl->getVariable('data')->value['image_desc'];?>
</p>
<?php if ($_smarty_tpl->getVariable('prev_image_link')->value){?><a href="<?php echo $_smarty_tpl->getVariable('prev_image_link')->value;?>
">Previous Post</a><<?php }?>
<?php if ($_smarty_tpl->getVariable('next_image_link')->value){?><a href="<?php echo $_smarty_tpl->getVariable('next_image_link')->value;?>
" >Next Post</a><?php }?> -->

<!---------- Article ---------->

<!---------- Facebook Comment ---------->
<!-- <div class="fb-comments visible-lg hidden-md hidden-sm hidden-xs" data-href="<?php echo $_smarty_tpl->getVariable('data')->value['image_link'];?>
" data-width="637" data-numposts="20" data-colorscheme="light"></div>
<div class="fb-comments hidden-lg hidden-sm vissible-md hidden-xs" data-href="<?php echo $_smarty_tpl->getVariable('data')->value['image_link'];?>
" data-width="637" data-numposts="20" data-colorscheme="light"></div>
<div class="fb-comments hidden-lg vissible-sm hidden-md hidden-xs" data-href="<?php echo $_smarty_tpl->getVariable('data')->value['image_link'];?>
" data-width="495" data-numposts="20" data-colorscheme="light"></div>
<div class="fb-comments hidden-lg hidden-sm hidden-md visible-xs" data-href="<?php echo $_smarty_tpl->getVariable('data')->value['image_link'];?>
" data-numposts="20" data-width="300" data-colorscheme="light"></div>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script> -->
<!---------- Facebook Comment ---------->


<div class="row">

    <!-- Blog Post Content Column -->
    <div class="col-lg-8">

        <!-- Blog Post -->

        <!-- Title -->
        <h1><?php echo ucwords($_smarty_tpl->getVariable('data')->value['image_title']);?>
</h1>

        <!-- Author -->
        <p class="lead">
            by 
            <a href="javacript:;">
          <?php echo $_smarty_tpl->getVariable('data')->value['image_author'];?>
</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('data')->value['date']);?>

		<a href="http://www.facebook.com/sharer.php?u=<?php echo $_smarty_tpl->getVariable('data')->value['image_link'];?>
" target="_blank">
			<img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
		</a>
		<a href="https://twitter.com/share?url=<?php echo $_smarty_tpl->getVariable('data')->value['image_link'];?>
&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons" target="_blank">
			<img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
		</a>
		<a href="https://plus.google.com/share?url=<?php echo $_smarty_tpl->getVariable('data')->value['image_link'];?>
" target="_blank">
			<img src="https://simplesharebuttons.com/images/somacro/google.png" alt="Google" />
		</a>
		<a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());">
			<img src="https://simplesharebuttons.com/images/somacro/pinterest.png" alt="Pinterest" />
		</a>
            <!-- at 9:00 PM -->
        </p>

        <hr>

        <!-- Preview Image -->
        <?php if ($_smarty_tpl->getVariable('data')->value['image_src']){?><img src="<?php echo $_smarty_tpl->getVariable('data')->value['image_src'];?>
" class="img-responsive" /><?php }?>

        <hr>

        <!-- Post Content -->
        <p class="lead"><?php echo $_smarty_tpl->getVariable('data')->value['image_desc'];?>
</p>

        <hr>

        <!-- Blog Comments -->

        <!-- Comments Form -->
        <div class="fb-comments visible-lg hidden-md hidden-sm hidden-xs" data-href="<?php echo $_smarty_tpl->getVariable('data')->value['image_link'];?>
" data-width="637" data-numposts="20" data-colorscheme="light"></div>
        <div class="fb-comments hidden-lg hidden-sm vissible-md hidden-xs" data-href="<?php echo $_smarty_tpl->getVariable('data')->value['image_link'];?>
" data-width="637" data-numposts="20" data-colorscheme="light"></div>
        <div class="fb-comments hidden-lg vissible-sm hidden-md hidden-xs" data-href="<?php echo $_smarty_tpl->getVariable('data')->value['image_link'];?>
" data-width="495" data-numposts="20" data-colorscheme="light"></div>
        <div class="fb-comments hidden-lg hidden-sm hidden-md visible-xs" data-href="<?php echo $_smarty_tpl->getVariable('data')->value['image_link'];?>
" data-numposts="20" data-width="300" data-colorscheme="light"></div>

        <div id="fb-root"></div>
        <script>
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>

        <hr>



        <ul class="pager">
            <li class="previous">
                <?php if ($_smarty_tpl->getVariable('prev_image_link')->value){?><a href="<?php echo $_smarty_tpl->getVariable('prev_image_link')->value;?>
">&larr; Older Post</a><?php }?>
            </li>
            <li class="next">
                <?php if ($_smarty_tpl->getVariable('next_image_link')->value){?><a href="<?php echo $_smarty_tpl->getVariable('next_image_link')->value;?>
">Newer Post &rarr;</a><?php }?>
            </li>
        </ul>


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
<!-- /.row -->

<hr>
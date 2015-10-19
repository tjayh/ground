<?php /* Smarty version Smarty-3.0.6, created on 2015-10-15 04:43:41
         compiled from "C:\xampp\htdocs\samplewebsite30\skin/aceadmin/login.template.html" */ ?>
<?php /*%%SmartyHeaderCode:30716561f12ddbbc9e8-80515861%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e9607a07048dfa2c8ebbefea443f2fd1b943928' => 
    array (
      0 => 'C:\\xampp\\htdocs\\samplewebsite30\\skin/aceadmin/login.template.html',
      1 => 1437534792,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30716561f12ddbbc9e8-80515861',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Administrator Login</title>
    <base href="<?php echo $_smarty_tpl->getVariable('base_url')->value;?>
skin/<?php echo $_smarty_tpl->getVariable('admin_theme')->value;?>
/" />
    <meta name="description" content="User login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="img/favicon/favicon.png">
	
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/ace-fonts.css" />
    <link rel="stylesheet" href="css/ace.min.css" />
    <link rel="stylesheet" href="css/ace-responsive.min.css" />
    <link rel="stylesheet" href="css/ace-skins.min.css" />
    <link rel="stylesheet" href="css/custom.css" />
</head>

<body class="login-layout">
    <br/>
    <br/>
    <br/>
    <div class="main-container container-fluid">
		<div class="main-content">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="login-container">
						<div class="center">
							<h1>
								<img src = 'img/viiworks.png' width = "50px"/>
								<span class="grey" id="id-text2">Viiworks Application</span>
							</h1>
							<h4 class="blue" id="id-company-text">&copy; Viiworks Inc.</h4>
						</div>

						<div class="space-6"></div>

						<div class="position-relative">
							<div id="login-box" class="login-box visible widget-box no-border">
								<div class="widget-body">
									<div class="widget-main">
										<h4 class="header blue lighter bigger">
											<i class="ace-icon fa fa-coffee green"></i>
											Login Details
										</h4>

										<div class="space-6"></div>

										<form id="loginForm">
											<input type="hidden" name="redirect" value="<?php echo $_smarty_tpl->getVariable('redirect')->value;?>
" />
											<fieldset>
												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="text" class="form-control" name="_username" placeholder="Username" required/>
														<i class="ace-icon fa fa-user"></i>
													</span>
												</label>

												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="password" class="form-control" name="_password" placeholder="Password" required/>
														<i class="ace-icon fa fa-lock"></i>
													</span>
												</label>

												<div class="space"></div>

												<div class="clearfix">
													<img src="img/spinner.gif" id="spinnerGif" />
													<button id="btnLogin" class="width-35 pull-right btn btn-sm btn-primary">
														<i class="ace-icon fa fa-key"></i>
														<span class="bigger-110">Login</span>
													</button>
												</div>

												<div class="space-4"></div>
											</fieldset>
										</form>
									</div><!-- /.widget-main -->
								</div><!-- /.widget-body -->
							</div><!-- /.login-box -->
						</div><!-- /.position-relative -->

                        <div class="clearfix">
                            <div id="loginNotification"></div>
                        </div>
					</div>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.main-content -->
    </div>
	<span id="thisURL" class="hid"><?php echo $_smarty_tpl->getVariable('admin_base')->value;?>
</span>
    <!--[if !IE]>-->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='js/jquery-ie.js'>"+"<"+"/script>");
		</script>
	<!--<![endif]-->	
	<!--[if IE]>-->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='js/jquery-ie.js'>"+"<"+"/script>");
		</script>
	<!--<![endif]-->
    <script type="text/javascript">
        if ("ontouchend" in document) document.write("<script src='js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/login.js"></script>
    <script type="text/javascript">
        function show_box(id) {
            $('.widget-box.visible').removeClass('visible');
            $('#' + id).addClass('visible');
        }
    </script>
</body>

</html>
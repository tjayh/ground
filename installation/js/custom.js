$(document).ready(function($){
			var flag;
			var container = new Array();
			container[0] = "reserved";
			container[1] = "dbconfig";
			container[2] = "siteconfig";

			container[3] = "confirmation";
			var containerTitle = new Array();
			containerTitle[0] = "reserved";
			containerTitle[1] = "Database Configuration";
			containerTitle[2] = "Site Configuration";

			containerTitle[3] = "Confirmation";
			init();
			function init(){
				$('input#dbserver').val('localhost');
			/*	$('input#dbname').val('');
				$('input#dbuser').val('');
				$('input#dbpass').val('');
				$('input#tablepref').val('vii_');
				$('input#sitename').val('');
				$('input#themefolder').val('');
				$('input#adminname').val('');
				$('input#metaauthor').val('');*/
				$('input#formID').val('1');
				$('div.container').hide();
				$('div.containerModule').hide();
				$('div#dbconfig').show();
				//$('div#siteconfig').show();
				//$('div#bminstall').show();
				$("label").css({"color":""});
				$('button#nextStep').show();
				$('button#viewError').hide();
				$('button#back').hide();
				$('div#sideguide li').removeClass('active');
				$('div#sideguide li.6 i').removeClass('progressActive');
				$('div#sideguide li.1').addClass('active');
				$('div#sideguide li.6 i.1').addClass('progressActive');
			}
			$('button.btn').click(function(){	
				$(this).blur();
			});
			$('a#buttonStart').click(function(){	
				setTimeout(function() {
					$('body').css({'background-color':'#7f7f7f'});
					$('div#wizardContainer').show();
					$( "div#wizardContainer" ).animate({
						top: 100
					}, {
						duration: 1000,
						step: function( now, fx ){
							$( "div#wizardContainer" ).css( "top", now );
						}
					});
				}, 50);
			});
			$('a#abort').click(function(){
				$(this).blur();
				setTimeout(function() {
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
					$('div#exitSetup').hide();
					$('div#wizardContainer').hide();
					$('body').css({'background-color':'#fff'});
				}, 50);
				init();
			});
			$('button#nextStep').click(function(){
				$(this).blur();
				$('p#notification').fadeOut();
				var formID = $('input#formID').val();
				if(formID < 3){
					$("label").css({"color":""});
					$('form#'+formID).submit();
					$('button#viewError').hide();
				}
				
				else if(formID == 3){
					$('img#actindicator').fadeIn();
					confirm();
					$(this).hide();
				}
				
			});
			
			$('form#1').on( "submit", function( event ) {
				flag = true;
				var dbserver = $('input#dbserver').val();
				var dbname = $('input#dbname').val();
				var dbuser = $('input#dbuser').val();
				var dbpass = $('input#dbpass').val();
				var tablepref = $('input#tablepref').val();
				if(dbserver == ''){
					flag = false;
					var label = $("label[for='dbserver']");
					label.css({"color":"#8D0202"});
				}
				if(dbname == ''){
					flag = false;
					var label = $("label[for='dbname']");
					label.css({"color":"#8D0202"});
				}
				if(dbuser == ''){
					flag = false;
					var label = $("label[for='dbuser']");
					label.css({"color":"#8D0202"});
				}
				if(tablepref == ''){
					flag = false;
					var label = $("label[for='tablepref']");
					label.css({"color":"#8D0202"});
				}
				
				if(!flag){
					$('p#notification').fadeIn(300);
					$('p#notification').css({"color":"#8D0202"});
					$('p#notification').text("Please fill out all the required fields.");
					setTimeout(function() {
						$('p#notification').fadeOut(600);
					}, 2000);
				}
				else{
					$("label").css({"color":""});
					$('p#notification').text("");
					$('p#notification').hide();
					$('img#actindicator').fadeIn();
					
					$.post( 
						"installation/functions/dbconnect.php", 
						{ 
							dbserver: dbserver,
							dbname: dbname,
							dbuser: dbuser,
							dbpass: dbpass,
							tablepref: tablepref
							
						},
						function( data ) {
							$('img#actindicator').hide();
							if(data){
								try {
									obj = $.parseJSON(data);
									//alert(data.toString());
									$('p#notification').css("color","#036c03");
									$('p#notification').text("Successfully connected to the database.");
									$('p#notification').fadeIn(300);
									$('div#dbconfig').fadeOut(300);
									setTimeout(function() {
										var formID = $('input#formID').val();
										$('input#formID').val(++formID);
										var title = containerTitle[formID];
										$('p#headingRight').text(title);
										$('div#siteconfig').show();
										$('li.1').removeClass('active');
										$('li.2').addClass('active');
										$('i.2').addClass('progressActive');
									}, 300);
									if(obj.themes.length){
										$('select#themefolder').html('<option value=""></option>');
										for(var x=0; x<obj.themes.length;x++){
											$('select#themefolder').append('<option value="'+obj.themes[x]+'">'+obj.themes[x]+'</option>');
										}
									} else {
										var theme_container = $('select#themefolder').parent();
										theme_container.html('<input type="text" class="form-control" name="themefolder" id="themefolder" required>');
									}
									
								} catch (e) {
									$('div#errorMessage .modal-body').html(data);
									$('p#notification').css({"color":"#8D0202"});
									$('p#notification').text("Error was encountered.");
									$('button#viewError').fadeIn(300);
									$('p#notification').fadeIn(300);
								}
							}
							else{
								$('p#notification').css({"color":"#8D0202"});
								$('p#notification').text("Network error. Please try again.");
								$('p#notification').fadeIn(300);
							}
							
							setTimeout(function() {
								$('p#notification').fadeOut(600);
							}, 2000);
						}
					);
				}
				
				event.preventDefault();
			});
			
			$('form#2').on( "submit", function( event ) {
				flag = true;
				var sitename = $('input#sitename').val();
				var themefolder = $('#themefolder').val();
				var adminname = $('input#adminname').val();
				var metaauthor = $('input#metaauthor').val();
				if(sitename == ''){
					flag = false;
					var label = $("label[for='sitename']");
					label.css({"color":"#8D0202"});
				}
				if(themefolder == ''){
					flag = false;
					var label = $("label[for='themefolder']");
					label.css({"color":"#8D0202"});
				}
				if(adminname == ''){
					flag = false;
					var label = $("label[for='adminname']");
					label.css({"color":"#8D0202"});
				}
				if(metaauthor == ''){
					flag = false;
					var label = $("label[for='metaauthor']");
					label.css({"color":"#8D0202"});
				}
				
				if(!flag){
					$('p#notification').fadeIn(300);
					$('p#notification').css({"color":"#8D0202"});
					$('p#notification').text("Please fill out all the required fields.");
					setTimeout(function() {
						$('p#notification').fadeOut(600);
					}, 2000);
				}
				else{
					$("label").css({"color":""});
					$('p#notification').text("");
					$('p#notification').hide();
					$('img#actindicator').fadeIn();
					setTimeout(function() {
						$.post( 
							"installation/functions/sitedetails.php", 
							{ 
								sitename: sitename,
								themefolder: themefolder,
								adminname: adminname,
								metaauthor: metaauthor
								
							},
							function( data ) {
								$('img#actindicator').hide();	
								if(data){
									try {
										obj = $.parseJSON(data);
									} catch (e) {
										$('div#errorMessage .modal-body').html(data);
										$('p#notification').css({"color":"#8D0202"});
										$('p#notification').text("Error was encountered.");
										$('button#viewError').fadeIn(300);
										$('p#notification').fadeIn(300);
									}
								}
								else{
									$('p#notification').css({"color":"#8D0202"});
									$('p#notification').text("Network error. Please try again.");
									$('p#notification').fadeIn(300);
								}
								setTimeout(function() {
									$('p#notification').fadeOut(600);
								}, 2000);
							}
						);
						
						$.post( 
							"installation/functions/getmodules.php", 
							{ 
								modtype: 1
							},
							function( data ) {
								$('img#actindicator').hide();	
								if(data){
									try {
										obj = $.parseJSON(data);
										
										if(obj.errorlist == null){
											$('p#notification').css("color","#036c03");
											$('p#notification').text("Site configuration successful.");
											$('p#notification').fadeIn(300);
											$('div#siteconfig').fadeOut(300);
											setTimeout(function() {
												var formID = $('input#formID').val();
												$('input#formID').val(++formID);
												var title = containerTitle[formID];
												$('p#headingRight').text(title);
												$('div#bminstall').show();
												
												if(jQuery.isEmptyObject(obj.modnames)){
													$('div#bminstall').html("<ul class = 'generated'><li class = 'generated'><p class = 'generated' style = 'color: #8D0202'><i class='fa fa-meh-o'></i> Basic Modules directory is empty.</p></li></ul>");
												}
												else{
													$('div#bmmodulesLeft').html("");
													$('div#bmmodulesRight').html("");
													var htmlLeft = "";
													htmlLeft += "<ul class ='generated'>";
													
													var num = obj.modnames.length;
													if(num > 5){
														var htmlRight = "";
														htmlRight += "<ul class ='generated'>";
													}
													
													for(i=0;i < num;i++){
														if(i < 6){
															htmlLeft += "<li class ='generated'><p  class ='generated'><i class='fa fa-check-square activated'></i> "+obj.modnames[i]+"</p></li>";
														}
														else{
															htmlRight += "<li class ='generated'><p  class ='generated'><i class='fa fa-check-square activated'></i> "+obj.modnames[i]+"</p></li>";
														}
													}
													
													htmlLeft += "</ul>";
													$('div#bmmodulesLeft').html(htmlLeft);
													
													if(num > 5){
														htmlRight += "</ul>";
														$('div#bmmodulesRight').html(htmlRight);
													}
												}
												$('li.2').removeClass('active');
												$('li.3').addClass('active');
												$('i.3').addClass('progressActive');
											}, 300);
											
										}
										else{
											$('div#errorMessage .modal-body').html("");
											var num = obj.errorlist.length;
											var i;
											for(i=0;i<num;i++){
												$('div#errorMessage .modal-body').append("<br/>"+obj.errorlist[0]);
											}
											$('p#notification').css({"color":"#8D0202"});
											$('p#notification').text("Error was encountered.");
											$('button#viewError').fadeIn(300);
											$('p#notification').fadeIn(300);
										}
									
									} catch (e) {
										alert(e);
										$('div#errorMessage .modal-body').html(data);
										$('p#notification').css({"color":"#8D0202"});
										$('p#notification').text("Error was encountered.");
										$('button#viewError').fadeIn(300);
										$('p#notification').fadeIn(300);
									}
								}
								else{
									$('p#notification').css({"color":"#8D0202"});
									$('p#notification').text("Network error. Please try again.");
									$('p#notification').fadeIn(300);
								}
								setTimeout(function() {
									$('p#notification').fadeOut(600);
								}, 2000);
							}
						);
					
					}, 500);
				}
				event.preventDefault();
			});
			
			function getPremiumModules(){
				$('img#actindicator').fadeIn();
				$('li.3').removeClass('active');
				$('li.4').addClass('active');
				$('i.4').addClass('progressActive');
				
				$('div#bminstall').fadeOut();
				//$('div#pminstall').fadeIn();
				
				$.post( 
					"installation/functions/getmodules.php", 
					{ 
						modtype: 2
					},
					function( data ) {
						$('img#actindicator').hide();	
						if(data){
							try {
								obj = $.parseJSON(data);
								
								if(obj.errorlist == null){
									$('p#notification').css("color","#036c03");
									$('p#notification').text("Site configuration successful.");
									$('p#notification').fadeIn(300);
									$('div#siteconfig').fadeOut(300);
									setTimeout(function() {
										var formID = $('input#formID').val();
										$('input#formID').val(++formID);
										var title = containerTitle[formID];
										$('p#headingRight').text(title);
										$('div#pminstall').show();
										
										if(jQuery.isEmptyObject(obj.modnames)){
											$('div#pminstall').html("<ul class = 'generated'><li class = 'generated'><p class = 'generated' style = 'color: #8D0202'><i class='fa fa-meh-o'></i> Premium Modules directory is empty.</p></li></ul>");
										}
										else{
											$('div#pmmodulesLeft').html("");
											$('div#pmmodulesRight').html("");
											var htmlLeft = "";
											htmlLeft += "<ul class ='generated'>";
											
											var num = obj.modnames.length;
											if(num > 5){
												var htmlRight = "";
												htmlRight += "<ul class ='generated'>";
											}
											
											for(i=0;i < num;i++){
												if(i < 6){
													htmlLeft += "<li class ='generated'><p  class ='generated'><i class='fa fa-minus-square'></i> "+obj.modnames[i]+"</p></li>";
												}
												else{
													htmlRight += "<li class ='generated'><p  class ='generated'><i class='fa fa-minus-square'></i> "+obj.modnames[i]+"</p></li>";
												}
											}
											
											htmlLeft += "</ul>";
											$('div#pmmodulesLeft').html(htmlLeft);
											
											if(num > 5){
												htmlRight += "</ul>";
												$('div#pmmodulesRight').html(htmlRight);
											}
										}
									}, 300);
									
								}
								else{
									$('div#errorMessage .modal-body').html("");
									var num = obj.errorlist.length;
									var i;
									for(i=0;i<num;i++){
										$('div#errorMessage .modal-body').append("<br/>"+obj.errorlist[0]);
									}
									$('p#notification').css({"color":"#8D0202"});
									$('p#notification').text("Error was encountered.");
									$('button#viewError').fadeIn(300);
									$('p#notification').fadeIn(300);
								}
							
							} catch (e) {
								alert(e);
								$('div#errorMessage .modal-body').html(data);
								$('p#notification').css({"color":"#8D0202"});
								$('p#notification').text("Error was encountered.");
								$('button#viewError').fadeIn(300);
								$('p#notification').fadeIn(300);
							}
						}
						else{
							$('p#notification').css({"color":"#8D0202"});
							$('p#notification').text("Network error. Please try again.");
							$('p#notification').fadeIn(300);
						}
						setTimeout(function() {
							$('p#notification').fadeOut(600);
						}, 2000);
					}
				);
				
			}
			function getInstallationDetails(){
				$('div#pminstall').fadeOut();
				var formID = $('input#formID').val();
				$('input#formID').val(++formID);
				var title = containerTitle[formID];
				$('p#headingRight').text(title);
				$('li.4').removeClass('active');
				$('li.5').addClass('active');
				$('i.5').addClass('progressActive');
				
			}
			function confirm(){
				
				$.post( 
					"installation/functions/success.php", 
					
					function( data ) {
						
						if(data){
							window.location.replace(data);
						}
						else{
							alert("error");
							location.reload(true);
						}
						
					}
				);
			}
			
			
			new AjaxUpload('#importSQL', {
				action: 'installation/functions/upload.php', 
				name: 'userfile',
				params: ['sql'],
				onSubmit : function(file , ext){
					if (! (ext && /^(sql)$/.test(ext))){
						alert('Error: invalid file extension');
						return false;
					}
					/*var img = '<img src="images/loading.gif"  class = "twoLine"/>';			
					$('#bsquare_image_id').html(img);*/
					
				},
				onComplete: function(file, response) {
					$('div#importSQL').html(response);
				}
			});
		});
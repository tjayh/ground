CMS.initPageUnbind = function(){
	CMS.commonUnbind();
	$('button.sendNewsletter').unbind();
	$('button.addReset').unbind();
	CMS.showHideFieldsU();
	// if (CKEDITOR.instances['inputContent']) {
		// CKEDITOR.remove(CKEDITOR.instances['inputContent']);
	// }
}
CMS.initPage = function(){
	$('a.setFormValues').on('click',function(){
		itemID = $(this).closest( "td" ).attr('id');
		itemID = itemID.replace("jdata","")
		var json = $('div#jd'+itemID).html();
		var data = $.parseJSON(json);
		$('input#id_newsletter').val(data.id_newsletter);
		$('#newsletterTitle').html(data.title);
		$('#inputTitle').val(data.title);
		if(data.content){
			$.get('includes/newsletters/'+data.content, function(response) {
				$('#newsletterContent').html(response);
				CKEDITOR.instances.inputContent.setData(response);
			}, 'text');
		}
		else{
			var errorList = new Array();
			errorList[0] = 'Newsletter content was not found at the newsletters folder.';
			errorList[1] = $('#skinPath').html()+'includes/newsletters/'+data.content;
			CMS.showNotification('error', errorList);
		}
		if(!$('button#dtAddRow').is(":visible")){
			$('button#dtAddRow').removeClass('hid');
		}
		if(!$(this).hasClass('editItem')){
			$('div#formActions').addClass('hid');
		}
		CMS.showWidge();
	});
	// CKEDITOR.replace( 'inputContent', {
		// uiColor: '#62a8d1',
		// width: "890px",
        // height: "400px"
	// });
	setTimeout(function(){
		$('td#cke_top_inputContent a').each(function(){ //the id of td here depends on the instance of the CKEditor --> cke_top_{instanceName}
			$(this).addClass('ignore');
		});	
	},1000);
	var details = new Array();
	details[0] = "genericForm"; //active form id
	details[1] = thisURL+thisModule+"/process/add-newsletter/"; //post url for add
	details[2] = 'Newsletter was successfully created.'; //success message for add
	details[3] = thisURL+thisModule+"/process/edit-newsletter/"; //post url for edit
	details[4] = 'Newsletter was successfully updated.'; //success message for edit
	details[5] = thisURL+thisModule+"/process/delete-newsletter/"; //post url for delete
	details[6] = 'Newsletter was successfully deleted.'; //success message for delete
	details[7] = 'id_newsletter'; //name of id for delete
	details[8] = 'DT_Generic'; //active dataTable id
	CMS.common(details); 
	CMS.showHideFields();
	$('button.addReset').on('click',function(){//additional functions for form reset
		CKEDITOR.instances.inputContent.setData('');
	});
}
function sendNewsletter() {
    var keyAndVal = "data%5Bid_newsletter%5D=" + itemID;
    $.post(thisURL + thisModule + "/process/send-newsletter", keyAndVal, function(data) {
        setTimeout(function() {
            $('img#sgLoader').addClass('hid');
            $('#globalModal .hideWhile').each(function() {
                $(this).show();
            });
            $('#globalModal').fadeOut(1000);
            $('#globalModal').modal('hide');
        }, 1000);
        setTimeout(function() {
            if (data != 'false') {
                var dataJ = $.parseJSON(data);
                if (dataJ.error != null) CMS.showNotification('error', dataJ.error);
                else {
                    CMS.showNotification('success', 'Newsletter is successfully sent to subscribers');
                }
            } else {
                CMS.showNotification('error', 'Network Problem. Please try again.');
            }
        }, 1200);
    });
}
function sendNL() {
	enableModule = true;
	sendNewsletter();
}
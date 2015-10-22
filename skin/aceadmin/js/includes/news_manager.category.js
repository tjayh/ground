CMS.initPageUnbind = function(){
	CMS.commonUnbind();
	$('button.addReset').unbind();
}
CMS.initPage = function(){
	$('a.setFormValues').on('click',function(){
		itemID = $(this).closest( "td" ).attr('id');
		itemID = itemID.replace("jdata","")
		var json = $('div#jd'+itemID).html();
		var data = $.parseJSON(json);
		$('[name="data[whr_id_news_category]"]').val(data.id_news_category);
		$('#id_news_category').val(data.id_parent);
		$('input#category_title').val(data.category_title);
		$('textarea#category_desc').val(data.category_desc);
		if(data.status == 1)
			$('input#status').prop('checked', true);
		else
			$('input#status').prop('checked', false);
		if(!$('button#dtAddRow').is(":visible")){
			$('button#dtAddRow').removeClass('hid');
		}
		if(!$(this).hasClass('editItem')){
			$("#id_news_category").prop('disabled', true);
			$('div#formActions').addClass('hid');
		}else{
			$("#id_news_category").prop('disabled', false);
		}
		$("#id_news_category").trigger("liszt:updated");
		CMS.showWidge();
	});
	$('#btnEditForm').click(function(){
		$("#id_news_category").prop('disabled', false);
		$("#id_news_category").trigger("liszt:updated");
	});
	var details = new Array();
	details[0] = "genericForm"; //active form id
	details[1] = thisURL+thisModule+"/process/add-category/"; //post url for add
	details[2] = 'News category was successfully created.'; //success message for add
	details[3] = thisURL+thisModule+"/process/edit-category/"; //post url for edit
	details[4] = 'News category was successfully updated.'; //success message for edit
	details[5] = thisURL+thisModule+"/process/delete-category/"; //post url for delete
	details[6] = 'News category was successfully deleted.'; //success message for delete
	details[7] = 'id_news_category'; //name of id for delete
	details[8] = 'DT_Generic'; //active dataTable id
	CMS.common(details); //include the active data table (for delete function)
	
	$("#id_news_category").chosen({allow_single_deselect: true});
	$("#id_news_category_chzn").css('width','300px');
	$('button.addReset').on('click',function(){
		var flag = true;
		$('select#id_news_category option').each(function(){
			if(flag){
				$("#id_news_category").val(0);
				$("#id_news_category").trigger("liszt:updated");
				flag=false;
			}
		});	
	});
};
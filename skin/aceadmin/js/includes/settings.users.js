CMS.initPageUnbind = function () {
    CMS.commonUnbind();
    $('button.addReset').unbind();
    $('a#changePass').unbind();
}
CMS.initPage = function(){
	$('a.setFormValues').on('click', function () {
		$('input#password').attr('disabled', 'disabled');
		if (!$('button#dtAddRow').is(":visible")) {
			$('button#dtAddRow').removeClass('hid');
		}
		if (!$('a#changePass').is(":visible")) {
			$('a#changePass').removeClass('hid');
		}
		itemID = $(this).closest("td").attr('id');
		itemID = itemID.replace("jdata", "")
		var json = $('div#jd' + itemID).html();
		var data = $.parseJSON(json);
		$('div#widgetItemActions button.showGlobal').attr('data-modID', "jdata" + data.id_admin);
		$('input#id_admin').val(data.id_admin);
		$('input#firstname').val(data.firstname);
		$('input#lastname').val(data.lastname);
		$('input#username').val(data.username);
		console.log(data.id_admin_group);
		$('select#id_admin_group').val(data.id_admin_group);
		if(data.isActive == 1)
			$('input#isActive').prop('checked', true);
		else
			$('input#isActive').prop('checked', false);	
		
		$('input#date_add').val(data.date_add);
		$('input#date_upd').val(data.date_upd);
		if (!$(this).hasClass('editItem')) {
			$('div#formActions').addClass('hid');
		}
		CMS.showWidge();
	});
	var details = new Array();
	details[0] = "genericForm"; //active form id
	details[1] = thisURL + thisModule + "/process/add-user/"; //post url for add
	details[2] = 'User was successfully created.'; //success message for add
	details[3] = thisURL + thisModule + "/process/edit-user/"; //post url for edit
	details[4] = 'User was successfully updated.'; //success message for edit
	details[5] = thisURL + thisModule + "/process/delete-user/"; //post url for delete
	details[6] = 'User was successfully deleted.'; //success message for delete
	details[7] = 'id_admin'; //name of id for delete
	details[8] = 'DT_Generic'; //active dataTable id
	CMS.common(details); //include the active data table (for delete function)
	
	$("#id_admin_group").chosen();
	$("#id_admin_group_chosen").removeAttr('style');
	$('.chosen-single').addClass('ignore');
	
	$('a#changePass').on('click', function () { //additional functions for form reset
		$('input#password').removeAttr('disabled');
		$(this).hide();
	});
	$('button.addReset').on('click', function () { //additional functions for form reset
		$('a#changePass').addClass('hid');
		$('input#password').removeAttr('disabled');
	});
}
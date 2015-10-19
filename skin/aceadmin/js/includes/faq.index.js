CMS.initPageUnbind = function() {
	CMS.commonUnbind();
	$('button.addReset').unbind();
}
CMS.initPage = function() {
	$('a.setFormValues').on('click', function() {
		itemID = $(this).closest("td").attr('id');
		itemID = itemID.replace("jdata", "")
		var json = $('div#jd' + itemID).html();
		var data = $.parseJSON(json);
		$('input#id_faq_item').val(data.id_faq_item);
		$('textarea#faq_question').val(data.faq_question);
		$('textarea#faq_answer').val(data.faq_answer);
		$('select#id_faq_category option').each(function() {
			if ($(this).val() == data.id_faq_category) {
				$("#id_faq_category").val(data.id_faq_category);
			}
		});
		if (data.status == 1) $('input#isActive').prop('checked', true);
		else $('input#isActive').prop('checked', false);
		if (!$('button#dtAddRow').is(":visible")) {
			$('button#dtAddRow').removeClass('hid');
		}
		if (!$(this).hasClass('editItem')) {
			$('div#formActions').addClass('hid');
		}
		CMS.showWidge();
	});
	var details = new Array();
	details[0] = "genericForm"; //active form id
	details[1] = thisURL + thisModule + "/process/add-faq-item/"; //post url for add
	details[2] = 'FAQ item was successfully created.'; //success message for add
	details[3] = thisURL + thisModule + "/process/edit-faq-item/"; //post url for edit
	details[4] = 'FAQ item was successfully updated.'; //success message for edit
	details[5] = thisURL + thisModule + "/process/delete-faq-item/"; //post url for delete
	details[6] = 'FAQ item was successfully deleted.'; //success message for delete
	details[7] = 'id_faq_item'; //name of id for delete
	details[8] = 'DT_Generic'; //active dataTable id
	CMS.common(details); //include the active data table (for delete function)
	$('button.addReset').on('click', function() {});
}

function changeStatus() {
	if (enableModule) enableModule = 1;
	else enableModule = 0;
	var keyAndVal = "data%5Bwhr_id_faq_item%5D=" + itemID + "&data%5Bclmn_status%5D=" + enableModule;
	$.post(thisURL + thisModule + "/process/change-status", keyAndVal, function(data) {
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
				var text = $('div#jd' + itemID).text();
				if (dataJ.error != null) CMS.showNotification('error', dataJ.error);
				else {
					var $dataA = $('a#stat' + itemID);
					if (enableModule == 1) {
						CMS.showNotification('success', 'FAQ is successfully Enabled');
						$('a#stat' + itemID).html('<span class="label label-success"> Active </span>');
						$('a#stat' + itemID).attr('title', 'Disable item status');
						$dataA.data('data-getDetails', 'disableFxn');
						$dataA.attr('data-getDetails', 'disableFxn');
						text = text.replace('"status":"0"', '"status":"1"');
						$('div#jd' + itemID).text(text);
					} else {
						CMS.showNotification('success', 'FAQ is successfully Disabled');
						$('a#stat' + itemID).html('<span class="label label-danger">InActive</span>');
						$('a#stat' + itemID).attr('title', 'Enable item status');
						$dataA.data('data-getDetails', 'enableFxn');
						$dataA.attr('data-getDetails', 'enableFxn');
						text = text.replace('"status":"1"', '"status":"0"');
						$('div#jd' + itemID).text(text);
					}
				}
			} else {
				CMS.showNotification('error', 'Network Problem. Please try again.');
			}
		}, 1200);
	});
}

function disableMod() {
	enableModule = false;
	changeStatus();
}

function enableMod() {
	enableModule = true;
	changeStatus();
}
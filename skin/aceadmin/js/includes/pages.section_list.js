CMS.removeUploadFile = function() { //this function is called when admin chooses to cancel image upload for the user
	$('input#fileFolderName').val('');
	$('div#fileUploadDiv').html('<div class="btn btn-info btn-sm" ><i class="fa fa-cloud-upload"></i> Upload Module</div>');
	$('span#fileNameHolder').text('');
	$('span#removeFile').addClass('hid');
	$('#globalModal').modal('hide');
}
CMS.initPageUnbind = function() {
	CMS.commonUnbind();
	CMS.commonUnbind();
	uploadFile.destroy();
	delete CMS.removeUploadFile;
	$('button.addReset').unbind();
	
}
CMS.initPage = function() {
	var textedit = ['image_desc']; /* place the fields that needs to have text editor */
	
		$('.showWidge').on('click', function() {
		CMS.removeUploadFile();
	});
	$('a.setFormValues').on('click', function() {
		itemID = $(this).closest("td").attr('id');
		itemID = itemID.replace("jdata", "")
		var json = $('div#jd' + itemID).text();
		var data = $.parseJSON(json);
		$('[name="where[id_page_section]"]').val(data.id_page_section);
		$('#title').val(data.title);
		$('#limit').val(data.limit);
		$('#fileNameHolder').html(data.file_name);
		$('#date').val(data.date);
		$('#image_src').val(data.image_src);
		if (data.status == 1) $('input#status').prop('checked', true);
		else $('input#status').prop('checked', false);
		if (!$(this).hasClass('editItem')) {
			$('div#formActions').addClass('hid');
			$('.content_display').destroy();
			$.each(textedit, function(index, value) {
				$('#' + value).summernote();
			});
			$('div.note-editable').attr('contenteditable', 'false');
		} else {
			$('.content_display').destroy();
			$.each(textedit, function(index, value) {
				$('#' + value).summernote({
					onblur: function(e) {
						$("#" + value).val($('#' + value).code());
					},
					onImageUpload: function(files, editor, $editable) {
						sendFile(files[0], editor, $editable);
					}
				});
			});
			$('div.note-editable').attr('contenteditable', 'true');
		}
		$('#image_src').imgupload('refresh');
		$('#image_meta_title').val(data.image_meta_title);
		$('#image_meta_description').val(data.image_meta_description);
		$('#image_meta_keywords').val(data.image_meta_keywords);
		CMS.showWidge();
	});
	$('#image_desc').summernote({
		onblur: function(e) {
			$("#image_desc").val($('#image_desc').code());
		},
		onImageUpload: function(files, editor, $editable) {
			sendFile(files[0], editor, $editable);
		}
	});
	$('button#dtAddRow').on('click', function() {
		$('.content_display').val('');
		$('.content_display').code('');
		$('.content_display').destroy();
		$.each(textedit, function(index, value) {
			$('#' + value).summernote({
				onblur: function(e) {
					$("#" + value).val($('#' + value).code());
				},
				onImageUpload: function(files, editor, $editable) {
					sendFile(files[0], editor, $editable);
				}
			});
		});
		$('div.note-editable').attr('contenteditable', 'true');
	});
	$('#btnEditForm').click(function() {
		$('.content_display').destroy();
		$.each(textedit, function(index, value) {
			$('#' + value).summernote({
				onblur: function(e) {
					$("#" + value).val($('#' + value).code());
				},
				onImageUpload: function(files, editor, $editable) {
					sendFile(files[0], editor, $editable);
				}
			});
		});
		$('div.note-editable').attr('contenteditable', 'true');
	});
	$('#submit').on('click', function() {
		$.each(textedit, function(index, value) { /* event if submit button is clicked */
			$('#' + value).val($('#' + value).code());
		});
	});
	var details = new Array();
	details[0] = "genericForm"; //active form id
	details[1] = thisURL + thisModule + "/process/add-section-file/"; //post url for add
	details[2] = 'Section item was successfully created.'; //success message for add
	details[3] = thisURL + thisModule + "/process/edit-item/"; //post url for edit
	details[4] = 'Section item was successfully updated.'; //success message for edit
	details[5] = thisURL + thisModule + "/process/delete-item/"; //post url for delete
	details[6] = 'Section item was successfully deleted.'; //success message for delete
	details[7] = 'id_page_section'; //name of id for delete
	details[8] = 'DT_Generic'; //active dataTable id
	CMS.common(details); //include the active data table (for delete function)
	uploadFile = new AjaxUpload('#fileUploadDiv', {
		action: thisURL + thisModule + '/tempUpload/file',
		name: 'userfile',
		params: ['jpg', 'gif', 'png'],
		onSubmit: function(file, ext) {
			if (!(ext && /^(html)$/.test(ext))) {
				CMS.showNotification('error', 'Invalid file extension');
				return false;
			}
			$('div#fileUploadDiv').html('<img src="img/loading_whitebg.gif" style = "margin-top:9px !Important;"/>');
		},
		onComplete: function(file, response) {
			var obj = JSON.parse(response);
			if (obj.error) {
				CMS.showNotification('error', obj.error);
				CMS.removeUploadFile();
			} else {
				$('input#fileFolderName').val(obj.file_name);
				$('div#fileUploadDiv').html('<div class="btn btn-info btn-sm" ><i class="fa fa-cloud-upload"></i> Change File</div>');
				$('span#fileNameHolder').text(file);
				$('span#removeFile').removeClass('hid');
			}
		}
	});
	$('#date').datepicker({
		format: "MM dd, yyyy",
		autoclose: true
	})
	$('input.imgupload').each(function() {
		$(this).imgupload();
	});
	$('button.addReset').on('click', function() {
		var flag = true;
		$('#image_src').val('');
		$('#image_src').imgupload('refresh');
	});
}

function changeStatus() {
	if (enableModule) enableModule = 1;
	else enableModule = 0;
	var keyAndVal = "data%5Bwhr_id_page_section%5D=" + itemID + "&data%5Bclmn_status%5D=" + enableModule;
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
						CMS.showNotification('success', 'News is successfully Enabled');
						$('a#stat' + itemID).html('<span class="label label-success"> Active </span>');
						$('a#stat' + itemID).attr('title', 'Disable item status');
						$dataA.data('data-getDetails', 'disableFxn');
						$dataA.attr('data-getDetails', 'disableFxn');
						text = text.replace('"status":"0"', '"status":"1"');
						$('div#jd' + itemID).text(text);
					} else {
						CMS.showNotification('success', 'News is successfully Disabled');
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
$('#section_file').ace_file_input({
	no_file:'No File ...',
	btn_choose:'Choose',
	btn_change:'Change',
	droppable:false,
	onchange:null,
	// thumbnail:false //| true | large
	whitelist:'html',
	blacklist:'gif|png|jpg|jpeg|exe|php'
	//onchange:''
	//
});
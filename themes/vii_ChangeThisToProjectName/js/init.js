var base_url = $('span#base_url').html();
$(".subscribe-form").submit(function(event) {
	var id_form = $(this).attr("id"); /* id should be unique */
	if (!$('#' + id_form).validationEngine('validate')) {
		$('#' + id_form + " #subscribeLoading").attr("style", "display:none");
		$('#' + id_form + " #subscribeSubmit").show();
		CMS.showNotification("error", "Please fill out the required fields.", "subscribeNotif", id_form);
		return false;
	}
	$('#' + id_form + " #subscribeSubmit").hide();
	$('#' + id_form + " #subscribeLoading").removeAttr("style");
	event.preventDefault();
	$.post(base_url + "newsletter/process/add-new", $('#' + id_form).serialize(), function(data) {
		if (data != 'false') {
			$('#' + id_form)[0].reset();
			$('#' + id_form + " #subscribeLoading").attr("style", "display:none");
			$('#' + id_form + " #subscribeSubmit").show();
			CMS.showNotification("success", "Thank you for contacting us!", "subscribeNotif", id_form);
		} else {
			$('#' + id_form + " #subscribeLoading").attr("style", "display:none");
			$('#' + id_form + " #subscribeSubmit").show();
			CMS.showNotification("error", "Email address is already subscribe.", "subscribeNotif", id_form);
		}
	});
});
var CMS = {};
CMS.showNotification = function(type, message, id, form) {
	var html = '';
	if(form){
		id = "#"+form+" div#"+id;
	}
	else{
		id = "div#"+id;
	}
	$(id).removeClass();
	$(id).addClass('alert');
	html += '<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>';
	if (type == 'success') {
		html += '<div class="alert alert-success" >';
		html += '<strong><i class="icon-ok"></i>&nbsp;&nbsp;Success! </strong>';
	} else if (type == 'error') {
		html += '<div class="alert alert-danger" >';
		html += '<strong><i class="icon-remove"></i>&nbsp;&nbsp;Failed! </strong>';
	} else if (type == 'warning') {
		$(id).addClass('alert-warning');
		html += '<strong><i class="icon-warning-sign"></i>&nbsp;&nbsp;Warning! </strong>';
	} else {
		$(id).addClass('alert-info');
		html += '<strong><i class="icon-info"></i>&nbsp;&nbsp;Note! </strong>';
	}
	html += "&nbsp;&nbsp;";
	if (message instanceof Array) {
		message.forEach(function(entry) {
			html += "<br/><i class='icon-hand-right'></i>&nbsp;&nbsp;";
			html += entry;
		});
	} else {
		html += "<br/><i class='icon-hand-right'></i>&nbsp;&nbsp;";
		html += message;
	}
	html += "</div>";
	$(id).html(html);
	$(id).fadeIn(900);
	setTimeout(function() {}, 8000);
}

$('.amountOnly').on("change blur", function(e){
	var val = $(this).val();
	var uncommafied = val.replace(/\,/g, '')*1;
	var rgx = /(\d+)(\d{3})/;
	var split_text = uncommafied.toString().split('.');
	var x1 = split_text[0].toString();
	var x2 = split_text.length > 1 ? '.' + (split_text[1].toString() + '00').substring(0,2) : '.00';
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	$(this).val(x1 + x2);
	$(this).data('oldVal', val);
});

$('.numbersOnly').keyup(function () {
	if (this.value != this.value.replace(/[^0-9\.]/g, '')) {
	   this.value = this.value.replace(/[^0-9\.]/g, '');
	}
});

$('.textOnly').keyup(function () {
	if (this.value != this.value.replace(/[^a-z\s\.]/g, '')) {
	   this.value = this.value.replace(/[^a-z\s\.]/g, '');
	}
});
$(window).load(function(){
	$("#pageLoader").fadeOut("fast");
});
$(".contactus-section-form").submit(function(event) {
	var id_form = $(this).attr("id");
	if (!$('#' + id_form).validationEngine('validate')) {
		$('#' + id_form + " #contactusSectionLoading").attr("style", "display:none");
		$('#' + id_form + " #contactusSectionBtns").show();
		CMS.showNotification("error", "Please fill out the required fields.", "contactusSectionNotif");
		return false;
	}
	$('#' + id_form + " #contactusSectionBtns").hide();
	$('#' + id_form + " #contactusSectionLoading").removeAttr("style");
	event.preventDefault();
	$.post(base_url + "contactus/process/add-contact", $('#' + id_form).serialize(), function(data) {
		if (data != 'false') {
			$('#' + id_form)[0].reset();
			$('#' + id_form + " #contactusSectionLoading").attr("style", "display:none");
			$('#' + id_form + " #contactusSectionBtns").show();
			CMS.showNotification("success", "Thank you for contacting us!", "contactusSectionNotif");
			return false;
		} else {
			$('#' + id_form + " #contactusSectionLoading").attr("style", "display:none");
			$('#' + id_form + " #contactusSectionBtns").show();
			CMS.showNotification("error", "Network system error. Please try again.", "contactusSectionNotif");
			return false;
		}
	});
});
$(".newsletter-section-form").submit(function(event) {
	var id_form = $(this).attr("id");
	if (!$('#' + id_form).validationEngine('validate')) {
		$('#' + id_form + " #newsletterSectionLoading").attr("style", "display:none");
		$('#' + id_form + " #newsletterSectionSubmit").show();
		CMS.showNotification("error", "Please fill out the required fields.", "subscribeSectionNotif");
		return false;
	}
	$('#' + id_form + " #newsletterSectionSubmit").hide();
	$('#' + id_form + " #newsletterSectionLoading").removeAttr("style");
	event.preventDefault();
	$.post(base_url + "newsletter/process/add-new", $('#' + id_form).serialize(), function(data) {
		if (data != 'false') {
			$('#' + id_form)[0].reset();
			$('#' + id_form + " #newsletterSectionLoading").attr("style", "display:none");
			$('#' + id_form + " #newsletterSectionSubmit").show();
			CMS.showNotification("success", "Thank you for contacting us!", "subscribeSectionNotif");
		} else {
			$('#' + id_form + " #newsletterSectionLoading").attr("style", "display:none");
			$('#' + id_form + " #newsletterSectionSubmit").show();
			CMS.showNotification("error", "Email address is already subscribe.", "subscribeSectionNotif");
		}
	});
});

function styleSwticher() {
	$.post(base_url + "administrator/settings/process/upd-style", function(data) {
		$("#styleSwitcherNotif").removeAttr("style");
		setTimeout(function() {$("#styleSwitcherNotif").fadeOut('slow');}, 8000);
	});
}

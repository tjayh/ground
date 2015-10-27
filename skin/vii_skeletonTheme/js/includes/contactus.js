function validateCaptcha(base_url) {
	challengeField = $("input#recaptcha_challenge_field").val();
	responseField = $("input#recaptcha_response_field").val();
	var stat = $.ajax({
		type: "POST",
		url: base_url + "contactus/verify_captcha",
		data: "recaptcha_challenge_field=" + challengeField + "&recaptcha_response_field=" + responseField,
		async: false
	}).responseText;
	if (stat === "false") {
		$("#captchaStatus").html(stat).parent().show();
		Recaptcha.reload();
		return false;
	} else {
		$("#status").val('true');
		return true;
	}
}

function checkCaptcha() {
	if (!validateCaptcha(base_url)) {
		$('#alert_recaptcha').show().text('Invalid recaptcha code.');
		$('#recaptcha_response_field').val('');
		return false;
	} else {
		$('#alert_recaptcha').hide().text('');
	}
}
$("#contactusForm").submit(function(event) {
	if(!$('#contactusForm').validationEngine('validate')){
		$("#contactLoading").attr("style", "display:none");
			$("#contactusFormBtns").show();
			CMS.showNotification("error", "Please fill out the required fields.", "contactNotif");
			return false;
	}
	$("#contactusFormBtns").hide();
	$("#contactLoading").removeAttr("style");
	var id_form = $(this).attr("id");
	event.preventDefault();
	// if (checkRecaptcha()) {}
	$.post(base_url + "contactus/process/add-contact", $("#" + id_form).serialize(), function(data) {
		if (data) {
			$('#contactusForm')[0].reset();
			$("#contactLoading").attr("style", "display:none");
			$("#contactusFormBtns").show();
			CMS.showNotification("success", "Thank you for contacting us!", "contactNotif");
		} else {
			$("#contactLoading").attr("style", "display:none");
			$("#contactusFormBtns").show();
			CMS.showNotification("error", "Network system error. Please try again.", "contactNotif");
		}
	});
});
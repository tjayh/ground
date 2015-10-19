$("#testiForm").submit(function(event) {
	if(!$('#testiForm').validationEngine('validate')){
		$("#testiLoading").attr("style", "display:none");
			$("#testiFormBtns").show();
			setTimeout(function() {
				$('#error').hide();
			}, 10000);
			CMS.showNotification("error", "Please fill out the required fields.", "testiNotif");
			return false;
	}
	$("#testiFormBtns").hide();
	$("#testiLoading").removeAttr("style");
	var id_form = $(this).attr("id");
	event.preventDefault();
	$.post(base_url + "testimonial/process/add-testi", $("#" + id_form).serialize(), function(data) {
		if (data) {
			$('#testiForm')[0].reset();
			$("#testiLoading").attr("style", "display:none");
			$("#testiFormBtns").show();
			CMS.showNotification("success", "Thank you for giving your testimonial for us!", "testiNotif");
		} else {
			$("#testiLoading").attr("style", "display:none");
			$("#testiFormBtns").show();
			CMS.showNotification("error", "Network system error. Please try again.", "testiNotif");
		}
	});
});
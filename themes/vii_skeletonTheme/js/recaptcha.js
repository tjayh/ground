function show_recaptcha() {
    Recaptcha.create("6LfG3fYSAAAAAHbMtUX7MAYZWmNKdzfQq8Uc-Jr8", "recaptcha_div", {
        theme: "clean",
        callback: Recaptcha.focus_response_field
    });
}

function validateCaptcha(base_url) {
    challengeField = $("input#recaptcha_challenge_field").val();
    responseField = $("input#recaptcha_response_field").val();
    var stat = $.ajax({
        type: "POST",
        url: base_url + "contactus/verify_captcha",
        data: "recaptcha_challenge_field=" + challengeField + "&recaptcha_response_field=" + responseField,
        async: false
    }).responseText;
    var pattern = /success/i;
    if (pattern.test(stat)) {
        $("#status").val('true');
        return true;
    } else {
        $("#captchaStatus").html(stat).parent().show();
        Recaptcha.reload();
        return false;
    }
}
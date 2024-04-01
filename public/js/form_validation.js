$(function(){
    $('input[name="full_name"]').keypress(function (e) {
        var keyCode = e.keyCode || e.which;

        $("#input_error_full_name").html("");

        //Regex for Valid Characters i.e. Alphabets and Numbers.
        var regex = /^[A-Za-z. ]+$/;

        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            $("#input_error").html("Only Alphabets are allowed.");
        }

        return isValid;
    });

    $('input[name="officer_cotact"]').keypress(function (e) {
        var keyCode = e.keyCode || e.which;

        $("#input_error_officer_contact").html("");
        
        //Regex for Valid Characters i.e. Alphabets and Numbers.
        var regex = /^[0-9]+$/;

        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            $("#input_error_officer_contact").html("Only numbers are allowed.");
        }

        return isValid;
    });
    $('input[name="officer_designation"]').keypress(function (e) {
        var keyCode = e.keyCode || e.which;

        $("#input_error_officer_designation").html("");

        //Regex for Valid Characters i.e. Alphabets and Numbers.
        var regex = /^[A-Za-z. ]+$/;

        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            $("#input_error_officer_designation").html("Only Alphabets are allowed.");
        }

        return isValid;
    });

    $('input[name="relief_camp_name"]').keypress(function (e) {
        var keyCode = e.keyCode || e.which;

        $("#input_error_relief_camp_name").html("");

        //Regex for Valid Characters i.e. Alphabets and Numbers.
        var regex = /^[A-Za-z0-9. ]+$/;

        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            $("#input_error_relief_camp_name").html("Special Characters are not allowed.");
        }

        return isValid;
    });
    $('input[name="location"]').keypress(function (e) {
        var keyCode = e.keyCode || e.which;

        $("#input_error_location").html("");

        //Regex for Valid Characters i.e. Alphabets and Numbers.
        var regex = /^[A-Za-z0-9., ]+$/;

        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            $("#input_error_location").html("Special Characters are not allowed.");
        }

        return isValid;
    });
    $('input[name="camp_code"]').keypress(function (e) {
        var keyCode = e.keyCode || e.which;

        $("#input_error_camp_code").html("");

        //Regex for Valid Characters i.e. Alphabets and Numbers.
        var regex = /^[0-9]+$/;

        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            $("#input_error_camp_code").html("Only numbers are accepted.");
        }

        return isValid;
    });
    
    camp_code
});
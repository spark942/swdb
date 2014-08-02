(function () {
	$("#su-email").keyup(function (e) { //user types username on inputfiled
		var email = $(this).val(); //get the string typed by user
		$.post('../../check_email', {'email':email}, function(data) { //make ajax call to check_username.php
			$("#su-email-result").html(data); //dump the data received from PHP page
		});
	});
	$("#su-username").keyup(function (e) { //user types username on inputfiled
		var username = $(this).val(); //get the string typed by user
		$.post('../../check_username', {'username':username}, function(data) { //make ajax call to check_username.php
			$("#su-username-result").html(data); //dump the data received from PHP page
		});
	});
	$("#su-password2").keyup(function (e) { //user types username on inputfiled
		var pw1 = $("#su-password").val();
		var pw2 = $(this).val(); //get the string typed by user
		if (pw1 == pw2){
			$("#su-match-password").html("<i class=\"fa fa-check\" style=\"color:#1abc9c;\"></i> OK");
		}
		else{
			$("#su-match-password").html("<i class=\"fa fa-times\" style=\"color:#e74c3c;\"></i> Don't match");
		}
	});
})();
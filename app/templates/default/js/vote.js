function vote_rune(param) {
	$.post('../../vote/rune', {'param':param}, function(data) { //make ajax call to check_username.php
		$(param+' span.amount').html(data); //dump the data received from PHP page
	});
};
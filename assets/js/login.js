$(document).ready(function(){
	
	// Listen to reset password button
	$('#resetPasswordButton').on('click', function(){
		resetPassword();
	});
	
	// Listen to login button
	$('#login').on('click', function(){
		login();
	});
});

// Function to reset password
function resetPassword(){
	var resetPasswordUsername = $('#resetPasswordUsername').val();
	var resetPasswordPassword1 = $('#resetPasswordPassword1').val();
	var resetPasswordPassword2 = $('#resetPasswordPassword2').val();
	
	$.ajax({
		url: 'model/login/resetPassword.php',
		method: 'POST',
		data: {
			resetPasswordUsername:resetPasswordUsername,
			resetPasswordPassword1:resetPasswordPassword1,
			resetPasswordPassword2:resetPasswordPassword2,
		},
		success: function(data){
			$('#resetPasswordMessage').html(data);
		}
	});
}


// Function to login a user
function login(){
	var loginUsername = $('#loginUsername').val();
	var loginPassword = $('#loginPassword').val();
	
	$.ajax({
		url: 'model/login/checkLogin.php',
		method: 'POST',
		data: {
			loginUsername:loginUsername,
			loginPassword:loginPassword,
		},
		success: function(data){
			$('#loginMessage').html(data);
			
			if(data.indexOf('Redirecting') >= 0){
				window.location = 'index.php';
			}
		}
	});
}
// Custom JavaScript code for register page

$("form").submit(function(event) {
	event.preventDefault();
	var username = $("#username").val();
	var mobile = $("#mobile").val();
	var dob = $("#dob").val();
	var email = $("#email").val();
	var password = $("#password").val();
	var confirm_password = $("#confirm-password").val();
	console.log("Username: " + username + ", Mobile: " + mobile + ", DOB: " + dob + ", Email: " + email + ", Password: " + password + ", Confirm Password: " + confirm_password);
	
	// Add your register logic here
	
	// Redirect to login
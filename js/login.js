// Custom JavaScript code for login page

$("form").submit(function(event) {
	event.preventDefault();
	var email = $("#email").val();
	var password = $("#password").val();
	console.log("Email: " + email + ", Password: " + password);
	
	// Add your login logic here
	
	// Redirect to home page
	window.location.href = "index.html";
});

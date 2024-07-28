$(document).ready(function() {
  $('#signin-form').submit(function(event) {
    event.preventDefault();

    // Get form data
    var username = $('#username').val();
    var password = $('#password').val();

    $.ajax({
      url: 'SignIn4.php',
      type: 'POST',
      data: {
        username: username,
        password: password
      },
      success: function(response) {
        if (response.trim() === 'success') {
          $('#message').html('<div class="alert alert-success">Sign In successful.</div>');

          setTimeout(function() {
            window.location.href = 'userEventExploration.html';
          }, 2000);
        } else {
          $('#message').html('<div class="alert alert-danger">Invalid Username or Password.</div>');
        }
      }
    });
  });
});

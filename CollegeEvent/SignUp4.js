$(document).ready(function() {
  $('#signup-form').submit(function(event) {
    event.preventDefault();

    var name = $('#name').val();
    var mobile = $('#mobile').val();
    var email = $('#email').val();
    var username = $('#username').val();
    var password = $('#password').val();

    $.ajax({
      url: 'SignUp4.php',
      type: 'POST',
      data: {
        name: name,
        mobile: mobile,
        email: email,
        username: username,
        password: password
      },
      success: function(response) {
        $('#signup-form').hide();
        $('#message-container').html('<div class="success-message">' + response + '</div>');
        setTimeout(function() {
          window.location.href = 'index.html';
        }, 2000);
      },
      error: function(xhr, status, error) {
        var errorMessage = xhr.status + ': ' + xhr.statusText;
        $('#message-container').html('<div class="error-message">Error: ' + errorMessage + '</div>');
      }
    });
  });
});

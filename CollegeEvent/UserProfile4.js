$(document).ready(function() {
  //$('#fetch-data').click(function() {
    $.ajax({
      url: 'UserProfile4.php',
      type: 'POST',
      success: function(response) {
        $('#user-data').html(response);
      }
    });
  });

  $('#sign-out').click(function() {
    $.ajax({
      url: 'SignOut4.php',
      type: 'POST',
      success: function(response) {
        $('#sign-out-message').html(response);
        setTimeout(function() {
          window.location.href = 'SignIn4.html';
        }, 2000);
      }
    });
  });
//});

$(document).ready(function() {
    $('#event-register-form').submit(function(event) {
      event.preventDefault(); 
  
      var eventID = $('#event-id').val();
      var userName = $('#user-name').val();
      var userEmailId = $('#Email-id').val();
      var userPhoneNo = $('#user-phone').val();
      var userBranch = $('#user-branch').val();
      var userYear = $('#user-year').val();
      var userDivision = $('#user-division').val();
      var userQuery = $('#user-query').val();
  
      $.ajax({
        url: 'EventRegistration.php',
        type: 'POST',
        data: {

          eventID : eventID,
          userName : userName,
          userEmailId : userEmailId,
          userPhoneNo : userPhoneNo,
          userBranch : userBranch,
          userYear : userYear,
          userDivision : userDivision,
          userQuery : userQuery,
  
        },
        success: function(response) {
        
          $('#message').html('<div class="alert alert-success">Event Register successful.</div>');
          
          $('#event-register-form')[0].reset();
        }
      });
    });
  });
  
 
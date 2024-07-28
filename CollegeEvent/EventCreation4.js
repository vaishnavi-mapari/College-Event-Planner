$(document).ready(function() {
  $('#event-create-form').submit(function(event) {
    event.preventDefault(); 

    var eventID = $('#event-id').val();
    var eventName = $('#event-name').val();
    var eventOrganizer = $('#event-organizer').val();
    var eventCategory = $('#event-category').val();
    var eventDate = $('#event-date').val();
    var eventTime = $('#event-time').val();
    var eventLocation = $('#event-location').val();
    var eventDescription = $('#event-description').val();

    $.ajax({
      url: 'EventCreate4.php',
      type: 'POST',
      data: {
        eventID : eventID,
        eventName: eventName,
        eventOrganizer: eventOrganizer,
        eventCategory: eventCategory,
        eventDate: eventDate,
        eventTime: eventTime,
        eventLocation: eventLocation,
        eventDescription: eventDescription
      },
      success: function(response) {
      
        $('#message').html('<div class="alert alert-success">Event Creation successful.</div>');
        
        $('#event-create-form')[0].reset();
      }
    });
  });
});

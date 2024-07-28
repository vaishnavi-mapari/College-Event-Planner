$(document).ready(function() {
  $('#explore-button').click(function() {
    var eventId = $('#event-id').val();
  
  $.ajax({
    url: 'EventExplore4.php',
    type: 'GET',
    data: { id: eventId },
    dataType: 'json',
    success: function(response) {
     if (response) {
          var eventDetails = `
            <h2>${response.eventName}</h2>
            <p><strong>Organizer:</strong> ${response.eventOrganizer}</p>
            <p><strong>Category:</strong> ${response.eventCategory}</p>
            <p><strong>Date:</strong> ${response.eventDate}</p>
            <p><strong>Time:</strong> ${response.eventTime}</p>
            <p><strong>Location:</strong> ${response.eventLocation}</p>
            <p><strong>Description:</strong> ${response.eventDescription}</p>
          `;
      $('#event-details').html(eventDetails);
        } else {
          $('#event-details').html('<p>Event not found.</p>');
        }
      },
    error: function() {
      console.log('Error occurred while fetching event details.');
    }
  });
});
  

  // Save event to the database
  $('#save-event').click(function() {
    $.ajax({
      url: 'EventSave4.php',
      type: 'POST',
      data: { id: eventId },
      success: function(response) {
        $('#save-message').text('Event Save successful.');
      },
      error: function() {
        console.log('Error occurred while saving the event.');
      }
    });
  });
});

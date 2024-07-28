$(document).ready(function() {
    
  
      var eventID = $('#event-id').val();
      
      $.ajax({
        url: 'EventDiscovery4.php',
        type: 'POST',
        data: {
          eventID : eventID,
          eventName: eventName,
          eventOrganizer: eventOrganizer,
          eventCategory: eventCategory,
          eventDate: eventDate,
          eventTime: eventTime
        },
        success: function(response) {
          $('#event-results').html(response);
        }
      });
    });
  





$(document).ready(function() {
    // Function to fetch and display event details
    function displayEventDetails(eventID) {
      // Perform an AJAX request to fetch event details based on the eventID
      $.ajax({
        url: 'userEventDetails.php',
        type: 'GET',
        data: { eventID: eventID }, // Pass the eventID to the PHP file
        dataType: 'json',
        success: function(response) {
          if (response.error) {
            // Handle error response
            $('#event-details').html('<p>' + response.error + '</p>');
          } else {
            // Display the fetched event details in the #event-details div
            var eventDetailsHTML = '<h3>Event Details:</h3>';
            eventDetailsHTML += '<p>Event Name: ' + response.eventName + '</p>';
            eventDetailsHTML += '<p>Event Organizer: ' + response.eventOrganizer + '</p>';
            // Add more details as needed...
  
            $('#event-details').html(eventDetailsHTML);
          }
        },
        error: function() {
          console.log('Error occurred while fetching event details.');
        }
      });
    }
  
    // Event listener for the "Event Explore" button click
    $(document).on('click', '.btn-primary', function(event) {
      event.preventDefault();
  
      // Check if the clicked button is the "Event Explore" button
      if ($(this).text().trim() === 'Event Explore') {
        // Get the eventID from the corresponding card
        var eventID = $(this).closest('.card').find('.event-id').text(); // Remove the '#' character
  
        // Call the function to display event details based on the eventID
        displayEventDetails(eventID);
      }
    });
  });
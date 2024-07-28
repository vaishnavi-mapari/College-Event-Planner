$(document).ready(function() {
  
  $.ajax({
    url: 'EventExploration4.php',
    type: 'GET',
    dataType: 'json',
    success: function(response) {
      
      var eventListings = '';
      if (response.length > 0) {
        response.forEach(function(event) {
          eventListings += `
            <div class="card">
              <div class="card-body">
              <h6 class="card-title event-id">#${event.eventID}</h6>
                <h5 class="card-title event-name">${event.eventName}</h5>
                <h6 class="card-subtitle mb-2 text-muted event-organizer">Event Organizer: ${event.eventOrganizer}</h6>
                 <a href="EventExplore4.html" class="btn btn-primary">Event Explore</a>
              </div>
            </div>
          `;
        });
      } else {
        eventListings = 'No events available.';
      }

      $('#event-listings').html(eventListings);
      $('.event-id').css('font-size', '20px');
      $('.event-name').css('font-size', '24px');
      $('.event-organizer').css('font-weight', 'bold');
    },
    error: function() {
      console.log('Error occurred while fetching events.');
    }
  });
});

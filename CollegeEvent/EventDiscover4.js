$(document).ready(function() {
  $('#event-discover-form').submit(function(event) {
    event.preventDefault(); 

    var eventName = $('#event-name').val();
    var eventOrganizer = $('#event-organizer').val();
    var eventCategory = $('#event-category').val();
    var eventDate = $('#event-date').val();
    var eventTime = $('#event-time').val();

    $.ajax({
      url: 'EventDiscover4.php',
      type: 'POST',
      data: {
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
});

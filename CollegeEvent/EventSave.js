// Function to fetch and display saved events
function fetchSavedEvents() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "EventSave.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            // Display the saved events in the container
            var savedEventsContainer = document.getElementById("savedEventsContainer");
            savedEventsContainer.innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}

// Fetch and display saved events when the page loads
fetchSavedEvents();

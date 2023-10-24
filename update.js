const createEventsLink = document.querySelector('.nav_link_events');
const createUpdatesSubMenuLink = document.querySelector('.submenu-update');
const updateContainer = document.querySelector('.update-container');
const formCloseButton2 = document.querySelector('.form_close2');
const homeElement = document.querySelector('.home');

function openUpdateContainer() {
    updateContainer.style.display = 'block';
    homeElement.classList.add('show');
}

// Function to close the event container
function closeUpdateContainer() {
    updateContainer.style.display = 'none';
    homeElement.classList.remove('show');
}


// Event listener for clicking the "update Events" link in the main menu
createEventsLink.addEventListener('click', openUpdateContainer);

// Event listener for clicking the "Create Events" link in the sub-menu
createUpdatesSubMenuLink.addEventListener('click', openUpdateContainer);

// Event listener for clicking the form close button
formCloseButton2.addEventListener('click', closeUpdateContainer);

//update data JS CODE
document.addEventListener('DOMContentLoaded', function() {
    const eventIDInput = document.getElementById('event_id');
    const searchButton = document.getElementById('search_button');
    const eventForm = document.querySelector('form');

    searchButton.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the form submission

        const eventID = eventIDInput.value;

        // Make an AJAX request to fetch event details by Event ID
        fetch('search_event.php', {
            method: 'POST',
            body: JSON.stringify({ eventID }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Populate form fields with the retrieved data
                eventForm.querySelector('[name="event_name"]').value = data.event_name;
                eventForm.querySelector('[name="event_date"]').value = data.event_date;
                eventForm.querySelector('[name="event_location"]').value = data.event_location;
                eventForm.querySelector('[name="event_description"]').value = data.event_description;
            } else {
                alert('Event not found.');
            }
        })
        .catch(error => console.error('Error:', error));
    });

    eventForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form submission

        // Collect data from form fields
        const formData = new FormData(eventForm);

        // Make an AJAX request to update event details
        fetch('update_event.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Event details updated successfully.');
                // Clear the form or update UI as needed
                eventForm.reset();
            } else {
                alert('Error updating event details.');
            }
        })
        .catch(error => console.error('Error:', error));
    });
});

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


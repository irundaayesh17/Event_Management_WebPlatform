let submenu = document.getElementById("submenu")
        function toggleMenu(){
            submenu.classList.toggle("open-menu");
        }
        const logoutLink = document.querySelector(".sub-menu-link");
        logoutLink.addEventListener("click", function() {
            // Redirect to the Login.html page
            window.location.href = "Login.html";
        });
        const createEventsLink = document.querySelector('.nav_link_events');
        const createEventsSubMenuLink = document.querySelector('.sub_menu_1 a');
        const createUpdatesSubMenuLink = document.querySelector('.submenu-update');
        const createRemoveSubMenuLink = document.querySelector('.submenu-delete');
        const eventContainer = document.querySelector('.event-container');
        const updateContainer = document.querySelector('.update-container');
        const deleteContainer = document.querySelector('.delete-container');
        const formCloseButton = document.querySelector('.form_close');
        const formCloseButton2 = document.querySelector('.form_close2');
        const formCloseButton3 = document.querySelector('.form_close3');
        const homeElement = document.querySelector('.home');
        
        
        // Function to open the event container
        function openEventContainer() {
            eventContainer.style.display = 'block';
            homeElement.classList.add('show');
        }
        
        // Function to close the event container
        function closeEventContainer() {
            eventContainer.style.display = 'none';
            homeElement.classList.remove('show');
        }
        
        function openUpdateContainer() {
            updateContainer.style.display = 'block';
            homeElement.classList.add('show');
        }
        
        // Function to close the event container
        function closeUpdateContainer() {
            updateContainer.style.display = 'none';
            homeElement.classList.remove('show');
        }

        function openDeleteContainer() {
            deleteContainer.style.display = 'block';
            homeElement.classList.add('show');
        }
        
        // Function to close the event container
        function closeDeleteContainer() {
            deleteContainer.style.display = 'none';
            homeElement.classList.remove('show');
        }
        
        // Event listener for clicking the "Create Events" link in the main menu
        createEventsLink.addEventListener('click', openEventContainer);
        
        // Event listener for clicking the "Create Events" link in the sub-menu
        createEventsSubMenuLink.addEventListener('click', openEventContainer);
        
        // Event listener for clicking the form close button
        formCloseButton.addEventListener('click', closeEventContainer);
        
        // Event listener for clicking the "update Events" link in the main menu
        createEventsLink.addEventListener('click', openUpdateContainer);
        
        // Event listener for clicking the "update Events" link in the sub-menu
        createUpdatesSubMenuLink.addEventListener('click', openUpdateContainer);
        
        // Event listener for clicking the form close button
        formCloseButton2.addEventListener('click', closeUpdateContainer);

        // Event listener for clicking the "delete Events" link in the main menu
        createEventsLink.addEventListener('click', openDeleteContainer);
        
        // Event listener for clicking the "delete Events" link in the sub-menu
        createRemoveSubMenuLink.addEventListener('click', openDeleteContainer);
        
        // Event listener for clicking the form close button
        formCloseButton3.addEventListener('click', closeDeleteContainer);


        function validateForm() {
            var eventDate = document.getElementById('event_date').value;
            var today = new Date().toISOString().split('T')[0]; // Get the current date in YYYY-MM-DD format
        
            if (eventDate < today) {
                alert("Please select a future date.");
                return false; // Prevent the form submission
            }
        
            // If the date is valid, allow the form to be submitted
            return true;
        }
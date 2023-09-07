// public/js/offline-sync.js

// Check if the internet connection is available
function isOnline() {
    return navigator.onLine;
}

// Store data in localStorage
function storeDataLocally(data) {
    const pendingData = JSON.parse(localStorage.getItem('pendingData')) || [];
    pendingData.push(data);
    localStorage.setItem('pendingData', JSON.stringify(pendingData));
}

// Send pending data to the server when online
function synchronizeData() {
    if (isOnline()) {
        const pendingData = JSON.parse(localStorage.getItem('pendingData'));

        if (pendingData && pendingData.length > 0) {
        // console.log(pendingData);
            // Send pending data to the server using an AJAX request
            // Example using Axios
            console.log(pendingData);
            axios.post('/api/tasks/sync', { data: pendingData })
                .then((response) => {
                    console.log(response.data);
                    // Data synchronized successfully, remove it from localStorage
                    localStorage.removeItem('pendingData');
                })
                .catch((error) => {
                    console.error('Error syncing data:', error);
                });
        }
    }
}

// Capture and store data from the frontend
document.querySelector('#task-form').addEventListener('submit', (event) => {

    if (!isOnline()) {
        event.preventDefault();
        const title = document.querySelector('#title').value;
        const details = document.querySelector('#details').value;

        const dataToStore = {
                                title,
                                details
                            }; // Customize this based on your form fields
        storeDataLocally(dataToStore);

        // Clear the form or perform any other necessary actions
        document.querySelector('#task-form').reset();
    }
});

// Check for pending data on page load
synchronizeData();

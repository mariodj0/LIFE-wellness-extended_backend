// durationTracker.js

// Add an event listener for the DOMContentLoaded event
document.addEventListener('DOMContentLoaded', function () {
    // Record the start time
    let startTime = Date.now();

    // Select the form
    let form = document.querySelector('form');
    // Check if the form exists
    if (form) {
        // Add an event listener for the form submit event
        form.addEventListener('submit', function () {
            // Record the end time when the form is submitted
            let endTime = Date.now();
            // Calculate the duration in seconds
            let duration = Math.floor((endTime - startTime) / 1000); // Convert to seconds and round down

            // Select the duration input field
            let durationInput = document.querySelector('#duration');
            // Check if the duration input field exists
            if (durationInput) {
                // Set the value of the duration input field to the calculated duration
                durationInput.value = duration;
            }
        });
    }
});
document.addEventListener('DOMContentLoaded', function () {
    // Select the header and main elements from the DOM
    var header = document.querySelector('header');
    var main = document.querySelector('main');

    // Check if both elements exist
    if (header && main) {
        // Get the outer height of the header
        var headerHeight = header.offsetHeight;

        // Set the top padding of the main element to the height of the header
        main.style.paddingTop = headerHeight + 'px';
    }

    // Add an event listener for window resize
    window.addEventListener('resize', function() {
        // Update the header height on window resize
        headerHeight = header.offsetHeight;

        // Re-adjust the top padding of the main element
        main.style.paddingTop = headerHeight + 'px';
    });
});

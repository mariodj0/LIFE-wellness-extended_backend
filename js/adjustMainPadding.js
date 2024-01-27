document.addEventListener('DOMContentLoaded', function () {
    var header = document.querySelector('header');
    var main = document.querySelector('main');
    if (header && main) {
        var headerHeight = header.offsetHeight;
        main.style.paddingTop = headerHeight + 'px';
    }

    // Adjust the padding when the window is resized
    window.addEventListener('resize', function() {
        headerHeight = header.offsetHeight;
        main.style.paddingTop = headerHeight + 'px';
    });
});
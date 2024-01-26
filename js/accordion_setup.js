jQuery(document).ready(function($){
    $("#my-accordion").accordionjs({
        // Allow self close.(data-close-able)
        closeAble: false,

        // Close other sections.(data-close-other)
        closeOther: true,

        // Animation Speed.(data-slide-speed)
        slideSpeed: 150,

        // The section open on first init. A number from 1 to X or false.(data-active-index)
        activeIndex: 1,
        // Additional options and callbacks if needed
        
    });
});
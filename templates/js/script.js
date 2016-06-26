// Carousel Auto-Cycle
  $(document).ready(function() {
    // form carousel
    $('.carousel').carousel('pause');

    //for flip card
    // $('.more-details').click(function (e) {
    //    e.stopPropagation();
    //    $(this).parents("div.flipper").toggleClass('flipped');
    // });

  });

  $(function () {
    $('.more-details').click(function (event) {
        event.preventDefault();
        $(this).parents("div.flipper").find('.front').toggleClass('hide show');
        $(this).parents("div.flipper").find('.back').toggleClass('show hide');
    });
});

  // for dropdown //
  (function () {
    // hold onto the drop down menu
    var dropdownMenu;

    // and when you show it, move it to the body
    $(window).on('show.bs.dropdown', function (e) {

        // grab the menu
        dropdownMenu = $(e.target).find('.dropdown-menu');

        // detach it and append it to the body
        $('body').append(dropdownMenu.detach());

        // grab the new offset position
        var eOffset = $(e.target).offset();

        // make sure to place it where it would normally go (this could be improved)
        dropdownMenu.css({
            'display': 'block',
                'top': eOffset.top + $(e.target).outerHeight(),
                'left': eOffset.left
        });
    });

    // and when you hide it, reattach the drop down, and hide it normally
    $(window).on('hide.bs.dropdown', function (e) {
        $(e.target).append(dropdownMenu.detach());
        dropdownMenu.hide();
    });
})();

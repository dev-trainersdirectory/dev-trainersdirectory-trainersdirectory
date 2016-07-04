// Carousel Auto-Cycle
  $(document).ready(function() {
    // for carousel
  $(".carousel").carousel({interval:false});
    $('.modal').on('shown.bs.modal', function (e) {
    $('.carousel').carousel('pause');
  })

});
// for hide show div
$(function () {
    $('.more-details').click(function (event) {
        event.preventDefault();
        $(this).parents("div.flipper").find('.front').toggleClass('hide show');
        $(this).parents("div.flipper").find('.back').toggleClass('show hide');
    });
});

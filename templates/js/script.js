// Carousel Auto-Cycle
  $(document).ready(function() {


    //for flipper
    $('.trainer-introduction').click(function (e) {
        e.preventDefault();
        $(this).parents("div.flipper").find('.front').toggleClass('hide show');
        $(this).parents("div.flipper").find('.back').toggleClass('show hide');
    });
    /* blur on modal open, unblur on close */
    $('#myModal').on('show.bs.modal', function () {
       $('.container').addClass('blur');
    })

    $('#myModal').on('hide.bs.modal', function () {
       $('.container').removeClass('blur');
    })

    // for carousel
  $(".carousel").carousel({interval:false});
    $('.modal').on('shown.bs.modal', function (e) {
    $('.carousel').carousel('pause');
  })


   // for filter dropdown
    $(".select-filter li a").click(function(){
    $(this).parents(".dropdown").find('.btn').html($(this).text() + '<i class="fa fa-chevron-down"></i>');
    $(this).parents(".dropdown").find('.btn').val($(this).data('value'));
});






});
// for hide show div
$(function () {

});

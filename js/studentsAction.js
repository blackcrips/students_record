$('.single_actionOverlay').click(function(){
    $('.multiple_actionOverlay').hide();
    $(this).hide();
    $('.studentsAction__single').addClass('active');
});

$('.stdAction__back').click(function(){
    $('.studentsAction__single').removeClass('active')
    $('.studentsAction__multiple').addClass('active');
});
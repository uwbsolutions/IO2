$(document).ready(function() {
    $('.edit').click(function() {
        if(($('.Delete-Container').css('display')) == 'none'){
            $('.Delete-Container').slideDown('slow', function(){
                $(this).css('display','block');
                });
         }
        else{
            $('.Delete-Container').slideUp('slow', function(){
                $(this).css('display','none');
            });
        }
    });
});
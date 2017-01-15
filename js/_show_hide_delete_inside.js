$(document).ready(function() {
    $('.edit').click(function() {
        if(($('.Edit-Topic-Block-Inside').css('display')) == 'none'){
            $('.Edit-Topic-Block-Inside').slideDown('slow', function(){
                $(this).css('display','block');
                });
         }
        else{
            $('.Edit-Topic-Block-Inside').slideUp('slow', function(){
                $(this).css('display','none');
            });
        }
    });
});
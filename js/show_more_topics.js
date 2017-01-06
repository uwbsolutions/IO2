$(document).ready(function() {
    $('.Arrow').click(function() {
        if(($('.Show-Hide-Block').css('display')) == 'none'){
            $('.Show-Hide-Block').slideDown('slow', function(){
                $(this).css('display','block');
                        $('.Arrow').css({
                                "-webkit-transform":" rotate(180deg)",
                                "-moz-transform": "rotate(180deg)",
                                "-o-transform": "rotate(180deg)",
                                "-ms-transform":"rotate(180deg)",
                                "transform": "rotate(180deg)"
                        });
            });
        }
        else{
            $('.Show-Hide-Block').slideUp('slow', function(){
                $(this).css('display','none');
                        $('.Arrow').css({
                                "-webkit-transform":" rotate(0deg)",
                                "-moz-transform": "rotate(0deg)",
                                "-o-transform": "rotate(0deg)",
                                "-ms-transform":"rotate(0deg)",
                                "transform": "rotate(0deg)"
                        });
            });
        }
    });
});
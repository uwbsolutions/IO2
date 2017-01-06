$(document).ready(function() {
    $('.Arrow').click(function() {
        if(($('.Show-Hide-User').css('display')) == 'none'){
            $('.Show-Hide-User').slideDown('slow', function(){
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
            $('.Show-Hide-User').slideUp('slow', function(){
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
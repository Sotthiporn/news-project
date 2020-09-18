$(document).ready(function(){
    var body = $('body');

    $('.menu').on('click','ul li a',function(){
        var eThis = $(this);
        body.find('.title-text').text(eThis.text());
    });
});
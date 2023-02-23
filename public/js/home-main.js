$(document).ready(function() {
    $("a").each(function() {
        var ran = Math.floor(Math.random * (arbt.length + 1));
        $(this).css("background-color", arbt[ran]);
    });
});
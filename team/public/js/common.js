/**
 * Created by SiD on 01/06/15.
 */

$(document).ready(function(){
    $('#close-ad').click(function(){
        $('.ad').hide();
    });

    $('#left-epl-match-counter').countdown('2015/10/01 10:12:12', function(event) {
        //$(this).html(event.strftime('%w weeks %d days %H:%M:%S'));
        $(this).html(event.strftime('%H:%M:%S'));
    });
    $('#left-spl-match-counter').countdown('2015/10/01 04:40:30', function(event) {
        //$(this).html(event.strftime('%w weeks %d days %H:%M:%S'));
        $(this).html(event.strftime('%H:%M:%S'));
    });
    $('#left-mls-match-counter').countdown('2015/10/01 08:34:24', function(event) {
        //$(this).html(event.strftime('%w weeks %d days %H:%M:%S'));
        $(this).html(event.strftime('%H:%M:%S'));
    });
    $('#left-cl-match-counter').countdown('2015/10/01 16:21:53', function(event) {
        //$(this).html(event.strftime('%w weeks %d days %H:%M:%S'));
        $(this).html(event.strftime('%H:%M:%S'));
    });
})

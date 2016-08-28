$(function(){

    $('.btn-shorten').on('click', function(){

        var protocol = $('#urlfield').val().split(':');
            
        if ( protocol[0] != "http" ) {
            alert( "Url must contain a protocol, e.g. http " );
            return false;
        }

        $.ajax({
            url: "php-scripts/shorten.php",
            type: "POST",
            dataType: "JSON",

            data: {link: $('#urlfield').val()},
            success: function(data){
                var resultHTML = '<strong>Copy Short URL: </strong>' + data.shortUrl;
                $('#link').html(resultHTML);
                $('#link').hide().fadeIn('slow');
            }
        });

    });
});
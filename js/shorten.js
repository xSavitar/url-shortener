$( '.btn-shorten' ).on( 'click', function() {

    var protocol = $( '#urlfield' ).val().split( '://' );

    if ( protocol[0] === "http" || protocol[0] === "https" ) {
        $.ajax( {
            url: "php/shorten.php",
            type: "POST",
            dataType: "JSON",

            data: { link: $( '#urlfield' ).val() },
            success: function( data ) {
                var resultHTML = '<strong>Copy Short URL: </strong>' + data.shortUrl;
                $( '#link' ).html( resultHTML );
                $( '#link' ).hide().fadeIn( 'slow' );
            },
            error: function ( data ) {
                console.log( data.responseText );
            }
        } );
    } else {
        alert( "Url must contain a protocol, e.g. http or https." );
        return false;
    }

} );
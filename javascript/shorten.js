$('.btn-shorten').on('click', function(){

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
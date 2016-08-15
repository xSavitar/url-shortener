$('.btn-shorten').on('click', function(){

  $.ajax({
    url: "php-scripts/shorten.php",
    type: "POST",
    dataType: "JSON",
    data: {link: $('#urlfield').val()},
    success: function(data){
        var resultHTML = '<strong>Short URL: </strong><a class="result" target="_blank" href="'
        + data.hash + '"> ' + data.shortUrl + '</a>';
        $('#link').html(resultHTML);
        $('#link').hide().fadeIn('slow');
    }
  });

});
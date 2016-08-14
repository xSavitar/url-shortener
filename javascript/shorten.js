$('.btn-shorten').on('click', function(){

  $.ajax({
    url: "/shortenUrl",
    type: "POST",
    dataType: "JSON",
    data: {url: $('#urlfield').val()},
    success: function(data){
        var resultHTML = '<a class="result" href="' + data + '">'
            + data + '</a>';
        $('#link').html(resultHTML);
        $('#link').hide().fadeIn('slow');
    }
  });

});
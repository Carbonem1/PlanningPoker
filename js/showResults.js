$('#show_results_button').click(function(){
echo("Showing Results...");

var showResultsInterval = window.setInterval(function showResults()
{
  url = window.location.href;
  params = url.split('?');
  params = url.split('=');

  last_id = params[1];
  $.ajax
  ({
    data: {'last_id': last_id},
    url: '/php/showResults.php',
    method: 'POST', // or GET
    success: function(msg)
    { 
      $('#card_section').empty();
      $('#card_section').append(msg);
      showVisualizations();
    }
  });
}, 1000);
})

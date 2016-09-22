var showPlayersInterval = window.setInterval(function showPlayers()
{
  url = window.location.href;
  params = url.split('?');
  params = url.split('=');

  last_id = params[1];
  $.ajax
  ({
    data: {'last_id': last_id},
    url: '/php/showPlayers.php',
    method: 'POST', // or GET
    success: function(msg)
    { 
      $('#card_section').empty();
      $('#card_section').append(msg);
      $('#card_section').append('<button id = "show_results_button" class = "button input_text" onclick = "showResults()"> Show </button>');
 
    }
  });
}, 1000);



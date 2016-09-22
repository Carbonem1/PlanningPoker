selected_card = "";
estimates = new Array();

function showVisualizations()
{
  url = window.location.href;
  params = url.split('?');
  params = url.split('=');
 
  last_id = params[1];
  $.ajax
  ({
    data: {'last_id': last_id},
    url: '/php/showVisualizations.php',
    method: 'POST', // or GET
    success: function(msg)
    {
	estimates = msg;
	estimates = estimates.replace(/,\s*$/, "");
	data = estimates.split(',');

  var trace1 = {
    x: data,
    type: 'box',
    name: '',
    fillcolor: 'rgb(34, 34, 34)',
    marker: {
      color: 'rgb(255, 255, 255)',
      outliercolor: 'rgba(255, 255, 255, 0.6)',
      line: {
        outliercolor: 'rgba(255, 255, 255, 1.0)',
        outlierwidth: 2
      }
    },
    boxpoints: 'suspectedoutliers'
  };

  var layout = {
    title: 'Story Estimate Box Plot',
    titlefont: {
      family: 'Arial',
      size: 22,
      color: '#ffffff'
    },
    xaxis: {
      title: 'Points',
      titlefont: {
        family: 'Arial',
        size: 18,
        color: '#ffffff'
      },
      autorange: true,
      showgrid: true,
      zeroline: true,
      dtick: 5,
      gridcolor: 'rgba(100, 100, 100, .6)',
      gridwidth: 1,
      zerolinecolor: 'rgba(100, 100, 100, .6)',
      zerolinewidth: 1,
      color: 'rgb(255, 255, 255)'
    },
    yaxis: {
      titlefont: {
        family: 'Arial',
        size: 18,
        color: '#ffffff'
      },
      color: 'rgb(255, 255, 255)'
    },
    paper_bgcolor: 'rgb(34, 34, 34)',
    plot_bgcolor: 'rgb(34, 34, 34)'
  };

  data = [trace1];
  Plotly.newPlot('box_plot', data, layout);

    }
  }); 

};

function signUp(username, password, confirm_password, email)
{
  $.ajax
  ({
    data: 'username=' + username + ", password=" + password + ", confirm_password=" + confirm_password + ", email=" + email,
    url: '/php/signUp.php',
    method: 'POST', // or GET
    success: function(msg)
    {
    }
  });
};

function logIn(username, password)
{
  $.ajax
  ({
    data: 'username=' + username + ", password=" + password,
    url: '/php/logIn.php',
    method: 'POST', // or GET
    success: function(msg)
    {
    }
  });
};

function createRoom()
{
  $.ajax
  ({
    data: '',
    url: '/php/createRoom.php',
    method: 'POST', // or GET
    success: function(msg)
    {
	window.location.replace("/php/index.php?roomID=" + msg);
    }
  });
};

function submit()
{
  name_input = document.getElementById("name_input");
  given_name = name_input.value;
  parent = document.getElementById("user_section");

  // TODO: change alert to a nicer looking message
  // check for a name
  if(given_name == '')
  {
    return;
  }
  // check for a card
  if(selected_card == '')
  {
    return;
  }

  // remove name and submit button
  parent.removeChild(name_input);

  // display the user's name
  paragraph = document.createElement("P");
  name_input = document.createTextNode(given_name);
  paragraph.className = "header_text";
  paragraph.style.marginBottom = "-22px";
  paragraph.appendChild(name_input);
  parent.insertBefore(paragraph, parent.firstChild);
  
  url = window.location.href;
  params = url.split('?');
  params = url.split('=');
 
  last_id = params[1];
  $.ajax
  ({
    data: {'last_id': last_id, 'username': given_name, 'card': selected_card},
    url: '/php/submit.php',
    method: 'POST', // or GET
    success: function(msg)
    {
	estimates = msg;
    }
  });
};

window.setInterval(function showResults()
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
}, 2000);


function selectCard(card)
{
  // get the clicked card's ID
  current_card = document.getElementById(card);

  // get all card's IDs
  card0 = document.getElementById("card0");
  card1 = document.getElementById("card1");
  card2 = document.getElementById("card2");
  card3 = document.getElementById("card3");
  card4 = document.getElementById("card4");
  card5 = document.getElementById("card5");
  card6 = document.getElementById("card6");
  card7 = document.getElementById("card7");
  card8 = document.getElementById("card8");
  card9 = document.getElementById("card9");
  card10 = document.getElementById("card10");
  card11 = document.getElementById("card11");

  // reset all card's colors
  card0.style.backgroundColor = "#262626";
  card1.style.backgroundColor = "#262626";
  card2.style.backgroundColor = "#262626";
  card3.style.backgroundColor = "#262626";
  card4.style.backgroundColor = "#262626";
  card5.style.backgroundColor = "#262626";
  card6.style.backgroundColor = "#262626";
  card7.style.backgroundColor = "#262626";
  card8.style.backgroundColor = "#262626";
  card9.style.backgroundColor = "#262626";
  card10.style.backgroundColor ="#262626";
  card10.style.backgroundColor ="#262626";
  card11.style.backgroundColor ="#262626";

  // set the clicked card's color
  current_card.style.backgroundColor = "black";
  selected_card = current_card.getAttribute("name");
};

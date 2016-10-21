var selected_card = "";
var estimates = new Array();
var mean;
var showPlayersInterval;
var showPlayersIntervalBool = false;
var showResultsInterval;
var showResultsIntervalBool = false;
var same_result_bool;
var dolphin_flag = true;

function copyRoomLink()
{
url = window.location.href;
window.prompt("Copy to clipboard: Ctrl+C, Enter", url);
};

function showResults()
{
clearInterval(showPlayersInterval);
showPlayersInervalBool = false;

$('#show_result_button').replaceWith('<img title = "Click to hide results" id = "hide_result_button" onclick ="hideResultsButton()" src = "../images/hide_eye_icon.png"> </img>');

showResultsInterval = setInterval(function showResultsLoop()
{
  showResultsIntervalBool = true;

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
      showResultsBool = (msg.slice(-1));
      msg = msg.slice(0, -1); 
      if (showResultsBool == "1")
      {
      $('#card_section').empty();
      $('#card_section').append(msg);

      showVisualizations();
      }
      else if (showResultsBool == "0")
      {
	showPlayers();
      }
      else
      {
	return;
      }
    }
  });
}, 300);
};

function showResultsButton()
{
  url = window.location.href;
  params = url.split('?');
  params = url.split('=');

  last_id = params[1];
  $.ajax
  ({
    data: {'last_id': last_id},
    url: '/php/showResultsButton.php',
    method: 'POST', // or GET
    success: function(msg)
    { 
    }
  });
};
 
function hideResultsButton()
{
  url = window.location.href;
  params = url.split('?');
  params = url.split('=');

  last_id = params[1];
  $.ajax
  ({
    data: {'last_id': last_id},
    url: '/php/hideResultsButton.php',
    method: 'POST', // or GET
    success: function(msg)
    { 
    }
  });
};

function showPlayers()
{
clearInterval(showResultsInterval);
showResultsIntervalBool = false;
$('#hide_result_button').replaceWith('<img title = "Click to show results" id = "show_result_button" onclick ="showResultsButton()" src = "../images/show_eye_icon.png"> </img>');
// reset dolphin flag, show dolphin if we get a new consensus
dolphin_flag = true;
 
showPlayersInterval = setInterval(function showPlayersLoop()
{
  showPlayersIntervalBool = true;  

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
      showResultsBool = (msg.slice(-1));
      msg = msg.slice(0, -1); 
      if (showResultsBool == "0")
      {
      $('#card_section').empty();
      $('#card_section').append(msg);
     }
      else if (showResultsBool == "1")
      {
	showResults();
      }
      else
      {
	return;
      }
    }
  });
}, 300);
};

function clearResults()
{
  url = window.location.href;
  params = url.split('?');
  params = url.split('=');

  room_id = params[1];

  $.ajax
  ({
    data: {'room_id': room_id},
    url: '/php/clearResults.php',
    method: 'POST', // or GET
    success: function(msg)
    {
    }
  }); 
};

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
	data = estimates.split(', ');
        same_result_bool = data.allValuesSame();
	if(same_result_bool === true && data.length >= 2 && dolphin_flag === true)
	{
	  alert("Great minds think alike!\n\n                  YAao,\n                     Y8888b,\n                   ,oA8888888b,\n             ,aaad8888888888888888bo,\n          ,d888888888888888888888888888b,\n        ,888888888888888888888888888888888b,\n       d8888888888888888888888888888888888888,\n      d888888888888888888888888888888888888888b\n     d888888P'                                        `Y888888888888,\n     88888P'                                         Ybaaaa8888888888l\n    a8888'                                               `Y8888P' `V888888\n  d8888888a                                                             `Y8888\n AY/'' `\ Y8b                                                                  ``Y8b\n Y'      `YP                                                                         ~~");
	  dolphin_flag = false;
	  console.log(dolphin_flag);
	}



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

  var box_layout = {
    title: 'Story Estimate Box Plot',
    hovermode: false,
    titlefont: {
      family: 'Gidole',
      size: 22,
      color: '#ffffff'
    },
    xaxis: {
      title: 'Points',
      titlefont: {
        family: 'Gidole',
        size: 18,
        color: '#ffffff'
      },
      autorange: true,
      showgrid: true,
      zeroline: true,
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
      color: 'rgb(255, 255, 255)',
      showticklabels: false
    },
    paper_bgcolor: 'rgb(34, 34, 34)',
    plot_bgcolor: 'rgb(34, 34, 34)'
  };

  box_data = [trace1];
  Plotly.newPlot('box_plot', box_data, box_layout);

  var hist_layout = {
    title: 'Story Estimate Histogram',
    hovermode: false,
    titlefont: {
      family: 'Gidole',
      size: 22,
      color: '#ffffff'
    },
    xaxis: {
      title: 'Points',
      titlefont: {
        family: 'Gidole',
        size: 18,
        color: '#ffffff'
      },
      autorange: true,
      showgrid: true,
      zeroline: true,
      gridcolor: 'rgba(100, 100, 100, .6)',
      gridwidth: 1,
      zerolinecolor: 'rgba(100, 100, 100, .6)',
      zerolinewidth: 1,
      color: 'rgb(255, 255, 255)',
      tickvals:['0', '1', '2', '3', '5', '8', '13', '21', '34', '55', '89']
    },
    yaxis: {
      titlefont: {
        family: 'Gidole',
        size: 18,
        color: '#ffffff'
      },
      color: 'rgb(255, 255, 255)',
      dtick: 1
    },
    paper_bgcolor: 'rgb(34, 34, 34)',
    plot_bgcolor: 'rgb(34, 34, 34)'
  };


  var trace2 = [
  {
    x: data,
    type: 'histogram', 
    autobinx: false, 
    marker: {
      color: 'rgba(255, 255, 255,0.7)',
    },
    xbins: {
      end: 100, 
      size: .5,  
      start: 0
    }
 }
  ];
  Plotly.newPlot('hist_plot', trace2, hist_layout);
  var total = 0;
  for (var i = 0; i < data.length; i++) {
    total += data[i] << 0;
  }
  mean = (total/data.length).toFixed(2);
  $('#mean').remove()
  $('#statistics_header_section').append('<p id = "mean" class = "statistics_text"> Mean: '+mean+' </p>');
    }
  }); 

};

/* ---------- Sign Up ---------- */
function signUp()
{
  username = document.getElementById('username_input').value;
  password = document.getElementById('password_input').value;
  confirm_password = document.getElementById('confirm_password_input').value;
  email = document.getElementById('email_input').value;

  var valid_form = signUpFormValidation(username, password, confirm_password, email);
  if (valid_form)
  {
  $.ajax
  ({
    data: {'username': username, "password": password, "confirm_password": confirm_password, "email": email},
    url: '/php/signUp.php',
    method: 'GET',
    success: function(msg)
    {
	if (msg === "signed_up")
	  { 
	    // clear existing errors
  	    $('#signup_success_text').remove();
  	    $('#username_in_use_text').remove();

	    $('#signup_section').append("<p id = 'signup_success_text' class = 'success_text'> Success! </p>");
	    loginAfterSignUp(username, password);
  	  }
	else if (msg === "username_in_use")
	  {
	    // clear existing errors
  	    $('#signup_success_text').remove();
  	    $('#username_in_use_text').remove();

	    $('#signup_section').append("<p id = 'username_in_use_text' class = 'error_text'> Username already taken </p>");
  	  }
	else
	{
	}
    }
  });
  }
};

function signUpFormValidation(username, password, confirm_password, email)
{
  var valid = true;
  if (!validateSignUpEmail(email))
  {
    valid = false;
  }
  if (!validateSignUpUsername(username))
  {
    valid = false;
  }
  if (!validateSignUpPassword(password))
  {
    valid = false;
  }
  if (!validateSignUpConfirmPassword(password, confirm_password))
  {
    valid = false;
  }
  return valid;
};

function validateSignUpEmail(email)
{
  // clear existing errors
  $('#signup_email_error').remove();

  email_length = email.length;
  if (email_length == 0)
  {
    $('#signup_email_section').append("<p id = 'signup_email_error' class = 'error_text'> Email can not be empty </p>");
    return false;
  }
  return true; 
};

function validateSignUpUsername(username)
{
  // clear existing errors
  $('#signup_username_error').remove();

  username_length = username.length;
  if (username_length == 0)
  {
    $('#signup_username_section').append("<p id = 'signup_username_error' class = 'error_text'> Username can not be empty </p>");
    return false;
  }
  return true;
};

function validateSignUpPassword(password)
{
  // clear existing errors
  $('#signup_password_error').remove();

  password_length = password.length;
  if (password_length == 0)
  {
    $('#signup_password_section').append("<p id = 'signup_password_error' class = 'error_text'> Password can not be empty </p>");
    return false;
  }
  return true;
};

function validateSignUpConfirmPassword(password, confirm_password)
{
  // clear existing errors
  $('#signup_confirm_password_error').remove();
  $('#signup_confirm_password_match_error').remove();

  confirm_password_length = confirm_password.length;
  if (confirm_password_length == 0)
  {
    $('#signup_confirm_password_section').append("<p id = 'signup_confirm_password_error' class = 'error_text'> Confirm password can not be empty </p>");
    return false;
  }
  if (confirm_password != password)
  {
    $('#signup_confirm_password_section').append("<p id = 'signup_confirm_password_match_error' class = 'error_text'> Password and confirm password must match </p>");
    return false;
  }
  return true;
};

/* ---------- Login ---------- */
function login()
{  
  username = document.getElementById('login_username_input').value;
  password = document.getElementById('login_password_input').value;

  if (loginFormValidation(username, password))
  { 
  $.ajax
  ({
    data: {'username': username, "password": password},
    url: '/php/logIn.php',
    method: 'GET',
    success: function(msg)
    {
	if(msg == "logged_in")
	{	   
	   // clear existing errors
  	   $('#login_success_text').remove();
  	   $('#login_error').remove();

	   $('#login_section').append("<p id = 'login_success_text' class = 'success_text'> Success! </p>");
	   window.location.href = document.referrer;

	}
	else
	{
	   // clear existing errors
  	   $('#login_success_text').remove();
  	   $('#login_error').remove();

	   $('#login_section').append("<p id = 'login_error' class = 'error_text'> Invalid username password combination </p>");
	}
    }
  });
  }
};

function loginAfterSignUp(username, password)
{  
  if (loginFormValidation(username, password))
  { 
  $.ajax
  ({
    data: {'username': username, "password": password},
    url: '/php/logIn.php',
    method: 'GET',
    success: function(msg)
    {
	   window.location.href = "index.php";
    }
  });
  }
};


function loginFormValidation(username, password)
{
  var valid = true;
  if (!validateLoginUsername(username))
  {
    valid = false;
  }
  if (!validateLoginPassword(password))
  {
    valid = false;
  }
  return valid;
};

function validateLoginUsername(username)
{
  // clear existing errors
  $('#login_username_error').remove();

  username_length = username.length;
  if (username_length == 0)
  {
    $('#login_username_section').append("<p id = 'login_username_error' class = 'error_text'> Username can not be empty </p>");
    return false;
  }
  return true;
};

function validateLoginPassword(password)
{
  // clear existing errors
  $('#login_password_error').remove();

  password_length = password.length;
  if (password_length == 0)
  {
    $('#login_password_section').append("<p id = 'login_password_error' class = 'error_text'> Password can not be empty </p>");
    return false;
  }
  return true;
};

function logout()
{
  $.ajax
  ({
    data: '',
    url: '/php/logOut.php',
    method: 'POST', // or GET
    success: function(msg)
    {
	location.reload();
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
	window.location.href = "/php/index.php?roomID=" + msg;
    }
  });
};

function joinRoom()
{
  roomID = $('#join_room_input').val();
  if (joinRoomFormValidation(roomID))
  {
  	// clear existing errors
  	$('#joinRoom_roomID_error').remove();

  	window.location.href = "/php/index.php?roomID=" + roomID;
  }
  else
  {

  }
};

function joinRoomFormValidation(roomID)
{
  var valid = true;
  if (!validateRoomID(roomID))
  {
    valid = false;
  }
  return valid;
};

function validateRoomID(roomID)
{
  // clear existing errors
  $('#joinRoom_roomID_error').remove();

  roomID_length = roomID.length;
  if (roomID_length == 0)
  {
    $('#user_section').append("<p id = 'joinRoom_roomID_error' class = 'error_text'> Room ID can not be empty </p>");
    return false;
  }
  return true; 
};

function submit()
{
  name_input = document.getElementById("name_input");
  if (name_input != null)
  {
    given_name = name_input.value;
  }
  
  parent = document.getElementById("user_section");

  // TODO: change alert to a nicer looking message
  // clear existing errors
  $('#submit_card_error_text').remove();
  $('#submit_username_error_text').remove();


  // check for a name
  if(given_name == '')
  {
  	$('#user_section').append("<p id = 'submit_username_error_text' class = 'error_text'> Please enter a name </p>");
    return;
  }
  // check for a card
  if(selected_card == '')
  {
	$('#user_section').append("<p id = 'submit_card_error_text' class = 'error_text'> Please select a card </p>");
    return;
  }

  // display the user's name
  paragraph = document.createElement("P");
  name_input = document.createTextNode(given_name);
  paragraph.className = "header_text";
  paragraph.style.marginBottom = "-22px";
  paragraph.appendChild(name_input);
  $("#name_input").replaceWith(paragraph);
	  

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
    }
  });
};

function submit_logged_in(given_name)
{
  
  $('#submit_card_error_text').remove();
  // check for a card
  if(selected_card == '')
  {
	$('#user_section').append("<p id = 'submit_card_error_text' class = 'error_text'> Please select a card </p>");
    return;
  }

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
    }
  });
};

function selectCard(card)
{
  // get the clicked card's ID
  current_card = document.getElementById(card);

  // get all card's IDs
  //card0 = document.getElementById("card0");
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

  // reset all card's styles
  //card0.style.backgroundColor = "#262626";
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

  card1.style.boxShadow = "0 0 0 0 #ffffff";
  card2.style.boxShadow = "0 0 0 0 #ffffff";
  card3.style.boxShadow = "0 0 0 0 #ffffff";
  card4.style.boxShadow = "0 0 0 0 #ffffff";
  card5.style.boxShadow = "0 0 0 0 #ffffff";
  card6.style.boxShadow = "0 0 0 0 #ffffff";
  card7.style.boxShadow = "0 0 0 0 #ffffff";
  card8.style.boxShadow = "0 0 0 0 #ffffff";
  card9.style.boxShadow = "0 0 0 0 #ffffff";
  card10.style.boxShadow = "0 0 0 0 #ffffff";
  card11.style.boxShadow = "0 0 0 0 #ffffff";

  // set the clicked card's color
  current_card.style.backgroundColor = "black";
  current_card.style.boxShadow = "0 0 0 2pt #ffffff";
  selected_card = current_card.getAttribute("name");
};


// function to check if all values of an array are equal
Array.prototype.allValuesSame = function() {
    for(var i = 0; i < this.length-1; i++)
    {
        if(this[i] !== this[i+1])
	{
            return false;
	}
    }

    return true;
}


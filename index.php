<html>
  <head>
    <title> Planning Poker </title>
    <link rel="icon" href="images/icon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
    <link rel = "stylesheet" href = "css/styles.css">
    <!-- JavaScript -->
    <script type ="text/javascript" src = "js/javaScript.js"> </script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/footer-distributed-with-contact-form.css">
    <!-- jQuery library -->
    <script src="js/ajaxjquery.min.js"></script>
    <!-- Plotly.js -->
    <script src="js/plotly-latest.min.js"></script>
  </head>

  <body id = "body">
<?php
    session_start();
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
    {
    echo '
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand text" href="#">Planning Poker</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="#">Home</a></li>
            <li><a href="#">Options</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class = "dropdown"> 
  	      <a class = "dropdown-toggle text" data-toggle = "dropdown"> '.$_SESSION["username"].' <span class = "caret"> </span> </a>
	      <ul class = "dropdown-menu">
		<li> <a class = "dropdown-item" onclick = "logout()"> Log Out </a> </li>
	      </ul>
	    </li>
          </ul>
        </div>
      </div>
    </nav>';
    }
    else
    {
    echo'
    <!-- Bootstrap Header -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Planning Poker</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">Options</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="signup.html"><span></span> Sign Up </a></li>
            <li><a href="login.html"><span></span> Login </a></li>
          </ul>
        </div>
      </div>
    </nav>';
    }
?>
    <center>
      <p id = "title"> Planning Poker </p>

      <div id = "user_section">
      	<button onclick = "createRoom()" id = "submit" class = "button input_text"> Create Room </button>
	<p class = "dark_text"> OR </p>
	<input type = "text" id = "join_room_input" class = "input_text" placeholder = "Room ID" onkeydown = "if (event.keyCode == 13) document.getElementById('join_room_button').click()")"> </input>
      	<button onclick = "joinRoom()" id = "join_room_button" class = "button input_text"> Join Room </button>
	
      </div>

    <!-- Bootstrap footer -->
    <footer class="footer-distributed bottom">
      <div class="footer-left">
        <span class = "title_text">Planning Poker</span>
        <p class="footer-company-name">Dell EMC &copy; 2016</p>
      </div>
      <div class="footer-right">
        <p class = "text footer_name"> Michael Carbone </p> <br>
        <p class="footer-company-name"> Michael.Carbone@emc.com </p>
        </div>
      </div>
    </footer>

  </body>
</html>

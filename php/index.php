<html>
<head>
  <title> Planning Poker </title>
  <link rel="icon" href="../images/icon.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSS -->
  <link rel = "stylesheet" href = "../css/styles.css">
  <!-- JavaScript -->
  <script src="../js/javaScript.js"></script>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/footer-distributed-with-contact-form.css">
  <!-- jQuery library -->
  <script src="../js/ajaxjquery.min.js"></script>
  <!-- Plotly.js -->
  <script src="../js/plotly-latest.min.js"></script>
</head>

  <body id = "body" onload = "showPlayers()">
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
          <a class="navbar-brand text" href="../index.html">Planning Poker</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="../index.html">Home</a></li>
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
    </nav>

    <center>
      <p id = "title"> Planning Poker </p>

      <div id = "user_section">
	<span id = "user_section_header">
	<p id = "" class = "username_header header_text"> '.$_SESSION["username"].' </p>
	</span>
	<br>

        <!-- <span id = "card0" name = "?" tabindex="1" class = "card" onclick= "selectCard(this.id)"> 
          <p class = "text"> ? </p>
        </span> -->
        <span id = "card1" name = "0"  tabindex="1" class = "card" onclick= "selectCard(this.id)">
          <p class = "text"> 0 </p>
        </span>
        <span id = "card2" name = "1"  tabindex="1" class = "card" onclick= "selectCard(this.id)">
          <p class = "text"> 1 </p>
        </span>
        <span id = "card3" name = "2"  tabindex="1" class = "card" onclick= "selectCard(this.id)">
          <p class = "text"> 2 </p>
        </span>
        <span id = "card4" name = "3"  tabindex="1" class = "card" onclick= "selectCard(this.id)">
          <p class = "text"> 3 </p>
        </span>
        <span id = "card5" name = "5"  tabindex="1" class = "card" onclick= "selectCard(this.id)">
          <p class = "text"> 5 </p>
        </span>
        <span id = "card6" name = "8"  tabindex="1" class = "card" onclick= "selectCard(this.id)">
          <p class = "text"> 8 </p>
        </span>
        <span id = "card7" name = "13"  tabindex="1" class = "card" onclick= "selectCard(this.id)">
          <p class = "text"> 13 </p>
        </span>
        <span id = "card8" name = "21"  tabindex="1" class = "card" onclick= "selectCard(this.id)">
          <p class = "text"> 21 </p>
        </span>
        <span id = "card9" name = "34"  tabindex="1" class = "card" onclick= "selectCard(this.id)">
          <p class = "text"> 34 </p>
        </span>
        <span id = "card10" name = "55"  tabindex="1" class = "card" onclick= "selectCard(this.id)">
          <p class = "text"> 55 </p>
        </span>
        <span id = "card11" name = "89"  tabindex="1" class = "card" onclick= "selectCard(this.id)">
          <p class = "text"> 89 </p>
        </span>
        <br>
        <button id = "submit" class = "button input_text" onclick = "submit_logged_in(\''.$_SESSION["username"].'\')"> Submit </button>
      </div>

      <div id = "result_section">
	<img id = "copy_room_link_button" title = "Click to copy room link" src = "../images/copy_link.png" onclick = "copyRoomLink()">
        <img title = "Click to show results" id = "show_result_button" onclick ="showResultsButton()" src = "../images/show_eye_icon.ico"> </img>
	<p id = "results_header" class = "header_text"> Results </p>

	<div id = "card_section"> </div>
      </div>

    <div id="statistics_section">
      <div id = "statistics_header_section">
      <p class = "header_text"> Statistics </p>
      </div>
      <div id = "box_plot"> </div>
      <div id = "hist_plot"> </div>
    </div>
    </center>

    <footer class="footer-distributed">
      <div class="footer-left">
        <span class = "title_text">Planning Poker</span>
        <p class="footer-company-name">DellEMC &copy; 2016</p>
      </div>
      <div class="footer-right">
        <p class = "text footer_name"> Michael Carbone </p> <br>
        <p class="footer-company-name"> Michael.Carbone@emc.com </p>
      </div>
    </footer>';
    $conn->close();
    $conn = null;

    }
    else
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
          <a class="navbar-brand text" href="../index.html">Planning Poker</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="../index.html">Home</a></li>
            <li><a href="#">Options</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../signup.html"><span></span> Sign Up </a></li>
            <li><a href="../login.html"><span></span> Login </a></li>
          </ul>
        </div>
      </div>
    </nav>

    <center>
      <p id = "title"> Planning Poker </p>

      <div id = "user_section">
	<span id = "user_section_header">
        <input id = "name_input" class = "input_text" type="text" name = "name" placeholder = "Name">
	</span>
	<br>

        <!-- <span id = "card0" name = "?" tabindex="1" class = "card" onclick= "selectCard(this.id)"> 
          <p class = "text"> ? </p>
        </span> -->
        <span id = "card1" name = "0"  tabindex="1" class = "card" onclick= "selectCard(this.id)">
          <p class = "text"> 0 </p>
        </span>
        <span id = "card2" name = "1"  tabindex="1" class = "card" onclick= "selectCard(this.id)">
          <p class = "text"> 1 </p>
        </span>
        <span id = "card3" name = "2"  tabindex="1" class = "card" onclick= "selectCard(this.id)">
          <p class = "text"> 2 </p>
        </span>
        <span id = "card4" name = "3"  tabindex="1" class = "card" onclick= "selectCard(this.id)">
          <p class = "text"> 3 </p>
        </span>
        <span id = "card5" name = "5"  tabindex="1" class = "card" onclick= "selectCard(this.id)">
          <p class = "text"> 5 </p>
        </span>
        <span id = "card6" name = "8"  tabindex="1" class = "card" onclick= "selectCard(this.id)">
          <p class = "text"> 8 </p>
        </span>
        <span id = "card7" name = "13"  tabindex="1" class = "card" onclick= "selectCard(this.id)">
          <p class = "text"> 13 </p>
        </span>
        <span id = "card8" name = "21"  tabindex="1" class = "card" onclick= "selectCard(this.id)">
          <p class = "text"> 21 </p>
        </span>
        <span id = "card9" name = "34"  tabindex="1" class = "card" onclick= "selectCard(this.id)">
          <p class = "text"> 34 </p>
        </span>
        <span id = "card10" name = "55"  tabindex="1" class = "card" onclick= "selectCard(this.id)">
          <p class = "text"> 55 </p>
        </span>
        <span id = "card11" name = "89"  tabindex="1" class = "card" onclick= "selectCard(this.id)">
          <p class = "text"> 89 </p>
        </span>
        <br>
        <button id = "submit" class = "button input_text" onclick = "submit()"> Submit </button>
      </div>

      <div id = "result_section">
	<img id = "copy_room_link_button" title = "Click to copy room link" src = "../images/copy_link.png" onclick = "copyRoomLink()">
        <img title = "Click to show results" id = "show_result_button" onclick ="showResultsButton()" src = "../images/show_eye_icon.ico"> </img>
	<p id = "results_header" class = "header_text"> Results </p>

	<div id = "card_section"> </div>
      </div>

    <div id="statistics_section">
      <div id = "statistics_header_section">
      <p class = "header_text"> Statistics </p>
      </div>
      <div id = "box_plot"> </div>
      <div id = "hist_plot"> </div>
    </div>
    </center>

    <footer class="footer-distributed">
      <div class="footer-left">
        <span class = "title_text">Planning Poker</span>
        <p class="footer-company-name">DellEMC &copy; 2016</p>
      </div>
      <div class="footer-right">
        <p class = "text footer_name"> Michael Carbone </p> <br>
        <p class="footer-company-name"> Michael.Carbone@emc.com </p>
      </div>
    </footer>';
    $conn->close();
    $conn = null;
    }
    ?>

  </body>
</html>

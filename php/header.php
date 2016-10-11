<?php
    $URI = $_SERVER['REQUEST_URI'];
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
          <a class="navbar-brand text" href="/index.php">Planning Poker</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav cl-effect-1">';
	    if ($URI == "/index.php")
	    {
	      echo '
              <li><a href="/index.php" class = "active">Home</a></li>
              <li><a href="#">Options</a></li>';
	    }
	    else
            {
	      echo '
              <li><a href="/index.php">Home</a></li>
              <li><a href="#">Options</a></li>';
	    }
	  echo ' 
          </ul>
          <ul class="nav navbar-nav navbar-right cl-effect-1">
            <li class = "dropdown"> 
  	      <a href = "#" class = "dropdown-toggle text" data-toggle = "dropdown"> '.$_SESSION["username"].'</a>
	      <ul class = "dropdown-menu">
		<li> <a href = "#" class = "dropdown-item" onclick = "logout()"> Log Out </a> </li>
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
          <a class="navbar-brand" href="/index.php">Planning Poker</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav cl-effect-1">';
            if ($URI == "/index.php")
	    {
  	    echo '
	    <li class="active"><a href="/index.php">Home</a></li>
            <li><a href="#">Options</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right cl-effect-1">
            <li><a href="/signup.php"><span></span> Sign Up </a></li>
            <li><a href="/login.php"><span></span> Login </a></li>
          </ul>';
	    }
            else if ($URI == "/signup.php")
	    {
  	    echo '
	    <li><a href="/index.php">Home</a></li>
            <li><a href="#">Options</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right cl-effect-1">
            <li class = "active"><a href="/signup.php"><span></span> Sign Up </a></li>
            <li><a href="/login.php"><span></span> Login </a></li>
          </ul>';
	    }       
            else if ($URI == "/login.php")
	    {
  	    echo '
	    <li><a href="/index.php">Home</a></li>
            <li><a href="#">Options</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right cl-effect-1">
            <li><a href="/signup.php"><span></span> Sign Up </a></li>
            <li class = "active"><a href="/login.php"><span></span> Login </a></li>
          </ul>';
	    }
            else
	    {
  	    echo '
	    <li><a href="/index.php">Home</a></li>
            <li><a href="#">Options</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right cl-effect-1">
            <li><a href="/signup.php"><span></span> Sign Up </a></li>
            <li><a href="/login.php"><span></span> Login </a></li>
          </ul>';
	    }

	echo '
        </div>
      </div>
    </nav>';
    }
?>

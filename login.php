<!DOCTYPE html>
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
    <link rel = "stylesheet" type = "text/css" href = "css/component.css" />
  </head>

  <body id = "body">
    <!-- Bootstrap Header -->
    <?php include('php/header.php'); ?>
    <center>
      <p id = "title"> Planning Poker </p>

      <div id = "login_section">
          <div id = "submit_login_section">
	    <div id = "login_username_section">
            <input id = "login_username_input" class = "login_input input_text" type="text" name = "username" placeholder = "Username"> <br>
	    </div>
	    <div id = "login_password_section">
            <input id = "login_password_input" class = "login_input input_text" type="password" name = "password" placeholder = "Password"> <br>
	    </div>
            <button id = "submit" class = "btn btn-1 btn-1f" onclick = "login()"> Log In </button>
	    <!-- <button id = "submit" class = "btn btn-1 btn-1f" onclick = "adLogin()"> Log In With AD </button> -->

          </div>
      </div>
    </center>

    <!-- Bootstrap footer -->
    <?php include('php/footer.php'); ?>
  </body>
</html>




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
  </head>

  <body id = "body">
    <!-- Bootstrap Header -->
    <?php include('php/header.php'); ?>
    <center>
      <p id = "title"> Planning Poker </p>

      <div id = "signup_section">
          <div id = "submit_signup_section">
	    <div id = signup_email_section>
            <input id = "email_input" class = "signup_input input_text" type="text" name = "email" placeholder = "Email"> <br>
	    </div>
	    <div id = signup_username_section>
            <input id = "username_input" class = "signup_input input_text" type="text" name = "username" placeholder = "Username (display name)"> <br>
	    </div>
	    <div id = signup_password_section>
            <input id = "password_input" class = "signup_input input_text" type="password" name = "password" placeholder = "Password"> <br>
	    </div>
  	    <div id = signup_confirm_password_section>
            <input id = "confirm_password_input" class = "signup_input input_text" type="password" name = "confirm_password" placeholder = "Confirm Password"> <br>
	    </div>
            <button id = "submit" class = "btn-1f" onclick = "signUp()"> Sign Up </button>
          </div>
      </div>
    </center>

    <!-- Bootstrap footer -->
    <?php include('php/footer.php'); ?>
  </body>
</html>



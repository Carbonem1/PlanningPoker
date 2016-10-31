<html>
  <head>
    <title> Planning Poker </title>
    <link rel="icon" href="images/icon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
    <link rel = "stylesheet" type = "text/css" href = "css/styles.css" />
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

  <body id = "body" onload = "cookieLogin();">
  <!-- Header -->
  <?php include('php/header.php'); ?>

  <!-- Content -->
  <center>
    <p id = "title"> Planning Poker </p>
    
    <div id = "user_section" class = "section">
      <button onclick = "createRoom()" id = "submit" class = "button input_text btn btn-1 btn-1f"> Create Room </button>
      <div id = "or_text_section">
        <p id = "or_text"> <span> OR </span> </p>
      </div>
      <input type = "text" id = "join_room_input" class = "input_text" placeholder = "Room ID" onkeydown = "if (event.keyCode == 13) document.getElementById('join_room_button').click()"> </input>
      <br>
      <button onclick = "joinRoom()" id = "join_room_button" class = "button input_text btn btn-1 btn-1f"> Join Room </button>	
    </div>
  </center>

  <!-- Footer -->
  <?php include('php/footer.php'); ?>
      
  </body>
</html>

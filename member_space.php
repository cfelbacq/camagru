<?php
  session_start();
  require('config/database.php');
  require('member_class.php');
  require('member_manager_class.php');
  require('image_class.php');
  if ($_SESSION['loggued_on_user'] == 0)
    header("location: registration_form.php");
  include "layout/headers.php";
?>
<div id="middle">
  <div id="main">
    <video id="video"></video>
    <canvas id="canvas"></canvas>
    <img src="http://placekitten.com/g/320/261" id="photo" alt="photo">
      <button id="startbutton">Prendre une photo</button>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="webcam.js"></script>
  </div>
  <div id="side">
  </div>
</div>
<div id="footer"></div>
</body>
</html>
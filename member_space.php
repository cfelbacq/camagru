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
  <div id="take_picture">
    <video id="video"></video>
    <canvas id="canvas"></canvas>
  </div>
    <img class="img_merge" src="image_to_merge/coeur.png">
    <img class="img_merge" src="image_to_merge/fleur.png">
    <img class="img_merge" src="image_to_merge/oiseaux.png">
    <br/>
  <div id="radio">
        <input style="margin-right: 55px;" type="radio" name="filter" id="radio1" checked="checked" />
        <input style="margin-left: 55px; margin-right: 55px;" type="radio" name="filter" id="radio2"/>
        <input style="margin-left: 55px;" type="radio" name="filter" id="radio3"/>
        <br/><br/>
        <button id="startbutton">cheese</button>
  </div>
    <script type="text/javascript" src="webcam.js"></script>
  </div>
  <div id="side">
    <img src="test.png">
  </div>
</div>
<div id="footer"></div>
</body>
</html>
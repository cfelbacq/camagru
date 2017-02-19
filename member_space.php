<?php
  session_start();
  require('config/database.php');
  require('member_class.php');
  require('member_manager_class.php');
  if ($_SESSION['loggued_on_user'] == 0)
    header("location: index.php");
 // echo $_SESSION['id_user'];
 // print_r($member);
  if ($_REQUEST['imgBase64'])
  {
    $img = !empty($_REQUEST['imgBase64']) ? $_REQUEST['imgBase64'] : die("No image was posted");
   // $imgName = sha1(microtime());
    //$imgName = $imgName.'.png';
    $imgName = "test.png";
    
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $fileData = base64_decode($img);
    file_put_contents("img/".$imgName, $fileData);
    header("location: test.php");
  }
  else
  {
  include "layout/headers.php";
?>
<video id="video"></video>
<button id="startbutton">Prendre une photo</button>
<canvas id="canvas"></canvas>
<img src="http://placekitten.com/g/320/261" id="photo" alt="photo">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript">
  (function() {

  var streaming = false,
      video        = document.querySelector('#video'),
      cover        = document.querySelector('#cover'),
      canvas       = document.querySelector('#canvas'),
      photo        = document.querySelector('#photo'),
      startbutton  = document.querySelector('#startbutton'),
      width = 320,
      height = 0;

  navigator.getMedia = ( navigator.getUserMedia ||
                         navigator.webkitGetUserMedia ||
                         navigator.mozGetUserMedia ||
                         navigator.msGetUserMedia);

  navigator.getMedia(
    {
      video: true,
      audio: false
    },
    function(stream) {
      if (navigator.mozGetUserMedia) {
        video.mozSrcObject = stream;
      } else {
        var vendorURL = window.URL || window.webkitURL;
        video.src = vendorURL.createObjectURL(stream);
      }
      video.play();
    },
    function(err) {
      console.log("An error occured! " + err);
    }
  );

  video.addEventListener('canplay', function(ev){
    if (!streaming) {
      height = video.videoHeight / (video.videoWidth/width);
      video.setAttribute('width', width);
      video.setAttribute('height', height);
      canvas.setAttribute('width', width);
      canvas.setAttribute('height', height);
      streaming = true;
    }
  }, false);

  function takepicture() {
    canvas.width = width;
    canvas.height = height;
    canvas.getContext('2d').drawImage(video, 0, 0, width, height);
    var data = canvas.toDataURL('image/png');
    photo.setAttribute('src', data);
    console.log(data);
       $.ajax({
        type: "POST",
        url: "member_space.php",
      data: {
        imgBase64: data,
        imgName: "webcam.png"
      }
    }).done(function(o){
      console.log('saved');
    });
  }

  startbutton.addEventListener('click', function(ev){
      takepicture();
    ev.preventDefault();
  }, false);

})();
</script>
</body>
</html>
<?php } ?>
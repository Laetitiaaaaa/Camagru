<?php include('header.php');?>

  <select name="filter" id="filter">
    <option value="dino">Dino</option>
    <option value="heart">Heart balloons</option>
    <option value="eve">Eve (Wall-E)</option>
    <option value="fox">Fox</option>
  </select>

<div style="border:3px solid purple;">
<div id="divideo" style="border: 3px solid black; width:50%;">
  <video id="video" autoplay style="width:100%;"></video>
</div>
<!-- <img src="../filters/dino.png" alt="dino" style="position:relative; top:50px; left: 100px;"> -->
<canvas id="canvas" style="display:none;"></canvas>
<div>

<form enctype="multipart/form-data" method="post" action="/controler/home.php">

<input id="filepic" type="text" name="picture" style="display:none;">
<input id="startbutton" type="submit" name="submit" value="Take picture">

</form>

<script>

var constraints = { audio: false, video: true };
var select = document.querySelector('#filter');
var video = document.querySelector('video');
var canvas = document.querySelector('#canvas');
var startbutton = document.querySelector('#startbutton');
var pic = document.querySelector('#filepic');

navigator.mediaDevices.getUserMedia(constraints)
.then(function(mediaStream) {
  video.srcObject = mediaStream;
  video.onloadedmetadata = function(e) {
    video.play();
  };
})
.catch(function(err) { console.log(err.name + ": " + err.message); }); // always check for errors at the end.



startbutton.addEventListener('click', (ev) => {
  takepicture();
}, false);

function takepicture(){
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    canvas.getContext('2d').drawImage(video, 0, 0);
    var data = canvas.toDataURL();
    pic.setAttribute('value', data);    
}

</script>

<?php include('footer.php'); ?>
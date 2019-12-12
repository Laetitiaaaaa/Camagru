<?php include('header.php');?>

<div id="divideo" style="border: 3px solid black; width: 400px;">
  <video id="video" autoplay style="width:100%;"></video>
</div>
<button id="startbutton">Take a picture</button>
<canvas id="canvas"></canvas>

<script>

var constraints = { audio: false, video: true };
var video = document.querySelector('video');
var canvas = document.querySelector('#canvas');
var startbutton = document.querySelector('#startbutton');

navigator.mediaDevices.getUserMedia(constraints)
.then(function(mediaStream) {
  video.srcObject = mediaStream;
  video.onloadedmetadata = function(e) {
    video.play();
  };
})
.catch(function(err) { console.log(err.name + ": " + err.message); }); // always check for errors at the end.

startbutton.addEventListener('click', (ev) => {
  ev.preventDefault();
  takepicture();
}, false);

function takepicture(){
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    canvas.getContext('2d').drawImage(video, 0, 0);
}

</script>

<?php include('footer.php'); ?>
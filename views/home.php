<?php include('header.php');?>

<div style="border: 3px solid black; width: 20vmin;">
<video></video>
</div>

<script>

var constraints = { video: { width: 620, height: 480 } }; 

navigator.mediaDevices.getUserMedia(constraints)
.then(function(mediaStream) {
  var video = document.querySelector('video');
  video.srcObject = mediaStream;
  video.onloadedmetadata = function(e) {
    video.play();
  };
})
.catch(function(err) { console.log(err.name + ": " + err.message); }); // always check for errors at the end.

</script>

<?php include('footer.php'); ?>
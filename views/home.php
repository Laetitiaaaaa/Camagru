<?php include('header.php');?>

  <select name="filter" id="filter">
    <option value="dino">Dino</option>
    <option value="heart">Heart balloons</option>
    <option value="eve">Eve (Wall-E)</option>
    <option value="fox">Fox</option>
  </select>

<div id="divideo" style="border: 3px solid black; width:50%; position: relative;">
    <video id="video" autoplay style="width:100%;"></video>
    <img id="putfilter" src="../filters/dino.png" alt="dino" style="position:absolute; right:-10; bottom:-15; width:52%;">
</div>
<canvas id="canvas" style="display:none;"></canvas>

<form enctype="multipart/form-data" method="post" action="/controler/home.php">

<input id="filterpic" type="text" name="filterpic" value="dino" style="display:none;">
<input id="filepic" type="text" name="picture" style="display:none;">
<input id="startbutton" type="submit" name="submit" value="Take picture">

</form>

<script>

var constraints = { audio: false, video: true };
var filterpic = document.querySelector('#filterpic');
var filter = document.querySelector('#putfilter');
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

select.addEventListener('click', (ev) => {
  choice = select.value;
  if(choice == 'dino'){
    filterpic.setAttribute('value', 'dino');
    filter.setAttribute('style', 'position:absolute; right:-10; bottom:-15; width:52%;');
    filter.setAttribute('src', '../filters/dino.png');
  }
  else if (choice == 'heart'){
    filterpic.setAttribute('value', 'heart');
    filter.setAttribute('style', 'position:absolute; top:-40; left:-20; width:35%;');
    filter.setAttribute('src', '../filters/coeurs.png');
  }
  else if (choice == 'eve'){
    filterpic.setAttribute('value', 'eve');
    filter.setAttribute('style', 'position:absolute; left:-35; bottom:-23; width:52%;');
    filter.setAttribute('src', '../filters/eveuh.png');
  }
  else if (choice == 'fox'){
    filterpic.setAttribute('value', 'fox');
    filter.setAttribute('style', 'position:absolute; right:6; bottom:-2; height:52%;');
    filter.setAttribute('src', '../filters/fox.png');
  }
});

startbutton.addEventListener('click', (ev) => {
  takepicture();
});

function takepicture(){
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    canvas.getContext('2d').drawImage(video, 0, 0);
    var data = canvas.toDataURL();
    pic.setAttribute('value', data);    
}

</script>

<?php include('footer.php'); ?>
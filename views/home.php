<?php include('header.php');?>

<div style="border:3px solid pink;">
    
    <select name="filter" id="filter" onchange="changeFilter()" style="display:block;">
        <option value="dino">Dino</option>
        <option value="heart">Heart balloons</option>
        <option value="eve">Eve (Wall-E)</option>
        <option value="fox">Fox</option>
    </select>

    <div id="bluebox" style="display:inline-block; border:3px solid blue;width: 50%;">
      
      <div id="divideo" style="border: 3px solid black; width:100%; position: relative;">
      </div>

    </div>
    
    <div id="preview" style="border:3px solid grey; display: inline-block; vertical-align: top; text-align:center; width: 40%;">
    </div>

</div>

<script>

var constraints = { audio: false, video: true };
var filter = document.querySelector('#putfilter');
var select = document.getElementById('filter');
var httpRequest = new XMLHttpRequest;

navigator.mediaDevices.getUserMedia(constraints)
.then(function(mediaStream) {
  createElemVideo();
  
  var video = document.querySelector('video');
  video.srcObject = mediaStream;
  video.onloadedmetadata = function(e) {
    video.play();
  };

  document.getElementById('photoButton').addEventListener('click', (ev) => {
  var dataPic = takepicture();
  var dataSel = select.value;
  postData(dataPic, dataSel);
  });
})
.catch(function(err) {
  console.log(err.name + ": " + err.message);
  
  });

function createElemVideo(){
  var divideo = document.getElementById('divideo');
  var bluebox = document.getElementById('bluebox');

  var video = document.createElement('video');
  video.setAttribute('style', 'width:100%; position: relative; z-index: 1;');
  divideo.appendChild(video);

  var img_filter = document.createElement('img');
  img_filter.setAttribute('id', 'putfilter');
  img_filter.setAttribute('src', '../filters/dino.png');
  img_filter.setAttribute('alt', 'dino');
  img_filter.setAttribute('style', 'position:absolute; right:-1.5%; bottom:-3.9%; z-index: 2; width:52%;');
  divideo.appendChild(img_filter);

  var canvas = document.createElement('canvas');
  canvas.setAttribute('style', 'display:none;');
  bluebox.appendChild(canvas);

  var photoButton = document.createElement('input');
  photoButton.setAttribute('id', 'photoButton');
  photoButton.setAttribute('type', 'submit');
  photoButton.setAttribute('value', 'Take picture');
  bluebox.appendChild(photoButton);
}

function takepicture(){
    var canvas = document.querySelector('canvas');
    var video = document.querySelector('video');

    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    canvas.getContext('2d').drawImage(video, 0, 0);
    
    var data = canvas.toDataURL();
    return data;
}

function postData(dataPic, dataSel){
    var formData = new FormData();
    formData.append('picture', dataPic);
    formData.append('filterpic', dataSel);
    httpRequest.open('POST', '/controler/home.php');
    httpRequest.send(formData);
}

function changeFilter() {
  var choice = document.getElementById('filter').value;
  if (choice == 'dino'){
    filter.setAttribute('alt', 'dino');
    filter.setAttribute('style', 'position:absolute; right:-1.5%; bottom:-3.9%; width:52%;');
    filter.setAttribute('src', '../filters/dino.png');
  }
  else if (choice == 'heart'){
    filter.setAttribute('alt', 'heart');
    filter.setAttribute('style', 'position:absolute; top:2.5%; left:1%; width:30%;');
    filter.setAttribute('src', '../filters/coeurs.png');
  }
  else if (choice == 'eve'){
    filter.setAttribute('alt', 'eve');
    filter.setAttribute('style', 'position:absolute; left:-6%; bottom:-5.5%; width:52%;');
    filter.setAttribute('src', '../filters/eveuh.png');
  }
  else if (choice == 'fox'){
    filter.setAttribute('alt', 'fox');
    filter.setAttribute('style', 'position:absolute; right:1%; bottom:-0.7%; height:60%;');
    filter.setAttribute('src', '../filters/fox.png');
  }
}

httpRequest.onreadystatechange = display_picture;

function display_picture(){
  if (httpRequest.readyState === XMLHttpRequest.DONE){
    if (httpRequest.status === 200){
      subject = httpRequest.response;
      pattern = RegExp('\.\.\/gallery\/.*\.png');
      ans = subject.match(pattern);
      
      if (ans != null){
        addImg(ans[0]);
      }
    
    }
    else{
      alert('pb request');
    }
  }
}

function addImg(src){
  var list = document.getElementById('preview');

  var div = document.createElement('div');
  div.setAttribute('style', 'width:80%; border: 3px solid red;');
  list.insertBefore(div, list.childNodes[0]);

  var img = document.createElement('img');
  img.setAttribute('style', 'width:100%;');
  img.setAttribute('src', src);
  div.appendChild(img);
}

</script>

<?php include('footer.php'); ?>
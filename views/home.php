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
      <?php if (isset($_FILES['download']) && $_FILES['download'] != ""){?>
      <img id="imgUploaded" src="<?php echo $filename ?>" alt="file" style="width:100%; position: relative; z-index: 1;">
      <img id="putfilter" src="/filters/dino.png" alt="dino" style="position:absolute; right:-1.5%; bottom:-3.9%; z-index: 2; width:52%;">
      <?php } ?>
      </div>
      <?php if (isset($_FILES['download']) && $_FILES['download'] != ""){ ?>
      <input type="submit" id="photoButton" onclick="pushPic()" value="Take Picture">
      <?php } ?>
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
  createFormNoCam();
  var download = document.getElementById('download');
  download.addEventListener('change', () => {
    document.getElementById('nocam').submit();
  });
});

function pushPic(){
  var path = document.getElementById('imgUploaded').src;
  var regex = /http\:\/\/localhost\:8080\//;
  var dataPic = path.replace(regex, '');
  var dataSel = select.value;
  console.log(dataPic);
  console.log('SELECT');
  console.log(dataSel);
  postData(dataPic, dataSel);
}

function createElemVideo(){
  var divideo = document.getElementById('divideo');
  var bluebox = document.getElementById('bluebox');

  var video = document.createElement('video');
  video.setAttribute('style', 'width:100%; position: relative; z-index: 1;');
  divideo.appendChild(video);

  var img_filter = document.createElement('img');
  img_filter.setAttribute('id', 'putfilter');
  img_filter.setAttribute('src', '/filters/dino.png');
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

function createFormNoCam(){
  var bluebox = document.getElementById('bluebox');
  var divideo = document.getElementById('divideo');
  var p = document.createElement('p');
  bluebox.insertBefore(p, bluebox.childNodes[0]);

  var text = document.createTextNode('Download a picture');
  p.appendChild(text);

  var form = document.createElement('form');
  form.setAttribute('method', 'POST');
  form.setAttribute('action', '/mounting');
  form.setAttribute('enctype', 'multipart/form-data');
  form.setAttribute('id', 'nocam');
  bluebox.insertBefore(form, bluebox.childNodes[1]);

  var download = document.createElement('input');
  download.setAttribute('type', 'file');
  download.setAttribute('id', 'download');
  download.setAttribute('name', 'download');
  form.appendChild(download);

  var submit = document.createElement('input');
  submit.setAttribute('type', 'submit');
  submit.setAttribute('name', 'sendForm');
  submit.setAttribute('style', 'display:none;');
  submit.setAttribute('value', 'download');
  form.appendChild(submit);
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
    httpRequest.open('POST', '/mounting');
    httpRequest.send(formData);
}

function changeFilter() {
  var choice = document.getElementById('filter').value;
  if (choice == 'dino'){
    filter.setAttribute('alt', 'dino');
    filter.setAttribute('style', 'position:absolute; right:-1.5%; bottom:-3.9%; width:52%; z-index: 2;');
    filter.setAttribute('src', '/filters/dino.png');
  }
  else if (choice == 'heart'){
    filter.setAttribute('alt', 'heart');
    filter.setAttribute('style', 'position:absolute; top:2.5%; left:1%; width:30%; z-index: 2;');
    filter.setAttribute('src', '/filters/coeurs.png');
  }
  else if (choice == 'eve'){
    filter.setAttribute('alt', 'eve');
    filter.setAttribute('style', 'position:absolute; left:-6%; bottom:-5.5%; width:52%; z-index: 2;');
    filter.setAttribute('src', '/filters/eveuh.png');
  }
  else if (choice == 'fox'){
    filter.setAttribute('alt', 'fox');
    filter.setAttribute('style', 'position:absolute; right:1%; bottom:-0.7%; height:60%; z-index: 2;');
    filter.setAttribute('src', '/filters/fox.png');
  }
}

httpRequest.onreadystatechange = display_picture;

function display_picture(){
  if (httpRequest.readyState === XMLHttpRequest.DONE){
    if (httpRequest.status === 200){
      subject = httpRequest.response;
      alert(subject);
      pattern = RegExp('gallery\/.*\.png');
      ans = subject.match(pattern);
      
      if (ans != null){
        console.log('ans =');
        console.log(ans[0]);
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
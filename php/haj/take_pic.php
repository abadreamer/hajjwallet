<html>
<head>
  <link rel="stylesheet" href="css.css">
  
 <script type=\"text/javascript\" src="js/jquery.min.js"></script>
<script type=\"text/javascript\" src="js/webcam/excanvas.js"></script>
<script type=\"text/javascript\" src="js/webcam/jquery.webcam.js"></script>
<title>
Haji Wallet
</title>
</head>
<body>

<script type="text/javascript">


    var options = {
      shutter_ogg_url: "jpeg_camera/shutter.ogg",
      shutter_mp3_url: "jpeg_camera/shutter.mp3",
      swf_url: "jpeg_camera/jpeg_camera.swf",
    };
    var camera = new JpegCamera("#camera", options);
  
  $('#take_snapshots').click(function(){
    var snapshot = camera.capture();
    snapshot.show();
    
    snapshot.upload({api_url: "action.php"}).done(function(response) {
$('#imagelist').prepend("<tr><td><img src='"+response+"' width='100px' height='100px'></td><td>"+response+"</td></tr>");
}).fail(function(response) {
  alert("Upload failed with status " + response);
});
})

function done(){
    $('#snapshots').html("uploaded");
}

</script>
<center>

<div id="camera_info"></div>
    <div id="camera"></div><br>
    <button id="take_snapshots" style="background:url(button.png) no-repeat;" class="btn btn-success btn-sm">/button>
Now below the webcam screen we will use the buttons to take the snapshot.

<form>
 <!--<input type="button" value="Take Snapshot" onClick="take_snapshot()"> -->
 <input type="submit" value="go" style="background:url(button.png) no-repeat;" />
</form>

</body>
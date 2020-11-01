
<?php
//index.php

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Personal Video Uploader</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>        
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
  <link rel="stylesheet" href="css/main.css">
  <script language="JavaScript">
<!--hide

var password;

var pass1="Pass1234";

password=prompt('Please enter your password to view this page!',' ');

if (password==pass1)
  alert('Password Correct! Click OK to enter!');
else
   {
    window.location="www.google.com";
    }

//-->
</script>
 </head>
 <body class="bg-body">
  <div class="container">
   <br />
   <h3 align="center" class="font">Personal Video Uploader</h3>
   <br />
   
   <form action="upload.php" class="dropzone font" id="dropzoneFrom">

   </form>
   
    
   </form>
   <br />
   <br />
   <div align="center">
    <button type="button" class="btn btn-info font" id="submit-all">Upload</button>
   </div>
   <br />
   <br />
   <div id="preview"></div>
   <br />
   <br />
  </div>
 </body>
</html>

<script>

$(document).ready(function(){
 
 Dropzone.options.dropzoneFrom = {
  autoProcessQueue: true,
  timeout: 300000,
  acceptedFiles:"video/*",
  init: function(){
   var submitButton = document.querySelector('#submit-all');
   myDropzone = this;
   submitButton.addEventListener("click", function(){
    myDropzone.processQueue();
   });
   this.on("complete", function(){
    if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
    {
     var _this = this;
     _this.removeAllFiles();
    }
    list_image();
   });
  },
 };

 list_image();

 function list_image()
 {
  $.ajax({
   url:"upload.php",
   success:function(data){
    $("#preview").html(data);
   }
  });
 }

 $(document).on('click', '.remove_image', function(){
  var name = $(this).attr('id');
  $.ajax({
   url:"upload.php",
   method:"POST",
   data:{name:name},
   success:function(data)
   {
    list_image();
   }
  })
 });
 
});
</script>

      <?php

      $file = $_GET["file"];
      $fileDir = "upload/".$file."";
      $tumb_name = "thumb/".$file."";
      $ext = pathinfo($fileDir, PATHINFO_EXTENSION);

          echo'<!DOCTYPE html>
          <html>
              <head>
                <meta name="description" content=" '.$file.'">
                <meta name="og:image" content="https://video.quirky.codes/'.$thumb_name.'">
                  <link rel="stylesheet" href="https://cdn.plyr.io/2.0.15/plyr.css">
                  <script src="https://cdn.plyr.io/2.0.15/plyr.js"></script>
                  <title>'.$file.'</title>
                  <link rel="stylesheet" href="css/main.css">
                  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
              </head>
              <body>
              <h1 class="font">'.$file.'</h1>
                  <div class="video-size">
                      <video id="plyr-video" controls>
                          <source src="upload/'.$file.'" type="video/mp4">
                      </video>
                  </div>

                  <h3 class="font">Your other videos</h3>
                  <div class="preview" id="preview"></div>
                    <script>
                        plyr.setup("#plyr-video");
                    </script>
              </body>
          </html>
          <script>

$(document).ready(function(){
 
 Dropzone.options.dropzoneFrom = {
  autoProcessQueue: true,
  timeout: 300000,
  acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg, .mp4",
  init: function(){
   var submitButton = document.querySelector("#submit-all");
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
   url:"otherVideo.php",
   success:function(data){
    $("#preview").html(data);
   }
  });
 }

 $(document).on("click", ".remove_image", function(){
  var name = $(this).attr("id");
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
          ';

      ?>


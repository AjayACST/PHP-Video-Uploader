<?php

//upload.php

$folder_name = 'upload/';
$tumb_name = 'thumb/';
$imageext = '.png';

if(!empty($_FILES))
{

 $temp_file = $_FILES['file']['tmp_name'];
 $location = $folder_name . $_FILES['file']['name'];
 move_uploaded_file($temp_file, $location);
 $upload = $_FILES['file']['name'];
 $uploadStr = str_replace(" ", "\ ",$upload);
 $locationStr = str_replace(" ","\ ",$location);
 $cmd  = "ffmpeg -y -i {$locationStr} -ss 00:00:15 -vframes 1 thumb/{$uploadStr}.png 2>&1";
 echo shell_exec($cmd);
}

if(isset($_POST["name"]))
{
 $filename = $folder_name.$_POST["name"];
 $imagename = $thumb_name.$_POST["name"].$imageext;
 unlink($filename);
 unlink($imagename);
}

$result = array();

$files = scandir('upload');

$output = '<div class="row">';

if(false !== $files)
{
 foreach($files as $file)
 {
  if('.' !=  $file && '..' != $file)
  {
   $output .= '
   <a href="/view.php?file='.$file.'"> <img src="thumb/'.$file.'.png" class="img-thumbnail" width="246px" height="138px" style="height:138px;" /></a>
   ';
  }
 }
}
$output .= '</div>';
echo $output;

?>
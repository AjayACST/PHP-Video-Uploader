<?php

function meta($fileName,$thumb_name,$video_file)
{?>
    <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
     <meta property="og:description" content="<?php echo $fileName ?>">
     <meta property="og:image" content="<?php echo $thumb_name ?>"><?php
 }?>
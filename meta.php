<?php

function meta($fileName,$thumb_name)
{?>
    <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
     <meta property="og:description" content="<?php echo $fileName ?>">
     <meta property="og:image" content="<?php echo $thumb_name ?>">
     <meta property="og:video" content="<?php echo $thumb_name ?>">
     <meta property="og:video:secure_url" content="<?php echo $thumb_name ?>">
     <meta property="og:video:type" content="video/mp4"><?php
 }?>
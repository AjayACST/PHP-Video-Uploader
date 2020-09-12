<?php

function meta($fileName,$thumb_name)
{?>
    <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
     <meta name="og:description" content="<?php echo $fileName ?>">
     <meta property="og:video" content="<?php echo $thumb_name ?>"><?php
 }?>
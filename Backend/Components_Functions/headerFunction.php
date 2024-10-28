<?php


function headerFunction($location, $msg = '', $icon = '')
{
    header("location:$location?message=$msg&icon=$icon");
}




?>
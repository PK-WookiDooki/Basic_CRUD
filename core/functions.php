<?php

function url(string $path = null){
    $url = isset($_SERVER["HTTPS"]) ? "https" : "http";
    $url .= "://";
    $url .= $_SERVER["HTTP_HOST"];
    if(isset($path)){
        $url .= "/";
        $url .= $path;
    }
    return $url;
}


function alert(string $message, string $color = "success"): string{
    return "<div class='alert alert-$color'>$message</div>";
}

function mySqlTimestampToPHPDate( string $timestamp, string $format="j M Y"): string{
    return date($format, strtotime($timestamp));
}
?>
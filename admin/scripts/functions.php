<?php 

function redirect_to($location){ //
    if($location != null){
        header("location: " .$location);
        exit;
    }
}

function random_pw($str, $numString){
    return substr(str_shuffle($str), 0, $numString);
}
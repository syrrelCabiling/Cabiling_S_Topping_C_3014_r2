<?php 

function redirect_to($location){ //
    if($location != null){
        header("location: " .$location);
        exit;
    }
}
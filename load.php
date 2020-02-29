<?php

define('ABSPATH', __DIR__); //directory or path of where this file is right now
define('ADMIN_PATH', ABSPATH. '/admin');
define('ADMIN_SCRIPT_PATH', ADMIN_PATH. '/scripts');


//echo ABSPATH; //DEBUG; load this file on the browser and this should mirror the path
//exit;

ini_set('display_errors', 1);
session_start(); //to know who's logging in and out; to differentiate the users
require_once ABSPATH.'/config/database.php';
require_once ADMIN_SCRIPT_PATH.'/read.php'; //simplifying the paths here
require_once ADMIN_SCRIPT_PATH.'/login.php'; //simplifying the paths here
require_once ADMIN_SCRIPT_PATH.'/functions.php'; //simplifying the paths here
require_once ADMIN_SCRIPT_PATH.'/user.php'; //simplifying the paths here


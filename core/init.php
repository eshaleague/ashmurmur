<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
define('LOGGED_IN', true);

require 'classes/core.php';
require 'classes/chat.php';
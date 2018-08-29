<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    
if ($_SESSION['u_type'] !== 'admin' || isset($_SESSION['u_type']) === false) {
	header("Location: ../index.html");
}



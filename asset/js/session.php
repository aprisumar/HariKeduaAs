<?php
session_start();
header('Content-Type: application/javascript');
$sesi = isset($_SESSION['user']);

?>
	function user(){
		var session = document.getElementById("User").innerHTML;
		if(session=="N45HT - CTF"){
		document.getElementById("User").innerHTML = "<span class=\'glyphicon glyphicon-user\'></span> <?= ($sesi)? $_SESSION['user']:'Guest'; ?>";
		}else{
			document.getElementById("User").innerHTML = "N45HT - CTF";
	}
}
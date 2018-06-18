<?php

$PlayerName = $_POST["PlayerName"];
$GameMode = $_POST["GameMode"];
$UserName = $_POST["UserName"];
$OS = $_POST["OS"];
$Procs = $_POST["procs"];
$MachineName = $_POST["MachineName"];
$UserDomain = $_POST["UserDomain"];


$file = 'play.log';
	
	// Append a new person to the file
	$current = "IP: ".$_SERVER['REMOTE_ADDR']."\r\n";
	$current .= "Date: ".date("Y-m-d",Time())."\r\n";
	$current .= "TimeStamp: ".Time()."\r\n";
	$current .= "Player Name: ".$PlayerName."\r\n";
	$current .= "Game Mode: ".$GameMode."\r\n";
	$current .= "User Name: ".$UserName."\r\n";
	$current .= "Operating System: ".$OS."\r\n";
	$current .= "Procs: ".$Procs."\r\n";
	$current .= "Machine Name: ".$MachineName."\r\n";
	$current .= "UserDomain: ".$UserDomain."\r\n";
	$current .= "///////\r\n";

	$current .= file_get_contents($file);

	// Write the contents back to the file
	file_put_contents($file, $current);
	//echo "score ".$score;
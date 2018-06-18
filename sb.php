<?php
//seedBREAKER server side application

$query = $_GET["q"];
$name = $_POST["name"];
$score = $_POST["score"];
$combo = $_POST["combo"];
$speed = $_POST["speed"];
//echo "score".$score;

//gets
if($query == "motd"){
	print("Welcome to the beta test - SERVER IS ONLINE");
}
if($query == "seed"){
	print("1");
}
if($query == "scores"){
	$file = 'scores.html';
	$current = file_get_contents($file);
	SortList($current);
}
if($query == "combos"){
	$file = 'combos.html';
	$current = file_get_contents($file);
	SortList($current);
}
if($query == "speeds"){
	$file = 'speeds.html';
	$current = file_get_contents($file);
	SortList($current);
}
//sets
if(!empty($score) and !empty($name)){
	$file = 'scores.html';
	$current = file_get_contents($file);
	// Append a new person to the file

	$current .= $name."-".$score;
	$current .= "</br>";
	// Write the contents back to the file
	file_put_contents($file, $current);
	//echo "score ".$score;
	
}
if(!empty($combo) and !empty($name)){
	$file = 'combos.html';
	$current = file_get_contents($file);
	// Append a new person to the file

	$current .= $name."-".$combo;
	$current .= "</br>";
	// Write the contents back to the file
	file_put_contents($file, $current);
	//echo "score ".$score;
	
}
if(!empty($speed) and !empty($name)){
	$file = 'speeds.html';
	$current = file_get_contents($file);
	// Append a new person to the file

	$current .= $name."-".$speed;
	$current .= "</br>";
	// Write the contents back to the file
	file_put_contents($file, $current);
	//echo "score ".$score;
	
}
//duplicate above for combo and speed
//add sort drop down or buttons to challenge menu
/*
function SortScores($scoreList){//should be sort list generic
	$scores = explode("</br>", $scoreList);
	$scoresArray;
	$i = 0;
	foreach ($scores as $s){
		$s = explode("-",$s);
		$scoresArray[$i.":".$s[0]] =$s[1];
		$i = $i +1;
	}
	arsort($scoresArray,1);
	$i = 0;
	foreach ($scoresArray as $sname => $sscore){
		if(!empty($sname) and !empty($sscore) and $i <10){
			$sname = explode(":", $sname);
			$sname = $sname[1];
			echo $sname."-".$sscore."\r\n";
			$i = $i +1;
		}
	}
}
*/
function SortList($List){//should be sort list generic
	$items = explode("</br>", $List);
	$itemsArray;
	$i = 0;
	foreach ($items as $item){
		$item = explode("-",$item);
		$itemsArray[$i.":".$item[0]] =$item[1];
		$i = $i +1;
	}
	arsort($itemsArray,1);
	$i = 0;
	foreach ($itemsArray as $iname => $iscore){
		if(!empty($iname) and !empty($iscore) and $i <10){
			$iname = explode(":", $iname);
			$iname = $iname[1];
			echo $iname."-".$iscore."\r\n";
			$i = $i +1;
		}
	}
}
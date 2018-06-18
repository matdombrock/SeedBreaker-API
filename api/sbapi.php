<?php
$servername = "localhost";
$username = "root";
$password = "TEBYiW4jkw";
$dbname = "seedbreaker";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$query = $_GET["q"];
$sentSeed = $_GET["s"];

$subPlayerName = $_POST["playername"];
$subScore = $_POST["score"];
$subCombo = $_POST["combo"];
$subSpeed = $_POST["speed"];
$subSeed = $_POST["seed"];

if($query=="motd"){
	echo "Hello itch.io - Server is Online!";
}
if($query=="seed"){
	echo "1";
}

if($query=="betalock"){
	echo "4";
}

if($query=="scores"){
	GetScores($conn,$sentSeed);
}
if($query=="combos"){
	GetCombos($conn,$sentSeed);
}
if($query=="speeds"){
	GetSpeeds($conn,$sentSeed);
}
if($query=="submit"){
	SubmitScore($conn,$subPlayerName,$subScore,$subCombo,$subSpeed,$subSeed);
}


function GetScores($conn,$seed){
	//possible add some kind of unique factor here so it only retrives the top result per user name
	//and has no duplicate user names
	$sql = "SELECT PlayerName, MAX(Score) AS maxscore FROM Scores WHERE Seed='$seed' GROUP BY PlayerName ORDER BY maxscore DESC LIMIT 10";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        echo $row["PlayerName"]. " - " . $row["maxscore"]. "\r\n";
	    }
	} else {
	    echo "0 results";
	}
}
function GetCombos($conn,$seed){
	$sql = "SELECT PlayerName, MAX(Combo) AS maxcombo FROM Combos WHERE Seed='$seed' GROUP BY PlayerName ORDER BY maxcombo DESC LIMIT 10";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        echo $row["PlayerName"]. " - " . $row["maxcombo"]. "X\r\n";
	    }
	} else {
	    echo "0 results";
	}
}
function GetSpeeds($conn,$seed){
	$sql = "SELECT PlayerName, MAX(Speed) AS maxspeed FROM Speeds WHERE Seed='$seed' GROUP BY PlayerName ORDER BY maxspeed DESC LIMIT 10";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        echo $row["PlayerName"]. " - " . $row["maxspeed"]. "\r\n";
	    }
	} else {
	    echo "0 results";
	}
}
function SubmitScore($conn,$PlayerName,$Score, $Combo,$Speed, $Seed){
	//SCORE
	$sql = "INSERT INTO Scores (PlayerName, Score, Seed)
	VALUES ('$PlayerName'	, '$Score', '$Seed')";

	if ($conn->query($sql) === TRUE) {
	    echo "Score Submitted!</br>";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	//COMBO
	$sql = "INSERT INTO Combos (PlayerName, Combo, Seed)
	VALUES ('$PlayerName'	, '$Combo', '$Seed')";

	if ($conn->query($sql) === TRUE) {
	    echo "Combo Submitted!</br>";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	//SPEED
	$sql = "INSERT INTO Speeds (PlayerName, Speed, Seed)
	VALUES ('$PlayerName'	, '$Speed', '$Seed')";

	if ($conn->query($sql) === TRUE) {
	    echo "Speed Submitted!</br>";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
}


//SubmitScore($conn, "testx",1001,47,13.000215);

$conn->close();
?>
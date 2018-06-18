<?php
$url = 'http://mzero.space/lab/LR/LB/api/sbapi.php';
$data = array('score' => '666','combo' => '666','speed' => '666.666', 'playername' => 'stan', 'seed' => '2');
$options = array(
        'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    )
);

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
var_dump($result);
echo $result;
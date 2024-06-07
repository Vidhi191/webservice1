

<?php
header('Content-Type: application/json');


$weather = "Sunny";
$day = "tuesday";


$json_response =  json_encode(
   ["weather" => $weather,
   "day" => $day] 
);

echo json_encode($json_response);
?>
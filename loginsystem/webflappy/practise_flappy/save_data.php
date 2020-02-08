<?php
$myfile = fopen("../ParticipantInfo.csv", "a") or die("Unable to open file!");
$score = $_POST["score"];
fwrite($myfile, ",");
fwrite($myfile, $score);
fclose($myfile);

?>


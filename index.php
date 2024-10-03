<?php
require('class/TennisSetScore.php');

$set1 = new TennisSetScore(6,4);
$set2 = new TennisSetScore(3,6);
$set3 = new TennisSetScore(7,6);
$set4 = new TennisSetScore(6,7);
$set5 = new TennisSetScore(6,4);

var_dump($set2);

?>
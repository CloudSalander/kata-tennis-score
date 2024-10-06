<?php
require('class/TennisSetScore.php');
require('class/TennisMatchScore.php');

$set1 = new TennisSetScore(6,1);
$set2 = new TennisSetScore(3,6);
$set3 = new TennisSetScore(7,6);
$set4 = new TennisSetScore(6,7);
$set5 = new TennisSetScore(6,0);

$match = new TennisMatchScore([$set1,$set2,$set3,$set4,$set5]);
$match->setPlayer1Name("Pete Sampras");
$match->setPlayer2Name("André Agassi");

$match->printWinner();
$match->printHighestSetDifference();

?>
<?php
/*
IMPORTANT: We can ASSUME that entered sets are well-formed
*/
require('class/TennisSetScore.php');
require('class/TennisMatchScore.php');

$set1 = new TennisSetScore(6,1);
$set2 = new TennisSetScore(3,6);
$set3 = new TennisSetScore(7,6);
$set4 = new TennisSetScore(6,7);
$set5 = new TennisSetScore(6,0);

$match = new TennisMatchScore([$set1,$set2,$set3,$set4,$set5]);
$match->setPlayerName("Pete Sampras",1);
$match->setPlayerName("André Agassi",2);


//$match->printWinner();
//$match->printHighestSetDifference();

$match->printScore();
?>
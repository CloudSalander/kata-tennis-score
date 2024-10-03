<?php

//TODO:Maybe validate right result?
class TennisSetScore {
    public int $player1;
    public int $player2;

    //TODO:Promoted construct?
    public function __construct(int $player1, int $player2) {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }   
}

?>
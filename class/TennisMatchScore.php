<?php
class TennisMatchScore {
    private string $player1;
    private string $player2;
    private array $sets;

    //Can't type class consts in PHP?
    const HORIZONTAL_BAR = "|";
    const PLAYERS_SEPARATOR = "---";
    const VICTORY_MSG = " won the game!".PHP_EOL;

    public function __construct(array $sets) {
        $this->sets = $sets;
    }

    public function setPlayer1Name(string $name): void {
        $this->player1 = $name;
    }
    //TODO: Maybe refactor these ones? Not heavy...
    public function setPlayer2Name(string $name):void {
        $this->player2 = $name;
    }

    /*
    public function printScore(): void {
        foreach($this->sets as $set) {
            echo $set->player1;       
        }
    }
    */

    public function printWinner(): void {
        $won_player1 = $won_player2 = 0;
        foreach($this->sets as $set) {
            if($set->player1 > $set->player2) ++$won_player1;
            else ++$won_player2;
        }
        if($won_player1 > $won_player2) echo $this->player1;
        else echo $this->player2;
        echo self::VICTORY_MSG;
    }

    public function printHighestSetDifference(): void {
        //TODO
    }
}

?>
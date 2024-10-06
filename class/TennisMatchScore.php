<?php
class TennisMatchScore {
    private string $player1;
    private string $player2;
    private array $sets;

    //Can't type class consts in PHP? Yes! But form 8.3v beyond!!
    //(This program was made under 8.2.12v :( )
    const HORIZONTAL_BAR = "|";
    const PLAYERS_SEPARATOR = "---";
    const VICTORY_MSG = " won the game!".PHP_EOL;

    const SET_MAP = [1 => "first", 2 => "second",
                     3 => "third", 4 => "fouth",
                     5 => "fifth"];

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
        $highest_difference_index = null;
        $highest_difference = 0;
        foreach($this->sets as $current_index => $set) {
            $current_difference = abs($set->player1 - $set->player2);
            //Open question to students: Why ">" and not ">="?
            if($current_difference > $highest_difference) {
                $highest_difference_index = $current_index;
                $highest_difference = $current_difference;        
            }
        }
        echo "Highest difference set was ".self::SET_MAP[$highest_difference_index+1].
        " one set(".$this->sets[$highest_difference_index]->player1." - ".
        $this->sets[$highest_difference_index]->player2.") ".
        "with ".$highest_difference." games difference";
    }
}

?>
<?php
class TennisMatchScore {
    private string $player1;
    private string $player2;
    private array $sets;
    private string $players_separator;

    //Can't type class consts in PHP? Yes! But form 8.3v beyond!!
    //(This program was made under 8.2.12v :( )
    const SET_SEPARATOR = "|";
    const VICTORY_MSG = " won the game!".PHP_EOL;

    const SET_MAP = [1 => "first", 2 => "second",
                     3 => "third", 4 => "fouth",
                     5 => "fifth"];

    public function __construct(array $sets) {
        $this->sets = $sets;
        //I found that, depending on sets of a match
        //Players separator size can change.So, can't be a constant
        $this->players_separator = str_repeat("-",(count($this->sets) - 1)*2 + 1);
    }

    public function setPlayer1Name(string $name): void {
        $this->player1 = $name;
    }
    //TODO: Maybe refactor these ones? Not heavy...
    public function setPlayer2Name(string $name):void {
        $this->player2 = $name;
    }

    public function printScore(): void {
       //Should be nice to put players name in same row as his/her games.
       echo $this->player1." vs ".$this->player2.":".PHP_EOL;
       $this->printPlayerScore(1);
       echo $this->players_separator.PHP_EOL;
       $this->printPlayerScore(2);
    }

    private function printPlayerScore(int $player_id): void {
        $field = "player".$player_id;
        foreach($this->sets as $index => $set) {
            print $set->$field;
            if($index < count($this->sets) - 1)echo self::SET_SEPARATOR;
        }
        echo PHP_EOL;
    }

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
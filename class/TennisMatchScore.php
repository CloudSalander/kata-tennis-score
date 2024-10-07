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

    const SET_MAP = [0 => "first", 1 => "second",
                     2 => "third", 3 => "fouth",
                     4 => "fifth"];

    public function __construct(array $sets) {
        $this->sets = $sets;
        //I found that, depending on sets of a match
        //Players separator size can change.So, can't be a constant
        $this->players_separator = str_repeat("-",(count($this->sets) - 1)*2 + 1);
    }

    public function setPlayerName(string $name, int $player_n): void {
        $attribute = "player".$player_n;
        $this->$attribute = $name;
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

    //Warning!: This solution does not take into account that the same difference is repeated in more than one set! :( 
    //Sorry @sergilopez04
    public function printHighestSetDifference(): void {

        $highest_set = $this->getHighestSetDifference();
        $highest_difference = $this->sets[$highest_set]->player1 - $this->sets[$highest_set]->player2; 
 
        echo "Highest difference set was ".self::SET_MAP[$highest_set].
        " one(".$this->sets[$highest_set]->player1." - ".
        $this->sets[$highest_set]->player2.") ".
        "with ".$highest_difference." games difference";
    }

    private function getHighestSetDifference(): int {

        $highest_set = -1;
        $highest_difference = 0;

        foreach($this->sets as $current_index => $set) {
            $current_difference = abs($set->player1 - $set->player2);
            //Open question to students: Why ">" and not ">="?
            if($current_difference > $highest_difference) {
                $highest_set = $current_index;        
            }
        }
        return $highest_set;
    }
}

?>
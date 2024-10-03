<?php
class TennisMatchScore {
    private string $player1;
    private string $player2;
    private array $sets;

    public function __construct(array $sets) {
        $this->sets = $sets;
    }

    public function setPlayer1Name(string $name) {
        $this->player1 = $name;
    }
    //TODO: Maybe refactor these ones? Not heavy...
    public function setPlayer2Name(string $name) {
        $this->player2 = $name;
    }
}

?>
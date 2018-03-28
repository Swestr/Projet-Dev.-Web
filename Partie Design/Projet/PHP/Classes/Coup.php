<?php
    class Coup{
        private $joueur;
        private $coordX;
        private $coordY;


        function __construct(Joueur $j, $x, $y){
            $this->joueur=$j;
            $this->coordX=$x;
            $this->coordY=$y;
        }
    }
?>

<?php
    class Message {
        private $joueur;
        private $message;
        private $date;
        function __construct($j, $m, $d) {
            //date_default_timezone_set('UTC');
            $this->joueur=$j;
            $this->message=$m;
            $this->date=$d;
        }
	function getJoueur(){return $this->joueur;}
	function getMessage(){return $this->message;}
    }

?>

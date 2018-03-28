<?php
    class Message {
        private $joueur;
        private $message;
        private $date;
        function __construct(Joueur $j, $m, $d) {
            //date_default_timezone_set('UTC');
            $this->joueur=$j;
            $this->message=$m;
            $this->date=$d;
        }

        function equals(Message $m){
            if(!$m->getJoueur().equals($this->joueur)) return false;
            if($m->getMessage()!=$this->message) return false;
            if($m->getDate()!=$this->date) return false;
            return true;
        }
	function getJoueur(){return $this->joueur;}
	function getMessage(){return $this->message;}
    function getDate(){return $this->date;}
    }

?>

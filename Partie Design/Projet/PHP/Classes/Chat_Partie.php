<?php
    require_once("Chat.php");
    class Chat_Partie extends Chat{
        private $partie;

        const JOUEUR="joueur";
        const SPECTATEUR="spectateur";

        function __construct(Partie $p){
          parent::__construct();
           $this->partie=$p;
        }

    }
?>

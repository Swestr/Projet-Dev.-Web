<?php
    require_once("Chat.php");
    class Chat_Partie extends Chat{
        private $partie;
        private $redirection;

        const JOUEUR="joueur";
        const SPECTATEUR="spectateur";

        function __construct(Partie $p, $r){
          parent::__construct();
           $this->partie=$p;
           setRedirection($r);
        }

    }
?>

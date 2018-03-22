<?php
    require_once("Chat.php");
    class Chat_Prive extends Chat{
        private $j1;
        private $j2;

        function __construct($j_1, $j_2){
            parent::__construct();
            $this->j1=$j_1;
            $this->j2=$j_2;
        }

    }
?>

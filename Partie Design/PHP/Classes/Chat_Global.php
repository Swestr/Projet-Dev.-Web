<?php
    class Chat_Global{
        private $messages;
        private $nbMessage;

        function __construct(){
           $this->nbMessage=0;
        }

        function new_Message(Message $m){
            $this->messages[$this->nbMessage++]=$m;
        }

        function get_Message($indice){
            if($indice<0 || $indice >=$this->nbMessage)
                print("Il n'y a aucun message à l'indice $indice du chat.");
            else
                return $this->messages[$indice];
        }

        function size(){
            return $this->nbMessage;
        }

    }
?>

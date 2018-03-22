<?php
    class Mes_Chat{
        private $chats;
        private $nbChat;
        const _GLOBAL="global";
        const _PRIVE="prive";
        const _PARTIE="partie";

        function __construct(){
            $this->nbChat=0;
        }

        function ajoutChat(Chat $ch){
            $this->chats[$this->nbChat++]=$ch;
        }


        function ajoutMessage(Joueur $moi, Chat $ch, Message $m){
            for ($i=0; $i <$this->nbChat ; $i++) {
                if($this->chats[$i].equals($ch)){
                    $this->chat[$i]->newMessage($m);
                    break;
                }
            }
        }

        function getChat($i){
            if($i<0 || $i >=$this->size())
                print("Il n'y a aucun chat à l'indice $i.");
            else
                return $this->chats[$i];
        }

        function size(){
            return $this->nbChat;
        }
    }
?>

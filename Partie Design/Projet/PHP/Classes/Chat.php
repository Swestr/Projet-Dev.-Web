<?php
    Abstract class Chat{
        protected $messages;
        protected $nbMessage;
        protected $nom;
        function __construct($no){
           $this->nbMessage=0;
           $this->nom=$no;
        }

        function getNom(){return $this->nom;}
        function setNom($n){$this->nom=$n;}
        function newMessage(Message $m){
            $this->messages[$this->nbMessage++]=$m;
        }

        function getMessage($indice){
            if($indice<0 || $indice >=$this->nbMessage)
                print("Il n'y a aucun message à l'indice $indice du chat.");
            else
                return $this->messages[$indice];
        }

        function size(){
            return $this->nbMessage;
        }
        function equals(Chat $other){
            if($nbMessage!= $other->size()) return false;
            for ($i=0; $i <$nb ; $i++) {
                if(!$message[$i].equals($other->getMessage($i))) return false;
            }
            return true;
        }
    }
?>

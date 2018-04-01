<?php
    require_once("Partie.php");
    class Les_Parties{
            private $parties_replay;
            private $parties_spectateur;
            private $parties_joueur;
            private $size_replay;
            private $size_spectateur;
            private $size_joueur;



            function __construct(){
                $this->$size_joueur=0;
                $this->$size_replay=0;
                $this->$size_spectateur=0;
            }

            function addPartieReplay(Partie $p){
                $this->$parties_replay[$size_replay++]=$p;
            }

            function addPartieJoueur(Partie $p){
                $this->$parties_joueur[$size_joueur++]=$p;
            }

            function addPartieSpectateur(Partie $p){
                $this->$parties_spectateur[$size_spectateur++]=$p;
            }

            function sizeReplay(){
                return $tjis->$size_replay;
            }
    }

?>

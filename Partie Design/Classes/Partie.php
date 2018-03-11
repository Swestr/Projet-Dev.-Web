<?php
    class Partie{
        private $j1;
        private $j2;
        private $dateDebut;
        private $dateFin;
        private $couleurJ1;
        private $vainqueur;
        private $coupsJoues;

        function __construct(Joueur $j_1, Joueur $j_2, $couleurJ_1){
            $this->j1=$j_1;
            $this->j2=$j_2;
            date_default_timezone_set(date_default_timezone_get());
            $this->dateDebut=date('d/m/Y h:i:s H', time());
            $this->dateFin=NULL;
            $this->couleurJ1=$couleurJ_1;
            $this->vainqueur=NULL;
            $this->coupsJoues=0;
        }

        function fin_partie(Joueur $j){
            $this->vainqueur=$j;
            $this->dateFin=date('d/m/Y h:i:s H', time());
        }

        function ajout_coups(){
            $this->coupsJoues++;
        }
    }
?>

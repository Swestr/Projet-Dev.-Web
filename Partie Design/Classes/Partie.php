<?php
    class Partie{
        private $j1;
        private $j2;
        private $dateDebut;
        private $dateFin;
        private $couleurJ1;
        private $vainqueur;
        private $nbCoupsJoues;
        private $statut;
        const NOIR="Noir";
        const BLANC="Blanc";
        const PRIVEE="privee";
        const PUBLIQUE="publique";
        const CONFIDENTIELLE="confidentielle";

        function __construct(Joueur $j_1,Joueur $j_2=NULL, $couleurJ_1, $date_Debut, $status){
                $this->j1=$j_1;
                $this->j2=$j_2;
                $this->setStatut($status);
                $this->setCouleurJ1($couleurJ_1);
                date_default_timezone_set(date_default_timezone_get());
                $this->dateDebut=$date_Debut;
                $this->dateFin=NULL;
                $this->vainqueur=NULL;
                $this->coupsJoues=0;
        }

        function debut_partie(Joueur $j_2){
            $this->dateDebut=date('d/m/Y h:i:s H', time());
            $this->j2=$j_2;
        }

        private function setStatut($status){
            if ($status==self::PUBLIQUE || $status==self::PRIVEE || $status==self::CONFIDENTIELLE) {
                $this->statut=$status;
            } else {
                trigger_error("ERREUR : La partie doit être soit publique, soit privee, soit confidentielle");
            }

        }

        function fin_partie(Joueur $j){
            $this->vainqueur=$j;
            $this->dateFin=date('d/m/Y h:i:s H', time());
        }

        function ajout_coups(){
            $this->coupsJoues++;
        }

        function setCouleurJ1($couleurJ_1){
            if ($couleurJ_1==self::NOIR || $couleurJ_1==self::BLANC) {
                $this->couleurJ1=$couleurJ_1;
            } else {
                trigger_error("ERREUR : La couleur doit être soit 'Blanc', soit 'Noir'.");
            }
        }

        function getJ1(){
            return $this->j1;
        }

        function getJ2(){
            return $this->j2;
        }

        function getDateFin(){
            return $this->dateFin;
        }

        function getDateDebut(){
            return $this->dateDebut;
        }

        function getDateNbCoups(){
            return $this->$nbCoupsJoues;
        }

        function getStatut(){
            return $this->statut;
        }

        function getVainqueur(){
            return $this->vainqueur;
        }
    }
?>

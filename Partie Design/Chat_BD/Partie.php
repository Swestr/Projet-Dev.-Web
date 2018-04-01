<?php
    class Partie{
        private $idPartie;
        private $j1;
        private $j2;
        private $dateDebut;
        private $dateFin;
        private $couleurJ1;
        private $vainqueur;
        private $visibilite;

        private $chat;
        private $coups;
        private $nbCoups;

        const NOIR="Noir";
        const BLANC="Blanc";
        const PRIVEE="privee";
        const PUBLIQUE="publique";
        const CONFIDENTIELLE="confidentielle";

        function __construct($id, Joueur $j_1,Joueur $j_2=NULL, $couleurJ_1, DateTime $date_Debut, DateTime $date_Fin, $st,Joueur $vain){
                $this->idPartie=$id;
                $this->j1=$j_1;
                $this->j2=$j_2;
                $this->setStatut($st);
                $this->setCouleurJ1($couleurJ_1);
                date_default_timezone_set(date_default_timezone_get());
                $this->dateDebut=$date_Debut;
                $this->dateFin=$date_Fin;
                $this->vainqueur=$vain;
                $this->nbCoups=0;
        }

        function ajoutCoups(Coup $c){
            $this->coups[$nbCoups++]=$c;
        }

        function debut_partie(){
            $this->dateDebut=new DateTime('NOW');
        }

        private function setStatut($status){
            if ($status==self::PUBLIQUE || $status==self::PRIVEE || $status==self::CONFIDENTIELLE) {
                $this->visibilite=$status;
            } else {
                trigger_error("ERREUR : La partie doit être soit publique, soit privee, soit confidentielle");
            }

        }

        function fin_partie(Joueur $j){
            $this->vainqueur=$j;
            $this->dateFin=new DateTime('NOW');
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

        function getVainqueur(){
            return $this->vainqueur;
        }
        function getIdPartie(){
            return $this->idPartie;
        }
        function getcouleurJ1(){
            return $this->couleurJ1;
        }
        function getVisibilite(){
            return $this->visibilite;
        }
    }
?>

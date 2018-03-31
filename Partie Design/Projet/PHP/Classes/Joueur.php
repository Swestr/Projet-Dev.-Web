<?php
	class Joueur{
		private $pseudo;
		private $mdp;
		private $mail;
		private $partiesGagnees;
		private $partiesJouees;
		private $etat;
		private $activite;
		private $tempsDeSuspens;

		const ENLIGNE="En-ligne";
		const HORSLIGNE="hors-ligne";

		const ACTIF="Actif";
		const BANNI="Banni";
		const SUSPENDU="Suspendu";

		function __construct($ps, $pa, $m, $pj, $pg, $et, $v, $tds){
			$this->mdp=$pa;
			$this->pseudo=$ps;
			$this->mail=$m;
			$this->partiesJouees=$pj;
			$this->partiesGagnees=$pg;
			$this->changerEtat($et);
			$this->activite=$v;
			$this->tempsDeSuspens=$tds;
		}

		function activer(){
			$this->activite=true;
		}
		function desactiver(){
			$this->activite=false;
		}
		function getConnexion(){
			return $this->activite;
		}

		function changerEtat($e){
			if($e=self::ACTIF || $e=self::BANNI || $e=self::SUSPENDU){
				$this->etat=$e;
			}
			else{
				trigger_error("ERREUR : Cet etat n'existe pas.");
			}
		}

		function equals(Joueur $j){
			if($j->getPseudo()!=$this->pseudo) return false;
			return true;
		}

		function gagner(){
			$this->partiesGagnees++;
			$this->partiesJouees++;
		}

		function perdre(){
			$this->partiesJouees++;
		}

		function toString(){
			echo "pseudo = $this->pseudo<br />mdp = $this->mdp<br />parties gagnées / parties jouées = $this->partiesGagnees / $this->partiesJouees";
		}
		function getMdp(){
			return $this->mdp ;
		}
		function getPseudo(){
			return $this->pseudo ;
		}
		function getMail(){
			return $this->mail ;
		}
		function getPartiesJouees(){
			return $this->partiesJouees ;
		}
		function getPartiesGagnees(){
			return $this->partiesGagnees ;
		}
		function getEtat(){
			return $this->etat ;
		}
		function getActivite(){
			return $this->activite ;
		}
	}

	/*
		changerEtat() change l'état du compte (soit le joueur est banni, soit il est suspendu, soit sont compte est actif)
		gagner() augmente le nombre de parties gagnées et jouées
		perdre() n'augmente que le nombre de parties jouées
		accesseurs en lecture pour chaques attributs
		accesseur en écriture pour le mot de passe (peut être modifié ?)
	*/
?>

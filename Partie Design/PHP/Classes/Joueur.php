<?php
	class Joueur{
		private $pseudo;
		private $password;
		private $mail;
		private $nbPartiesGagnees;
		private $nbPartiesJouees;
		private $etat;

		const VALIDE="valide";
		const BANNI="banni";
		const SUSPENDU="suspendu";


		function __construct($ps, $pa, $m, $e){
			$this->password=md5($pa);
			$this->pseudo=$ps;
			$this->mail=$m;
			$this->nbPartiesJouees=0;
			$this->nbPartiesGagnees=0;
			$this->etat=$e;
		}

		function changerEtat($e){
			if($e=self::VALIDE || $e=self::BANNI || $e=self::SUSPENDU){
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
			$this->nbPartiesGagnees++;
			$this->nbPartiesJouees++;
		}

		function perdre(){
			$this->nbPartiesJouees++;
		}

		function getPseudo(){
			return $this->pseudo;
		}
		function getPassword(){
			return $this->password;
		}
		function getNbPartiesJouees(){
			return $this->nbPartiesJouees;
		}
		function getNbPartiesGagnees(){
			return $this->nbPartiesGagnees;
		}
		function setPassword($p){
			$this->password=$p;
		}
		function toString(){
			echo "pseudo = $this->pseudo<br />mdp = $this->password<br />parties gagnées / parties jouées = $this->nbPartiesGagnees / $this->nbPartiesJouees";
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

<?php
	class Joueur{
		private $pseudo;
		private $password;
		private $nbPartiesGagnees;
		private $nbPartiesJouees;
		function __construct($ps, $pa){
			$this->password=md5($pa);
			$this->pseudo=$ps;
			$this->nbPartiesJouees=0;
			$this->nbPartiesGagnees=0;
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
		gagner() augmente le nombre de parties gagnées et jouées
		perdre() n'augmente que le nombre de parties jouées
		accesseurs en lecture pour chaques attributs
		accesseur en écriture pour le mot de passe (peut être modifié ?)
	*/
?>

<?php
    require_once("Classes/Joueur.php");

    function importerJoueur($conn, $pseudo, $mdp){
        foreach($conn->query("SELECT * FROM Compte WHERE Pseudo=\"$pseudo\" AND Mdp=\"$mdp\" AND Etat=\"Actif\"") as $row) {
            $j=new Joueur($row['Pseudo'], $row['Mdp'], $row['Mail'], (int) $row['PartiesJouees'], (int) $row['PartiesGagnees'], $row['Activite'], $row['Etat'], 0);
            return $j;
	    }
    }

    function exporterJoueur($conn, Joueur $j){
        	try{
        		$conn->beginTransaction();
                $str="'".$j->getPseudo()."','".$j->getMdp()."','".$j->getMail()."',".$j->getPartiesJouees().",". $j->getPartiesGagnees().",'".$j->getEtat()."','".$j->getActivite()."',0";
                $count=$conn->exec( "insert into Compte values ($str)") ;
        		$conn->commit();
        	}catch(PDOException $e){
        		print($e->getMessage());
        		die();
        	}
    }


    $conn = new PDO('mysql:host=172.31.21.41;dbname=cb653705', 'cb653705', 'cb653705');
    $j1 = new Joueur("Melanie", "motdepasse", "adresse.mail@quelquecho.se", 0, 0, Joueur::ACTIF, Joueur::ENLIGNE, 0 );
    exporterJoueur($conn, $j1);
    $j2=importerJoueur($conn, "Melanie", "motdepasse");
    var_dump($j2);
?>

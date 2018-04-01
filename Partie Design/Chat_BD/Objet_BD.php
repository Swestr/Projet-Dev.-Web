<?php
    require_once("Chat.php");
    require_once("Chat_Global.php");
    require_once("Chat_Partie.php");
    require_once("Chat_Prive.php");
    require_once("Joueur.php");
    require_once("Partie.php");
    require_once("Message.php");

    function importerChatGlobal($conn){
        $requete_messages = "";
        $c_g= NULL;
        foreach ($conn->query($requete) as $row) {
            if($c_g==NULL)
                $c_g=new Chat_Global($row['idListeChat']);
            $c_g.newMessage(new Message(importerJoueur($conn, $row['Joueur']), $row['Texte'], $row['HeureEnvoi']));
        }
        return $c_g;
    }
    /*--------------Ajouter la bonne requete sur les 3 fonctions*/
    function importerChatPrive($conn, Joueur $j1, Joueur $j2){
        $c_p=NULL;
        $requete_messages="";
        foreach ($conn->query($requete_messages) as $row)
            if($c_p==NULL)
                $c_p=new Chat_Global($row['idListeChat'], $j1, $j2);{
            $c_p.newMessage(new Message(importerJoueur($conn, $row['Joueur']), $row['Texte'], $row['HeureEnvoi']));
        }
        return $c_p;
    }
    function importerChatPartie($conn, Partie $pa){
        $c_p=NULL;
        $requete_messages="";
        foreach ($conn->query($requete_messages) as $row)
            if($c_p==NULL)
                $c_p=new Chat_Global($row['idListeChat'], $jpa);{
            $c_p.newMessage(new Message(importerJoueur($conn, $row['Joueur']), $row['Texte'], $row['HeureEnvoi']));
        }
        return $c_p;
    }
    function importerJoueur($conn, $pseudo){
        foreach($conn->query("SELECT * FROM Compte WHERE Pseudo=\"$pseudo\" ") as $row) {
            $j=new Joueur($row['Pseudo'], $row['Mdp'], $row['Mail'], (int) $row['PartiesJouees'], (int) $row['PartiesGagnees'], $row['Activite'], $row['Etat']);
            return $j;
        }
    }
    function importerPartie($conn, $indice){
        foreach($conn->query("SELECT * FROM Partie WHERE IdPartie=\".$indice.\"") as $row) {
            $p=new Partie($row['IdPartie'], importerJoueur($conn, $row['Joueur1']), importerJoueur($conn, $row['Joueur2']), $row['CouleurJ1'], dateBD2PHP($row['DateDebut']), dateBD2PHP($row['DateFin']), $row['Visibilite'], importerJoueur($conn, $row['Vainqueur']));
            foreach ($conn->query("SELECT * FROM Coup WHERE IdPartie=\"$indice\" ORDER BY Numero ASC") as $row) {
                $c=new Coup(importerJoueur($row['Joueur'], $row['CoordoneeX'], $row['CoordoneeY']));
                $p->ajoutCoups($c);
            }
            return $p;
        }
    }
    function exporterMessageChat($conn, Message $m, Chat $ch){
        try{
            $conn->beginTransaction();
            $str="0,".$ch->getIdChat().",'".$m->getJoueur()->getPseudo()."','".$m->getTexte()."',". datePHP2BD($m->getHeureEnvoi());
            $count=$conn->exec( "insert into Message values ($str)") ;
            $conn->commit();
        }catch(PDOException $e){
            print($e->getMessage());
            die();
        }
    }
    function exporterJoueur($conn, Joueur $j){
            try{
                $conn->beginTransaction();
                $str="'".$j->getPseudo()."','".$j->getMdp()."','".$j->getMail()."',".$j->getPartiesJouees().",". $j->getPartiesGagnees().",'".$j->getActivite()."','".$j->getEtat()."',0";
                $count=$conn->exec( "insert into Compte values ($str)") ;
                $conn->commit();
            }catch(PDOException $e){
                print($e->getMessage());
                die();
            }
    }
    function exporterPartie($conn, Partie $p){
        try{
            $conn->beginTransaction();
            $str=$p->getIdPartie().",'".$p->getJ1()->getPseudo()."','".$p->getJ2()->getPseudo()."','". $p->getcouleurJ1()."',".datePHP2BD($p->getDateDebut()).",".datePHP2BD($p->getDateFin()).",'".$p->getVisibilite()."','".$p->getVainqueur()->getPseudo()."'";
            $count=$conn->exec( "insert into Partie values ($str)") ;
            $conn->commit();
        }catch(PDOException $e){
            print($e->getMessage());
            die();
        }
    }
    function exporterCoup($conn, Coup $c, Partie $p){
        try{
            $conn->beginTransaction();
            $str="0,".$p->getIdPartie().",0,'".$c->getJoueur()->getPseudo()."',".$c->getCoordX().",".$c->getCoordY();
            $count=$conn->exec( "insert into Coup values ($str)") ;
            $conn->commit();
        }catch(PDOException $e){
            print($e->getMessage());
            die();
        }
    }
    function datePHP2BD(DateTime $d){
        return "STR_TO_DATE('".$d->format("Y-m-d H:i:s")."','%Y-%m-%d %H:%i:%s')";
    }
    function dateBD2PHP($row){
        return DateTime::createFromFormat('Y-m-d H:i:s', $row);
    }


    $conn = new PDO('mysql:host=172.31.21.41;dbname=cb653705', 'cb653705', 'cb653705');
    $j1=new Joueur("Pseudo1", "modeDePAsse", "mail@m.ml", 0, 0, Joueur::ENLIGNE, Joueur::ACTIF);
    $j2=new Joueur("Pseudo2", "modeDePAsse", "mail@m.ml", 0, 0, Joueur::ENLIGNE, Joueur::ACTIF);
    $c_g=new Chat_Global(1);
    $p=new Partie(0, $j1, $j2, Partie::NOIR, new DateTime('NOW'), new DateTime('NOW'), Partie::PUBLIQUE, $j1);
    $c_pa=new Chat_Partie(2, $p);
    $c_pr=new Chat_Prive(3, $j1, $j2);
    $m=new Message($j1, "Hello",new DateTime('NOW'));
    $m1=new Message($j2, "Hello1", new DateTime('NOW'));
    $m2=new Message($j1, "Hello5", new DateTime('NOW'));
    exporterPartie($conn, $p);
    $p1=importerPartie($conn, 0);
    var_dump($p1);
    exporterJoueur($conn, $j1);
    exporterJoueur($conn, $j2);
    exporterMessageChat($conn, $m, $c_g);
    exporterMessageChat($conn, $m1, $c_pa);
    exporterMessageChat($conn, $m, $c_pr);
?>

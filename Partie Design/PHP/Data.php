<?php
    require_once("Classes/Message.php");
    require_once("Classes/Chat_Global.php");
    require_once("Classes/Joueur.php");
    require_once("Classes/Partie.php");
    $chat_G=new Chat_Global();
    for ($i=0; $i <50 ; $i++)
    {
        $j1=new Joueur("pseudo".$i,"password".$i);
        $message=new Message($j1,"Je suis le joueur $i et je parleahahah", "Date ".$i) ;
        $chat_G->new_Message($message);
    }
    $j1=new Joueur("pseudo","password");
    $partie=new Partie($j1, NULL, Partie::NOIR,time(), Partie::PRIVEE);
    $partie->debut_partie();
    echo $partie->getDateDebut();
?>

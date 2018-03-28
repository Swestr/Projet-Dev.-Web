<?php

    //var_dump($j5);

    //s'il y a des erreurs, on les affiches
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    //Inclusion de tous les fichiers
    require_once("Classes/Chat.php");
    require_once("Classes/Joueur.php");
    require_once("Classes/Message.php");
    require_once("Classes/Partie.php");
    require_once("Classes/Chat_Global.php");
    require_once("Classes/Chat_Partie.php");
    require_once("Classes/Chat_Prive.php");
    require_once("Classes/Mes_Chat.php");
    // phpinfo();
    //Création d'un chat global
    $chat_G=new Chat_Global("Chat Global");

    //Création de joueurs, de messages et ajout des messages au chat
    for ($i=0; $i <10 ; $i++)
    {
        $j='j'.$i;
        $$j=new Joueur("pseudo".$i,"password".$i, "email".$i);
        $message=new Message($$j,"Je suis le joueur $i et je parleahahah", "Date ".$i) ;
        $chat_G->newMessage($message);
    }
    //Création du tableau de tous les chats + ajout du chat global
    $mes_chats=new Mes_Chat();
    $mes_chats->ajoutChat($chat_G);
    //phpinfo();
    //Création d'une partie en attente d'un autre joueur
    for($i=0;$i<10; $i++){
        $j="j".$i;
        $partie=new Partie($$j, NULL, Partie::NOIR,time(), Partie::PRIVEE);
        $partie->debut_partie();
    }
?>

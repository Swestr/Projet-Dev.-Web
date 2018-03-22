<?php
    require_once("Classes/Message.php");
    require_once("Classes/Chat.php");
    require_once("Classes/Chat_Global.php");
    require_once("Classes/Mes_Chat.php");
    require_once("Classes/Joueur.php");
    require_once("Classes/Partie.php");
    $chat_G=new Chat_Global("Chat Global");
    for ($i=0; $i <2 ; $i++)
    {
        $j1=new Joueur("pseudo".$i,"password".$i, "email".$i, Joueur::VALIDE);
        $message=new Message($j1,"Je suis le joueur $i et je parleahahah", "Date ".$i) ;
        $chat_G->newMessage($message);
    }
    $j1=new Joueur("pseudo","password","email", Joueur::VALIDE);
    $partie=new Partie($j1, NULL, Partie::NOIR,time(), Partie::PRIVEE);
    $partie->debut_partie();
    $mes_chats=new Mes_Chat();
    $mes_chats->ajoutChat($chat_G);
    $chat_P=new Chat_Global("Chat de Partie");
    for ($i=0; $i <2 ; $i++)
    {
        $j1=new Joueur("pseudo".$i,"password".$i, "email".$i, Joueur::VALIDE);
        $message=new Message($j1,"Je suis le joueur $i et je parleahahah", "Date ".$i) ;
        $chat_P->newMessage($message);
    }
    $mes_chats->ajoutChat($chat_P);
?>

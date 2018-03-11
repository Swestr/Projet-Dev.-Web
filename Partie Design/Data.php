<?php
    require_once("Classes/Message.php");
    require_once("Classes/Chat_Global.php");
    require_once("Classes/Joueur.php");
    require_once("Classes/Partie.php");
    $chat_G=new Chat_Global();
    for ($i=0; $i < 50 ; $i++) {
        $message=new Message("Joueur ".$i,"Je suis le joueur $i et je parle ahahah", "Date ".$i) ;
        $chat_G->new_Message($message);
    }


?>

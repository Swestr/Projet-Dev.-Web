<?php
    require_once('Data.php');
    print("<table>");
    for ($i=0; $i < $chat_G->size(); $i++) {
    	print("<tr>");
    	$message=$chat_G->get_Message($i);
            print("<td>".$message->getJoueur()->getPseudo()."</td><td>".$message->get_Message()."</td></tr>");
    }
    print("</table>");
?>

<?php
include_once 'data.php';
include_once '../../PHP/Data.php';
echo '<div id="afficherChat_box">
	<div	id="masquerChat_box">
	<a href="#afficherChat_box"><div class="chat_head1">'.$chat_box.'</div></a>
	<a href="#masquerChat_box"><div class="chat_head2">'.$chat_box.'</div></a>
	<div id="chat_body">';
for($chat=0;$chat<$mes_chats->size();$chat++) {
	for ($msg=0; $msg <$mes_chats->getChat($chat)->size() ; $msg++) {
		echo '<div class="user">'.$mes_chats->getChat($chat)->getMessage($msg)->getJoueur()->getPseudo().'</div>';
	}
}

echo '		</div>
			</div>
		</div>';
?>

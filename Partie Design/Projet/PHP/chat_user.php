<?php
include_once 'data.php';
include_once 'Data1.php';
if (!empty($_GET)) {
	$mes_chats->ajoutMessage($j1, $_GET['chat'], new Message($j1,$_GET['msg'], date('d/m/Y H:i:s', time())));
}
for($chat=0;$chat<$mes_chats->size();$chat++) {
	$right = ($chat*290) + 290;

		echo '<div id="afficherMsg_box" style="right:'.$right.'px">
					<div id="masquerMsg_box">
						<a href="#afficherMsg_box"><div class="msg_head1">'.$mes_chats->getChat($chat)->getNom().'<div class="close">x</div></div></a>
						<a href="#masquerMsg_box"><div class="msg_head2">'.$mes_chats->getChat($chat)->getNom().'<div class="close">x</div></div></a>
						<div id="msg_body"><div class="msg_panel">';
			for ($msg=0; $msg <$mes_chats->getChat($chat)->size() ; $msg++) {
					echo '<p>'.$mes_chats->getChat($chat)->getMessage($msg)->getJoueur()->getPseudo().' : '
						.$mes_chats->getChat($chat)->getMessage($msg)->getMessage().' ('
						.$mes_chats->getChat($chat)->getMessage($msg)->getDate().')</p>';

			}
		echo '</div><div class="msg_footer" ><textarea class="msg_input" rows="4" id="chat_n'.$chat.'"></textarea></div></div>
			</div>
			</div>';
}
?>

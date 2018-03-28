<?php
include_once 'data.php';
echo '<div id="afficherChat_box"> 
			<div	id="masquerChat_box">
				<a href="#afficherChat_box"><div class="chat_head1">'.$chat_box.'</div></a>    <a href="#masquerChat_box"><div class="chat_head2">'.$chat_box.'</div></a>
				<div id="chat_body">';
					for($i=0;$i<count($nom_user);$i++)
						echo '<div class="user">'.$nom_user[$i].'</div>';
echo '		</div>
			</div>
		</div>';
?>

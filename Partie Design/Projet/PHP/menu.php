<?php 
include_once 'data.php';
echo '<ul class="tabMenu">';
for($i=0;$i<count($tabMenu);$i++) {
	if ($i==$page)
		echo '<li class="active"><a href="Page.php?page='.$i.'">'.$tabMenu[$i].'</a></li>';
	else
		echo '<li><a href="Page.php?page='.$i.'">'.$tabMenu[$i].'</a></li>';
}
	
echo '</ul>';
?>        
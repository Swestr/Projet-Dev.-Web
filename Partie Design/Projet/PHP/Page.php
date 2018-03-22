<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
?>
<DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>GoGo</title>
		<link rel="stylesheet" type="text/css" href="../CSS/style.css">
	</head>

	<body>
		<?php include 'chat_box.php';?>
		<?php include 'chat_user.php';?>

		<header>
			<nav>
				<div class="divNav">
					<div class="divEntete">
						<a href="Page.php?page=0"><h1><?php include 'entete.php';?></h1></a>
					</div>
				</div>
				<div class="menu">
					<?php include 'menu.php';?>
				</div>
			</nav>
		</header>

		<section>
				<?php include 'contenu.php';?>
		</section>

		<footer>
			<?php include 'pied.php';?>
		</footer>
	</body>
</html>

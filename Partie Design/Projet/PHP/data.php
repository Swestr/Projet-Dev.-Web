<?php 
$chat_box="Chatbox";

$nom_user[0]="Test1";
$nom_user[1]="Test2";

if(isset($_GET['page'])) 
	$page = $_GET['page'];
else								
	$page = "0";

$tabEntete[0]="GoGo";
$tabEntete[1]="AmiGo";

$tabMenu[0]="Accueil";
$tabMenu[1]="Règles";
$tabMenu[2]="Partie";
$tabMenu[3]="Connexion";
$tabMenu[4]="S'inscrire";

$contenu[0]='<img id="imgAccueil" src="../Multimedia/Jeu.png" border="0" />
				<br/>
				<br/>
				<br/>
				<h2>Hello !</h2>';
$contenu[1]="<h2>Matériel</h2>
				<p>
				Le matériel de jeu traditionnel se compose d'un goban sur lequel est tracé un quadrillage de 19x19 lignes, soit 361 intersections, 
				et de pierres qui sont soit noires, soit blanches. Mais rien n'empêche les joueurs d'utiliser un autre matériel, et en particulier 
				des gobans de 13x13 ou 9x9 lignes pour les parties d'initiation.
				<br/>
				Généralement, la distance entre deux lignes du goban est approximativement de 24 mm dans le sens de la longueur et de 22 mm dans le sens de la largeur : 
				le goban n'est donc pas tout à fait carré. Quant aux pierres, elles sont de forme biconvexe et d'un diamètre d'environ 22 mm.
				</p>";
$contenu[2]="<p>Let's go !</p>";
$contenu[3]='<div class="divContenu3">
					<div class="divConnexion">
						<div class="divLogin">
							<form class="formLogin">
								<span class="spanLogin">Bonjour</span>
								<br/>
								<br/>
								<div class="divForm">
									<input class="inputForm" type="text" name="email" placeholder="Email">
								</div>
								<div class="divForm">
									<input class="inputForm" type="password" name="pass" placeholder="Mot de passe">
									
								</div>			
								<div class="divButton">
									<button class="buttonForm">Connexion</button>
								</div>
								<div>
									<span>Pas de compte?</span>
									<a href="Page.php?page=4">&nbsp;inscription</a>
								</div>
							</form>
						</div>
					</div>
				</div>';
$contenu[4]='<form >
	            <table>
	                <tr>
	                    <td>
	                        <label>Pseudo : </label>
	                    </td>
	                    <td>
	                        <input type="text" id="Pseudo"/>
	                        <br />
	                        <div id="VerifPseudo"></div>
	                    </td>
	                </tr>
	                <tr>
	                    <td>
	                        <label>Mot de passe : </label>
	                    </td>
	                    <td>
	                        <input type="password" id="Password" />
	                        <br />
	                        <div id="VerifPasswd"></div>
	                    </td>
	                </tr>
	
	                <tr>
	                    <td>
	                        <label>Adresse mail : </label>
	                    </td>
	                    <td>
	                        <input type="text" id="Mail"/>
	                        <br />
	                        <div id="VerifMail"></div>
	                    </td>
	                </tr>
	            </table>
	            <input type="submit" value="Valider">
	        </form>';
?>    

# Projet-Dev.-Web

Corentin : Product owner
Mélanie : Scrum master



Fonctionnalités :

	Assister à un match en cours et un match fini s'il n'est pas privé
	Si un combat est privé, seul les deux joueurs peuvent le revoir
	Envoi d'un lien de la partie si le joueur veut partager le replay de la partie jouée
	Replay montre aussi le chat de la partie qui peut être caché de base
	Replay : coup suivant, précédent, timelaps 
	Créer, se connecter à un compte
	Parler avec d'autres joueurs
	Jouer à deux
	Jouer en mode anonyme
	Avant un match, les deux joueurs choisissent s'il veulent une partie privée ou publique. Si l'un des deux choisit privée, alors la partie est privée
	Possibilité de rejeter le combat (changer d'adversaire), impossible d'avoir la proposition de ce joueur après 
	Changer la langue ?
	Signaler un joueur



Base de données :

	Comptes
		Pseudo, Mot de passe, mail, XP, Level, parties jouées, parties gagnés, en/hors ligne


	Partie
		id, Joueur1, Joueur2, Coups*, Chat Privé, mode observation (privé/publique), heure de début, heure de fin, jour


	Coups
		n°Coup, Couleur, Emplacement	


	Chat
		Chat Global
			Joueur, message, heure
		Chat Privé
			Joueur, message, heure
		Chat Partie
			Joueur, message, heure
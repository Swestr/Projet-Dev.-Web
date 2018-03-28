CREATE TABLE Coup
(
	IdCoup NUMBER(10) PRIMARY KEY,
	IdPartie NUMBER(10),
	Numero NUMBER(10),
	Joueur VARCHAR(30),
	CoordoneeX NUMBER(10),
	CoordoneeY NUMBER(10),
	CONSTRAINT fk_IdPartie FOREIGN KEY (IdPartie) REFERENCES Partie(Id),
	CONSTRAINT fk_Coup_Joueur FOREIGN KEY (Joueur) REFERENCES Compte(Pseudo)
);

<?php
    class Coup{
        private $joueur;
        private $coordX;
        private $coordY;


        function __construct(Joueur $j, $x, $y){
            $this->joueur=$j;
            $this->coordX=$x;
            $this->coordY=$y;
        }
    }
?>

DROP TABLE Compte CASCADE CONSTRAINTS;
DROP TABLE Partie CASCADE CONSTRAINTS;
DROP TABLE Coup CASCADE CONSTRAINTS;
DROP TABLE Message CASCADE CONSTRAINTS;
DROP TABLE ChatPartie CASCADE CONSTRAINTS;
DROP TABLE ChatGeneral CASCADE CONSTRAINTS;
DROP TABLE ChatPrive CASCADE CONSTRAINTS;
DROP TABLE ListeChat CASCADE CONSTRAINTS;

DROP SEQUENCE partie_id_seq;
DROP SEQUENCE coup_id_seq;
DROP SEQUENCE message_id_seq;
DROP SEQUENCE chatpartie_id_seq;
DROP SEQUENCE chatgeneral_id_seq;
DROP SEQUENCE chatprive_id_seq;
DROP SEQUENCE listechat_id_seq;

CREATE TABLE Compte
(
	Pseudo VARCHAR(30) PRIMARY KEY,
	Mdp VARCHAR(30),
	Mail VARCHAR(30),
	PartiesJouees NUMBER(10),
	PartiesGagnees NUMBER(10),
	Activite VARCHAR(30),
	CONSTRAINT liste_activite CHECK (activite IN ('En-ligne', 'Hors-ligne')),
	Etat VARCHAR(30),
	CONSTRAINT liste_etat CHECK (etat IN ('Actif', 'Suspendu', 'Banni')),
	TempsDeSuspens DATE
);


CREATE TABLE Partie
(
	IdPartie NUMBER(10) PRIMARY KEY,
	Joueur1 VARCHAR(30),
	Joueur2 VARCHAR(30),
	CouleurJ1 VARCHAR(30),
	CONSTRAINT liste_couleurJ1 CHECK (CouleurJ1 IN ('Blanc', 'Noir')),
	DateDebut DATE,
	DateFin DATE,
	Visibilite VARCHAR(30),
	CONSTRAINT liste_visibilite CHECK (Visibilite IN ('Publique', 'Privee', 'Confidentielle')),
	CONSTRAINT fk_Partie_Joueur1 FOREIGN KEY (Joueur1) REFERENCES Compte(Pseudo),
	CONSTRAINT fk_Partie_Joueur2 FOREIGN KEY (Joueur2) REFERENCES Compte(Pseudo)
);

CREATE TABLE Coup
(
	IdCoup NUMBER(10) PRIMARY KEY,
	IdPartie NUMBER(10),
	Numero NUMBER(10),
	Joueur VARCHAR(30),
	CoordoneeX NUMBER(10),
	CoordoneeY NUMBER(10),
	CONSTRAINT fk_IdPartie FOREIGN KEY (IdPartie) REFERENCES Partie(IdPartie),
	CONSTRAINT fk_Coup_Joueur FOREIGN KEY (Joueur) REFERENCES Compte(Pseudo)
);

CREATE TABLE Message
(
	IdMessage NUMBER(10) PRIMARY KEY,
	IdChat NUMBER(10),
	Joueur VARCHAR(30),
	Texte VARCHAR(144),
	HeureEnvoi DATE,
	CONSTRAINT fk_Message_Joueur FOREIGN KEY (Joueur) REFERENCES Compte(Pseudo)
);

CREATE TABLE ChatPartie
(
	IdPartie NUMBER(10) PRIMARY KEY,
	CONSTRAINT fk_ChatPartie_IdPartie FOREIGN KEY (IdPartie) REFERENCES Partie(IdPartie)
);

CREATE TABLE ChatGeneral
(
	IdChatGeneral NUMBER(10) PRIMARY KEY
);

CREATE TABLE ChatPrive
(
	IdChatPrive NUMBER(10) PRIMARY KEY,
	Joueur1 VARCHAR(30),
	Joueur2 VARCHAR(30),
	CONSTRAINT fk_ChatPrive_Joueur1 FOREIGN KEY (Joueur1) REFERENCES Compte(Pseudo),
	CONSTRAINT fk_ChatPrive_Joueur2 FOREIGN KEY (Joueur2) REFERENCES Compte(Pseudo)
);

CREATE TABLE ListeChat
(
	IdListeChat NUMBER(10) PRIMARY KEY,
	Type VARCHAR(10),
	CONSTRAINT liste_Type CHECK (Type IN ('General', 'Privee', 'Partie')),
	IdChat NUMBER(10)
);


CREATE SEQUENCE partie_id_seq;
CREATE SEQUENCE coup_id_seq;
CREATE SEQUENCE message_id_seq;
CREATE SEQUENCE chatpartie_id_seq;
CREATE SEQUENCE chatgeneral_id_seq;
CREATE SEQUENCE chatprive_id_seq;
CREATE SEQUENCE listechat_id_seq;

CREATE OR REPLACE TRIGGER trg_partie_id_seq
	BEFORE INSERT ON Partie
	FOR EACH ROW
	BEGIN
	SELECT partie_id_seq.nextval
	into :new.IdPartie
FROM dual;
END;
/
CREATE OR REPLACE TRIGGER trg_coup_id_seq
	BEFORE INSERT ON Coup
	FOR EACH ROW
	BEGIN
	SELECT coup_id_seq.nextval
	into :new.IdCoup
FROM dual;
END;
/
CREATE OR REPLACE TRIGGER trg_chatpartie_id_seq
	BEFORE INSERT ON ChatPartie
	FOR EACH ROW
	BEGIN
	SELECT chatpartie_id_seq.nextval
	into :new.IdPartie
FROM dual;
END;
/
CREATE OR REPLACE TRIGGER trg_chatgeneral_id_seq
	BEFORE INSERT ON ChatGeneral
	FOR EACH ROW
	BEGIN
	SELECT chatgeneral_id_seq.nextval
	into :new.IdChatGeneral
FROM dual;
END;
/
CREATE OR REPLACE TRIGGER trg_chatprive_id_seq
	BEFORE INSERT ON ChatPrive
	FOR EACH ROW
	BEGIN
	SELECT chatprive_id_seq.nextval
	into :new.IdChatPrive
FROM dual;
END;
/
CREATE OR REPLACE TRIGGER trg_listechat_id_seq
	BEFORE INSERT ON ListeChat
	FOR EACH ROW
	BEGIN
	SELECT listechat_id_seq.nextval
	into :new.idlistechat
FROM dual;
END;
/
CREATE OR REPLACE TRIGGER message_id_seq
	BEFORE INSERT ON Message
	FOR EACH ROW
	BEGIN
	SELECT message_id_seq.nextval
	into :new.IdMessage
FROM dual;
END;
/

insert into Compte values ('didier',null,null,null,null,null,null,null);
insert into Compte values ('groguay',null,null,null,null,null,null,null);
insert into Partie values (0,null,null,null,null,null,null);
insert into Partie values (0,null,null,null,null,null,null);
insert into Message values (0,null,null,null,null);
insert into Message values (0,null,null,null,null);
insert into Coup values (0,null,null,null,null,null);
insert into Coup values (0,null,null,null,null,null);
insert into ChatPrive values (0,null,null);
insert into ChatPrive values (0,null,null);
insert into ChatPartie values (0);
insert into ChatPartie values (0);
insert into ChatGeneral values (0);
insert into ChatGeneral values (0);
insert into ListeChat values (0,null,null);
insert into ListeChat values (0,null,null);
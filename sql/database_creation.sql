DROP DATABASE collab;
CREATE DATABASE collab;

USE collab;

CREATE TABLE collaborateur (
	code INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	prenom VARCHAR(50) NOT NULL
)
ENGINE=MYISAM;

CREATE TABLE dossier (
	code_dossier INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	client VARCHAR(255) NOT NULL,
	date_creation DATETIME NOT NULL,
	intitule VARCHAR(255)
)
ENGINE=myisam;

CREATE TABLE affectation (
	code_collaborateur INT UNSIGNED NOT NULL,
	code_dossier INT UNSIGNED NOT NULL,
	FOREIGN KEY (code_collaborateur) REFERENCES collaborateur(code),
	FOREIGN KEY (code_dossier) REFERENCES dossier(code_dossier),
	PRIMARY KEY (code_collaborateur, code_dossier)
)
ENGINE=myisam;

CREATE TABLE operation (
	code_collaborateur INT UNSIGNED NOT NULL,
	code_dossier INT UNSIGNED NOT NULL,
	date_operation DATETIME NOT NULL,
	duree TIME NOT NULL,
	libelle VARCHAR(255) NOT NULL,
	FOREIGN KEY (code_collaborateur) REFERENCES collaborateur(code),
	FOREIGN KEY (code_dossier) REFERENCES dossier(code_dossier),
	PRIMARY KEY (code_collaborateur, code_dossier)
)
ENGINE=myisam;

CREATE TABLE log (
	id_suppression INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	date_suppression DATETIME NOT NULL,
	user VARCHAR(255) NOT NULL,
	description VARCHAR(50)
)
ENGINE=myisam;
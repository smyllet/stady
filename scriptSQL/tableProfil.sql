use stady;
DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS Profil;
DROP VIEW IF EXISTS Profil_proviseur;
DROP VIEW IF EXISTS Profil_cpe;
DROP VIEW IF EXISTS Profil_professeur;
DROP VIEW IF EXISTS Profil_eleve;
DROP VIEW IF EXISTS Profil_tuteur;


/* Création base de donnée Profil */
CREATE TABLE Profil
(
   /*Profil*/
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	profil_name VARCHAR(100) NOT NULL,
   profil_firstName VARCHAR(100) NOT NULL,
   profil_email VARCHAR(255),
   profil_tel char(12),
   profil_dateOfBirth DATE,
   profil_type INT NOT NULL,
   

   /*Account*/
   account_identifiant VARCHAR(100),
   account_admin BOOLEAN NOT NULL DEFAULT 0,
   account_password VARCHAR(255),
   account_active BOOLEAN NOT NULL DEFAULT 0,
   account_need_new_password BOOLEAN NOT NULL DEFAULT 1,

   /*Eleve*/
   eleve_id_classe INT,

   /*Tuteur*/
   tuteur_id_entreprise INT
);

/* Création des vues pour les différent type de profil */
CREATE VIEW Profil_proviseur(id, nom, prenom, email, dateNaissance, ac_identifiant, ac_admin, ac_password, ac_active, ac_need_new_password)
AS SELECT id, profil_name, profil_firstName, profil_email, profil_dateOfBirth, account_identifiant, account_admin, account_password, account_active, account_need_new_password
from Profil
where profil_type = 1;

CREATE VIEW Profil_cpe(id, nom, prenom, email, dateNaissance, ac_identifiant, ac_admin, ac_password, ac_active, ac_need_new_password)
AS SELECT id, profil_name, profil_firstName, profil_email, profil_dateOfBirth, account_identifiant, account_admin, account_password, account_active, account_need_new_password
from Profil
where profil_type = 2;

CREATE VIEW Profil_professeur(id, nom, prenom, email, dateNaissance, ac_identifiant, ac_admin, ac_password, ac_active, ac_need_new_password)
AS SELECT id, profil_name, profil_firstName, profil_email, profil_dateOfBirth, account_identifiant, account_admin, account_password, account_active, account_need_new_password
from Profil
where profil_type = 3;

CREATE VIEW Profil_eleve(id, nom, prenom, email, tel, dateNaissance, ac_identifiant, ac_admin, ac_password, ac_active, ac_need_new_password, e_id_classe)
AS SELECT id, profil_name, profil_firstName, profil_email, profil_tel, profil_dateOfBirth, account_identifiant, account_admin, account_password, account_active, account_need_new_password, eleve_id_classe
from Profil
where profil_type = 4;

CREATE VIEW Profil_tuteur(id, nom, prenom, email, dateNaissance, ac_identifiant, ac_admin, ac_password, ac_active, ac_need_new_password, t_id_entreprise)
AS SELECT id, profil_name, profil_firstName, profil_email, profil_dateOfBirth, account_identifiant, account_admin, account_password, account_active, account_need_new_password, tuteur_id_entreprise
from Profil
where profil_type = 5;


/* Création de profil de test */

INSERT INTO Profil
(account_identifiant,profil_name,profil_firstName,profil_type,account_password,account_admin, account_active)
VALUES
('admin','none','administrateur',1,'$2y$10$v326v8hF9AwJDzKKS.ftMeuYHx0PxANCf3ikKbnFUSElR3OAyIk3q',true, true); /*Création du compte par defaut (identifiant:admin, mot de passe : password_admin)*/

INSERT INTO Profil
(profil_name,profil_firstName,profil_type,tuteur_id_entreprise)
VALUES
('walter','alle',5,2);
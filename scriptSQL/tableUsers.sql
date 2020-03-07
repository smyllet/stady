DROP TABLE IF EXISTS Users;

CREATE TABLE Users
(
	user_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user_identifiant VARCHAR(100) NOT NULL,
	user_name VARCHAR(100) NOT NULL,
   user_firstName VARCHAR(100) NOT NULL,
   user_email VARCHAR(255),
   user_dateOfBirth DATE,
   user_type INT NOT NULL,
   user_active BOOLEAN NOT NULL DEFAULT 1,
   user_admin BOOLEAN NOT NULL DEFAULT 0,
   user_password VARCHAR(255) NOT NULL,
   need_new_password BOOLEAN NOT NULL DEFAULT 1
);

INSERT INTO Users
(user_identifiant,user_name,user_firstName,user_type,user_password,user_admin)
VALUES
('admin','none','administrateur',1,'$2y$10$v326v8hF9AwJDzKKS.ftMeuYHx0PxANCf3ikKbnFUSElR3OAyIk3q',true); #Création du compte par defaut (identifiant:admin, mot de passe : password_admin)
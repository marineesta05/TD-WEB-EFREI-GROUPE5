-- Database: Groupe10

-- DROP DATABASE IF EXISTS "Groupe10";

CREATE DATABASE "Groupe10"
    WITH
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'English_United States.1252'
    LC_CTYPE = 'English_United States.1252'
    LOCALE_PROVIDER = 'libc'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1
    IS_TEMPLATE = False;
	
CREATE TABLE users (
	id_user SERIAL PRIMARY KEY,
	username VARCHAR(30) NOT NULL,
	email VARCHAR(50) UNIQUE NOT NULL,
	mdp VARCHAR(60) NOT NULL
);
SELECT * FROM users;

CREATE TABLE admin (
	id_admin SERIAL PRIMARY KEY,
	username VARCHAR(30) NOT NULL,
	email VARCHAR (50) NOT NULL UNIQUE,
	mdp VARCHAR(60) NOT NULL
);

SELECT * FROM admin;
INSERT INTO admin (username, email, mdp) VALUES 
('marineesta', 'marineesta05@gmail.com', 'Marine'),
('mariegrace', 'mariegrace@gmail.com', 'Marie'),
('marinecadet', 'marinecadet05@gmail.com', 'Marine1'),
('leiladiallo', 'leiladiallo@gmail.com', 'Leila'),
('sebastien', 'sebastien@net-consult.info', 'Sebastien');

CREATE TABLE lieux(
	id_image SERIAL PRIMARY KEY,
	name_image VARCHAR(30),
	image TEXT
);

CREATE TABLE objets (
	id_objet SERIAL PRIMARY KEY,
	name_objet VARCHAR(30),
	css TEXT,
	sous_image VARCHAR (30),
	id_image INT REFERENCES lieux(id_image)
)


CREATE TABLE etapes (
	id_etape SERIAL PRIMARY KEY,
	phase INT,
	etape TEXT,
	etat VARCHAR(10)
)

INSERT INTO etapes (phase, etape, etat) VALUES
(1,'Quelqu’un a laissé des indices dans la chambre pour rappeler à Maya de qui c’est l’anniversaire. Cherche bien pour découvrir son nom !', 'NON FAIT'),
(1,'Pas de cadeau ? Pas de problème! Aide Maya à rassembler les objets nécessaires pour fabriquer un cadeau unique.', 'NON FAIT'),
(1,'Maya doit partir au travail, mais ses affaires sont éparpillées partout. Aide-la à les retrouver pour être prête à temps.', 'NON FAIT'),
(2,'Maya ne trouve pas son shampooing et son masque. Cherche dans la salle de bain pour les retrouver !', 'NON FAIT'),
(2,'Pour une coiffure parfaite, Maya a besoin de ses outils. Trouve-les avant qu’elle ne soit en retard', 'NON FAIT'),
(2,'Pour être prête à briller, Maya doit s’habiller et se maquiller. Aide-la à trouver tout ce dont elle a besoin.', 'NON FAIT'),
(3,'Cherche les ingrédients nécessaires pour les	crêpes que Maya	voulait	préparer.', 'NON FAIT'),
(3,'Quel désastre ! Découvre ce qui a causé le chaos dans la cuisine.', 'NON FAIT'),
(3,'Finalement, Maya opte pour un petit-déjeuner simple. Trouve ce qu’elle décide de	manger', 'NON FAIT'),
(4,'Prépare les affaires nécessaires pour un pique-nique parfait.', 'NON FAIT'),
(4,'Trouve les œufs de Pâques cachés ici et là.', 'NON FAIT'),
(4,'Joue avec le chien de Maya et trouve ses jouets préférés.', 'NON FAIT'),
(5,'Montre à tous les outils et créations que Maya utilise dans son atelier.', 'NON FAIT'),
(5,'Cherche les signes qui indiquent qu’il est temps pour Maya de quitter le travail', 'NON FAIT'),
(5,'Aide Maya à rassembler ses affaires pour rentrer chez elle.', 'NON FAIT'),
(6,'Joue avec le chien de Maya et retrouve les objets nécessaires pour leur promenade.', 'NON FAIT'),
(6,'Pars à la recherche de délicieux champignons dans la forêt.', 'NON FAIT'),
(6,'Maya a perdu des objets importants. Aide-la à les retrouver avant de rentrer.', 'NON FAIT');

SELECT * FROM etapes;

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

INSERT INTO lieux(name_image, image) VALUES
('sdb', '/ViewUser/game/Scences/sdb.png'),
('cuisine', '/ViewUser/game/Scences/cuisine.png'),
('jardin', '/ViewUser/game/Scences/jardin.png'),
('atelier', '/ViewUser/game/Scences/atelier.png'),
('foret', '/ViewUser/game/Scences/foret.png'),
('chambre', '/ViewUser/game/Scences/chambre.png');

SELECT * FROM lieux;

CREATE TABLE objets (
	id_objet SERIAL PRIMARY KEY,
	name_objet VARCHAR(30),
	css TEXT,
	sous_image VARCHAR (30),
	id_image INT REFERENCES lieux(id_image)
)

INSERT INTO objets (name_objet, css, id_image) VALUES
('photo', 'top: 112.6px; left: 1059px; width: 31px; height: 20px; position: absolute;', '1'),
('calendrier', 'top: 82.6px; left: 941px; width: 18px; height: 22px; position: absolute;', '1'),
('ticket', 'top: 408.6px; left: 174px; width: 50px; height: 22px; position: absolute;', '1'),
('cadeau', 'top: 361.6px; left: 1146px; width: 31px; height: 20px; position: absolute;', '1'),
('lunnettes', 'top: 386.6px; left: 611px; width: 18px; height: 22px; position: absolute;', '1'),
('sac', 'top: 398.6px; left: 1032px; width: 50px; height: 22px; position: absolute;', '1'),
('ordi', 'top: 613.6px; left: 609px; width: 18px; height: 22px; position: absolute;', '1'),
('ecouteurs', 'top: 410.6px; left: 805px; width: 50px; height: 22px; position: absolute;', '1'),
('shampooing', 'top: 465px; left: 25px; width: 50px; height: 130px; position: absolute;', '2'),
('masque', 'top: 510px; left: 550px; width: 55px; height: 55px; position: absolute;', '2'),
('lisseur', 'top: 722px; left: 923px; width: 40px; height: 40px; position: absolute;', '2'),
('mirroir', 'top: 562px; left: 950px; width: 1110px; height: 130px; position: absolute;', '2'),
('robe', 'top: 663px; left: 1110px; width: 55px; height: 55px; position: absolute;', '2'),
('palette', 'top: 510px; left: 366px; width: 40px; height: 40px; position: absolute;', '2'),
('ral', 'top: 188px; left: 1053px; width: 1110px; height: 130px; position: absolute;', '2'),
('oeufs', 'top: 523px; left: 638px; width: 55px; height: 53px; position: absolute;', '3'),
('vanille', 'top: 512px; left: 690px; width: 40px; height: 60px; position: absolute;', '3'),
('farine', 'top: 512px; left: 746px; width: 70px; height: 60px; position: absolute;', '3'),
('bolC', 'top: 514px; left: 341px; width: 90px; height: 75px; position: absolute;', '3'),
('poele', 'top: 679px; left: 1023px; width: 100px; height: 90px; position: absolute;', '3'),
('toque', 'top: 582px; left: 232px; width: 65px; height: 65px; position: absolute;', '3'),
('oeufC', 'top: 728px; left: 0px; width: 50px; height: 50px; position: absolute;', '3'),
('verreB', 'top: 708px; left: 130px; width: 35px; height: 45px; position: absolute;', '3'),
('lait', 'top: 395px; left: 341px; width: 65px; height: 65px; position: absolute;', '3'),
('cerales', 'top: 258px; left: 481px; width: 50px; height: 50px; position: absolute;', '3'),
('cuillere', 'top: 682px; left: 690px; width: 35px; height: 45px; position: absolute;', '3'),
('chips', 'top: 702px; left: 1085px; width: 230px; height: 140px; position: absolute;', '4'),
('salade', 'top: 268px; left: 386px; width: 85px; height: 85px; position: absolute;', '4'),
('boisson', 'top: 273px; left: 172px; width: 70px; height: 110px; position: absolute;', '4'),
('jus', 'top: 666px; left: 867px; width: 60px; height: 110px; position: absolute;', '4'),
('oeuf1', 'top: 350px; left: 996px; width: 90px; height: 90px; position: absolute;', '4'),
('oeuf2', 'top: 451px; left: 517px; width: 80px; height: 80px; position: absolute;', '4'),
('chien', 'top: 542px; left: 401px; width: 290px; height: 190px; position: absolute;', '4'),
('balle', 'top: 701px; left: 594px; width: 60px; height: 60px; position: absolute;', '4'),
('machine', 'top: 248px; left: 848px; width: 150px; height: 100px; position: absolute;', '5'),
('pot', 'top: 280px; left: 1027px; width: 100px; height: 110px; position: absolute;', '5'),
('bac_aiguille', 'top: 611px; left: 45px; width: 100px; height: 79px; position: absolute;', '5'),
('bac_chaise', 'top: 457px; left: -1px; width: 128px; height: 79px; position: absolute;', '5'),
('horloge', 'top: 25px; left: -38px; width: 100px; height: 50px; position: absolute;', '5'),
('ciel', 'top: 134px; left: 533px; width: 115px; height: 150px; position: absolute;', '5'),
('clé_voiture', 'top: 445px; left: 237px; width: 43px; height: 45px; position: absolute;', '5'),
('telephone', 'top: 454px; left: 1137px; width: 45px; height: 32px; position: absolute;', '6'),
('boucleOreille', 'top: 244px; left: 507px; width: 18px; height: 16px; position: absolute;', '6'),
('champignon1', 'top: 617px; left: 596px; width: 80px; height: 61px; position: absolute;', '6'),
('champignon2', 'top: 484px; left: 163px; width: 48px; height: 75px; position: absolute;', '6'),
('champignon3', 'top: 473px; left: 982px; width: 58px; height: 65px; position: absolute;', '6'),
('gourde', 'top: 538px; left: 389px; width: 35px; height: 71px; position: absolute;', '6'),
('chien', 'top: 431px; left: 65px; width: 80px; height: 58px; position: absolute;', '6'),
('tracePattes', 'top: 410px; left: 972px; width: 82px; height: 40px; position: absolute;', '6');


SELECT * FROM objets;


CREATE TABLE etapes (
	id_etape SERIAL PRIMARY KEY,
	phase INT,
	etape TEXT,
	etat VARCHAR(10)
)
TRUNCATE TABLE objets;

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

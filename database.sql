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
)

CREATE TABLE objets (
	id_objet SERIAL PRIMARY KEY,
	name_objet VARCHAR(30),
	css TEXT,
	sous_image VARCHAR (30),
	id_image INT REFERENCES lieux(id_image)
)


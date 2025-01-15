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
	id_user INT SERIAL PRIMARY KEY,
	username VARCHAR(30) NOT NULL,
	email VARCHAR(50) UNIQUE NOT NULL,
	mdp VARCHAR(60) NOT NULL
)
SELECT * FROM users;
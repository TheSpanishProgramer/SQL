DROP DATABASE IF EXISTS agencia_viajes;

CREATE DATABASE agencia_viajes CHARACTER SET utf8;

USE agencia_viajes;

CREATE TABLE agencia (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    direccion VARCHAR(128) NOT NULL,
    telefono VARCHAR(9) NOT NULL
);

CREATE TABLE turista (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido1 VARCHAR(50) NOT NULL,
    apellido2 VARCHAR(50),
    direccion VARCHAR(128) NOT NULL,
    telefono VARCHAR(9) NOT NULL    
);

CREATE TABLE contrata (
	id_agencia INT UNSIGNED,
    id_turista INT UNSIGNED,
    PRIMARY KEY (id_agencia, id_turista),
    FOREIGN KEY (id_agencia) REFERENCES agencia(id),
    FOREIGN KEY (id_turista) REFERENCES turista(id)
);

CREATE TABLE hotel (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    direccion VARCHAR(128) NOT NULL,
    ciudad VARCHAR(50) NOT NULL,
    provincia VARCHAR(50) NOT NULL,
    plazas INT UNSIGNED NOT NULL CHECK (plazas>0),
    telefono VARCHAR(9) NOT NULL
);


CREATE TABLE reserva (
	id_turista INT UNSIGNED,
    id_hotel INT UNSIGNED,
    fecha_entrada DATETIME NOT NULL,
    fecha_salida DATETIME NOT NULL,
    regimen ENUM('MP', 'PC') NOT NULL DEFAULT 'MP',
	PRIMARY KEY (id_turista, id_hotel),
    FOREIGN KEY (id_turista) REFERENCES turista(id),
    FOREIGN KEY (id_hotel) REFERENCES hotel(id)
);

CREATE TABLE vuelo (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fecha_hora DATETIME NOT NULL,
    plazas_totales SMALLINT UNSIGNED NOT NULL,
    plazas_turista SMALLINT UNSIGNED NOT NULL	 
);

CREATE TABLE toma (
	id_turista INT UNSIGNED,
    id_vuelo INT UNSIGNED,
    clase ENUM('Turista', 'Primera') NOT NULL DEFAULT 'Turista',
	PRIMARY KEY (id_turista, id_vuelo),
    FOREIGN KEY (id_turista) REFERENCES turista(id),
    FOREIGN KEY (id_vuelo) REFERENCES vuelo(id)
);




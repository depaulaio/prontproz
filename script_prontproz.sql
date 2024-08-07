CREATE DATABASE saude;

USE DATABASE saude;

CREATE TABLE usuarios ( 
ID INT (11) unsigned not null auto_increment, 
USERNAME varchar(11) not null, 
PASSWORD varchar(11) not null, 
USER_TYPE VARCHAR(50) not null, 
PRIMARY KEY (ID) 
);

CREATE TABLE pacientes ( 
ID INT(11) unsigned not null auto_increment, 
NOME VARCHAR(50) not null, 
IDADE INT (11) not null, 
DIAGNOSTICO text, 
MEDICAMENTOS text, 
PRIMARY KEY (ID) 
);

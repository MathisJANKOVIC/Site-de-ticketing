DROP DATABASE IF EXISTS ticketing ;
CREATE DATABASE ticketing ;
USE ticketing ;
DROP TABLE IF EXISTS TECHNICIEN;
DROP TABLE IF EXISTS CLIENT;
DROP TABLE IF EXISTS TICKET ;

CREATE TABLE TICKETS
(
    id INTEGER(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    objet VARCHAR(20) NOT NULL,
    contenu VARCHAR(1000) not NULL,
    etat VARCHAR(15) NOT NULL,
    t_date DATE NOT NULL,
    FOREIGN KEY (id) REFERENCES UTILISATEURS (id_client)
);

CREATE TABLE UTILISATEURS
(
    id INTEGER(5) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(25) NOT NULL,
    prenom VARCHAR(25) NOT NULL,
    grade VARCHAR(25) NOT NULL,
    mail VARCHAR(35) NOT NULL,
    mdp VARCHAR(25) NOT NULL  
);


INSERT INTO UTILISATEURS (nom,prenom,grade,mail,mdp) VALUES
("Jankovic","Mathis","admin","mathis.jankovic@gmail.com","Mathis1234"),("Ymele","Naomy","technicien","naomy.ymele@gmail.com","Naomy1234"),
("Atanley","Roberta","technicien","roberta.atanley@gmail.com","Roberta1234"),("Elenga","Berni","technicien","berni.elenga@gmail.com","Berni1234");
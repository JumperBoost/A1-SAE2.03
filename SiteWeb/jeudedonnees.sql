DROP TABLE IF EXISTS Avis;
DROP TABLE IF EXISTS Reservations;
DROP TABLE IF EXISTS Salles;
DROP TABLE IF EXISTS Batiments;
DROP TABLE IF EXISTS Coworkers;


CREATE TABLE Coworkers (
    idCoworker INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nomCoworker VARCHAR(50) NOT NULL ,
    prenomCoworker VARCHAR(50) NOT NULL,
    tel VARCHAR(13) NOT NULL,
    codeSecret VARCHAR(8) NOT NULL
);

CREATE TABLE Batiments (
    idBatiment INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nomBatiment  VARCHAR(100) NOT NULL,
    ville VARCHAR(50) NOT NULL ,
    descriptionBatiment VARCHAR(1000)
);
CREATE TABLE Salles (
    idSalle INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nomSalle VARCHAR(100)NOT NULL ,
    superficieSalle INT(3),
    capaciteSalle INT(4),
    prixJournnee DECIMAL(5,2),
    idBatiment INT REFERENCES Batiments(idBatiment),
    descriptionSalleCourte VARCHAR(300),
    descriptionSalle VARCHAR(5000)
);
CREATE TABLE Reservations
(
    idCoworker      INT NOT NULL REFERENCES Coworkers (idCoworker),
    idSalle         INT REFERENCES Salles (idSalle) ,
    dateReservation DATE,
    PRIMARY KEY (idSalle,dateReservation)
);

CREATE TABLE Avis (
    idCoworker INT REFERENCES Coworkers(idCoworker),
    idSalle INT REFERENCES Salles(idSalle),
    datePublication DATE NOT NULL,
    note INT(1) NOT NULL,
    commentaire VARCHAR(150),
    PRIMARY KEY(idSalle, idCoworker)

);

INSERT INTO Coworkers (nomCoworker, prenomCoworker, tel, codeSecret)
VALUES ('Bigard', 'Jean-Marie', '0616379573', '696969');

INSERT INTO Batiments (nomBatiment, ville, descriptionBatiment)
VALUES ('K', 'Montpelier', 'Batiment orné de la lettre K');

INSERT INTO Batiments (nomBatiment, ville, descriptionBatiment)
VALUES ('02', 'Sete', 'Batiment orné du chiffre 02');

INSERT INTO Salles (nomSalle, superficieSalle, capaciteSalle, prixJournnee, idBatiment, descriptionSalleCourte, descriptionSalle)
VALUES ('Fuck You', 30, 8, 79.99, 0, 'Salle parfaite pour travaillé au calme ...', 'Je suis une description longue');
INSERT INTO Salles (nomSalle, superficieSalle, capaciteSalle, prixJournnee, idBatiment, descriptionSalleCourte, descriptionSalle)
VALUES ('IMP', 32, 8, 84.99, 1, 'Salle spatieuse ...', 'Je suis une description longue');
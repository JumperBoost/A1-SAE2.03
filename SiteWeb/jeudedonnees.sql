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
    prixJournee DECIMAL(5,2),
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

INSERT INTO Batiments (idBatiment, nomBatiment, ville, descriptionBatiment)
VALUES (1, 'K', 'Montpellier', 'Batiment orné de la lettre K');

INSERT INTO Batiments (idBatiment,nomBatiment, ville, descriptionBatiment)
VALUES (2, '02', 'Sete', 'Batiment orné du chiffre 02');

INSERT INTO Salles (nomSalle, superficieSalle, capaciteSalle, prixJournee, idBatiment, descriptionSalleCourte, descriptionSalle)
VALUES ('Give and Take', 30, 8, 79.99, 1, 'Salle parfaite pour travaillé au calme ...', 'Je suis une description longue');
INSERT INTO Salles (nomSalle, superficieSalle, capaciteSalle, prixJournee, idBatiment, descriptionSalleCourte, descriptionSalle)
VALUES ('Stayed Gone', 15, 4, 40, 1, 'Salle parfaite pour travaillé au calme ...', 'Je suis une description longue');
INSERT INTO Salles (nomSalle, superficieSalle, capaciteSalle, prixJournee, idBatiment, descriptionSalleCourte, descriptionSalle)
VALUES ('Let\'s Go!', 60, 16, 99.99, 2, 'Salle spatieuse ...', 'Je suis une description longue');
INSERT INTO Salles (nomSalle, superficieSalle, capaciteSalle, prixJournee, idBatiment, descriptionSalleCourte, descriptionSalle)
VALUES ('Must Have Been the Wind', 10, 3, 50, 2, 'Salle spatieuse ...', 'Je suis une description longue');
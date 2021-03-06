DROP TABLE IF EXISTS kommentar;
DROP TABLE IF EXISTS deltaker;
DROP TABLE IF EXISTS arrangement;
DROP TABLE IF EXISTS bruker;


CREATE TABLE IF NOT EXISTS bruker
(
    PNr INTEGER NOT NULL AUTO_INCREMENT,
    Fornavn VARCHAR(100) NOT NULL,
    Etternavn VARCHAR(100) NOT NULL,
    Brukernavn VARCHAR(100) NOT NULL UNIQUE,
    Passord VARCHAR(100) NOT NULL,
    PRIMARY KEY (PNr)
);

CREATE TABLE IF NOT EXISTS arrangement
(
    argId INTEGER NOT NULL AUTO_INCREMENT,
    PNr INTEGER,
    tittel VARCHAR(100),
    beskrivelse VARCHAR(1000),
    dato DATE,
    tid TIME,
    PRIMARY KEY (argId),
    FOREIGN KEY (PNr) REFERENCES bruker(PNr)
);

CREATE TABLE IF NOT EXISTS deltaker
(
    PNr INTEGER,
    argId INTEGER,
    PRIMARY KEY (PNr, argId),
    FOREIGN KEY (PNr) REFERENCES bruker(PNr),
    FOREIGN KEY (argId) REFERENCES arrangement(argId)
);

CREATE TABLE IF NOT EXISTS kommentar
(
    skravleId INTEGER NOT NULL AUTO_INCREMENT,
    PNr INTEGER,
    argId INTEGER,
    kommentar VARCHAR(255),
    PRIMARY KEY (skravleId),
    FOREIGN KEY (PNr) REFERENCES bruker(PNr),
    FOREIGN KEY (argId) REFERENCES arrangement(argId)
);



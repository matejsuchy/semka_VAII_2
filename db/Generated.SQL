/*
Created: 23. 11. 2021
Modified: 23. 11. 2021
Model: MariaDB_semestralka
Database: MySQL 8.0
*/

-- Create tables section -------------------------------------------------

-- Table pouzivatel

CREATE TABLE pouzivatel
(
  id_pouzivatel Int NOT NULL AUTO_INCREMENT,
  prezyvka Varchar(50) NOT NULL,
  email Varchar(100) NOT NULL,
  heslo Varchar(50) NOT NULL,
  PRIMARY KEY (id_pouzivatel)
)
;

-- Table hra

CREATE TABLE hra
(
  id_statistika Int NOT NULL AUTO_INCREMENT,
  WPM Int NOT NULL,
  zaporne_body Int NOT NULL,
  kladne_body Int NOT NULL,
  presnost Int NOT NULL,
  napisane_slova Int NOT NULL,
  datum Timestamp NOT NULL,
  skore Int NOT NULL,
  id_pouzivatel Int,
  PRIMARY KEY (id_statistika)
)
;

CREATE INDEX IX_Relationship1 ON hra (id_pouzivatel)
;

-- Table spatna_vazba

CREATE TABLE spatna_vazba
(
  id_spatna_vazba Int NOT NULL AUTO_INCREMENT,
  text Varchar(500) NOT NULL,
  email Varchar(100) NOT NULL,
  id_pouzivatel Int,
  PRIMARY KEY (id_spatna_vazba)
)
;

CREATE INDEX IX_Relationship3 ON spatna_vazba (id_pouzivatel)
;

-- Create foreign keys (relationships) section -------------------------------------------------

ALTER TABLE hra ADD CONSTRAINT odohrá FOREIGN KEY (id_pouzivatel) REFERENCES pouzivatel (id_pouzivatel) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE spatna_vazba ADD CONSTRAINT napise FOREIGN KEY (id_pouzivatel) REFERENCES pouzivatel (id_pouzivatel) ON DELETE RESTRICT ON UPDATE RESTRICT
;

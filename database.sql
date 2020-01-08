/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  Your Name <Juan A. García Muelas (juangmuelas@hotmail.com)>
 * Created: 04-sep-2019
 * v.1
 */
/**
 * Author:  Your Name <Juan A. García Muelas (juangmuelas@hotmail.com)>
 * Created: 07-ago-2019
 * v.3
 */


/* CREAMOS BD */

-- CREATE DATABASE IF NOT EXISTS ortoprest;
-- USE ortoprest;
-- 
-- /* TABLAS */
-- 
-- CREATE TABLE IF NOT EXISTS identity(
-- id                  int(255) auto_increment not null,
-- dni                 varchar(20),
-- seg_social          varchar(100),
-- name                varchar(100),
-- surname1            varchar(200),
-- surname2            varchar(200),
-- ccc                 varchar(100),
-- created_at          datetime,
-- updated_at          datetime,
-- CONSTRAINT pk_identity PRIMARY KEY(id)
-- )ENGINE=InnoDb;
-- 
-- -- Insertamos datos para testeo
-- INSERT INTO identity VALUES(null, '10123456A', '240011223344','Jag','Molar','Molar','20141243231234567890',CURTIME(),CURTIME());
-- INSERT INTO identity VALUES(null, '10123457B', '241011223344','Fany','Fun','Molar','20144321231234567890',CURTIME(),CURTIME());
-- INSERT INTO identity VALUES(null, '10123458C', '242011223344','Lou','Ferrigno','Molar','20141243231234562019',CURTIME(),CURTIME());
-- INSERT INTO identity VALUES(null, '10123458D', '243021223344','Matias','Prats','Prats','20142343561234562019',CURTIME(),CURTIME());
-- 
-- CREATE TABLE IF NOT EXISTS mail(
-- id                  int(255) auto_increment not null,
-- tipo_email          varchar(20),
-- email               varchar(255),
-- password            varchar(255),
-- created_at          datetime,
-- updated_at          datetime,
-- CONSTRAINT pk_mail PRIMARY KEY(id)
-- )ENGINE=InnoDb;
-- 
-- -- Insertamos datos para testeo
-- INSERT INTO mail VALUES(NULL, 'Trabajo', 'JagMolar@ortoprest.com', '123456', CURTIME(), CURTIME());
-- INSERT INTO mail VALUES(NULL, 'Personal', 'JagMolar@jagmolar.com', '123456', CURTIME(), CURTIME());
-- INSERT INTO mail VALUES(NULL, 'Trabajo', 'LouFerrigno@ortoprest.com', '123456', CURTIME(), CURTIME());
-- INSERT INTO mail VALUES(NULL, 'Trabajo', 'MatiasPrats@ortoprest.com', '123456', CURTIME(), CURTIME());
-- 
-- CREATE TABLE IF NOT EXISTS address(
-- id                  int(255) auto_increment not null,
-- country             varchar(100),
-- prov                varchar(100),
-- town                varchar(255),
-- domicile            varchar(255),
-- num                 int(100),
-- floor               int(100),
-- letter              varchar(10),
-- cod_post            int(100),
-- created_at          datetime,
-- updated_at          datetime,
-- CONSTRAINT pk_address PRIMARY KEY(id)
-- )ENGINE=InnoDb;
-- 
-- -- Insertamos datos para testeo
-- INSERT INTO address VALUES(NULL, 'España', 'León', 'León', 'Ordoño', 4, 2, 'A', 24001,CURTIME(), CURTIME());
-- INSERT INTO address VALUES(NULL, 'España', 'León', 'León', 'SantaAna', 21, 5, 'Centro', 24005, CURTIME(), CURTIME());
-- INSERT INTO address VALUES(NULL, 'España', 'León', 'San Emiliano','Arriba', 32, null,null, 24340, CURTIME(), CURTIME());
-- INSERT INTO address VALUES(NULL, 'España', 'León', 'San Emiliano','Abajo', 2, null,null, 24340, CURTIME(), CURTIME());
-- 
-- CREATE TABLE IF NOT EXISTS tel(
-- id                  int(255) auto_increment not null,
-- tipo_tel            varchar(20),
-- created_at          datetime,
-- updated_at          datetime,
-- CONSTRAINT pk_tel PRIMARY KEY(id)
-- )ENGINE=InnoDb;
-- 
-- -- Insertamos datos para testeo
-- INSERT INTO tel VALUES(NULL, 'Fijo', CURTIME(), CURTIME());
-- INSERT INTO tel VALUES(NULL, 'Móvil', CURTIME(), CURTIME());
-- INSERT INTO tel VALUES(NULL, 'Personal', CURTIME(), CURTIME());
-- 
-- CREATE TABLE IF NOT EXISTS product(
-- id                  int(255) auto_increment not null,
-- cod                 int(100),
-- description         text,
-- funding             float,
-- lapse               varchar(200),
-- center              varchar(200),
-- comments            text,
-- stock               int(100),
-- created_at          datetime,
-- updated_at          datetime,
-- CONSTRAINT pk_product PRIMARY KEY(id)
-- )ENGINE=InnoDb;
-- 
-- -- Insertamos datos para testeo
-- INSERT INTO product VALUES(null, 12210003, 'Silla de ruedas autopropulsable, plegable. Cualquier tamaño.', 337.17, '18 meses','Jose AguadoII','Recuperable', 2,CURTIME(),CURTIME());
-- INSERT INTO product VALUES(null, 12210006, 'Silla de ruedas fija.', 234.39, '24 meses','Jose AguadoI','Recuperable', 12,CURTIME(),CURTIME());
-- INSERT INTO product VALUES(null, 12030603, 'Bastón con apoyo en antebrazo, metálico, extensible y graduable (unidad).', 9.20, 'USUARIO APORTA 12.02€. PLAZO:12 meses','Condesa','Recuperable', 8,CURTIME(),CURTIME());
-- 
-- CREATE TABLE IF NOT EXISTS users(
-- id                  int(255) auto_increment not null,
-- identity_id         int(255),
-- mail_id             int(255),
-- address_id          int(255),
-- role                varchar(20),
-- email               varchar(100),
-- password            varchar(100),
-- related             varchar(100),
-- image               varchar(255),
-- created_at          datetime,
-- updated_at          datetime,
-- remember_token      varchar(255),
-- CONSTRAINT pk_user PRIMARY KEY(id),
-- CONSTRAINT fk_user_identity FOREIGN KEY(identity_id) REFERENCES identity(id),
-- CONSTRAINT fk_user_mail FOREIGN KEY(mail_id) REFERENCES mail(id),
-- CONSTRAINT fk_user_address FOREIGN KEY(address_id1 REFERENCES address(id)
-- )ENGINE=InnoDb;
-- 
-- 
-- -- Insertamos datos para testeo
-- INSERT INTO users VALUES(NULL, 1, 1, 1, 'Admin', NULL, NULL, CURTIME(),CURTIME(), NULL);
-- INSERT INTO users VALUES(NULL, 2, 2, 2, 'User', NULL, NULL, CURTIME(),CURTIME(), NULL);
-- INSERT INTO users VALUES(NULL, 3, 3, 3, 'Beneficiary', NULL, NULL, CURTIME(),CURTIME(), NULL);
-- INSERT INTO users VALUES(NULL, 4, 4, 4, 'Beneficiary', 'MatiasPrats@ortoprest.com', '123456', NULL, NULL, CURTIME(),CURTIME(), NULL);
-- 
-- /* TABLAS INTERMEDIAS */
-- 
-- CREATE TABLE IF NOT EXISTS tel_user(
-- number              int(255),
-- user_id             int(255),
-- tel_id              int(255),
-- created_at          datetime,
-- updated_at          datetime,
-- CONSTRAINT fk_user_tel FOREIGN KEY(user_id) REFERENCES user(id),
-- CONSTRAINT fk_user_tipotel FOREIGN KEY(tel_id) REFERENCES tel(id)
-- )ENGINE=InnoDb;
-- 
-- -- Insertamos datos para testeo
-- INSERT INTO tel_user VALUES(987201010, 1, 1, CURTIME(),CURTIME());
-- INSERT INTO tel_user VALUES(677001122, 2, 2, CURTIME(),CURTIME());
-- INSERT INTO tel_user VALUES(987987987, 3, 3, CURTIME(),CURTIME());
-- 
-- CREATE TABLE IF NOT EXISTS product_user(
-- user_id             int(255),
-- product_id          int(255),
-- created_at          datetime,
-- updated_at          datetime,
-- CONSTRAINT fk_user_product FOREIGN KEY(user_id) REFERENCES user(id),
-- CONSTRAINT fk_product FOREIGN KEY(product_id) REFERENCES product(id)
-- )ENGINE=InnoDb;
-- 
-- -- Insertamos datos para testeo
-- INSERT INTO product_user VALUES(3, 3, CURTIME(),CURTIME());

-- CREAMOS BD

CREATE DATABASE IF NOT EXISTS Ortoprest_Laravel;
USE Ortoprest_Laravel;

--TABLAS
CREATE TABLE IF NOT EXISTS product(
id                  int(255) auto_increment not null,
cod                 int(100),
description         text,
funding             float,
lapse               varchar(200),
center              varchar(200),
comments            text,
stock               int(100),
created_at          datetime,
updated_at          datetime,
CONSTRAINT pk_product PRIMARY KEY(id)
)ENGINE=InnoDb;

-- Insertamos datos para testeo
INSERT INTO product VALUES(null, 12210003, 'Silla de ruedas autopropulsable, plegable. Cualquier tamaño.', 337.17, '18 meses','Jose AguadoII','Recuperable', 2,CURTIME(),CURTIME());
INSERT INTO product VALUES(null, 12210006, 'Silla de ruedas fija.', 234.39, '24 meses','Jose AguadoI','Recuperable', 12,CURTIME(),CURTIME());
INSERT INTO product VALUES(null, 12030603, 'Bastón con apoyo en antebrazo, metálico, extensible y graduable (unidad).', 9.20, 'USUARIO APORTA 12.02€. PLAZO:12 meses','Condesa','Recuperable', 8,CURTIME(),CURTIME());

CREATE TABLE IF NOT EXISTS beneficiary(
id                  int(255) auto_increment not null,
product_id          int(255),
name                varchar(100),
surname1            varchar(200),
surname2            varchar(200),
dni                 varchar(20),
seg_social          varchar(100),
prov                varchar(100),
town                varchar(255),
domicile            varchar(255),
num                 int(100),
floor               int(100),
letter              varchar(10),
cod_post            int(100),
number_tel1         int(255),
number_tel2         int(255),
email               varchar(255),
ccc                 varchar(100),
role                varchar(20),
name_r              varchar(100),
surname1_r          varchar(200),
surname2_r          varchar(200),
dni_r               varchar(20),
related_r           varchar(100),
created_at          datetime,
updated_at          datetime,
CONSTRAINT pk_beneficiary PRIMARY KEY(id),
CONSTRAINT fk_product FOREIGN KEY(product_id) REFERENCES product(id)
)ENGINE=InnoDb;

-- -- Insertamos datos para testeo
INSERT INTO beneficiary VALUES(null,null, 'Beneficiario', '10123456A', '240011223344','Jag','Molar','Molar', 'León', 'León', 'Ordoño', 4, 2, 'A', 24001, 987987987, 600111222, '20141243231234567890', 'JagMolar@ortoprest.com', '123456', CURTIME(),CURTIME());
INSERT INTO beneficiary VALUES(null,null, 'Beneficiario', '20321456B', '241111223355','Antonio','Molina','Molar', 'León', 'Armunia', 'Bernesga', 3, 1, 'A', 24011, 987333987, 612121223, '20178903231234567890', 'AntonioMolina@ortoprest.com', '123456', CURTIME(),CURTIME());

CREATE TABLE IF NOT EXISTS user(
id                  int(255) auto_increment not null,
role                varchar(20),
image               varchar(255),
email               varchar(255),
password            varchar(255),
created_at          datetime,
updated_at          datetime,
remember_token      varchar(255),
CONSTRAINT pk_user PRIMARY KEY(id)
)ENGINE=InnoDb;


--TABLAS INTERMEDIAS

CREATE TABLE IF NOT EXISTS user_product(
user_id             int(255),
product_id          int(255),
created_at          datetime,
updated_at          datetime,
CONSTRAINT fk_user_product FOREIGN KEY(product_id) REFERENCES product(id),
CONSTRAINT fk_user_user FOREIGN KEY(user_id) REFERENCES user(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS beneficiary_user(
user_id             int(255),
beneficiary_id      int(255),
created_at          datetime,
updated_at          datetime,
CONSTRAINT fk_beneficiary_user FOREIGN KEY(user_id) REFERENCES user(id),
CONSTRAINT fk_beneficiary FOREIGN KEY(beneficiary_id) REFERENCES beneficiary(id)
)ENGINE=InnoDb;
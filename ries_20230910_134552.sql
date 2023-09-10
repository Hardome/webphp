-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE TABLE "clients" --------------------------------------
CREATE TABLE `clients`( 
	`lastName` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
	`id` Int( 0 ) NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci
ENGINE = InnoDB
AUTO_INCREMENT = 82;
-- -------------------------------------------------------------


-- CREATE TABLE "objects" --------------------------------------
CREATE TABLE `objects`( 
	`id` Int( 0 ) AUTO_INCREMENT NOT NULL,
	`type` Int( 0 ) NOT NULL,
	`price` Int( 0 ) NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci
ENGINE = InnoDB
AUTO_INCREMENT = 4;
-- -------------------------------------------------------------


-- CREATE TABLE "rents" ----------------------------------------
CREATE TABLE `rents`( 
	`id` Int( 0 ) AUTO_INCREMENT NOT NULL,
	`objectId` Int( 0 ) NOT NULL,
	`clientId` Int( 0 ) NOT NULL,
	`dateRent` Date NOT NULL,
	`rentDuration` Int( 0 ) NOT NULL,
	CONSTRAINT `unique_id` UNIQUE( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci
ENGINE = InnoDB
AUTO_INCREMENT = 4;
-- -------------------------------------------------------------


-- Dump data of "clients" ----------------------------------
BEGIN;

INSERT INTO `clients`(`lastName`,`id`) VALUES 
( 'Bedrin', '1' ),
( 'Ivanov', '2' ),
( 'Pavlinov', '3' ),
( 'Кухарин', '115' ),
( 'Немцов', '116' ),
( 'Серый', '117' ),
( 'Petrov', '118' ),
( 'Ситников', '121' );
COMMIT;
-- ---------------------------------------------------------


-- Dump data of "objects" ----------------------------------
BEGIN;

INSERT INTO `objects`(`id`,`type`,`price`) VALUES 
( '1', '1', '16800' ),
( '2', '1', '28000' ),
( '3', '2', '50000' ),
( '12', '6', '15000' ),
( '13', '55', '96000' ),
( '14', '1', '55000' );
COMMIT;
-- ---------------------------------------------------------


-- Dump data of "rents" ------------------------------------
BEGIN;

INSERT INTO `rents`(`id`,`objectId`,`clientId`,`dateRent`,`rentDuration`) VALUES 
( '1', '1', '1', '2009-09-20', '13' ),
( '2', '1', '2', '2007-01-20', '5' ),
( '3', '3', '3', '2005-06-20', '11' ),
( '5', '1', '1', '2023-09-10', '15' ),
( '7', '3', '2', '2023-08-29', '2' ),
( '11', '3', '3', '2222-03-23', '2' ),
( '12', '12', '116', '2004-03-20', '1' ),
( '13', '1', '1', '2023-09-09', '1' ),
( '14', '1', '1', '2023-08-30', '14' ),
( '15', '3', '3', '2023-09-06', '14' ),
( '16', '3', '115', '2023-09-18', '44' ),
( '17', '3', '117', '2023-09-19', '17' ),
( '18', '2', '118', '2023-09-14', '64' );
COMMIT;
-- ---------------------------------------------------------


-- CREATE INDEX "id" -------------------------------------------
CREATE INDEX `id` USING BTREE ON `clients`( `id` );
-- -------------------------------------------------------------


-- CHANGE "AUTOINCREMENT" OF "FIELD "id" -----------------------
ALTER TABLE `clients` MODIFY `id` Int( 0 ) AUTO_INCREMENT NOT NULL;
-- -------------------------------------------------------------


-- CREATE INDEX "clientId" -------------------------------------
CREATE INDEX `clientId` USING BTREE ON `rents`( `clientId` );
-- -------------------------------------------------------------


-- CREATE INDEX "objectId" -------------------------------------
CREATE INDEX `objectId` USING BTREE ON `rents`( `objectId` );
-- -------------------------------------------------------------


-- CREATE LINK "rents_ibfk_1" ----------------------------------
ALTER TABLE `rents`
	ADD CONSTRAINT `rents_ibfk_1` FOREIGN KEY ( `clientId` )
	REFERENCES `clients`( `id` )
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------


-- CREATE LINK "rents_ibfk_2" ----------------------------------
ALTER TABLE `rents`
	ADD CONSTRAINT `rents_ibfk_2` FOREIGN KEY ( `objectId` )
	REFERENCES `objects`( `id` )
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------



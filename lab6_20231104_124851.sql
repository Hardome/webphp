-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE TABLE "cars" -----------------------------------------
CREATE TABLE `cars`( 
	`id` Int( 0 ) AUTO_INCREMENT NOT NULL,
	`type` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
	`mark` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
	`cost` Float( 12, 0 ) NOT NULL,
	CONSTRAINT `id` UNIQUE( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- -------------------------------------------------------------


-- Dump data of "cars" -------------------------------------
BEGIN;

INSERT INTO `cars`(`id`,`type`,`mark`,`cost`) VALUES 
( '1', 'Грузовой', 'Газель', '16' ),
( '3', 'Грузовой', 'УАЗ', '14' ),
( '4', 'Грузовой', 'ЗИЛ', '30' ),
( '5', 'Грузовой', 'Mercedes — Benz', '22' ),
( '6', 'Грузовой', 'Volkswagen', '10.5' ),
( '7', 'Грузовой', 'Mitsubishi', '11' ),
( '8', 'Легковой', 'ВАЗ', '6.5' ),
( '9', 'Легковой', 'Toyota', '7' ),
( '10', 'Легковой', 'Renault', '6' ),
( '11', 'Легковой', 'Range Rover', '10.4' ),
( '12', 'Легковой', 'Kia', '8' );
COMMIT;
-- ---------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------



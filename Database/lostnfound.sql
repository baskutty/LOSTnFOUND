-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema lostnfound
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema lostnfound
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `lostnfound` DEFAULT CHARACTER SET latin1 ;
USE `lostnfound` ;

-- -----------------------------------------------------
-- Table `lostnfound`.`blog`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `lostnfound`.`blog` ;

CREATE TABLE IF NOT EXISTS `lostnfound`.`blog` (
  `refNo` INT(11) NOT NULL AUTO_INCREMENT,
  `timeStamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `spamCount` INT(11) NULL DEFAULT NULL,
  `viewCount` INT(11) NULL DEFAULT NULL,
  `text` TEXT NOT NULL,
  `ownerID` INT(11) NOT NULL,
  `status` TINYINT(1) NOT NULL,
  PRIMARY KEY (`refNo`))
ENGINE = InnoDB
AUTO_INCREMENT = 24
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `lostnfound`.`message`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `lostnfound`.`message` ;

CREATE TABLE IF NOT EXISTS `lostnfound`.`message` (
  `messageid` INT(11) NOT NULL AUTO_INCREMENT,
  `timeStamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sender` INT(11) NOT NULL,
  `reciever` INT(11) NOT NULL,
  `refNo` INT(11) NOT NULL,
  `text` TEXT NOT NULL,
  PRIMARY KEY (`messageid`))
ENGINE = InnoDB
AUTO_INCREMENT = 49
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `lostnfound`.`security_questions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `lostnfound`.`security_questions` ;

CREATE TABLE IF NOT EXISTS `lostnfound`.`security_questions` (
  `userID` INT(11) NOT NULL,
  `question` TEXT NOT NULL,
  `answer` TEXT NOT NULL,
  PRIMARY KEY (`question`(50), `userID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `lostnfound`.`spam`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `lostnfound`.`spam` ;

CREATE TABLE IF NOT EXISTS `lostnfound`.`spam` (
  `userID` INT(11) NOT NULL,
  `refNo` INT(11) NOT NULL,
  `spam` TEXT NOT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `lostnfound`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `lostnfound`.`user` ;

CREATE TABLE IF NOT EXISTS `lostnfound`.`user` (
  `userID` INT(11) NOT NULL AUTO_INCREMENT,
  `username` TEXT NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `emailID` TEXT NOT NULL,
  `flag` TINYINT(1) NOT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE INDEX `username` (`username`(50) ASC),
  UNIQUE INDEX `emailID` (`emailID`(50) ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

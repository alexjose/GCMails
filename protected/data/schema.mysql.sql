SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `GCMails` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `GCMails` ;

-- -----------------------------------------------------
-- Table `GCMails`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GCMails`.`User` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(128) NOT NULL,
  `password` VARCHAR(256) NOT NULL,
  `salt` VARCHAR(45) NOT NULL,
  `token` VARCHAR(45) NULL,
  `status` INT NULL DEFAULT 1,
  `createdAt` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GCMails`.`Profile`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GCMails`.`Profile` (
  `userID` INT UNSIGNED NOT NULL,
  `firstName` VARCHAR(45) NOT NULL,
  `lastName` VARCHAR(45) NOT NULL,
  `timeZoneID` INT NULL,
  `countryID` INT NULL,
  PRIMARY KEY (`userID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GCMails`.`Country`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GCMails`.`Country` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(128) NOT NULL,
  `timeZoneID` INT NULL,
  `status` INT NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GCMails`.`TimeZone`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GCMails`.`TimeZone` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(128) NOT NULL,
  `status` INT NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

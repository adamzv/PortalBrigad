SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `brigadyzv` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `brigadyzv` ;

-- -----------------------------------------------------
-- Table `brigadyzv`.`zamestnavatelia`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `brigadyzv`.`zamestnavatelia` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nazov` VARCHAR(30) NOT NULL ,
  `adresa` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(30) NOT NULL ,
  `telefon` VARCHAR(16) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `idzamestnavatelia_UNIQUE` (`id` ASC) ,
  UNIQUE INDEX `nazov_UNIQUE` (`nazov` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) ,
  UNIQUE INDEX `telefon_UNIQUE` (`telefon` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `brigadyzv`.`studenti`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `brigadyzv`.`studenti` (
  `idstudenti` INT NOT NULL AUTO_INCREMENT ,
  `meno` VARCHAR(20) NOT NULL ,
  `priezvisko` VARCHAR(20) NOT NULL ,
  `email` VARCHAR(30) NOT NULL ,
  `telefon` VARCHAR(16) NOT NULL ,
  `vzdelanie` VARCHAR(30) NOT NULL ,
  PRIMARY KEY (`idstudenti`) ,
  UNIQUE INDEX `idstudenti_UNIQUE` (`idstudenti` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) ,
  UNIQUE INDEX `telefon_UNIQUE` (`telefon` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `brigadyzv`.`kategorie`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `brigadyzv`.`kategorie` (
  `idkategorie` INT NOT NULL AUTO_INCREMENT ,
  `kategoria` VARCHAR(25) NOT NULL ,
  PRIMARY KEY (`idkategorie`) ,
  UNIQUE INDEX `idkategorie_UNIQUE` (`idkategorie` ASC) ,
  UNIQUE INDEX `kategoria_UNIQUE` (`kategoria` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `brigadyzv`.`brigady`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `brigadyzv`.`brigady` (
  `idbrigady` INT NOT NULL AUTO_INCREMENT ,
  `nazov` VARCHAR(40) NOT NULL ,
  `popis` TEXT NOT NULL ,
  `hod_mzda` DOUBLE NOT NULL ,
  `od` DATE NOT NULL ,
  `aktivna` TINYINT(1) NOT NULL ,
  `idzamestnavatelia` INT NOT NULL ,
  `idkategorie` INT NOT NULL ,
  PRIMARY KEY (`idbrigady`) ,
  UNIQUE INDEX `idbrigady_UNIQUE` (`idbrigady` ASC) ,
  INDEX `fk_brigady_zamestnavatelia_idx` (`idzamestnavatelia` ASC) ,
  INDEX `fk_brigady_kategorie1_idx` (`idkategorie` ASC) ,
  CONSTRAINT `fk_brigady_zamestnavatelia`
    FOREIGN KEY (`idzamestnavatelia` )
    REFERENCES `brigadyzv`.`zamestnavatelia` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_brigady_kategorie1`
    FOREIGN KEY (`idkategorie` )
    REFERENCES `brigadyzv`.`kategorie` (`idkategorie` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `brigadyzv`.`zrucnosti`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `brigadyzv`.`zrucnosti` (
  `idzrucnosti` INT NOT NULL AUTO_INCREMENT ,
  `zrucnost` VARCHAR(25) NOT NULL ,
  PRIMARY KEY (`idzrucnosti`) ,
  UNIQUE INDEX `idzrucnosti_UNIQUE` (`idzrucnosti` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `brigadyzv`.`studenti_has_zrucnosti`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `brigadyzv`.`studenti_has_zrucnosti` (
  `studenti_has_zrucnosti_id` INT NOT NULL AUTO_INCREMENT ,
  `studenti_idstudenti` INT NOT NULL ,
  `zrucnosti_idzrucnosti` INT NOT NULL ,
  PRIMARY KEY (`studenti_has_zrucnosti_id`) ,
  INDEX `fk_studenti_has_zrucnosti_zrucnosti1_idx` (`zrucnosti_idzrucnosti` ASC) ,
  INDEX `fk_studenti_has_zrucnosti_studenti1_idx` (`studenti_idstudenti` ASC) ,
  UNIQUE INDEX `studenti_has_zrucnosti_id_UNIQUE` (`studenti_has_zrucnosti_id` ASC) ,
  CONSTRAINT `fk_studenti_has_zrucnosti_studenti1`
    FOREIGN KEY (`studenti_idstudenti` )
    REFERENCES `brigadyzv`.`studenti` (`idstudenti` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_studenti_has_zrucnosti_zrucnosti1`
    FOREIGN KEY (`zrucnosti_idzrucnosti` )
    REFERENCES `brigadyzv`.`zrucnosti` (`idzrucnosti` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `brigadyzv`.`brigady_has_studenti`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `brigadyzv`.`brigady_has_studenti` (
  `brigady_has_studenti_id` INT NOT NULL AUTO_INCREMENT ,
  `brigady_idbrigady` INT NOT NULL ,
  `studenti_idstudenti` INT NOT NULL ,
  `nastup` DATE NULL ,
  `ukoncenie` DATE NULL ,
  `aktivna` TINYINT(1) NOT NULL ,
  `doh_hod_mzda` DOUBLE NOT NULL ,
  `celkovy_zarobok` DOUBLE NULL ,
  `provizia` DOUBLE NOT NULL ,
  INDEX `fk_brigady_has_studenti_studenti1_idx` (`studenti_idstudenti` ASC) ,
  INDEX `fk_brigady_has_studenti_brigady1_idx` (`brigady_idbrigady` ASC) ,
  PRIMARY KEY (`brigady_has_studenti_id`) ,
  CONSTRAINT `fk_brigady_has_studenti_brigady1`
    FOREIGN KEY (`brigady_idbrigady` )
    REFERENCES `brigadyzv`.`brigady` (`idbrigady` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_brigady_has_studenti_studenti1`
    FOREIGN KEY (`studenti_idstudenti` )
    REFERENCES `brigadyzv`.`studenti` (`idstudenti` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `brigadyzv` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

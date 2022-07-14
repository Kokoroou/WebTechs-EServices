-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema library
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema library
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `library` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `library` ;

-- -----------------------------------------------------
-- Table `library`.`book.publisher`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `library`.`book.publisher` (
  `publisher_id` INT NOT NULL,
  `name` NVARCHAR(50) NOT NULL,
  PRIMARY KEY (`publisher_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `library`.`book.book`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `library`.`book.book` (
  `book_id` INT NOT NULL,
  `isbn` VARCHAR(20) NULL,
  `title` NVARCHAR(50) NOT NULL,
  `publisher_id` INT NOT NULL,
  `date_added` DATE NOT NULL,
  `number_of_copies` INT NOT NULL,
  PRIMARY KEY (`book_id`),
  INDEX `publisher_id_idx` (`publisher_id` ASC) VISIBLE,
  CONSTRAINT `publisher_book`
    FOREIGN KEY (`publisher_id`)
    REFERENCES `library`.`book.publisher` (`publisher_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `library`.`book.category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `library`.`book.category` (
  `category_id` INT NOT NULL,
  `name` NVARCHAR(20) NOT NULL,
  PRIMARY KEY (`category_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `library`.`book.book_category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `library`.`book.book_category` (
  `book_id` INT NOT NULL,
  `category_id` INT NOT NULL,
  INDEX `book_id_idx` (`book_id` ASC) VISIBLE,
  INDEX `category_id_idx` (`category_id` ASC) VISIBLE,
  CONSTRAINT `book_book_category`
    FOREIGN KEY (`book_id`)
    REFERENCES `library`.`book.book` (`book_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `category_book_category`
    FOREIGN KEY (`category_id`)
    REFERENCES `library`.`book.category` (`category_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `library`.`book.author`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `library`.`book.author` (
  `author_id` INT NOT NULL,
  `first_name` NVARCHAR(20) NOT NULL,
  `middle_name` NVARCHAR(20) NULL,
  `last_name` NVARCHAR(20) NULL,
  PRIMARY KEY (`author_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `library`.`book.book_author`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `library`.`book.book_author` (
  `book_id` INT NOT NULL,
  `author_id` INT NOT NULL,
  INDEX `book_id_idx` (`book_id` ASC) VISIBLE,
  INDEX `author_id_idx` (`author_id` ASC) VISIBLE,
  CONSTRAINT `book_book_author`
    FOREIGN KEY (`book_id`)
    REFERENCES `library`.`book.book` (`book_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `author_book_author`
    FOREIGN KEY (`author_id`)
    REFERENCES `library`.`book.author` (`author_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `library`.`user.user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `library`.`user.user` (
  `user_id` INT NOT NULL,
  `account_name` VARCHAR(50) NOT NULL,
  `created_date` DATETIME NOT NULL,
  PRIMARY KEY (`user_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `library`.`user.librarian`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `library`.`user.librarian` (
  `librarian_id` INT NOT NULL,
  `first_name` NVARCHAR(20) NOT NULL,
  `middle_name` NVARCHAR(20) NULL,
  `last_name` NVARCHAR(20) NOT NULL,
  INDEX `user_id_idx` (`librarian_id` ASC) VISIBLE,
  CONSTRAINT `user_librarian`
    FOREIGN KEY (`librarian_id`)
    REFERENCES `library`.`user.user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `library`.`user.member`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `library`.`user.member` (
  `member_id` INT NOT NULL,
  `first_name` NVARCHAR(20) NULL,
  `middle_name` NVARCHAR(20) NULL,
  `last_name` NVARCHAR(20) NULL,
  INDEX `member_id_idx` (`member_id` ASC) VISIBLE,
  CONSTRAINT `user_member`
    FOREIGN KEY (`member_id`)
    REFERENCES `library`.`user.user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `library`.`user.password`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `library`.`user.password` (
  `user_id` INT NOT NULL,
  `password_hash` VARCHAR(45) NULL,
  `password_salt` VARCHAR(20) NULL,
  `modified_date` DATETIME NOT NULL,
  INDEX `user_id_idx` (`user_id` ASC) VISIBLE,
  CONSTRAINT `user_password`
    FOREIGN KEY (`user_id`)
    REFERENCES `library`.`user.user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `library`.`user.phone_number`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `library`.`user.phone_number` (
  `user_id` INT NOT NULL,
  `phone_number` VARCHAR(15) NOT NULL,
  `modified_date` DATETIME NOT NULL,
  INDEX `user_id_idx` (`user_id` ASC) VISIBLE,
  CONSTRAINT `user_phone_number`
    FOREIGN KEY (`user_id`)
    REFERENCES `library`.`user.user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `library`.`user.email_address`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `library`.`user.email_address` (
  `user_id` INT NOT NULL,
  `email_address` VARCHAR(100) NOT NULL,
  `modified_date` DATETIME NOT NULL,
  INDEX `user_id_idx` (`user_id` ASC) VISIBLE,
  CONSTRAINT `user_email_address`
    FOREIGN KEY (`user_id`)
    REFERENCES `library`.`user.user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `library`.`booklist.booklist`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `library`.`booklist.booklist` (
  `booklist_id` INT NOT NULL,
  `Name` NVARCHAR(50) NOT NULL,
  `user_id` INT NOT NULL,
  `created_date` DATETIME NOT NULL,
  PRIMARY KEY (`booklist_id`),
  INDEX `user_id_idx` (`user_id` ASC) VISIBLE,
  CONSTRAINT `user_booklist`
    FOREIGN KEY (`user_id`)
    REFERENCES `library`.`user.user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `library`.`booklist.booklist_book`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `library`.`booklist.booklist_book` (
  `booklist_id` INT NOT NULL,
  `book_id` INT NOT NULL,
  INDEX `booklist_id_idx` (`booklist_id` ASC) VISIBLE,
  INDEX `book_id_idx` (`book_id` ASC) VISIBLE,
  CONSTRAINT `booklist_booklist_book`
    FOREIGN KEY (`booklist_id`)
    REFERENCES `library`.`booklist.booklist` (`booklist_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `book_booklist_book`
    FOREIGN KEY (`book_id`)
    REFERENCES `library`.`book.book` (`book_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `library`.`book.popular`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `library`.`book.popular` (
  `book_id` INT NOT NULL,
  `favorite_number` INT NOT NULL DEFAULT 0,
  INDEX `book_id_idx` (`book_id` ASC) VISIBLE,
  CONSTRAINT `book_popular`
    FOREIGN KEY (`book_id`)
    REFERENCES `library`.`book.book` (`book_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `library`.`borrow.borrowing`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `library`.`borrow.borrowing` (
  `borrow_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `book_id` INT NOT NULL,
  `borrow_date` DATE NOT NULL,
  `due_date` DATE NOT NULL,
  PRIMARY KEY (`borrow_id`),
  INDEX `user_id_idx` (`user_id` ASC) VISIBLE,
  INDEX `book_id_idx` (`book_id` ASC) VISIBLE,
  CONSTRAINT `user_borrowing`
    FOREIGN KEY (`user_id`)
    REFERENCES `library`.`user.user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `book_borrowing`
    FOREIGN KEY (`book_id`)
    REFERENCES `library`.`book.book` (`book_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

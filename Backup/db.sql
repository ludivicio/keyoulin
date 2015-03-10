SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `keyoulin` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `keyoulin` ;

-- -----------------------------------------------------
-- Table `keyoulin`.`order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `keyoulin`.`orders` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(16) NOT NULL DEFAULT '' COMMENT '收货人姓名',
  `phone` VARCHAR(11) NOT NULL DEFAULT '' COMMENT '收货人联系方式',
  `address` VARCHAR(255) NOT NULL COMMENT '收货人地址',
  `ip` VARCHAR(15) NOT NULL COMMENT '访问的IP',
  `qq` VARCHAR(15) NULL COMMENT 'QQ',
  `message` TEXT NULL COMMENT '用户留言',
  PRIMARY KEY (`id`))
ENGINE = MyISAM
COMMENT = '订单表';

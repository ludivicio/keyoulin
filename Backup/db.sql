
CREATE SCHEMA IF NOT EXISTS `keyoulin` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `keyoulin` ;

-- -----------------------------------------------------
-- Table `keyoulin`.`order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL DEFAULT '' COMMENT '收货人姓名',
  `phone` varchar(11) NOT NULL DEFAULT '' COMMENT '收货人联系方式',
  `address` varchar(255) NOT NULL COMMENT '收货人地址',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '订单时间',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '订单状态',
  `ip` varchar(15) NOT NULL COMMENT '访问的IP',
  `qq` varchar(15) DEFAULT NULL COMMENT 'QQ',
  `message` text COMMENT '用户留言',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='订单表' AUTO_INCREMENT=4 ;

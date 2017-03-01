
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- product
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(128) NOT NULL,
    `url` VARCHAR(128) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- image
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `image`;

CREATE TABLE `image`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `url` VARCHAR(1000) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- product_image
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `product_image`;

CREATE TABLE `product_image`
(
    `product_id` INTEGER NOT NULL,
    `image_id` INTEGER NOT NULL,
    PRIMARY KEY (`product_id`,`image_id`),
    INDEX `product_image_fi_810cd0` (`image_id`),
    CONSTRAINT `product_image_fk_0f5ed8`
        FOREIGN KEY (`product_id`)
        REFERENCES `product` (`id`),
    CONSTRAINT `product_image_fk_810cd0`
        FOREIGN KEY (`image_id`)
        REFERENCES `image` (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;

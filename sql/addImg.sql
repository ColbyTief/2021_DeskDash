ALTER TABLE `deskdash`.`fooditems` 
ADD COLUMN `imgpath` VARCHAR(65) NULL AFTER `foodtype`;
ALTER TABLE `deskdash`.`fooditems` 
ADD COLUMN `cost` FLOAT NULL AFTER `imgpath`;

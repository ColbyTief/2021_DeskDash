ALTER TABLE `id16720626_deskdash`.`fooditems` 
ADD COLUMN `imgpath` VARCHAR(65) NULL AFTER `foodtype`;
ALTER TABLE `id16720626_deskdash`.`fooditems` 
ADD COLUMN `cost` FLOAT NULL AFTER `imgpath`;

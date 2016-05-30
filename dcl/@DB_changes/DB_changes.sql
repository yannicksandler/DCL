
USE `dcl_webapp`;

/* Alter table in target */
ALTER TABLE `nota_debito` 
	ADD COLUMN `importerechazo` decimal(10,2)   NULL after `fechaanulacion`, COMMENT='';
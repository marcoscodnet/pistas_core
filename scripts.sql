ALTER TABLE `pistas_pista`
	ADD COLUMN `mp3` VARCHAR(255) NULL AFTER `nombre`;
	
ALTER TABLE `pistas_artista`
	ADD COLUMN `imagen` VARCHAR(255) NULL DEFAULT NULL AFTER `nombre`;
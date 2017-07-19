-- Suppression des triggers
DROP TRIGGER dont_delete_collaborateur;
DROP TRIGGER delete_operations_when_deleting_folder;
DROP TRIGGER log_deletion;
DROP TRIGGER log_collaborateur;
DROP TRIGGER log_operation;
DROP TRIGGER log_association;
DROP PROCEDURE log_deletion;

DELIMITER //
-- Trigger pour éviter la suppression d'un operateur si il est associé a des dossiers.

CREATE TRIGGER dont_delete_collaborateur BEFORE DELETE 
	ON collaborateur FOR EACH ROW

BEGIN
	DECLARE num_collab INT;

	SELECT count(code_collaborateur) 
	FROM affectation 
	WHERE code_collaborateur = OLD.code
	INTO num_collab;

	IF (num_collab > 0) THEN
		SIGNAL SQLSTATE '45000' 
		SET message_text = 'Impossible de supprimer un collaborateur si il est associé a un dossier.';
	END IF;

END; //

-- Trigger pour supprimer les opérations associées au dossier 
CREATE TRIGGER delete_operations_when_deleting_folder AFTER DELETE
	ON dossier FOR EACH ROW

BEGIN
	
	DELETE FROM operation WHERE code_dossier = OLD.code_dossier;
END; //



-- Procédure pour journaliser les suppressions.

CREATE PROCEDURE log_deletion 
(IN element_deleted CHAR(50))
BEGIN
	INSERT INTO log (date_suppression, user, description) values (NOW(), USER(), element_deleted);
END; //

-- Triggers pour appeler la procédure de journalisation
CREATE TRIGGER log_dossier AFTER DELETE
	ON dossier FOR EACH ROW

BEGIN
	CALL log_deletion('Dossier');
END; //

----------------------------------------------
CREATE TRIGGER log_collaborateur AFTER DELETE
	ON collaborateur FOR EACH ROW

BEGIN
	CALL log_deletion('Collaborateur');
END; //

----------------------------------------------
CREATE TRIGGER log_operation AFTER DELETE
	ON operation FOR EACH ROW

BEGIN
	CALL log_deletion('Operation');
END; //

----------------------------------------------
CREATE TRIGGER log_association AFTER DELETE
	ON association FOR EACH ROW

BEGIN
	CALL log_deletion('Association');
END; //

DELIMITER ;
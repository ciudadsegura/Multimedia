use reportes;
DELIMITER $$
CREATE TRIGGER ticketes_triger2
AFTER INSERT ON tickts 
FOR EACH ROW
BEGIN
IF EXISTS 
	(SELECT ticket FROM tickets WHERE ticket = new.ticket)
	THEN
	UPDATE tickets 
		SET tickets.full_category_name = new.full_category_name, tickets.ps_name = new.ps_name,
			tickets.place_name = new.place_name, tickets.id_ci = new.id_ci,
            tickets.description_coments = new.description_coments,
			tickets.closing_time = new.closing_time, tickets.create_time = new.create_time,
			tickets.incident_priority = new.incident_priority, tickets.incident_status = new.incident_status,
			tickets.incident_type = new.incident_type, tickets.estatus= 'Actualizado'
			WHERE tickets.ticket = new.ticket;
ELSE	
		INSERT INTO tickets 
		VALUES (new.ticket,new.full_category_name,new.ps_name,new.place_name,new.id_ci, new.description_coments,
				new.closing_time,new.create_time,new.incident_priority,new.incident_status,new.incident_type,'Nuevo');
 END IF;
END $$
DELIMITER ;
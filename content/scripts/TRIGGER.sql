-- Disparador cuando actualizó un votante--
DELIMITER $$ 
CREATE TRIGGER Uphistorialvotante
AFTER UPDATE ON votante
FOR EACH ROW
BEGIN
 INSERT INTO historial_votante(idTipoDocumento,idEstadoUsuario,idUsuario,noDocumento,nombre,apellido,idGenero,movil,direccion,idDepartamento,idCiudad,fecha,tipo,estado)
 values(old.idTipoDocumento,old.idEstadoUsuario,old.idUsuario,old.noDocumento,old.nombre,old.apellido,old.idGenero,old.movil,old.direccion,old.idDepartamento,old.idCiudad,NOW(),'actualizado',0);
END$$
DELIMITER ;
-- Disparador cuando editó un votante--
DELIMITER $$ 
CREATE TRIGGER Inhistorialvotante
AFTER INSERT ON votante
FOR EACH ROW
BEGIN
 INSERT INTO historial_votante(idTipoDocumento,idEstadoUsuario,idUsuario,noDocumento,nombre,apellido,idGenero,movil,direccion,idDepartamento,idCiudad,fecha,tipo,estado)
 values(new.idTipoDocumento,new.idEstadoUsuario,new.idUsuario,new.noDocumento,new.nombre,new.apellido,new.idGenero,new.movil,new.direccion,new.idDepartamento,new.idCiudad,NOW(),'insertado',0);
END$$
DELIMITER ;
-- Disparador cuando eliminó un votante--
DELIMITER $$ 
CREATE TRIGGER Delhistorialvotante
AFTER DELETE ON votante
FOR EACH ROW
BEGIN
 INSERT INTO historial_votante(idTipoDocumento,idEstadoUsuario,idUsuario,noDocumento,nombre,apellido,idGenero,movil,direccion,idDepartamento,idCiudad,fecha,tipo,estado)
 values(old.idTipoDocumento,old.idEstadoUsuario,old.idUsuario,old.noDocumento,old.nombre,old.apellido,old.idGenero,old.movil,old.direccion,old.idDepartamento,old.idCiudad,NOW(),'eliminado',0);
END$$
DELIMITER ;
-- Disparador cuando actualizó un usuario--
DELIMITER $$ 
CREATE TRIGGER Uphistorialusuario
AFTER UPDATE ON usuario
FOR EACH ROW
BEGIN
 INSERT INTO historial_usuario(idTipoDocumento,idTipoUsuario,idEstadoUsuario,noDocumento,nombre,apellido,password,idGenero,telefono,movil,email,direccion,idDepartamento,idCiudad,fecha,tipo,estado)
 values(old.idTipoDocumento,old.idTipoUsuario,old.idEstadoUsuario,old.noDocumento,old.nombre,old.apellido,old.password,old.idGenero,old.telefono,old.movil,old.email,old.direccion,old.idDepartamento,old.idCiudad,NOW(),'actualizado',0);
END$$
DELIMITER ;
-- Disparador cuando inserto un usuario--
DELIMITER $$
CREATE TRIGGER Inhistorialusuario
AFTER INSERT ON usuario
FOR EACH ROW
BEGIN
 INSERT INTO historial_usuario(idTipoDocumento,idTipoUsuario,idEstadoUsuario,noDocumento,nombre,apellido,password,idGenero,telefono,movil,email,direccion,idDepartamento,idCiudad,fecha,tipo,estado)
 values(new.idTipoDocumento,new.idTipoUsuario,new.idEstadoUsuario,new.noDocumento,new.nombre,new.apellido,new.password,new.idGenero,new.telefono,new.movil,new.email,new.direccion,new.idDepartamento,new.idCiudad,NOW(),'insertado',0);
END$$
DELIMITER ;
-- Disparador cuando eliminó un usuario--
DELIMITER $$
CREATE TRIGGER Delhistorialusuario
AFTER DELETE ON usuario
FOR EACH ROW
BEGIN
 INSERT INTO historial_usuario(idTipoDocumento,idTipoUsuario,idEstadoUsuario,noDocumento,nombre,apellido,password,idGenero,telefono,movil,email,direccion,idDepartamento,idCiudad,fecha,tipo,estado)
 values(old.idTipoDocumento,old.idTipoUsuario,old.idEstadoUsuario,old.noDocumento,old.nombre,old.apellido,old.password,old.idGenero,old.telefono,old.movil,old.email,old.direccion,old.idDepartamento,old.idCiudad,NOW(),'eliminado',0);
END$$
-- Disparador cuando actualizó el puesto de votacion de un votante--
DELIMITER $$
CREATE TRIGGER Uphistorialregistrovotante
AFTER UPDATE ON registro_votante
FOR EACH ROW
BEGIN
 INSERT INTO historial_registro_votante(idVotante,idPuesto,mesa,comentario,fecha,tipo,estado)
 values(old.idVotante,old.idPuesto,old.mesa,old.comentario,NOW(),'actualizado',0);
END$$
DELIMITER ;
-- Disparador cuando insertó el puesto de votacion de un votante--
DELIMITER $$
CREATE TRIGGER Inhistorialregistrovotante
AFTER INSERT ON registro_votante
FOR EACH ROW
BEGIN
 INSERT INTO historial_registro_votante(idVotante,idPuesto,mesa,comentario,fecha,tipo,estado)
 values(new.idVotante,new.idPuesto,new.mesa,new.comentario,NOW(),'insertado',0);
END$$
DELIMITER ;
-- Disparador cuando eliminó el puesto de votacion de un votante--
DELIMITER $$
CREATE TRIGGER Delhistorialregistrovotante
AFTER DELETE ON registro_votante
FOR EACH ROW
BEGIN
 INSERT INTO historial_registro_votante(idVotante,idPuesto,mesa,comentario,fecha,tipo,estado)
 values(old.idVotante,old.idPuesto,old.mesa,old.comentario,NOW(),'eliminado',0);
END$$
DELIMITER ;


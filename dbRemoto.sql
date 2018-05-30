
USE `id6002201_selectsalv` ;

-- -----------------------------------------------------
-- Table `selectsalv`.`partido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `selectsalv`.`partido` (
  `idPartido` INT(11) NOT NULL AUTO_INCREMENT,
  `nomPartido` VARCHAR(100) NULL DEFAULT NULL,
  `rutaBandera` VARCHAR(100) NULL DEFAULT NULL,
  `estado` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idPartido`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `selectsalv`.`estadocivil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `selectsalv`.`estadocivil` (
  `idEstadoCivil` INT(11) NOT NULL AUTO_INCREMENT,
  `descEstadoCivil` VARCHAR(25) NULL DEFAULT NULL,
  PRIMARY KEY (`idEstadoCivil`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `selectsalv`.`genero`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `selectsalv`.`genero` (
  `idGenero` INT(11) NOT NULL AUTO_INCREMENT,
  `descGenero` VARCHAR(25) NULL DEFAULT NULL,
  PRIMARY KEY (`idGenero`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `selectsalv`.`departamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `selectsalv`.`departamento` (
  `idDepartamento` INT(11) NOT NULL AUTO_INCREMENT,
  `nomDepartamento` VARCHAR(150) NULL DEFAULT NULL,
  PRIMARY KEY (`idDepartamento`))
ENGINE = InnoDB
AUTO_INCREMENT = 15
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `selectsalv`.`municipio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `selectsalv`.`municipio` (
  `idMunicipio` INT(11) NOT NULL AUTO_INCREMENT,
  `nomMunicipio` VARCHAR(150) NULL DEFAULT NULL,
  `idDepartamento` INT(11) NOT NULL,
  PRIMARY KEY (`idMunicipio`),
  INDEX `fk_idDepartamento_Municipio` (`idDepartamento` ASC),
  CONSTRAINT `fk_idDepartamento_Municipio`
    FOREIGN KEY (`idDepartamento`)
    REFERENCES `selectsalv`.`departamento` (`idDepartamento`))
ENGINE = InnoDB
AUTO_INCREMENT = 263
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `selectsalv`.`persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `selectsalv`.`persona` (
  `idPersona` INT(11) NOT NULL AUTO_INCREMENT,
  `dui` VARCHAR(15) NOT NULL,
  `nomPersona` VARCHAR(100) NULL DEFAULT NULL,
  `apePersona` VARCHAR(100) NULL DEFAULT NULL,
  `idgenero` INT(11) NULL DEFAULT NULL,
  `fechaNac` DATE NULL DEFAULT NULL,
  `fechaVenc` DATE NULL DEFAULT NULL,
  `fechaReg` DATE NULL DEFAULT NULL,
  `estado` INT(11) NULL DEFAULT NULL,
  `profesion` VARCHAR(100) NULL DEFAULT NULL,
  `direccion` VARCHAR(250) NULL DEFAULT NULL,
  `idEstadoCivil` INT(11) NULL DEFAULT NULL,
  `estadoVotacion` INT(11) NULL DEFAULT NULL,
  `idMunicipio` INT(11) NOT NULL,
  PRIMARY KEY (`idPersona`),
  INDEX `fk_idMunicipio_Municipio` (`idMunicipio` ASC),
  INDEX `fk_idGenero_Persona` (`idgenero` ASC),
  INDEX `fk_idEstadoCivil_Persona` (`idEstadoCivil` ASC),
  CONSTRAINT `fk_idEstadoCivil_Persona`
    FOREIGN KEY (`idEstadoCivil`)
    REFERENCES `selectsalv`.`estadocivil` (`idEstadoCivil`),
  CONSTRAINT `fk_idGenero_Persona`
    FOREIGN KEY (`idgenero`)
    REFERENCES `selectsalv`.`genero` (`idGenero`),
  CONSTRAINT `fk_idMunicipio_Municipio`
    FOREIGN KEY (`idMunicipio`)
    REFERENCES `selectsalv`.`municipio` (`idMunicipio`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `selectsalv`.`tipocandidato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `selectsalv`.`tipocandidato` (
  `idTipoCandidato` INT(11) NOT NULL AUTO_INCREMENT,
  `codTipoCandidato` VARCHAR(100) NULL DEFAULT NULL,
  `descTipoCandidato` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`idTipoCandidato`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `selectsalv`.`candidato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `selectsalv`.`candidato` (
  `idCandidato` INT(11) NOT NULL AUTO_INCREMENT,
  `idPartido` INT(11) NOT NULL,
  `idTipoCandidato` INT(11) NOT NULL,
  `idPersona` INT(11) NOT NULL,
  `rutaCandidato` VARCHAR(100) NULL DEFAULT NULL,
  `estado` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idCandidato`),
  INDEX `fk_idPartido_Candidato` (`idPartido` ASC),
  INDEX `fk_idTipoCandidato_Candidato` (`idTipoCandidato` ASC),
  INDEX `fk_idPersona_Candidato` (`idPersona` ASC),
  CONSTRAINT `fk_idPartido_Candidato`
    FOREIGN KEY (`idPartido`)
    REFERENCES `selectsalv`.`partido` (`idPartido`),
  CONSTRAINT `fk_idPersona_Candidato`
    FOREIGN KEY (`idPersona`)
    REFERENCES `selectsalv`.`persona` (`idPersona`),
  CONSTRAINT `fk_idTipoCandidato_Candidato`
    FOREIGN KEY (`idTipoCandidato`)
    REFERENCES `selectsalv`.`tipocandidato` (`idTipoCandidato`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `selectsalv`.`centrovotacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `selectsalv`.`centrovotacion` (
  `idCentro` INT(11) NOT NULL AUTO_INCREMENT,
  `nomCentro` VARCHAR(150) NULL DEFAULT NULL,
  `idMunicipio` INT(11) NOT NULL,
  PRIMARY KEY (`idCentro`),
  INDEX `fk_idMunicipio_CV` (`idMunicipio` ASC),
  CONSTRAINT `fk_idMunicipio_CV`
    FOREIGN KEY (`idMunicipio`)
    REFERENCES `selectsalv`.`municipio` (`idMunicipio`))
ENGINE = InnoDB
AUTO_INCREMENT = 263
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `selectsalv`.`jrv`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `selectsalv`.`jrv` (
  `idJrv` INT(11) NOT NULL AUTO_INCREMENT,
  `numJrv` VARCHAR(20) NOT NULL,
  `idCentro` INT(11) NOT NULL,
  PRIMARY KEY (`idJrv`),
  INDEX `fk_idCentro_Jrv` (`idCentro` ASC),
  CONSTRAINT `fk_idCentro_Jrv`
    FOREIGN KEY (`idCentro`)
    REFERENCES `selectsalv`.`centrovotacion` (`idCentro`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `selectsalv`.`padron`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `selectsalv`.`padron` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `idPersona` INT(11) NOT NULL,
  `idJrv` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_idPersona_padron` (`idPersona` ASC),
  INDEX `fk_idJrv` (`idJrv` ASC),
  CONSTRAINT `fk_idJrv`
    FOREIGN KEY (`idJrv`)
    REFERENCES `selectsalv`.`jrv` (`idJrv`),
  CONSTRAINT `fk_idPersona_padron`
    FOREIGN KEY (`idPersona`)
    REFERENCES `selectsalv`.`persona` (`idPersona`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `selectsalv`.`detallevoto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `selectsalv`.`detallevoto` (
  `idDetalleVoto` INT(11) NOT NULL AUTO_INCREMENT,
  `idPartido` INT(11) NOT NULL,
  `idPadron` INT(11) NOT NULL,
  PRIMARY KEY (`idDetalleVoto`),
  INDEX `fk_idPartido_DetalleVoto` (`idPartido` ASC),
  INDEX `fk_idPadron_DetalleVoto` (`idPadron` ASC),
  CONSTRAINT `fk_idPadron_DetalleVoto`
    FOREIGN KEY (`idPadron`)
    REFERENCES `selectsalv`.`padron` (`id`),
  CONSTRAINT `fk_idPartido_DetalleVoto`
    FOREIGN KEY (`idPartido`)
    REFERENCES `selectsalv`.`partido` (`idPartido`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `selectsalv`.`rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `selectsalv`.`rol` (
  `idRol` INT(11) NOT NULL AUTO_INCREMENT,
  `codRol` TEXT NULL DEFAULT NULL,
  `estado` INT(11) NULL DEFAULT NULL,
  `descRol` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`idRol`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `selectsalv`.`tipotransaccion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `selectsalv`.`tipotransaccion` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descTransaccion` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 13
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `selectsalv`.`transacciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `selectsalv`.`transacciones` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` INT(11) NULL DEFAULT NULL,
  `idTipo` INT(11) NULL DEFAULT NULL,
  `fecha` DATE NULL DEFAULT NULL,
  `hora` VARCHAR(25) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tipoTransaccion` (`idTipo` ASC),
  CONSTRAINT `fk_tipoTransaccion`
    FOREIGN KEY (`idTipo`)
    REFERENCES `selectsalv`.`tipotransaccion` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `selectsalv`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `selectsalv`.`usuario` (
  `idUsuario` INT(11) NOT NULL AUTO_INCREMENT,
  `nomUsuario` TEXT NULL DEFAULT NULL,
  `pass` TEXT NULL DEFAULT NULL,
  `estado` INT(11) NULL DEFAULT NULL,
  `idRol` INT(11) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  INDEX `fk_idRol_Usuario` (`idRol` ASC),
  CONSTRAINT `fk_idRol_Usuario`
    FOREIGN KEY (`idRol`)
    REFERENCES `selectsalv`.`rol` (`idRol`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;

USE `selectsalv` ;

-- -----------------------------------------------------
-- Placeholder table for view `selectsalv`.`v_boleta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `selectsalv`.`v_boleta` (`id` INT);

-- -----------------------------------------------------
-- Placeholder table for view `selectsalv`.`v_candidatos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `selectsalv`.`v_candidatos` (`id` INT);

-- -----------------------------------------------------
-- Placeholder table for view `selectsalv`.`v_getcandidatos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `selectsalv`.`v_getcandidatos` (`id` INT);

-- -----------------------------------------------------
-- Placeholder table for view `selectsalv`.`v_persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `selectsalv`.`v_persona` (`id` INT);

-- -----------------------------------------------------
-- Placeholder table for view `selectsalv`.`v_transacciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `selectsalv`.`v_transacciones` (`id` INT);

-- -----------------------------------------------------
-- Placeholder table for view `selectsalv`.`v_usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `selectsalv`.`v_usuarios` (`id` INT);

-- -----------------------------------------------------
-- Placeholder table for view `selectsalv`.`v_voto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `selectsalv`.`v_voto` (`id` INT);

-- -----------------------------------------------------
-- procedure p_EditarPartido
-- -----------------------------------------------------

DELIMITER $$
USE `selectsalv`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_EditarPartido`(
	in id int, 
    in nom varchar(100),
    in ruta varchar(100)
)
begin
	update partido
    set nomPartido = nom, rutaBandera = ruta
    where idPartido = id;
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure p_EditarPersona
-- -----------------------------------------------------

DELIMITER $$
USE `selectsalv`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_EditarPersona`(
	in id int,
	in ndui varchar(15),
    in nom varchar(100),
    in ape varchar(100),
    in gen int,
    in edfechanac date,
    in edfechavenc date,
    in prof varchar(100),
    in direc varchar(250),
    in estadoCiv int,
    in municipio int,
    in iduser int
)
begin
	update persona 
    set dui = ndui, nomPersona = nom, apePersona = ape, idgenero = gen, fechaNac = edfechanac, profesion = prof, direccion = direc, idEstadoCivil = estadoCiv, idMunicipio = municipio
    where idPersona = id;
    call p_RegTransaccion(iduser,3);
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure p_EditarUsuario
-- -----------------------------------------------------

DELIMITER $$
USE `selectsalv`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_EditarUsuario`(
	in nid int, 
    in nom text,
    in contra text,
    in erol text,
    in usuario int
)
begin
	declare ideRol int;
    set ideRol = (select idRol from Rol where codRol = erol);
    update usuario
    set nomUsuario = nom, pass = contra, idRol = ideRol
    where idUsuario = nid;
    call p_RegTransaccion(usuario, 6);
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure p_EliminarCandidato
-- -----------------------------------------------------

DELIMITER $$
USE `selectsalv`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_EliminarCandidato`(
	in id int
)
begin
	update candidato
    set estado = 0
    where idCandidato = id; 
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure p_EliminarPartido
-- -----------------------------------------------------

DELIMITER $$
USE `selectsalv`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_EliminarPartido`(
	in id int,
    in usuario int
)
begin
	update partido
    set estado = 0
    where idPartido = id; 
    call p_RegTransaccion(usuario, 8);
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure p_EliminarPersona
-- -----------------------------------------------------

DELIMITER $$
USE `selectsalv`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_EliminarPersona`(
	in id int,
    in iduser int
)
begin
	update persona 
    set estado = 0
    where idPersona = id;
    call p_RegTransaccion(iduser,2);
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure p_EliminarUsuario
-- -----------------------------------------------------

DELIMITER $$
USE `selectsalv`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_EliminarUsuario`(
	in nid int,
    in usuario int
)
begin
	update Usuario set estado = 0 where idUsuario = nid;
    call p_RegTransaccion(usuario, 5);
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure p_RegCandidato
-- -----------------------------------------------------

DELIMITER $$
USE `selectsalv`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_RegCandidato`(
	in partido int,
    in tipo int,
    in ndui varchar(15),
    in ruta varchar(100),
    in estado int
    
)
begin
	declare persona int;
    set persona = (select idPersona from Persona where dui = ndui);
    insert into Candidato values(null, partido, tipo, persona, ruta, estado);
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure p_RegPartido
-- -----------------------------------------------------

DELIMITER $$
USE `selectsalv`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_RegPartido`(
	in nom varchar(100),
    in ruta varchar(100),
    in usuario int
)
begin
	insert into partido values(null, nom, ruta, 1);
    call p_RegTransaccion(usuario, 7);
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure p_RegTransaccion
-- -----------------------------------------------------

DELIMITER $$
USE `selectsalv`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_RegTransaccion`(
	in usuario int,
    in tipo int
)
begin
	insert into transacciones values(null, usuario, tipo, curdate(), DATE_FORMAT(NOW( ), "%H:%i:%S" ));
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure p_RegUsuario
-- -----------------------------------------------------

DELIMITER $$
USE `selectsalv`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_RegUsuario`(
    in nom text,
    in contra text,
    in rol text, 
    in iduser int
)
begin
	declare ideRol int;
    set ideRol = (select idRol from Rol where codRol = rol);
    insert into Usuario values(null, nom, contra, 1, ideRol);
    call p_RegTransaccion(iduser,4);
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure p_Votar
-- -----------------------------------------------------

DELIMITER $$
USE `selectsalv`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_Votar`(
	in partido int,
    in ndui varchar(15)
)
begin
	declare persona int;
    declare padron int;
    set persona = (select idPersona from persona where dui = ndui);
    set padron = (select id from padron where idPersona = persona);
    insert into DetalleVoto value(null,partido, padron);
    update persona set estadoVotacion = 1 where idPersona = persona;
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure p_buscarCandidato
-- -----------------------------------------------------

DELIMITER $$
USE `selectsalv`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_buscarCandidato`(
	in ndui int
   
    
)
begin
	declare id int;
    set id= (select idPersona from Persona where dui = ndui);
    select idCandidato from candidato where idPersona=id and estado=1;
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure p_loginUsuario
-- -----------------------------------------------------

DELIMITER $$
USE `selectsalv`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_loginUsuario`(
    in nom text,
    in contra text
)
begin
    select * from v_Usuarios where nomUsuario = nom and pass = contra;
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure p_obtenerCandidatoId
-- -----------------------------------------------------

DELIMITER $$
USE `selectsalv`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_obtenerCandidatoId`(
    in nuid int
)
begin
    select * from v_Candidatos where idCandidato = nuid;
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure p_obtenerPersona
-- -----------------------------------------------------

DELIMITER $$
USE `selectsalv`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_obtenerPersona`(
	in ndui varchar(15)
)
begin
	select * from v_Persona where dui = ndui;
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure p_obtenerPersonaId
-- -----------------------------------------------------

DELIMITER $$
USE `selectsalv`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_obtenerPersonaId`(
	in nid int
)
begin
	select * from v_Persona where idPersona = nid;
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure p_obtenerUsuarioId
-- -----------------------------------------------------

DELIMITER $$
USE `selectsalv`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_obtenerUsuarioId`(
	in nid int
)
begin
	select * from v_Usuarios where idUsuario = nid;
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure p_regMunicipio
-- -----------------------------------------------------

DELIMITER $$
USE `selectsalv`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_regMunicipio`(
	in nom varchar(150),
    in dep int
)
begin
	declare nomCv varchar(50);
    declare mun int;
    set nomCv = concat("Centro de Votacion ", nom);
	insert into Municipio values(null, nom, dep);
    set mun = (select idMunicipio from Municipio where nomMunicipio = nom and idDepartamento = dep);
    insert into CentroVotacion values(null, nomCv, mun);
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure p_regPersona
-- -----------------------------------------------------

DELIMITER $$
USE `selectsalv`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_regPersona`(
    in dui varchar(15),
    in nom varchar(100),
    in ape varchar(100),
    in gen int,
    in fechanac date,
    in fechavenc date,
    in prof varchar(100),
    in direc varchar(250),
    in estadoCiv int,
    in municipio varchar(50),
    in iduser int
)
begin
    declare numJrv int;
    declare codJrv varchar(10);
    declare idPersonaP int;
    declare idJrvP int;
    declare numPersonas int;
    declare codMunicipio int;
    
    set codMunicipio = (select idMunicipio from municipio where nomMunicipio = municipio); 
    insert into Persona values (null, dui, nom, ape, gen, fechanac, fechavenc, curdate(), 1, prof, direc, estadoCiv, 0, codMunicipio);
    set numJrv = (select count(idJrv) from Jrv where idCentro = codMunicipio);
    
    if numJrv = 0 then
            set codJRv = concat(codMunicipio, 1);
            insert into Jrv values(null, codJrv, codMunicipio);
            set idPersonaP = (select max(idPersona) from Persona);
            set idJrvP = (select max(idJrv) from Jrv where idCentro = codMunicipio);
            insert into padron values(null, idPersonaP, idJrvP);
    elseif  numJrv > 0 then
            set idPersonaP = (select max(idPersona) from Persona);
            set idJrvP = (select max(idJrv) from Jrv where idCentro = codMunicipio);
            set numPersonas = (select count(idPersona) from padron where idJrv = idJrvP);
            if numPersonas < 10 then
                insert into padron values(null, idPersonaP, idJrvP);
            else
                set idJrvP = (select max(idJrv) from Jrv where idCentro = codMunicipio);
                set idJrvP = idJrvP + 1;
                set codJrv = concat(codMunicipio, idJrvP);
                insert into Jrv values(null, codJrv, codMunicipio);         
                insert into padron values(null, idPersonaP, idJrvP);
            end if;
        
    end if;
    call p_RegTransaccion(iduser, 1);
end$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure prueba
-- -----------------------------------------------------

DELIMITER $$
USE `selectsalv`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `prueba`()
begin
	declare idJrvP int;
	set idJrvP = (select max(idJrv) from Jrv);
	set idJrvP = idJrvP + 1;
    select idJrvP;
end$$

DELIMITER ;

-- -----------------------------------------------------
-- View `selectsalv`.`v_boleta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `selectsalv`.`v_boleta`;
USE `selectsalv`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `selectsalv`.`v_boleta` AS (select `p`.`idPartido` AS `idPartido`,`p`.`nomPartido` AS `nomPartido`,`p`.`rutaBandera` AS `rutaBandera`,`p`.`estado` AS `estadoPartido`,`c`.`idCandidato` AS `idCandidato`,`per`.`nomPersona` AS `nomPersona`,`per`.`apePersona` AS `apePersona`,`t`.`descTipoCandidato` AS `descTipoCandidato` from (((`selectsalv`.`partido` `p` join `selectsalv`.`candidato` `c`) join `selectsalv`.`tipocandidato` `t`) join `selectsalv`.`persona` `per`) where ((`p`.`idPartido` = `c`.`idPartido`) and (`c`.`idPersona` = `per`.`idPersona`) and (`c`.`idTipoCandidato` = `t`.`idTipoCandidato`) and (`p`.`idPartido` = 1)));

-- -----------------------------------------------------
-- View `selectsalv`.`v_candidatos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `selectsalv`.`v_candidatos`;
USE `selectsalv`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `selectsalv`.`v_candidatos` AS (select `c`.`idCandidato` AS `idCandidato`,`c`.`idPartido` AS `idPartido`,`c`.`idTipoCandidato` AS `idTipoCandidato`,`c`.`idPersona` AS `idPersona` from ((`selectsalv`.`candidato` `c` join `selectsalv`.`persona` `p`) join `selectsalv`.`tipocandidato` `t`) where ((`c`.`idPersona` = `p`.`idPersona`) and (`c`.`idTipoCandidato` = `t`.`idTipoCandidato`)));

-- -----------------------------------------------------
-- View `selectsalv`.`v_getcandidatos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `selectsalv`.`v_getcandidatos`;
USE `selectsalv`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `selectsalv`.`v_getcandidatos` AS (select `c`.`idCandidato` AS `IdCandidato`,`p`.`dui` AS `dui`,`p`.`nomPersona` AS `nomPersona`,`p`.`apePersona` AS `apePersona`,`b`.`nomPartido` AS `nomPartido`,`t`.`descTipoCandidato` AS `descTipoCandidato`,`c`.`rutaCandidato` AS `rutaCandidato` from (((`selectsalv`.`candidato` `c` join `selectsalv`.`persona` `p` on((`p`.`idPersona` = `c`.`idPersona`))) join `selectsalv`.`partido` `b` on((`b`.`idPartido` = `c`.`idPartido`))) join `selectsalv`.`tipocandidato` `t` on((`t`.`idTipoCandidato` = `c`.`idTipoCandidato`))) where (`c`.`estado` = 1) order by `c`.`idCandidato` desc);

-- -----------------------------------------------------
-- View `selectsalv`.`v_persona`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `selectsalv`.`v_persona`;
USE `selectsalv`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `selectsalv`.`v_persona` AS (select `p`.`idPersona` AS `idPersona`,`p`.`dui` AS `dui`,`p`.`nomPersona` AS `nomPersona`,`p`.`apePersona` AS `apePersona`,`j`.`numJrv` AS `numJrv`,`g`.`idGenero` AS `idGenero`,`g`.`descGenero` AS `descGenero`,`p`.`fechaNac` AS `fechaNac`,`p`.`fechaVenc` AS `fechaVenc`,`p`.`profesion` AS `profesion`,`p`.`direccion` AS `direccion`,`e`.`idEstadoCivil` AS `idEstadoCivil`,`e`.`descEstadoCivil` AS `descEstadoCivil`,`p`.`estadoVotacion` AS `estadoVotacion`,`m`.`idMunicipio` AS `idMunicipio`,`m`.`nomMunicipio` AS `nomMunicipio`,`d`.`nomDepartamento` AS `nomDepartamento`,`p`.`estado` AS `estado` from ((((((`selectsalv`.`persona` `p` join `selectsalv`.`municipio` `m`) join `selectsalv`.`departamento` `d`) join `selectsalv`.`padron` `pd`) join `selectsalv`.`jrv` `j`) join `selectsalv`.`genero` `g`) join `selectsalv`.`estadocivil` `e`) where ((`p`.`idMunicipio` = `m`.`idMunicipio`) and (`m`.`idDepartamento` = `d`.`idDepartamento`) and (`pd`.`idPersona` = `p`.`idPersona`) and (`pd`.`idJrv` = `j`.`idJrv`) and (`p`.`idgenero` = `g`.`idGenero`) and (`p`.`idEstadoCivil` = `e`.`idEstadoCivil`)) order by `p`.`idPersona` desc);

-- -----------------------------------------------------
-- View `selectsalv`.`v_transacciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `selectsalv`.`v_transacciones`;
USE `selectsalv`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `selectsalv`.`v_transacciones` AS (select `t`.`id` AS `id`,`u`.`nomUsuario` AS `nomUsuario`,`r`.`descRol` AS `descRol`,`tp`.`descTransaccion` AS `descTransaccion`,`t`.`fecha` AS `fecha`,`t`.`hora` AS `hora` from (((`selectsalv`.`transacciones` `t` join `selectsalv`.`tipotransaccion` `tp`) join `selectsalv`.`usuario` `u`) join `selectsalv`.`rol` `r`) where ((`u`.`idUsuario` = `t`.`idUsuario`) and (`u`.`idRol` = `r`.`idRol`) and (`t`.`idTipo` = `tp`.`id`)) order by `t`.`id` desc);

-- -----------------------------------------------------
-- View `selectsalv`.`v_usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `selectsalv`.`v_usuarios`;
USE `selectsalv`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `selectsalv`.`v_usuarios` AS (select `u`.`idUsuario` AS `idUsuario`,`u`.`nomUsuario` AS `nomUsuario`,`u`.`pass` AS `pass`,`u`.`estado` AS `estado`,`r`.`descRol` AS `descRol`,`r`.`codRol` AS `codRol` from (`selectsalv`.`usuario` `u` join `selectsalv`.`rol` `r`) where (`u`.`idRol` = `r`.`idRol`));

-- -----------------------------------------------------
-- View `selectsalv`.`v_voto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `selectsalv`.`v_voto`;
USE `selectsalv`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `selectsalv`.`v_voto` AS (select `v`.`idDetalleVoto` AS `idDetalleVoto`,`p`.`idPartido` AS `idPartido`,`p`.`nomPartido` AS `nomPartido`,`j`.`idJrv` AS `idJrv`,`j`.`numJrv` AS `numJrv`,`per`.`idPersona` AS `idPersona`,`per`.`dui` AS `dui`,`per`.`nomPersona` AS `nomPersona`,`per`.`apePersona` AS `apePersona`,`d`.`idDepartamento` AS `idDepartamento`,`d`.`nomDepartamento` AS `nomDepartamento`,`m`.`idMunicipio` AS `idMunicipio`,`m`.`nomMunicipio` AS `nomMunicipio` from ((((((`selectsalv`.`detallevoto` `v` join `selectsalv`.`partido` `p`) join `selectsalv`.`persona` `per`) join `selectsalv`.`padron` `pd`) join `selectsalv`.`jrv` `j`) join `selectsalv`.`municipio` `m`) join `selectsalv`.`departamento` `d`) where ((`v`.`idPartido` = `p`.`idPartido`) and (`v`.`idPadron` = `pd`.`id`) and (`pd`.`idPersona` = `per`.`idPersona`) and (`pd`.`idJrv` = `j`.`idJrv`) and (`per`.`idMunicipio` = `m`.`idMunicipio`) and (`m`.`idDepartamento` = `d`.`idDepartamento`)) order by `v`.`idDetalleVoto` desc);

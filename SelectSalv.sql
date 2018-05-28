drop database if exists SelectSalv;
create database if not exists SelectSalv;

use SelectSalv;

create table Usuario(
	idUsuario int auto_increment unique not null primary key,
    nomUsuario text,
    pass text,
    estado int,
    idRol int not null
);


create table Rol(
	idRol int auto_increment unique not null primary key,
    codRol text,
    estado int,
    descRol text
);


create table transacciones(
	id int auto_increment unique not null primary key,
    idUsuario int,
    idTipo int,
    fecha date, 
    hora varchar(25)
);

create table tipoTransaccion(
	id int auto_increment unique not null primary key,
    descTransaccion varchar(50)
);

# Tipos de Transacciones

insert into tipoTransaccion values(null, 'Registro de Persona');
insert into tipoTransaccion values(null, 'Eliminacion de Persona');
insert into tipoTransaccion values(null, 'Edicion de datos de Persona');

insert into tipoTransaccion values(null, 'Registro de Usuario');
insert into tipoTransaccion values(null, 'Eliminar Usuario');
insert into tipoTransaccion values(null, 'Editar Usuario');

insert into tipoTransaccion values(null, 'Registro de Partido');
insert into tipoTransaccion values(null, 'Eliminar Partido');
insert into tipoTransaccion values(null, 'Editar Partido');

insert into tipoTransaccion values(null, 'Registro de Candidato');
insert into tipoTransaccion values(null, 'Eliminar Candidato');
insert into tipoTransaccion values(null, 'Editar Candidato');


insert into Rol values(null, 'mMun',1, 'Desarrollador');
insert into Rol values(null, 'lcqe0p8=',1, 'Administrador');
insert into Rol values(null, 'ndSn',1, 'Invitado');


create table Persona(
	idPersona int auto_increment unique not null primary key,
    dui varchar(15) not null,
    nomPersona varchar(100),
    apePersona varchar(100),
    idgenero int,
    fechaNac date,
    fechaVenc date,
    fechaReg date,
    estado int,
    profesion varchar(100),
    direccion varchar(250),
    idEstadoCivil int,
    estadoVotacion int,
    idMunicipio int not null
);

create table genero(
	idGenero int auto_increment unique not null primary key,
    descGenero varchar(25)
);

insert into genero values(null, 'Masculino');
insert into genero values(null, 'Femenino');

create table estadoCivil(
	idEstadoCivil int auto_increment unique not null primary key,
    descEstadoCivil varchar(25)
);

insert into estadoCivil values(null, 'Soltero');
insert into estadoCivil values(null, 'Casado');
insert into estadoCivil values(null, 'Divorciado');
insert into estadoCivil values(null, 'Viudo');

create table Departamento(
	idDepartamento int auto_increment unique not null primary key,
    nomDepartamento varchar(150)
);

insert into Departamento(nomDepartamento) values('La Libertad');
insert into Departamento(nomDepartamento) values('San Salvador');

create table Municipio(
	idMunicipio int auto_increment unique not null primary key,
    nomMunicipio varchar(150),
    idDepartamento int not null
);

create table CentroVotacion(
	idCentro int auto_increment unique not null primary key,
    nomCentro varchar(150),
    idMunicipio int not null
);



create table Jrv(
	idJrv int auto_increment unique not null primary key,
    numJrv varchar(20) not null,
    idCentro int not null
);



create table padron(
	id int auto_increment unique not null primary key,
    idPersona int not null, 
    idJrv int not null 
);



create table partido(
	idPartido int auto_increment unique not null primary key,
    nomPartido varchar(100),
    rutaBandera varchar(100),
    estado int
);

insert into partido values(null, 'Voto Nulo', 'res/img/partidos/nulo.jpg', 1);
insert into partido values(null, 'Nuevas Ideas', 'res/img/partidos/nuevasIdeas.jpg', 1);
insert into partido values(null, 'Arena', 'res/img/partidos/arena.jpg', 1);
insert into partido values(null, 'FMLN', 'res/img/partidos/fmln.jpg', 1);

create table DetalleVoto(
	idDetalleVoto int auto_increment unique not null primary key,
    idPartido int not null,
    idPadron int not null
);



create table TipoCandidato(
	idTipoCandidato int auto_increment unique not null primary key,
    codTipoCandidato varchar(100),
    descTipoCandidato varchar(100)
);

insert into tipoCandidato values(null, 'pNiW3A==', 'Presidente');
insert into tipoCandidato values(null, 'qs+Uzg==', 'Vicepresidente');

create table Candidato(
	idCandidato int auto_increment unique not null primary key,
	idPartido int not null,
    idTipoCandidato int not null,
    idPersona int not null,
    rutaCandidato varchar(100),
    estado int
);

# Candidatos Nuevas Ideas
#insert into candidato values(null, 1, 1, 1, 1);
#insert into candidato values(null, 1, 2, 2, 1);

# Candidatos ARENA
#insert into candidato values(null, 2, 1, 4, 1);
#insert into candidato values(null, 2, 2, 5, 1);



#Llaves Foráneas

alter table Usuario add constraint fk_idRol_Usuario foreign key(idRol) references Rol(idRol);
alter table Persona add constraint fk_idMunicipio_Municipio foreign key(idMunicipio) references Municipio(idMunicipio);
alter table Persona add constraint fk_idGenero_Persona foreign key (idGenero) references genero(idGenero);
alter table Persona add constraint fk_idEstadoCivil_Persona foreign key (idEstadoCivil) references estadoCivil(idEstadoCivil);
alter table Municipio add constraint fk_idDepartamento_Municipio foreign key (idDepartamento) references Departamento(idDepartamento);
alter table centroVotacion add constraint fk_idMunicipio_CV foreign key (idMunicipio) references Municipio(idMunicipio);
alter table Jrv add constraint fk_idCentro_Jrv foreign key (idCentro) references CentroVotacion(idCentro);
alter table DetalleVoto add constraint fk_idPartido_DetalleVoto foreign key (idPartido) references Partido(idPartido);
alter table DetalleVoto add constraint fk_idPadron_DetalleVoto foreign key (idPadron) references padron(id);
alter table Candidato add constraint fk_idPartido_Candidato foreign key (idPartido) references Partido(idPartido);
alter table Candidato add constraint fk_idTipoCandidato_Candidato foreign key (idTipoCandidato) references TipoCandidato(idTipoCandidato);
alter table Candidato add constraint fk_idPersona_Candidato foreign key (idPersona) references Persona(idPersona);
alter table padron add constraint fk_idPersona_padron foreign key (idPersona) references Persona(idPersona);
alter table padron add constraint fk_idJrv foreign key (idJrv) references Jrv(idJrv);
alter table transacciones add constraint fk_tipoTransaccion foreign key (idTipo) references tipoTransaccion(id);



# VISTAS



# Vista con los datos de usuario

create view v_Usuarios as (
	select u.idUsuario, u.nomUsuario, u.pass, u.estado, r.descRol, r.codRol
    from Usuario u, Rol r
    where u.idRol = r.idRol
);

# Vista con los datos de candidato
create view v_Candidatos as (
    select c.idCandidato,c.idPartido, c.idTipoCandidato, c.idPersona
    from Candidato c, Persona p, TipoCandidato t
    where c.idPersona = p.idPersona and c.idTipoCandidato=t.idTipoCandidato
);

# Vista con los datos de Persona

create view v_Persona as (
	select p.idPersona, p.dui, p.nomPersona, p.apePersona, j.numJrv, g.idGenero, g.descGenero, p.fechaNac, p.fechaVenc, p.profesion, p.direccion,e.idEstadoCivil, e.descEstadoCivil, p.estadoVotacion, 
            m.idMunicipio, m.nomMunicipio, d.nomDepartamento, p.estado
    from Persona p, Municipio m, Departamento d, padron pd, jrv j, genero g, estadoCivil e
    where p.idMunicipio = m.idMunicipio and m.idDepartamento = d.idDepartamento and pd.idPersona = p.idPersona and pd.idJrv = j.idJrv and p.idgenero = g.idGenero and p.idEstadoCivil = e.idEstadoCivil
    order by p.idPersona desc
);


# Vista para transacciones

# DATE_FORMAT(NOW( ), "%H:%i:%S" )

create view v_Transacciones as (
	select t.id, u.nomUsuario, r.descRol, tp.descTransaccion, t.fecha, t.hora
    from transacciones t, tipoTransaccion tp, Usuario u, Rol r
    where u.idUsuario = t.idUsuario and  u.idRol = r.idRol and t.idTipo = tp.id
    order by t.id desc
);

# Vista para boleta

create view v_Boleta as (
	select p.idPartido, p.nomPartido, p.rutaBandera, p.estado as estadoPartido, c.idCandidato, per.nomPersona, per.apePersona, t.descTipoCandidato
    from partido p, candidato c, tipoCandidato t, persona per
    where p.idPartido = c.idPartido and c.idPersona = per.idPersona and c.idTipoCandidato = t.idTipoCandidato and p.idPartido = 1
);

# Vista resumen de Voto

create view v_Voto as (
	select v.idDetalleVoto, p.idPartido, p.nomPartido, j.idJrv, j.numJrv, per.idPersona,per.dui, per.nomPersona, per.apePersona,d.idDepartamento, d.nomDepartamento, m.idMunicipio, m.nomMunicipio
    from DetalleVoto v, partido p, persona per, padron pd, Jrv j, municipio m , departamento d
    where v.idPartido = p.idPartido and pd.idPersona = per.idPersona and pd.idJrv = j.idJrv and per.idMunicipio = m.idMunicipio and m.idDepartamento = d.idDepartamento
);

select * from v_Voto;
/*
select p.idPartido, p.nomPartido, p.rutaBandera, p.estado as estadoPartido, 

	(select nomPersona 
	from persona per, candidato c, tipoCandidato t, partido p
	where p.idPartido = c.idPartido and c.idPersona = per.idPersona and c.idTipoCandidato = t.idTipoCandidato and t.descTipoCandidato = 'Presidente' and p.idPartido = 3) as nomPresidente,
    
    (select apePersona 
	from persona per, candidato c, tipoCandidato t, partido p
	where p.idPartido = c.idPartido and c.idPersona = per.idPersona and c.idTipoCandidato = t.idTipoCandidato and t.descTipoCandidato = 'Presidente' and p.idPartido = 3) as apePresidente,
    
    
	(select nomPersona 
	from persona per, candidato c, tipoCandidato t, partido p
	where p.idPartido = c.idPartido and c.idPersona = per.idPersona and c.idTipoCandidato = t.idTipoCandidato and t.descTipoCandidato = 'Vicepresidente' and p.idPartido = 3) as nomVicepresidente,
    
    (select apePersona 
	from persona per, candidato c, tipoCandidato t, partido p
	where p.idPartido = c.idPartido and c.idPersona = per.idPersona and c.idTipoCandidato = t.idTipoCandidato and t.descTipoCandidato = 'Vicepresidente' and p.idPartido = 3) as apeVicepresidente
    
from partido p
where idPartido = 3


select p.idPartido, p.nomPartido
from partido p, candidato c, tipoCandidato t, persona per
where p.idPartido = c.idPartido and c.idPersona = per.idPersona

select * from candidato
*/

#Procedimiento almacenado para registrar voto

delimiter $$
create procedure p_Votar(
	in partido int,
    in ndui varchar(15)
)
begin
	declare persona int;
    declare padron int;
    set persona = (select idPersona from persona where dui = ndui);
    set padron = (select id from padron where idPersona = persona);
    insert into DetalleVoto value(null,partido, padron);
end
$$


# Procedimiento almacenado para registrar Partidos
delimiter $$
create procedure p_RegPartido(
	in nom varchar(100),
    in ruta varchar(100)
)
begin
	insert into partido values(null, nom, ruta, 1);
end
$$

select * from detalleVoto;

# Procedimiento almacenado para modificar Partidos
delimiter $$
create procedure p_EditarPartido(
	in id int, 
    in nom varchar(100),
    in ruta varchar(100)
)
begin
	update partido
    set nomPartido = nom, rutaBandera = ruta
    where idPartido = id;
end
$$

# Procedimiento almacenado para eliminar Partido
delimiter $$
create procedure p_EliminarPartido(
	in id int
)
begin
	update partido
    set estado = 0
    where idPartido = id; 
end
$$


# Procedimiento Almacenado para registrar Candidatos

delimiter $$
create procedure p_RegCandidato(
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
end
$$


# Procedimiento almacenado para Modificar Candidatos
/*delimiter $$
create procedure p_EditarCandidato(
	in id
)
begin
end
$$*/
# Procedimiento almacenado para registrar transacciones

delimiter $$
create procedure p_RegTransaccion(
	in usuario int,
    in tipo int
)
begin
	insert into transacciones values(null, usuario, tipo, curdate(), DATE_FORMAT(NOW( ), "%H:%i:%S" ));
end
$$
select * from partido;

# Procedimiento almacenado para registrar Usuarios
delimiter $$
create procedure p_RegUsuario(
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
end
$$

# Procedimiento almacenado para obtener datos de usuario por id
delimiter $$
create procedure p_obtenerUsuarioId(
	in nid int
)
begin
	select * from v_Usuarios where idUsuario = nid;
end
$$

delimiter $$
create procedure p_obtenerCandidatoId(
    in nuid int
)
begin
    select * from v_Candidatos where idCandidato = nuid;
end
$$

# Procedimiento almacenado para comparar datos de logueo
delimiter $$
create procedure p_loginUsuario(
    in nom text,
    in contra text
)
begin
    select * from v_Usuarios where nomUsuario = nom and pass = contra;
end
 $$
 

 
delimiter $$
create procedure p_regPersona(
    in dui varchar(15),
    in nom varchar(100),
    in ape varchar(100),
    in gen int,
    in fechanac date,
    in fechavenc date,
    in prof varchar(100),
    in direc varchar(250),
    in estadoCiv int,
    in municipio int,
    in iduser int
)
begin
	declare numJrv int;
    declare codJrv varchar(10);
    declare idPersonaP int;
    declare idJrvP int;
    declare numPersonas int;
    
	insert into Persona values (null, dui, nom, ape, gen, fechanac, fechavenc, curdate(), 1, prof, direc, estadoCiv, 0, municipio);
    set numJrv = (select count(idJrv) from Jrv where idCentro = municipio);
    
	if numJrv = 0 then
			set codJRv = concat(municipio, 1);
			insert into Jrv values(null, codJrv, municipio);
            set idPersonaP = (select max(idPersona) from Persona);
            set idJrvP = (select max(idJrv) from Jrv where idCentro = municipio);
            insert into padron values(null, idPersonaP, idJrvP);
	elseif	numJrv > 0 then
			set idPersonaP = (select max(idPersona) from Persona);
			set idJrvP = (select max(idJrv) from Jrv where idCentro = municipio);
			set numPersonas = (select count(idPersona) from padron where idJrv = idJrvP);
            if numPersonas < 10 then
				insert into padron values(null, idPersonaP, idJrvP);
			else
				set idJrvP = (select max(idJrv) from Jrv where idCentro = municipio);
                set idJrvP = idJrvP + 1;
				set codJrv = concat(municipio, idJrvP);
				insert into Jrv values(null, codJrv, municipio);			
                insert into padron values(null, idPersonaP, idJrvP);
            end if;
		
	end if;
    call p_RegTransaccion(iduser, 1);
end
$$


delimiter $$
create procedure p_EditarPersona(
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
end
$$


delimiter $$
create procedure p_EliminarPersona(
	in id int,
    in iduser int
)
begin
	update persona 
    set estado = 0
    where idPersona = id;
    call p_RegTransaccion(iduser,2);
end
$$


delimiter $$
create procedure prueba()
begin
	declare idJrvP int;
	set idJrvP = (select max(idJrv) from Jrv);
	set idJrvP = idJrvP + 1;
    select idJrvP;
end
$$


#Procedimiento para devolver los datos de Persona en base a ID de registro
delimiter $$
create procedure p_obtenerPersonaId(
	in nid int
)
begin
	select * from v_Persona where idPersona = nid;
end
$$

# Procedimiento almacenado para registrar municipios y centro de votación

delimiter $$
create procedure p_regMunicipio(
	in nom varchar(150),
    in dep int
)
begin
	declare nomCv varchar(50);
    declare mun int;
    set nomCv = concat("Centro de Votacion ", nom);
	insert into Municipio values(null, nom, dep);
    set mun = (select idMunicipio from Municipio where nomMunicipio = nom);
    insert into CentroVotacion values(null, nomCv, mun);
end
$$


#Procedimiento para devolver los datos de Persona en base a N° de DUI
delimiter $$
create procedure p_obtenerPersona(
	in ndui varchar(15)
)
begin
	select * from v_Persona where dui = ndui;
end
$$


/*
call p_regPersona('98765432-1', 'Escobar Gaviria', 'Pablo Emilio', 1, '1976-05-05', '2019-05-05', 'Traficante', 'Blvd. Orden de Malta, Santa Elena', 2, 1, 1);

call p_regPersona('12345678-9', 'Saturnino Donato', 'Vaquerano Contreras', 1, '1976-05-05', '2019-05-05', 'Ingeniero en Sistemas', 'Residencial Veranda Senda Maquilishuat #22', 3, 1, 1);

call p_regPersona('67845389-9', 'Nayib Armando', 'Bukele Ortez', 1, '1981-06-24', '2019-05-05', 'Presidente', 'Colonia Escalon', 2, 2, 1);
call p_regPersona('67836689-8', 'Jose', 'Barahona Rais', 1, '1981-06-24', '2019-05-05', 'Vicepresidente', 'Colonia Escalon', 2, 2, 1);

call p_regPersona('67871989-9', 'Juan Carlos', 'Calleja Hakker', 1, '1977-06-24', '2019-05-05', 'Empresario', 'Colonia Escalon', 2, 2, 1);
call p_regPersona('98765432-1', 'Escobar Gaviria', 'Pablo Emilio', 1, '1976-05-05', '2019-05-05', 'Traficante', 'Blvd. Orden de Malta, Santa Elena', 2, 1, 1);
call p_regPersona('12345678-9', 'Saturnino Donato', 'Vaquerano Contreras', 1, '1976-05-05', '2019-05-05', 'Ingeniero en Sistemas', 'Residencial Veranda Senda Maquilishuat #22', 3, 2, 1);

call p_regPersona('05878895-8', 'Jorge Luis', 'Sidgo Pimentel', 1, '1999-05-21', '2025-05-26', 'Estudiante', 'Res. Las Colinas Sda Maquilishuat #24', 1, 1, 1);
call p_regPersona('05878895-7', 'Jorge Luis', 'Sidgo Pimentel', 1, '1999-05-21', '2025-05-26', 'Estudiante', 'Res. Las Colinas Sda Maquilishuat #24', 1, 1, 1);
call p_regPersona('05878895-6', 'Jorge Luis', 'Sidgo Pimentel', 1, '1999-05-21', '2025-05-26', 'Estudiante', 'Res. Las Colinas Sda Maquilishuat #24', 1, 1, 1);
call p_regPersona('05878895-5', 'Jorge Luis', 'Sidgo Pimentel', 1, '1999-05-21', '2025-05-26', 'Estudiante', 'Res. Las Colinas Sda Maquilishuat #24', 1, 1, 1);
call p_regPersona('05878895-4', 'Jorge Luis', 'Sidgo Pimentel', 1, '1999-05-21', '2025-05-26', 'Estudiante', 'Res. Las Colinas Sda Maquilishuat #24', 1, 1, 1);
call p_regPersona('05878895-3', 'Jorge Luis', 'Sidgo Pimentel', 1, '1999-05-21', '2025-05-26', 'Estudiante', 'Res. Las Colinas Sda Maquilishuat #24', 1, 1, 1);
call p_regPersona('05878895-2', 'Jorge Luis', 'Sidgo Pimentel', 1, '1999-05-21', '2025-05-26', 'Estudiante', 'Res. Las Colinas Sda Maquilishuat #24', 1, 1, 1);
call p_regPersona('05878895-9', 'Jorge Luis', 'Sidgo Pimentel', 1, '1999-05-21', '2025-05-26', 'Estudiante', 'Res. Las Colinas Sda Maquilishuat #24', 1, 1, 1);

call p_regPersona('05878895-0', 'Jorge Luis', 'Sidgo Pimentel', 1, '1999-05-21', '2025-05-26', 'Estudiante', 'Res. Las Colinas Sda Maquilishuat #24', 1, 1, 1);
call p_regPersona('05878895-1', 'Jorge Luis', 'Sidgo Pimentel', 1, '1999-05-21', '2025-05-26', 'Estudiante', 'Res. Las Colinas Sda Maquilishuat #24', 1, 1, 1);
call p_regPersona('05878896-1', 'Jorge Luis', 'Sidgo Pimentel', 1, '1999-05-21', '2025-05-26', 'Estudiante', 'Res. Las Colinas Sda Maquilishuat #24', 1, 1, 1); 
call p_regPersona('67845389-9', 'Nayib Armando', 'Bukele Ortez', 1, '1981-06-24', '2019-05-05', 'Presidente', 'Colonia Escalon', 2, 2, 1);
call p_regPersona('67836689-8', 'Jose', 'Barahona Rais', 1, '1981-06-24', '2019-05-05', 'Vicepresidente', 'Colonia Escalon', 2, 2, 1);

call p_regPersona('67871989-9', 'Juan Carlos', 'Calleja Hakker', 1, '1977-06-24', '2019-05-05', 'Empresario', 'Colonia Escalon', 2, 2, 1);
call p_regPersona('98765432-1', 'Escobar Gaviria', 'Pablo Emilio', 1, '1976-05-05', '2019-05-05', 'Traficante', 'Blvd. Orden de Malta, Santa Elena', 2, 1, 1);
call p_regPersona('12345678-9', 'Saturnino Donato', 'Vaquerano Contreras', 1, '1976-05-05', '2019-05-05', 'Ingeniero en Sistemas', 'Residencial Veranda Senda Maquilishuat #22', 3, 2, 1);*/


# call p_regPersona('05809350-2', 'Liza Michell', 'Guerrero Urbina', 1, '1998-10-28', '2024-12-18', 'Estudiante', 'col kennedy 2A CL PPAL #60', 1, 1);

call p_regMunicipio('Santa Tecla', 1);

call p_regMunicipio('San Salvador', 2);
/*
select * from municipio
select * from persona
select * from padron
select * from jrv*/
/*call p_regPersona('67845389-9', 'Nayib Armando', 'Bukele Ortez', 1, '1981-06-24', '2019-05-05', 'Presidente', 'Colonia Escalon', 2, 2, 1);
call p_regPersona('67836689-8', 'Jose', 'Barahona Rais', 1, '1981-06-24', '2019-05-05', 'Vicepresidente', 'Colonia Escalon', 2, 2, 1);

call p_regPersona('67871989-9', 'Juan Carlos', 'Calleja Hakker', 1, '1977-06-24', '2019-05-05', 'Empresario', 'Colonia Escalon', 2, 2, 1);
call p_regPersona('98765432-1', 'Escobar Gaviria', 'Pablo Emilio', 1, '1976-05-05', '2019-05-05', 'Traficante', 'Blvd. Orden de Malta, Santa Elena', 2, 1, 1);
call p_regPersona('12345678-9', 'Saturnino Donato', 'Vaquerano Contreras', 1, '1976-05-05', '2019-05-05', 'Ingeniero en Sistemas', 'Residencial Veranda Senda Maquilishuat #22', 3, 2, 1);*/


call p_regPersona('67845389-9', 'Nayib Armando', 'Bukele Ortez', 1, '1981-06-24', '2019-05-05', 'Presidente', 'Colonia Escalon', 2, 2, 1);
call p_regPersona('67836689-8', 'Jose', 'Barahona Rais', 1, '1981-06-24', '2019-05-05', 'Vicepresidente', 'Colonia Escalon', 2, 2, 1);

call p_regPersona('67871989-9', 'Juan Carlos', 'Calleja Hakker', 1, '1977-06-24', '2019-05-05', 'Empresario', 'Colonia Escalon', 2, 2, 1);
call p_regPersona('98765432-1', 'Pablo Emilio', 'Escobar Gaviria', 1, '1976-05-05', '2019-05-05', 'Traficante', 'Blvd. Orden de Malta, Santa Elena', 2, 1, 1);

# Candidatos Nuevas Ideas
insert into candidato values(null, 2, 1, 1,'hola',1);
insert into candidato values(null, 2, 2, 2,'hola', 1);

# Candidatos ARENA
insert into candidato values(null, 3, 1, 3,'hola', 1);
insert into candidato values(null, 3, 2, 4,'hola', 1);



call p_RegUsuario('ftWj0Ja1m9Oa3Q==', 'cd8420c9a4ff19ed893cd97155b9c0c18350d0ad', 'mMun', 0);

call p_RegUsuario('gM+rynjXl+Gl06fQ', '9e1b9d0da915a9aaafd7524b5d4b667ecbe7abb3', 'mMun', 0);

call p_RegUsuario('d8ej1aDVddCg3qTU', 'a1d3288715911c7ea5b85627de62c4aabcf233c7', 'mMun', 0);


create view v_getCandidatos as (
	SELECT  c.IdCandidato ,p.dui, p.nomPersona,p.apePersona ,b.nomPartido, t.descTipoCandidato, c.rutaCandidato FROM candidato c INNER JOIN persona p ON p.idPersona=c.idPersona INNER JOIN partido b ON b.idPartido=c.idPartido INNER JOIN tipocandidato t ON t.idTipoCandidato=c.idTipoCandidato WHERE c.estado=1
    order by c.idCandidato desc
);

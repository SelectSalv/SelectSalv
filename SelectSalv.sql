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

insert into tipoTransaccion values(null, 'Registro de Persona');

insert into Rol values(null, 'mMun',1, 'Desarrollador');
insert into Rol values(null, 'lcqe0p8=',1, 'Administrador');
insert into Rol values(null, 'ndSn',1, 'Invitado');


create table Persona(
	idPersona int auto_increment unique not null primary key,
    dui varchar(15) not null,
    nomPersona varchar(100),
    apePersona varchar(100),
    genero varchar(100),
    fechaNac date,
    fechaVenc date,
    fechaReg date,
    estado int,
    profesion varchar(100),
    direccion varchar(250),
    estadoCivil varchar(50),
    estadoVotacion int,
    idMunicipio int not null
);


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

insert into Jrv values(null, '11', 1);

create table padron(
	id int auto_increment unique not null primary key,
    idPersona int not null, 
    idJrv int not null 
);



create table partido(
	idPartido int auto_increment unique not null primary key,
    nomPartido varchar(100)
);

create table DetalleVoto(
	idDetalleVoto int auto_increment unique not null primary key,
    idPersona int not null,
    idPartido int not null,
    idJrv int not null
);



create table TipoCandidato(
	idTipoCandidato int auto_increment unique not null primary key,
    codTipoCandidato varchar(100),
    descTipoCandidato varchar(100)
);

create table Candidato(
	idCandidato int auto_increment unique not null primary key,
	idPartido int not null,
    idTipoCandidato int not null,
    idPersona int not null
);

#Llaves Foráneas

alter table Usuario add constraint fk_idRol_Usuario foreign key(idRol) references Rol(idRol);
alter table Persona add constraint fk_idMunicipio_Municipio foreign key(idMunicipio) references Municipio(idMunicipio);
alter table Municipio add constraint fk_idDepartamento_Municipio foreign key (idDepartamento) references Departamento(idDepartamento);
alter table centroVotacion add constraint fk_idMunicipio_CV foreign key (idMunicipio) references Municipio(idMunicipio);
alter table Jrv add constraint fk_idCentro_Jrv foreign key (idCentro) references CentroVotacion(idCentro);
alter table DetalleVoto add constraint fk_idPersona_DetalleVoto foreign key (idPersona) references Persona(idPersona);
alter table DetalleVoto add constraint fk_idPartido_DetalleVoto foreign key (idPartido) references Partido(idPartido);
alter table DetalleVoto add constraint fk_idJrv_DetalleVoto foreign key (idJrv) references Jrv(idJrv);
alter table Candidato add constraint fk_idPartido_Candidato foreign key (idPartido) references Partido(idPartido);
alter table Candidato add constraint fk_idTipoCandidato_Candidato foreign key (idTipoCandidato) references TipoCandidato(idTipoCandidato);
alter table Candidato add constraint fk_idPersona_Candidato foreign key (idPersona) references Persona(idPersona);
alter table padron add constraint fk_idPersona_padron foreign key (idPersona) references Persona(idPersona);
alter table padron add constraint fk_idJrv foreign key (idJrv) references Jrv(idJrv);
alter table transacciones add constraint fk_tipoTransaccion foreign key (idTipo) references tipoTransaccion(id);


# VISTAS

# Vista con los datos de usuario

create view v_Usuarios as (
	select u.idUsuario, u.nomUsuario, u.pass, u.estado, r.descRol
    from Usuario u, Rol r
    where u.idRol = r.idRol
);

# Vista con los datos de Persona

drop view v_Persona as (
	select p.idPersona, p.dui, p.nomPersona, p.apePersona, p.genero, p.fechaNac, p.fechaVenc, p.profesion, p.direccion, p.estadoCivil, p.estadoVotacion, 
            m.idMunicipio, m.nomMunicipio, d.nomDepartamento 
    from Persona p, Municipio m, Departamento d
    where p.idMunicipio = m.idMunicipio and m.idDepartamento = d.idDepartamento
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


# Procedimiento almacenado para registrar Usuarios
delimiter $$
create procedure p_RegUsuario(
    in nom text,
    in contra text,
    in rol text
)
begin
	declare ideRol int;
    set ideRol = (select idRol from Rol where codRol = rol);
    insert into Usuario values(null, nom, contra, 1, ideRol);
end
$$

call p_RegUsuario('gM+rynjXl+Gl06fQ', '9e1b9d0da915a9aaafd7524b5d4b667ecbe7abb3', 'mMun');


call p_RegUsuario('ftWj0Ja1m9Oa3Q==', 'cd8420c9a4ff19ed893cd97155b9c0c18350d0ad', 'mMun');


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
    in gen varchar(100),
    in fechanac date,
    in fechavenc date,
    in prof varchar(100),
    in direc varchar(250),
    in estadoCiv varchar(50),
    in municipio int
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
            set idJrvP = (select max(idJrv) from Jrv);
            insert into padron values(null, idPersonaP, idJrvP);
	elseif	numJrv > 0 then
			set idPersonaP = (select max(idPersona) from Persona);
			set idJrvP = (select max(idJrv) from Jrv);
			set numPersonas = (select count(idPersona) from padron where idJrv = idJrvP);
            if numPersonas < 10 then
				insert into padron values(null, idPersonaP, idJrvP);
			elseif numPersonas > 10 then
				set idJrvP = ((select max(idJrv) from Jrv) + 1);
				set codJrv = concat(municipio, idJrvP);
				insert into Jrv values(null, codJrv, municipio);			
                set numPersonas = (select count(idPersona) from padron where idJrv = idJrvP);
            end if;
		
	end if;
    call p_RegTransacciones(1, 1);
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
    set nomCv = concat("Centro de Votacion", nom);
	insert into Municipio values(null, nom, dep);
    set mun = (select idMunicipio from Municipio where nomMunicipio = nom);
    insert into CentroVotacion values(null, nomCv, 0, mun);
end
$$

call p_regMunicipio('Santa Tecla', 1);
call p_regMunicipio('San Salvador', 2);

#Procedimiento para devolver los datos de Persona en base a N° de DUI
delimiter $$
create procedure p_obtenerPersona(
	in ndui varchar(15)
)
begin
	select * from v_Persona where dui = ndui;
end
$$


# call p_regPersona('12345678-9', 'Saturnino Donato', 'Vaquerano Contreras', 'Masculino', '1976-05-05', '2019-05-05', 'Ingeniero en Sistemas', 'Residencial Veranda Senda Maquilishuat #22', 'Soltero', 1);

 call p_regPersona('05878895-3', 'Jorge Luis', 'Sidgo Pimentel', 'Masculino', '1999-05-21', '2025-05-26', 'Estudiante', 'Res. Las Colinas Sda Maquilishuat #24', 'Soltero', 1);

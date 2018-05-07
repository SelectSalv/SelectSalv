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

select * from usuario;

create table Rol(
	idRol int auto_increment unique not null primary key,
    codRol text,
    estado int,
    descRol text
);

select * from Rol;

insert into Rol(codRol, descRol) values('mMun', 'Desarrollador');

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

select * from persona;

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

insert into Municipio(nomMunicipio, idDepartamento) values('Santa Tecla', 1);
insert into Municipio(nomMunicipio, idDepartamento) values('San Salvador', 2);


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

# VISTAS

# Vista con los datos de usuario

create view v_Usuarios as (
	select u.idUsuario, u.nomUsuario, u.pass, r.descRol
    from Usuario u, Rol r
    where u.idRol = r.idRol
);

# Vista con los datos de Persona

create view v_Persona as (
	select p.idPersona, p.dui, p.nomPersona, p.apePersona, p.genero, p.fechaNac, p.fechaVenc, p.profesion, p.direccion, p.estadoCivil, p.estadoVotacion, 
            m.nomMunicipio, d.nomDepartamento 
    from Persona p, Municipio m, Departamento d
    where p.idMunicipio = m.idMunicipio and m.idDepartamento = d.idDepartamento
    order by p.idPersona desc
);

select * from v_Persona
# PROCEDIMIENTOS ALMACENADOS

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
    insert into Usuario(nomUsuario, pass, idRol) values(nom, contra, ideRol);
end
$$






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

call p_loginUsuario('ftWj0Ja1m9Oa3Q==', 'cd8420c9a4ff19ed893cd97155b9c0c18350d0ad');

# Procedimiento almacenado para registrar Persona

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
    in estado varchar(50),
    in municipio int
)
begin
	insert into Persona(dui, nomPersona, apePersona, genero, fechaNac, fechaVenc, profesion, direccion, estadoCivil, estadoVotacion, idMunicipio)
    values (dui, nom, ape, gen, fechanac, fechavenc, prof, direc, estado, 0, municipio);
end
$$

truncate table Persona


#Procedimiento para devolver los datos de Persona en base a N° de DUI
delimiter $$
create procedure p_obtenerPersona(
	in ndui varchar(15)
)
begin
	select * from v_Persona where dui = ndui;
end
$$

call p_regPersona('12345678-9', 'Saturnino Donato', 'Vaquerano Contreras', 'Masculino', '1976-05-05', '2019-05-05', 'Ingeniero en Sistemas', 'Residencial Veranda Senda Maquilishuat #22', 'Soltero', 1);
call p_regPersona('98765432-1', 'Pablo Emilio', 'Escobar Gaviria', 'Masculino', '1945-02-01', '2022-02-01', 'Traficante', 'Col. Escalón 6ta av #1', 'Divorciado', 2);

call p_regPersona('05878895-3', 'Jorge Luis', 'Sidgo Pimentel', 'Masculino', '1999-05-21', '2025-05-26', 'Estudiante', 'Res. Las Colinas Sda Maquilishuat #24', 'Soltero', 1);

call p_obtenerPersona('05878895-3');
#Creación de la Base de Datos
create database SelectSalv;

use SelectSalv;


#TABLAS
#-----------------------------------------------

#Tabla Usuario
create table Usuario(
	idUsuario int auto_increment,
    nomUsuario text,
    pass text,
    idRol varchar(256),
    primary key(idUsuario)
);



#Tabla de Roles de Usuario
create table Rol(
	idRol varchar(256),
    descRol text
);

#Tabla Persona
create table persona(
DUI varchar(15) not null,
nomPersona varchar(100)not null,
apePersona varchar(100)not null,
fechaNac date not null,
profesion varchar(100),
direccion varchar(200)not null,
estadoCivil varchar(15),
idMunicipio int not null,
primary key(DUI) );

# Tabla Departamento
create table departamento(
idDepartamento int not null,
nomDepartameno varchar(150) not null,
primary key(idDepartamento));

#Tabla Municipio
create table municipio(
idMunicipio int not null,
nomMunicipio varchar(200) not null,
idDepartamento int not null,
primary key(idMunicipio)
);

create table centroVotacion(
idCentro int not null,
nomCentro varchar(200) not null,
idMunicipio int not null,
primary key(idCentro)
);

create table JRV(
idJRV int not null,
numJRV int not null,
idCentro int not null,
primary key(idJRV)
);

create table partido(
idPartido int not null,
nomPartido varchar(100),
primary key(idPartido));

create table detalleVoto(
idDetalle int not null,
DUI int not null,
idPartido int not null,
idJRV int not null,
primary key(idDetalle)
);

create table tipoCandidato(
idTipoCandidato int not null,
descripcionTipo varchar(50),
primary key(idTipoCandidato));

create table candidato(
idPartido int not null,
idTipoCandidato int not null,
DUI int not null
);

select * from Rol;

insert into Rol values('mMun', 'Desarrollador');

#LLAVES FORÁNEAS
#-----------------------------------------------
alter table Usuario add constraint fk_id_rol foreign key(idRol) references Rol(idRol);
alter table munici


#PROCEDIMIENTOS ALMACENADOS
#-----------------------------------------------

#Procedimiento almacenado para registrar Usuarios
delimiter $$
create procedure p_RegUsuario(
	in nom text,
    in contra text,
    in rol text
)
begin
	insert into Usuario(nomUsuario, pass, idRol) values(nom, contra, rol);
end
$$

call p_RegUsuario('ftWj0Ja1m9Oa3Q==', 'cd8420c9a4ff19ed893cd97155b9c0c18350d0ad', 'mMun');

#Procedimiento almacenado para comparar datos de Logueo
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

call p_loginUsuario('ftWj0Ja1m9Oa3Q==', 'cd8420c9a4ff19ed893cd97155b9c0c18350d0ad');

#VISTAS
#-----------------------------------------------

create view v_Usuarios as (
	select u.idUsuario, u.nomUsuario, u.pass, r.descRol
    from Usuario u, Rol r
    where u.idRol = r.idRol
);

select * from v_Usuarios
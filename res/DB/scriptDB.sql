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

select * from Rol;

insert into Rol values('mMun', 'Desarrollador');

#LLAVES FORÁNEAS
#-----------------------------------------------
alter table Usuario add constraint fk_id_rol foreign key(idRol) references Rol(idRol);



#PROCEDIMIENTOS ALMACENADOS
#-----------------------------------------------

#Procedimiento almacenado para registrar Usuarios
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
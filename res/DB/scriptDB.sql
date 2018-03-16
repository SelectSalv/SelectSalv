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
delimiter $$
create procedure p_RegUsuario(
	in nom text,
    in pass text,
    in rol text
)
begin
	insert into Usuario(nomUsuario, pass, idRol) values(nom, pass, rol);
end
$$

call p_RegUsuario('ftWj0Ja1m9Oa3Q==', 'cd8420c9a4ff19ed893cd97155b9c0c18350d0ad', 'mMun');



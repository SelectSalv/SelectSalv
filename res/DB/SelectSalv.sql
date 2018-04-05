drop database if exists SelectSalv;
create database if not exists SelectSalv;

use SelectSalv;

create table Usuario(
	idUsuario int auto_increment unique not null primary key,
    nomUsuario text,
    pass text,
    idRol int not null
);



create table Rol(
	idRol int auto_increment unique not null primary key,
    codRol text,
    descRol text
);

create table Persona(
	idPersona int auto_increment unique not null primary key,
    dui varchar(15) not null,
    nomPersona varchar(100),
    apePersona varchar(100),
    fechaNac date,
    fechaVenc date,
    profesion varchar(100),
    direccion varchar(250),
    estadoCivil varchar(50),
    idMunicipio int not null
);



create table Departamento(
	idDepartamento int auto_increment unique not null primary key,
    nomDepartamento varchar(150)
);

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

alter table Usuario add constraint fk_idRol foreign key(idRol) references Rol(idRol);
alter table Persona add constraint fk_idMunicipio foreign key(idMunicipio) references Municipio(idMunicipio);
alter table Municipio add constraint fk_idDepartamento foreign key (idDepartamento) references Departamento(idDepartamento);
alter table centroVotacion add constraint fk_idMunicipio foreign key (idMunicipio) references Municipio(idMunicipio);
alter table Jrv add constraint fk_idCentro foreign key (idCentro) references CentroVotacion(idCentro);
alter table DetalleVoto add constraint fk_idPersona foreign key (idPersona) references Persona(idPersona);
alter table DetalleVoto add constraint fk_idPartido foreign key (idPartido) references Partido(idPartido);
alter table DetalleVoto add constraint fk_idJrv foreign key (idJrv) references Jrv(idJrv);
alter table Candidato add constraint fk_idPartido foreign key (idPartido) references Partido(idPartido);
alter table Candidato add constraint fk_idTipoCandidato foreign key (idTipoCandidato) references TipoCandidato(idTipoCandidato);
alter table Candidato add constraint fk_idPersona foreign key (idPersona) references Persona(idPersona);


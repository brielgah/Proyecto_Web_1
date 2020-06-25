create database alumnos;
create database usuarios;
use usuarios;
create table usuario(
	user varchar(18) not null unique,
	passwd varchar(10) not null unique,
	admin boolean,
	primary key(user,passwd)
);
use alumnos;
create table alumno(
	curp varchar(18) not null unique,
	boleta varchar(10) not null unique,
	primary key(curp,boleta)
);
create table datos(
	nombre varchar(25) not null,
	ap_paterno varchar(25) not null,
	ap_materno varchar(25) not null,
	escuela varchar(50) not null,
	estado varchar(25) not null,
	direccion varchar(100) not null,
	municipio varchar(25) not null,
	cp decimal(5,0) not null,
	email varchar(50) not null unique,
	fechaNacimiento date not null,
	telefono decimal(10,0) not null,
	celular decimal(10,0) not null,
	promedio decimal(4,2) not null,
	curp varchar(18) not null,
	boleta varchar(10) not null,
	foreign key(curp,boleta) references alumno(curp,boleta),
	primary key(curp,boleta)
);

create database alumnos;
create database usuarios;
use usuarios;
create table usuario(
	user varchar(18) not null,
	passwd varchar(10) not null,
	primary key(user,passwd)
);
use alumnos;
create table alumno(
	curp varchar(18) not null,
	boleta varchar(10) not null,
	primary key(curp,boleta)
);
create table datos(
	nombre varchar(100) not null,
	escuela varchar(50) not null,
	direccion varchar(100) not null,
	email varchar(50) not null unique,
	fechaNacimiento date not null,
	telefono decimal(10,0) not null,
	celular decimal(10,0) not null,
	promedio decimal(4,2) not null,
	curp varchar(18) not null references alumno(curp),
	boleta varchar(10) not null references alumno(boleta),
	primary key(curp,boleta)
);

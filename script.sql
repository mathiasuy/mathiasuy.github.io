drop database if exists tareaphp ;
create database tareaphp;

use  tareaphp;

create table Personas(
	nombre varchar(25),
    documento varchar(15) primary key,
    email varchar(25),
    pass varchar(100)
);


insert into personas(nombre,documento,email,pass) values ("marta",12345678,"marta@fing.edu.uy","ereasd");
insert into personas(nombre,documento,email,pass) values ("juan",13243512,"lolo@yahoo.com.ar","54ñlj");

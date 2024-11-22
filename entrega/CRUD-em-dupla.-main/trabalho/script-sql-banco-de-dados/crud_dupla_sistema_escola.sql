create database crud_dupla;

use crud_dupla;

create table professores (
    id int primary key auto_increment not null,
    nome varchar(25) not null
);

create table aulas (
    id int primary key auto_increment not null,
    sala varchar(10) not null,
    tipo_materia varchar(45) not null,
    horario time not null unique
);

create table diaria (
    id int primary key auto_increment not null,
    professor_id int not null,
    aula_id int not null,
    foreign key (professor_id) references professores(id),
    foreign key (aula_id) references aulas(id)
);
create database saep_db;

use saep_db;

create table usuario(
	id_usuario int primary key auto_increment not null,
    nome_completo varchar(100) not null,
    email varchar(150) not null
);

create table tarefas(
	id_tarefa int primary key auto_increment not null,
    descricao_tarefa varchar(10000) not null,
	nome_setor varchar(100) not null,
    prioridade enum('baixa', 'média', 'alta') not null,
    data_cadastro_tarefa date,
    status_tarefa enum('a fazer', 'fazendo', 'pronto') not null,
    fk_usuario INT,  
    FOREIGN KEY (fk_usuario) REFERENCES usuario(id_usuario)
);

select * from usuario;
select * from tarefas;
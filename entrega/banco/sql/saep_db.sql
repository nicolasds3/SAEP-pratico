create database saep_db;

use saep_db;

create table usuario(
	id_usuario int primary key auto_increment not null,
    nome_completo varchar(100),
    email varchar(150)
);

create table tarefas(
	id int primary key auto_increment not null,
    descricao_tarefa varchar(10000),
	nome_setor varchar(100),
    prioridade enum('baixa', 'média', 'alta'),
    data_cadastro_tarefa date,
    status_tarefa enum('a fazer', 'fazendo', 'pronto'),
    fk_usuario INT NOT NULL,  
    FOREIGN KEY (fk_usuario) REFERENCES usuario(id_usuario)
);
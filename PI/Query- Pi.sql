use onu 

CREATE TABLE usuario_L (
	IdUsuario int primary key identity(1,1) not null,
	nomeUsuario varchar(100) not null,
	email varchar(100) not null,
	senha varchar(100) not null,
	ativo char(1)
)

CREATE TABLE projeto_L (
	IdCategoria int references categoria_L(IdCategoria),
	IdUsuario int references usuario_L(IdUsuario),
	IdProjeto int primary key NOT NULL,
	nomeProjeto varchar(100) NOT NULL,
	imagens varchar(100),
	dataPostagem varchar(100) NOT NULL,
	descricao varchar(100),
	ativo char(1)
)

CREATE TABLE categoria_L (
	IdCategoria int primary key identity(1,1),
	nomeCategoria varchar(100) not null,
	ativo char(1)
)

INSERT INTO categoria_L (nome,ativo)  VALUES ('Programacao', 'S')

--- ordem
--- AUTOR => CATEGORIA => PROJETO

SELECT * FROM categoria
SELECT * FROM usuario
SELECT * FROM projeto
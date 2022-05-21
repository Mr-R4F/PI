use onu 


CREATE TABLE usuario_LL (
	IdUsuario int primary key identity(1,1) not null,
	nomeUsuario varchar(100) not null,
	email varchar(100) not null,
	senha varchar(100) not null,
	ativo char(1)
)

CREATE TABLE projeto_LL (
	IdCategoria int references categoria_LL(IdCategoria),
	IdUsuario int references usuario_LL(IdUsuario),
	IdProjeto int primary key NOT NULL,
	nomeProjeto varchar(100) NOT NULL,
	imagens varchar(100),
	dataPostagem varchar(100) NOT NULL,
	descricao varchar(100),
	ativo char(1)
)

CREATE TABLE categoria_LL (
	IdCategoria int primary key identity(1,1),
	nomeCategoria varchar(100) not null,
	ativo char(1)
)

INSERT INTO categoria_L (nome,ativo)  VALUES ('Programacao', 'S')

--- ordem
--- AUTOR => CATEGORIA => PROJETO

SELECT * FROM categoria_LL
SELECT * FROM usuario_LL
SELECT * FROM projeto_LL

INSERT INTO categoria_LL (nomeCategoria,ativo) 
VALUES ('3D', 's')

SELECT nomeProjeto, imagens, dataPostagem FROM projeto_LL 
INNER JOIN usuario_LL ON usuario_LL.IdUsuario = projeto_LL.IdUsuario
WHERE IdProjeto = 7 AND nomeUsuario = 'passos'
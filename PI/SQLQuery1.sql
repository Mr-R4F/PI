use trab

drop database teste

SELECT * FROM autor 

drop table usuario
drop table categoria
drop table projeto

CREATE TABLE usuario (
	IdUsuario int primary key identity(1,1) not null,
	nomeUsuario varchar(100) not null,
	email varchar(100) not null,
	senha varchar(100) not null,
	ativo char(1)
)

CREATE TABLE projeto (
	IdCategoria int references categoria(IdCategoria),
	IdUsuario int references usuario(IdUsuario),
	IdProjeto int primary key NOT NULL,
	nomeProjeto varchar(100) NOT NULL,
	imagens varchar(100),
	dataPostagem varchar(100) NOT NULL,
	descricao varchar(100),
	ativo char(1)
)

CREATE TABLE categoria (
	IdCategoria int primary key identity(1,1),
	nomeCategoria varchar(100) not null,
	ativo char(1)
)


SELECT * FROM categoria
SELECT * FROM usuario ---(USUARIO)
SELECT * FROM projeto

SELECT IdProjeto FROM projeto WHERE IdProjeto in (SELECT MAX(IdProjeto) FROM projeto)

--- ordem
--- AUTOR => CATEGORIA => PROJETO

INSERT INTO categoria (nome,ativo)  VALUES ('Programacao', 'S')

INSERT INTO autor (nome, email, senha, ativo)  VALUES ('ricardin', 'r@gmail.com', '12223', 'N')
SELECT (MAX(IdProjeto)) + 1 , 1, 1, 'minhas produ��es', '12444365', '2001-04-01', 'ol� 9856y8', 'N' FROM projeto

SELECT idUsuario FROM usuario WHERE nome = 'teste'
SELECT idProjeto, imagens FROM projeto WHERE nome = nome AND idProjeto = 6
SELECT imagens FROM projeto WHERE nome = 'testes' AND IdProjeto = 6
SELECT IdUsuario FROM usuario WHERE nome = 'teste'

INSERT INTO projeto (IdProjeto, IdUsuario, IdCategoria, nome, url, dataPostagem, descricao, ativo) 
	SELECT ISNULL(MAX(IdProjeto),0) + 1 , 1, 1, 'minhas produ��es', '12444365', '2001-04-01', 'ol� 9856y8', 'N' FROM projeto

	INSERT INTO projeto (IdProjeto, Idusuario, IdCategoria, nome, url, dataPostagem, descricao, ativo) 
	SELECT (MAX(IdProjeto) + 1) , 1, 1, 'minhas produ��es', '12444365', '2001-04-01', 'ol� 9856y8', 'N' FROM projeto

Delete from projeto where IdProjeto  = 16

INSERT INTO projeto (IdAutor, IdCategoria, nome, url, dataPostagem, descricao, ativo) 
VALUES (1, 4, 'minhas produ��es', '12444365', '2001-04-01', 'ol� 9856y8', 'N') 

INSERT INTO categoria_t (nome,ativo) 
VALUES ('3D', 'S')

INSERT INTO categoria (nomeCategoria,ativo) 
VALUES ('3D', 's')

INSERT INTO autor (nome, email, senha, ativo) 
VALUES ('ricardin', 'r@gmail.com', '12223', 'N')

INSERT INTO projeto (IdAutor, IdCategoria, nome, url, dataPostagem, descricao, ativo) 
VALUES (3, 3, 'minhas produ��es', '12444365', '2001-04-01', 'ol� 9856y8', 'N') 

SELECT (MAX(IdProjeto)) AS ID FROM projeto WHERE nome = 'teste'

SELECT usuario.nomeUsuario, projeto.nomeProjeto, projeto.dataPostagem, projeto.IdProjeto, projeto.imagens 
FROM usuario, projeto WHERE usuario.nomeUsuario = 'teste2' AND projeto.IdProjeto = projeto.IdProjeto

SELECT imagens FROM projeto WHERE nome = 'teste' AND projeto.IdProjeto = projeto.IdProjeto

DROP TABLE categoria
DROP TABLE usuario
DROP TABLE projeto

SELECT * FROM categoria
SELECT * FROM usuario ---(USUARIO)
SELECT * FROM projeto ---(USUARIO)

DROP VIEW pesquisa---(USUARIO)

SELECT usuario.nomeUsuario, projeto.nomeProjeto, projeto.dataPostagem, projeto.IdProjeto, projeto.imagens 
FROM usuario, projeto WHERE usuario.nomeUsuario = 'teste2' AND projeto.IdProjeto = projeto.IdProjeto

SELECT usuario.nomeUsuario, projeto.nomeProjeto, projeto.dataPostagem, 
projeto.ativo, projeto.imagens, projeto.descricao, projeto.IdProjeto
FROM usuario, projeto WHERE usuario.nomeUsuario = 'teste2' AND IdProjeto = '3'


SELECT usuario.nomeUsuario, projeto.nomeProjeto, projeto.dataPostagem, projeto.imagens, projeto.IdProjeto
FROM usuario, projeto WHERE usuario.nomeUsuario = 'teste2'


SELECT IdProjeto FROM projeto WHERE IdProjeto = '1'
IF (IdProjeto = IdProjeto)
print 'foi'

SELECT usuario.IdUsuario, projeto.IdProjeto, projeto.nome FROM usuario, projeto

SELECT usuario.IdUsuario, projeto.IdProjeto, projeto.nomeProjeto FROM usuario, projeto

SELECT usuario.nomeUsuario, projeto.nomeProjeto, projeto.dataPostagem, projeto.imagens, projeto.IdProjeto
    FROM usuario, projeto WHERE usuario.nomeUsuario = 'teste2'  AND  projeto.IdProjeto = '1'


SELECT projeto.nomeProjeto FROM projeto 
WHERE projeto.IdProjeto = '4'

SELECT IdProjeto FROM projeto WHERE IdProjeto ='2'
SELECT nomeProjeto, imagens, dataPostagem FROM projeto WHERE IdProjeto = '1'

SELECT * FROM categoria
SELECT * FROM usuario ---(USUARIO)
SELECT * FROM projeto ---(USUARIO)

SELECT * FROM projeto WHERE nomeProjeto LIKE 'Um projeto ai'


UPDATE projeto SET



/*
	- MODIFICAR O C�DIGO
	- PUXAR A CATEGORIA DO BANCO
	- TIRAR O BOT�O OK E FILTRAR
	- 

*/
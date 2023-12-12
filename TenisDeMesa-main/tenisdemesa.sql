create database TenisDeMesa;
use TenisDeMesa;

CREATE TABLE ranking_tenis_de_mesa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nacao VARCHAR(255) NOT NULL,
    nome VARCHAR(255) NOT NULL,
    pontuacao INT
);

INSERT INTO ranking_tenis_de_mesa (nacao, nome, pontuacao) VALUES 
	('BR', 'Hugo Calderano', 2875),
	('CN', 'Ma Long', 4635),
	('CN', 'Lin Yun-Ju', 2385),
	('CN', 'Lin Gaoyuan', 2245),
    ('FR', 'Felix Lebrun', 2110),
	('CN', 'Liang Jingkun', 2945),
	('CN', 'Wang Chuqin', 5145),
	('CN', 'Fan Zhendong', 6544);

select * from ranking_tenis_de_mesa;

create table usuario (
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL
);
INSERT INTO usuario (nome, email, senha) VALUES 
	('Admin7382', 'admin@admin', 7382);

select * from usuario;
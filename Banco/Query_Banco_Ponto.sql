-- Cria o banco de dados se ele não existir
CREATE DATABASE IF NOT EXISTS db_pontoeletronico;
-- Seleciona o banco de dados criado
USE db_pontoeletronico;

-- Cria a tabela tbl_usuario se ela não existir
CREATE TABLE IF NOT EXISTS tbl_usuario (
  id_usuario INT AUTO_INCREMENT,
  primeiro_nome VARCHAR(255) NOT NULL,
  ultimo_nome VARCHAR(255) NOT NULL,
  email VARCHAR(255) DEFAULT NULL,
  senha VARCHAR(255) NOT NULL,
  PRIMARY KEY (id_usuario),
  UNIQUE KEY (email)
);

-- Cria a tabela tbl_registros_ponto se ela não existir
CREATE TABLE IF NOT EXISTS tbl_registros_ponto (
    id_registro INT AUTO_INCREMENT,
    localizacao VARCHAR(255) NOT NULL,
    hora VARCHAR(255) NOT NULL,
    data VARCHAR(255) NOT NULL , 
    tipo VARCHAR(50) NOT NULL,
    id_usuario INT(11) NOT NULL,
    PRIMARY KEY (id_registro),
    FOREIGN KEY (id_usuario) REFERENCES tbl_usuario(id_usuario)
);

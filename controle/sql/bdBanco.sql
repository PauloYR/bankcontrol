CREATE SCHEMA IF NOT EXISTS bdbanco;
CREATE TABLE IF NOT EXISTS bdbanco.conta(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(16) NOT NULL,
	cpf VARCHAR(30) NOT NULL,
	cod VARCHAR(10) UNIQUE KEY NOT NULL,
	telefone VARCHAR(20) NOT NULL,
	login VARCHAR(30) UNIQUE KEY NOT NULL,
	senha VARCHAR(2000) NOT NULL
);
CREATE TABLE IF NOT EXISTS bdbanco.ibancarias(
	id INT PRIMARY KEY AUTO_INCREMENT,
	Nomebanco VARCHAR(50) NOT NULL,
	Saque VARCHAR(100) NOT NULL DEFAULT 00.00,
	Deposito VARCHAR(100) NOT NULL DEFAULT 00.00,
	Saldo VARCHAR(100) NOT NULL DEFAULT 00.00,
	nmrConta VARCHAR(100) NOT NULL UNIQUE,
	id_cliente INT(50),
	tipo CHAR(1) NOT NULL,
	FOREIGN KEY (id_cliente) REFERENCES bdbanco.conta(id)
);
CREATE TABLE IF NOT EXISTS bdbanco.icredito(
	idCre INT PRIMARY KEY AUTO_INCREMENT,
	Cartao VARCHAR(50) NOT NULL,
	num_cartao VARCHAR(50) NOT NULL,
	data_vencimento VARCHAR(13) NOT NULL,
	limite INT NOT NULL,
	id_cliente INT(50) NOT NULL,
	FOREIGN KEY (id_cliente) REFERENCES bdbanco.conta(id)
);
CREATE TABLE IF NOT EXISTS bdbanco.despesas(
	id INT PRIMARY KEY AUTO_INCREMENT,
	id_cliente INT(50) NOT NULL,
	nome_despesa VARCHAR(40) NOT NULL,
	data_vencimento VARCHAR(13) NOT NULL,
	valor INT NOT NULL,
	estado CHAR(1) NOT NULL DEFAULT "",
	tipo VARCHAR(5) NOT NULL,
	FOREIGN KEY(id_cliente) REFERENCES bdbanco.conta(id)
);
CREATE TABLE IF NOT EXISTS bdbanco.balanco(
	idBal INT PRIMARY KEY AUTO_INCREMENT,
	gasto INT DEFAULT "00.00",
	ganho INT DEFAULT "00.00",
	balanco INT DEFAULT "00.00",
	tipo VARCHAR(9) DEFAULT "Mensal",
	id_cliente INT(50) ,
	FOREIGN KEY(id_cliente) REFERENCES bdbanco.conta(id)
);
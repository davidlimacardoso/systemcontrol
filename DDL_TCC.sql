/* Deletar o Banco*/
DROP DATABASE IF EXISTS BD_SystemControlTCC;

/* Criar o Banco*/
CREATE DATABASE BD_SystemControlTCC;

/*DEFINE PADRÃO BRASILEIRO*/
/*ALTER DATABASE BD_SystemControlTCC CHARSET = Latin1 COLLATE = latin1_swedish_ci;*/

USE BD_SystemControlTCC;

/* Deletar o Banco*/


-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.

CREATE TABLE Tb_Pagina (
idPagina INT,
nomePagina VARCHAR(20),
PRIMARY KEY AUTO_INCREMENT (idPagina)
);

CREATE TABLE Tb_Perfil (
idPerfil INT,
nomePerfil VARCHAR(20) NOT NULL,
situacaoPerfil BOOL NOT NULL,
administrador BOOL NOT NULL,
PRIMARY KEY AUTO_INCREMENT (idPerfil)
);

select * from Tb_Perfil;

CREATE TABLE Tb_PaginaPerfil (
idPerfil INT,
idPagina INT,
FOREIGN KEY(idPerfil) REFERENCES Tb_Perfil (idPerfil),
FOREIGN KEY(idPagina) REFERENCES Tb_Pagina (idPagina)
);

CREATE TABLE Tb_Usuario (
idUsuario INT not null PRIMARY KEY auto_increment,
nomeUsuario VARCHAR(100) NOT NULL,
cpf VARCHAR(11) NOT NULL unique,
idPerfil INT NOT NULL,
rg VARCHAR(10) NOT NULL,
nickName VARCHAR(20) NOT NULL,
senha VARCHAR(20) NOT NULL,
eMail VARCHAR(130),
tel VARCHAR(13),
cel VARCHAR(14)  NOT NULL,
sexo char,
cep varchar(15),
endereco VARCHAR(150),
numero VARCHAR(5),
bairro VARCHAR(50),
cidade VARCHAR(30),
estado VARCHAR(2),
dataCadastro DATETIME,
dataAtualizacao DATETIME,
ativo BOOL,
FOREIGN KEY(idPerfil) REFERENCES Tb_Perfil (idPerfil)
);
select * from Tb_Usuario;

CREATE TABLE Tb_Unidade (
idUnidade INT PRIMARY KEY AUTO_INCREMENT,
nomeUnidade VARCHAR(20),
unidadeAbreviada VARCHAR(3),
UNIQUE (nomeUnidade, unidadeAbreviada)
);
/*if( sum(peso) > 999 , CONCAT( ROUND( (sum(peso)/1000) ,2) , 'Kg', CONCAT( sum(peso) , 'g')*/

CREATE TABLE Tb_Configuracao (
idConfig INT not null PRIMARY KEY auto_increment,
nomeEmpresaCliente VARCHAR(100),
cnpj VARCHAR(14),
cep VARCHAR(8),
endereco VARCHAR(60),
numero VARCHAR(5),
bairro VARCHAR(50),
cidade VARCHAR(30),
estado VARCHAR(2),
nomeResponsavel VARCHAR(100),
telefoneComercial VARCHAR(12),
tipo VARCHAR(9),
eMail VARCHAR(100),
nomeFantasia VARCHAR(50),
corTxtLogo varchar(30),
corFundoLogo varchar(10),
corFundoMenu varchar(10),
corTxtMenu varchar(10),
dataCadastro DATETIME,
dataAlteracao DATETIME,
idUsuarioAlteracao INT,
FOREIGN KEY(idUsuarioAlteracao) REFERENCES Tb_Usuario (idUsuario)
);
select * from Tb_Configuracao;


CREATE TABLE Tb_TipoProduto (
idTipoProduto INT PRIMARY KEY AUTO_INCREMENT,
nomeTipoProduto VARCHAR(50) NOT NULL,
idUnidade INT,
usuarioCadastro INT,
UNIQUE (nomeTipoProduto),
FOREIGN KEY(idUnidade) REFERENCES Tb_Unidade (idUnidade),
FOREIGN KEY(usuarioCadastro) REFERENCES Tb_Usuario (idUsuario)
);

select * from tb_tipoProduto;

CREATE TABLE Tb_Fornecedor (
idFornecedor INT PRIMARY KEY AUTO_INCREMENT,
nomeFornecedor VARCHAR(100) NOT NULL,
cnpj VARCHAR(14) NOT NULL,
cep VARCHAR(60) NOT NULL,
endereco VARCHAR (100) NOT NULL,
numero VARCHAR (5) NOT NULL,
bairro VARCHAR(30) NOT NULL,
cidade VARCHAR(30) NOT NULL,
estado VARCHAR(2) NOT NULL,
nomeResponsavel VARCHAR(150) NOT NULL,
telefoneComercial VARCHAR(13) NOT NULL,
telefoneCelular VARCHAR(13) NOT NULL,
eMail VARCHAR(100) NOT NULL,
idUsuarioCadastro INT,
dataCadastro DATETIME,
dataAtualizacao DATETIME,
ativo BOOL,
UNIQUE (nomeFornecedor,cnpj),
FOREIGN KEY(idUsuarioCadastro) REFERENCES Tb_Usuario (idUsuario)
);
select * from Tb_Fornecedor;

CREATE TABLE Tb_PrecoVenda(
idPrecoVenda INT PRIMARY KEY AUTO_INCREMENT,
dataCadastroPreco DATETIME,
precoVenda DECIMAL(8,2)
);
select * from Tb_PrecoVenda;


CREATE TABLE Tb_Produto (
idProduto INT PRIMARY KEY AUTO_INCREMENT,
nomeProduto VARCHAR(100),
marcaProduto VARCHAR(100),
codigoBarras VARCHAR(13) UNIQUE,
descricaoProduto VARCHAR(300) NULL,
idUnidadeAbreviada INT,
valorMedida INT,
idPrecoVenda INT,
idTipoProduto INT,
idUsuarioCadastroProduto INT,
dataCadastro DATE,
estoqueMinimo BIGINT,
dataMinimo INT,
situacaoValidade bool,
ativo bool,
quantidadeTotal BIGINT NULL,
FOREIGN KEY(idTipoProduto) REFERENCES Tb_TipoProduto (idTipoProduto),
FOREIGN KEY(idPrecoVenda) REFERENCES Tb_PrecoVenda (idPrecoVenda),
FOREIGN KEY(idUnidadeAbreviada) REFERENCES Tb_Unidade (idUnidade),
FOREIGN KEY(idUsuarioCadastroProduto) REFERENCES Tb_Usuario (idUsuario)
);
select * from Tb_Produto;

CREATE TABLE Tb_CompraProduto(
idCompraProduto INT PRIMARY KEY AUTO_INCREMENT,
numeroPedido VARCHAR(40) not null,
numeroNotaFiscal VARCHAR(20) not null,
dataCompra DATE NOT NULL,
dataEntrega DATE not null,
idUsuarioCadastro INT,
idFornecedor INT not null,
estadoCompra VARCHAR (15),
valorTotalCompra DECIMAL(8,2),
quantidadeProdutoTotal INT,
dataRegistro DATETIME,
FOREIGN KEY(idUsuarioCadastro) REFERENCES Tb_Usuario (idUsuario),
FOREIGN KEY(idFornecedor) REFERENCES Tb_Fornecedor (idFornecedor)
);
select * from Tb_CompraProduto;

CREATE TABLE Tb_ListaProduto(
idListaProduto INT primary key auto_increment,
idPedido INT,
produto INT not null,
valorUnitario DECIMAL(8,2) not null,
quantidadeProduto BIGINT not null,
valorTotalProduto decimal (8,2),
foreign key (produto) references Tb_Produto(idProduto),
foreign key (idPedido) references Tb_CompraProduto(idCompraProduto)
);
select * from Tb_ListaProduto;

CREATE TABLE Tb_Lote (
idLote INT PRIMARY KEY AUTO_INCREMENT,
dataEntrada DATETIME NOT NULL,
idUsuario INT,
idCompraProduto INT,
idProduto int,
quantidadeLote INT NULL,
validade DATE null,
FOREIGN KEY(idUsuario) REFERENCES Tb_Usuario (idUsuario),
FOREIGN KEY(idCompraProduto) REFERENCES Tb_CompraProduto (idCompraProduto),
FOREIGN KEY(idProduto) REFERENCES Tb_Produto (idProduto)
);
select * from Tb_Lote;



CREATE TABLE Tb_Venda(
idVenda INT PRIMARY KEY AUTO_INCREMENT,
codigoVenda int,
idProduto INT,
quantidadeVenda INT,
precoVendido decimal(8,2),
dataVenda DATETIME,
tipoVenda VARCHAR(15),
idUsuario INT,
FOREIGN KEY(idProduto) REFERENCES Tb_Produto (idProduto),
FOREIGN KEY(idUsuario) REFERENCES Tb_Usuario (idUsuario)
);

SELECT * FROM Tb_Venda;






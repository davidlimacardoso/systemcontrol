/* Deletar o Banco*/
DROP DATABASE IF EXISTS BD_SystemControlTCC;

/* Criar o Banco*/
CREATE DATABASE BD_SystemControlTCC;

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

CREATE TABLE Tb_PaginaPerfil (
idPerfil INT,
idPagina INT,
FOREIGN KEY(idPerfil) REFERENCES Tb_Perfil (idPerfil),
FOREIGN KEY(idPagina) REFERENCES Tb_Pagina (idPagina)
);

CREATE TABLE Tb_Usuario (
idUsuario INT not null PRIMARY KEY auto_increment,
nomeUsuario VARCHAR(100) NOT NULL,
cpf VARCHAR(11) NOT NULL,
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

CREATE TABLE Tb_Unidade (
idUnidade INT PRIMARY KEY AUTO_INCREMENT,
nomeUnidade VARCHAR(20),
unidadeAbreviada VARCHAR(3),
UNIQUE (nomeUnidade, unidadeAbreviada)
);

CREATE TABLE Tb_Configuracao (
idConfig INT PRIMARY KEY auto_increment,
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

CREATE TABLE Tb_TipoProduto (
idTipoProduto INT PRIMARY KEY AUTO_INCREMENT,
nomeTipoProduto VARCHAR(50) NOT NULL,
idUnidade INT,
usuarioCadastro INT,
UNIQUE (nomeTipoProduto),
FOREIGN KEY(idUnidade) REFERENCES Tb_Unidade (idUnidade),
FOREIGN KEY(usuarioCadastro) REFERENCES Tb_Usuario (idUsuario)
);

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

CREATE TABLE Tb_PrecoVenda(
idPrecoVenda INT PRIMARY KEY AUTO_INCREMENT,
dataCadastroPreco DATETIME,
precoVenda DECIMAL(8,2)
);

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
ativo bool,
quantidadeTotal BIGINT NULL,
FOREIGN KEY(idTipoProduto) REFERENCES Tb_TipoProduto (idTipoProduto),
FOREIGN KEY(idPrecoVenda) REFERENCES Tb_PrecoVenda (idPrecoVenda),
FOREIGN KEY(idUnidadeAbreviada) REFERENCES Tb_Unidade (idUnidade),
FOREIGN KEY(idUsuarioCadastroProduto) REFERENCES Tb_Usuario (idUsuario)
);

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

CREATE TABLE Tb_ListaProduto(
idListaProduto INT primary key auto_increment,
idPedido INT,
produto INT not null,
valorUnitario DECIMAL(8,2) not null,
quantidadeProduto BIGINT not null,
valorTotalProduto decimal (8,2),
validade DATE,
foreign key (produto) references Tb_Produto(idProduto),
foreign key (idPedido) references Tb_CompraProduto(idCompraProduto)
);

CREATE TABLE Tb_Lote (
idLote INT PRIMARY KEY AUTO_INCREMENT,
dataEntrada DATETIME NOT NULL,
idUsuario INT,
idCompraProduto INT,
quantidadeLote INT NULL,
FOREIGN KEY(idUsuario) REFERENCES Tb_Usuario (idUsuario),
FOREIGN KEY(idCompraProduto) REFERENCES Tb_CompraProduto (idCompraProduto)
);

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

/***************	POPULAR BANCO	******************/

/*INSERT TB UNIDADE*/
insert into Tb_Unidade values (1,'Kilo', 'Kg');
insert into Tb_Unidade values (2,'Gramas', 'g');
insert into Tb_Unidade values (3,'Miligramas', 'mg');
insert into Tb_Unidade values (4,'Mililitros', 'ml');
insert into Tb_Unidade values (5,'Litros', 'L');
insert into Tb_Unidade values (6,'Unidade', 'un');

/*INSERT TB PEFIL*/
insert Tb_Perfil values (7,'COMPRAS','1','0');
insert Tb_Perfil values (6,'CONTROLE','1','0');
insert Tb_Perfil values (5,'ESTOQUE','1','0');
insert Tb_Perfil values (4,'VENDAS','1','0');
insert Tb_Perfil values (3,'CONFERÊNCIA','1','0');
insert Tb_Perfil values (2,'GERÊNCIA','1','0');
insert Tb_Perfil values (1,'ADMINISTRADOR','1','1');

/*INSERT TB USUARIO*/
select * from Tb_Usuario;
insert into Tb_Usuario values (1,'Florentino Alves','12345665434',2,'48777877x','florentino','123','flo@loja.com','6655487522','6655487522','m','6655487522','Rua Gogia','30','Jd. Ribeiro','Itapevi','SP', '2019-07-09', now(),1);
INSERT INTO Tb_Usuario VALUES (16,"José Doria","16371228603",2,"166704138","doria","123","doria@doria.com","3796903169","29597843136",'m',"12050884","Viverra. Street","7","Metropolitana de Santiago","Maipú","SP",'2019-09-11', now(),1);

/*INSERT TIPO DE PRODUTO*/
insert into Tb_TipoProduto (idTipoProduto,nomeTipoProduto,idUnidade,usuarioCadastro) values (1,'PRODUTO ANIMAL',6,16);
insert into Tb_TipoProduto (idTipoProduto,nomeTipoProduto,idUnidade,usuarioCadastro) values (2,'MANUTENÇÃO',6,16);
insert into Tb_TipoProduto (idTipoProduto,nomeTipoProduto,idUnidade,usuarioCadastro) values (3,'DURÁVEIS',6,16);
insert into Tb_TipoProduto (idTipoProduto,nomeTipoProduto,idUnidade,usuarioCadastro) values (4,'CONSUMO',6,16);
insert into Tb_TipoProduto (idTipoProduto,nomeTipoProduto,idUnidade,usuarioCadastro) values (5,'ACESSÓRIOS',6,16);
insert into Tb_TipoProduto (idTipoProduto,nomeTipoProduto,idUnidade,usuarioCadastro) values (6,'MATÉRIA PRIMA',6,16);
insert into Tb_TipoProduto (idTipoProduto,nomeTipoProduto,idUnidade,usuarioCadastro) values (7,'BENS DE CONVENIÊNCIA',6,16);
insert into Tb_TipoProduto (idTipoProduto,nomeTipoProduto,idUnidade,usuarioCadastro) values (8,'PRODUTO DE LIMPEZA',6,16);
insert into Tb_TipoProduto (idTipoProduto,nomeTipoProduto,idUnidade,usuarioCadastro) values (9,'ALIMENTO PERECÍVEL',6,16);
insert into Tb_TipoProduto (idTipoProduto,nomeTipoProduto,idUnidade,usuarioCadastro) values (10,'ALIMENTO NÃO PERECÍVEL',6,16);

/*INSERT FORNECEDOR*/
select * from Tb_Fornecedor;
insert into Tb_Fornecedor values (1,'Extra Supermercados','33041260065290','06670420','Rua das Nações Unidadas',30,'Jardim das Flores','Cotia','SP','Almir Castro da Silva','551142451123','551142451123','almir@extra.com.br',16,now(),now(),1);

select * from tb_lote;
/* INSERT TABELA PRODUTOS */
start transaction;
    insert into Tb_PrecoVenda (dataCadastroPreco,precoVenda) values (now(),5.00);
	insert into Tb_Produto (nomeProduto,marcaProduto,codigoBarras,descricaoProduto,idUnidadeAbreviada,valorMedida,idPrecoVenda,idTipoProduto,idUsuarioCadastroProduto,dataCadastro,estoqueMinimo,dataMinimo,ativo,quantidadeTotal) 
		values ('MAIONESE','HELLMANS','123123333333','CREME DE MAIONESE',2,300,last_insert_id(),10,1,now(),200,300,1,0);
commit;

start transaction;
    insert into Tb_PrecoVenda (dataCadastroPreco,precoVenda) values (now(),5.80);
	insert into Tb_Produto (nomeProduto,marcaProduto,codigoBarras,descricaoProduto,idUnidadeAbreviada,valorMedida,idPrecoVenda,idTipoProduto,idUsuarioCadastroProduto,dataCadastro,estoqueMinimo,dataMinimo,ativo,quantidadeTotal) 
		values ('SABÃO EM PÓ','OMO','1111111111111','SABÃO EM PÓ PARA ROUPAS',1,1,last_insert_id(),8,1,now(),100,100,1,0);
commit;
start transaction;
    insert into Tb_PrecoVenda (dataCadastroPreco,precoVenda) values (now(),3.40);
	insert into Tb_Produto (nomeProduto,marcaProduto,codigoBarras,descricaoProduto,idUnidadeAbreviada,valorMedida,idPrecoVenda,idTipoProduto,idUsuarioCadastroProduto,dataCadastro,estoqueMinimo,dataMinimo,ativo,quantidadeTotal) 
		values ('FARINHA DE TRIGO','DONA BENTA','2222222222222','FARINHA DE TRIGO NÃO AFERMENTADO',6,1.000,last_insert_id(),10,1,now(),300,80,1,0);
commit;
start transaction;
    insert into Tb_PrecoVenda (dataCadastroPreco,precoVenda) values (now(),13.00);
	insert into Tb_Produto (nomeProduto,marcaProduto,codigoBarras,descricaoProduto,idUnidadeAbreviada,valorMedida,idPrecoVenda,idTipoProduto,idUsuarioCadastroProduto,dataCadastro,estoqueMinimo,dataMinimo,ativo,quantidadeTotal) 
		values ('ARROZ TIPO 1','PRATO FINO','3333333333333','ARROZ BRANCO TIPO 1',1,5,last_insert_id(),10,1,now(),300,40,1,0);
commit;
start transaction;
    insert into Tb_PrecoVenda (dataCadastroPreco,precoVenda) values (now(),5.99);
	insert into Tb_Produto (nomeProduto,marcaProduto,codigoBarras,descricaoProduto,idUnidadeAbreviada,valorMedida,idPrecoVenda,idTipoProduto,idUsuarioCadastroProduto,dataCadastro,estoqueMinimo,dataMinimo,ativo,quantidadeTotal) 
		values ('GRAXA LIQUIDO PRETO','NUGGET','4444444444444','GRAXA PRETO LÍQUIDO COR PRETA',3,200,last_insert_id(),3,1,now(),80,500,1,0);
commit;
start transaction;
    insert into Tb_PrecoVenda (dataCadastroPreco,precoVenda) values (now(),6.99);
	insert into Tb_Produto (nomeProduto,marcaProduto,codigoBarras,descricaoProduto,idUnidadeAbreviada,valorMedida,idPrecoVenda,idTipoProduto,idUsuarioCadastroProduto,dataCadastro,estoqueMinimo,dataMinimo,ativo,quantidadeTotal) 
		values ('PATINHO DE BOI','CARNESUL','5555555555555','PATINHO DE BOI',1,1,last_insert_id(),9,1,now(),200,140,1,0);
commit;
/*
/* INSERT TABELA COMPRA PRODUTOS COM TB LISTA PRODUTOS 
start transaction;
insert into Tb_CompraProduto (numeroPedido,numeroNotaFiscal,dataCompra,dataEntrega,idUsuarioCadastro,idFornecedor,estadoCompra,valorTotalCompra)
	values ('22222222','998149819481',now(),date_add(NOW(), interval 10 DAY),1,3,'AGUARDANDO',0);
	insert into Tb_ListaProduto (idPedido,produto,valorUnitario,quantidadeProduto,validade)
		values (1,1,2.88,500,'2020-11-12');
        
	insert into Tb_ListaProduto (idPedido,produto,valorUnitario,quantidadeProduto,validade)
		values (1,2,0.88,300,'2019-12-11');
commit;
start transaction;
insert into Tb_CompraProduto (numeroPedido,numeroNotaFiscal,dataCompra,dataEntrega,idUsuarioCadastro,idFornecedor,estadoCompra,valorTotalCompra)
	values ('11111111','878179198',now(),date_add(NOW(), interval 10 DAY),1,2,'AGUARDANDO',0);
	insert into Tb_ListaProduto (idPedido,produto,valorUnitario,quantidadeProduto,validade)
		values (2,3,3.88,100,'2020-03-21');
        
	insert into Tb_ListaProduto (idPedido,produto,valorUnitario,quantidadeProduto,validade)
		values (2,4,4.88,800,'2020-09-30');
        
commit;

/*SELECT * FROM TB_LOTE
start transaction;
	insert into Tb_Lote (dataEntrada,idUsuario,idCompraProduto,quantidadeLote) 
		values (now(),6,1,500);
	UPDATE Tb_CompraProduto SET estadoCompra = 'RECEBIDO' where idCompraProduto = 1;
	UPDATE Tb_CompraProduto SET quantidadeProdutoTotal = 100 AND valorTotalCompra = 300 where idCompraProduto = 1;
	UPDATE Tb_Produto SET quantidadeTotal = 800 where idProduto = 2;
    
    
commit;

start transaction;
	insert into Tb_Lote (dataEntrada,idUsuario,idCompraProduto,quantidadeLote) 
		values (now(),6,2,500);
	UPDATE Tb_CompraProduto SET estadoCompra = 'RECEBIDO' where idCompraProduto = 2;
	UPDATE Tb_Produto SET quantidadeTotal = 500 where idProduto = 1;
	UPDATE Tb_Produto SET quantidadeTotal = 300 where idProduto = 2;
commit;
        
/* INSERT TABELA VENDAS 
insert into Tb_Venda values (1,1,1,10,4.79,now(),'cd',1);
insert into Tb_Venda values (2,1,2,3,3.29,now(),'cd',1);
insert into Tb_Venda values (3,1,3,55,7.99,now(),'cd',1);
insert into Tb_Venda values (4,2,4,14,2.59,now(),'cc',1);
insert into Tb_Venda values (5,3,5,6,12.99,now(),'d',1);

insert into Tb_Venda values (6,3,1,1,9.99,'2019-05-01','d',1);
insert into Tb_Venda values (7,3,2,2,2.99,'2019-02-01','cd',1);
insert into Tb_Venda values (8,3,3,15,0.99,'2019-10-19','cc',1);
insert into Tb_Venda values (9,3,4,9,1.59,'2019-01-10','d',1);
insert into Tb_Venda values (10,3,5,3,7.99,'2019-11-09','d',1);
*/
/*cnpj da empresa para apresentacao 33.041.260/0652-90 
cnpj do fornecedor para apresentacao 45.997.418/0001-53*/





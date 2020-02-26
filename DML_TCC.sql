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
insert into Tb_Usuario values (2,'Alves Malaquias','12345665111',4,'48717778x','alves','123','alves@loja.com','6655487522','6655487522','m','6655487522','Rua Bonano','100','Jd. Nova Vida','Cotia','SP', '2019-07-09', now(),1);
insert into Tb_Usuario values (3,'Cristian Nunes Silva','12345665100',3,'48077778x','cristian','123','cristian@loja.com','6655487522','6655487522','m','6655487522','Rua Bonano','100','Jd. Nova Vida','Cotia','SP', '2019-07-09', now(),1);
insert into Tb_Usuario values (4,'João Dutra Dias','12345665198',7,'48776778x','joao','123','joao@loja.com','6655487522','6655487522','m','6655487522','Rua Rubi','100','Jd. Esmeralda','Cotia','SP', '2019-07-09', now(),1);
insert into Tb_Usuario values (5,'Ivanilda Nunes','12345665112',4,'48777478x','ivanilda','123','ivanilda@loja.com','6655487522','6655487522','f','6655487522','Rua Cleópatra','197','Jd. Nova Vida','Jandira','SP', '2019-08-03', now(),1);
insert into Tb_Usuario values (6,'Carla Garcia de Lima','12345665444',6,'48557778x','carla','123','carla@loja.com','6655487522','6655487522','f','6655487522','Rua Andorinhas','100','Jd. Belizário','Cotia','SP', '2019-08-03', now(),1);
insert into Tb_Usuario values (7,'Luana','12345655321',7,'48557778x','luana','123','luana@loja.com','6655487522','6655487522','f','6655487522','Rua Andorinhas','100','Jd. Belizário','Cotia','SP', '2019-08-05', now(),1);
INSERT INTO Tb_Usuario VALUES (8,"Margaret","16930318750",3,"166701044","Burnett","123","lacinia@Praesent.edu","3319580806","12463322009",'f',"84908545","Euismod Street","799","Gaia","Liberia","sp",'2019-08-06', now(),1);
INSERT INTO Tb_Usuario VALUES (9,"Leonardo Marques","16190714564",2,"164307299","Leonardo","123","Phasellus@dictumplacerat.edu","3103043166","17948309754",'m',"39817098","Dui Avenue","1399","Vienna","Vienna","PR",'2019-08-30', now(),1);
INSERT INTO Tb_Usuario VALUES (10,"Amaya","16970513003",6,"163503249","Patrick","123","fringilla@erosnon.net","814640893204","78099346083",'f',"48625321","Turpis St.","97","Wie","Vienna","SP",'2019-09-08', now(),1);
INSERT INTO Tb_Usuario VALUES (11,"Aaron","16320304153",3,"167711089","Giles","123","sem.Pellentesque.ut@utlacusNulla.com","5793970655","12262592452",'m',"70209370","Quisque Av.","345","Delaware","Wilmington","MG",'2019-09-08', now(),1);
INSERT INTO Tb_Usuario VALUES (12,"Rajah","16591010627",4,"161809087","Jarvis","123","ac.mattis.semper@volutpat.co.uk","1507020545","22816522908",'f',"18455643","Fermentum Avenue","9","TO","Berlin","TO",'2019-09-08', now(),1);
INSERT INTO Tb_Usuario VALUES (13,"Dexter","16921101394",3,"161212038","Byrd","123","interdum.enim@sitamet.co.uk","69814325679","19370178943",'m',"64613286","Nec Street","279","Lubelskie","Zamość","RJ",'2019-09-08', now(),1);
INSERT INTO Tb_Usuario VALUES (14,"Alfonso","16250521455",7,"165106029","Baxter","123","quis.pede.Suspendisse@augue.co.uk","3441114885","36978339463",'m',"87621267","Euismod St.","94","South Island","Christchurch","RJ",'2019-09-08', now(),1);
INSERT INTO Tb_Usuario VALUES (15,"Aline","16371228603",3,"166704138","Cantu","123","augue@rutrumjusto.co.uk","3796903169","29597843136",'f',"12050884","Viverra. Street","7","Metropolitana de Santiago","Maipú","SP",'2019-09-11', now(),1);
INSERT INTO Tb_Usuario VALUES (16,"José Doria","16371228603",2,"166704138","doria","123","doria@doria.com","3796903169","29597843136",'m',"12050884","Viverra. Street","7","Metropolitana de Santiago","Maipú","SP",'2019-09-11', now(),1);

/*configurações
insert into Tb_Configuracao values (1,'CARREFOUR COMERCIO E INDUSTRIA LTDA','45543915000181','05690000','RUA GEORGE EASTMAN','213','VL TRAMONTANO','SAO PAULO', 'SP','STEPHANE FRANTZ EMMANUEL ENGELHARD','1145034615','MATRIZ','carrefour@carrefour.com','CARREFOUR','CARREFOUR','#008000','#ff8040','#ffff00','#008000','2019-09-11',1);
insert into Tb_Configuracao values (2,'WMB SUPERMERCADOS DO BRASIL LTDA.','00063960000109','06460020','AV TUCUNARE','125','ALPHAVILLE','BARUERI', 'SP','BOMPRECO DO BRASIL PARTICIPACOES S.A.','1121035184','MATRIZ','brcscatual@wal-mart.com','WALMART','WALMART','#808080','#0000ff','#8080ff','#000000','2019-09-11',9);
*/

/*INSERT TIPO DE PRODUTO*/
insert into Tb_TipoProduto (idTipoProduto,nomeTipoProduto,idUnidade,usuarioCadastro) values (1,'PRODUTO ANIMAL',1,1 );
insert into Tb_TipoProduto (idTipoProduto,nomeTipoProduto,idUnidade,usuarioCadastro) values (2,'MANUTENÇÃO',6,1 );
insert into Tb_TipoProduto (idTipoProduto,nomeTipoProduto,idUnidade,usuarioCadastro) values (3,'DURÁVEIS',6,1 );
insert into Tb_TipoProduto (idTipoProduto,nomeTipoProduto,idUnidade,usuarioCadastro) values (4,'CONSUMO',6,1 );
insert into Tb_TipoProduto (idTipoProduto,nomeTipoProduto,idUnidade,usuarioCadastro) values (5,'ACESSÓRIOS',6,1 );
insert into Tb_TipoProduto (idTipoProduto,nomeTipoProduto,idUnidade,usuarioCadastro) values (6,'MATÉRIA PRIMA',6,1 );
insert into Tb_TipoProduto (idTipoProduto,nomeTipoProduto,idUnidade,usuarioCadastro) values (7,'BENS DE CONVENIÊNCIA',6,1);
insert into Tb_TipoProduto (idTipoProduto,nomeTipoProduto,idUnidade,usuarioCadastro) values (8,'PRODUTO DE LIMPEZA',6,1);
insert into Tb_TipoProduto (idTipoProduto,nomeTipoProduto,idUnidade,usuarioCadastro) values (9,'ALIMENTO PERECÍVEL',6,1 );
insert into Tb_TipoProduto (idTipoProduto,nomeTipoProduto,idUnidade,usuarioCadastro) values (10,'ALIMENTO NÃO PERECÍVEL',6,1 );


/*INSERT FORNECEDOR*/
select * from Tb_Fornecedor;
insert into Tb_Fornecedor values (1,'Extra Supermercados','33041260065290','06670420','Rua das Nações Unidadas',30,'Jardim das Flores','Cotia','SP','Almir Castro da Silva','551142451123','551142451123','almir@extra.com.br',1,now(),now(),1);
insert into Tb_Fornecedor values (2,'Reckitt Benckiser','22041260065222','06670420','Rua das Nações Unidadas',340,'Jardim das Flores','Cotia','SP','Nino Santos','551142333123','551142451123','nino@rb.com.br',7,now(),now(),1);
insert into Tb_Fornecedor values (3,'Carne Sul','33401211111222','06670420','Rua das Nações Unidadas',340,'Jardim das Flores','Cotia','SP','Luiza Dolores Lidia','551142333123','551142451123','luiza@rb.com.br',7,now(),now(),1);
insert into Tb_Fornecedor values (4,'Purina – Dog Show','44567456781222','06670420','Rua das Nações Unidadas',340,'Jardim das Flores','Cotia','SP','Ricardo Valez Silva','551142333123','551142451123','rsc@rb.com.br',7,now(),now(),1);


/* INSERT TABELA PRODUTOS */
/*SELECT * FROM TB_produto;
delete FROM tb_produto where idProduto = 9*/
start transaction;
    insert into Tb_PrecoVenda (dataCadastroPreco,precoVenda) values (now(),5.00);
	insert into Tb_Produto (nomeProduto,marcaProduto,codigoBarras,descricaoProduto,idUnidadeAbreviada,valorMedida,idPrecoVenda,idTipoProduto,idUsuarioCadastroProduto,dataCadastro,estoqueMinimo,dataMinimo,ativo,quantidadeTotal) 
		values ('MAIONESE','HELLMANS','123123333333','CREME DE MAIONESE',6,0.300,last_insert_id(),10,1,now(),200,300,1,100);
commit;

start transaction;
    insert into Tb_PrecoVenda (dataCadastroPreco,precoVenda) values (now(),5.80);
	insert into Tb_Produto (nomeProduto,marcaProduto,codigoBarras,descricaoProduto,idUnidadeAbreviada,valorMedida,idPrecoVenda,idTipoProduto,idUsuarioCadastroProduto,dataCadastro,estoqueMinimo,dataMinimo,ativo,quantidadeTotal) 
		values ('SABÃO EM PÓ','OMO','1111111111111','SABÃO EM PÓ PARA ROUPAS',1,1.000,last_insert_id(),8,1,now(),100,100,1,50);
commit;
start transaction;
    insert into Tb_PrecoVenda (dataCadastroPreco,precoVenda) values (now(),3.40);
	insert into Tb_Produto (nomeProduto,marcaProduto,codigoBarras,descricaoProduto,idUnidadeAbreviada,valorMedida,idPrecoVenda,idTipoProduto,idUsuarioCadastroProduto,dataCadastro,estoqueMinimo,dataMinimo,ativo,quantidadeTotal) 
		values ('FARINHA DE TRIGO','DONA BENTA','2222222222222','FARINHA DE TRIGO NÃO AFERMENTADO',6,1.000,last_insert_id(),10,1,now(),300,80,1,350);
commit;
start transaction;
    insert into Tb_PrecoVenda (dataCadastroPreco,precoVenda) values (now(),13.00);
	insert into Tb_Produto (nomeProduto,marcaProduto,codigoBarras,descricaoProduto,idUnidadeAbreviada,valorMedida,idPrecoVenda,idTipoProduto,idUsuarioCadastroProduto,dataCadastro,estoqueMinimo,dataMinimo,ativo,quantidadeTotal) 
		values ('ARROZ TIPO 1','PRATO FINO','3333333333333','ARROZ BRANCO TIPO 1',6,5.000,last_insert_id(),10,1,now(),300,40,1,149);
commit;
start transaction;
    insert into Tb_PrecoVenda (dataCadastroPreco,precoVenda) values (now(),5.99);
	insert into Tb_Produto (nomeProduto,marcaProduto,codigoBarras,descricaoProduto,idUnidadeAbreviada,valorMedida,idPrecoVenda,idTipoProduto,idUsuarioCadastroProduto,dataCadastro,estoqueMinimo,dataMinimo,ativo,quantidadeTotal) 
		values ('GRAXA LIQUIDO PRETO','NUGGET','4444444444444','GRAXA PRETO LÍQUIDO COR PRETA',6,0.200,last_insert_id(),3,1,now(),80,500,1,300);
commit;
start transaction;
    insert into Tb_PrecoVenda (dataCadastroPreco,precoVenda) values (now(),6.99);
	insert into Tb_Produto (nomeProduto,marcaProduto,codigoBarras,descricaoProduto,idUnidadeAbreviada,valorMedida,idPrecoVenda,idTipoProduto,idUsuarioCadastroProduto,dataCadastro,estoqueMinimo,dataMinimo,ativo,quantidadeTotal) 
		values ('PATINHO DE BOI','CARNESUL','5555555555555','PATINHO DE BOI',1,1.250,last_insert_id(),9,1,now(),200,140,1,299);
commit;

/* INSERT TABELA COMPRA PRODUTOS COM TB LISTA PRODUTOS */
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
select distinct idLote,TLP.idListaProduto,TCP.idCompraProduto,nomeProduto,marcaProduto,nomeTipoProduto,quantidadeLote, situacaoValidade,dataEntrada, validade  from Tb_Lote TL
right join tb_compraproduto TCP
on TCP.idCompraProduto = TL.idCompraProduto
inner join Tb_ListaProduto TLP
	on TLP.idPedido = TCP.idCompraProduto
right join Tb_Fornecedor TF
	on TCP.idFornecedor = TF.idFornecedor
inner join Tb_Produto TP
	on TP.idProduto = TL.idProduto
right join Tb_TipoProduto TTP
on TTP.idTipoProduto = TP.idTipoProduto
group by TL.idLote
;
 
 select * from Tb_Lote TL
	inner join Tb_Produto TP
		on TL.idProduto = TP.idProduto
	inner join Tb_ListaProduto TLP
		on TLP.produto = TP.idProduto
    group by TL.idLote
 ;
 
 
 
 
 select * from Tb_Produto TP
 inner join TLb_Produto TLP
		on TLP.produto = TP.idProduto
	inner join Tb_CompraProduto TCP
		on TCP.idCompraProduto = TLP.idPedido
	inner join TB_Lote TL
		on TL.idProduto = TP.idProduto
        group by TL.idLote;
        
        
        select distinct TL.idLote, TCP.idCompraProduto,dataEntrada,nomeProduto,marcaProduto,nomeTipoProduto,quantidadeLote,validade, situacaoValidade from Tb_Lote TL
							left join tb_compraproduto TCP
							on TCP.idCompraProduto = TL.idCompraProduto
							left join Tb_ListaProduto TLP
								on TLP.idPedido = TCP.idCompraProduto
							left join Tb_Produto TP
								on TP.idProduto = TL.idProduto
							left join Tb_TipoProduto TTP
							on TTP.idTipoProduto = TP.idTipoProduto
							;

select * from Tb_Produto

/*SELECT * FROM TB_LOTE*/
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

/*SELECT * FROM Tb_Lote TL
										inner join Tb_Quantidade TQ
											on TL.idLote = TQ.idQuantidade
										inner join Tb_ListaProduto TLP
											on TLP.idListaProduto = TCP.idCompraProduto
										inner join Tb_Produto TP
											on  idListaProduto = TP.idProduto
										inner join Tb_TipoProduto TTP
											on TTP.idTipoProduto = TP.idTipoProduto
										inner join  Tb_Fornecedor TF
											on TCP.idFornecedor = TF.idFornecedor
                                            where TLP.idListaProduto= 1
										;


inner join Tb_Produto TP
	on TLP.produto = TP.idProduto
    where idCompraProduto = 1
;
select * from `tb_produto` as `TP` inner join `Tb_ListaProduto` as `TLP` on `TLP`.`produto` = `TP`.`idProduto` where TP.idProduto = 2

select * from Tb_Produto
	inner join Tb_ListaProduto TLP
		on TLP.produto = TLP.idListaProduto
	inner join Tb_CompraPRoduto TCP
		on TCP.idCompraProduto = TLP.idListaProduto
	inner join Tb_Lote TL
		on TL.idCompraProduto = TCP.idCompraProduto
	group by idProduto;
                                        
/* INSERT TABELA VENDAS */
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
/*select * from Tb_Venda;*/
    
/*
SELECT *, sum(quantidade) as totalProduto FROM Tb_Lote TL
										left join Tb_Quantidade TQ
											on TL.idLote = TQ.idQuantidade
										left join Tb_Produto TP
											on TL.idProdutoLote = TP.idProduto
										left join Tb_TipoProduto TTP
											on TTP.idTipoProduto = TP.idTipoProduto
										left join Tb_CompraProduto TCP
											on TL.idCompraProduto = TCP.idCompraProduto
										left join  Tb_Fornecedor TF
											on TCP.idFornecedor = TF.idFornecedor
										group by TL.idLote;
*/
/* INSERT TABELA LOTE  E TABELA COMPRAS PELO ULTIMO ID*/

        /*select * from tb_lote;*/
        /*select * from Tb_CompraProduto TCP
        inner join Tb_Produto TP
			on TCP.produto = TP.idProduto	
        inner join Tb_Lote TL
			on TL.idProduto = TP.idProduto
		inner join Tb_ListaProduto TLP
			on TLP.produto = TP.idProduto;
        */
        /*****SELECT DO INPUT DA COMPRA PRODUTO******
        SELECT * FROM Tb_CompraProduto TCP
        inner join Tb_ListaProduto TLP
			on TLP.idListaProduto = TCP.idCompraProduto
		inner join Tb_Fornecedor TF
			on TCP.idFornecedor = TF.idFornecedor
		left join Tb_Produto TP 
			on TLP.produto = TP.idProduto WHERE estadoCompra = 'AGUARDANDO';*/
/*   
commit;
	
start transaction;
	insert into Tb_Quantidade (quantidade) values (596);
	insert into Tb_Lote (notaFiscal,dataEntrada,dataValidade,idUsuario,idFornecedor,idQuantidadeLote,idProdutoLote) 
		values (ROUND((RAND() * (99999999999999999999-00000000000000000000))+00000000000000000000),now(),now(),6,1,last_insert_id(),1);
    insert into Tb_CompraProduto (dataCompra,valorUnitario,idLote,idUsuario)
		values (date_sub(now(), interval 15 day),2.80,last_insert_id(),7);
	UPDA
commit;
SELECT * FROM Tb_Lote TL
										
										left join Tb_Produto TP
											on TL.idProduto = TP.idProduto
										left join Tb_ListaProduto TLP
											on TLP.produto = TP.idProduto
											group by TLP.idListaProduto

										left join Tb_TipoProduto TTP
											on TTP.idTipoProduto = TP.idTipoProduto
										
										group by TL.idLote
start transaction;
	insert into Tb_Quantidade (quantidade) values (200);
	insert into Tb_Lote (notaFiscal,dataEntrada,dataValidade,idUsuario,idFornecedor,idQuantidadeLote,idProdutoLote) 
		values (ROUND((RAND() * (99999999999999999999-00000000000000000000))+00000000000000000000),now(),now(),6,1,last_insert_id(),1);
    insert into Tb_CompraProduto (dataCompra,valorUnitario,idLote,idUsuario)
		values (date_sub(now(), interval 15 day),2.80,last_insert_id(),7);
commit;

start transaction;
	insert into Tb_Quantidade (quantidade) values (500);
	insert into Tb_Lote (notaFiscal,dataEntrada,dataValidade,idUsuario,idFornecedor,idQuantidadeLote,idProdutoLote) 
		values (ROUND((RAND() * (99999999999999999999-00000000000000000000))+00000000000000000000),now(),date_add(now(), interval 90 day),6,2,last_insert_id(),2);
    insert into Tb_CompraProduto (dataCompra,valorUnitario,idLote,idUsuario)
		values (date_sub(now(), interval 15 day),2.60,last_insert_id(),7);
commit;

start transaction;
	insert into Tb_Quantidade (quantidade) values (123);
	insert into Tb_Lote (notaFiscal,dataEntrada,dataValidade,idUsuario,idFornecedor,idQuantidadeLote,idProdutoLote) 
		values (ROUND((RAND() * (99999999999999999999-00000000000000000000))+00000000000000000000),now(),date_add(now(), interval 90 day),6,1,last_insert_id(),3);
    insert into Tb_CompraProduto (dataCompra,valorUnitario,idLote,idUsuario)
		values (date_sub(now(), interval 15 day),9.80,last_insert_id(),7);
commit;

start transaction;
	insert into Tb_Quantidade (quantidade) values (453);
	insert into Tb_Lote (notaFiscal,dataEntrada,dataValidade,idUsuario,idFornecedor,idQuantidadeLote,idProdutoLote) 
    values (ROUND((RAND() * (99999999999999999999-00000000000000000000))+00000000000000000000),now(),now(),6,1,last_insert_id(),4);
    insert into Tb_CompraProduto (dataCompra,valorUnitario,idLote,idUsuario)
		values (date_sub(now(), interval 15 day),3.50,last_insert_id(),7);
commit;

start transaction;
	insert into Tb_Quantidade (quantidade) values (800);
	insert into Tb_Lote (notaFiscal,dataEntrada,dataValidade,idUsuario,idFornecedor,idQuantidadeLote,idProdutoLote)
		values (ROUND((RAND() * (99999999999999999999-00000000000000000000))+00000000000000000000),now(),date_add(now(), interval 90 day),6,2,last_insert_id(),5);
    insert into Tb_CompraProduto (dataCompra,valorUnitario,idLote,idUsuario)
		values (date_sub(now(), interval 15 day),17.90,last_insert_id(),7);
commit;
*/
/*select * from Tb_CompraProduto TCP
	left join Tb_Lote TL
	on TCP.idLote = TL.idLote
    left join Tb_Fornecedor TF
	on TL.idFornecedor = TL.idFornecedor;
select * from Tb_Lote;*/
/*INSERT INTO TB_COMPRAPRODUTO*/




/*
select * from Tb_Quantidade;
delete from Tb_Quantidade where idQuantidade;
delete from Tb_PrecoVenda where idPrecoVenda;
select * from Tb_PrecoVenda;
select *, sum(quantidade*precoProduto ) as totalPreco //SOMAR TOTAL DE PRODUTOS EM ESTOQUE

SELECT *,
											sum(quantidade) as totalProduto
											FROM Tb_Produto TP
										inner join Tb_Lote TL
											on TL.idProdutoLote = TP.idProduto

										group by TP.idProduto;
¨*/


/*
SELECT *, valorUnitario*quantidade as Total FROM Tb_CompraProduto;
DELETE FROM TB_LOTE where  = 1;

SELECT *,sum(quantidade) as totalProduto,
		(valorUnitario + (valorUnitario * (percentualProduto/100))) as valorVenda
FROM Tb_Lote TL
left join Tb_Quantidade TQ
	on TL.idLote = TQ.idQuantidade
left join Tb_Produto TP
	on TL.idProdutoLote = TP.idProduto
left join Tb_PrecoVenda TPV
	on TPV.idPrecoVenda = TP.idPrecoVenda
left join Tb_CompraProduto TCP
	on TCP.idLote = TL.idLote
left join Tb_TipoProduto TTP
	on TP.idTipoProduto = TTP.idTipoProduto
left join Tb_Fornecedor TF
	on TL.idFornecedor = TL.idFornecedor
group by TP.idProduto
;
SELECT *, sum(quantidade) as totalProduto FROM Tb_Lote TL
left join Tb_Quantidade TQ
											on TL.idLote = TQ.idQuantidade
										left join Tb_Produto TP
											on TL.idProdutoLote = TP.idProduto
										left join Tb_TipoProduto TTP
											on TTP.idTipoProduto = TP.idTipoProduto
										left join Tb_CompraProduto TCP
											on TL.idCompraProduto = TCP.idCompraProduto
										group by TL.idLote

SELECT *, sum(quantidadeLote) as totalProduto FROM Tb_Lote TL
										left join Tb_Produto TP
											on TL.idProdutoLote = TP.idProduto
										group by TP.idProduto
*/
/*INSERT PRODUTOS*/
/*
insert into Tb_Produto values (1,'SABÃO EM PÓ','OMO','SABÃO EM PÓ PARA LAVAR ROUPAS',1,1.500,4.98,1301233324567,10,1,NOW());
insert into Tb_Produto values (2,'FARINHA DE TRIGO','DONA BENTA','FARINHA DE TRIGO NÃO AFERMENTADO',1,1.000,2.50,1301233355555,11,1,NOW());
insert into Tb_Produto values (3,'ARROZ','PRATO FINO','ARROZ BRANCO TIPO 1',1,5.000,12.50,1456783324567,11,1,NOW());
insert into Tb_Produto values (4,'GRAXA PRETO PARA SAPATO','NUGGETT','GRAXA COR PRETA PARA SAPATOS PRETOS',1,1.000,2.50,1301233320987,5,1,NOW());
insert into Tb_Produto values (5,'DETERGENTE','IPÊ','DETERGENTE LÍQUIDO PARA LAVAR LOUÇAS',1,1.000,2.50,1305566443456,10,1,NOW());
insert into Tb_Produto values (6,'LEITE INTEGRAL','ITAMBÉ','LEITE DE VACA INTEGRAL',1,1.000,2.50,1305443323456,11,1,NOW());
select * from Tb_Produto;

SELECT *, sum(quantidade) as totalProduto
											FROM Tb_Lote TL
										left join Tb_Quantidade TQ
											on TL.idLote = TQ.idQuantidade
										left join Tb_Produto TP
											on TL.idProdutoLote = TP.idProduto
										left join Tb_PrecoVenda TPV
											on TPV.idPrecoVenda = TP.idPrecoVenda
										left join Tb_CompraProduto TCP
											on TL.idCompraProduto = TCP.idCompraProduto
										left join Tb_TipoProduto TTP
											on TP.idTipoProduto = TTP.idTipoProduto
										left join Tb_Usuario TU
											on TP.idUsuarioCadastroProduto = TU.idUsuario
										group by TP.idProduto;
     */                                   
/*
SELECT * FROM Tb_CompraProduto TCP
		left join Tb_Produto TP on TCP.idCompra = TP.idProduto;

SELECT *, sum(quantidade) as totalProduto, sum(quantidade*precoProduto) as totalPreco FROM Tb_Lote TL
										left join Tb_Quantidade TQ
											on TL.idLote = TQ.idQuantidade
										left join Tb_Produto TP
											on TL.idProdutoLote = TP.idProduto
										left join Tb_PrecoVenda TPV
											on TPV.idPrecoVenda = TP.idPrecoVenda
										left join Tb_TipoProduto TTP
											on TTP.idTipoProduto = TP.idProduto
										left join Tb_CompraProduto TCP
											on TCP.idLote = TL.idLote
										group by TP.idProduto
 cnpj da empresa para apresentacao 33.041.260/0652-90 
cnpj do fornecedor para apresentacao 45.997.418/0001-53*/




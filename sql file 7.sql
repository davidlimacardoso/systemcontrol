insert into Tb_Lote (dataEntrada,idUsuario,idCompraProduto,quantidadeLote) values (now(),1,1,80);
insert into Tb_Lote (dataEntrada,idUsuario,idCompraProduto,quantidadeLote) values (now(),1,1,80);


select *, TLP.validade as listaValidade, TP.validade as situacaoValidade from Tb_Lote TL
										inner join Tb_Produto TP
											on TP.idProduto = TL.idProduto
											inner join Tb_ListaProduto TLP
												on TLP.idPedido = TP.idProduto
										        group by TL.idLote;

select idLote,idCompraProduto,nomeProduto,marcaProduto,nomeTipoProduto,quantidadeLote, TLP.validade as listaValidade, TP.validade as situacaoValidade from Tb_Lote TL
										inner join Tb_Produto TP
											on TP.idProduto = TL.idProduto
										inner join Tb_TipoProduto TTP
											on TTP.idTipoProduto = TP.idTipoProduto
											inner join Tb_ListaProduto TLP
												on TLP.idPedido = TP.idProduto
										        group by TL.idLote;
                                                
                                              select * from Tb_Lote 
                                              inner join Tb_CompraProduto ON Tb_CompraProduto.idCompraProduto = Tb_Lote.idCompraProduto
			inner join Tb_Produto ON Tb_Produto.idProduto = Tb_Lote.idProduto;
            
            
            SELECT MIN(Tb_ListaProduto.validade) as validadeMin from Tb_ListaProduto
			inner join Tb_Produto ON Tb_Produto.idProduto = Tb_ListaProduto.idListaProduto
			WHERE Tb_Produto.idProduto = 1;
            
            UPDATE Tb_Lote 
			inner join Tb_CompraProduto ON Tb_CompraProduto.idCompraProduto = Tb_Lote.idCompraProduto
			inner join Tb_ListaProduto ON Tb_ListaProduto.idPedido = Tb_CompraProduto.idCompraProduto
			inner join Tb_Produto ON Tb_Produto.idProduto = Tb_Lote.idProduto
			SET quantidadeLote = 5  WHERE Tb_Produto.idProduto = 1 AND  Tb_ListaProduto.validade = '2020-02-14';
            
            insert into Tb_ListaProduto SET validade = '2019-12-26' where idListaProduto = 28;
            
            
            SELECT MIN(Tb_Lote.validade) as validadeMin from Tb_Lote
			inner join Tb_Produto ON Tb_Produto.idProduto = Tb_Lote.idProduto
			WHERE Tb_Produto.idProduto = 2;
            
            delete from tb_configuracao where idConfig = 6;

            
delete from Tb_Usuario where idUsuario = 402;            
            update Tb_Produto SET nomeProduto = 'LEITE INTEGRAL' , marcaProduto = 'PARMALAT' , codigoBarras = '1902830198301' , descricaoProduto = 'LEITE DE VACA INTEGRAL' , idUnidadeAbreviada = 5 , valorMedida = 1 , idPrecoVenda = 8 , idTipoProduto = 2 , idUsuarioCadastroProduto = 1 , dataCadastro = NOW() , estoqueMinimo = 100 , dataMinimo = 30, validade = 1 where idProduto = 5;
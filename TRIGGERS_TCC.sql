DROP TRIGGER if exists INSERT_ITENS;
DROP TRIGGER if exists DELETE_ITENS;
Delimiter $$
CREATE  TRIGGER INSERT_ITENS AFTER INSERT on TB_LISTAPRODUTO
FOR EACH ROW
BEGIN
	UPDATE TB_COMPRAPRODUTO 
    SET valorTotalCompra = valorTotalCompra + (new.valorUnitario * new.quantidadeProduto),
    quantidadeProdutoTotal = quantidadeProdutoTotal + new.quantidadeProduto
    where idCompraProduto = new.idPedido;
END $$

DELIMITER $$
CREATE TRIGGER DELETE_ITENS AFTER DELETE on TB_LISTAPRODUTO
FOR EACH ROW
BEGIN
	UPDATE TB_COMPRAPRODUTO 
    SET valorTotalCompra = valorTotalCompra - (OLD.valorUnitario - old.quantidadeProduto),
    quantidadeProdutoTotal = quantidadeProdutoTotal - OLD.quantidadeProduto
    where idCompraProduto = OLD.idPedido;
END $$

select * from Tb_CompraProduto;



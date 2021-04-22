Base de dados

--View e subconsultas

CREATE VIEW view_boleias AS

		SELECT boleias.*,veiculos.matricula,veiculos.lugares, users.name,users.email,
		users.contact, users.type,
		(select count(*)from viajantes where viajantes.id_boleia=boleias.id) as ocupantes,
		(select top 1 main_locations.name_locations from main_locations where main_locations.id=boleias.localidade_origem) as localidade_origem_description,
		(select top 1 main_locations.name_locations from main_locations where main_locations.id=boleias.localidade_destino) as localidade_destino_description 
		FROM boleias inner join veiculos on boleias.id_veiculo=veiculos.id inner join users on users.id_user=boleias.iduseR
	


--Função
--Devolve o distrito mais utilizado como destino pelo utilizador cujo id é introduzido como argumento.
IF OBJECT_ID('fnDistritoDestinoMaisUtilizado') IS NOT NULL
 DROP FUNCTION fnDistritoDestinoMaisUtilizado

GO
CREATE FUNCTION fnDistritoDestinoMaisUtilizado(@id_user int)
RETURNS VARCHAR(250)
AS
BEGIN
DECLARE @distrito_desc VARCHAR(250)
DECLARE @distrito INT
set @distrito= (select top 1 localidade_destino  from boleias where boleias.iduser=@id_user group by boleias.localidade_destino order by count(boleias.localidade_destino) desc)

if((@distrito IS NULL) or @distrito=0 )
begin
 set @distrito_desc='Unknown'
end
else
begin
	set @distrito_desc=(select main_locations.name_locations from main_locations where main_locations.id=@distrito)
end

return @distrito_desc
end

--Trigger 
--Caso um user não tenha uma localização associada, ao criar uma boleia é lhe aplicada o localização de origem ao peril

CREATE TRIGGER update_location 
ON boleias
AFTER INSERT
AS
BEGIN 
DECLARE @location int
DECLARE @id_user int
SELECT @location = localidade_origem FROM inserted
		set @id_user = (SELECT iduser FROM inserted)

		UPDATE users set location = @location
		WHERE id_user = @id_user AND location  IS NULL
END

------
--Não permite a criação de utilizadores com o mesmo id

CREATE TRIGGER tgrAfterUser
ON users
AFTER UPDATE
AS
DECLARE @id_user INT
SELECT @id_user = id_user FROM inserted
IF EXISTS (SELECT id_user FROM users WHERE id_user = @id_user)
	BEGIN
		PRINT 'O nome do utilizador foi atualizado!'
	END
ELSE
	BEGIN
		PRINT 'O nome do utilizador não foi atualizado!'
	END
	

---CURSORES (1)
--lista a primeira boleia criada da tabela boleias e altera o número de lugares disponíveis

DECLARE Primeira_Boleia CURSOR
DYNAMIC SCROLL_LOCKS
FOR
	SELECT *
    FROM boleias 
    ORDER BY id
OPEN Primeira_Boleia
FETCH Primeira_Boleia
UPDATE boleias
SET lugares_disponíveis = '4'
WHERE CURRENT OF Primeira_Boleia
CLOSE Primeira_Boleia
DEALLOCATE  Primeira_Boleia


--/*JUNÇÕES E/OU UNIÕES (2)*/

--lista os id's, nomes e cidades de residência dos utilizadores
SELECT id_user AS 'ID Utilizador',name AS 'Nome',name_locations AS 'Cidade' 
FROM users INNER JOIN main_locations
	ON users.location = main_locations.id
ORDER BY name DESC

--lista os nomes dos utilizadores e a quantidade de boleias disponiblizadas por cada um
SELECT name AS 'Nome', COUNT(*) AS 'Quantidade de Boleias Disponiblizadas'
FROM users INNER JOIN boleias
	ON users.id_user = boleias.iduser
GROUP BY name


--AGRUPAMENTO E SUMÁRIO DE DADOS (1)--

--lista o id do utilizador, o seu nome e o seu número de carros
SELECT id_user_car  AS 'ID Utilizador', name AS 'Nome', COUNT(matricula) AS 'Número de Carros'
FROM veiculos INNER JOIN users
	ON veiculos.id_user_car = users.id_user
GROUP BY id_user_car,name
HAVING COUNT(matricula) > 2


--FUNÇÕES DE AGREGAÇÃO (1)

--calcula quantos utilizadores residem em Viseu
SELECT COUNT(*) AS 'Números de Funcionários Residentes em Viseu'
FROM users
WHERE location = 17
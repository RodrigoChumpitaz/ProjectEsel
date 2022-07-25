CREATE TABLE PRODUCTO(
	codpro int not null AUTO_INCREMENT,
	nompro varchar(50) null,
	despro varchar(100) null,
	prepro number(6,2) null,
	estado int null,
	CONSTRAINT pk_producto
	PRIMARY KEY (codpro)
);
-- me confundi y tuve que agregar otro campo para la ruta de la imagen xd
alter table PRODUCTO add rutimapro varchar(100) null;



INSERT INTO PRODUCTO (nompro,despro,prepro,estado,rutimapro)
VALUES ('Balanza para GLP','Diseño anti explosivo, de llenado rápido y manejo sencillo.','1400.90',1,'1.jpg')

,('Cajón de aturdimiento para Bovinos','Cajón para aturdir ganado bovino, permite al operador el manejo eficiente','1030.78',1,'2.jpg')

,('Balanza con indicador ORION','Balanza de uso general, plataforma de 60 x 45 cm. fabricada en acero inoxidable','3200.67',1,'3.jpg')

CREATE TABLE USUARIO(
	codusu int not null AUTO_INCREMENT,
	nomusu varchar(50) ,
	apeusu varchar(50) ,
	emausu varchar(50) not null,
	pasusu varchar(20) not null,
	estado int not null,
	CONSTRAINT pk_usuario
	PRIMARY KEY (codusu)
);

INSERT INTO USUARIO (nomusu,apeusu,emausu,pasusu,estado)
VALUES ('Adrian','Celis','correo@example.com','123456',1);

create table PEDIDO(
	codped int not null AUTO_INCREMENT,
	codusu int not null,
	codpro int not null,
	fecped datetime not null,
	estado int not null,
	dirusuped varchar(50) not null,
	telusuped varchar(12) not null,
	PRIMARY KEY (codped)
);
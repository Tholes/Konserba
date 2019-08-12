CREATE TABLE Due�o(
			 numero_de_documento int unsigned, 
			 tipo_de_documento varchar(3) CHECK(tipo_de_documento IN ('CC','PAS')),
			 nombre varchar(20) NOT NULL,
			 email varchar(20) NOT NULL UNIQUE,
			 tel�fono int unsigned NOT NULL,
			 direcci�n varchar(15) NOT NULL,
			 ciudad varchar (10) NOT NULL,
			 PRIMARY KEY(numero_de_documento,tipo_de_documento));
INSERT INTO Due�o VALUES(13,'PAS','Jhonatan Joestar','jojo',123,'Av. 90','Cali');

CREATE TABLE Finca(
			 direcci�n varchar(15),
			 ciudad varchar (23),
			 tipo_doc_due�o varchar(3) NOT NULL,
			 n�mero_doc_due�o int unsigned NOT NULL,
			 nombre varchar(20) NOT NULL,
			 fecha_de_afiliaci�n date,
			 tipo varchar(11) NOT NULL,
			 CONSTRAINT afiliaci�n CHECK((tipo='Afiliada' AND fecha_de_afiliaci�n IS NOT NULL) or (tipo='No afiliada' AND fecha_de_afiliaci�n IS NULL)),
			 PRIMARY KEY(direcci�n,ciudad),
			 UNIQUE(direcci�n,ciudad,tipo),
			 FOREIGN KEY fk_e(n�mero_doc_due�o,tipo_doc_due�o) REFERENCES Due�o(numero_de_documento,tipo_de_documento));
INSERT INTO Finca VALUES ('Cr 34  21-2','Cartagena','CC',1,'Manuela',STR_TO_DATE('03-09-1998','%d-%m-%Y'),'Afiliada');

CREATE TABLE Ciudad(
			 c�digo_postal int unsigned PRIMARY KEY,
			 nombre varchar(23) NOT NULL,
			 pa�s varchar(50) NOT NULL,
			 tipo varchar(11) NOT NULL,
			 CHECK((tipo='Extranjera' and pa�s<>'Colombia' )or(tipo='Local' and pa�s='Colombia')),
			 UNIQUE(nombre,pa�s));
INSERT INTO Ciudad VALUES (12345,'Cali','Colombia','Local')

CREATE TABLE Env�o(
			 n�mero_de_gu�a int unsigned PRIMARY KEY,
			 costo int unsigned NOT NULL,
			 descuento varchar (4),
			 direcci�n_finca_de_origen varchar(15) NOT NULL,
			 ciudad_finca_de_origen varchar(23) NOT NULL,
			 afiliaci�n varchar(11) NOT NULL,
			 FOREIGN KEY fk_e1(direcci�n_finca_de_origen,ciudad_finca_de_origen,afiliaci�n) REFERENCES Finca(direcci�n,ciudad,tipo),
			 CHECK(afiliaci�n='Afiliada' or(afiliaci�n='No afiliada' and descuento IS NULL)),
			 ciudad_de_origen varchar(23) NOT NULL,
			 pa�s_de_origen varchar(50) NOT NULL,
			 ciudad_de_destino varchar(23) NOT NULL,
			 pa�s_de_destino varchar(50) NOT NULL,
			 tipo varchar(12) NOT NULL,
			 FOREIGN KEY fk_e2(ciudad_de_origen,pa�s_de_origen) REFERENCES Ciudad(nombre,pa�s),
			 FOREIGN KEY fk_e3(ciudad_de_destino,pa�s_de_destino) REFERENCES Ciudad(nombre,pa�s),
			 CHECK((tipo='Exportaci�n' and pa�s_de_origen='Colombia' and pa�s_de_destino<>'Colombia')or(tipo='Importaci�n' and pa�s_de_origen<>'Colombia' and pa�s_de_destino='Colombia')));
INSERT INTO Env�o VALUES (12345,500,'20%','Cr 34  21-2','Cartagena','Afiliada','Cartagena','Colombia','Madrid','Espa�a','Exportaci�n')

CREATE TABLE Fruta(
			 nombre varchar(30) PRIMARY KEY,
			 calidad varchar(10) NOT NULL,
			 costo_por_kilo int unsigned NOT NULL,
			 CHECK(calidad='Premium' or calidad='Est�ndar'));
INSERT INTO Fruta VALUES ('Fresa','Premium',2090)

CREATE TABLE Hortaliza(
			 nombre varchar(30) PRIMARY KEY,
			 tipo_de_cultivo varchar(8) NOT NULL,
			 costo_por_unidad int unsigned NOT NULL,
			 CHECK(tipo_de_cultivo='Huerta' or tipo_de_cultivo='Regad�o'));
INSERT INTO Hortaliza VALUES ('Zanahoria','Verdura',100)

CREATE TABLE Encargo(
			 n�mero_de_orden int unsigned PRIMARY KEY,
			 fecha date NOT NULL,
			 valor int unsigned NOT NULL,
			 gu�a_en_la_que_se_incluye int unsigned,
			 FOREIGN KEY fk_e1(gu�a_en_la_que_se_incluye) REFERENCES Env�o(n�mero_de_gu�a),
			 fruta varchar(30),
			 hortaliza varchar(30),
			 FOREIGN KEY fk_e2(fruta) REFERENCES Fruta(nombre) ON DELETE CASCADE,
			 FOREIGN KEY fk_e3(hortaliza) REFERENCES Hortaliza(nombre) ON DELETE CASCADE,
			 CHECK((fruta IS NOT NULL and hortaliza IS NULL) or (fruta IS NULL and hortaliza IS NULL) or (fruta IS NULL and hortaliza IS NOT NULL)));
INSERT INTO Encargo VALUES (1,STR_TO_DATE('03-09-1998','%d-%m-%Y'),30000,1,'Fresa',NULL)

CREATE TABLE Veh�culo(
			 matr�cula varchar(7) PRIMARY KEY,
			 kilometraje int unsigned,
			 n�mero_de_tripulantes int unsigned,
			 n�mero_de_vuelos int unsigned,
			 tipo varchar(6) NOT NULL,
			 CHECK((tipo='Carro' and kilometraje IS NOT NULL and n�mero_de_tripulantes IS NULL and n�mero_de_vuelos IS NULL)or
			 (tipo='Barco' and kilometraje IS NULL and n�mero_de_tripulantes IS NOT NULL and n�mero_de_vuelos IS NULL)or
			 (tipo='Avi�n' and kilometraje IS NULL and n�mero_de_tripulantes IS NULL and n�mero_de_vuelos IS NOT NULL)));
INSERT INTO Veh�culo VALUES ('SPR123',10000,NULL,NULL,'Carro')

CREATE TABLE Viaje (
			 n�mero_de_gu�a_del_env�o int unsigned PRIMARY KEY,
			 matr�cula_del_transporte varchar(7) NOT NULL,
			 FOREIGN KEY fk_e1(n�mero_de_gu�a_del_env�o) REFERENCES Env�o(n�mero_de_gu�a),
			 FOREIGN KEY fk_e2(matr�cula_del_transporte) REFERENCES Veh�culo(matr�cula))
INSERT INTO Viaje VALUES (1,'SPR123')
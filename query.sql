CREATE TABLE Dueño(
			 numero_de_documento int unsigned, 
			 tipo_de_documento varchar(3) CHECK(tipo_de_documento IN ('CC','PAS')),
			 nombre varchar(20) NOT NULL,
			 email varchar(20) NOT NULL UNIQUE,
			 teléfono int unsigned NOT NULL,
			 dirección varchar(15) NOT NULL,
			 ciudad varchar (10) NOT NULL,
			 PRIMARY KEY(numero_de_documento,tipo_de_documento));
INSERT INTO Dueño VALUES(13,'PAS','Jhonatan Joestar','jojo',123,'Av. 90','Cali');

CREATE TABLE Finca(
			 dirección varchar(15),
			 ciudad varchar (23),
			 tipo_doc_dueño varchar(3) NOT NULL,
			 número_doc_dueño int unsigned NOT NULL,
			 nombre varchar(20) NOT NULL,
			 fecha_de_afiliación date,
			 tipo varchar(11) NOT NULL,
			 CONSTRAINT afiliación CHECK((tipo='Afiliada' AND fecha_de_afiliación IS NOT NULL) or (tipo='No afiliada' AND fecha_de_afiliación IS NULL)),
			 PRIMARY KEY(dirección,ciudad),
			 UNIQUE(dirección,ciudad,tipo),
			 FOREIGN KEY fk_e(número_doc_dueño,tipo_doc_dueño) REFERENCES Dueño(numero_de_documento,tipo_de_documento));
INSERT INTO Finca VALUES ('Cr 34  21-2','Cartagena','CC',1,'Manuela',STR_TO_DATE('03-09-1998','%d-%m-%Y'),'Afiliada');

CREATE TABLE Ciudad(
			 código_postal int unsigned PRIMARY KEY,
			 nombre varchar(23) NOT NULL,
			 país varchar(50) NOT NULL,
			 tipo varchar(11) NOT NULL,
			 CHECK((tipo='Extranjera' and país<>'Colombia' )or(tipo='Local' and país='Colombia')),
			 UNIQUE(nombre,país));
INSERT INTO Ciudad VALUES (12345,'Cali','Colombia','Local');

CREATE TABLE Envío(
			 número_de_guía int unsigned PRIMARY KEY,
			 costo int unsigned NOT NULL,
			 descuento varchar (4),
			 dirección_finca_de_origen varchar(15) NOT NULL,
			 ciudad_finca_de_origen varchar(23) NOT NULL,
			 afiliación varchar(11) NOT NULL,
			 FOREIGN KEY fk_e1(dirección_finca_de_origen,ciudad_finca_de_origen,afiliación) REFERENCES Finca(dirección,ciudad,tipo),
			 CHECK(afiliación='Afiliada' or(afiliación='No afiliada' and descuento IS NULL)),
			 ciudad_de_origen varchar(23) NOT NULL,
			 país_de_origen varchar(50) NOT NULL,
			 ciudad_de_destino varchar(23) NOT NULL,
			 país_de_destino varchar(50) NOT NULL,
			 tipo varchar(12) NOT NULL,
			 FOREIGN KEY fk_e2(ciudad_de_origen,país_de_origen) REFERENCES Ciudad(nombre,país),
			 FOREIGN KEY fk_e3(ciudad_de_destino,país_de_destino) REFERENCES Ciudad(nombre,país),
			 CHECK((tipo='Exportación' and país_de_origen='Colombia' and país_de_destino<>'Colombia')or(tipo='Importación' and país_de_origen<>'Colombia' and país_de_destino='Colombia')));
INSERT INTO Envío VALUES (12345,500,'20%','Cr 34  21-2','Cartagena','Afiliada','Cartagena','Colombia','Madrid','España','Exportación');

CREATE TABLE Fruta(
			 nombre varchar(30) PRIMARY KEY,
			 calidad varchar(10) NOT NULL,
			 costo_por_kilo int unsigned NOT NULL,
			 CHECK(calidad='Premium' or calidad='Estándar'));
INSERT INTO Fruta VALUES ('Fresa','Premium',2090);

CREATE TABLE Hortaliza(
			 nombre varchar(30) PRIMARY KEY,
			 tipo_de_cultivo varchar(8) NOT NULL,
			 costo_por_unidad int unsigned NOT NULL,
			 CHECK(tipo_de_cultivo='Huerta' or tipo_de_cultivo='Regadío'));
INSERT INTO Hortaliza VALUES ('Zanahoria','Verdura',100);

CREATE TABLE Encargo(
			 número_de_orden int unsigned PRIMARY KEY,
			 fecha date NOT NULL,
			 valor int unsigned NOT NULL,
			 guía_en_la_que_se_incluye int unsigned,
			 FOREIGN KEY fk_e1(guía_en_la_que_se_incluye) REFERENCES Envío(número_de_guía),
			 fruta varchar(30),
			 hortaliza varchar(30),
			 FOREIGN KEY fk_e2(fruta) REFERENCES Fruta(nombre) ON DELETE CASCADE,
			 FOREIGN KEY fk_e3(hortaliza) REFERENCES Hortaliza(nombre) ON DELETE CASCADE,
			 CHECK((fruta IS NOT NULL and hortaliza IS NULL) or (fruta IS NULL and hortaliza IS NULL) or (fruta IS NULL and hortaliza IS NOT NULL)));
INSERT INTO Encargo VALUES (1,STR_TO_DATE('03-09-1998','%d-%m-%Y'),30000,1,'Fresa',NULL);

CREATE TABLE Vehículo(
			 matrícula varchar(7) PRIMARY KEY,
			 kilometraje int unsigned,
			 número_de_tripulantes int unsigned,
			 número_de_vuelos int unsigned,
			 tipo varchar(6) NOT NULL,
			 CHECK((tipo='Carro' and kilometraje IS NOT NULL and número_de_tripulantes IS NULL and número_de_vuelos IS NULL)or
			 (tipo='Barco' and kilometraje IS NULL and número_de_tripulantes IS NOT NULL and número_de_vuelos IS NULL)or
			 (tipo='Avión' and kilometraje IS NULL and número_de_tripulantes IS NULL and número_de_vuelos IS NOT NULL)));
INSERT INTO Vehículo VALUES ('SPR123',10000,NULL,NULL,'Carro');

CREATE TABLE Viaje (
			 número_de_guía_del_envío int unsigned PRIMARY KEY,
			 matrícula_del_transporte varchar(7) NOT NULL,
			 FOREIGN KEY fk_e1(número_de_guía_del_envío) REFERENCES Envío(número_de_guía),
			 FOREIGN KEY fk_e2(matrícula_del_transporte) REFERENCES Vehículo(matrícula))
INSERT INTO Viaje VALUES (1,'SPR123');

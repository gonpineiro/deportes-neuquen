CREATE TABLE deportes_usuarios (
	id int NOT NULL IDENTITY(1,1) PRIMARY KEY,
	id_wappersonas INT NULL,
	nombre VARCHAR(50) NULL,
	apellido VARCHAR(50) NULL,
	telefono VARCHAR(50) NULL,
	email VARCHAR(250) NULL,
	dni INT NULL,
	genero VARCHAR(1) NULL,
	nacionalidad VARCHAR(45) NULL,
	id_ciudad INT NULL
	id_barrio INT NULL
	id_zona INT NULL
	direccion_calle VARCHAR(250) NULL,
	direccion_nro VARCHAR(250) NULL,
	direccion_depto VARCHAR(250) NULL,
	direccion_piso VARCHAR(250) NULL,
	direccion_cp VARCHAR(250) NULL,
	fecha_alta DATETIME DEFAULT GETDATE());
	
CREATE TABLE deportes_solicitudes (
	id int NOT NULL IDENTITY(1,1) PRIMARY KEY,
	id_usuario INT NULL,
	id_usuario_admin INT NULL,
	id_estado INT NULL,
	profesion VARCHAR(45) NULL,
	modified_at VARCHAR(45) NULL,    
	deleted_at VARCHAR(45) NULL,    
	fecha_alta DATETIME DEFAULT GETDATE());

CREATE TABLE deportes_trabajos (
	id int NOT NULL IDENTITY(1,1) PRIMARY KEY,
	id_solicitud INT NULL,
	lugar_de_trabajo INT NULL,
	foto_certificado_laboral VARCHAR(45) NULL,    
	fecha_alta DATETIME DEFAULT GETDATE());

CREATE TABLE deportes_titulos (
	id int NOT NULL IDENTITY(1,1) PRIMARY KEY,
	id_solicitud INT NULL,
	titulo VARCHAR(50) NULL,
	foto_titulo VARCHAR(45) NULL,    
	fecha_alta DATETIME DEFAULT GETDATE());

CREATE TABLE deportes_estados (
	id int NOT NULL IDENTITY(1,1) PRIMARY KEY,
	nombre VARCHAR(50) NULL,    
	fecha_alta DATETIME DEFAULT GETDATE());

CREATE TABLE deportes_ciudades (
	id int NOT NULL IDENTITY(1,1) PRIMARY KEY,
	id_provincio INT NULL,    
	nombre VARCHAR(50) NULL,    
	fecha_alta DATETIME DEFAULT GETDATE());

CREATE TABLE deportes_barrios (
	id int NOT NULL IDENTITY(1,1) PRIMARY KEY,
	id_ciudad INT NULL,    
	nombre VARCHAR(50) NULL,    
	fecha_alta DATETIME DEFAULT GETDATE());
	
CREATE TABLE deportes_log (
	id int NOT NULL IDENTITY(1,1) PRIMARY KEY,
	id_usuario INT NULL,
	id_solicitud INT NULL,
	error VARCHAR(45) NULL,
	class VARCHAR(45) NULL,
	metodo VARCHAR(45) NULL,
	fecha_alta DATETIME DEFAULT GETDATE());
	













ALTER TABLE libretas_solicitudes
	ADD FOREIGN KEY (id_usuario_solicitante) REFERENCES libretas_usuarios(id);
ALTER TABLE libretas_solicitudes
	ADD FOREIGN KEY (id_usuario_solicitado) REFERENCES libretas_usuarios(id);
ALTER TABLE libretas_solicitudes
	ADD FOREIGN KEY (id_usuario_admin) REFERENCES libretas_usuarios(id);
ALTER TABLE libretas_solicitudes
	ADD FOREIGN KEY (id_capacitador) REFERENCES libretas_capacitadores(id);
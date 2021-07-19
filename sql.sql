CREATE TABLE deportes_usuarios (
	id int NOT NULL IDENTITY(1, 1) PRIMARY KEY,
	id_wappersonas INT NULL,
	nombre VARCHAR(50) NULL,
	apellido VARCHAR(50) NULL,
	telefono VARCHAR(50) NULL,
	email VARCHAR(250) NULL,
	nacionalidad VARCHAR(45) NULL,
	id_ciudad INT NULL,
	id_barrio INT NULL,
	otro_barrio VARCHAR(250) NULL,
	direccion_calle VARCHAR(250) NULL,
	direccion_nro VARCHAR(250) NULL,
	direccion_depto VARCHAR(250) NULL,
	direccion_piso VARCHAR(250) NULL,
	direccion_cp VARCHAR(250) NULL,
	fecha_alta DATETIME DEFAULT GETDATE()
);

CREATE TABLE deportes_solicitudes (
	id int NOT NULL IDENTITY(1, 1) PRIMARY KEY,
	id_usuario INT NULL,
	id_usuario_admin INT NULL,
	id_estado INT NULL,
	nro_recibo INT NULL,
	path_ap VARCHAR(500) NULL,
	path_recibo VARCHAR(500) NULL,
	observaciones VARCHAR(1000) NULL,
	modified_at VARCHAR(45) NULL,
	deleted_at VARCHAR(45) NULL,
	fecha_vencimiento VARCHAR(20) NULL,
	fecha_evaluacion VARCHAR(20) NULL,
	fecha_alta DATETIME DEFAULT GETDATE()
);

CREATE TABLE deportes_trabajos (
	id int NOT NULL IDENTITY(1, 1) PRIMARY KEY,
	id_solicitud INT NULL,
	lugar VARCHAR(250) NULL,
	path_file VARCHAR(500) NULL,
	fecha_alta DATETIME DEFAULT GETDATE()
);

CREATE TABLE deportes_titulos (
	id int NOT NULL IDENTITY(1, 1) PRIMARY KEY,
	id_solicitud INT NULL,
	titulo VARCHAR(50) NULL,
	path_file VARCHAR(500) NULL,
	es_curso BIT NULL,
	fecha_alta DATETIME DEFAULT GETDATE()
);

CREATE TABLE deportes_estados (
	id int NOT NULL IDENTITY(1, 1) PRIMARY KEY,
	nombre VARCHAR(50) NULL,
	fecha_alta DATETIME DEFAULT GETDATE()
);

CREATE TABLE deportes_ciudades (
	id int NOT NULL IDENTITY(1, 1) PRIMARY KEY,
	nombre VARCHAR(50) NULL,
	fecha_alta DATETIME DEFAULT GETDATE()
);

CREATE TABLE deportes_barrios (
	id int NOT NULL IDENTITY(1, 1) PRIMARY KEY,
	id_ciudad INT NULL,
	nombre VARCHAR(50) NULL,
	fecha_alta DATETIME DEFAULT GETDATE()
);

CREATE TABLE deportes_actividades (
	id int NOT NULL IDENTITY(1, 1) PRIMARY KEY,
	id_categoria INT NULL,
	estado INT NULL,
	nombre VARCHAR(250) NULL,
	fecha_alta DATETIME DEFAULT GETDATE()
);

CREATE TABLE deportes_categorias_actividades (
	id int NOT NULL IDENTITY(1, 1) PRIMARY KEY,
	nombre VARCHAR(250) NULL,
	fecha_alta DATETIME DEFAULT GETDATE()
);

CREATE TABLE deportes_solicitudes_actividades (
	id int NOT NULL IDENTITY(1, 1) PRIMARY KEY,
	id_solicitud INT NULL,
	id_actividad INT NULL,
	fecha_alta DATETIME DEFAULT GETDATE()
);

CREATE TABLE deportes_log (
	id int NOT NULL IDENTITY(1, 1) PRIMARY KEY,
	id_usuario INT NULL,
	id_solicitud INT NULL,
	error VARCHAR(200) NULL,
	class VARCHAR(200) NULL,
	metodo VARCHAR(200) NULL,
	fecha_alta DATETIME DEFAULT GETDATE()
);

/* Insert Estados */
INSERT INTO deportes_estados (nombre) values ('Titulos')
INSERT INTO deportes_estados (nombre) values ('Trabajos')
INSERT INTO deportes_estados (nombre) values ('Actividades')
INSERT INTO deportes_estados (nombre) values ('Condiciones')
INSERT INTO deportes_estados (nombre) values ('Resumen')
INSERT INTO deportes_estados (nombre) values ('Nuevo')
INSERT INTO deportes_estados (nombre) values ('Rechazado')
INSERT INTO deportes_estados (nombre) values ('Aprobado')
INSERT INTO deportes_estados (nombre) values ('Impreso')
INSERT INTO deportes_estados (nombre) values ('Retirado')

/* Insert Ciudades */
INSERT INTO deportes_ciudades (nombre) values ('Neuquén')
INSERT INTO deportes_ciudades (nombre) values ('Cipolletti')
INSERT INTO deportes_ciudades (nombre) values ('Allen')

/* Insert Barrios */
INSERT INTO deportes_barrios (nombre) values ('Barrio Unó Cón Tíldés')
INSERT INTO deportes_barrios (nombre) values ('Barrio Dós Cón Tíldés')
INSERT INTO deportes_barrios (nombre) values ('Barrio Trés Cón Tíldés')
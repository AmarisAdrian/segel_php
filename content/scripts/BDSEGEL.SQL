CREATE DATABASE SEGEL;
USE SEGEL;

CREATE TABLE CAMPANA(
  id int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(255) NOT NULL,  
  eslogan varchar(255) NOT NULL,  
  logo blob ,
  partido varchar(255) NOT NULL,  
  candidato varchar(255) NOT NULL,  
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE configuracion (
  id int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(255) NOT NULL,
  manejador varchar(50) NOT NULL,
  valor varchar(255) NOT NULL,
  PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE estado_usuario(
  id int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(255) NOT NULL,
  PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE tipo_usuario(
id INT NOT NULL  AUTO_INCREMENT,
nombre VARCHAR(30),
PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE tipo_documento(
id INT  NOT NULL AUTO_INCREMENT,
nombre VARCHAR(30),
PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE genero(
id INT NOT NULL AUTO_INCREMENT,
nombre VARCHAR(15),
PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE departamento(
id INT NOT NULL,
nombre varchar(100) NOT NULL,
PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE ciudad(
id INT NOT NULL,
nombre VARCHAR(100) NOT NULL,
idDepartamento INT NOT NULL,
PRIMARY KEY(id),
CONSTRAINT fk_ciudad_idDepartamento foreign key(idDepartamento)references departamento(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE usuario(
id BIGINT NOT NULL AUTO_INCREMENT,
idTipoDocumento INT NOT NULL,
idTipoUsuario INT NOT NULL,
idEstadoUsuario INT NOT NULL,
noDocumento BIGINT NOT NULL,
nombre VARCHAR(45) NOT NULL,
apellido VARCHAR(45)NOT NULL,
password VARCHAR(45)  NOT NULL,
idGenero INT NOT NULL,
telefono VARCHAR(20)NULL,
movil VARCHAR(20)NULL,
email VARCHAR(85)NULL,
direccion VARCHAR(70)NOT NULL,
idDepartamento INT NOT NULL,
idCiudad INT NOT NULL,
CONSTRAINT PK_usuario PRIMARY KEY(noDocumento),
CONSTRAINT unique_usuario UNIQUE(id),
CONSTRAINT fk_usuario_idTipoDocumento foreign key(idTipoDocumento)references tipo_documento(id),
CONSTRAINT fk_usuario_idTipoUsuario foreign key(idTipoUsuario)references tipo_usuario(id),
CONSTRAINT fk_usuario_idEstadoUsuario foreign key(idEstadoUsuario)references estado_usuario(id),
CONSTRAINT fk_usuario_idGenero foreign key(idGenero)references genero(id),
CONSTRAINT fk_usuario_idDepartamento foreign key(idDepartamento)references departamento(id),
CONSTRAINT fk_usuario_idCiudad foreign key(idCiudad)references ciudad(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE votante(
id BIGINT NOT NULL AUTO_INCREMENT,
idTipoDocumento INT NOT NULL,
idEstadoUsuario INT NOT NULL,
idUsuario BIGINT NOT NULL,
noDocumento BIGINT NOT NULL,
nombre VARCHAR(45) NOT NULL,
apellido VARCHAR(45)NOT NULL,
idGenero INT NOT NULL,
movil VARCHAR(20)NULL,
fijo VARCHAR(20)NULL,
direccion VARCHAR(70)NOT NULL,
idDepartamento INT NOT NULL,
idCiudad INT NOT NULL,
firma TEXT NULL,
CONSTRAINT PK_votante PRIMARY KEY(noDocumento),
CONSTRAINT unique_votante UNIQUE(ID),
CONSTRAINT fk_votante_idTipoDocumento foreign key(idTipoDocumento)references tipo_documento(id),
CONSTRAINT fk_votante_idEstadoUsuario foreign key(idEstadoUsuario)references estado_usuario(id),
CONSTRAINT fk_votante_idUsuario foreign key(idUsuario)references usuario(id),
CONSTRAINT fk_votante_idGenero foreign key(idGenero)references genero(id),
CONSTRAINT fk_votante_idDepartamento foreign key(idDepartamento)references departamento(id),
CONSTRAINT fk_votante_idCiudad foreign key(idCiudad)references ciudad(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE zona_votacion(
id INT NOT NULL AUTO_INCREMENT,
idDivipol INT NOT NULL,
numero INT NOT NULL,
codigo VARCHAR(45)NULL,
nombre VARCHAR(20)NULL,
CONSTRAINT PK_zona_votacion PRIMARY KEY(numero),
CONSTRAINT unique_zona_votacion UNIQUE(id),
CONSTRAINT fk_zona_votacion_idDepartamento foreign key(idDivipol)references departamento(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE divipol(
id INT NOT NULL AUTO_INCREMENT,
idDepartamento INT  NOT NULL,
idCiudad INT NOT NULL,
nombre VARCHAR(45)NOT NULL,
referencia  VARCHAR(60)NULL,
comentario  VARCHAR(60)NULL,
CONSTRAINT PK_divipol PRIMARY KEY(id),
CONSTRAINT unique_divipol UNIQUE(referencia),
CONSTRAINT fk_divipol_idDepartamento foreign key(idDepartamento)references departamento(id),
CONSTRAINT fk_divipol_idCiudad foreign key(idCiudad)references ciudad(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE puesto_votacion(
id INT NOT NULL AUTO_INCREMENT,
idZona INT NOT NULL,
codigo VARCHAR(45)NULL,
nombre VARCHAR(150)NOT NULL,
direccion  VARCHAR(60)NOT NULL,
mesa INT NOT NULL,
potencial INT NOT NULL,
CONSTRAINT PK_puesto_votacion PRIMARY KEY(id),
CONSTRAINT unique_puesto_votacion UNIQUE(codigo),
CONSTRAINT fk_puesto_votacion_idZona foreign key(idZona)references zona_votacion(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE registro_votante(
id BIGINT NOT NULL AUTO_INCREMENT,
idVotante BIGINT NOT NULL,
idPuesto INT NOT NULL,
mesa INT NULL,
comentario VARCHAR(100),
CONSTRAINT PK_registro_votante PRIMARY KEY(idVotante),
CONSTRAINT unique_registro_votante UNIQUE(id),
CONSTRAINT fk_registro_votante_noDocumento foreign key(idVotante)references votante(id),
CONSTRAINT fk_registro_votante_idPuesto foreign key(idPuesto)references puesto_votacion(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE anexo_usuario(
id BIGINT NOT NULL AUTO_INCREMENT,
idUsuario BIGINT NOT NULL,
imagen blob,
comentario VARCHAR(100),
CONSTRAINT PK_anexo_usuario PRIMARY KEY(id),
CONSTRAINT fk_anexos_idUsuario foreign key(idUsuario)references usuario(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE anexo_votante(
id BIGINT NOT NULL AUTO_INCREMENT,
idVotante BIGINT NOT NULL,
imagen blob,
comentario VARCHAR(100),
CONSTRAINT PK_anexo_votante PRIMARY KEY(id),
CONSTRAINT fk_anexos_idVotante foreign key(idVotante)references votante(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


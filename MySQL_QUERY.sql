/*DROP DATABASE mainDB;*/
CREATE DATABASE mainDB;
USE mainDB;

/*DROP TABLE Clientes*/
CREATE TABLE Users(
	id varchar(20) primary key,
	password varchar(20) not null,
	CorreoElectronico varchar(30) not null,
    EsAdministrador boolean DEFAULT false,
    Telephono varchar(8) not null,
    Desabilitado boolean DEFAULT false
);

CREATE TABLE Bien(
	Id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Tipo varchar(16) not null,
    Provincia varchar(10) not null,
    Canton varchar(20) not null,
    Distrito varchar(20) not null,
    TamanoDesde BIGINT not null,
    TamanoHasta BIGINT not null,
    precioDesde BIGINT not null,
    precioHasta BIGINT not null,
    Negosiable BOOLEAN DEFAULT FALSE,
    TipoDeVenta varchar(12) 
		CHECK(TipoDeVenta="Subasta" or TipoDeVenta="VentaDirecta"),
    EstadoDePropiedad varchar(19) 
		CHECK(EstadoDePropiedad="Disponible" or EstadoDePropiedad="ConOfertasEnEstudio"or EstadoDePropiedad="Vendida"),
	DireccionExacta varchar(300) not null,
    PropietarioUsuario varchar(20) NOT NULL,
    
    FOREIGN KEY (PropietarioUsuario) REFERENCES Users(id)
);

CREATE TABLE ImagenesBien(
	IdBien BIGINT not null,
    urlImg varchar(300) not null,
    
    FOREIGN KEY (IdBien) REFERENCES Bien(Id)
);

CREATE TABLE Mensaje(
	Nombre varchar(50) not null,
    email varchar(30) not null,
    mensaje varchar(300) not null
);


SELECT * FROM Users;
SELECT * FROM Mesaje;
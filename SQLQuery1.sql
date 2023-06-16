CREATE TABLE Cliente (
idCliente int IDENTITY(1,1),
nombre varchar(180),
apellido varchar(180),
direccion varchar(250),
correo varchar(100),
telefono varchar (20),
nit varchar(25)

primary key (idCliente)
);

CREATE TABLE Producto (
idProducto int IDENTITY(1,1),
nombre varchar(150),
descripcion varchar(500),
precio FLOAT,
stock int,

primary key (idProducto)
);

CREATE TABLE Tipo_Pago (
idTipo_Pago int IDENTITY(1,1),
tipoPago varchar(50),

primary key (idTipo_Pago)
);

CREATE TABLE Factura(
noFactura int IDENTITY (1,1) PRIMARY KEY,
fechaCreacion timestamp,
idCliente int,
idTipo_Pago int,
total Float,

CONSTRAINT FK_ClienteFactura FOREIGN KEY (idCliente) REFERENCES Cliente(idCliente),
CONSTRAINT FK_TipoPagoFactura FOREIGN KEY (idTipo_Pago) REFERENCES Tipo_Pago(idTipo_Pago)

);
	
CREATE TABLE Factura_Producto(
idFactura_Producto int IDENTITY (1,1) PRIMARY KEY,
noFactura int,
idProducto int,
cantidad_producto int,
subtotal_producto float,


CONSTRAINT FK_FacturaFacturaP FOREIGN KEY (noFactura) REFERENCES Factura(noFactura),
CONSTRAINT FK_ProductoFacturaP FOREIGN KEY (idProducto) REFERENCES Producto(idProducto)
);

INSERT INTO Tipo_Pago(tipoPago)
VALUES ('Contado'), ('Crédito')

Select * from Cliente
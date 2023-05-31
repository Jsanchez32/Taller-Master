CREATE DATABASE SuperMarket;
USE SuperMarket;
CREATE TABLE categorias(
  categoriaId INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  nombre VARCHAR(50) NOT NULL,
  descripcion VARCHAR(50) NOT NULL,
  imagen MEDIUMBLOB NOT NULL  
);

CREATE TABLE clientes(
  clienteId INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  celular VARCHAR(50) NOT NULL,
  compañia VARCHAR(50) NOT NULL
);

CREATE TABLE empleados(
  empleadoId INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  nombre VARCHAR(50) NOT NULL,
  celular VARCHAR(50) NOT NULL,
  direccion VARCHAR(50) NOT NULL,
  imagen MEDIUMBLOB NOT NULL  
);

CREATE TABLE facturas(
  facturaId INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  empleadoId INT,
  clienteId INT,
  fecha VARCHAR(50),
  FOREIGN KEY (empleadoId) REFERENCES empleados(empleadoId),
  FOREIGN KEY (clienteId) REFERENCES clientes(clienteId)

);

CREATE TABLE proveedores(
    proveedorId INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    telefono VARCHAR(50) NOT NULL,
    ciudad VARCHAR(50) NOT NULL
);
CREATE TABLE productos(
  productoId INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  categoriaId INT,
  precioUnitario INT NOT NULL,
  stock INT NOT NULL,
  unidadesPedidas INT NOT NULL,
  proveedorId INT,
  nombreProducto VARCHAR(50) NOT NULL,
  descontinuado VARCHAR(50) NOT NULL,
  FOREIGN KEY (categoriaId) REFERENCES categorias(categoriaId),
  FOREIGN KEY (proveedorId) REFERENCES proveedores(proveedorId)
);

CREATE TABLE facturaDetalle(
    facturaId INT,
    productoId INT,
    cantidad INT,
    precioVenta INT,
    FOREIGN KEY (facturaId) REFERENCES facturas(facturaId),
    FOREIGN KEY (productoId) REFERENCES productos(productoId)
);



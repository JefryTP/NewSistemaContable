
CREATE TABLE Proveedor (
  ID_proveedor INT AUTO_INCREMENT,
  RUC BIGINT(11) NOT NULL,
  Nombre VARCHAR(50) NOT NULL,
  Direccion VARCHAR(250) NOT NULL,
  Correo VARCHAR(250) NOT NULL,
  Telefono INT(9) NOT NULL,
  Estado BIT NOT NULL,
  PRIMARY KEY (ID_proveedor),
  UNIQUE (RUC)
);

CREATE TABLE Categoria (
  ID_categoria INT AUTO_INCREMENT,
  Nombre VARCHAR(50) NOT NULL,
  Descripcion VARCHAR(250) NULL,
  Estado BIT NOT NULL,
  PRIMARY KEY (ID_categoria)
);

CREATE TABLE Medicina (
  ID_medicina INT AUTO_INCREMENT,
  ID_proveedor INT NOT NULL,
  Nombre VARCHAR(50) NOT NULL,
  ID_categoria INT NOT NULL,
  Marca VARCHAR(50) NOT NULL,
  Precio_uni DECIMAL(20,2) NULL,
  Precio_caja DECIMAL(20,2) NOT NULL,
  Unidad_caja INT NULL,
  Medicion VARCHAR(50) NOT NULL,
  Stock INT NOT NULL,
  Estado BIT NOT NULL,
  PRIMARY KEY (ID_medicina),
  FOREIGN KEY (ID_proveedor) REFERENCES Proveedor (ID_proveedor),
  FOREIGN KEY (ID_categoria) REFERENCES Categoria (ID_categoria)
);

CREATE TABLE Trabajador (
  ID_trabajador INT AUTO_INCREMENT,
  Nombre VARCHAR(50) NOT NULL,
  Apellido VARCHAR(50) NOT NULL,
  Correo VARCHAR(250) NOT NULL,
  DNI INT(8) NOT NULL,
  Contraseña VARCHAR(50) NOT NULL,
  Permiso BIT NOT NULL,
  Estado BIT NOT NULL,
  PRIMARY KEY (ID_trabajador),
  UNIQUE (DNI)
);

CREATE TABLE Boleta (
  ID_boleta INT AUTO_INCREMENT,
  Nom_cliente VARCHAR(50) NULL,
  ID_trabajador INT NOT NULL,
  Fecha DATETIME NOT NULL,
  Monto DECIMAL(20,2) NOT NULL,
  PRIMARY KEY (ID_boleta),
  FOREIGN KEY (ID_trabajador) REFERENCES Trabajador (ID_trabajador)
);

CREATE TABLE Boleta_Medicina (
  ID_boleta INT NOT NULL,
  ID_medicina INT NOT NULL,
  Cantidad INT NOT NULL,
  PRIMARY KEY (ID_boleta, ID_medicina),
  FOREIGN KEY (ID_boleta) REFERENCES Boleta (ID_boleta),
  FOREIGN KEY (ID_medicina) REFERENCES Medicina (ID_medicina)
);

INSERT INTO Proveedor (RUC, Nombre, Direccion, Correo, Telefono, Estado) VALUES
(20481573901, 'Farmacias del Sur', 'Calle 123, Ciudad A', 'info@farmaciasdelsur.com', 987654321, 1),
(34567123890, 'Distribuciones Médicas S.A.', 'Avenida Principal, Ciudad B', 'info@distribucionesmedicas.com', 123456789, 1),
(45678901234, 'Laboratorios Genéricos', 'Calle Central, Ciudad C', 'contacto@labgenericos.com', 246813579, 1),
(58903647128, 'Farmacias San Martín', 'Avenida Norte, Ciudad D', 'contacto@farmaciassanmartin.com', 369258147, 1),
(69257481903, 'Distribuidora Farmacéutica FarmaSana', 'Calle Sur, Ciudad E', 'info@farmasana.com', 987654321, 1),
(75839201672, 'Laboratorios BioFarma', 'Avenida Principal, Ciudad F', 'contacto@labbiofarma.com', 123456789, 1),
(86420935187, 'Droguería Internacional', 'Calle Central, Ciudad G', 'info@drogueriainternacional.com', 246813579, 1),
(92346810572, 'Farmacias La Esperanza', 'Avenida Oeste, Ciudad H', 'contacto@farmaciaslaesperanza.com', 369258147, 1),
(10324856923, 'Distribuidora de Medicamentos MedicaSur', 'Calle Este, Ciudad I', 'info@medicasur.com', 987654321, 1),
(11238560724, 'Laboratorios ClínicaPharma', 'Avenida Principal, Ciudad J', 'contacto@clinicapharma.com', 123456789, 1);

INSERT INTO Categoria (Nombre, Descripcion, Estado) VALUES
('Analgésicos', 'Medicamentos para el alivio del dolor', 1),
('Antibióticos', 'Medicamentos para tratar infecciones bacterianas', 1),
('Antihistamínicos', 'Medicamentos para tratar alergias', 1),
('Antiinflamatorios', 'Medicamentos para reducir inflamaciones', 1),
('Antipiréticos', 'Medicamentos para bajar la fiebre', 1),
('Cardiovasculares', 'Medicamentos para trastornos cardíacos', 1),
('Digestivos', 'Medicamentos para problemas digestivos', 1),
('Respiratorios', 'Medicamentos para afecciones respiratorias', 1),
('Sistema Nervioso', 'Medicamentos para trastornos neurológicos', 1),
('Vitaminas y Suplementos', 'Suplementos nutricionales', 1);

INSERT INTO Medicina (ID_proveedor, Nombre, ID_categoria, Marca, Precio_uni, Precio_caja, Unidad_caja, Medicion, Stock, Estado) VALUES
(1, 'Paracetamol', 1, 'Genérico', 5.99, 50.00, 20, 'mg', 100, 1),
(2, 'Amoxicilina', 2, 'Biotic', 12.50, 120.00, 30, 'mg', 80, 1),
(3, 'Loratadina', 3, 'Clarityn', 8.75, 80.00, 10, 'mg', 60, 1),
(4, 'Ibuprofeno', 1, 'Nurofen', 7.99, 70.00, 25, 'mg', 120, 1),
(2, 'Azitromicina', 2, 'Azitrocin', 15.25, 150.00, 10, 'mg', 90, 1),
(6, 'Atorvastatina', 6, 'Lipitor', 23.99, 200.00, 30, 'mg', 40, 1),
(7, 'Omeprazol', 7, 'Losec', 6.50, 60.00, 20, 'mg', 70, 1),
(8, 'Salbutamol', 8, 'Ventolin', 9.99, 90.00, 15, 'mg', 50, 1),
(9, 'Diazepam', 9, 'Valium', 10.75, 100.00, 50, 'mg', 30, 1),
(10, 'Vitamina C', 10, 'Genérico', 3.99, 40.00, 30, 'mg', 200, 1);

INSERT INTO Trabajador (Nombre, Apellido, Correo, DNI, Contraseña, Permiso, Estado) VALUES
('Juan', 'Pérez', 'juan.perez@example.com', 12345678, 'contraseña1', 1, 1),
('María', 'Gómez', 'maria.gomez@example.com', 23456789, 'contraseña2', 0, 1),
('Luis', 'Hernández', 'luis.hernandez@example.com', 34567890, 'contraseña3', 1, 1),
('Ana', 'Rodríguez', 'ana.rodriguez@example.com', 45678901, 'contraseña4', 1, 1),
('Carlos', 'López', 'carlos.lopez@example.com', 56789012, 'contraseña5', 0, 1),
('Laura', 'Torres', 'laura.torres@example.com', 67890123, 'contraseña6', 1, 1),
('Pedro', 'Vargas', 'pedro.vargas@example.com', 78901234, 'contraseña7', 0, 1),
('Sofía', 'Mendoza', 'sofia.mendoza@example.com', 89012345, 'contraseña8', 1, 1),
('Gabriel', 'Ramírez', 'gabriel.ramirez@example.com', 90123456, 'contraseña9', 1, 1),
('Martha', 'Sánchez', 'martha.sanchez@example.com', 01234567, 'contraseña10', 0, 1);

INSERT INTO Boleta (Nom_cliente, ID_trabajador, Fecha, Monto) VALUES
('Cliente 1', 1, '2023-05-31 09:30:00', 150.25),
('Cliente 2', 3, '2023-05-30 17:45:00', 75.50),
('Cliente 3', 2, '2023-05-30 12:15:00', 210.80),
('Cliente 4', 5, '2023-05-29 16:20:00', 45.90),
('Cliente 5', 4, '2023-05-29 10:10:00', 98.75),
('Cliente 6', 7, '2023-05-28 14:30:00', 180.30),
('Cliente 7', 6, '2023-05-27 11:40:00', 65.00),
('Cliente 8', 9, '2023-05-26 18:00:00', 150.50),
('Cliente 9', 8, '2023-05-25 13:20:00', 99.99),
('Cliente 10', 10, '2023-05-24 15:45:00', 120.75);

INSERT INTO Boleta_Medicina (ID_boleta, ID_medicina, Cantidad) VALUES
(1, 1, 2),
(1, 3, 1),
(2, 2, 3),
(3, 5, 1),
(3, 7, 2),
(4, 4, 1),
(5, 1, 2),
(6, 6, 3),
(6, 9, 2),
(6, 10, 1);
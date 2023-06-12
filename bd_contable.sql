--El nombre de la Base de Datos debe ser "bd_contable"

  CREATE TABLE Rol
  (
    ID_rol INT AUTO_INCREMENT,
	  nombre VARCHAR (50) NOT NULL,
    PRIMARY KEY (ID_rol)
);

    CREATE TABLE Tipo
    (
      ID_tipo INT AUTO_INCREMENT,
      nombre VARCHAR (50) NOT NULL,
      PRIMARY KEY (ID_tipo)
);

  CREATE TABLE Cliente
  (
    ruc INT,
    nombre VARCHAR(50) NOT NULL,
    correo VARCHAR(250) NOT NULL,
    telefono INT NOT NULL,
    estado BIT NOT NULL,
    PRIMARY KEY (ruc)
  );

        CREATE TABLE Usuario
        (
          dni INT AUTO_INCREMENT,
	        nombre VARCHAR (50) NOT NULL,
	        apellido VARCHAR (50) NOT NULL,
	        correo VARCHAR (250) NOT NULL,
	        contraseña VARCHAR (50) NOT NULL,
	        ID_rol INT NOT NULL,
	        estado BIT NOT NULL,
	        PRIMARY KEY (dni),
          FOREIGN KEY (ID_rol) REFERENCES Rol (ID_rol)
);

      CREATE TABLE Transaccion
      (
        ID_transaccion INT AUTO_INCREMENT,
	      dni INT NOT NULL,
	      ruc INT NULL,
	      titulo VARCHAR (50) NOT NULL,
	      descripcion VARCHAR (250) NOT NULL,
	      fecha DATETIME NOT NULL,
        monto DECIMAL (10,2) NOT NULL,
	      ID_tipo INT NOT NULL,
        PRIMARY KEY (ID_transaccion),
        FOREIGN KEY (ruc) REFERENCES Cliente (ruc),
        FOREIGN KEY (ID_tipo) REFERENCES Tipo (ID_tipo),
        FOREIGN KEY (dni) REFERENCES Usuario (dni)
);

CREATE TABLE Caja
(
  ID_caja INT AUTO_INCREMENT,
	dni INT NOT NULL,
	ID_transaccion INT NOT NULL,
	fecha DATETIME NOT NULL,
  PRIMARY KEY (ID_caja),
  FOREIGN KEY (ID_transaccion) REFERENCES Transaccion (ID_transaccion),
  FOREIGN KEY (dni) REFERENCES Usuario (dni)
);

          INSERT INTO Rol
            (nombre)
          VALUES
            ('Trabajador'),
            ('Administrador');

          INSERT INTO Tipo
            (nombre)
          VALUES
            ('Ingreso'),
            ('Egreso');

          INSERT INTO Cliente
            (ruc, nombre, correo, telefono, estado)
          VALUES
            (123456789, 'Empresa A', 'empresaA@gmail.com', 987654321, 1),
            (987654321, 'Empresa B', 'empresaB@gmail.com', 123456789, 1);

          INSERT INTO Usuario
            (nombre, apellido, correo, contraseña, ID_rol, estado)
          VALUES
            ('Juan', 'Perez', 'juanperez@gmail.com', '123456', 1, 1),
            ('Maria', 'Lopez', 'marialopez@gmail.com', '654321', 2, 1);

          INSERT INTO Transaccion
            (dni, ruc, titulo, descripcion, fecha, monto, ID_tipo)
          VALUES
            (1, 123456789, 'Venta de productos', 'Venta de productos a Empresa A', '2023-06-01 10:00:00', 100.00, 1),
            (2, NULL, 'Pago de servicios', 'Pago de servicios a Empresa B', '2023-06-01 16:00:00', 50.00, 2);

          INSERT INTO Caja
            (dni, ID_transaccion, fecha)
          VALUES
            (1, 1, '2023-06-01 09:00:00'),
            (2, 2, '2023-06-01 15:30:00');
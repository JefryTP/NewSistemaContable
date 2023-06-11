
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

INSERT INTO proveedor (RUC, Nombre, Direccion, Correo, Telefono, Estado)
VALUES
('15427856349', 'Novartis Peru', 'JR.Palmeras','Nova@gmail.com', 542130794, 1),
('01234698752', 'Sanofi Peru', 'JR.Tupac','Sanofi@gmail.com', 732104598, 1),
('87542103984', 'Abbott Peru', 'JR.Micaela','Abbott@gmail.com', 874631289, 1),
('54213697054', 'Takeda Peru', 'JR.Olaya','Takeda@gmail.com', 478512036, 1),
('14857025873', 'Astellas Peru', 'JR.Colmeas','Astellas@gmail.com', 701234598, 1),
('85427039572', 'Grunenthal Peru', 'JR.Parque','Grunenthal@gmail.com', 645210789, 1),
('12458763300', 'Novo Nordisk Peru', 'JR.Bolivar','Novo@gmail.com', 754213698, 1),
('22348795407', 'Aspen Peru', 'JR.Poma','Aspen@gmail.com', 975421358, 1),
('87542197356', 'Laboratorios Raffo Peru', 'JR.Colegio','Raffo@gmail.com', 457812234, 1),
('44578763197', 'Laboratorios Labinco Peru', 'JR.Pascana','Labinco@gmail.com', 785423197, 1),
('84712549631', 'Laboratorios LKM Peru', 'JR.Vicente Panizo','LKM@gmail.com', 951342765, 1),
('20197813574', 'Laboratorios Kendrick Peru', 'JR.María Parado de Bellido','Kendrick@gmail.com', 910034276, 1),
('37014895123', 'Laboratorios Senosiain Peru', 'JR.Justo Pastor Dávila','Senosiain@gmail.com', 930147026, 1),
('81347209543', 'Laboratorios Effik Peru', 'JR.Toribio Rodríguez','Effik@gmail.com', 970011342, 1),
('22357419810', 'Laboratorios Siegfried Peru', 'JR.Buenaventura Aguirre','Siegfried@gmail.com', 977544312, 1),
('31789042356', 'Laboratorios Biosano Peru', 'JR.Natalio Sánchez','Biosano@gmail.com', 957411236, 1),
('33148779520', 'Laboratorios Andrómaco Peru', 'JR.Juan Montero Rosas','Andrómaco@gmail.com', 984423061, 1),
('84475123664', 'Laboratorios Induquímica Peru', 'JR.Pedro Ureta','Induquímica@gmail.com', 931024557, 1),
('88423175034', 'Laboratorios Alfa Peru', 'JR.Aurelio García ','Alfa@gmail.com', 931025874, 1),
('95478563101', 'Laboratorios Inbiomedic Peru', 'JR.Elvira García','Inbiomedic@gmail.com', 942136780, 1);

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
('Antiácidos', 'Medicamentos para aliviar la acidez estomacal', 1),
('Antidepresivos', 'Medicamentos para tratar la depresión', 1),
('Antieméticos', 'Medicamentos para prevenir o tratar las náuseas y los vómitos', 1),
('Antiespasmódicos', 'Medicamentos para aliviar los espasmos musculares', 1),
('Antivirales', 'Medicamentos para tratar infecciones virales', 1),
('Diuréticos', 'Medicamentos para aumentar la producción de orina y eliminar líquidos', 1),
('Hormonas', 'Medicamentos que regulan las funciones hormonales', 1),
('Inmunosupresores', 'Medicamentos para suprimir la respuesta inmunitaria', 1),
('Relajantes musculares', 'Medicamentos para relajar los músculos', 1),
('Suplementos de hierro', 'Suplementos nutricionales para tratar la deficiencia de hierro', 1);

INSERT INTO Medicina 
(ID_proveedor, Nombre, ID_categoria, ID_marca, Precio_uni, Precio_caja, Unidad_caja, Stock, Estado)  VALUES
(1, 'Ibuprofeno', 2, 'Advil', 9.99, 49.99, 24, 100, 1),
(2, 'Amoxicilina', 3, 'Amoxil', 12.99, 59.99, 30, 50, 1),
(3, 'Loratadina', 4, 'Claritin', 7.99, 39.99, 20, 75, 1),
(1, 'Diclofenaco', 5, 'Voltaren', 8.99, 45.99, 18, 60, 1),
(4, 'Paracetamol', 1, 'Tylenol', 5.99, 29.99, 12, 200, 1),
(5, 'Atorvastatina', 6, 'Lipitor', 15.99, 79.99, 30, 25, 1),
(2, 'Omeprazol', 7, 'Prilosec', 6.99, 34.99, 14, 100, 1),
(6, 'Salbutamol', 8, 'Ventolin', 10.99, 54.99, 28, 40, 1),
(3, 'Risperidona', 9, 'Risperdal', 11.99, 59.99, 30, 15, 1),
(7, 'Vitamina C', 10, 'Natures Bounty', 4.99, 24.99, 60, 100, 1);


(16, 'Ácido acetilsalicílico', 1, 1, 5.30, 30, 20, 100, 1),
(8, 'Metamizol sódico', 2, 2, 12.50, 55.00, 10, 200, 1),
(7, 'Paracetamol', 3, 3, 1.99, 15.00, 1, 10, 1),
(17, 'Amoxicilina', 4, 3, 1.99, 15.00, 1, 10, 1),
(14, 'Atorvastatina', 5, 3, 4.29, 15.00, 1, 10, 1),
(3, 'Panadol', 6, 3, 1.99, 3.00, 1, 10, 1),
(19, 'Azitromicina', 7, 3, 5.90, 15.00, 1, 10, 1),
(5, 'Miodel', 8, 3, 1.99, 8.32, 1, 10, 1),
(10, 'Ambroxol', 9, 3, 1.99, 6.50, 1, 30, 1),
(13, 'Benciamina', 10, 3, 2.00, 11.20, 1, 30, 1),
(6, 'Benzocaina', 11, 3, 5.99, 1.25, 1, 20, 1),
(1, 'Plidan', 11, 3, 3.80, 2.20, 1, 20, 1),
(18, 'Plidan forte', 13, 3, 6.30, 15.00, 1, 10, 1),
(12, 'Dolocolorand', 14, 3, 1.50, 15.00, 1, 15, 1),
(9, 'Cetericina', 15, 3, 1.91, 10.0, 1, 50, 1),
(11, 'Loratadina', 16, 3, 3.60, 12.20, 1, 30, 1),
(4, 'Cilecoxib', 17, 3, 2.50, 15.80, 1, 10, 1),
(15, 'Omeprazol', 18, 3, 4.99, 8.70, 1, 20, 1),
(2, 'Aspirina', 19, 3, 2.90, 8.70, 1, 20, 1),
(20, 'Metformina', 20, 3, 5.90, 8.70, 1, 20, 1),
(19, 'Ciprofloxacina', 2, 3, 2.60, 8.70, 1, 20, 1),
(12, 'Diazepam', 5, 3, 1.80, 8.70, 1, 20, 1),
(10, 'Rabeprazol', 6, 3, 3.40, 2.50, 1, 20, 1),
(18, 'Sertralina', 8, 3, 4.50, 8.00, 1, 20, 1),
(2, 'Prednisona ', 2, 3, 6.20, 3.00, 1, 20, 1);
(6, 'Tramadol ', 2, 3, 3.50, 7.30, 1, 20, 1);
(7, 'Metronidazol ', 3, 3, 2.60, 8.00, 1, 20, 1);
(2, 'Ranitidina  ', 6, 3, 1.20, 5.70, 1, 20, 1);
(9, 'Amoxicilina/Ácido clavulánico ', 2, 3, 5.50, 8.70, 1, 20, 1);
(10, 'Escitalopram ', 3, 3, 2.30, 5.60, 1, 20, 1);
(11, 'Diclofenaco  ', 1, 3, 1.20, 2.70, 1, 20, 1);
(20, 'Levotiroxina  ', 2, 3, 3.20, 8.30, 1, 20, 1);
(3, 'Amlodipino ', 3, 3, 1.60, 7.00, 1, 20, 1);
(4, 'Salbutamol  ', 4, 3, 1.90, 8.70, 1, 20, 1);
(3, 'Losartán ', 5, 3, 2.00, 13.00, 1, 20, 1);
(6, 'Fluoxetina  ', 3, 3, 3.60, 16.70, 1, 20, 1);
(3, 'Codeína  ', 7, 3, 2.40, 20.70, 1, 20, 1);
(8, 'Montelukast  ', 8, 3, 13.20, 8.70, 1, 20, 1);
(9, 'Alprazolam  ', 9, 3, 1.20, 15.70, 1, 20, 1);
(4, 'Furosemida  ', 4, 3, 3.30, 11.50, 1, 20, 1);
(11, 'Metoclopramida  ', 1, 3, 4.50, 10.30, 1, 20, 1);
(12, 'Hidroclorotiazida  ', 2, 3, 16.50, 30.70, 1, 20, 1);
(13, 'Enalapril  ', 4, 3, 9.30, 26.00, 1, 20, 1);
(4, 'Levofloxacina  ', 4, 3, 2.10, 8.70, 1, 20, 1);
(5, 'Lorazepam ', 5, 3, 6.50, 8.70, 1, 20, 1);
(16, 'Fluticasona ', 6, 3, , 8.70, 1, 20, 1);
(17, 'Rosuvastatina ', 7, 3, 3.99, 8.70, 1, 20, 1);
(8, 'Cetirizina ', 8, 3, 5.80, 8.70, 1, 20, 1);
(9, 'Paroxetina ', 4, 3, 3.50, 8.70, 1, 20, 1);
(5, 'Mirtazapina ', 5, 3, 14.60, 8.70, 1, 20, 1);
(1, 'Lansoprazol ', 1, 3, 12.00, 8.70, 1, 20, 1);
(5, 'Citalopram ', 2, 3, 2.70, 8.70, 1, 20, 1);
(3, 'Atenolol ', 3, 3, 6.60, 8.70, 1, 20, 1);
(4, 'Valsartán ', 9, 3, 5.90, 8.70, 1, 20, 1);
(5, 'Insulina glargina ', 55, 3, 1.20, 8.70, 1, 20, 1);
(6, 'Sildenafil ', 4, 3, 3.20, 8.70, 1, 20, 1);
(5, 'Naproxeno ', 7, 3, 3.20, 8.70, 1, 20, 1);
(8, 'Tamsulosina ', 5, 3, 6.20, 8.70, 1, 20, 1);
(5, 'Dexametasona ', 9, 3, 2.90, 8.70, 1, 20, 1);
(20, 'Budesonida ', 6, 3, 1.00, 8.70, 1, 20, 1);
(16, 'Gabapentina ', 6, 3, 9.90, 8.70, 1, 20, 1);
(12, 'Metildopa ', 2, 3, 9.60, 8.70, 1, 20, 1);
(13, 'Pregabalina ', 8, 3, 1.6, 8.70, 1, 20, 1);
(14, 'Claritromicina ', 4, 3, 15.99, 8.70, 1, 20, 1);
(15, 'Glimepirida ', 2, 3, 16.00, 8.70, 1, 20, 1);
(6, 'Aripiprazol ', 4, 3, 1.90, 8.70, 1, 20, 1);
(7, 'Hidroxizina ', 7, 3, 1.30, 8.70, 1, 20, 1);
(18, 'Clopidogrel ', 9, 3, 1.60, 8.70, 1, 20, 1);
(19, 'Cefalexina ', 6, 3, 6.60, 8.70, 1, 20, 1);
(10, 'Risperidona ', 7, 3, 5.50, 8.70, 1, 20, 1);
(11, 'Tadalafilo ', 1, 3, 4.10, 8.70, 1, 20, 1);
(12, 'Candesartán ', 7, 3, 9.60, 8.70, 1, 20, 1);
(13, 'Escitalopram ', 3, 3, 8.40, 8.70, 1, 20, 1);
(14, 'Amiodarona ', 4, 3, 13.10, 8.70, 1, 20, 1);
(15, 'Vareniclina ', 15, 3, 3.00, 8.70, 1, 20, 1);
(6, 'Quetiapina ', 10, 3, 6.00, 8.70, 1, 20, 1);
(7, 'Insulina regular '17, 75, 3, 2.30, 8.70, 1, 20, 1);
(8, 'Meloxicam ', 8, 3, 3.20, 8.70, 1, 20, 1);
(7, 'Salmeterol/Fluticasona ', 19, 3, 1.60, 8.70, 1, 20, 1);
(8, 'Paracetamol ', 8, 3, 8.20, 8.70, 1, 20, 1);
(1, 'Levonorgestrel ', 11, 3, 3.60, 8.70, 1, 20, 1);
(2, 'Aciclovir ', 20, 3, 6.40, 8.70, 1, 20, 1);
(3, 'Metformina ', 2, 3, 15.00, 8.70, 1, 20, 1);
(4, 'Trimebutina ', 4, 3, 19.30, 8.70, 1, 20, 1);
(5, 'Cefuroxima ', 15, 3, 1.20, 8.70, 1, 20, 1);
(8, 'Enalapril ', 6, 3, 1.90, 8.70, 1, 20, 1);
(7, 'Bromazepam ', 6, 3, 1.20, 8.70, 1, 20, 1);
(8, 'Ritonavir ', 9, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Venlafaxina ', 19, 3, 1.99, 8.70, 1, 20, 1);
(10, 'Beclometasona ', 10, 3, 1.99, 8.70, 1, 20, 1);
(11, 'Levotiroxina ', 11, 3, 1.99, 8.70, 1, 20, 1);
(2, 'Sulfametoxazol/Trimetoprima ', 9, 3, 1.99, 8.70, 1, 20, 1);
(3, 'Fenitoína ', 13, 3, 1.99, 8.70, 1, 20, 1);
(19, 'Donepezilo ', 4, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Ondansetrón ', 9, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Mometasona ', 6, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Nitroglicerina ', 9, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Fluticasona ', 8, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Etinilestradiol/Levonorgestrel ', 15, 3, 1.99, 8.70, 1, 20, 1);
(10, 'Clotrimazol ', 1, 3, 1.99, 8.70, 1, 20, 1);
(11, 'Lorazepam ', 11, 3, 1.99, 8.70, 1, 20, 1);
(2, 'Valproato de sodio', 12, 3, 1.99, 8.70, 1, 20, 1);
(13, 'Bupropion ', 3, 3, 1.99, 8.70, 1, 20, 1);
(14, 'Mupirocina ', 5, 3, 1.99, 8.70, 1, 20, 1);
(10, 'Lamotrigina ', 10, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Ácido fólico ', 6, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Carvedilol ', 11, 3, 1.99, 8.70, 1, 20, 1);
(18, 'Metocarbamol ', 18, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Azitromicina ', 19, 3, 1.99, 8.70, 1, 20, 1);
(10, 'Paroxetina ', 10, 3, 1.99, 8.70, 1, 20, 1);
(11, 'Escitalopram ', 13, 3, 1.99, 8.70, 1, 20, 1);
(12, 'Lorazepam ', 16, 3, 1.99, 8.70, 1, 20, 1);
(13, 'Clonazepam ', 13, 3, 1.99, 8.70, 1, 20, 1);
(14, 'Risperidona ', 19, 3, 1.99, 8.70, 1, 20, 1);
(15, 'Metformina ', 20, 3, 1.99, 8.70, 1, 20, 1);
(16, 'Prednisona ', 6, 3, 1.99, 8.70, 1, 20, 1);
(17, 'Cetirizina ', 17, 3, 1.99, 8.70, 1, 20, 1);
(1, 'Metoclopramida ', 8, 3, 1.99, 8.70, 1, 20, 1);
(19, 'Enalapril ', 1, 3, 1.99, 8.70, 1, 20, 1);
(20, 'Atenolol ', 10, 3, 1.99, 8.70, 1, 20, 1);
(11, 'Ondansetrón ', 11, 3, 1.99, 8.70, 1, 20, 1);
(12, 'Hidroclorotiazida ', 12, 3, 1.99, 8.70, 1, 20, 1);
(3, 'Salbutamol ', 1, 3, 1.99, 8.70, 1, 20, 1);
(4, 'Ibuprofeno ', 4, 3, 1.99, 8.70, 1, 20, 1);
(15, 'Diclofenaco ', 15, 3, 1.99, 8.70, 1, 20, 1);
(16, 'Lansoprazo ', 1, 3, 1.99, 8.70, 1, 20, 1);
(12, 'Levotiroxina ', 12, 3, 1.99, 8.70, 1, 20, 1);
(18, 'Atorvastatina ', 8, 3, 1.99, 8.70, 1, 20, 1);
(19, 'Montelukast ', 1, 3, 1.99, 8.70, 1, 20, 1);
(10, 'Losartán ', 20, 3, 1.99, 8.70, 1, 20, 1);
(13, 'Loratadina ', 19, 3, 1.99, 8.70, 1, 20, 1);
(12, 'Ciprofloxacina ', 13, 3, 1.99, 8.70, 1, 20, 1);
(1, 'Paracetamol ', 14, 3, 1.99, 8.70, 1, 20, 1);
(13, 'Dipirona ', 4, 3, 1.99, 8.70, 1, 20, 1);
(15, 'Metronidazol ', 3, 3, 1.99, 8.70, 1, 20, 1);
(16, 'Fluconazol ', 6, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Sertralina ', 13, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Dexametasona ', 18, 3, 1.99, 8.70, 1, 20, 1);
(1, 'Codeína/Fosfato de Codeína ', 15, 3, 1.99, 8.70, 1, 20, 1);
(10, 'Tamsulosina ', 19, 3, 1.99, 8.70, 1, 20, 1);
(11, 'Hidrocortisona  ', 20, 3, 1.99, 8.70, 1, 20, 1);
(12, 'Famotidina ', 20, 3, 1.99, 8.70, 1, 20, 1);
(13, 'Furosemida ', 16, 3, 1.99, 8.70, 1, 20, 1);
(14, 'Paracetamol/Cafeína ', 4, 3, 1.99, 8.70, 1, 20, 1);
(15, 'Escitalopram ', 1, 3, 1.99, 8.70, 1, 20, 1);
(16, 'Diclofenaco ', 6, 3, 1.99, 8.70, 1, 20, 1);
(17, 'Candesartán ', 17, 3, 1.99, 8.70, 1, 20, 1);
(1, 'Budesonida ', 14, 3, 1.99, 8.70, 1, 20, 1);
(19, 'Pantoprazol ', 19, 3, 1.99, 8.70, 1, 20, 1);
(10, 'Nimesulida ', 15, 3, 1.99, 8.70, 1, 20, 1);
(11, 'Tramadol ', 11, 3, 1.99, 8.70, 1, 20, 1);
(15, 'Piroxicam ', 2, 3, 1.99, 8.70, 1, 20, 1);
(13, 'Amoxicilina ', 5, 3, 1.99, 8.70, 1, 20, 1);
(4, 'Metamizol ', 1, 3, 1.99, 8.70, 1, 20, 1);
(15, 'Paracetamol ', 20, 3, 1.99, 8.70, 1, 20, 1);
(16, 'Mometasona ', 13, 3, 1.99, 8.70, 1, 20, 1);
(15, 'Clobetasol ', 17, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Fluoxetina ', 1, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Acetazolamida ', 20, 3, 1.99, 8.70, 1, 20, 1);
(16, 'Memantina ', 6, 3, 1.99, 8.70, 1, 20, 1);
(11, 'Sulfato de Zinc ', 11, 3, 1.99, 8.70, 1, 20, 1);
(16, 'Levodopa/Carbidopa ', 2, 3, 1.99, 8.70, 1, 20, 1);
(13, 'Azitromicina ', 1, 3, 1.99, 8.70, 1, 20, 1);
(14, 'Bupropion ', 4, 3, 1.99, 8.70, 1, 20, 1);
(15, 'Mirtazapina ', 19, 3, 1.99, 8.70, 1, 20, 1);
(16, 'Meloxicam ', 16, 3, 1.99, 8.70, 1, 20, 1);
(17, 'Venlafaxina ', 7, 3, 1.99, 8.70, 1, 20, 1);
(18, 'Buspirona ', 8, 3, 1.99, 8.70, 1, 20, 1);
(19, 'Valsartán ', 1, 3, 1.99, 8.70, 1, 20, 1);
(10, 'Gliclazida ', 12, 3, 1.99, 8.70, 1, 20, 1);
(1, 'Etoricoxib ', 11, 3, 1.99, 8.70, 1, 20, 1);
(12, 'Lamotrigina ', 17, 3, 1.99, 8.70, 1, 20, 1);
(13, 'Paroxetina ', 13, 3, 1.99, 8.70, 1, 20, 1);
(14, 'Hidroclorotiazida ', 4, 3, 1.99, 8.70, 1, 20, 1);
(15, 'Metformina ', 5, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Sertralina ', 16, 3, 1.99, 8.70, 1, 20, 1);
(17, 'Amitriptilina ', 7, 3, 1.99, 8.70, 1, 20, 1);
(18, 'Alprazolam  ', 12, 3, 1.99, 8.70, 1, 20, 1);
(19, 'Fenilefrina  ', 17, 3, 1.99, 8.70, 1, 20, 1);
(18, 'Escitalopram ', 18, 3, 1.99, 8.70, 1, 20, 1);
(11, 'Dextrometorfano ', 11, 3, 1.99, 8.70, 1, 20, 1);
(12, 'Naproxeno  ', 12, 3, 1.99, 8.70, 1, 20, 1);
(13, 'Acetaminofén ', 2, 3, 1.99, 8.70, 1, 20, 1);
(14, 'Levocetirizina ', 1, 3, 1.99, 8.70, 1, 20, 1);
(18, 'Loratadina ', 5, 3, 1.99, 8.70, 1, 20, 1);
(16, 'Omeprazol ', 6, 3, 1.99, 8.70, 1, 20, 1);
(18, 'Cetirizina ', 8, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Lorazepam ', 8, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Ciprofloxacina ', 1, 3, 1.99, 8.70, 1, 20, 1);
(10, 'Metronidazol ', 19, 3, 1.99, 8.70, 1, 20, 1);
(11, 'Losartán ', 11, 3, 1.99, 8.70, 1, 20, 1);
(19, 'Paracetamol ', 19, 3, 1.99, 8.70, 1, 20, 1);
(13, 'Levotiroxina ', 13, 3, 1.99, 8.70, 1, 20, 1);
(14, 'Codeína ', 1, 3, 1.99, 8.70, 1, 20, 1);
(19, 'Diazepam ', 5, 3, 1.99, 8.70, 1, 20, 1);
(19, 'Cefalexina ', 1, 3, 1.99, 8.70, 1, 20, 1);
(17, 'Rabeprazol ', 17, 3, 1.99, 8.70, 1, 20, 1);
(18, 'Escitalopram ', 8, 3, 1.99, 8.70, 1, 20, 1);
(19, 'Tramadol ', 9, 3, 1.99, 8.70, 1, 20, 1);
(20, 'Atorvastatina ', 20, 3, 1.99, 8.70, 1, 20, 1);
(11, 'Amlodipino ', 20, 3, 1.99, 8.70, 1, 20, 1);
(20, 'Fluoxetina ', 2, 3, 1.99, 8.70, 1, 20, 1);
(21, 'Amoxicilina/Ácido clavulánico ', 3, 3, 1.99, 8.70, 1, 20, 1);
(21, 'Omeprazol  ', 4, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Prednisona ', 20, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Diclofenaco ', 6, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Metformina ', 2, 3, 1.99, 8.70, 1, 20, 1);
(2, 'Ciprofloxacina ', 8, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Lansoprazol ', 2, 3, 1.99, 8.70, 1, 20, 1);
(2, 'Metformina ', 10, 3, 1.99, 8.70, 1, 20, 1);
(11, 'Paroxetina ', 1, 3, 1.99, 8.70, 1, 20, 1);
(12, 'Escitalopram ', 8, 3, 1.99, 8.70, 1, 20, 1);
(3, 'Lorazepam ', 15, 3, 1.99, 8.70, 1, 20, 1);
(20, 'Clonazepam ', 10, 3, 1.99, 8.70, 1, 20, 1);
(15, 'Risperidona ', 2, 3, 1.99, 8.70, 1, 20, 1);
(16, 'Metformina ', 3, 3, 1.99, 8.70, 1, 20, 1);
(17, 'Prednisona ', 6, 3, 1.99, 8.70, 1, 20, 1);
(18, 'Cetirizina ', 1, 3, 1.99, 8.70, 1, 20, 1);
(19, 'Metoclopramida ', 18, 3, 1.99, 8.70, 1, 20, 1);
(20, 'Enalapril ', 8, 3, 1.99, 8.70, 1, 20, 1);
(20, 'Atenolol ', 8, 3, 1.99, 8.70, 1, 20, 1);
(20, 'Ondansetrón ', 5, 3, 1.99, 8.70, 1, 20, 1);
(3, 'Hidroclorotiazida ', 18, 3, 1.99, 8.70, 1, 20, 1);
(4, 'Salbutamol ', 8, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Ibuprofeno ', 6, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Diclofenaco ', 2, 3, 1.99, 8.70, 1, 20, 1);
(2, 'Lansoprazol ', 3, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Levotiroxina ', 11, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Atorvastatina ', 11, 3, 1.99, 8.70, 1, 20, 1);
(2, 'Montelukast  ', 16, 3, 1.99, 8.70, 1, 20, 1);
(1, 'Losartán ', 19, 3, 1.99, 8.70, 1, 20, 1);
(2, 'Loratadina ', 18, 3, 1.99, 8.70, 1, 20, 1);
(3, 'Ciprofloxacina ', 10, 3, 1.99, 8.70, 1, 20, 1);
(4, 'Dipirona ', 13, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Metronidazol ', 17, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Fluconazol ', 18, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Sertralina ', 20, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Dexametasona ', 11, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Codeína/Fosfato de Codeína ', 18, 3, 1.99, 8.70, 1, 20, 1);
(10, 'Tamsulosina ', 13, 3, 1.99, 8.70, 1, 20, 1);
(1, 'Hidrocortisona ', 10, 3, 2.50, 9.20, 1, 20, 1);
(2, 'Famotidina ', 8, 3, 2.30, 8.90, 1, 20, 1);
(3, 'Furosemida ', 5, 3, 2.10, 8.40, 1, 20, 1);
(4, 'Paracetamol/Cafeína ', 7, 3, 1.80, 9.50, 1, 20, 1);
(5, 'Escitalopram ', 9, 3, 2.15, 8.80, 1, 20, 1);
(6, 'Diclofenaco ', 4, 3, 1.95, 9.30, 1, 20, 1);
(7, 'Candesartán ', 6, 3, 1.75, 8.60, 1, 20, 1);
(8, 'Budesonida ', 2, 3, 2.20, 8.50, 1, 20, 1);
(2, 'Pantoprazol ', 3, 3, 1.85, 9.10, 1, 20, 1);
(5, 'Nimesulida ', 1, 3, 1.95, 9.20, 1, 20, 1);
(1, 'Tramadol ', 4, 3, 2.10, 9.40, 1, 20, 1);
(2, 'Piroxicam ', 7, 3, 1.80, 9.50, 1, 20, 1);
(5, 'Amoxicilina ', 6, 3, 2.25, 8.80, 1, 20, 1);
(5, 'Metamizol ', 9, 3, 2.00, 9.30, 1, 20, 1);
(5, 'Paracetamol ', 5, 3, 1.90, 8.70, 1, 20, 1);
(6, 'Mometasona ', 7, 3, 2.30, 9.00, 1, 20, 1);
(7, 'Clobetasol ', 4, 3, 2.20, 9.10, 1, 20, 1);
(8, 'Fluoxetina ', 6, 3, 1.75, 8.60, 1, 20, 1);
(9, 'Acetazolamida ', 3, 3, 2.40, 8.90, 1, 20, 1);
(10, 'Memantina ', 1, 3, 2.35, 8.80, 1, 20, 1);
(11, 'Sulfato de Zinc ', 6, 3, 2.15, 9.20, 1, 20, 1);
(12, 'Levodopa/Carbidopa ', 2, 3, 2.30, 9.10, 1, 20, 1);
(13, 'Azitromicina ', 5, 3, 2.20, 8.50, 1, 20, 1);
(14, 'Bupropion ', 7, 3, 1.90, 9.20, 1, 20, 1);
(15, 'Mirtazapina ', 9, 3, 2.15, 8.80, 1, 20, 1);
(16, 'Meloxicam ', 4, 3, 1.95, 9.30, 1, 20, 1);
(7, 'Venlafaxina ', 3, 3, 1.75, 8.60, 1, 20, 1);
(8, 'Buspirona ', 6, 3, 1.85, 9.10, 1, 20, 1);
(9, 'Valsartán ', 8, 3, 2.10, 8.40, 1, 20, 1);
(2, 'Gliclazida ', 7, 3, 1.80, 9.50, 1, 20, 1);
(1, 'Etoricoxib ', 4, 3, 1.95, 9.30, 1, 20, 1);
(2, 'Lamotrigina ', 6, 3, 1.75, 8.60, 1, 20, 1);
(13, 'Paroxetina ', 2, 3, 2.20, 8.50, 1, 20, 1);
(14, 'Hidroclorotiazida ', 9, 3, 2.00, 9.30, 1, 20, 1);
(15, 'Metformina ', 5, 3, 1.90, 8.70, 1, 20, 1);
(6, 'Sertralina ', 10, 3, 1.80, 9.20, 1, 20, 1);
(7, 'Amitriptilina ', 18, 3, 2.50, 9.80, 1, 20, 1);
(2, 'Alprazolam ', 18, 3, 1.80, 7.20, 1, 20, 1);
(1, 'Fenilefrina ', 18, 3, 1.95, 8.30, 1, 20, 1);
(2, 'Escitalopram ', 18, 3, 2.10, 8.90, 1, 20, 1);
(2, 'Dextrometorfano ', 18, 3, 1.75, 7.80, 1, 20, 1);
(2, 'Naproxeno ', 18, 3, 2.20, 9.50, 1, 20, 1);
(3, 'Acetaminofén ', 18, 3, 2.05, 8.60, 1, 20, 1);
(2, 'Levocetirizina ', 18, 3, 2.30, 9.10, 1, 20, 1);
(5, 'Loratadina ', 18, 3, 2.15, 8.40, 1, 20, 1);
(6, 'Omeprazol ', 18, 3, 2.40, 9.70, 1, 20, 1);
(2, 'Cetirizina ', 18, 3, 1.85, 7.40, 1, 20, 1);
(8, 'Lorazepam ', 18, 3, 2.55, 9.20, 1, 20, 1);
(9, 'Ciprofloxacina', 18, 3, 2.65, 9.40, 1, 20, 1);
(10, 'Metronidazol ', 18, 3, 2.75, 9.60, 1, 20, 1);
(1, 'Losartán ', 18, 3, 2.80, 9.90, 1, 20, 1);
(2, 'Paracetamol ', 18, 3, 2.20, 9.30, 1, 20, 1);
(3, 'Levotiroxina ', 18, 3, 2.30, 9.80, 1, 20, 1);
(14, 'Codeína ', 18, 3, 2.40, 8.70, 1, 20, 1);
(15, 'Diazepam ', 18, 3, 2.55, 9.20, 1, 20, 1);
(16, 'Cefalexina', 18, 3, 2.60, 9.50, 1, 20, 1);
(2, 'Rabeprazol ', 18, 3, 2.75, 9.60, 1, 20, 1);
(18, 'Escitalopram ', 18, 3, 2.85, 9.90, 1, 20, 1);
(19, 'Tramadol ', 18, 3, 2.10, 8.40, 1, 20, 1);
(10, 'Atorvastatina ', 18, 3, 2.25, 8.80, 1, 20, 1);
(11, 'Amlodipino ', 18, 3, 2.30, 9.70, 1, 20, 1);
(12, 'Fluoxetina ', 18, 3, 2.45, 9.30, 1, 20, 1);
(4, 'Amoxicilina/Ácido clavulánico ', 18, 3, 2.60, 9.50, 1, 20, 1);
(3, 'Omeprazol ', 18, 3, 1.95, 8.60, 1, 20, 1);
(6, 'Prednisona ', 18, 3, 2.15, 8.40, 1, 20, 1);
(7, 'Diclofenaco ', 18, 3, 2.30, 9.10, 1, 20, 1);
(8, 'Metformina ', 18, 3, 2.50, 9.80, 1, 20, 1);
(9, 'Ciprofloxacina ', 18, 3, 2.75, 9.40, 1, 20, 1);
(0, 'Paroxetina ', 18, 3, 2.85, 9.90, 1, 20, 1);
(1, 'Escitalopram ', 18, 3, 2.10, 8.90, 1, 20, 1);
(2, 'Lorazepam ', 18, 3, 2.55, 9.20, 1, 20, 1);
(13, 'Clonazepam ', 18, 3, 1.80, 7.20, 1, 20, 1);
(4, 'Risperidona ', 18, 3, 2.25, 8.80, 1, 20, 1);
(15, 'Metformina ', 18, 3, 2.35, 9.10, 1, 20, 1);
(16, 'Prednisona ', 18, 3, 2.40, 9.70, 1, 20, 1);
(17, 'Cetirizina ', 18, 3, 1.85, 7.40, 1, 20, 1);
(18, 'Metoclopramida ', 18, 3, 1.95, 8.30, 1, 20, 1);
(19, 'Enalapril ', 18, 3, 2.30, 9.90, 1, 20, 1);
(20, 'Atenolol ', 18, 3, 2.45, 9.30, 1, 20, 1);
(1, 'Ondansetrón ', 18, 3, 2.35, 9.10, 1, 20, 1);
(3, 'Hidroclorotiazida ', 18, 3, 2.50, 8.05, 1, 20, 1);
(3, 'Salbutamol ', 18, 3, 1.75, 7.80, 1, 20, 1);
(4, 'Amoxicilina ', 18, 3, 2.10, 8.40, 1, 20, 1);
(5, 'Ibuprofeno ', 18, 3, 1.95, 9.50, 1, 20, 1);
(6, 'Diclofenaco ', 18, 3, 2.20, 8.90, 1, 20, 1);
(3, 'Lansoprazol ', 18, 3, 1.80, 8.10, 1, 20, 1);
(8, 'Levotiroxina ', 18, 3, 2.15, 8.65, 1, 20, 1);
(2, 'Atorvastatina ', 18, 3, 2.30, 8.80, 1, 20, 1);
(11, 'Montelukast ', 18, 3, 2.05, 8.20, 1, 20, 1);
(1, 'Losartán ', 18, 3, 2.40, 9.20, 1, 20, 1);
(2, 'Loratadina ', 18, 3, 2.55, 9.35, 1, 20, 1);
(3, 'Ciprofloxacina ', 18, 3, 2.60, 9.40, 1, 20, 1);
(4, 'Paracetamol ', 18, 3, 2.25, 8.95, 1, 20, 1);
(5, 'Dipirona ', 18, 3, 1.95, 8.70, 1, 20, 1);
(6, 'Metronidazol ', 18, 3, 2.10, 8.40, 1, 20, 1);
(7, 'Fluconazol ', 18, 3, 2.20, 8.50, 1, 20, 1);
(3, 'Sertralina ', 18, 3, 2.30, 8.60, 1, 20, 1);
(9, 'Dexametasona ', 18, 3, 2.45, 8.75, 1, 20, 1);
(10, 'Codeína/Fosfato de Codeína ', 18, 3, 1.85, 8.15, 1, 20, 1);
(11, 'Tamsulosina ', 18, 3, 2.50, 9.10, 1, 20, 1);
(20, 'Hidrocortisona ', 18, 3, 2.55, 9.20, 1, 20, 1);
(13, 'Famotidina ', 18, 3, 1.95, 8.70, 1, 20, 1);
(3, 'Furosemida ', 18, 3, 2.25, 8.95, 1, 20, 1);
(5, 'Paracetamol/Cafeína ', 18, 3, 2.40, 9.30, 1, 20, 1);
(6, 'Escitalopram ', 18, 3, 2.55, 9.45, 1, 20, 1);
(3, 'Diclofenaco ', 18, 3, 2.30, 9.10, 1, 20, 1);
(8, 'Candesartán ', 18, 3, 1.90, 8.25, 1, 20, 1);
(9, 'Budesonida ', 18, 3, 2.05, 8.40, 1, 20, 1);
(20, 'Pantoprazol ', 18, 3, 2.20, 8.55, 1, 20, 1);
(11, 'Nimesulida ', 18, 3, 2.35, 8.70, 1, 20, 1);
(2, 'Tramadol ', 18, 3, 2.50, 8.85, 1, 20, 1);
(3, 'Piroxicam ', 18, 3, 1.85, 8.15, 1, 20, 1);
(5, 'Amoxicilina ', 18, 3, 2.40, 9.20, 1, 20, 1);
(5, 'Metamizol ', 18, 3, 2.25, 8.95, 1, 20, 1);
(3, 'Paracetamol ', 18, 3, 1.95, 8.70, 1, 20, 1);
(7, 'Mometasona ', 18, 3, 2.10, 8.40, 1, 20, 1);
(8, 'Clobetasol ', 18, 3, 2.20, 8.50, 1, 20, 1);
(3, 'Fluoxetina ', 18, 3, 2.30, 8.60, 1, 20, 1);
(20, 'Acetazolamida ', 18, 3, 1.90, 8.30, 1, 20, 1);
(11, 'Memantina ', 18, 3, 2.05, 8.45, 1, 20, 1);
(12, 'Sulfato de Zinc ', 18, 3, 2.20, 8.60, 1, 20, 1);
(12, 'Levodopa/Carbidopa ', 18, 3, 2.40, 8.80, 1, 20, 1);
(13, 'Azitromicina ', 18, 3, 1.95, 8.30, 1, 20, 1);
(14, 'Bupropion ', 18, 3, 2.10, 8.45, 1, 20, 1);
(15, 'Mirtazapina ', 18, 3, 2.25, 8.60, 1, 20, 1);
(1, 'Meloxicam ', 18, 3, 1.85, 8.15, 1, 20, 1);
(7, 'Venlafaxina ', 18, 3, 1.90, 8.20, 1, 20, 1);
(3, 'Buspirona ', 18, 3, 2.05, 8.35, 1, 20, 1);
(9, 'Valsartán ', 18, 3, 2.20, 8.50, 1, 20, 1);
(3, 'Gliclazida ', 18, 3, 2.35, 8.65, 1, 20, 1);
(3, 'Etoricoxib ', 18, 3, 2.05, 8.35, 1, 20, 1);
(3, 'Lamotrigina ', 18, 3, 2.20, 8.50, 1, 20, 1);
(4, 'Paroxetina ', 18, 3, 2.35, 8.65, 1, 20, 1);
(7, 'Hidroclorotiazida ', 18, 3, 2.40, 8.70, 1, 20, 1);
(7, 'Metformina ', 18, 3, 2.55, 8.85, 1, 20, 1);
(7, 'Sertralina ', 18, 3, 2.25, 8.55, 1, 20, 1);
(3, 'Amitriptilina ', 18, 3, 1.90, 8.20, 1, 20, 1);
(9, 'Alprazolam ', 18, 3, 2.05, 8.35, 1, 20, 1);
(8, 'Amoxicilina ', 18, 3, 2.20, 8.50, 1, 20, 1);
(1, 'Ibuprofeno ', 18, 3, 2.35, 8.65, 1, 20, 1);
(2, 'Ciprofloxacina ', 18, 3, 2.50, 8.80, 1, 20, 1);
(3, 'Paracetamol ', 18, 3, 1.85, 8.15, 1, 20, 1);
(4, 'Metronidazol ', 18, 3, 1.90, 8.20, 1, 20, 1);
(5, 'Loratadina ', 18, 3, 2.05, 8.35, 1, 20, 1);
(6, 'Losartán ', 18, 3, 2.20, 8.50, 1, 20, 1);
(7, 'Dexametasona ', 18, 3, 2.35, 8.65, 1, 20, 1);
(8, 'Furosemida ', 18, 3, 2.50, 8.80, 1, 20, 1);
(9, 'Diclofenaco ', 18, 3, 1.85, 8.15, 1, 20, 1);
(10, 'Montelukast ', 18, 3, 1.90, 8.20, 1, 20, 1);
(11, 'Atorvastatina ', 18, 3, 2.05, 8.35, 1, 20, 1);
(20, 'Levotiroxina ', 18, 3, 2.20, 8.50, 1, 20, 1);
(13, 'Lansoprazol ', 18, 3, 2.35, 8.65, 1, 20, 1);
(4, 'Ibuprofeno ', 18, 3, 1.90, 8.20, 1, 20, 1);
(15, 'Amoxicilina ', 18, 3, 2.05, 8.35, 1, 20, 1);
(1, 'Salbutamol ', 18, 3, 2.20, 8.50, 1, 20, 1);
(7, 'Hidroclorotiazida ', 18, 3, 2.35, 8.65, 1, 20, 1);
(8, 'Ondansetrón ', 18, 3, 2.50, 8.80, 1, 20, 1);
(9, 'Pantoprazol ', 18, 3, 1.85, 8.15, 1, 20, 1);
(10, 'Tramadol ', 5, 3, 1.99, 8.70, 1, 20, 1);
(11, 'Atorvastatina ', 13, 3, 1.99, 8.70, 1, 20, 1);
(12, 'Amlodipino ', 11, 3, 1.99, 8.70, 1, 20, 1);
(3, 'Fluoxetina ', 10, 3, 1.99, 8.70, 1, 20, 1);
(4, 'Amoxicilina/Ácido clavulánico ', 14, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Omeprazol ', 7, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Prednisona ', 12, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Diclofenaco ', 19, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Metformina ', 2, 3, 1.99, 8.70, 1, 20, 1);
(4, 'Ciprofloxacina ', 8, 3, 1.99, 8.70, 1, 20, 1);
(10, 'Lisinopril ', 1, 3, 1.99, 8.70, 1, 20, 1);
(11, 'Desloratadina ', 16, 3, 1.99, 8.70, 1, 20, 1);
(12, 'Rabeprazol ', 4, 3, 1.99, 8.70, 1, 20, 1);
(13, 'Sildenafil ', 6, 3, 1.99, 8.70, 1, 20, 1);
(14, 'Mometasona ', 9, 3, 1.99, 8.70, 1, 20, 1);
(15, 'Metronidazol ', 15, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Olanzapina ', 3, 3, 1.99, 8.70, 1, 20, 1);
(17, 'Levotiroxina ', 17, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Nebivolol ', 16, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Fexofenadina ', 13, 3, 1.99, 8.70, 1, 20, 1);
(20, 'Clobetasol ', 5, 3, 1.99, 8.70, 1, 20, 1);
(1, 'Diazepam ', 7, 3, 1.99, 8.70, 1, 20, 1);
(2, 'Sertralina ', 6, 3, 1.99, 8.70, 1, 20, 1);
(2, 'Amoxicilina ', 3, 3, 1.99, 8.70, 1, 20, 1);
(2, 'Tamsulosina ', 10, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Levocetirizina ', 14, 3, 1.99, 8.70, 1, 20, 1);
(4, 'Duloxetina ', 19, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Metoprolol ', 8, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Glibenclamida ', 16, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Enalapril ', 7, 3, 1.99, 8.70, 1, 20, 1);
(10, 'Sertralina ', 9, 3, 1.99, 8.70, 1, 20, 1);
(11, 'Paracetamol ', 11, 3, 1.99, 8.70, 1, 20, 1);
(12, 'Azitromicina ', 12, 3, 1.99, 8.70, 1, 20, 1);
(3, 'Rosuvastatina ', 19, 3, 1.99, 8.70, 1, 20, 1);
(2, 'Amlodipino ', 14, 3, 1.99, 8.70, 1, 20, 1);
(3, 'Pantoprazol ', 17, 3, 1.99, 8.70, 1, 20, 1);
(4, 'Fluconazol ', 15, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Metoprolol ', 16, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Budesonida ', 9, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Metoprolol ', 6, 3, 1.99, 8.70, 1, 20, 1);
(18, 'Amoxicilina/Ácido clavulánico ', 4, 3, 1.99, 8.70, 1, 20, 1);
(20, 'Lorazepam ', 3, 3, 1.99, 8.70, 1, 20, 1);
(10, 'Lansoprazol ', 7, 3, 1.99, 8.70, 1, 20, 1);
(11, 'Escitalopram ', 15, 3, 1.99, 8.70, 1, 20, 1);
(2, 'Montelukast ', 12, 3, 1.99, 8.70, 1, 20, 1);
(3, 'Hidroclorotiazida ', 19, 3, 1.99, 8.70, 1, 20, 1);
(14, 'Metformina ', 1, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Cetirizina ', 11, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Omeprazo ', 2, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Losartán ', 5, 3, 1.99, 8.70, 1, 20, 1);
(4, 'Sulfato ferros ', 16, 3, 1.99, 8.70, 1, 20, 1);
(4, 'Paroxetina ', 14, 3, 1.99, 8.70, 1, 20, 1);
(1, 'Diclofenaco ', 8, 3, 1.99, 8.70, 1, 20, 1);
(1, 'Clonazepam ', 10, 3, 1.99, 8.70, 1, 20, 1);
(2, 'Risperidona ', 13, 3, 1.99, 8.70, 1, 20, 1);
(3, 'Ciprofloxacina ', 17, 3, 1.99, 8.70, 1, 20, 1);
(4, 'Tramado ', 18, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Ibuprofeno ', 19, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Prednisona ', 1, 3, 1.99, 8.70, 1, 20, 1);
(4, 'Alprazolam ', 2, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Tamsulosina ', 5, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Levotiroxina ', 9, 3, 1.99, 8.70, 1, 20, 1);
(10, 'Metronidazol ', 4, 3, 1.99, 8.70, 1, 20, 1);
(1, 'Bupropion ', 17, 3, 1.99, 8.70, 1, 20, 1);
(2, 'Candesartán ', 7, 3, 1.99, 8.70, 1, 20, 1);
(13, 'Mirtazapina ', 12, 3, 1.99, 8.70, 1, 20, 1);
(14, 'Dexametasona ', 13, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Fenilefrina ', 10, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Furosemida ', 19, 3, 1.99, 8.70, 1, 20, 1);
(4, 'Codeína/Fosfato de Codeína ', 4, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Famotidina ', 6, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Paracetamol/Cafeína ', 8, 3, 1.99, 8.70, 1, 20, 1);
(4, 'Hidrocortisona ', 11, 3, 1.99, 8.70, 1, 20, 1);
(4, 'Metoprolol ', 15, 3, 1.99, 8.70, 1, 20, 1);
(2, 'Levodopa/Carbidopa ', 16, 3, 1.99, 8.70, 1, 20, 1);
(13, 'Venlafaxina ', 2, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Escitalopram ', 13, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Amoxicilina ', 7, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Naproxeno ', 5, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Acetazolamida ', 3, 3, 1.99, 8.70, 1, 20, 1);
(4, 'Fluoxetina ', 16, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Diclofenaco ', 6, 3, 1.99, 8.70, 1, 20, 1);
(4, 'Meloxicam ', 12, 3, 1.99, 8.70, 1, 20, 1);
(11, 'Ondansetrón ', 14, 3, 1.99, 8.70, 1, 20, 1);
(12, 'Paracetamol ', 9, 3, 1.99, 8.70, 1, 20, 1);
(3, 'Metformina ', 11, 3, 1.99, 8.70, 1, 20, 1);
(4, 'Levocetirizina ', 1, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Sertralina ', 14, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Ciprofloxacina ', 8, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Paroxetina ', 10, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Hidroclorotiazida ', 19, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Diazepam ', 18, 3, 1.99, 8.70, 1, 20, 1);
(10, 'Prednisona ', 6, 3, 1.99, 8.70, 1, 20, 1);
(11, 'Rabeprazol ', 11, 3, 1.99, 8.70, 1, 20, 1);
(12, 'Loratadina ', 7, 3, 1.99, 8.70, 1, 20, 1);
(3, 'Escitalopram ', 15, 3, 1.99, 8.70, 1, 20, 1);
(4, 'Metoprolol ', 10, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Metronidazol ', 6, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Amoxicilina ', 12, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Clonazepam ', 5, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Azitromicina ', 14, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Omeprazol ', 17, 3, 1.99, 8.70, 1, 20, 1);
(12, 'Diclofenaco ', 2, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Lansoprazol ', 3, 3, 1.99, 8.70, 1, 20, 1);
(12, 'Tramadol ', 16, 3, 1.99, 8.70, 1, 20, 1);
(13, 'Atenolol ', 4, 3, 1.99, 8.70, 1, 20, 1);
(4, 'Levotiroxina ', 13, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Montelukast ', 1, 3, 1.99, 8.70, 1, 20, 1);
(12, 'Paracetamol ', 9, 3, 1.99, 8.70, 1, 20, 1);
(20, 'Metformina ', 19, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Cetirizina ', 8, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Lorazepam ', 20, 3, 1.99, 8.70, 1, 20, 1);
(0, 'Fluconazol ', 1, 3, 1.99, 8.70, 1, 20, 1);
(1, 'Metoprolol ', 10, 3, 1.99, 8.70, 1, 20, 1);
(12, 'Hidroclorotiazida ', 6, 3, 1.99, 8.70, 1, 20, 1);
(13, 'Amoxicilina/Ácido clavulánico ', 19, 3, 1.99, 8.70, 1, 20, 1);
(14, 'Sildenafil ', 4, 3, 1.99, 8.70, 1, 20, 1);
(15, 'Risperidona ', 9, 3, 1.99, 8.70, 1, 20, 1);
(16, 'Budesonida ', 18, 3, 1.99, 8.70, 1, 20, 1);
(17, 'Pantoprazol ', 2, 3, 1.99, 8.70, 1, 20, 1);
(18, 'Ibuprofeno ', 11, 3, 1.99, 8.70, 1, 20, 1);
(19, 'Codeína/Fosfato de Codeína ', 10, 3, 1.99, 8.70, 1, 20, 1);
(20, 'Dexametasona ', 12, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Ciprofloxacina ', 16, 3, 1.99, 8.70, 1, 20, 1);
(2, 'Famotidina ', 14, 3, 1.99, 8.70, 1, 20, 1);
(3, 'Ondansetrón ', 18, 3, 1.99, 8.70, 1, 20, 1);
(4, 'Meloxicam ', 9, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Clonazepam ', 4, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Metronidazol ', 1, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Azitromicina ', 17, 3, 1.99, 8.70, 1, 20, 1);
(2, 'Bupropion ', 5, 3, 1.99, 8.70, 1, 20, 1);
(2, 'Rabeprazol ', 7, 3, 1.99, 8.70, 1, 20, 1);
(10, 'Loratadina ', 14, 3, 1.99, 8.70, 1, 20, 1);
(1, 'Gabapentina', 16, 3, 2.05, 8.90, 1, 20, 1);
(5, 'Metformina', 2, 3, 2.20, 8.95, 1, 20, 1);
(3, 'Cefalexina', 9, 3, 2.15, 8.90, 1, 20, 1);
(5, 'Simvastatina', 3, 3, 2.10, 8.85, 1, 20, 1);
(5, 'Cetirizina', 15, 3, 2.25, 8.95, 1, 20, 1);
(6, 'Paracetamol', 19, 3, 2.20, 8.90, 1, 20, 1);
(5, 'Prednisona', 3, 3, 2.15, 8.85, 1, 20, 1);
(8, 'Sertralina', 6, 3, 2.10, 8.80, 1, 20, 1);
(9, 'Amoxicilina', 13, 3, 2.25, 8.95, 1, 20, 1);
(5, 'Omeprazol', 13, 3, 2.20, 8.90, 1, 20, 1);
(1, 'Escitalopram', 5, 3, 2.15, 8.85, 1, 20, 1);
(2, 'Atorvastatina', 11, 3, 2.10, 8.80, 1, 20, 1);
(3, 'Tramadol', 17, 3, 2.25, 8.95, 1, 20, 1);
(4, 'Ibuprofeno', 3, 3, 2.20, 8.90, 1, 20, 1);
(5, 'Alprazolam', 1, 3, 2.15, 8.85, 1, 20, 1);
(6, 'Metoprolol', 11, 3, 2.10, 8.80, 1, 20, 1);
(7, 'Diclofenaco', 7, 3, 2.25, 8.95, 1, 20, 1);
(8, 'Lansoprazol', 9, 3, 2.20, 8.90, 1, 20, 1);
(5, 'Sulfametoxazol/Trimetoprim', 4, 3, 2.15, 8.85, 1, 20, 1);
(5, 'Levotiroxina', 7, 3, 2.10, 8.80, 1, 20, 1);
(1, 'Montelukast', 12, 3, 2.25, 8.95, 1, 20, 1);
(2, 'Risperidona', 7, 3, 2.20, 8.90, 1, 20, 1);
(3, 'Paroxetina', 1, 3, 2.15, 8.85, 1, 20, 1);
(4, 'Fluconazol', 16, 3, 2.10, 8.80, 1, 20, 1);
(5, 'Hidroclorotiazida', 4, 3, 2.25, 8.95, 1, 20, 1);
(6, 'Ciprofloxacina', 16, 3, 2.20, 8.90, 1, 20, 1);
(7, 'Pantoprazol', 14, 3, 2.15, 8.85, 1, 20, 1);
(8, 'Fenilefrinaa', 4, 3, 2.10, 8.80, 1, 20, 1);
(9, 'Loratadina', 4, 3, 2.25, 8.95, 1, 20, 1);
(10, 'Meloxicam', 6, 3, 2.20, 8.90, 1, 20, 1);
(1, 'Metronidazol', 10, 3, 2.15, 8.85, 1, 20, 1);
(2, 'Dexametasona', 16, 3, 2.10, 8.80, 1, 20, 1);
(3, 'Azitromicina', 2, 3, 2.25, 8.95, 1, 20, 1);
(4, 'Furosemida', 10, 3, 2.20, 8.90, 1, 20, 1);
(6, 'Clonazepam', 3, 3, 2.15, 8.85, 1, 20, 1);
(5, 'Codeína/Fosfato de Codeína ', 3, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Diclofenaco ', 10, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Levodopa/Carbidopa ', 14, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Famotidina ', 14, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Budesonida ', 13, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Paracetamol ', 1, 3, 1.99, 8.70, 1, 20, 1);
(2, 'Metformina ', 3, 3, 1.99, 8.70, 1, 20, 1);
(3, 'Ondansetrón ', 12, 3, 1.99, 8.70, 1, 20, 1);
(4, 'Escitalopram ', 8, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Hidrocortisona ', 1, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Fluoxetina ', 2, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Metoprolol ', 4, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Rabeprazol ', 3, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Naproxeno ', 14, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Amoxicilina ', 6, 3, 1.99, 8.70, 1, 20, 1);
(1, 'Cetirizina ', 6, 3, 1.99, 8.70, 1, 20, 1);
(2, 'Losartán ', 5, 3, 1.99, 8.70, 1, 20, 1);
(3, 'Levotiroxina ', 5, 3, 1.99, 8.70, 1, 20, 1);
(4, 'Pantoprazol ', 13, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Paroxetina ', 8, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Dexametasona ', 15, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Metronidazol ', 1, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Montelukast ', 12, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Clonazepam ', 10, 3, 1.99, 8.70, 1, 20, 1);
(10, 'Risperidona ', 2, 3, 1.99, 8.70, 1, 20, 1);
(11, 'Codeína ', 7, 3, 1.99, 8.70, 1, 20, 1);
(2, 'Famotidina ', 17, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Tramadol ', 1, 3, 1.99, 8.70, 1, 20, 1);
(4, 'Ondansetrón ', 7, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Diclofenaco ', 10, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Escitalopram ', 9, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Budesonida ', 12, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Lansoprazol ', 9, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Metformina ', 11, 3, 1.99, 8.70, 1, 20, 1);
(20, 'Ibuprofeno ', 12, 3, 1.99, 8.70, 1, 20, 1);
(11, 'Meloxicam ', 14, 3, 1.99, 8.70, 1, 20, 1);
(12, 'Dexametasona colirio ', 7, 3, 1.99, 8.70, 1, 20, 1);
(13, 'Ciprofloxacina ', 11, 3, 1.99, 8.70, 1, 20, 1);
(14, 'Levotiroxina ', 3, 3, 1.99, 8.70, 1, 20, 1);
(15, 'Venlafaxina ', 2, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Sildenafil ', 1, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Metoprolol ', 5, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Tramadol Forte ', 13, 3, 1.99, 8.70, 1, 20, 1);
(0, 'Hidroclorotiazida oral ', 6, 3, 1.99, 8.70, 1, 20, 1);
(1, 'Paracetamo ', 8, 3, 1.99, 8.70, 1, 20, 1);
(2, 'Diclofenaco ', 3, 3, 1.99, 8.70, 1, 20, 1);
(13, 'Rabeprazol ', 9, 3, 1.99, 8.70, 1, 20, 1);
(14, 'Jarabe Codeína/Fosfato de Codeína ', 16, 3, 1.99, 8.70, 1, 20, 1);
(15, 'Lansoprazol ', 8, 3, 1.99, 8.70, 1, 20, 1);
(16, 'Naproxeno ', 9, 3, 1.99, 8.70, 1, 20, 1);
(17, 'Loratadina ', 1, 3, 1.99, 8.70, 1, 20, 1);
(18, 'Metronidazol ', 7, 3, 1.99, 8.70, 1, 20, 1);
(19, 'Levotiroxina ', 17, 3, 1.99, 8.70, 1, 20, 1);
(20, 'Cetirizina ', 15, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Paracetamol ', 19, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Famotidina ', 10, 3, 1.99, 8.70, 1, 20, 1);
(3, 'Ondansetrón ', 4, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Meloxicam ', 2, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Azitromicina ', 7, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Rabeprazol ', 14, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Amlodipino ', 11, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Clonazepam ', 2, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Duloxetina ', 5, 3, 1.99, 8.70, 1, 20, 1);
(12, 'Escitalopram ', 13, 3, 1.99, 8.70, 1, 20, 1);
(20, 'Gabapentina ', 8, 3, 1.99, 8.70, 1, 20, 1);
(12, 'Hidroclorotiazida ', 6, 3, 1.99, 8.70, 1, 20, 1);
(13, 'Levotiroxina ', 9, 3, 1.99, 8.70, 1, 20, 1);
(4, 'Metoprolol ', 4, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Montelukast ', 16, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Omeprazol ', 17, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Paracetamol ', 3, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Prednisona ', 7, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Sertralina ', 6, 3, 1.99, 8.70, 1, 20, 1);
(10, 'Tamsulosina ', 11, 3, 1.99, 8.70, 1, 20, 1);
(11, 'Venlafaxina ', 14, 3, 1.99, 8.70, 1, 20, 1);
(2, 'Amoxicilina ', 19, 3, 1.99, 8.70, 1, 20, 1);
(4, 'Cetirizina ', 9, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Diclofenaco ', 6, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Fluoxetina ', 2, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Ibuprofeno ', 5, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Lorazepam ', 17, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Metformina ', 19, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Metronidazol ', 13, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Pantoprazol ', 12, 3, 1.99, 8.70, 1, 20, 1);
(1, 'Risperidona ', 13, 3, 1.99, 8.70, 1, 20, 1);
(12, 'Sildenafil ', 9, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Tramadol ', 16, 3, 1.99, 8.70, 1, 20, 1);
(12, 'Azitromicina ', 12, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Clonazepam ', 6, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Dexametasona ', 17, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Fenilefrina ', 1, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Lansoprazol ', 14, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Losartán ', 9, 3, 1.99, 8.70, 1, 20, 1);
(20, 'Meloxicam ', 7, 3, 1.99, 8.70, 1, 20, 1);
(11, 'Naproxeno ', 2, 3, 1.99, 8.70, 1, 20, 1);
(12, 'Ondansetrón ', 5, 3, 1.99, 8.70, 1, 20, 1);
(13, 'Paroxetina ', 3, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Rabeprazol ', 15, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Amoxicilina ', 12, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Cetirizina ', 7, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Duloxetina ', 11, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Escitalopram ', 9, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Gabapentina ', 16, 3, 1.99, 8.70, 1, 20, 1);
(20, 'Hidroclorotiazida ', 19, 3, 1.99, 8.70, 1, 20, 1);
(11, 'Levotiroxina ', 14, 3, 1.99, 8.70, 1, 20, 1);
(12, 'Metoprolol ', 6, 3, 1.99, 8.70, 1, 20, 1);
(13, 'Montelukast ', 9, 3, 1.99, 8.70, 1, 20, 1);
(14, 'Omeprazol ', 8, 3, 1.99, 8.70, 1, 20, 1);
(15, 'Paracetamol ', 17, 3, 1.99, 8.70, 1, 20, 1);
(16, 'Prednisona ', 7, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Sertralina ', 15, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Tamsulosina ', 13, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Venlafaxina ', 4, 3, 1.99, 8.70, 1, 20, 1);
(10, 'Amlodipino ', 11, 3, 1.99, 8.70, 1, 20, 1);
(11, 'Clonazepam ', 5, 3, 1.99, 8.70, 1, 20, 1);
(12, 'Duloxetina ', 10, 3, 1.99, 8.70, 1, 20, 1);
(13, 'Escitalopram ', 14, 3, 1.99, 8.70, 1, 20, 1);
(14, 'Gabapentina ', 18, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Hidroclorotiazida ', 2, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Levotiroxina ', 10, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Montelukast Masticable ', 17, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Omeprazol ', 6, 3, 1.99, 8.70, 1, 20, 1);
(2, 'Prednisona ', 7, 3, 1.99, 8.70, 1, 20, 1);
(1, 'Sertralina recubierta ', 3, 3, 1.99, 8.70, 1, 20, 1);
(1, 'Tamsulosina ', 4, 3, 1.99, 8.70, 1, 20, 1);
(2, 'Venlafaxina ', 1, 3, 1.99, 8.70, 1, 20, 1);
(3, 'Amoxicilina Polvo ', 10, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Cetirizina ', 19, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Duloxetina ', 16, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Escitalopram ', 13, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Amlodipino ', 17, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Clonazepam ', 6, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Duloxetina ', 1, 3, 1.99, 8.70, 1, 20, 1);
(20, 'Levotiroxina ', 13, 3, 1.99, 8.70, 1, 20, 1);
(11, 'Metoprolol ', 5, 3, 1.99, 8.70, 1, 20, 1);
(2, 'Montelukast ', 7, 3, 1.99, 8.70, 1, 20, 1);
(3, 'Omeprazol ', 6, 3, 1.99, 8.70, 1, 20, 1);
(4, 'Prednisona ', 8, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Sertralina ', 7, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Tamsulosina ', 6, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Venlafaxina ', 4, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Amlodipino ', 14, 3, 1.99, 8.70, 1, 20, 1);
(10, 'Clonazepam ', 2, 3, 1.99, 8.70, 1, 20, 1);
(11, 'Atorvastatina ', 1, 3, 1.99, 8.70, 1, 20, 1);
(12, 'Bupropion ', 9, 3, 1.99, 8.70, 1, 20, 1);
(13, 'Carvedilol ', 3, 3, 1.99, 8.70, 1, 20, 1);
(14, 'Clobazam ', 17, 3, 1.99, 8.70, 1, 20, 1);
(15, 'Clopidogrel ', 7, 3, 1.99, 8.70, 1, 20, 1);
(16, 'Desloratadina ', 3, 3, 1.99, 8.70, 1, 20, 1);
(17, 'Diazepam ', 1, 3, 1.99, 8.70, 1, 20, 1);
(18, 'Donepezilo ', 6, 3, 1.99, 8.70, 1, 20, 1);
(19, 'Enalapril ', 9, 3, 1.99, 8.70, 1, 20, 1);
(20, 'Escitalopram ', 9, 3, 1.99, 8.70, 1, 20, 1);
(21, 'Esomeprazol ', 13, 3, 1.99, 8.70, 1, 20, 1);
(2, 'Fenitoína ', 2, 3, 1.99, 8.70, 1, 20, 1);
(3, 'Fexofenadina ', 8, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Fluticasona ', 16, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Glibenclamida ', 4, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Haloperidol ', 12, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Irbesartán ', 15, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Lamotrigina ', 7, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Levetiracetam ', 11, 3, 1.99, 8.70, 1, 20, 1);
(10, 'Lisinopril ', 12, 3, 1.99, 8.70, 1, 20, 1);
(11, 'Lorazepam ', 14, 3, 1.99, 8.70, 1, 20, 1);
(12, 'Losartán ', 5, 3, 1.99, 8.70, 1, 20, 1);
(3, 'Memantina ', 4, 3, 1.99, 8.70, 1, 20, 1);
(4, 'Metoclopramida ', 9, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Metronidazol ', 13, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Nebivolol ', 15, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Nitroglicerina ', 4, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Olmesartán ', 3, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Paroxetina ', 5, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Pioglitazona ', 2, 3, 1.99, 8.70, 1, 20, 1);
(1, 'Pregabalina ', 5, 3, 1.99, 8.70, 1, 20, 1);
(2, 'Quetiapina ', 4, 3, 1.99, 8.70, 1, 20, 1);
(3, 'Ramipril ', 16, 3, 1.99, 8.70, 1, 20, 1);
(4, 'Ranitidina ', 19, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Risedronato ', 5, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Rosuvastatina ', 6, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Sertralina ', 1, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Simvastatina ', 2, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Sitagliptina ', 5, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Tadalafil ', 7, 3, 1.99, 8.70, 1, 20, 1);
(1, 'Topiramato ', 15, 3, 1.99, 8.70, 1, 20, 1);
(2, 'Tramadol ', 10, 3, 1.99, 8.70, 1, 20, 1);
(3, 'Valsartán ', 8, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Venlafaxina ', 4, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Alprazolam ', 11, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Aripiprazol ', 16, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Azitromicina ', 3, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Budesonida ', 11, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Candesartán ', 12, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Ciprofloxacina', 9, 3, 1.99, 8.70, 1, 20, 1);
(1, 'Clindamicina', 18, 3, 1.99, 8.70, 1, 20, 1);
(2, 'Clozapina', 18, 3, 1.99, 8.70, 1, 20, 1);
(3, 'Dapoxetina', 18, 3, 1.99, 8.70, 1, 20, 1);
(4, 'Diltiazem', 18, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Donepezilo', 18, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Enoxaparina', 18, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Escitalopram', 18, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Esomeprazol', 18, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Fentanilo', 18, 3, 1.99, 8.70, 1, 20, 1);
(0, 'Fluticasona', 18, 3, 1.99, 8.70, 1, 20, 1);
(1, 'Gliclazida', 18, 3, 1.99, 8.70, 1, 20, 1);
(2, 'Haloperidol', 18, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Ibuprofeno ', 18, 3, 1.99, 8.70, 1, 20, 1);
(4, 'Insulina glargina', 18, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Ipratropio', 18, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Ketorolaco', 18, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Lacosamida', 18, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Lansoprazol', 18, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Levocetirizina', 18, 3, 1.99, 8.70, 1, 20, 1);
(1, 'Levodopa', 18, 3, 1.99, 8.70, 1, 20, 1);
(1, 'Lorazepam', 18, 3, 1.99, 8.70, 1, 20, 1);
(2, 'Losartán', 18, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Metformina', 18, 3, 1.99, 8.70, 1, 20, 1);
(4, 'Mometasona', 18, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Montelukast', 18, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Nifedipino', 18, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Olanzapina', 18, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Oxcarbazepina', 18, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Pantoprazol', 18, 3, 1.99, 8.70, 1, 20, 1);
(20, 'Paracetamol', 18, 3, 1.99, 8.70, 1, 20, 1);
(1, 'Perindopril', 18, 3, 1.99, 8.70, 1, 20, 1);
(2, 'Piroxicam', 18, 3, 1.99, 8.70, 1, 20, 1);
(3, 'Pramipexol', 18, 3, 1.99, 8.70, 1, 20, 1);
(4, 'Quetiapina', 18, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Rabeprazol', 18, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Ramipril', 18, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Ranitidina', 18, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Risperidona', 18, 3, 1.99, 8.70, 1, 20, 1);
(9, 'Rosuvastatina', 18, 3, 2.15, 8.90, 1, 20, 1);
(20, 'Sildenafil', 18, 3, 2.05, 8.80, 1, 20, 1);
(11, 'Sotalol', 18, 3, 2.10, 8.85, 1, 20, 1);
(12, 'Succinato de solifenacina', 18, 3, 1.95, 8.75, 1, 20, 1);
(3, 'Telmisartán', 18, 3, 2.20, 8.95, 1, 20, 1);
(4, 'Tetraciclina', 18, 3, 2.30, 9.00, 1, 20, 1);
(5, 'Tolterodina', 18, 3, 2.25, 8.95, 1, 20, 1);
(8, 'Topiramato', 18, 3, 2.05, 8.80, 1, 20, 1);
(7, 'Tramadol', 18, 3, 2.10, 8.85, 1, 20, 1);
(8, 'Valsartán', 18, 3, 2.15, 8.90, 1, 20, 1);
(8, 'Venlafaxina', 18, 3, 2.20, 8.95, 1, 20, 1);
(10, 'Acetazolamida', 18, 3, 2.05, 8.80, 1, 20, 1);
(11, 'Alendronato', 18, 3, 1.95, 8.75, 1, 20, 1);
(12, 'Amantadina', 18, 3, 2.25, 8.95, 1, 20, 1);
(13, 'Anastrozol', 18, 3, 2.30, 9.00, 1, 20, 1);
(14, 'Aripiprazol', 18, 3, 2.15, 8.90, 1, 20, 1);
(15, 'Aspirina', 18, 3, 2.10, 8.85, 1, 20, 1);
(16, 'Azitromicina', 18, 3, 2.25, 8.95, 1, 20, 1);
(17, 'Bicalutamida', 18, 3, 2.20, 8.90, 1, 20, 1);
(18, 'Budesonida', 18, 3, 2.05, 8.80, 1, 20, 1);
(19, 'Calcitriol', 18, 3, 1.95, 8.75, 1, 20, 1);
(20, 'Candesartán', 18, 3, 2.30, 9.00, 1, 20, 1);
(13, 'Ceftriaxona', 18, 3, 2.25, 8.95, 1, 20, 1);
(12, 'Celecoxib', 18, 3, 2.15, 8.90, 1, 20, 1);
(3, 'Ciprofloxacina', 18, 3, 2.10, 8.85, 1, 20, 1);
(4, 'Clindamicina', 18, 3, 2.05, 8.80, 1, 20, 1);
(5, 'Clonidina', 18, 3, 1.95, 8.75, 1, 20, 1);
(6, 'Darunavir', 18, 3, 2.30, 9.00, 1, 20, 1);
(17, 'Diclofenaco', 18, 3, 2.25, 8.95, 1, 20, 1);
(18, 'Dutasterida', 18, 3, 2.20, 8.90, 1, 20, 1);
(19, 'Enoxaparina', 18, 3, 2.15, 8.85, 1, 20, 1);
(3, 'Escitalopram', 18, 3, 2.05, 8.80, 1, 20, 1);
(1, 'Esomeprazol', 18, 3, 1.95, 8.75, 1, 20, 1);
(2, 'Exenatida', 18, 3, 1.99, 8.70, 1, 20, 1);
(3, 'Fentanilo', 18, 3, 1.99, 8.70, 1, 20, 1);
(4, 'Finasterida', 18, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Fluconazol', 18, 3, 1.99, 8.70, 1, 20, 1);
(6, 'Fluticasona', 18, 3, 1.99, 8.70, 1, 20, 1);
(7, 'Furosemida', 18, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Gemfibrozil', 18, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Gliclazida', 18, 3, 1.99, 8.70, 1, 20, 1);
(10, 'Haloperido', 18, 3, 1.99, 8.70, 1, 20, 1);
(11, 'Hidroclorotiazida', 18, 3, 2.35, 9.80, 1, 20, 1);
(12, 'Ibandronato', 18, 3, 3.10, 7.50, 1, 20, 1);
(8, 'Imipramina', 18, 3, 1.80, 10.50, 1, 20, 1);
(4, 'Indometacina', 18, 3, 2.50, 8.90, 1, 20, 1);
(5, 'Ipratropio', 18, 3, 2.70, 9.20, 1, 20, 1);
(6, 'Ketorolaco', 18, 3, 1.95, 8.40, 1, 20, 1);
(4, 'Lamotrigina', 18, 3, 2.80, 7.90, 1, 20, 1);
(8, 'Lansoprazol', 18, 3, 2.10, 8.70, 1, 20, 1);
(9, 'Levocetirizina', 18, 3, 3.50, 6.80, 1, 20, 1);
(20, 'Levodopa', 18, 3, 2.90, 9.40, 1, 20, 1);
(19, 'Levotiroxina', 18, 3, 3.20, 7.70, 1, 20, 1);
(2, 'Lidocaína', 18, 3, 2.70, 9.30, 1, 20, 1);
(13, 'Lisinopril', 18, 3, 2.20, 8.60, 1, 20, 1);
(4, 'Loperamida', 18, 3, 2.60, 8.80, 1, 20, 1);
(15, 'Losartán', 18, 3, 3.10, 7.60, 1, 20, 1);
(16, 'Mebeverina', 18, 3, 2.90, 9.40, 1, 20, 1);
(17, 'Medroxiprogesterona', 18, 3, 3.40, 7.90, 1, 20, 1);
(8, 'Meloxicam', 18, 3, 2.50, 9.10, 1, 20, 1);
(9, 'Metformina', 18, 3, 2.80, 9.30, 1, 20, 1);
(10, 'Metoclopramida', 18, 3, 2.75, 9.20, 1, 20, 1);
(11, 'Metronidazo', 18, 3, 2.95, 9.40, 1, 20, 1);
(12, 'Nebivolol', 18, 3, 2.20, 8.60, 1, 20, 1);
(3, 'Nifedipino', 18, 3, 2.50, 9.10, 1, 20, 1);
(4, 'Nitroglicerina', 18, 3, 2.70, 9.20, 1, 20, 1);
(5, 'Olanzapina', 18, 3, 3.10, 7.60, 1, 20, 1);
(6, 'Oxcarbazepina', 18, 3, 1.85, 10.50, 1, 20, 1);
(7, 'Pantoprazol', 18, 3, 2.20, 8.70, 1, 20, 1);
(8, 'Paroxetina', 18, 3, 2.10, 8.60, 1, 20, 1);
(9, 'Pioglitazona', 18, 3, 3.30, 7.80, 1, 20, 1);
(10, 'Pregabalina', 18, 3, 2.85, 9.30, 1, 20, 1);
(1, 'Quetiapina', 18, 3, 2.50, 9.10, 1, 20, 1);
(8, 'Ramipril', 18, 3, 1.95, 10.40, 1, 20, 1);
(3, 'Ranitidina', 18, 3, 2.40, 9.80, 1, 20, 1);
(4, 'Risedronato', 18, 3, 3.05, 7.50, 1, 20, 1);
(8, 'Rivaroxaban', 18, 3, 2.20, 8.70, 1, 20, 1);
(6, 'Rosuvastatina', 18, 3, 2.75, 9.20, 1, 20, 1);
(7, 'Salmeterol', 18, 3, 3.20, 7.70, 1, 20, 1);
(5, 'Sertralina', 18, 3, 2.80, 7.90, 1, 20, 1);
(9, 'Sildenafil', 18, 3, 3.30, 7.80, 1, 20, 1);
(20, 'Sitagliptina', 18, 3, 2.85, 9.30, 1, 20, 1);
(11, 'Sucralfato', 18, 3, 1.99, 8.70, 1, 20, 1);
(12, 'Tacrolimus', 18, 3, 1.99, 8.70, 1, 20, 1);
(16, 'Telmisartán', 18, 3, 1.99, 8.70, 1, 20, 1);
(14, 'Tetraciclina', 18, 3, 1.99, 8.70, 1, 20, 1);
(5, 'Tiotropio', 18, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Tolbutamida', 18, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Topiramato', 18, 3, 1.99, 8.70, 1, 20, 1);
(8, 'Tramadol ', 18, 3, 1.99, 8.70, 1, 20, 1);
(19, 'Valsartán', 18, 3, 3.50, 9.80, 1, 20, 1);
(20, 'Vardenafil', 18, 3, 2.80, 8.90, 1, 20, 1);
(11, 'Venlafaxina', 18, 3, 2.20, 8.50, 1, 20, 1);
(2, 'Verapamilo', 18, 3, 2.90, 8.30, 1, 20, 1);
(3, 'Zolmitriptan', 18, 3, 2.40, 8.80, 1, 20, 1);
(4, 'Acetaminofén', 18, 3, 1.80, 7.60, 1, 20, 1);
(9, 'Alprazolam', 18, 3, 2.50, 8.90, 1, 20, 1);
(6, 'Amiodarona', 18, 3, 2.70, 9.10, 1, 20, 1);
(7, 'Anastrozol', 18, 3, 2.20, 8.50, 1, 20, 1);
(8, 'Aripiprazol', 18, 3, 2.60, 9.00, 1, 20, 1);
(9, 'Atorvastatina', 18, 3, 2.90, 9.30, 1, 20, 1);
(10, 'Bimatoprost', 18, 3, 2.30, 8.60, 1, 20, 1);
(12, 'Budesonida ', 18, 3, 3.10, 9.40, 1, 20, 1);
(20, 'Calcio', 18, 3, 2.80, 8.90, 1, 20, 1);
(13, 'Carvedilol ', 18, 3, 3.00, 9.30, 1, 20, 1);
(14, 'Cefalexina', 18, 3, 2.60, 8.90, 1, 20, 1);
(15, 'Citalopram', 18, 3, 2.80, 8.90, 1, 20, 1);
(9, 'Clonazepam', 18, 3, 2.50, 8.90, 1, 20, 1);
(7, 'Codeína', 18, 3, 2.90, 9.20, 1, 20, 1);
(8, 'Desvenlafaxina', 18, 3, 2.80, 9.10, 1, 20, 1);
(9, 'Diclofenaco', 18, 3, 2.60, 8.90, 1, 20, 1);
(10, 'Acetazolamida', 18, 3, 2.50, 8.80, 1, 20, 1);
(11, 'Bimatoprost', 18, 3, 2.60, 8.90, 1, 20, 1);
(12, 'Budesonida spray', 18, 3, 3.20, 9.50, 1, 20, 1);
(13, 'Carvedilol', 18, 3, 2.80, 9.10, 1, 20, 1);
(14, 'Ceftriaxona Polvo', 18, 3, 3.10, 9.40, 1, 20, 1);
(15, 'Ciprofloxacina', 18, 3, 2.90, 9.20, 1, 20, 1);
(16, 'Clindamicina', 18, 3, 2.70, 9.00, 1, 20, 1);
(17, 'Clonidina', 18, 3, 2.40, 8.80, 1, 20, 1);
(8, 'Bismutol', 18, 3, 2.90, 9.20, 1, 20, 1);
(19, 'Dutasterida', 18, 3, 3.50, 9.80, 1, 20, 1);
(20, 'Enoxaparina', 18, 3, 2.80, 8.90, 1, 20, 1);
(1, 'Escitalopram', 18, 3, 2.40, 8.80, 1, 20, 1);
(9, 'Esomeprazol', 18, 3, 2.50, 8.90, 1, 20, 1);
(3, 'Exenatida', 18, 3, 2.10, 8.40, 1, 20, 1);
(4, 'Fentanilo', 18, 3, 1.90, 7.70, 1, 20, 1);
(9, 'Finasterida', 18, 3, 2.60, 8.90, 1, 20, 1);
(9, 'Fluconazol', 18, 3, 2.50, 8.90, 1, 20, 1);
(7, 'Fluticasona', 18, 3, 2.90, 9.20, 1, 20, 1);
(8, 'Furosemida', 18, 3, 2.80, 9.10, 1, 20, 1);
(9, 'Gemfibrozil', 18, 3, 3.10, 9.40, 1, 20, 1);
(3, 'Gliclazida', 18, 3, 2.50, 8.90, 1, 20, 1);
(1, 'Haloperidol', 18, 3, 1.90, 7.70, 1, 20, 1);
(2, 'Hidroclorotiazida', 18, 3, 2.20, 8.50, 1, 20, 1);
(3, 'Ibandronato', 18, 3, 2.80, 9.10, 1, 20, 1);
(9, 'Imipramina', 18, 3, 2.70, 9.00, 1, 20, 1);
(9, 'Indometacina', 18, 3, 2.70, 9.00, 1, 20, 1);
(6, 'Ipratropio', 18, 3, 2.90, 9.20, 1, 20, 1);
(7, 'Ketorolaco', 18, 3, 2.80, 9.10, 1, 20, 1);
(9, 'Lamotrigina', 18, 3, 3.00, 9.30, 1, 20, 1);
(3, 'Lansoprazol', 18, 3, 2.20, 8.50, 1, 20, 1);
(10, 'Levocetirizina', 18, 3, 2.60, 8.90, 1, 20, 1);
(11, 'Levodopa', 18, 3, 2.70, 9.00, 1, 20, 1);
(12, 'Levotiroxina', 18, 3, 2.80, 9.10, 1, 20, 1);
(13, 'Lisinopril', 18, 3, 2.80, 9.10, 1, 20, 1);
(4, 'Mebeverina', 18, 3, 2.50, 8.90, 1, 20, 1);
(9, 'Medroxiprogesterona', 18, 3, 3.00, 9.30, 1, 20, 1);
(6, 'Nebivolol', 18, 3, 2.10, 8.40, 1, 20, 1);
(7, 'Nifedipino', 18, 3, 2.20, 8.50, 1, 20, 1);
(8, 'Olanzapina', 18, 3, 2.30, 8.60, 1, 20, 1);
(9, 'Omeprazol', 18, 3, 2.40, 8.80, 1, 20, 1);
(10, 'Paracetamol', 18, 3, 2.40, 8.80, 1, 20, 1);
(12, 'Piroxicam', 18, 3, 2.60, 8.90, 1, 20, 1);
(13, 'Prednisona', 18, 3, 2.80, 9.10, 1, 20, 1);
(14, 'Pregabalina', 18, 3, 2.80, 9.10, 1, 20, 1);
(15, 'Propranolol', 18, 3, 2.80, 9.10, 1, 20, 1);
(16, 'Rabeprazol', 18, 3, 2.80, 9.10, 1, 20, 1);
(17, 'Risperidona', 18, 3, 2.90, 9.20, 1, 20, 1);
(18, 'Rosuvastatina', 18, 3, 3.10, 9.40, 1, 20, 1);
(9, 'Sertralina', 18, 3, 2.50, 8.90, 1, 20, 1);
(9, 'Sildenafil', 18, 3, 2.50, 8.90, 1, 20, 1);
(3, 'Tadalafil', 18, 3, 2.10, 8.40, 1, 20, 1);
(4, 'Tamsulosina', 18, 3, 2.20, 8.50, 1, 20, 1);
(9, 'Tiocolchicosido', 18, 3, 2.70, 9.00, 1, 20, 1);
(6, 'Tramadol', 18, 3, 2.50, 8.90, 1, 20, 1);
(7, 'Trazodona', 18, 3, 2.40, 8.80, 1, 20, 1);
(8, 'Valsartán', 18, 3, 2.60, 9.00, 1, 20, 1);
(9, 'Vardenafil', 18, 3, 2.50, 8.90, 1, 20, 1);
(10, 'Venlafaxina', 18, 3, 2.60, 8.90, 1, 20, 1);
(11, 'Verapamilo', 18, 3, 2.80, 9.10, 1, 20, 1);
(12, 'Warfarina', 18, 3, 2.80, 9.10, 1, 20, 1);
(13, 'Zolpidem', 18, 3, 2.70, 9.00, 1, 20, 1);
(14, 'Zopiclona', 18, 3, 2.90, 9.20, 1, 20, 1);
(15, 'Ondansetron', 18, 3, 2.80, 9.10, 1, 20, 1);
(16, 'Amitriptilina', 18, 3, 2.70, 9.00, 1, 20, 1);
(17, 'Fenitoína', 18, 3, 2.90, 9.20, 1, 20, 1);
(18, 'Topiramato', 18, 3, 2.70, 9.00, 1, 20, 1);
(19, 'Levetiracetam', 18, 3, 3.10, 9.40, 1, 20, 1);
(20, 'Clobazam', 18, 3, 2.80, 9.10, 1, 20, 1);
(1, 'Lacosamida', 18, 3, 2.90, 9.20, 1, 20, 1);
(2, 'Lamotrigina', 18, 3, 2.80, 9.10, 1, 20, 1);
(3, 'Pregabalina', 18, 3, 2.90, 9.20, 1, 20, 1);
(4, 'Risperidona', 18, 3, 2.90, 9.20, 1, 20, 1);
(5, 'Gabapentina', 18, 3, 2.90, 9.20, 1, 20, 1);
(6, 'Valproato', 18, 3, 2.90, 9.20, 1, 20, 1);
(7, 'Clobazam', 18, 3, 2.90, 9.20, 1, 20, 1);
(8, 'Zonisamida', 18, 3, 2.90, 9.20, 1, 20, 1);
(9, 'Oxcarbazepina', 18, 3, 2.90, 9.20, 1, 20, 1);
(10, 'Eslicarbazepina', 18, 3, 2.90, 9.20, 1, 20, 1);
(11, 'Fosfenitoína', 18, 3, 2.90, 9.20, 1, 20, 1);
(12, 'Carbamazepina', 18, 3, 2.90, 9.20, 1, 20, 1);
(13, 'Levetiracetam', 18, 3, 2.90, 9.20, 1, 20, 1);
(14, 'Perampanel', 18, 3, 2.90, 9.20, 1, 20, 1);
(15, 'Lamotrigina', 18, 3, 2.90, 9.20, 1, 20, 1);
(16, 'Oxcarbazepina', 18, 3, 2.90, 9.20, 1, 20, 1);
(17, 'Valproato', 18, 3, 2.90, 9.20, 1, 20, 1);
(18, 'Clonazepam', 18, 3, 2.90, 9.20, 1, 20, 1);
(19, 'Rufinamida', 18, 3, 2.90, 9.20, 1, 20, 1);
(20, 'Bumetanida', 18, 3, 2.90, 9.20, 1, 20, 1);
(2, 'Pantoprazol', 18, 3, 3.25, 9.80, 1, 20, 1);
(3, 'Paroxetina', 18, 3, 2.50, 7.90, 1, 20, 1);
(4, 'yeso', 18, 3, 1.70, 8.10, 1, 20, 1);
(5, 'Pioglitazona', 18, 3, 2.80, 8.50, 1, 20, 1);
(6, 'Pregabalina', 18, 3, 2.10, 7.60, 1, 20, 1);
(7, 'Quetiapina', 18, 3, 3.40, 9.20, 1, 20, 1);
(9, 'Rosuvastatina', 18, 3, 2.90, 8.80, 1, 20, 1);
(9, 'Salmeterol', 18, 3, 3.70, 9.50, 1, 20, 1);
(10, 'Sertralina', 18, 3, 2.60, 8.40, 1, 20, 1);
(11, 'Sildenafil', 18, 3, 2.80, 8.60, 1, 20, 1);
(9, 'Sitagliptina', 18, 3, 2.20, 7.80, 1, 20, 1);
(19, 'Sucralfato', 18, 3, 2.40, 8.30, 1, 20, 1);
(2, 'Tacrolimus', 18, 3, 1.80, 7.40, 1, 20, 1);
(5, 'Telmisartán', 18, 3, 3.10, 9.00, 1, 20, 1);
(6, 'Tetraciclina', 18, 3, 2.50, 7.70, 1, 20, 1);
(7, 'Tiotropio', 18, 3, 3.60, 9.10, 1, 20, 1);
(9, 'Tolbutamida', 18, 3, 2.30, 7.90, 1, 20, 1);
(9, 'Topiramato', 18, 3, 3.20, 8.50, 1, 20, 1);
(9, 'Tramadol', 18, 3, 2.70, 8.20, 1, 20, 1);
(11, 'Vardenafil', 18, 3, 3.50, 9.00, 1, 20, 1);
(12, 'Venlafaxina', 18, 3, 3.80, 9.30, 1, 20, 1);
(13, 'Verapamilo', 18, 3, 2.90, 8.80, 1, 20, 1);
(4, 'Zolmitriptan', 18, 3, 2.20, 7.70, 1, 20, 1);
(5, 'Acetaminofén', 18, 3, 1.70, 8.10, 1, 20, 1);
(9, 'Amiodarona ', 18, 3, 3.30, 8.60, 1, 20, 1);
(7, 'Alprazolam', 18, 3, 3.40, 8.70, 1, 20, 1);
(8, 'Anastrozol', 18, 3, 1.90, 7.50, 1, 20, 1);
(9, 'Aripiprazol', 18, 3, 2.50, 7.90, 1, 20, 1);
(10, 'Atorvastatina', 18, 3, 2.80, 8.40, 1, 20, 1);
(11, 'Budesonida Soluble', 18, 3, 2.20, 7.70, 1, 20, 1);
(20, 'Calcio', 18, 3, 2.80, 8.40, 1, 20, 1);
(3, 'Carvedilol', 18, 3, 2.60, 8.20, 1, 20, 1);
(8, 'Cefalexina', 18, 3, 1.80, 7.40, 1, 20, 1);
(5, 'Citalopram', 18, 3, 2.30, 7.90, 1, 20, 1);
(8, 'Clonazepam', 18, 3, 3.20, 8.50, 1, 20, 1);
(7, 'Codeína masticable', 18, 3, 3.60, 9.10, 1, 20, 1);
(9, 'Desvenlafaxina', 18, 3, 2.40, 8.00, 1, 20, 1);
(9, 'Diclofenaco', 18, 3, 2.50, 7.90, 1, 20, 1);
(10, 'Donepezilo', 18, 3, 2.80, 8.40, 1, 20, 1);
(11, 'Dutasterida', 18, 3, 2.70, 8.30, 1, 20, 1);
(12, 'Enoxaparina', 18, 3, 1.60, 7.20, 1, 20, 1);
(3, 'Escitalopram', 18, 3, 2.80, 8.40, 1, 20, 1);
(4, 'Esomeprazol ', 18, 3, 2.10, 7.60, 1, 20, 1);
(9, 'Ciprofloxacina', 18, 3, 2.50, 7.90, 1, 20, 1);
(6, 'Metadona', 18, 3, 3.00, 8.50, 1, 20, 1);
(7, 'Morfina', 18, 3, 2.70, 8.30, 1, 20, 1);
(9, 'Pregabalina', 18, 3, 3.10, 8.60, 1, 20, 1);
(19, 'Sulfadiazina de plata', 18, 3, 2.40, 7.90, 1, 20, 1);
(10, 'Nitrofurazona', 18, 3, 2.60, 8.20, 1, 20, 1);
(10, 'Gel de Aloe vera', 18, 3, 1.90, 7.50, 1, 20, 1);
(2, 'Pomada de Caléndula', 18, 3, 2.40, 7.90, 1, 20, 1);
(13, 'Bacitracina', 18, 3, 2.50, 7.90, 1, 20, 1);
(14, 'Pomada de Mupirocina ', 18, 3, 3.20, 8.70, 1, 20, 1);
(5, 'Lidocaína ', 18, 3, 2.10, 7.60, 1, 20, 1);
(6, 'Gel de Hidrogel ', 18, 3, 1.90, 7.50, 1, 20, 1);
(17, 'Crema de Dexpantenol ', 18, 3, 2.10, 7.60, 1, 20, 1);
(7, 'Pomada de Óxido de Zinc ', 18, 3, 2.60, 8.20, 1, 20, 1);

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
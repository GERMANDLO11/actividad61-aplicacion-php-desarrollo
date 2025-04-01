-- Crear la tabla "motos"
CREATE TABLE motos (
    motos_id INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(50) NOT NULL,
    modelo VARCHAR(50) NOT NULL,
    cilindrada INT NOT NULL,
    anio_fabricacion INT NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL
);

-- Insertar 10 registros en la tabla "motos"
INSERT INTO motos (marca, modelo, cilindrada, anio_fabricacion, precio, stock) VALUES
('KTM', 'EXC 300', 300, 2023, 9500.00, 5),
('Yamaha', 'WR450F', 450, 2022, 8700.00, 3),
('Honda', 'CRF250R', 250, 2021, 7200.00, 4),
('Beta', 'RR 300', 300, 2023, 8900.00, 6),
('Husqvarna', 'TE 250', 250, 2022, 9400.00, 2),
('Sherco', 'SE 300', 300, 2023, 9100.00, 5),
('GasGas', 'EC 250', 250, 2021, 8000.00, 4),
('Suzuki', 'RMX 450Z', 450, 2020, 7800.00, 3),
('Kawasaki', 'KX250', 250, 2023, 7500.00, 7),
('TM Racing', 'EN 300', 300, 2022, 9500.00, 2);



# Web2TP
## Integrantes:
  Joaquin Hevia, email: joaco.r.hevia@gmail.com
  David Alvarez, email: lp.davidalvarez@gmail.com
## Tematica:
  Pagina de ropa
## Descripcion:
  La idea es crear una pagina en la que el usuario pueda realizar su pedido online,ver el estado y que dicho pedido llegue a su domicilio
## DER:
  ![Diagrama de entidad relacion](https://github.com/joacohevia/Web2TP/blob/main/Diagrama%20TP%20especial.drawio.png)
## .SQL 
-- Crear la tabla de Usuarios
CREATE TABLE Usuarios (
    IDUsuario INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(50) NOT NULL,
    Apellido VARCHAR(50) NOT NULL,
    Ciudad VARCHAR(50) NOT NULL,
    Direccion VARCHAR(100) NOT NULL,
    CP VARCHAR(50),
    CorreoElectronico VARCHAR(100) NOT NULL UNIQUE,
    Telefono VARCHAR(15)
);

-- Crear la tabla de Productos
CREATE TABLE Productos (
    IDProducto INT AUTO_INCREMENT PRIMARY KEY,
    Especificaciones VARCHAR(100) NOT NULL,
    TipoProducto VARCHAR(50) NOT NULL,
    Precio DECIMAL(10, 2) NOT NULL
);

-- Crear la tabla de Pedidos
CREATE TABLE Pedidos (
    IDPedido INT AUTO_INCREMENT PRIMARY KEY,
    IDUsuario INT,
    IDProducto INT,
    EstadoPedido VARCHAR(20),
    FechaEnvio DATE,
    FOREIGN KEY (IDUsuario) REFERENCES Usuarios(IDUsuario),
    FOREIGN KEY (IDProducto) REFERENCES Productos(IDProducto)
);
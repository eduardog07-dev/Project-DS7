CREATE DATABASE IF NOT EXISTS peliculas_ds7;
USE peliculas_ds7;

-- ===========================
-- TABLA USUARIOS
-- ===========================

CREATE TABLE IF NOT EXISTS usuarios (
id INT AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(100) NOT NULL,
email VARCHAR(150) NOT NULL UNIQUE,
password VARCHAR(255) NOT NULL,
rol ENUM('admin','usuario') DEFAULT 'usuario',
intentos_fallidos INT DEFAULT 0,
bloqueado_hasta DATETIME NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ===========================
-- TABLA GENEROS
-- ===========================

CREATE TABLE IF NOT EXISTS generos (
id INT AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(100) NOT NULL
);

-- ===========================
-- TABLA PELICULAS
-- ===========================

CREATE TABLE IF NOT EXISTS peliculas (
id INT AUTO_INCREMENT PRIMARY KEY,
titulo VARCHAR(200) NOT NULL,
descripcion TEXT,
anio INT,
imagen VARCHAR(255),
id_genero INT NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

```
CONSTRAINT fk_pelicula_genero
    FOREIGN KEY (id_genero)
    REFERENCES generos(id)
    ON DELETE CASCADE
```

);

-- ===========================
-- TABLA PREFERENCIAS
-- ===========================

CREATE TABLE IF NOT EXISTS preferencias (
id INT AUTO_INCREMENT PRIMARY KEY,
id_usuario INT NOT NULL,
id_genero INT NOT NULL,

```
CONSTRAINT fk_pref_usuario
    FOREIGN KEY (id_usuario)
    REFERENCES usuarios(id)
    ON DELETE CASCADE,

CONSTRAINT fk_pref_genero
    FOREIGN KEY (id_genero)
    REFERENCES generos(id)
    ON DELETE CASCADE
```

);

-- ===========================
-- TABLA HISTORIAL
-- ===========================

CREATE TABLE IF NOT EXISTS historial (
id INT AUTO_INCREMENT PRIMARY KEY,
id_usuario INT NOT NULL,
id_pelicula INT NOT NULL,
fecha_vista DATETIME DEFAULT CURRENT_TIMESTAMP,

```
CONSTRAINT fk_hist_usuario
    FOREIGN KEY (id_usuario)
    REFERENCES usuarios(id)
    ON DELETE CASCADE,

CONSTRAINT fk_hist_pelicula
    FOREIGN KEY (id_pelicula)
    REFERENCES peliculas(id)
    ON DELETE CASCADE
```

);

-- ===========================
-- TABLA CALIFICACIONES
-- ===========================

CREATE TABLE IF NOT EXISTS calificaciones (
id INT AUTO_INCREMENT PRIMARY KEY,
id_usuario INT NOT NULL,
id_pelicula INT NOT NULL,
puntuacion INT NOT NULL,
comentario TEXT,
fecha DATETIME DEFAULT CURRENT_TIMESTAMP,

```
CONSTRAINT fk_cal_usuario
    FOREIGN KEY (id_usuario)
    REFERENCES usuarios(id)
    ON DELETE CASCADE,

CONSTRAINT fk_cal_pelicula
    FOREIGN KEY (id_pelicula)
    REFERENCES peliculas(id)
    ON DELETE CASCADE
```

);

-- ===========================
-- DATOS INICIALES
-- ===========================

INSERT INTO generos (id, nombre)
VALUES
(1, 'Acción'),
(2, 'Comedia'),
(3, 'Drama'),
(4, 'Terror'),
(5, 'Ciencia Ficción');

INSERT INTO peliculas
(
id,
titulo,
descripcion,
anio,
imagen,
id_genero
)
VALUES
(
1,
'John Wick',
'Un asesino regresa a la acción.',
2014,
'johnwick.jpg',
1
),
(
2,
'Shrek',
'Un ogro vive aventuras.',
2001,
'shrek.jpg',
2
),
(
3,
'Titanic',
'Historia romántica en el Titanic.',
1997,
'titanic.jpg',
3
),
(
4,
'El Conjuro',
'Película de terror paranormal.',
2013,
'conjuro.jpg',
4
),
(
5,
'Interstellar',
'Viaje espacial para salvar la humanidad.',
2014,
'interstellar.jpg',
5
),
(
6,
'Batman',
'Bruce Wayne combate el crimen en Gotham.',
2022,
'batman.jpg',
1
);

INSERT INTO usuarios
(
id,
nombre,
email,
password,
rol
)
VALUES
(
1,
'Administrador',
'[admin@ds7.com](mailto:admin@ds7.com)',
'$2y$10$8Wq6vX9q8y0K2xV3YbXfV.9lL3N6HqH8xq9D7v4T8mYJ2xP1u9J6u',
'admin'
),
(
2,
'Alejandro',
'[alejandro@test.com](mailto:alejandro@test.com)',
'$2y$10$8Wq6vX9q8y0K2xV3YbXfV.9lL3N6HqH8xq9D7v4T8mYJ2xP1u9J6u',
'usuario'
);

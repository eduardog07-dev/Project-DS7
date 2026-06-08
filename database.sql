CREATE DATABASE IF NOT EXISTS peliculas_ds7;
USE peliculas_ds7;

-- ===========================
-- TABLA USUARIOS
-- ===========================

CREATE TABLE usuarios (
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

CREATE TABLE generos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

-- ===========================
-- TABLA PELICULAS
-- ===========================

CREATE TABLE peliculas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(200) NOT NULL,
    descripcion TEXT,
    anio INT,
    imagen VARCHAR(255),
    id_genero INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_pelicula_genero
        FOREIGN KEY (id_genero)
        REFERENCES generos(id)
        ON DELETE CASCADE
);

-- ===========================
-- TABLA PREFERENCIAS
-- ===========================

CREATE TABLE preferencias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_genero INT NOT NULL,

    CONSTRAINT fk_pref_usuario
        FOREIGN KEY (id_usuario)
        REFERENCES usuarios(id)
        ON DELETE CASCADE,

    CONSTRAINT fk_pref_genero
        FOREIGN KEY (id_genero)
        REFERENCES generos(id)
        ON DELETE CASCADE
);

-- ===========================
-- TABLA HISTORIAL
-- ===========================

CREATE TABLE historial (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_pelicula INT NOT NULL,
    fecha_vista DATETIME DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_hist_usuario
        FOREIGN KEY (id_usuario)
        REFERENCES usuarios(id)
        ON DELETE CASCADE,

    CONSTRAINT fk_hist_pelicula
        FOREIGN KEY (id_pelicula)
        REFERENCES peliculas(id)
        ON DELETE CASCADE
);

-- ===========================
-- TABLA CALIFICACIONES
-- ===========================

CREATE TABLE calificaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_pelicula INT NOT NULL,
    puntuacion INT NOT NULL,
    comentario TEXT,
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_cal_usuario
        FOREIGN KEY (id_usuario)
        REFERENCES usuarios(id)
        ON DELETE CASCADE,

    CONSTRAINT fk_cal_pelicula
        FOREIGN KEY (id_pelicula)
        REFERENCES peliculas(id)
        ON DELETE CASCADE
);
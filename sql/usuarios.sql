CREATE TABLE asistencias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    tipo_entrada ENUM('entrada', 'salida') NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

INSERT INTO usuarios (username, password_md5) VALUES
    ('usuario1', MD5('password1')),
    ('usuario2', MD5('password2')),
    ('usuario3', MD5('password3'));

    
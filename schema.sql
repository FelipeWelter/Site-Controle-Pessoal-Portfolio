CREATE TABLE IF NOT EXISTS usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
CREATE TABLE IF NOT EXISTS acesso (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome_completo VARCHAR(200) NOT NULL,
    identidade_cpf VARCHAR(32) NOT NULL,
    hora_entrada DATETIME NOT NULL,
    hora_saida DATETIME NULL,
    destino VARCHAR(200) NOT NULL,
    observacoes TEXT NULL
);

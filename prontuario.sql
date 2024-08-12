-- Criação do banco de dados
CREATE DATABASE prontuario;

-- Seleciona o banco de dados
USE prontuario;

-- Tabela de Usuários
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    user_type ENUM('medico', 'enfermeiro') NOT NULL
);

-- Tabela de Pacientes
CREATE TABLE pacientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) NOT NULL UNIQUE,
    data_nascimento DATE NOT NULL,
    sexo ENUM('Masculino', 'Feminino', 'Outro') NOT NULL,
    nacionalidade VARCHAR(50),
    email VARCHAR(100),
    telefone VARCHAR(15) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    historico_medico TEXT,
    contato_emergencia VARCHAR(100) NOT NULL,
    tipo_sanguineo VARCHAR(10),
    temperatura VARCHAR(10),
    pressao VARCHAR(15),
    diagnostico TEXT
);

-- Tabela de Atualizações Médicas
CREATE TABLE atualizacoes_medicas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    paciente_id INT NOT NULL,
    data DATE NOT NULL,
    horario TIME NOT NULL,
    sintomas TEXT NOT NULL,
    medicamentos_prescritos TEXT NOT NULL,
    exames TEXT NOT NULL,
    diagnosticos TEXT NOT NULL,
    doenca TEXT NOT NULL,
    cid TEXT NOT NULL,
    notas TEXT,
    FOREIGN KEY (paciente_id) REFERENCES pacientes(id)
);

-- Tabela de Evoluções de Prontuário
CREATE TABLE evolucoes_prontuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    paciente_id INT NOT NULL,
    data DATE NOT NULL,
    horario TIME NOT NULL,
    evolucao TEXT NOT NULL,
    medicamentos_administrados TEXT NOT NULL,
    notas TEXT,
    FOREIGN KEY (paciente_id) REFERENCES pacientes(id)
);

INSERT INTO usuarios (id, username, password, user_type) VALUES  ('001', 'medico001', '123', 'medico');
INSERT INTO usuarios (id, username, password, user_type) VALUES ('002', 'enfermeiro001', '123', 'enfermeiro');


CREATE TABLE usuarios (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(64) NOT NULL,
    email VARCHAR(64) NOT NULL,
    senha CHAR(32) NOT NULL,
    data_criacao TIMESTAMP NOT NULL DEFAULT LOCALTIMESTAMP,
    data_edicao TIMESTAMP DEFAULT NULL,
    foto VARCHAR(64),
    admin SMALLINT DEFAULT 0
);

INSERT INTO usuarios
(nome, email, senha, data_criacao, data_edicao, foto, admin) VALUES
('Admin', 'admin@admin.dev', md5('ifsul'), LOCALTIMESTAMP, NULL, 'asdfasdfasdfasdf', 1);

CREATE TABLE categorias (
    id SERIAL PRIMARY KEY,
    descricao VARCHAR(100) NOT NULL
);
INSERT INTO categorias(descricao) VALUES
('Sabedoria'), ('Liderança'), ('Disciplina');

CREATE TABLE artigos (
    id SERIAL PRIMARY KEY,
    id_categoria INT NOT NULL,
    id_usuario INT NOT NULL,
    titulo VARCHAR(200),
    texto VARCHAR(5000),
    data_criacao TIMESTAMP NOT NULL DEFAULT LOCALTIMESTAMP,
    data_edicao TIMESTAMP DEFAULT NULL,
    FOREIGN KEY (id_categoria) REFERENCES categorias(id),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

INSERT INTO artigos
(id_categoria, id_usuario, titulo, texto, data_criacao, data_edicao) VALUES
(3, 1, 'Lorem Ipsum',
'Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.',
LOCALTIMESTAMP, NULL);


CREATE TABLE citacoes (
    id SERIAL PRIMARY KEY,
    id_categoria INT NOT NULL,
    id_usuario INT NOT NULL,
    texto VARCHAR(1000),
    autor VARCHAR(100),
    FOREIGN KEY (id_categoria) REFERENCES categorias(id),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

INSERT INTO citacoes (id_categoria, id_usuario, texto, autor) VALUES
(2, 1, 'E aqueles que estavam dançando forma tidos como dementes por aqueles
que não podiam ouvir a música.', 'Autor desconhecido');


CREATE TABLE audit_desc (
    id SERIAL PRIMARY KEY,
    descricao VARCHAR(100) NOT NULL
);

INSERT INTO audit_desc
(id, descricao) VALUES
(1, 'Criação'), (2, 'Edição'), (3, 'Remoção');

CREATE TABLE audit_artigos (
    id SERIAL,
    id_artigo INT NOT NULL,
    id_usuario INT NOT NULL,
    id_descricao INT NOT NULL,

    PRIMARY KEY(id, id_artigo),
    FOREIGN KEY(id_artigo) REFERENCES artigos(id),
    FOREIGN KEY(id_descricao) REFERENCES audit_desc(id)
);

INSERT INTO audit_artigos (id_artigo, id_usuario, id_descricao) VALUES
(1, 1, 2), (1, 1, 3);

CREATE TABLE audit_logins (
    id SERIAL PRIMARY KEY,
    id_usuario INT NOT NULL,
    data_login TIMESTAMP NOT NULL DEFAULT LOCALTIMESTAMP
);

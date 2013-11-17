--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: artigos; Type: TABLE; Schema: public; Owner: ifsul; Tablespace: 
--

CREATE TABLE artigos (
    id integer NOT NULL,
    id_categoria integer NOT NULL,
    id_usuario integer NOT NULL,
    titulo character varying(200),
    texto character varying(5000),
    data_criacao timestamp without time zone DEFAULT ('now'::text)::timestamp without time zone NOT NULL,
    data_edicao timestamp without time zone,
    publicado smallint DEFAULT 1
);


ALTER TABLE public.artigos OWNER TO ifsul;

--
-- Name: artigos_id_seq; Type: SEQUENCE; Schema: public; Owner: ifsul
--

CREATE SEQUENCE artigos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.artigos_id_seq OWNER TO ifsul;

--
-- Name: artigos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ifsul
--

ALTER SEQUENCE artigos_id_seq OWNED BY artigos.id;


--
-- Name: audit_artigos; Type: TABLE; Schema: public; Owner: ifsul; Tablespace: 
--

CREATE TABLE audit_artigos (
    id integer NOT NULL,
    id_artigo integer NOT NULL,
    id_usuario integer NOT NULL,
    id_descricao integer NOT NULL
);


ALTER TABLE public.audit_artigos OWNER TO ifsul;

--
-- Name: audit_artigos_id_seq; Type: SEQUENCE; Schema: public; Owner: ifsul
--

CREATE SEQUENCE audit_artigos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.audit_artigos_id_seq OWNER TO ifsul;

--
-- Name: audit_artigos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ifsul
--

ALTER SEQUENCE audit_artigos_id_seq OWNED BY audit_artigos.id;


--
-- Name: audit_desc; Type: TABLE; Schema: public; Owner: ifsul; Tablespace: 
--

CREATE TABLE audit_desc (
    id integer NOT NULL,
    descricao character varying(100) NOT NULL
);


ALTER TABLE public.audit_desc OWNER TO ifsul;

--
-- Name: audit_desc_id_seq; Type: SEQUENCE; Schema: public; Owner: ifsul
--

CREATE SEQUENCE audit_desc_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.audit_desc_id_seq OWNER TO ifsul;

--
-- Name: audit_desc_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ifsul
--

ALTER SEQUENCE audit_desc_id_seq OWNED BY audit_desc.id;


--
-- Name: audit_logins; Type: TABLE; Schema: public; Owner: ifsul; Tablespace: 
--

CREATE TABLE audit_logins (
    id integer NOT NULL,
    id_usuario integer NOT NULL,
    data_login timestamp without time zone DEFAULT ('now'::text)::timestamp without time zone NOT NULL
);


ALTER TABLE public.audit_logins OWNER TO ifsul;

--
-- Name: audit_logins_id_seq; Type: SEQUENCE; Schema: public; Owner: ifsul
--

CREATE SEQUENCE audit_logins_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.audit_logins_id_seq OWNER TO ifsul;

--
-- Name: audit_logins_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ifsul
--

ALTER SEQUENCE audit_logins_id_seq OWNED BY audit_logins.id;


--
-- Name: categorias; Type: TABLE; Schema: public; Owner: ifsul; Tablespace: 
--

CREATE TABLE categorias (
    id integer NOT NULL,
    descricao character varying(100) NOT NULL
);


ALTER TABLE public.categorias OWNER TO ifsul;

--
-- Name: categorias_id_seq; Type: SEQUENCE; Schema: public; Owner: ifsul
--

CREATE SEQUENCE categorias_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.categorias_id_seq OWNER TO ifsul;

--
-- Name: categorias_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ifsul
--

ALTER SEQUENCE categorias_id_seq OWNED BY categorias.id;


--
-- Name: citacoes; Type: TABLE; Schema: public; Owner: ifsul; Tablespace: 
--

CREATE TABLE citacoes (
    id integer NOT NULL,
    id_categoria integer NOT NULL,
    id_usuario integer NOT NULL,
    texto character varying(1000),
    publicado smallint DEFAULT 1
);


ALTER TABLE public.citacoes OWNER TO ifsul;

--
-- Name: citacoes_id_seq; Type: SEQUENCE; Schema: public; Owner: ifsul
--

CREATE SEQUENCE citacoes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.citacoes_id_seq OWNER TO ifsul;

--
-- Name: citacoes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ifsul
--

ALTER SEQUENCE citacoes_id_seq OWNED BY citacoes.id;


--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: ifsul; Tablespace: 
--

CREATE TABLE usuarios (
    id integer NOT NULL,
    nome character varying(64) NOT NULL,
    email character varying(64) NOT NULL,
    senha character(32) NOT NULL,
    data_criacao timestamp without time zone DEFAULT ('now'::text)::timestamp without time zone NOT NULL,
    data_edicao timestamp without time zone,
    foto character varying(64),
    admin smallint DEFAULT 0
);


ALTER TABLE public.usuarios OWNER TO ifsul;

--
-- Name: usuarios_id_seq; Type: SEQUENCE; Schema: public; Owner: ifsul
--

CREATE SEQUENCE usuarios_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuarios_id_seq OWNER TO ifsul;

--
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ifsul
--

ALTER SEQUENCE usuarios_id_seq OWNED BY usuarios.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: ifsul
--

ALTER TABLE ONLY artigos ALTER COLUMN id SET DEFAULT nextval('artigos_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: ifsul
--

ALTER TABLE ONLY audit_artigos ALTER COLUMN id SET DEFAULT nextval('audit_artigos_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: ifsul
--

ALTER TABLE ONLY audit_desc ALTER COLUMN id SET DEFAULT nextval('audit_desc_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: ifsul
--

ALTER TABLE ONLY audit_logins ALTER COLUMN id SET DEFAULT nextval('audit_logins_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: ifsul
--

ALTER TABLE ONLY categorias ALTER COLUMN id SET DEFAULT nextval('categorias_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: ifsul
--

ALTER TABLE ONLY citacoes ALTER COLUMN id SET DEFAULT nextval('citacoes_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: ifsul
--

ALTER TABLE ONLY usuarios ALTER COLUMN id SET DEFAULT nextval('usuarios_id_seq'::regclass);


--
-- Data for Name: artigos; Type: TABLE DATA; Schema: public; Owner: ifsul
--

COPY artigos (id, id_categoria, id_usuario, titulo, texto, data_criacao, data_edicao, publicado) FROM stdin;
1	3	1	Lorem Ipsum	Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.	2013-11-07 21:31:41.070505	\N	1
\.


--
-- Name: artigos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ifsul
--

SELECT pg_catalog.setval('artigos_id_seq', 1, true);


--
-- Data for Name: audit_artigos; Type: TABLE DATA; Schema: public; Owner: ifsul
--

COPY audit_artigos (id, id_artigo, id_usuario, id_descricao) FROM stdin;
1	1	1	2
2	1	1	3
\.


--
-- Name: audit_artigos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ifsul
--

SELECT pg_catalog.setval('audit_artigos_id_seq', 2, true);


--
-- Data for Name: audit_desc; Type: TABLE DATA; Schema: public; Owner: ifsul
--

COPY audit_desc (id, descricao) FROM stdin;
1	Criação
2	Edição
3	Remoção
\.


--
-- Name: audit_desc_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ifsul
--

SELECT pg_catalog.setval('audit_desc_id_seq', 1, false);


--
-- Data for Name: audit_logins; Type: TABLE DATA; Schema: public; Owner: ifsul
--

COPY audit_logins (id, id_usuario, data_login) FROM stdin;
\.


--
-- Name: audit_logins_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ifsul
--

SELECT pg_catalog.setval('audit_logins_id_seq', 1, false);


--
-- Data for Name: categorias; Type: TABLE DATA; Schema: public; Owner: ifsul
--

COPY categorias (id, descricao) FROM stdin;
1	Sabedoria
2	Liderança
3	Disciplina
4	Culinária
\.


--
-- Name: categorias_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ifsul
--

SELECT pg_catalog.setval('categorias_id_seq', 4, true);


--
-- Data for Name: citacoes; Type: TABLE DATA; Schema: public; Owner: ifsul
--

COPY citacoes (id, id_categoria, id_usuario, texto, publicado) FROM stdin;
1	2	1	E aqueles que estavam dançando forma tidos como dementes por aqueles\nque não podiam ouvir a música.	1
12	1	1	O sábio tem sabedoria, pois a sabedoria torna o sábio menos dessabiado.	1
13	4	1	A cebola é o rei dos temperos.	1
14	2	1	Lorem ipsum dolor amet	1
15	3	1	Lorem ipsum dolor amet	1
16	1	1	Lorem ipsum dolor amet	1
\.


--
-- Name: citacoes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ifsul
--

SELECT pg_catalog.setval('citacoes_id_seq', 16, true);


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: ifsul
--

COPY usuarios (id, nome, email, senha, data_criacao, data_edicao, foto, admin) FROM stdin;
1	Admin	admin@admin.dev	81dc9bdb52d04dc20036dbd8313ed055	2013-11-07 21:31:41.070505	\N	asdfasdfasdfasdf	1
\.


--
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ifsul
--

SELECT pg_catalog.setval('usuarios_id_seq', 1, true);


--
-- Name: artigos_pkey; Type: CONSTRAINT; Schema: public; Owner: ifsul; Tablespace: 
--

ALTER TABLE ONLY artigos
    ADD CONSTRAINT artigos_pkey PRIMARY KEY (id);


--
-- Name: audit_artigos_pkey; Type: CONSTRAINT; Schema: public; Owner: ifsul; Tablespace: 
--

ALTER TABLE ONLY audit_artigos
    ADD CONSTRAINT audit_artigos_pkey PRIMARY KEY (id, id_artigo);


--
-- Name: audit_desc_pkey; Type: CONSTRAINT; Schema: public; Owner: ifsul; Tablespace: 
--

ALTER TABLE ONLY audit_desc
    ADD CONSTRAINT audit_desc_pkey PRIMARY KEY (id);


--
-- Name: audit_logins_pkey; Type: CONSTRAINT; Schema: public; Owner: ifsul; Tablespace: 
--

ALTER TABLE ONLY audit_logins
    ADD CONSTRAINT audit_logins_pkey PRIMARY KEY (id);


--
-- Name: categorias_pkey; Type: CONSTRAINT; Schema: public; Owner: ifsul; Tablespace: 
--

ALTER TABLE ONLY categorias
    ADD CONSTRAINT categorias_pkey PRIMARY KEY (id);


--
-- Name: citacoes_pkey; Type: CONSTRAINT; Schema: public; Owner: ifsul; Tablespace: 
--

ALTER TABLE ONLY citacoes
    ADD CONSTRAINT citacoes_pkey PRIMARY KEY (id);


--
-- Name: usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: ifsul; Tablespace: 
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);


--
-- Name: artigos_id_categoria_fkey; Type: FK CONSTRAINT; Schema: public; Owner: ifsul
--

ALTER TABLE ONLY artigos
    ADD CONSTRAINT artigos_id_categoria_fkey FOREIGN KEY (id_categoria) REFERENCES categorias(id);


--
-- Name: artigos_id_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: ifsul
--

ALTER TABLE ONLY artigos
    ADD CONSTRAINT artigos_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES usuarios(id);


--
-- Name: audit_artigos_id_artigo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: ifsul
--

ALTER TABLE ONLY audit_artigos
    ADD CONSTRAINT audit_artigos_id_artigo_fkey FOREIGN KEY (id_artigo) REFERENCES artigos(id);


--
-- Name: audit_artigos_id_descricao_fkey; Type: FK CONSTRAINT; Schema: public; Owner: ifsul
--

ALTER TABLE ONLY audit_artigos
    ADD CONSTRAINT audit_artigos_id_descricao_fkey FOREIGN KEY (id_descricao) REFERENCES audit_desc(id);


--
-- Name: citacoes_id_categoria_fkey; Type: FK CONSTRAINT; Schema: public; Owner: ifsul
--

ALTER TABLE ONLY citacoes
    ADD CONSTRAINT citacoes_id_categoria_fkey FOREIGN KEY (id_categoria) REFERENCES categorias(id);


--
-- Name: citacoes_id_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: ifsul
--

ALTER TABLE ONLY citacoes
    ADD CONSTRAINT citacoes_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES usuarios(id);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--


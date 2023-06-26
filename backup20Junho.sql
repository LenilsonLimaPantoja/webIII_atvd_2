--
-- PostgreSQL database dump
--

-- Dumped from database version 15.3
-- Dumped by pg_dump version 15.3

-- Started on 2023-06-20 18:03:06

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

CREATE TABLE public.categoria (
    id integer NOT NULL,
    descricao text NOT NULL
);


ALTER TABLE public.categoria OWNER TO postgres;

--
-- TOC entry 215 (class 1259 OID 24662)
-- Name: categoria_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.categoria ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.categoria_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 10000000
    CACHE 1
);


--
-- TOC entry 218 (class 1259 OID 24679)
-- Name: cliente; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cliente (
    id integer NOT NULL,
    nome text NOT NULL,
    telefone text NOT NULL,
    cpf text NOT NULL,
    cep text NOT NULL,
    logradouro text NOT NULL,
    bairro text NOT NULL,
    numero numeric NOT NULL,
    cidade text NOT NULL,
    uf text NOT NULL,
    email text NOT NULL,
    imagem text NOT NULL
);


ALTER TABLE public.cliente OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 24682)
-- Name: cliente_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.cliente ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.cliente_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 1000000
    CACHE 1
);


--
-- TOC entry 228 (class 1259 OID 32794)
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.failed_jobs OWNER TO postgres;

--
-- TOC entry 227 (class 1259 OID 32793)
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.failed_jobs_id_seq OWNER TO postgres;

--
-- TOC entry 3411 (class 0 OID 0)
-- Dependencies: 227
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- TOC entry 220 (class 1259 OID 24688)
-- Name: locacao; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.locacao (
    id integer NOT NULL,
    data_locacao date NOT NULL,
    data_entrega date NOT NULL,
    status integer NOT NULL,
    veiculo_id integer NOT NULL,
    cliente_id integer NOT NULL,
    dias integer NOT NULL
);


ALTER TABLE public.locacao OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 24691)
-- Name: locacao_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.locacao ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.locacao_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 1000000
    CACHE 1
);


--
-- TOC entry 223 (class 1259 OID 32769)
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- TOC entry 222 (class 1259 OID 32768)
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO postgres;

--
-- TOC entry 3412 (class 0 OID 0)
-- Dependencies: 222
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- TOC entry 226 (class 1259 OID 32786)
-- Name: password_reset_tokens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_reset_tokens OWNER TO postgres;

--
-- TOC entry 230 (class 1259 OID 32806)
-- Name: personal_access_tokens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    expires_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.personal_access_tokens OWNER TO postgres;

--
-- TOC entry 229 (class 1259 OID 32805)
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.personal_access_tokens_id_seq OWNER TO postgres;

--
-- TOC entry 3413 (class 0 OID 0)
-- Dependencies: 229
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;


--
-- TOC entry 225 (class 1259 OID 32776)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 224 (class 1259 OID 32775)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- TOC entry 3414 (class 0 OID 0)
-- Dependencies: 224
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- TOC entry 216 (class 1259 OID 24668)
-- Name: veiculo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.veiculo (
    id integer NOT NULL,
    modelo text,
    valor_dia double precision,
    categoria_id integer,
    placa text,
    ano text,
    imagem text,
    marca text,
    status integer DEFAULT 0
);


ALTER TABLE public.veiculo OWNER TO postgres;

--
-- TOC entry 3415 (class 0 OID 0)
-- Dependencies: 216
-- Name: COLUMN veiculo.status; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.veiculo.status IS '0=disponivel, 1=não disponivel';


--
-- TOC entry 217 (class 1259 OID 24671)
-- Name: veiculo_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.veiculo ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.veiculo_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 1000000
    CACHE 1
);


--
-- TOC entry 3215 (class 2604 OID 32797)
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- TOC entry 3213 (class 2604 OID 32772)
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- TOC entry 3217 (class 2604 OID 32809)
-- Name: personal_access_tokens id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);


--
-- TOC entry 3214 (class 2604 OID 32779)
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- TOC entry 3388 (class 0 OID 24659)
-- Dependencies: 214
-- Data for Name: categoria; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.categoria (id, descricao) OVERRIDING SYSTEM VALUE VALUES (2, 'Veículos comerciais leves');
INSERT INTO public.categoria (id, descricao) OVERRIDING SYSTEM VALUE VALUES (4, 'Automóveis de passageiros');
INSERT INTO public.categoria (id, descricao) OVERRIDING SYSTEM VALUE VALUES (12, 'Carro de Passeio');
INSERT INTO public.categoria (id, descricao) OVERRIDING SYSTEM VALUE VALUES (1, 'SUV (Utilitário Esportivo)');


--
-- TOC entry 3392 (class 0 OID 24679)
-- Dependencies: 218
-- Data for Name: cliente; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.cliente (id, nome, telefone, cpf, cep, logradouro, bairro, numero, cidade, uf, email, imagem) OVERRIDING SYSTEM VALUE VALUES (6, 'Lenilson Lima Pantoja', '67982143134', '04688508212', '79002100', 'Rua Joaquim Murtinho', 'Nova California', 494, 'Campo Grande', 'MS', 'lenilsonlm.pantoja@gmail.com', 'x2vEbTL28xWIHvU1l9TeLWNDoPMXwIPgwuwlz6tB.png');
INSERT INTO public.cliente (id, nome, telefone, cpf, cep, logradouro, bairro, numero, cidade, uf, email, imagem) OVERRIDING SYSTEM VALUE VALUES (27, 'Lenilson 2', '00000000002', '0468850822', '79002100', '2', '2', 1, '2', '8', 'lenilsonlm.pantoja2@gmail.com', 'lwW3Mr9XYqovQivfQzia45qv3BTecDcude1cpuMg.jpg');
INSERT INTO public.cliente (id, nome, telefone, cpf, cep, logradouro, bairro, numero, cidade, uf, email, imagem) OVERRIDING SYSTEM VALUE VALUES (7, 'Fabiana Alves', '67982133153', '25488965472', '79002100', 'Rua Joaquim Murtinho', 'Centro', 494, 'Campo Grande', 'MS', 'lenilsonlimapantoja123@gmail.com', 'w8V7TlvaifMLxZHygYyAFpLnB6LKG8ZayTw4kVRy.png');


--
-- TOC entry 3402 (class 0 OID 32794)
-- Dependencies: 228
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3394 (class 0 OID 24688)
-- Dependencies: 220
-- Data for Name: locacao; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.locacao (id, data_locacao, data_entrega, status, veiculo_id, cliente_id, dias) OVERRIDING SYSTEM VALUE VALUES (19, '2023-06-01', '2023-06-29', 1, 7, 7, 28);
INSERT INTO public.locacao (id, data_locacao, data_entrega, status, veiculo_id, cliente_id, dias) OVERRIDING SYSTEM VALUE VALUES (20, '2023-06-07', '2023-06-29', 1, 2, 6, 22);
INSERT INTO public.locacao (id, data_locacao, data_entrega, status, veiculo_id, cliente_id, dias) OVERRIDING SYSTEM VALUE VALUES (18, '2023-06-05', '2023-06-18', 2, 8, 7, 13);
INSERT INTO public.locacao (id, data_locacao, data_entrega, status, veiculo_id, cliente_id, dias) OVERRIDING SYSTEM VALUE VALUES (15, '2023-06-08', '2023-06-19', 1, 2, 6, 11);


--
-- TOC entry 3397 (class 0 OID 32769)
-- Dependencies: 223
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.migrations (id, migration, batch) VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);


--
-- TOC entry 3400 (class 0 OID 32786)
-- Dependencies: 226
-- Data for Name: password_reset_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.password_reset_tokens (email, token, created_at) VALUES ('lenilsonlm.pantoja@gmail.com', '$2y$10$q7mEtx1ut8y6Rjr6/xx4r.txPlMf8hE0/zQWUt9R686HuwYiTZ8Jm', '2023-06-19 20:48:37');


--
-- TOC entry 3404 (class 0 OID 32806)
-- Dependencies: 230
-- Data for Name: personal_access_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3399 (class 0 OID 32776)
-- Dependencies: 225
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at) VALUES (1, 'Lenilson Lima Pantoja', 'lenilsonlm.pantoja@gmail.com', NULL, '$2y$10$CV3RrMHrO3pCXuaDJAEdNuIre8HYfvGa7jNbBypCHzzlJg7otiexq', 'IkUZgPGJx0o2r34pLsJftsQAGOqFwmWoDXcV6azmoDVMoUN0KpF7ydyoCZyY', '2023-06-14 13:49:47', '2023-06-16 15:27:45');


--
-- TOC entry 3390 (class 0 OID 24668)
-- Dependencies: 216
-- Data for Name: veiculo; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.veiculo (id, modelo, valor_dia, categoria_id, placa, ano, imagem, marca, status) OVERRIDING SYSTEM VALUE VALUES (9, 'Nissan Altima', 280, 1, 'HGD957', '2023', 'uD34jgtOPtZPFQEvJlBYbBNexOhz8dufE5jVth3Y.jpg', 'Chevrolet', 0);
INSERT INTO public.veiculo (id, modelo, valor_dia, categoria_id, placa, ano, imagem, marca, status) OVERRIDING SYSTEM VALUE VALUES (15, 'Chevrolet Corvette', 280, 2, 'HGD957', '2023', 'l0VwwYS5FggPDv6n87oWqgRfmiUmIr2na1YLjnMo.webp', 'Chevrolet', 0);
INSERT INTO public.veiculo (id, modelo, valor_dia, categoria_id, placa, ano, imagem, marca, status) OVERRIDING SYSTEM VALUE VALUES (3, 'Mercedes-Benz C-Class', 280, 2, 'HGD957', '2023', 'RJIjc8NI7xYmkhqCAcM77eWHK5IGMYIKS4Qvr0l8.jpg', 'Chevrolet', 0);
INSERT INTO public.veiculo (id, modelo, valor_dia, categoria_id, placa, ano, imagem, marca, status) OVERRIDING SYSTEM VALUE VALUES (2, 'Volkswagen Golf', 250, 2, 'BGJH51', '2022', 'O1aKRmFnX11eLLZAXcc0xysYQUL5g9arL1N8AEzR.jpg', 'VW', 1);
INSERT INTO public.veiculo (id, modelo, valor_dia, categoria_id, placa, ano, imagem, marca, status) OVERRIDING SYSTEM VALUE VALUES (8, 'Hyundai Sonata', 280, 1, 'HGD957', '2023', 'mLKwLi5gMlM4lDVQvd7eximI0JEYgNklQJnoNhpa.jpg', '3', 0);
INSERT INTO public.veiculo (id, modelo, valor_dia, categoria_id, placa, ano, imagem, marca, status) OVERRIDING SYSTEM VALUE VALUES (7, 'Subaru Impreza', 280, 1, 'HGD957', '2023', 'KShp5sAHLs20CfFyvRL1x4bDgsuOgKUDTslT4ece.webp', 'Chevrolet', 1);


--
-- TOC entry 3416 (class 0 OID 0)
-- Dependencies: 215
-- Name: categoria_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.categoria_id_seq', 23, true);


--
-- TOC entry 3417 (class 0 OID 0)
-- Dependencies: 219
-- Name: cliente_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.cliente_id_seq', 27, true);


--
-- TOC entry 3418 (class 0 OID 0)
-- Dependencies: 227
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- TOC entry 3419 (class 0 OID 0)
-- Dependencies: 221
-- Name: locacao_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.locacao_id_seq', 23, true);


--
-- TOC entry 3420 (class 0 OID 0)
-- Dependencies: 222
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 4, true);


--
-- TOC entry 3421 (class 0 OID 0)
-- Dependencies: 229
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);


--
-- TOC entry 3422 (class 0 OID 0)
-- Dependencies: 224
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 1, true);


--
-- TOC entry 3423 (class 0 OID 0)
-- Dependencies: 217
-- Name: veiculo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.veiculo_id_seq', 24, true);


--
-- TOC entry 3219 (class 2606 OID 24678)
-- Name: categoria categoria_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categoria
    ADD CONSTRAINT categoria_pkey PRIMARY KEY (id);


--
-- TOC entry 3223 (class 2606 OID 24710)
-- Name: cliente cliente_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cliente
    ADD CONSTRAINT cliente_pkey PRIMARY KEY (id);


--
-- TOC entry 3235 (class 2606 OID 32802)
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- TOC entry 3237 (class 2606 OID 32804)
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- TOC entry 3225 (class 2606 OID 24696)
-- Name: locacao locacao_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.locacao
    ADD CONSTRAINT locacao_pkey PRIMARY KEY (id);


--
-- TOC entry 3227 (class 2606 OID 32774)
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- TOC entry 3233 (class 2606 OID 32792)
-- Name: password_reset_tokens password_reset_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);


--
-- TOC entry 3239 (class 2606 OID 32813)
-- Name: personal_access_tokens personal_access_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);


--
-- TOC entry 3241 (class 2606 OID 32816)
-- Name: personal_access_tokens personal_access_tokens_token_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);


--
-- TOC entry 3229 (class 2606 OID 32785)
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- TOC entry 3231 (class 2606 OID 32783)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 3221 (class 2606 OID 24703)
-- Name: veiculo veiculo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.veiculo
    ADD CONSTRAINT veiculo_pkey PRIMARY KEY (id);


--
-- TOC entry 3242 (class 1259 OID 32814)
-- Name: personal_access_tokens_tokenable_type_tokenable_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);


--
-- TOC entry 3243 (class 2606 OID 24697)
-- Name: veiculo categoria_veiculo; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.veiculo
    ADD CONSTRAINT categoria_veiculo FOREIGN KEY (categoria_id) REFERENCES public.categoria(id) ON UPDATE CASCADE ON DELETE CASCADE NOT VALID;


--
-- TOC entry 3244 (class 2606 OID 24711)
-- Name: locacao locacao_cliente; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.locacao
    ADD CONSTRAINT locacao_cliente FOREIGN KEY (cliente_id) REFERENCES public.cliente(id) ON UPDATE CASCADE ON DELETE CASCADE NOT VALID;


--
-- TOC entry 3245 (class 2606 OID 24704)
-- Name: locacao locacao_veiculo; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.locacao
    ADD CONSTRAINT locacao_veiculo FOREIGN KEY (veiculo_id) REFERENCES public.veiculo(id) ON UPDATE CASCADE ON DELETE CASCADE NOT VALID;


-- Completed on 2023-06-20 18:03:06

--
-- PostgreSQL database dump complete
--


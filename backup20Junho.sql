--
-- PostgreSQL database dump
--

-- Dumped from database version 15.3
-- Dumped by pg_dump version 15.3

-- Started on 2023-06-26 10:48:18

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

ALTER TABLE public.categoria ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.categoria_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 10000000
    CACHE 1
);


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

ALTER TABLE public.cliente ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.cliente_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 1000000
    CACHE 1
);


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

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.failed_jobs_id_seq OWNER TO postgres;

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;

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

ALTER TABLE public.locacao ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.locacao_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 1000000
    CACHE 1
);

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO postgres;

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;

CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_reset_tokens OWNER TO postgres;

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

CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.personal_access_tokens_id_seq OWNER TO postgres;

ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;

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

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;

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

COMMENT ON COLUMN public.veiculo.status IS '0=disponivel, 1=não disponivel';

ALTER TABLE public.veiculo ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.veiculo_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 1000000
    CACHE 1
);

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);

ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);

INSERT INTO public.categoria (id, descricao) OVERRIDING SYSTEM VALUE VALUES (2, 'Veículos comerciais leves');
INSERT INTO public.categoria (id, descricao) OVERRIDING SYSTEM VALUE VALUES (4, 'Automóveis de passageiros');
INSERT INTO public.categoria (id, descricao) OVERRIDING SYSTEM VALUE VALUES (12, 'Carro de Passeio');
INSERT INTO public.categoria (id, descricao) OVERRIDING SYSTEM VALUE VALUES (1, 'SUV (Utilitário Esportivo)');

INSERT INTO public.cliente (id, nome, telefone, cpf, cep, logradouro, bairro, numero, cidade, uf, email, imagem) OVERRIDING SYSTEM VALUE VALUES (6, 'Lenilson Lima Pantoja', '67982143134', '04688508212', '79002100', 'Rua Joaquim Murtinho', 'Nova California', 494, 'Campo Grande', 'MS', 'lenilsonlm.pantoja@gmail.com', 'x2vEbTL28xWIHvU1l9TeLWNDoPMXwIPgwuwlz6tB.png');
INSERT INTO public.cliente (id, nome, telefone, cpf, cep, logradouro, bairro, numero, cidade, uf, email, imagem) OVERRIDING SYSTEM VALUE VALUES (27, 'Lenilson 2', '00000000002', '0468850822', '79002100', '2', '2', 1, '2', '8', 'lenilsonlm.pantoja2@gmail.com', 'lwW3Mr9XYqovQivfQzia45qv3BTecDcude1cpuMg.jpg');
INSERT INTO public.cliente (id, nome, telefone, cpf, cep, logradouro, bairro, numero, cidade, uf, email, imagem) OVERRIDING SYSTEM VALUE VALUES (7, 'Fabiana Alves', '67982133153', '25488965472', '79002100', 'Rua Joaquim Murtinho', 'Centro', 494, 'Campo Grande', 'MS', 'lenilsonlimapantoja123@gmail.com', 'w8V7TlvaifMLxZHygYyAFpLnB6LKG8ZayTw4kVRy.png');

INSERT INTO public.locacao (id, data_locacao, data_entrega, status, veiculo_id, cliente_id, dias) OVERRIDING SYSTEM VALUE VALUES (25, '2023-06-01', '2023-06-08', 1, 2, 6, 7);
INSERT INTO public.locacao (id, data_locacao, data_entrega, status, veiculo_id, cliente_id, dias) OVERRIDING SYSTEM VALUE VALUES (26, '2023-06-05', '2023-06-15', 1, 3, 7, 10);
INSERT INTO public.locacao (id, data_locacao, data_entrega, status, veiculo_id, cliente_id, dias) OVERRIDING SYSTEM VALUE VALUES (27, '2023-06-07', '2023-06-29', 1, 8, 27, 22);
INSERT INTO public.locacao (id, data_locacao, data_entrega, status, veiculo_id, cliente_id, dias) OVERRIDING SYSTEM VALUE VALUES (28, '2023-06-15', '2023-06-23', 1, 9, 6, 8);

INSERT INTO public.migrations (id, migration, batch) VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

INSERT INTO public.password_reset_tokens (email, token, created_at) VALUES ('lenilsonlm.pantoja@gmail.com', '$2y$10$q7mEtx1ut8y6Rjr6/xx4r.txPlMf8hE0/zQWUt9R686HuwYiTZ8Jm', '2023-06-19 20:48:37');

INSERT INTO public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at) VALUES (1, 'Lenilson Lima Pantoja', 'lenilsonlm.pantoja@gmail.com', NULL, '$2y$10$CV3RrMHrO3pCXuaDJAEdNuIre8HYfvGa7jNbBypCHzzlJg7otiexq', 'IkUZgPGJx0o2r34pLsJftsQAGOqFwmWoDXcV6azmoDVMoUN0KpF7ydyoCZyY', '2023-06-14 13:49:47', '2023-06-16 15:27:45');


INSERT INTO public.veiculo (id, modelo, valor_dia, categoria_id, placa, ano, imagem, marca, status) OVERRIDING SYSTEM VALUE VALUES (2, 'Volkswagen Golf', 250, 2, 'BGJH51', '2022', 'O1aKRmFnX11eLLZAXcc0xysYQUL5g9arL1N8AEzR.jpg', 'VW', 1);
INSERT INTO public.veiculo (id, modelo, valor_dia, categoria_id, placa, ano, imagem, marca, status) OVERRIDING SYSTEM VALUE VALUES (3, 'Mercedes-Benz C-Class', 280, 2, 'HGD957', '2023', 'RJIjc8NI7xYmkhqCAcM77eWHK5IGMYIKS4Qvr0l8.jpg', 'Chevrolet', 1);
INSERT INTO public.veiculo (id, modelo, valor_dia, categoria_id, placa, ano, imagem, marca, status) OVERRIDING SYSTEM VALUE VALUES (8, 'Hyundai Sonata', 280, 1, 'HGD957', '2023', 'mLKwLi5gMlM4lDVQvd7eximI0JEYgNklQJnoNhpa.jpg', '3', 1);
INSERT INTO public.veiculo (id, modelo, valor_dia, categoria_id, placa, ano, imagem, marca, status) OVERRIDING SYSTEM VALUE VALUES (9, 'Nissan Altima', 280, 1, 'HGD957', '2023', 'uD34jgtOPtZPFQEvJlBYbBNexOhz8dufE5jVth3Y.jpg', 'Chevrolet', 1);


SELECT pg_catalog.setval('public.categoria_id_seq', 23, true);


SELECT pg_catalog.setval('public.cliente_id_seq', 27, true);

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


SELECT pg_catalog.setval('public.locacao_id_seq', 28, true);


SELECT pg_catalog.setval('public.migrations_id_seq', 4, true);


SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);

SELECT pg_catalog.setval('public.users_id_seq', 1, true);


SELECT pg_catalog.setval('public.veiculo_id_seq', 25, true);


ALTER TABLE ONLY public.categoria
    ADD CONSTRAINT categoria_pkey PRIMARY KEY (id);



ALTER TABLE ONLY public.cliente
    ADD CONSTRAINT cliente_pkey PRIMARY KEY (id);


ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


ALTER TABLE ONLY public.locacao
    ADD CONSTRAINT locacao_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);



ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);


ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);



ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);



ALTER TABLE ONLY public.veiculo
    ADD CONSTRAINT veiculo_pkey PRIMARY KEY (id);


CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);



ALTER TABLE ONLY public.veiculo
    ADD CONSTRAINT categoria_veiculo FOREIGN KEY (categoria_id) REFERENCES public.categoria(id) ON UPDATE CASCADE ON DELETE CASCADE NOT VALID;


ALTER TABLE ONLY public.locacao
    ADD CONSTRAINT locacao_cliente FOREIGN KEY (cliente_id) REFERENCES public.cliente(id) ON UPDATE CASCADE ON DELETE CASCADE NOT VALID;



ALTER TABLE ONLY public.locacao
    ADD CONSTRAINT locacao_veiculo FOREIGN KEY (veiculo_id) REFERENCES public.veiculo(id) ON UPDATE CASCADE ON DELETE CASCADE NOT VALID;


DROP SEQUENCE IF EXISTS public.users_id_seq;
CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

DROP SEQUENCE IF EXISTS public.permissions_id_seq;
CREATE SEQUENCE public.permissions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

DROP SEQUENCE IF EXISTS public.roles_id_seq;
CREATE SEQUENCE public.roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

DROP SEQUENCE IF EXISTS public.areas_id_seq;
CREATE SEQUENCE public.areas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

DROP SEQUENCE IF EXISTS public.bitacora_usuarios_id_seq;
CREATE SEQUENCE public.bitacora_usuarios_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

DROP SEQUENCE IF EXISTS public.bitacora_log_id_seq;
CREATE SEQUENCE public.bitacora_log_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

DROP SEQUENCE IF EXISTS public.users_monitorings_id_seq;
CREATE SEQUENCE public.users_monitorings_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

DROP TABLE IF EXISTS public.users;
CREATE TABLE public.users (
    id BIGINT NOT NULL,
    nombre CHARACTER VARYING(100) NOT NULL,
    primer_apellido CHARACTER VARYING(100) NOT NULL,
    segundo_apellido CHARACTER VARYING(100),
    curp CHARACTER VARYING(18),
    rfc CHARACTER VARYING(13),
    cve_usuario CHARACTER VARYING(20) NOT NULL,
    telefono CHARACTER VARYING(10),
    area CHARACTER VARYING(100),
    usuario CHARACTER VARYING(50) UNIQUE NOT NULL,
    email CHARACTER VARYING(150) NOT NULL,
    password CHARACTER VARYING(150) NOT NULL,
    cambiar_password BOOLEAN DEFAULT true NOT NULL,
    estatus BOOLEAN DEFAULT true NOT NULL,
    intentos integer,
    created_at TIMESTAMP(0) WITHOUT TIME ZONE,
    updated_at TIMESTAMP(0) WITHOUT TIME ZONE
);

DROP TABLE IF EXISTS public.permissions;
CREATE TABLE public.permissions (
    id BIGINT NOT NULL,
    name CHARACTER VARYING(200) UNIQUE NOT NULL,
    guard_name CHARACTER VARYING(100) NOT NULL,
    descrip CHARACTER VARYING(250),
    created_at TIMESTAMP(0) WITHOUT TIME ZONE,
    updated_at TIMESTAMP(0) WITHOUT TIME ZONE
);

DROP TABLE IF EXISTS public.roles;
CREATE TABLE public.roles (
    id BIGINT NOT NULL,
    name CHARACTER VARYING(200) UNIQUE NOT NULL,
    guard_name CHARACTER VARYING(100) NOT NULL,
    descrip CHARACTER VARYING(250),
    created_at TIMESTAMP(0) WITHOUT TIME ZONE,
    updated_at TIMESTAMP(0) WITHOUT TIME ZONE
);

DROP TABLE IF EXISTS public.role_has_permissions;
CREATE TABLE public.role_has_permissions (
    permission_id BIGINT NOT NULL,
    role_id BIGINT NOT NULL
);

DROP TABLE IF EXISTS public.model_has_permissions;
CREATE TABLE public.model_has_permissions(
    permission_id BIGINT NOT NULL,
    model_type CHARACTER VARYING(250) NOT NULL,
    model_id BIGINT NOT NULL
);

DROP TABLE IF EXISTS public.model_has_roles;
CREATE TABLE public.model_has_roles(
    role_id BIGINT NOT NULL,
    model_type CHARACTER VARYING(250) NOT NULL,
    model_id BIGINT NOT NULL
);

DROP TABLE IF EXISTS public.areas;
CREATE TABLE public.areas (
    id BIGINT NOT NULL,
    nombre CHARACTER VARYING(150) NOT NULL,
    cve_area CHARACTER VARYING(100) UNIQUE NOT NULL,
    estatus BOOLEAN NOT NULL DEFAULT true,
    created_user_id BIGINT,
    updated_user_id BIGINT,
    created_at TIMESTAMP(0) WITHOUT TIME ZONE,
    updated_at TIMESTAMP(0) WITHOUT TIME ZONE
);

DROP TABLE IF EXISTS public.bitacora_usuarios;
CREATE TABLE public.bitacora_usuarios (
    id BIGINT NOT NULL,
    session JSON,
    ip CHARACTER VARYING(20),
    url CHARACTER VARYING(500),
    path CHARACTER VARYING(200),
    metodo CHARACTER VARYING(100),
    user_id BIGINT,
    usuario CHARACTER VARYING(100),
    data JSON,
    accion CHARACTER VARYING(100),
    created_at TIMESTAMP(0) WITHOUT TIME ZONE
);

DROP TABLE IF EXISTS public.bitacora_log;
CREATE TABLE public.bitacora_log (
    id BIGINT,
    class CHARACTER VARYING(100),
    file CHARACTER VARYING(200),
    line CHARACTER VARYING(20),
    message CHARACTER VARYING(2000),
    description CHARACTER VARYING(200),
    tipo CHARACTER VARYING(200),
    created_at TIMESTAMP(0) WITHOUT TIME ZONE
);

DROP TABLE IF EXISTS public.users_monitorings;
CREATE TABLE public.users_monitorings (
    id BIGINT NOT NULL,
    ip CHARACTER VARYING(20),
    user_id BIGINT,
    usuario CHARACTER VARYING(100),
    accion CHARACTER VARYING(100),
    created_at TIMESTAMP(0) WITHOUT TIME ZONE
);

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);

ALTER TABLE ONLY public.roles ALTER COLUMN id SET DEFAULT nextval('public.roles_id_seq'::regclass);

ALTER TABLE ONLY public.permissions ALTER COLUMN id SET DEFAULT nextval('public.permissions_id_seq'::regclass);

ALTER TABLE ONLY public.areas ALTER COLUMN id SET DEFAULT nextval('public.areas_id_seq'::regclass);

ALTER TABLE ONLY public.bitacora_usuarios ALTER COLUMN id SET DEFAULT nextval('public.bitacora_usuarios_id_seq'::regclass);

ALTER TABLE ONLY public.bitacora_log ALTER COLUMN id SET DEFAULT nextval('public.bitacora_log_id_seq'::regclass);

ALTER TABLE ONLY public.users_monitorings ALTER COLUMN id SET DEFAULT nextval('public.users_monitorings_id_seq'::regclass);

SELECT pg_catalog.setval('public.users_id_seq', 1, false);

SELECT pg_catalog.setval('public.roles_id_seq', 1, false);

SELECT pg_catalog.setval('public.permissions_id_seq', 1, false);

SELECT pg_catalog.setval('public.areas_id_seq', 1, false);

SELECT pg_catalog.setval('public.bitacora_usuarios_id_seq', 1, false);

SELECT pg_catalog.setval('public.bitacora_log_id_seq', 1, false);

SELECT pg_catalog.setval('public.users_monitorings_id_seq', 1, false);

ALTER TABLE ONLY public.users ADD CONSTRAINT users_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.roles ADD CONSTRAINT roles_pk PRIMARY KEY (id);

ALTER TABLE ONLY public.permissions ADD CONSTRAINT permissions_pk PRIMARY KEY (id);

ALTER TABLE ONLY public.role_has_permissions ADD CONSTRAINT role_has_permissions__pk PRIMARY KEY (permission_id, role_id); 

ALTER TABLE ONLY public.model_has_permissions ADD CONSTRAINT model_has_permissions_pk PRIMARY KEY (permission_id, model_id, model_type);

ALTER TABLE ONLY public.model_has_roles ADD CONSTRAINT model_has_roles_pk PRIMARY KEY (role_id, model_type, model_id);

ALTER TABLE ONLY public.areas ADD CONSTRAINT areas_id_pk PRIMARY KEY (id);

ALTER TABLE ONLY public.bitacora_usuarios ADD CONSTRAINT bitacora_usuarios_id_pk PRIMARY KEY (id);

ALTER TABLE ONLY public.bitacora_log ADD CONSTRAINT bitacora_log_id_pk PRIMARY KEY (id);

ALTER TABLE ONLY public.users_monitorings ADD CONSTRAINT users_monitorings_id_pk PRIMARY KEY (id);

CREATE INDEX model_has_permissions_model_id_model_type_index ON public.model_has_permissions USING btree (model_id, model_type);

CREATE INDEX model_has_roles_model_type_model_id_index ON public.model_has_roles USING btree (model_type, model_id);

ALTER TABLE ONLY public.role_has_permissions
    ADD CONSTRAINT role_has_permissions_role_id_foreign FOREIGN KEY (role_id) REFERENCES public.roles(id) ON DELETE CASCADE;

ALTER TABLE ONLY public.role_has_permissions
    ADD CONSTRAINT role_has_permissions_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES public.permissions(id) ON DELETE CASCADE;

ALTER TABLE ONLY public.model_has_roles
    ADD CONSTRAINT model_has_roles_role_id_foreign FOREIGN KEY (role_id) REFERENCES public.roles(id) ON DELETE CASCADE;

ALTER TABLE ONLY public.model_has_permissions
    ADD CONSTRAINT model_has_permissions_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES public.permissions(id) ON DELETE CASCADE;

ALTER TABLE ONLY public.areas
    ADD CONSTRAINT areas_created_user_id_foreign FOREIGN KEY (created_user_id) REFERENCES public.users(id);

ALTER TABLE ONLY public.areas   
    ADD CONSTRAINT areas_updated_user_id_foreign FOREIGN KEY (updated_user_id) REFERENCES public.users(id);

ALTER TABLE ONLY public.bitacora_usuarios
    ADD CONSTRAINT bitacora_usuarios_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id);

COMMIT;
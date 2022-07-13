
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

DROP SEQUENCE IF EXISTS public.proveedores_id_seq;
CREATE SEQUENCE public.proveedores_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

DROP SEQUENCE IF EXISTS public.categorias_id_seq;
CREATE SEQUENCE public.categorias_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

DROP SEQUENCE IF EXISTS public.productos_id_seq;
CREATE SEQUENCE public.productos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

DROP SEQUENCE IF EXISTS public.inventario_entradas_id_seq;
CREATE SEQUENCE public.inventario_entradas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

DROP SEQUENCE IF EXISTS public.inventario_salidas_id_seq;
CREATE SEQUENCE public.inventario_salidas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

DROP SEQUENCE IF EXISTS public.inventario_entradas_anexos_id_seq;
CREATE SEQUENCE public.inventario_entradas_anexos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

DROP SEQUENCE IF EXISTS public.inventario_entradas_facturas_id_seq;
CREATE SEQUENCE public.inventario_entradas_facturas_id_seq
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
    area CHARACTER VARYING(100) NOT NULL,
    usuario CHARACTER VARYING(50) UNIQUE NOT NULL,
    email CHARACTER VARYING(150) NOT NULL,
    password CHARACTER VARYING(150) NOT NULL,
    cambiar_password BOOLEAN DEFAULT true NOT NULL,
    estatus BOOLEAN DEFAULT true NOT NULL,
    intentos SMALLINT,
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

DROP TABLE IF EXISTS public.proveedores;
CREATE TABLE public.proveedores (
    id BIGINT NOT NULL,
    nombre CHARACTER VARYING(250) NOT NULL,
    rfc CHARACTER VARYING(50) UNIQUE NOT NULL,
    telefono CHARACTER VARYING(15) NOT NULL,
    extension CHARACTER VARYING(10),
    direccion CHARACTER VARYING(250),
    email CHARACTER VARYING(150) NOT NULL,
    estatus BOOLEAN NOT NULL DEFAULT TRUE,
    created_user_id BIGINT,
    updated_user_id BIGINT,
    created_at TIMESTAMP(0) WITHOUT TIME ZONE,
    updated_at TIMESTAMP(0) WITHOUT TIME ZONE
);

DROP TABLE IF EXISTS public.categorias;
CREATE TABLE public.categorias (
    id BIGINT NOT NULL,
    nombre CHARACTER VARYING(250) NOT NULL,
    cve_cat CHARACTER VARYING(50) UNIQUE NOT NULL,
    estatus BOOLEAN NOT NULL DEFAULT TRUE,
    created_user_id BIGINT,
    updated_user_id BIGINT,
    created_at TIMESTAMP(0) WITHOUT TIME ZONE,
    updated_at TIMESTAMP(0) WITHOUT TIME ZONE
);

DROP TABLE IF EXISTS public.productos;
CREATE TABLE public.productos (
    id BIGINT NOT NULL,
    nombre CHARACTER VARYING(255) NOT NULL,
    descrip_gral TEXT,
    descrip_tec TEXT,
    modelo CHARACTER VARYING(255),
    marca CHARACTER VARYING(255),
    proveedor_id BIGINT NOT NULL,
    codigo CHARACTER VARYING(255) UNIQUE NOT NULL,
    precio_compra DECIMAL(10,2) NOT NULL,
    precio_venta DECIMAL(10,2) NOT NULL,
    cantidad SMALLINT,
    categoria_id BIGINT NOT NULL,
    estatus BOOLEAN NOT NULL DEFAULT TRUE,
    created_user_id BIGINT,
    updated_user_id BIGINT,
    created_at TIMESTAMP(0) WITHOUT TIME ZONE,
    updated_at TIMESTAMP(0) WITHOUT TIME ZONE
);

DROP TABLE IF EXISTS public.inventario_entradas;
CREATE TABLE public.inventario_entradas (
    id BIGINT NOT NULL,
    cve_entrada CHARACTER VARYING(255) UNIQUE NOT NULL,
    proveedor_id BIGINT NOT NULL,
    factura CHARACTER VARYING(255) UNIQUE NOT NULL,
    fac_fecha_emision DATE,
    fac_fecha_operacion DATE,
    fac_path CHARACTER VARYING(255),
    fac_subtotal DECIMAL(10,2) NOT NULL,
    fac_impuestos DECIMAL(10,2) NOT NULL,
    fac_extras DECIMAL(10,2),
    fac_total DECIMAL(10,2) NOT NULL,
    fac_total_letra CHARACTER VARYING(255) NOT NULL, 
    fac_forma_pago CHARACTER VARYING(100) NOT NULL,
    fac_metodo_pago CHARACTER VARYING(100) NOT NULL,
    fac_notas TEXT,
    entrada_notas TEXT,
    fecha_recepcion DATE,
    consecutivo SMALLINT,
    created_user CHARACTER VARYING(100) NOT NULL,
    updated_user CHARACTER VARYING(100) NOT NULL,
    created_at TIMESTAMP(0) WITHOUT TIME ZONE,
    updated_at TIMESTAMP(0) WITHOUT TIME ZONE
);

DROP TABLE IF EXISTS public.inventario_entradas_anexos;
CREATE TABLE public.inventario_entradas_anexos (
    id BIGINT NOT NULL,
    consecutivo SMALLINT NOT NULL,
    entrada_id BIGINT,
    fac_forma_pago CHARACTER VARYING(100) NOT NULL,
    fac_parcialidad SMALLINT NOT NULL,
    fac_saldo_anterior DECIMAL(10,2) NOT NULL,
    fac_saldo_insoluto DECIMAL(10,2) NOT NULL,
    fac_total_letra CHARACTER VARYING(255) NOT NULL, 
    fac_fecha_emision DATE,
    fac_fecha_operacion DATE,
    fac_path CHARACTER VARYING(255),
    fac_notas TEXT,
    anexo_notas TEXT,
    estatus BOOLEAN NOT NULL DEFAULT TRUE,
    created_user CHARACTER VARYING(100) NOT NULL,
    updated_user CHARACTER VARYING(100) NOT NULL,
    created_at TIMESTAMP(0) WITHOUT TIME ZONE,
    updated_at TIMESTAMP(0) WITHOUT TIME ZONE
);

DROP TABLE IF EXISTS public.inventario_entradas_facturas;
CREATE TABLE public.inventario_entradas_facturas (
    id BIGINT NOT NULL,
    entrada_anexo BIGINT,
    nombre CHARACTER VARYING(255),
    path CHARACTER VARYING(255),
    estatus BOOLEAN NOT NULL DEFAULT TRUE,
    created_user_id BIGINT,
    updated_user_id BIGINT,
    created_at TIMESTAMP(0) WITHOUT TIME ZONE,
    updated_at TIMESTAMP(0) WITHOUT TIME ZONE
);

DROP TABLE IF EXISTS public.inventario_entradas_productos;
CREATE TABLE public.inventario_entradas_productos (
    entrada_id BIGINT,
    producto_id BIGINT,
    cantidad SMALLINT,
    costo_total DECIMAL(10,2),
    comentario TEXT
);

-------------------------------------------
--------ADD SEQUENCE TO ID--------------
-------------------------------------------

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);

ALTER TABLE ONLY public.roles ALTER COLUMN id SET DEFAULT nextval('public.roles_id_seq'::regclass);

ALTER TABLE ONLY public.permissions ALTER COLUMN id SET DEFAULT nextval('public.permissions_id_seq'::regclass);

ALTER TABLE ONLY public.areas ALTER COLUMN id SET DEFAULT nextval('public.areas_id_seq'::regclass);

ALTER TABLE ONLY public.bitacora_usuarios ALTER COLUMN id SET DEFAULT nextval('public.bitacora_usuarios_id_seq'::regclass);

ALTER TABLE ONLY public.bitacora_log ALTER COLUMN id SET DEFAULT nextval('public.bitacora_log_id_seq'::regclass);

ALTER TABLE ONLY public.users_monitorings ALTER COLUMN id SET DEFAULT nextval('public.users_monitorings_id_seq'::regclass);

ALTER TABLE ONLY public.proveedores ALTER COLUMN id SET DEFAULT nextval('public.proveedores_id_seq'::regclass);

ALTER TABLE ONLY public.categorias ALTER COLUMN id SET DEFAULT nextval('public.categorias_id_seq'::regclass);

ALTER TABLE ONLY public.productos ALTER COLUMN id SET DEFAULT nextval('public.productos_id_seq'::regclass);

ALTER TABLE ONLY public.inventario_entradas ALTER COLUMN id SET DEFAULT nextval('public.inventario_entradas_id_seq'::regclass);

ALTER TABLE ONLY public.inventario_entradas_anexos ALTER COLUMN id SET DEFAULT nextval('public.inventario_entradas_anexos_id_seq'::regclass);

ALTER TABLE ONLY public.inventario_entradas_facturas ALTER COLUMN id SET DEFAULT nextval('public.inventario_entradas_facturas_id_seq'::regclass);

SELECT pg_catalog.setval('public.users_id_seq', 1, false);

SELECT pg_catalog.setval('public.roles_id_seq', 1, false);

SELECT pg_catalog.setval('public.permissions_id_seq', 1, false);

SELECT pg_catalog.setval('public.areas_id_seq', 1, false);

SELECT pg_catalog.setval('public.bitacora_usuarios_id_seq', 1, false);

SELECT pg_catalog.setval('public.bitacora_log_id_seq', 1, false);

SELECT pg_catalog.setval('public.users_monitorings_id_seq', 1, false);

SELECT pg_catalog.setval('public.proveedores_id_seq', 1, false);

SELECT pg_catalog.setval('public.categorias_id_seq', 1, false);

SELECT pg_catalog.setval('public.productos_id_seq', 1, false);

SELECT pg_catalog.setval('public.inventario_entradas_id_seq', 1, false);

SELECT pg_catalog.setval('public.inventario_entradas_anexos_id_seq', 1, false);

SELECT pg_catalog.setval('public.inventario_entradas_facturas_id_seq', 1, false);

-------------------------------------------
--------ADD PRIMARY KEY TO ID-----------
-------------------------------------------

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

ALTER TABLE ONLY public.proveedores ADD CONSTRAINT proveedores_id_pk PRIMARY KEY (id);

ALTER TABLE ONLY public.categorias ADD CONSTRAINT categorias_id_pk PRIMARY KEY (id);

ALTER TABLE ONLY public.productos ADD CONSTRAINT productos_id_pk PRIMARY KEY (id);

ALTER TABLE ONLY public.inventario_entradas ADD CONSTRAINT inventario_entradas_id_pk PRIMARY KEY (id);

ALTER TABLE ONLY public.inventario_entradas_anexos ADD CONSTRAINT inventario_entradas_anexos_id_pk PRIMARY KEY (id);

ALTER TABLE ONLY public.inventario_entradas_facturas ADD CONSTRAINT inventario_entradas_facturas_id_pk PRIMARY KEY (id);

-------------------------------------------
--------ADD INDEXES------------------------
-------------------------------------------

CREATE INDEX model_has_permissions_model_id_model_type_index ON public.model_has_permissions USING btree (model_id, model_type);

CREATE INDEX model_has_roles_model_type_model_id_index ON public.model_has_roles USING btree (model_type, model_id);

-------------------------------------------
--------ADD FOREIGN KEY--------------------
-------------------------------------------

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

ALTER TABLE ONLY public.proveedores
    ADD CONSTRAINT proveedores_created_user_id_foreign FOREIGN KEY (created_user_id) REFERENCES public.users(id);

ALTER TABLE ONLY public.proveedores
    ADD CONSTRAINT proveedores_updated_user_id_foreign FOREIGN KEY (updated_user_id) REFERENCES public.users(id);

ALTER TABLE ONLY public.categorias
    ADD CONSTRAINT catalogos_created_user_id_foreign FOREIGN KEY (created_user_id) REFERENCES public.users(id);

ALTER TABLE ONLY public.categorias
    ADD CONSTRAINT catalogos_updated_user_id_foreign FOREIGN KEY (updated_user_id) REFERENCES public.users(id);

ALTER TABLE ONLY public.productos
    ADD CONSTRAINT productos_categoria_id_foreign FOREIGN KEY (categoria_id) REFERENCES public.categorias(id);

ALTER TABLE ONLY public.productos
    ADD CONSTRAINT productos_proveedor_id_foreign FOREIGN KEY (proveedor_id) REFERENCES public.proveedores(id);

ALTER TABLE ONLY public.productos
    ADD CONSTRAINT productos_created_user_id_foreign FOREIGN KEY (created_user_id) REFERENCES public.users(id);

ALTER TABLE ONLY public.productos
    ADD CONSTRAINT productos_updated_user_id_foreign FOREIGN KEY (updated_user_id) REFERENCES public.users(id);

ALTER TABLE ONLY public.inventario_entradas
    ADD CONSTRAINT iventario_entradas_proveedor_id_foreign FOREIGN KEY (proveedor_id) REFERENCES public.proveedores(id);

ALTER TABLE ONLY public.inventario_entradas_anexos
    ADD CONSTRAINT inventario_entradas_anexos_entrada_id FOREIGN KEY (entrada_id) REFERENCES public.inventario_entradas(id);

ALTER TABLE ONLY public.inventario_entradas_facturas
    ADD CONSTRAINT inventario_entradas_facturas_entrada_anexo FOREIGN KEY (entrada_anexo) REFERENCES public.inventario_entradas_anexos(id);

ALTER TABLE ONLY public.inventario_entradas_productos
    ADD CONSTRAINT inventario_entradas_productos_entrada_id_foreign FOREIGN KEY (entrada_id) REFERENCES public.inventario_entradas(id);

ALTER TABLE ONLY public.inventario_entradas_productos
    ADD CONSTRAINT inventario_salidas_productos_producto_id_foreign FOREIGN KEY (producto_id) REFERENCES public.productos(id);
COMMIT;
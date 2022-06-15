/*
 Navicat Premium Data Transfer

 Source Server         : 6
 Source Server Type    : PostgreSQL
 Source Server Version : 110007
 Source Host           : 
 Source Catalog        : scg_
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 110007
 File Encoding         : 65001

 Date: 28/04/2022 06:41:06
*/


-- ----------------------------
-- Sequence structure for acciones_id_accion_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."acciones_id_accion_seq";
CREATE SEQUENCE "public"."acciones_id_accion_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."acciones_id_accion_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for alertas_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."alertas_id_seq";
CREATE SEQUENCE "public"."alertas_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."alertas_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for bitacora_efirma_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."bitacora_efirma_id_seq";
CREATE SEQUENCE "public"."bitacora_efirma_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."bitacora_efirma_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for bitacora_logs_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."bitacora_logs_id_seq";
CREATE SEQUENCE "public"."bitacora_logs_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."bitacora_logs_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for bitacora_usuarios_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."bitacora_usuarios_id_seq";
CREATE SEQUENCE "public"."bitacora_usuarios_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."bitacora_usuarios_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for cat_dirgenerales_id_dirgeneral_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."cat_dirgenerales_id_dirgeneral_seq";
CREATE SEQUENCE "public"."cat_dirgenerales_id_dirgeneral_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."cat_dirgenerales_id_dirgeneral_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for cat_master_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."cat_master_id_seq";
CREATE SEQUENCE "public"."cat_master_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."cat_master_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for comentarios_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."comentarios_id_seq";
CREATE SEQUENCE "public"."comentarios_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."comentarios_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for dependencia_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."dependencia_id_seq";
CREATE SEQUENCE "public"."dependencia_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."dependencia_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for directorio_id_direccion_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."directorio_id_direccion_seq";
CREATE SEQUENCE "public"."directorio_id_direccion_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."directorio_id_direccion_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for doc_salida_anexos_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."doc_salida_anexos_id_seq";
CREATE SEQUENCE "public"."doc_salida_anexos_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."doc_salida_anexos_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for docsal_descargo_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."docsal_descargo_id_seq";
CREATE SEQUENCE "public"."docsal_descargo_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."docsal_descargo_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for docsal_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."docsal_id_seq";
CREATE SEQUENCE "public"."docsal_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."docsal_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for documento_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."documento_id_seq";
CREATE SEQUENCE "public"."documento_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."documento_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for documento_template_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."documento_template_id_seq";
CREATE SEQUENCE "public"."documento_template_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."documento_template_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for encuesta_usuarios_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."encuesta_usuarios_id_seq";
CREATE SEQUENCE "public"."encuesta_usuarios_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."encuesta_usuarios_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for expediente_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."expediente_id_seq";
CREATE SEQUENCE "public"."expediente_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."expediente_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for faqs_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."faqs_id_seq";
CREATE SEQUENCE "public"."faqs_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."faqs_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for folios_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."folios_id_seq";
CREATE SEQUENCE "public"."folios_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."folios_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for mensajes_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."mensajes_id_seq";
CREATE SEQUENCE "public"."mensajes_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."mensajes_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for menus_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."menus_id_seq";
CREATE SEQUENCE "public"."menus_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."menus_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for model_deleted_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."model_deleted_id_seq";
CREATE SEQUENCE "public"."model_deleted_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."model_deleted_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for model_has_menu_permissions_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."model_has_menu_permissions_id_seq";
CREATE SEQUENCE "public"."model_has_menu_permissions_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."model_has_menu_permissions_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for notificacion_id_sequence
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."notificacion_id_sequence";
CREATE SEQUENCE "public"."notificacion_id_sequence" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."notificacion_id_sequence" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for notificaciones_diarias_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."notificaciones_diarias_id_seq";
CREATE SEQUENCE "public"."notificaciones_diarias_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."notificaciones_diarias_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for periodos_anuales_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."periodos_anuales_id_seq";
CREATE SEQUENCE "public"."periodos_anuales_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."periodos_anuales_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for permisos_especiales_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."permisos_especiales_id_seq";
CREATE SEQUENCE "public"."permisos_especiales_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."permisos_especiales_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for permissions_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."permissions_id_seq";
CREATE SEQUENCE "public"."permissions_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."permissions_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for prueba
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."prueba";
CREATE SEQUENCE "public"."prueba" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."prueba" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for respuesta_comentarios_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."respuesta_comentarios_id_seq";
CREATE SEQUENCE "public"."respuesta_comentarios_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."respuesta_comentarios_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for roles_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."roles_id_seq";
CREATE SEQUENCE "public"."roles_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."roles_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for scg_dgou_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."scg_dgou_seq";
CREATE SEQUENCE "public"."scg_dgou_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."scg_dgou_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for scg_ofs_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."scg_ofs_seq";
CREATE SEQUENCE "public"."scg_ofs_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."scg_ofs_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for secuencia_relaciones_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."secuencia_relaciones_id_seq";
CREATE SEQUENCE "public"."secuencia_relaciones_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."secuencia_relaciones_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for telescope_entries_sequence_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."telescope_entries_sequence_seq";
CREATE SEQUENCE "public"."telescope_entries_sequence_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."telescope_entries_sequence_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for template_documento_turno_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."template_documento_turno_id_seq";
CREATE SEQUENCE "public"."template_documento_turno_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."template_documento_turno_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for templates_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."templates_id_seq";
CREATE SEQUENCE "public"."templates_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."templates_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for users_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."users_id_seq";
CREATE SEQUENCE "public"."users_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."users_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for users_monitorings_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."users_monitorings_id_seq";
CREATE SEQUENCE "public"."users_monitorings_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
ALTER SEQUENCE "public"."users_monitorings_id_seq" OWNER TO "postgres";

-- ----------------------------
-- Table structure for alertas
-- ----------------------------
DROP TABLE IF EXISTS "public"."alertas";
CREATE TABLE "public"."alertas" (
  "id" int8 NOT NULL DEFAULT nextval('alertas_id_seq'::regclass),
  "sistema_id" int4 NOT NULL,
  "user_id" int4 NOT NULL,
  "asunto" text COLLATE "pg_catalog"."default" NOT NULL,
  "resumen" text COLLATE "pg_catalog"."default",
  "lnk_sistema" varchar(255) COLLATE "pg_catalog"."default",
  "tipo_notificacion_id" int4 NOT NULL,
  "rfc" varchar(13) COLLATE "pg_catalog"."default",
  "estatus_id" int4 NOT NULL,
  "activo" bool NOT NULL DEFAULT true,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "icons" varchar COLLATE "pg_catalog"."default",
  "mensaje_id" int4
)
;
ALTER TABLE "public"."alertas" OWNER TO "postgres";

-- ----------------------------
-- Table structure for bitacora_efirma
-- ----------------------------
DROP TABLE IF EXISTS "public"."bitacora_efirma";
CREATE TABLE "public"."bitacora_efirma" (
  "id" int8 NOT NULL DEFAULT nextval('bitacora_efirma_id_seq'::regclass),
  "rfc" varchar(13) COLLATE "pg_catalog"."default",
  "response" json NOT NULL,
  "status_ws" varchar(15) COLLATE "pg_catalog"."default" NOT NULL,
  "method" varchar(40) COLLATE "pg_catalog"."default" NOT NULL,
  "ip" varchar(12) COLLATE "pg_catalog"."default" NOT NULL,
  "error_description" varchar(250) COLLATE "pg_catalog"."default",
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "public"."bitacora_efirma" OWNER TO "postgres";

-- ----------------------------
-- Table structure for bitacora_logs
-- ----------------------------
DROP TABLE IF EXISTS "public"."bitacora_logs";
CREATE TABLE "public"."bitacora_logs" (
  "id" int8 NOT NULL DEFAULT nextval('bitacora_logs_id_seq'::regclass),
  "class_info" varchar(100) COLLATE "pg_catalog"."default",
  "file" varchar(200) COLLATE "pg_catalog"."default",
  "line" varchar(20) COLLATE "pg_catalog"."default",
  "message" varchar(2000) COLLATE "pg_catalog"."default",
  "description" varchar(200) COLLATE "pg_catalog"."default",
  "tipo" varchar(200) COLLATE "pg_catalog"."default",
  "created_at" timestamp(0) NOT NULL
)
;
ALTER TABLE "public"."bitacora_logs" OWNER TO "postgres";

-- ----------------------------
-- Table structure for bitacora_usuarios
-- ----------------------------
DROP TABLE IF EXISTS "public"."bitacora_usuarios";
CREATE TABLE "public"."bitacora_usuarios" (
  "id" int8 NOT NULL DEFAULT nextval('bitacora_usuarios_id_seq'::regclass),
  "session" json,
  "client_ip" varchar(30) COLLATE "pg_catalog"."default",
  "url" varchar(500) COLLATE "pg_catalog"."default" NOT NULL,
  "path" varchar(200) COLLATE "pg_catalog"."default" NOT NULL,
  "method" varchar(50) COLLATE "pg_catalog"."default",
  "data" json,
  "user_id" int8,
  "user" varchar(40) COLLATE "pg_catalog"."default",
  "action" varchar(50) COLLATE "pg_catalog"."default",
  "folio" varchar(50) COLLATE "pg_catalog"."default",
  "created_at" timestamp(0) NOT NULL
)
;
ALTER TABLE "public"."bitacora_usuarios" OWNER TO "postgres";

-- ----------------------------
-- Table structure for cat_dirgenerales
-- ----------------------------
DROP TABLE IF EXISTS "public"."cat_dirgenerales";
CREATE TABLE "public"."cat_dirgenerales" (
  "id_dirgeneral" int4 NOT NULL DEFAULT nextval('cat_dirgenerales_id_dirgeneral_seq'::regclass),
  "cve_dir" varchar(10) COLLATE "pg_catalog"."default" NOT NULL,
  "nombre_dir" varchar(150) COLLATE "pg_catalog"."default" NOT NULL,
  "area" varchar(6) COLLATE "pg_catalog"."default",
  "nombre_seq" varchar(20) COLLATE "pg_catalog"."default",
  "activo" varchar(1) COLLATE "pg_catalog"."default" NOT NULL
)
;
ALTER TABLE "public"."cat_dirgenerales" OWNER TO "postgres";

-- ----------------------------
-- Table structure for cat_master
-- ----------------------------
DROP TABLE IF EXISTS "public"."cat_master";
CREATE TABLE "public"."cat_master" (
  "id" int4 NOT NULL DEFAULT nextval('cat_master_id_seq'::regclass),
  "catalogo" varchar(40) COLLATE "pg_catalog"."default" NOT NULL,
  "etiqueta" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "clave" varchar(40) COLLATE "pg_catalog"."default",
  "descripcion" varchar(100) COLLATE "pg_catalog"."default",
  "orden" int4,
  "padre_id" int4,
  "activo" bool NOT NULL DEFAULT true,
  "user_add_id" int8 NOT NULL,
  "user_mod_id" int8,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "public"."cat_master" OWNER TO "postgres";

-- ----------------------------
-- Table structure for comentarios
-- ----------------------------
DROP TABLE IF EXISTS "public"."comentarios";
CREATE TABLE "public"."comentarios" (
  "id" int4 NOT NULL DEFAULT nextval('comentarios_id_seq'::regclass),
  "de" varchar(200) COLLATE "pg_catalog"."default" NOT NULL,
  "para" text COLLATE "pg_catalog"."default" NOT NULL,
  "cc" varchar(200) COLLATE "pg_catalog"."default",
  "bcc" varchar(200) COLLATE "pg_catalog"."default",
  "email" varchar(40) COLLATE "pg_catalog"."default" NOT NULL,
  "telefono" varchar(40) COLLATE "pg_catalog"."default",
  "extension" varchar(40) COLLATE "pg_catalog"."default",
  "asunto" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "mensaje" text COLLATE "pg_catalog"."default" NOT NULL,
  "marca_leido" bool NOT NULL DEFAULT false,
  "marca_importante" bool NOT NULL DEFAULT false,
  "activo" bool NOT NULL DEFAULT true,
  "enviado_mesa_servicio" bool NOT NULL DEFAULT false,
  "created_user_id" int8,
  "updated_user_id" int8,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "public"."comentarios" OWNER TO "postgres";

-- ----------------------------
-- Table structure for depe_buzon
-- ----------------------------
DROP TABLE IF EXISTS "public"."depe_buzon";
CREATE TABLE "public"."depe_buzon" (
  "clave" varchar(8) COLLATE "pg_catalog"."default",
  "base_datos" varchar(20) COLLATE "pg_catalog"."default",
  "prop_base" varchar(15) COLLATE "pg_catalog"."default",
  "tipo_reg" varchar(1) COLLATE "pg_catalog"."default"
)
;
ALTER TABLE "public"."depe_buzon" OWNER TO "postgres";

-- ----------------------------
-- Table structure for dependencia
-- ----------------------------
DROP TABLE IF EXISTS "public"."dependencia";
CREATE TABLE "public"."dependencia" (
  "cve_depe" varchar(8) COLLATE "pg_catalog"."default" NOT NULL,
  "siglas" varchar(8) COLLATE "pg_catalog"."default",
  "nom_depe" varchar(150) COLLATE "pg_catalog"."default" NOT NULL,
  "tel_depe" varchar(50) COLLATE "pg_catalog"."default",
  "dir_depe" varchar(70) COLLATE "pg_catalog"."default",
  "nom_titu" varchar(50) COLLATE "pg_catalog"."default",
  "car_titu" varchar(150) COLLATE "pg_catalog"."default",
  "titulo_titu" varchar(20) COLLATE "pg_catalog"."default",
  "orden" int2,
  "baja" varchar(1) COLLATE "pg_catalog"."default",
  "email" varchar(100) COLLATE "pg_catalog"."default",
  "area" varchar(15) COLLATE "pg_catalog"."default",
  "id" int4 NOT NULL DEFAULT nextval('dependencia_id_seq'::regclass)
)
;
ALTER TABLE "public"."dependencia" OWNER TO "postgres";

-- ----------------------------
-- Table structure for dirigido
-- ----------------------------
DROP TABLE IF EXISTS "public"."dirigido";
CREATE TABLE "public"."dirigido" (
  "clave" varchar(8) COLLATE "pg_catalog"."default" NOT NULL,
  "nombre" varchar(120) COLLATE "pg_catalog"."default" NOT NULL,
  "cargo" varchar(150) COLLATE "pg_catalog"."default",
  "baja" varchar(1) COLLATE "pg_catalog"."default",
  "area" varchar(6) COLLATE "pg_catalog"."default",
  "orden" int2,
  "created_user_id" int8,
  "updated_user_id" int8,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "public"."dirigido" OWNER TO "postgres";

-- ----------------------------
-- Table structure for doc_anexos
-- ----------------------------
DROP TABLE IF EXISTS "public"."doc_anexos";
CREATE TABLE "public"."doc_anexos" (
  "fol_orig" varchar(13) COLLATE "pg_catalog"."default" NOT NULL,
  "consec" int2 NOT NULL,
  "usuario" varchar(15) COLLATE "pg_catalog"."default" NOT NULL,
  "fecha" date NOT NULL DEFAULT now(),
  "nombre" varchar(80) COLLATE "pg_catalog"."default" NOT NULL,
  "comentario" varchar(250) COLLATE "pg_catalog"."default",
  "estatus" char(1) COLLATE "pg_catalog"."default",
  "es_principal" bool,
  "documento_id" int8,
  "path" varchar(120) COLLATE "pg_catalog"."default"
)
;
ALTER TABLE "public"."doc_anexos" OWNER TO "postgres";

-- ----------------------------
-- Table structure for doc_salida_anexos
-- ----------------------------
DROP TABLE IF EXISTS "public"."doc_salida_anexos";
CREATE TABLE "public"."doc_salida_anexos" (
  "cve_docto" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "consec" int2 NOT NULL,
  "usuario" varchar(15) COLLATE "pg_catalog"."default" NOT NULL,
  "fecha" date NOT NULL DEFAULT now(),
  "nombre" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "comentario" varchar(120) COLLATE "pg_catalog"."default" NOT NULL,
  "id" int8 NOT NULL DEFAULT nextval('doc_salida_anexos_id_seq'::regclass),
  "path" varchar(120) COLLATE "pg_catalog"."default"
)
;
ALTER TABLE "public"."doc_salida_anexos" OWNER TO "postgres";

-- ----------------------------
-- Table structure for docsal
-- ----------------------------
DROP TABLE IF EXISTS "public"."docsal";
CREATE TABLE "public"."docsal" (
  "fol_orig" varchar(13) COLLATE "pg_catalog"."default" NOT NULL,
  "conse" varchar(2) COLLATE "pg_catalog"."default",
  "fec_salid" date,
  "fec_comp" date,
  "fec_recdp" date,
  "cve_turn" varchar(15) COLLATE "pg_catalog"."default",
  "cve_depe" varchar(8) COLLATE "pg_catalog"."default" NOT NULL,
  "coment" text COLLATE "pg_catalog"."default",
  "cve_resp" varchar(1) COLLATE "pg_catalog"."default",
  "fec_regi" date,
  "fec_elab" date,
  "cve_docto" varchar(100) COLLATE "pg_catalog"."default",
  "txt_resp" text COLLATE "pg_catalog"."default",
  "cve_prom" varchar(8) COLLATE "pg_catalog"."default",
  "cve_remite" varchar(8) COLLATE "pg_catalog"."default",
  "cve_urge" varchar(1) COLLATE "pg_catalog"."default",
  "usua_sal" varchar(15) COLLATE "pg_catalog"."default",
  "modi_sal" varchar(15) COLLATE "pg_catalog"."default",
  "usua_resp" varchar(15) COLLATE "pg_catalog"."default",
  "modi_resp" varchar(15) COLLATE "pg_catalog"."default",
  "cve_ins" varchar(8) COLLATE "pg_catalog"."default",
  "transimp" varchar(1) COLLATE "pg_catalog"."default",
  "transresp" varchar(1) COLLATE "pg_catalog"."default",
  "confi" varchar(1) COLLATE "pg_catalog"."default",
  "especial" varchar(1) COLLATE "pg_catalog"."default",
  "viable" varchar(1) COLLATE "pg_catalog"."default",
  "meses_ced" varchar(12) COLLATE "pg_catalog"."default",
  "fec_notifica" date,
  "fec_acuseresp" date,
  "fec_envioresp" date,
  "fec_conclu" date,
  "califresp" varchar(1) COLLATE "pg_catalog"."default",
  "voboini" varchar(15) COLLATE "pg_catalog"."default",
  "acuso_turno" varchar(15) COLLATE "pg_catalog"."default",
  "acuso_resp" varchar(15) COLLATE "pg_catalog"."default",
  "fol_ext" varchar(10) COLLATE "pg_catalog"."default",
  "base_datos" varchar(20) COLLATE "pg_catalog"."default",
  "fecha_registro" timestamp(6) DEFAULT now(),
  "cve_req_resp" varchar(1) COLLATE "pg_catalog"."default",
  "id" int8 NOT NULL DEFAULT nextval('docsal_id_seq'::regclass),
  "documento_id" int8,
  "baja" bool DEFAULT false
)
;
ALTER TABLE "public"."docsal" OWNER TO "postgres";

-- ----------------------------
-- Table structure for docsal_descargo
-- ----------------------------
DROP TABLE IF EXISTS "public"."docsal_descargo";
CREATE TABLE "public"."docsal_descargo" (
  "id" int8 NOT NULL DEFAULT nextval('docsal_descargo_id_seq'::regclass),
  "docsal_id" int8 NOT NULL,
  "cve_turn" varchar(15) COLLATE "pg_catalog"."default",
  "cve_docto" varchar(100) COLLATE "pg_catalog"."default",
  "cve_resp" varchar(1) COLLATE "pg_catalog"."default" NOT NULL,
  "txt_resp" text COLLATE "pg_catalog"."default" NOT NULL,
  "fec_elab" date NOT NULL,
  "modi_resp" varchar(15) COLLATE "pg_catalog"."default",
  "modi_sal" varchar(15) COLLATE "pg_catalog"."default",
  "estatus" bool NOT NULL DEFAULT true,
  "principal" bool NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "public"."docsal_descargo" OWNER TO "postgres";

-- ----------------------------
-- Table structure for doctem
-- ----------------------------
DROP TABLE IF EXISTS "public"."doctem";
CREATE TABLE "public"."doctem" (
  "fol_orig" varchar(13) COLLATE "pg_catalog"."default",
  "cve_tema" varchar(8) COLLATE "pg_catalog"."default"
)
;
ALTER TABLE "public"."doctem" OWNER TO "postgres";

-- ----------------------------
-- Table structure for doctem_salida
-- ----------------------------
DROP TABLE IF EXISTS "public"."doctem_salida";
CREATE TABLE "public"."doctem_salida" (
  "cve_docto" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "cve_tema" varchar(8) COLLATE "pg_catalog"."default" NOT NULL
)
;
ALTER TABLE "public"."doctem_salida" OWNER TO "postgres";

-- ----------------------------
-- Table structure for documento
-- ----------------------------
DROP TABLE IF EXISTS "public"."documento";
CREATE TABLE "public"."documento" (
  "fol_orig" varchar(13) COLLATE "pg_catalog"."default" NOT NULL,
  "fec_regi" date,
  "fec_recep" timestamptz(6),
  "cve_docto" varchar(100) COLLATE "pg_catalog"."default",
  "fec_elab" date,
  "firmante" varchar(200) COLLATE "pg_catalog"."default",
  "cve_prom" int4,
  "cve_remite" varchar(8) COLLATE "pg_catalog"."default",
  "txt_resum" text COLLATE "pg_catalog"."default",
  "cve_expe" varchar(100) COLLATE "pg_catalog"."default",
  "nom_suje" varchar(254) COLLATE "pg_catalog"."default",
  "notas" varchar(254) COLLATE "pg_catalog"."default",
  "cve_segui" varchar(1) COLLATE "pg_catalog"."default",
  "cve_refe" varchar(30) COLLATE "pg_catalog"."default",
  "cve_recep" varchar(1) COLLATE "pg_catalog"."default",
  "usua_doc" varchar(15) COLLATE "pg_catalog"."default",
  "cve_eve" varchar(8) COLLATE "pg_catalog"."default",
  "fec_eve" date,
  "time_eve" time(6),
  "cve_tipo" varchar(8) COLLATE "pg_catalog"."default",
  "confi" varchar(1) COLLATE "pg_catalog"."default",
  "modifica" varchar(15) COLLATE "pg_catalog"."default",
  "cve_dirigido" varchar(8) COLLATE "pg_catalog"."default",
  "cargo_fmte" varchar(255) COLLATE "pg_catalog"."default",
  "nacional" varchar(1) COLLATE "pg_catalog"."default",
  "domicilio" varchar(60) COLLATE "pg_catalog"."default",
  "colonia" varchar(40) COLLATE "pg_catalog"."default",
  "delegacion" varchar(8) COLLATE "pg_catalog"."default",
  "codigo_post" varchar(6) COLLATE "pg_catalog"."default",
  "entidad" varchar(8) COLLATE "pg_catalog"."default",
  "telefono" varchar(50) COLLATE "pg_catalog"."default",
  "clasif" varchar(1) COLLATE "pg_catalog"."default",
  "antecedente" varchar(100) COLLATE "pg_catalog"."default",
  "fec_comp" date,
  "salida" varchar(1) COLLATE "pg_catalog"."default",
  "matricula" varchar(100) COLLATE "pg_catalog"."default",
  "anexos" varchar(260) COLLATE "pg_catalog"."default",
  "folio_op" varchar(15) COLLATE "pg_catalog"."default",
  "fecha_registro" timestamp(6) DEFAULT now(),
  "nvo_remitente" varchar(100) COLLATE "pg_catalog"."default",
  "id" int8 NOT NULL DEFAULT nextval('documento_id_seq'::regclass),
  "path" varchar(120) COLLATE "pg_catalog"."default"
)
;
ALTER TABLE "public"."documento" OWNER TO "postgres";

-- ----------------------------
-- Table structure for documento_salida
-- ----------------------------
DROP TABLE IF EXISTS "public"."documento_salida";
CREATE TABLE "public"."documento_salida" (
  "cve_docto" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "fec_elab" date NOT NULL,
  "fec_recep" date,
  "cve_remitente" varchar(15) COLLATE "pg_catalog"."default" NOT NULL,
  "cve_dirigido" varchar(200) COLLATE "pg_catalog"."default" NOT NULL,
  "cve_tipo" varchar(8) COLLATE "pg_catalog"."default",
  "anexos" text COLLATE "pg_catalog"."default",
  "cve_expe" varchar(30) COLLATE "pg_catalog"."default",
  "txt_resum" text COLLATE "pg_catalog"."default" NOT NULL,
  "cve_depe" varchar(8) COLLATE "pg_catalog"."default",
  "fec_regi" timestamp(6) NOT NULL DEFAULT now(),
  "estatus" int4,
  "cves_copia_conocimiento" varchar COLLATE "pg_catalog"."default"
)
;
ALTER TABLE "public"."documento_salida" OWNER TO "postgres";

-- ----------------------------
-- Table structure for documento_template
-- ----------------------------
DROP TABLE IF EXISTS "public"."documento_template";
CREATE TABLE "public"."documento_template" (
  "id" int8 NOT NULL DEFAULT nextval('documento_template_id_seq'::regclass),
  "id_usuario" int4 NOT NULL,
  "id_header" int4,
  "id_footer" int4 NOT NULL,
  "num_oficio" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "personal" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "encabezado" text COLLATE "pg_catalog"."default" NOT NULL,
  "cuerpo" text COLLATE "pg_catalog"."default",
  "status" bool NOT NULL DEFAULT false,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "firmado" bool NOT NULL DEFAULT false
)
;
ALTER TABLE "public"."documento_template" OWNER TO "postgres";

-- ----------------------------
-- Table structure for encuesta_usuarios
-- ----------------------------
DROP TABLE IF EXISTS "public"."encuesta_usuarios";
CREATE TABLE "public"."encuesta_usuarios" (
  "id" int8 NOT NULL DEFAULT nextval('encuesta_usuarios_id_seq'::regclass),
  "user_id" int8 NOT NULL,
  "user" varchar(40) COLLATE "pg_catalog"."default" NOT NULL,
  "folio" varchar(50) COLLATE "pg_catalog"."default",
  "periodo_id" int8 NOT NULL,
  "contestada" bool,
  "created_at" timestamp(0) NOT NULL,
  "referencia_encriptada" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(0)
)
;
ALTER TABLE "public"."encuesta_usuarios" OWNER TO "postgres";

-- ----------------------------
-- Table structure for estatus_documento_salida
-- ----------------------------
DROP TABLE IF EXISTS "public"."estatus_documento_salida";
CREATE TABLE "public"."estatus_documento_salida" (
  "cve_docto" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "estatus" varchar(1) COLLATE "pg_catalog"."default" NOT NULL,
  "fecha_estatus" timestamp(6) NOT NULL DEFAULT now()
)
;
ALTER TABLE "public"."estatus_documento_salida" OWNER TO "postgres";

-- ----------------------------
-- Table structure for expediente
-- ----------------------------
DROP TABLE IF EXISTS "public"."expediente";
CREATE TABLE "public"."expediente" (
  "id_cve" int2 NOT NULL DEFAULT nextval('expediente_id_seq'::regclass),
  "cve_depe" varchar(8) COLLATE "pg_catalog"."default",
  "cve_expe" varchar(100) COLLATE "pg_catalog"."default",
  "nom_expe" varchar(300) COLLATE "pg_catalog"."default",
  "cve_expe_corta" varchar(25) COLLATE "pg_catalog"."default",
  "area" varchar(6) COLLATE "pg_catalog"."default",
  "baja" varchar(1) COLLATE "pg_catalog"."default" DEFAULT '0'::character varying,
  "created_user_id" int8,
  "updated_user_id" int8,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "public"."expediente" OWNER TO "postgres";

-- ----------------------------
-- Table structure for faqs
-- ----------------------------
DROP TABLE IF EXISTS "public"."faqs";
CREATE TABLE "public"."faqs" (
  "id" int4 NOT NULL DEFAULT nextval('faqs_id_seq'::regclass),
  "pregunta" varchar(250) COLLATE "pg_catalog"."default" NOT NULL,
  "respuesta" text COLLATE "pg_catalog"."default" NOT NULL,
  "activo" bool NOT NULL DEFAULT true,
  "orden" int4,
  "usuario_alta_id" int4 NOT NULL,
  "usuario_actualiza_id" int4,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "public"."faqs" OWNER TO "postgres";

-- ----------------------------
-- Table structure for folios
-- ----------------------------
DROP TABLE IF EXISTS "public"."folios";
CREATE TABLE "public"."folios" (
  "id" int4 NOT NULL DEFAULT nextval('folios_id_seq'::regclass),
  "id_dirgeneral" int4 NOT NULL,
  "anio" int4 NOT NULL,
  "folio_inicial" int4 NOT NULL,
  "folio_actual" int4 NOT NULL,
  "created_at" timestamp(0) NOT NULL,
  "updated_at" timestamp(0)
)
;
ALTER TABLE "public"."folios" OWNER TO "postgres";

-- ----------------------------
-- Table structure for formatos_respuesta
-- ----------------------------
DROP TABLE IF EXISTS "public"."formatos_respuesta";
CREATE TABLE "public"."formatos_respuesta" (
  "id_formato" int2 NOT NULL,
  "formato" varchar(50) COLLATE "pg_catalog"."default" NOT NULL,
  "descripcion" varchar(50) COLLATE "pg_catalog"."default" NOT NULL,
  "activo" int2 NOT NULL DEFAULT 1
)
;
ALTER TABLE "public"."formatos_respuesta" OWNER TO "postgres";

-- ----------------------------
-- Table structure for instruccion
-- ----------------------------
DROP TABLE IF EXISTS "public"."instruccion";
CREATE TABLE "public"."instruccion" (
  "cve_ins" varchar(8) COLLATE "pg_catalog"."default" NOT NULL,
  "instruccion" varchar(150) COLLATE "pg_catalog"."default" NOT NULL,
  "tipo" varchar(1) COLLATE "pg_catalog"."default",
  "orden" varchar(3) COLLATE "pg_catalog"."default",
  "baja" varchar(1) COLLATE "pg_catalog"."default",
  "area" varchar(7) COLLATE "pg_catalog"."default",
  "created_user_id" int8,
  "updated_user_id" int8,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "public"."instruccion" OWNER TO "postgres";

-- ----------------------------
-- Table structure for mensajes
-- ----------------------------
DROP TABLE IF EXISTS "public"."mensajes";
CREATE TABLE "public"."mensajes" (
  "id" int8 NOT NULL DEFAULT nextval('mensajes_id_seq'::regclass),
  "mensaje" text COLLATE "pg_catalog"."default" NOT NULL,
  "leido" bool NOT NULL DEFAULT false,
  "comentario_id" int4,
  "activo" bool NOT NULL DEFAULT true,
  "created_user_id" int8 NOT NULL,
  "updated_user_id" int8,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "public"."mensajes" OWNER TO "postgres";

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS "public"."menus";
CREATE TABLE "public"."menus" (
  "id" int4 NOT NULL DEFAULT nextval('menus_id_seq'::regclass),
  "menu" varchar(150) COLLATE "pg_catalog"."default" NOT NULL,
  "slug" varchar(150) COLLATE "pg_catalog"."default" NOT NULL,
  "padre" int4 NOT NULL DEFAULT 0,
  "orden" int2 NOT NULL DEFAULT '0'::smallint,
  "activo" bool NOT NULL DEFAULT true,
  "descripcion" varchar(150) COLLATE "pg_catalog"."default",
  "ruta" varchar(50) COLLATE "pg_catalog"."default" NOT NULL,
  "ajax" varchar(2) COLLATE "pg_catalog"."default",
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "public"."menus" OWNER TO "postgres";

-- ----------------------------
-- Table structure for model_deleted
-- ----------------------------
DROP TABLE IF EXISTS "public"."model_deleted";
CREATE TABLE "public"."model_deleted" (
  "id" int4 NOT NULL DEFAULT nextval('model_deleted_id_seq'::regclass),
  "clave" varchar(255) COLLATE "pg_catalog"."default",
  "user_id" int8 NOT NULL,
  "usuario" varchar(255) COLLATE "pg_catalog"."default",
  "tabla" varchar(255) COLLATE "pg_catalog"."default",
  "tabla_id" int8 NOT NULL,
  "registro_deleted" json NOT NULL,
  "comentario" text COLLATE "pg_catalog"."default",
  "deleted_at" timestamp(0)
)
;
ALTER TABLE "public"."model_deleted" OWNER TO "postgres";

-- ----------------------------
-- Table structure for model_has_menu_permissions
-- ----------------------------
DROP TABLE IF EXISTS "public"."model_has_menu_permissions";
CREATE TABLE "public"."model_has_menu_permissions" (
  "id" int8 NOT NULL DEFAULT nextval('model_has_menu_permissions_id_seq'::regclass),
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "public"."model_has_menu_permissions" OWNER TO "postgres";

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS "public"."model_has_permissions";
CREATE TABLE "public"."model_has_permissions" (
  "permission_id" int4 NOT NULL,
  "model_type" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "model_id" int8 NOT NULL
)
;
ALTER TABLE "public"."model_has_permissions" OWNER TO "postgres";

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS "public"."model_has_roles";
CREATE TABLE "public"."model_has_roles" (
  "role_id" int4 NOT NULL,
  "model_type" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "model_id" int8 NOT NULL
)
;
ALTER TABLE "public"."model_has_roles" OWNER TO "postgres";

-- ----------------------------
-- Table structure for notificacion
-- ----------------------------
DROP TABLE IF EXISTS "public"."notificacion";
CREATE TABLE "public"."notificacion" (
  "id_usuario" varchar(15) COLLATE "pg_catalog"."default" NOT NULL,
  "notificacion_mail_salida" int2,
  "notificacion_mail_turnado" int2,
  "notificacion_mail_ccc" int2,
  "notificacion_mail_buzon_aceptado" int2,
  "id" int8 NOT NULL DEFAULT nextval('notificacion_id_sequence'::regclass),
  "notificacion_rapida" int4
)
;
ALTER TABLE "public"."notificacion" OWNER TO "postgres";

-- ----------------------------
-- Table structure for notificaciones_diarias
-- ----------------------------
DROP TABLE IF EXISTS "public"."notificaciones_diarias";
CREATE TABLE "public"."notificaciones_diarias" (
  "id" int8 NOT NULL DEFAULT nextval('notificaciones_diarias_id_seq'::regclass),
  "dependencia" varchar(255) COLLATE "pg_catalog"."default",
  "dependencia_padre" varchar(255) COLLATE "pg_catalog"."default",
  "estatus" varchar(255) COLLATE "pg_catalog"."default",
  "correos" varchar(255) COLLATE "pg_catalog"."default",
  "tipo" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "public"."notificaciones_diarias" OWNER TO "postgres";

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS "public"."password_resets";
CREATE TABLE "public"."password_resets" (
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "token" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0)
)
;
ALTER TABLE "public"."password_resets" OWNER TO "postgres";

-- ----------------------------
-- Table structure for periodos_anuales
-- ----------------------------
DROP TABLE IF EXISTS "public"."periodos_anuales";
CREATE TABLE "public"."periodos_anuales" (
  "id" int8 NOT NULL DEFAULT nextval('periodos_anuales_id_seq'::regclass),
  "anio" int8 NOT NULL,
  "mes_inicio" varchar(40) COLLATE "pg_catalog"."default",
  "mes_fin" varchar(40) COLLATE "pg_catalog"."default",
  "fecha_inicio" date,
  "fecha_fin" date,
  "encuesta_id" varchar(250) COLLATE "pg_catalog"."default",
  "estatus" bool,
  "periodo" int8
)
;
ALTER TABLE "public"."periodos_anuales" OWNER TO "postgres";

-- ----------------------------
-- Table structure for permisos_especiales
-- ----------------------------
DROP TABLE IF EXISTS "public"."permisos_especiales";
CREATE TABLE "public"."permisos_especiales" (
  "id" int8 NOT NULL DEFAULT nextval('permisos_especiales_id_seq'::regclass),
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "permiso" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "id_usuario" int4 NOT NULL,
  "parametro" varchar(255) COLLATE "pg_catalog"."default" NOT NULL
)
;
ALTER TABLE "public"."permisos_especiales" OWNER TO "postgres";

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS "public"."permissions";
CREATE TABLE "public"."permissions" (
  "id" int4 NOT NULL DEFAULT nextval('permissions_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "guard_name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "permission_descrip" varchar(80) COLLATE "pg_catalog"."default"
)
;
ALTER TABLE "public"."permissions" OWNER TO "postgres";

-- ----------------------------
-- Table structure for promotor_new
-- ----------------------------
DROP TABLE IF EXISTS "public"."promotor_new";
CREATE TABLE "public"."promotor_new" (
  "iddependencia" int4 NOT NULL,
  "cve_prom" int4 NOT NULL,
  "nom_prom" varchar(200) COLLATE "pg_catalog"."default",
  "tit_prom" varchar(200) COLLATE "pg_catalog"."default",
  "car_titu" varchar(200) COLLATE "pg_catalog"."default",
  "tipo" varchar(2) COLLATE "pg_catalog"."default",
  "orden" int2,
  "baja" varchar(1) COLLATE "pg_catalog"."default" DEFAULT 0,
  "referencia" varchar(10) COLLATE "pg_catalog"."default",
  "created_user_id" int8,
  "updated_user_id" int8,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "public"."promotor_new" OWNER TO "postgres";

-- ----------------------------
-- Table structure for relacion_documentos
-- ----------------------------
DROP TABLE IF EXISTS "public"."relacion_documentos";
CREATE TABLE "public"."relacion_documentos" (
  "fol_orig" varchar(13) COLLATE "pg_catalog"."default" NOT NULL,
  "cve_docto" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "nuevo_oficio" varchar(50) COLLATE "pg_catalog"."default" NOT NULL,
  "nombre_nuevo_oficio" varchar(50) COLLATE "pg_catalog"."default" NOT NULL,
  "fecha" timestamp(6) NOT NULL DEFAULT now(),
  "es_salida" varchar(1) COLLATE "pg_catalog"."default"
)
;
ALTER TABLE "public"."relacion_documentos" OWNER TO "postgres";

-- ----------------------------
-- Table structure for relaciones
-- ----------------------------
DROP TABLE IF EXISTS "public"."relaciones";
CREATE TABLE "public"."relaciones" (
  "nareap" varchar COLLATE "pg_catalog"."default" NOT NULL,
  "nareas" varchar COLLATE "pg_catalog"."default" NOT NULL
)
;
ALTER TABLE "public"."relaciones" OWNER TO "postgres";

-- ----------------------------
-- Table structure for resp_buzon
-- ----------------------------
DROP TABLE IF EXISTS "public"."resp_buzon";
CREATE TABLE "public"."resp_buzon" (
  "fol_orig" varchar(13) COLLATE "pg_catalog"."default",
  "conse" varchar(2) COLLATE "pg_catalog"."default",
  "fec_salid" date,
  "remite" varchar(100) COLLATE "pg_catalog"."default",
  "sintesis" text COLLATE "pg_catalog"."default",
  "cve_docto" varchar(100) COLLATE "pg_catalog"."default",
  "fec_elab" date,
  "base_datos" varchar(20) COLLATE "pg_catalog"."default",
  "prop_base" varchar(15) COLLATE "pg_catalog"."default",
  "folio_remite" varchar(13) COLLATE "pg_catalog"."default",
  "conse_remite" varchar(2) COLLATE "pg_catalog"."default",
  "plazo" varchar(1) COLLATE "pg_catalog"."default",
  "viable" varchar(1) COLLATE "pg_catalog"."default",
  "fec_notifica" date,
  "cve_resp" varchar(1) COLLATE "pg_catalog"."default",
  "etapas" text COLLATE "pg_catalog"."default",
  "fec_conclu" date,
  "califresp" varchar(1) COLLATE "pg_catalog"."default",
  "fec_compro" date
)
;
ALTER TABLE "public"."resp_buzon" OWNER TO "postgres";

-- ----------------------------
-- Table structure for respuesta_comentarios
-- ----------------------------
DROP TABLE IF EXISTS "public"."respuesta_comentarios";
CREATE TABLE "public"."respuesta_comentarios" (
  "id" int8 NOT NULL DEFAULT nextval('respuesta_comentarios_id_seq'::regclass),
  "comentario_id" int8 NOT NULL,
  "respuesta" text COLLATE "pg_catalog"."default" NOT NULL,
  "created_user_id" int8,
  "updated_user_id" int8,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "public"."respuesta_comentarios" OWNER TO "postgres";

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS "public"."role_has_permissions";
CREATE TABLE "public"."role_has_permissions" (
  "permission_id" int4 NOT NULL,
  "role_id" int4 NOT NULL
)
;
ALTER TABLE "public"."role_has_permissions" OWNER TO "postgres";

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS "public"."roles";
CREATE TABLE "public"."roles" (
  "id" int4 NOT NULL DEFAULT nextval('roles_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "guard_name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "rol_description" varchar(80) COLLATE "pg_catalog"."default"
)
;
ALTER TABLE "public"."roles" OWNER TO "postgres";

-- ----------------------------
-- Table structure for secuencia_relaciones
-- ----------------------------
DROP TABLE IF EXISTS "public"."secuencia_relaciones";
CREATE TABLE "public"."secuencia_relaciones" (
  "id" int8 NOT NULL DEFAULT nextval('secuencia_relaciones_id_seq'::regclass),
  "id_dirgeneral_padre" int8 NOT NULL,
  "id_dirgeneral_hijo" int8 NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "public"."secuencia_relaciones" OWNER TO "postgres";

-- ----------------------------
-- Table structure for soli_buzon
-- ----------------------------
DROP TABLE IF EXISTS "public"."soli_buzon";
CREATE TABLE "public"."soli_buzon" (
  "fol_orig" varchar(13) COLLATE "pg_catalog"."default",
  "conse" varchar(2) COLLATE "pg_catalog"."default",
  "fec_salid" date,
  "fec_comp" date,
  "remite" varchar(100) COLLATE "pg_catalog"."default",
  "cve_urge" varchar(1) COLLATE "pg_catalog"."default",
  "sintesis" text COLLATE "pg_catalog"."default",
  "cve_docto" varchar(100) COLLATE "pg_catalog"."default",
  "fec_elab" date,
  "base_datos" varchar(20) COLLATE "pg_catalog"."default",
  "prop_base" varchar(15) COLLATE "pg_catalog"."default",
  "dirigido" varchar(77) COLLATE "pg_catalog"."default",
  "firmante" varchar(200) COLLATE "pg_catalog"."default",
  "cargo_fmte" varchar(255) COLLATE "pg_catalog"."default",
  "promotor" varchar(100) COLLATE "pg_catalog"."default",
  "particular" varchar(254) COLLATE "pg_catalog"."default",
  "expediente" varchar(100) COLLATE "pg_catalog"."default",
  "tipo_docto" varchar(60) COLLATE "pg_catalog"."default",
  "evento" varchar(30) COLLATE "pg_catalog"."default",
  "fec_eve" date,
  "time_eve" time(6),
  "nacional" varchar(1) COLLATE "pg_catalog"."default",
  "domicilio" varchar(60) COLLATE "pg_catalog"."default",
  "colonia" varchar(40) COLLATE "pg_catalog"."default",
  "delegacion" varchar(40) COLLATE "pg_catalog"."default",
  "codigo_post" varchar(6) COLLATE "pg_catalog"."default",
  "entidad" varchar(40) COLLATE "pg_catalog"."default",
  "telefono" varchar(50) COLLATE "pg_catalog"."default",
  "matricula" varchar(100) COLLATE "pg_catalog"."default",
  "anexos" varchar(260) COLLATE "pg_catalog"."default",
  "clasif" varchar(1) COLLATE "pg_catalog"."default",
  "confi" varchar(1) COLLATE "pg_catalog"."default",
  "antecedente" varchar(100) COLLATE "pg_catalog"."default"
)
;
ALTER TABLE "public"."soli_buzon" OWNER TO "postgres";

-- ----------------------------
-- Table structure for telescope_entries
-- ----------------------------
DROP TABLE IF EXISTS "public"."telescope_entries";
CREATE TABLE "public"."telescope_entries" (
  "sequence" int8 NOT NULL DEFAULT nextval('telescope_entries_sequence_seq'::regclass),
  "uuid" uuid NOT NULL,
  "batch_id" uuid NOT NULL,
  "family_hash" varchar(255) COLLATE "pg_catalog"."default",
  "should_display_on_index" bool NOT NULL DEFAULT true,
  "type" varchar(20) COLLATE "pg_catalog"."default" NOT NULL,
  "content" text COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0)
)
;
ALTER TABLE "public"."telescope_entries" OWNER TO "postgres";

-- ----------------------------
-- Table structure for telescope_entries_tags
-- ----------------------------
DROP TABLE IF EXISTS "public"."telescope_entries_tags";
CREATE TABLE "public"."telescope_entries_tags" (
  "entry_uuid" uuid NOT NULL,
  "tag" varchar(255) COLLATE "pg_catalog"."default" NOT NULL
)
;
ALTER TABLE "public"."telescope_entries_tags" OWNER TO "postgres";

-- ----------------------------
-- Table structure for telescope_monitoring
-- ----------------------------
DROP TABLE IF EXISTS "public"."telescope_monitoring";
CREATE TABLE "public"."telescope_monitoring" (
  "tag" varchar(255) COLLATE "pg_catalog"."default" NOT NULL
)
;
ALTER TABLE "public"."telescope_monitoring" OWNER TO "postgres";

-- ----------------------------
-- Table structure for tema
-- ----------------------------
DROP TABLE IF EXISTS "public"."tema";
CREATE TABLE "public"."tema" (
  "cve_tema" varchar(8) COLLATE "pg_catalog"."default" NOT NULL,
  "topico" varchar(65) COLLATE "pg_catalog"."default" NOT NULL,
  "tipo" varchar(1) COLLATE "pg_catalog"."default",
  "baja" varchar(1) COLLATE "pg_catalog"."default" DEFAULT '0'::character varying,
  "area" varchar(7) COLLATE "pg_catalog"."default",
  "created_user_id" int8,
  "updated_user_id" int8,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "public"."tema" OWNER TO "postgres";

-- ----------------------------
-- Table structure for template_documento_turno
-- ----------------------------
DROP TABLE IF EXISTS "public"."template_documento_turno";
CREATE TABLE "public"."template_documento_turno" (
  "id" int8 NOT NULL DEFAULT nextval('template_documento_turno_id_seq'::regclass),
  "id_documento" int4 NOT NULL,
  "cve_depe" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "status" bool NOT NULL DEFAULT false,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "baja" bool NOT NULL DEFAULT false
)
;
ALTER TABLE "public"."template_documento_turno" OWNER TO "postgres";

-- ----------------------------
-- Table structure for templates
-- ----------------------------
DROP TABLE IF EXISTS "public"."templates";
CREATE TABLE "public"."templates" (
  "id" int8 NOT NULL DEFAULT nextval('templates_id_seq'::regclass),
  "id_usuario" int4 NOT NULL,
  "tipo" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "titulo" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "area" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "status" bool NOT NULL DEFAULT false,
  "texto" text COLLATE "pg_catalog"."default",
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "public"."templates" OWNER TO "postgres";

-- ----------------------------
-- Table structure for unidad_new
-- ----------------------------
DROP TABLE IF EXISTS "public"."unidad_new";
CREATE TABLE "public"."unidad_new" (
  "iddependencia" int4 NOT NULL,
  "nombre" varchar(200) COLLATE "pg_catalog"."default",
  "direccion" text COLLATE "pg_catalog"."default",
  "telefono" varchar(25) COLLATE "pg_catalog"."default",
  "orden" int2,
  "baja" varchar(1) COLLATE "pg_catalog"."default" DEFAULT 0,
  "referencia" varchar(10) COLLATE "pg_catalog"."default",
  "created_user_id" int8,
  "updated_user_id" int8,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "public"."unidad_new" OWNER TO "postgres";

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS "public"."users";
CREATE TABLE "public"."users" (
  "id" int8 NOT NULL DEFAULT nextval('users_id_seq'::regclass),
  "name" varchar(80) COLLATE "pg_catalog"."default" NOT NULL,
  "apellido_paterno" varchar(40) COLLATE "pg_catalog"."default" NOT NULL,
  "apellido_materno" varchar(40) COLLATE "pg_catalog"."default",
  "email" varchar(80) COLLATE "pg_catalog"."default",
  "cadena_oficio" varchar(50) COLLATE "pg_catalog"."default",
  "curp" varchar(18) COLLATE "pg_catalog"."default",
  "rfc" varchar(13) COLLATE "pg_catalog"."default",
  "telefono" varchar(15) COLLATE "pg_catalog"."default",
  "ext" varchar(15) COLLATE "pg_catalog"."default",
  "email_verified_at" timestamp(0),
  "password" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "confirmed" bool NOT NULL DEFAULT false,
  "confirmation_code" varchar(255) COLLATE "pg_catalog"."default",
  "remember_token" varchar(100) COLLATE "pg_catalog"."default",
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "usuario" varchar(30) COLLATE "pg_catalog"."default" NOT NULL,
  "avatar" varchar(255) COLLATE "pg_catalog"."default" DEFAULT 'avatares/avatar_neutro.jpeg'::character varying,
  "estatus" int4 NOT NULL,
  "dependencia" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "intentos" int2 NOT NULL DEFAULT '0'::smallint,
  "required_change_password" bool NOT NULL DEFAULT false
)
;
ALTER TABLE "public"."users" OWNER TO "postgres";

-- ----------------------------
-- Table structure for users_monitorings
-- ----------------------------
DROP TABLE IF EXISTS "public"."users_monitorings";
CREATE TABLE "public"."users_monitorings" (
  "id" int4 NOT NULL DEFAULT nextval('users_monitorings_id_seq'::regclass),
  "id_users" int4,
  "token" varchar(200) COLLATE "pg_catalog"."default" NOT NULL,
  "login" int4,
  "intentos" int4,
  "valid_password" int4,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "public"."users_monitorings" OWNER TO "postgres";

-- ----------------------------
-- Function structure for get_depe_buzon
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."get_depe_buzon"(varchar);
CREATE OR REPLACE FUNCTION "public"."get_depe_buzon"(varchar)
  RETURNS SETOF "public"."depe_buzon" AS $BODY$ SELECT * FROM depe_buzon WHERE clave=$1 ; $BODY$
  LANGUAGE sql VOLATILE
  COST 100
  ROWS 1000;
ALTER FUNCTION "public"."get_depe_buzon"(varchar) OWNER TO "postgres";

-- ----------------------------
-- Function structure for get_dependencia
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."get_dependencia"(varchar);
CREATE OR REPLACE FUNCTION "public"."get_dependencia"(varchar)
  RETURNS SETOF "public"."dependencia" AS $BODY$ SELECT * FROM dependencia WHERE nom_depe=$1; $BODY$
  LANGUAGE sql VOLATILE
  COST 100
  ROWS 1000;
ALTER FUNCTION "public"."get_dependencia"(varchar) OWNER TO "postgres";

-- ----------------------------
-- Function structure for get_relaciones
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."get_relaciones"(varchar);
CREATE OR REPLACE FUNCTION "public"."get_relaciones"(varchar)
  RETURNS SETOF "public"."relaciones" AS $BODY$ SELECT * FROM relaciones WHERE nareap=$1; $BODY$
  LANGUAGE sql VOLATILE
  COST 100
  ROWS 1000;
ALTER FUNCTION "public"."get_relaciones"(varchar) OWNER TO "postgres";

-- ----------------------------
-- View structure for vw_turnos_detalle
-- ----------------------------
DROP VIEW IF EXISTS "public"."vw_turnos_detalle";
CREATE VIEW "public"."vw_turnos_detalle" AS  SELECT documento.cve_refe,
    "left"(documento.cve_refe::text, length(documento.cve_refe::text) - 2) AS cverefe,
    documento.fol_orig,
    documento.cve_docto,
    documento.fec_regi,
    documento.fec_recep,
    documento.fec_elab,
    documento.firmante,
    documento.cve_prom,
    documento.cve_remite,
    documento.cve_tipo,
    documento.txt_resum,
    documento.cve_expe AS expediente,
    documento.salida,
    documento.cve_dirigido,
    documento.cargo_fmte AS cargo,
    unidad_new.nombre AS promotor,
    docsal.conse,
    docsal.cve_depe,
    docsal.fec_salid AS docsal_fec_salid,
    docsal.fec_comp,
    docsal.cve_resp,
    docsal.cve_turn,
    docsal.cve_urge,
    docsal.cve_ins,
    docsal.fec_regi AS docsal_fec_regi,
    docsal.cve_docto AS docsal_cve_docto,
    docsal.coment,
    docsal.cve_req_resp,
    docsal.baja,
    dependencia.nom_depe AS nombre,
    instruccion.instruccion,
    anexos.total_anexos,
        CASE
            WHEN docsal.cve_resp::text = 'N'::text THEN 'Pendiente'::text
            WHEN docsal.cve_resp::text = 'S'::text THEN 'Resuelto'::text
            WHEN docsal.cve_resp::text = 'A'::text THEN 'En tramite'::text
            ELSE 'No Requiere repuesta'::text
        END AS textoestado,
        CASE
            WHEN docsal.cve_urge::text = 'O'::text THEN 'ORDINARIO'::text
            WHEN docsal.cve_urge::text = 'U'::text THEN 'URGENTE'::text
            WHEN docsal.cve_urge::text = 'E'::text THEN 'EXTRA URGENTE'::text
            ELSE '-'::text
        END AS textorespuesta
   FROM documento
     JOIN docsal ON documento.fol_orig::text = docsal.fol_orig::text
     LEFT JOIN unidad_new ON unidad_new.iddependencia = documento.cve_prom
     JOIN dependencia ON docsal.cve_depe::text = dependencia.cve_depe::text
     JOIN instruccion ON docsal.cve_ins::text = instruccion.cve_ins::text
     LEFT JOIN ( SELECT count(doc_anexos.fol_orig) AS total_anexos,
            doc_anexos.fol_orig
           FROM doc_anexos
          GROUP BY doc_anexos.fol_orig) anexos ON anexos.fol_orig::text = documento.fol_orig::text
  ORDER BY documento.fol_orig;
ALTER TABLE "public"."vw_turnos_detalle" OWNER TO "postgres";

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."acciones_id_accion_seq"', 3, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."alertas_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."bitacora_efirma_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."bitacora_logs_id_seq"', 1249, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."bitacora_usuarios_id_seq"', 392, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."cat_dirgenerales_id_dirgeneral_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."cat_master_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."comentarios_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."dependencia_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."directorio_id_direccion_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."doc_salida_anexos_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."docsal_descargo_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."docsal_id_seq"', 1064, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."documento_id_seq"', 2076, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."documento_template_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."encuesta_usuarios_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."expediente_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."faqs_id_seq"', 6, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."folios_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."mensajes_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."menus_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."model_deleted_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."model_has_menu_permissions_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."notificacion_id_sequence"', 5, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."notificaciones_diarias_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."periodos_anuales_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."permisos_especiales_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."permissions_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."prueba"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."respuesta_comentarios_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."roles_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."scg_dgou_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."scg_ofs_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."secuencia_relaciones_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."telescope_entries_sequence_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."template_documento_turno_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."templates_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."users_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."users_monitorings_id_seq"', 2, true);

-- ----------------------------
-- Primary Key structure for table alertas
-- ----------------------------
ALTER TABLE "public"."alertas" ADD CONSTRAINT "alertas_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table bitacora_efirma
-- ----------------------------
ALTER TABLE "public"."bitacora_efirma" ADD CONSTRAINT "bitacora_efirma_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table bitacora_logs
-- ----------------------------
ALTER TABLE "public"."bitacora_logs" ADD CONSTRAINT "bitacora_logs_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table bitacora_usuarios
-- ----------------------------
ALTER TABLE "public"."bitacora_usuarios" ADD CONSTRAINT "bitacora_usuarios_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table cat_dirgenerales
-- ----------------------------
ALTER TABLE "public"."cat_dirgenerales" ADD CONSTRAINT "dir_generales_cve_dir_uk" UNIQUE ("cve_dir");

-- ----------------------------
-- Primary Key structure for table cat_dirgenerales
-- ----------------------------
ALTER TABLE "public"."cat_dirgenerales" ADD CONSTRAINT "cat_dirgenerales_pkey" PRIMARY KEY ("id_dirgeneral");

-- ----------------------------
-- Indexes structure for table cat_master
-- ----------------------------
CREATE INDEX "fk_cm_catalogo_cm_catalogo" ON "public"."cat_master" USING btree (
  "padre_id" "pg_catalog"."int4_ops" ASC NULLS LAST
);
CREATE INDEX "idx_cm_catalogo_clave" ON "public"."cat_master" USING btree (
  "catalogo" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST,
  "clave" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Uniques structure for table cat_master
-- ----------------------------
ALTER TABLE "public"."cat_master" ADD CONSTRAINT "uk_cm_catalogo" UNIQUE ("catalogo", "etiqueta");

-- ----------------------------
-- Primary Key structure for table cat_master
-- ----------------------------
ALTER TABLE "public"."cat_master" ADD CONSTRAINT "cat_master_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table comentarios
-- ----------------------------
ALTER TABLE "public"."comentarios" ADD CONSTRAINT "comentarios_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table depe_buzon
-- ----------------------------
CREATE INDEX "depebuzon" ON "public"."depe_buzon" USING btree (
  "clave" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Uniques structure for table dependencia
-- ----------------------------
ALTER TABLE "public"."dependencia" ADD CONSTRAINT "dependencia_cve_depe_uk" UNIQUE ("cve_depe");

-- ----------------------------
-- Primary Key structure for table dependencia
-- ----------------------------
ALTER TABLE "public"."dependencia" ADD CONSTRAINT "dependencia_id_pk" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table dirigido
-- ----------------------------
ALTER TABLE "public"."dirigido" ADD CONSTRAINT "dirigido_clave_uk" UNIQUE ("clave");

-- ----------------------------
-- Primary Key structure for table doc_anexos
-- ----------------------------
ALTER TABLE "public"."doc_anexos" ADD CONSTRAINT "doc_anexos_pkey" PRIMARY KEY ("fol_orig", "consec");

-- ----------------------------
-- Uniques structure for table doc_salida_anexos
-- ----------------------------
ALTER TABLE "public"."doc_salida_anexos" ADD CONSTRAINT "doc_salida_anexos_cve_docto_consec_uk" UNIQUE ("cve_docto", "consec");

-- ----------------------------
-- Primary Key structure for table doc_salida_anexos
-- ----------------------------
ALTER TABLE "public"."doc_salida_anexos" ADD CONSTRAINT "doc_salida_anexos_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table docsal
-- ----------------------------
CREATE INDEX "cveinsvol2" ON "public"."docsal" USING btree (
  "cve_ins" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);
CREATE INDEX "cveremitesal2" ON "public"."docsal" USING btree (
  "cve_remite" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);
CREATE INDEX "deperespcomp2" ON "public"."docsal" USING btree (
  "cve_depe" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST,
  "cve_resp" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST,
  "fec_comp" "pg_catalog"."date_ops" ASC NULLS LAST
);
CREATE INDEX "deperespurge2" ON "public"."docsal" USING btree (
  "cve_depe" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST,
  "cve_resp" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST,
  "cve_urge" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST,
  "fec_salid" "pg_catalog"."date_ops" ASC NULLS LAST
);
CREATE INDEX "doctores2" ON "public"."docsal" USING btree (
  "cve_docto" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);
CREATE INDEX "feccomp2" ON "public"."docsal" USING btree (
  "fec_comp" "pg_catalog"."date_ops" ASC NULLS LAST
);
CREATE INDEX "fecconclu2" ON "public"."docsal" USING btree (
  "fec_conclu" "pg_catalog"."date_ops" ASC NULLS LAST
);
CREATE INDEX "fecelabres2" ON "public"."docsal" USING btree (
  "fec_elab" "pg_catalog"."date_ops" ASC NULLS LAST
);
CREATE INDEX "fecrecdp2" ON "public"."docsal" USING btree (
  "fec_recdp" "pg_catalog"."date_ops" ASC NULLS LAST
);
CREATE INDEX "fecregires2" ON "public"."docsal" USING btree (
  "fec_regi" "pg_catalog"."date_ops" ASC NULLS LAST
);
CREATE INDEX "fecsalid2" ON "public"."docsal" USING btree (
  "fec_salid" "pg_catalog"."date_ops" ASC NULLS LAST
);
CREATE INDEX "folsal2" ON "public"."docsal" USING btree (
  "fol_orig" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);
CREATE INDEX "promrespsal2" ON "public"."docsal" USING btree (
  "cve_prom" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST,
  "cve_resp" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST,
  "fec_comp" "pg_catalog"."date_ops" ASC NULLS LAST
);
CREATE INDEX "promrespurge2" ON "public"."docsal" USING btree (
  "cve_prom" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST,
  "cve_resp" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST,
  "cve_urge" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST,
  "fec_salid" "pg_catalog"."date_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table docsal
-- ----------------------------
ALTER TABLE "public"."docsal" ADD CONSTRAINT "docsal_id_pk" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table docsal_descargo
-- ----------------------------
ALTER TABLE "public"."docsal_descargo" ADD CONSTRAINT "docsal_descargo_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table doctem
-- ----------------------------
CREATE INDEX "docvetem" ON "public"."doctem" USING btree (
  "cve_tema" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);
CREATE INDEX "foltem" ON "public"."doctem" USING btree (
  "fol_orig" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table doctem_salida
-- ----------------------------
ALTER TABLE "public"."doctem_salida" ADD CONSTRAINT "doctem_salida_pkey" PRIMARY KEY ("cve_docto", "cve_tema");

-- ----------------------------
-- Indexes structure for table documento
-- ----------------------------
CREATE INDEX "antecede2" ON "public"."documento" USING btree (
  "antecedente" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);
CREATE INDEX "cvedirigedoc2" ON "public"."documento" USING btree (
  "cve_dirigido" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);
CREATE INDEX "cveeve2" ON "public"."documento" USING btree (
  "cve_eve" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);
CREATE INDEX "cveremitedoc2" ON "public"."documento" USING btree (
  "cve_remite" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);
CREATE INDEX "cvetipodoc2" ON "public"."documento" USING btree (
  "cve_tipo" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);
CREATE INDEX "expedoc2" ON "public"."documento" USING btree (
  "cve_expe" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);
CREATE INDEX "feceve2" ON "public"."documento" USING btree (
  "fec_eve" "pg_catalog"."date_ops" ASC NULLS LAST,
  "time_eve" "pg_catalog"."time_ops" ASC NULLS LAST
);
CREATE INDEX "fechaelab2" ON "public"."documento" USING btree (
  "fec_elab" "pg_catalog"."date_ops" ASC NULLS LAST
);
CREATE INDEX "fechareg2" ON "public"."documento" USING btree (
  "fec_regi" "pg_catalog"."date_ops" ASC NULLS LAST
);
CREATE INDEX "firmant2" ON "public"."documento" USING btree (
  "firmante" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);
CREATE UNIQUE INDEX "foldoc2" ON "public"."documento" USING btree (
  "fol_orig" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);
CREATE INDEX "numdocto2" ON "public"."documento" USING btree (
  "cve_docto" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);
CREATE INDEX "promdoc2" ON "public"."documento" USING btree (
  "cve_prom" "pg_catalog"."int4_ops" ASC NULLS LAST
);
CREATE INDEX "refedoc2" ON "public"."documento" USING btree (
  "cve_refe" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);
CREATE INDEX "sujeto2" ON "public"."documento" USING btree (
  "nom_suje" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Uniques structure for table documento
-- ----------------------------
ALTER TABLE "public"."documento" ADD CONSTRAINT "documento_fol_orig_uk" UNIQUE ("fol_orig");

-- ----------------------------
-- Primary Key structure for table documento
-- ----------------------------
ALTER TABLE "public"."documento" ADD CONSTRAINT "documento_id_pk" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table documento_salida
-- ----------------------------
ALTER TABLE "public"."documento_salida" ADD CONSTRAINT "documento_salida_pkey" PRIMARY KEY ("cve_docto");

-- ----------------------------
-- Primary Key structure for table documento_template
-- ----------------------------
ALTER TABLE "public"."documento_template" ADD CONSTRAINT "documento_template_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table encuesta_usuarios
-- ----------------------------
ALTER TABLE "public"."encuesta_usuarios" ADD CONSTRAINT "encuesta_usuarios_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table estatus_documento_salida
-- ----------------------------
ALTER TABLE "public"."estatus_documento_salida" ADD CONSTRAINT "estatus_documento_salida_pkey" PRIMARY KEY ("cve_docto", "estatus");

-- ----------------------------
-- Uniques structure for table expediente
-- ----------------------------
ALTER TABLE "public"."expediente" ADD CONSTRAINT "expediente_cve_depe_cve_expe_uk" UNIQUE ("cve_depe", "cve_expe");

-- ----------------------------
-- Primary Key structure for table expediente
-- ----------------------------
ALTER TABLE "public"."expediente" ADD CONSTRAINT "pk_expediente_id_cve" PRIMARY KEY ("id_cve");

-- ----------------------------
-- Primary Key structure for table faqs
-- ----------------------------
ALTER TABLE "public"."faqs" ADD CONSTRAINT "faqs_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table folios
-- ----------------------------
ALTER TABLE "public"."folios" ADD CONSTRAINT "folios_id_dirgeneral_anio_key" UNIQUE ("id_dirgeneral", "anio");

-- ----------------------------
-- Primary Key structure for table folios
-- ----------------------------
ALTER TABLE "public"."folios" ADD CONSTRAINT "folios_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table instruccion
-- ----------------------------
CREATE UNIQUE INDEX "cveins" ON "public"."instruccion" USING btree (
  "cve_ins" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);
CREATE INDEX "instruc" ON "public"."instruccion" USING btree (
  "instruccion" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table instruccion
-- ----------------------------
ALTER TABLE "public"."instruccion" ADD CONSTRAINT "instruccion_pk" PRIMARY KEY ("cve_ins");

-- ----------------------------
-- Primary Key structure for table mensajes
-- ----------------------------
ALTER TABLE "public"."mensajes" ADD CONSTRAINT "mensajes_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table menus
-- ----------------------------
ALTER TABLE "public"."menus" ADD CONSTRAINT "menus_slug_unique" UNIQUE ("slug");

-- ----------------------------
-- Primary Key structure for table menus
-- ----------------------------
ALTER TABLE "public"."menus" ADD CONSTRAINT "menus_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table model_deleted
-- ----------------------------
ALTER TABLE "public"."model_deleted" ADD CONSTRAINT "model_deleted_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table model_has_menu_permissions
-- ----------------------------
ALTER TABLE "public"."model_has_menu_permissions" ADD CONSTRAINT "model_has_menu_permissions_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table model_has_permissions
-- ----------------------------
CREATE INDEX "model_has_permissions_model_id_model_type_index" ON "public"."model_has_permissions" USING btree (
  "model_id" "pg_catalog"."int8_ops" ASC NULLS LAST,
  "model_type" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table model_has_permissions
-- ----------------------------
ALTER TABLE "public"."model_has_permissions" ADD CONSTRAINT "model_has_permissions_pkey" PRIMARY KEY ("permission_id", "model_id", "model_type");

-- ----------------------------
-- Indexes structure for table model_has_roles
-- ----------------------------
CREATE INDEX "model_has_roles_model_id_model_type_index" ON "public"."model_has_roles" USING btree (
  "model_id" "pg_catalog"."int8_ops" ASC NULLS LAST,
  "model_type" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table model_has_roles
-- ----------------------------
ALTER TABLE "public"."model_has_roles" ADD CONSTRAINT "model_has_roles_pkey" PRIMARY KEY ("role_id", "model_id", "model_type");

-- ----------------------------
-- Uniques structure for table notificacion
-- ----------------------------
ALTER TABLE "public"."notificacion" ADD CONSTRAINT "notificacion_id_usuario_uk" UNIQUE ("id_usuario");

-- ----------------------------
-- Primary Key structure for table notificacion
-- ----------------------------
ALTER TABLE "public"."notificacion" ADD CONSTRAINT "notificacion_id_pk" PRIMARY KEY ("id");

-- ----------------------------
-- Checks structure for table notificaciones_diarias
-- ----------------------------
ALTER TABLE "public"."notificaciones_diarias" ADD CONSTRAINT "notificaciones_diarias_estatus_check" CHECK (((estatus)::text = ANY (ARRAY[('PRIMERA_NOTIFICACION'::character varying)::text, ('SEGUNDA_NOTIFICACION'::character varying)::text, ('TERCERA_NOTIFICACION'::character varying)::text])));

-- ----------------------------
-- Primary Key structure for table notificaciones_diarias
-- ----------------------------
ALTER TABLE "public"."notificaciones_diarias" ADD CONSTRAINT "notificaciones_diarias_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table password_resets
-- ----------------------------
CREATE INDEX "password_resets_email_index" ON "public"."password_resets" USING btree (
  "email" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table periodos_anuales
-- ----------------------------
ALTER TABLE "public"."periodos_anuales" ADD CONSTRAINT "periodos_anuales_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table permisos_especiales
-- ----------------------------
ALTER TABLE "public"."permisos_especiales" ADD CONSTRAINT "permisos_especiales_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table permissions
-- ----------------------------
ALTER TABLE "public"."permissions" ADD CONSTRAINT "permissions_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table promotor_new
-- ----------------------------
CREATE INDEX "promotor_new_idx" ON "public"."promotor_new" USING btree (
  "iddependencia" "pg_catalog"."int4_ops" ASC NULLS LAST,
  "cve_prom" "pg_catalog"."int4_ops" ASC NULLS LAST
);

-- ----------------------------
-- Uniques structure for table promotor_new
-- ----------------------------
ALTER TABLE "public"."promotor_new" ADD CONSTRAINT "xpkpromotor_n" UNIQUE ("iddependencia", "cve_prom", "nom_prom");

-- ----------------------------
-- Indexes structure for table relaciones
-- ----------------------------
CREATE INDEX "k1" ON "public"."relaciones" USING btree (
  "nareap" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST,
  "nareas" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Indexes structure for table resp_buzon
-- ----------------------------
CREATE INDEX "respbuzon" ON "public"."resp_buzon" USING btree (
  "fec_salid" "pg_catalog"."date_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table respuesta_comentarios
-- ----------------------------
ALTER TABLE "public"."respuesta_comentarios" ADD CONSTRAINT "respuesta_comentarios_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table role_has_permissions
-- ----------------------------
ALTER TABLE "public"."role_has_permissions" ADD CONSTRAINT "role_has_permissions_pkey" PRIMARY KEY ("permission_id", "role_id");

-- ----------------------------
-- Primary Key structure for table roles
-- ----------------------------
ALTER TABLE "public"."roles" ADD CONSTRAINT "roles_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table secuencia_relaciones
-- ----------------------------
ALTER TABLE "public"."secuencia_relaciones" ADD CONSTRAINT "secuencia_relaciones_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table soli_buzon
-- ----------------------------
CREATE INDEX "solibuzonn" ON "public"."soli_buzon" USING btree (
  "fec_salid" "pg_catalog"."date_ops" ASC NULLS LAST
);

-- ----------------------------
-- Indexes structure for table telescope_entries
-- ----------------------------
CREATE INDEX "telescope_entries_batch_id_index" ON "public"."telescope_entries" USING btree (
  "batch_id" "pg_catalog"."uuid_ops" ASC NULLS LAST
);
CREATE INDEX "telescope_entries_family_hash_index" ON "public"."telescope_entries" USING btree (
  "family_hash" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);
CREATE INDEX "telescope_entries_type_should_display_on_index_index" ON "public"."telescope_entries" USING btree (
  "type" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST,
  "should_display_on_index" "pg_catalog"."bool_ops" ASC NULLS LAST
);

-- ----------------------------
-- Uniques structure for table telescope_entries
-- ----------------------------
ALTER TABLE "public"."telescope_entries" ADD CONSTRAINT "telescope_entries_uuid_unique" UNIQUE ("uuid");

-- ----------------------------
-- Primary Key structure for table telescope_entries
-- ----------------------------
ALTER TABLE "public"."telescope_entries" ADD CONSTRAINT "telescope_entries_pkey" PRIMARY KEY ("sequence");

-- ----------------------------
-- Indexes structure for table telescope_entries_tags
-- ----------------------------
CREATE INDEX "telescope_entries_tags_entry_uuid_tag_index" ON "public"."telescope_entries_tags" USING btree (
  "entry_uuid" "pg_catalog"."uuid_ops" ASC NULLS LAST,
  "tag" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);
CREATE INDEX "telescope_entries_tags_tag_index" ON "public"."telescope_entries_tags" USING btree (
  "tag" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Indexes structure for table tema
-- ----------------------------
CREATE UNIQUE INDEX "tema1x" ON "public"."tema" USING btree (
  "cve_tema" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);
CREATE INDEX "tema2x" ON "public"."tema" USING btree (
  "topico" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);
CREATE INDEX "tipo" ON "public"."tema" USING btree (
  "tipo" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Uniques structure for table tema
-- ----------------------------
ALTER TABLE "public"."tema" ADD CONSTRAINT "tema_area_topico_uk" UNIQUE ("area", "tipo", "topico");

-- ----------------------------
-- Primary Key structure for table tema
-- ----------------------------
ALTER TABLE "public"."tema" ADD CONSTRAINT "tema_pk" PRIMARY KEY ("cve_tema");

-- ----------------------------
-- Primary Key structure for table template_documento_turno
-- ----------------------------
ALTER TABLE "public"."template_documento_turno" ADD CONSTRAINT "template_documento_turno_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table templates
-- ----------------------------
ALTER TABLE "public"."templates" ADD CONSTRAINT "templates_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table unidad_new
-- ----------------------------
ALTER TABLE "public"."unidad_new" ADD CONSTRAINT "xpkunidad_n" PRIMARY KEY ("iddependencia");

-- ----------------------------
-- Uniques structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_usuario_unique" UNIQUE ("usuario");

-- ----------------------------
-- Primary Key structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table users_monitorings
-- ----------------------------
ALTER TABLE "public"."users_monitorings" ADD CONSTRAINT "users_monitorings_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Foreign Keys structure for table alertas
-- ----------------------------
ALTER TABLE "public"."alertas" ADD CONSTRAINT "fk_alertas_cat_master_notificacion" FOREIGN KEY ("tipo_notificacion_id") REFERENCES "public"."cat_master" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."alertas" ADD CONSTRAINT "fk_alertas_user_id" FOREIGN KEY ("user_id") REFERENCES "public"."users" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table comentarios
-- ----------------------------
ALTER TABLE "public"."comentarios" ADD CONSTRAINT "fk_comentarios_created_user_id" FOREIGN KEY ("created_user_id") REFERENCES "public"."users" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table dirigido
-- ----------------------------
ALTER TABLE "public"."dirigido" ADD CONSTRAINT "dirigido_created_user_id_foreign" FOREIGN KEY ("created_user_id") REFERENCES "public"."users" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."dirigido" ADD CONSTRAINT "dirigido_updated_user_id_foreign" FOREIGN KEY ("updated_user_id") REFERENCES "public"."users" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table docsal
-- ----------------------------
ALTER TABLE "public"."docsal" ADD CONSTRAINT "docsal_documento_id_documento_id" FOREIGN KEY ("documento_id") REFERENCES "public"."documento" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."docsal" ADD CONSTRAINT "fk_documento_instruccion_cve_ins" FOREIGN KEY ("cve_ins") REFERENCES "public"."instruccion" ("cve_ins") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table docsal_descargo
-- ----------------------------
ALTER TABLE "public"."docsal_descargo" ADD CONSTRAINT "docsal_descargo_docsal_id_foreign" FOREIGN KEY ("docsal_id") REFERENCES "public"."docsal" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table documento_template
-- ----------------------------
ALTER TABLE "public"."documento_template" ADD CONSTRAINT "fk_docto_id_usuario" FOREIGN KEY ("id_usuario") REFERENCES "public"."users" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."documento_template" ADD CONSTRAINT "fk_docto_template_id_footer" FOREIGN KEY ("id_footer") REFERENCES "public"."templates" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."documento_template" ADD CONSTRAINT "fk_docto_template_id_header" FOREIGN KEY ("id_header") REFERENCES "public"."templates" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table encuesta_usuarios
-- ----------------------------
ALTER TABLE "public"."encuesta_usuarios" ADD CONSTRAINT "id_periodo_fk" FOREIGN KEY ("periodo_id") REFERENCES "public"."periodos_anuales" ("id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table faqs
-- ----------------------------
ALTER TABLE "public"."faqs" ADD CONSTRAINT "fk_faqs_usuario_actualiza_id" FOREIGN KEY ("usuario_actualiza_id") REFERENCES "public"."users" ("id") ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE "public"."faqs" ADD CONSTRAINT "fk_faqs_usuario_alta_id" FOREIGN KEY ("usuario_alta_id") REFERENCES "public"."users" ("id") ON DELETE RESTRICT ON UPDATE RESTRICT;

-- ----------------------------
-- Foreign Keys structure for table folios
-- ----------------------------
ALTER TABLE "public"."folios" ADD CONSTRAINT "fk_folios_dirgeneral_id" FOREIGN KEY ("id_dirgeneral") REFERENCES "public"."cat_dirgenerales" ("id_dirgeneral") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table mensajes
-- ----------------------------
ALTER TABLE "public"."mensajes" ADD CONSTRAINT "fk_mensajes_comentario_id" FOREIGN KEY ("comentario_id") REFERENCES "public"."comentarios" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."mensajes" ADD CONSTRAINT "fk_mensajes_created_user_id" FOREIGN KEY ("created_user_id") REFERENCES "public"."users" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."mensajes" ADD CONSTRAINT "fk_mensajes_updated_user_id" FOREIGN KEY ("updated_user_id") REFERENCES "public"."users" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table model_deleted
-- ----------------------------
ALTER TABLE "public"."model_deleted" ADD CONSTRAINT "fk_model_deleted_user_id" FOREIGN KEY ("user_id") REFERENCES "public"."users" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table model_has_permissions
-- ----------------------------
ALTER TABLE "public"."model_has_permissions" ADD CONSTRAINT "model_has_permissions_permission_id_foreign" FOREIGN KEY ("permission_id") REFERENCES "public"."permissions" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table model_has_roles
-- ----------------------------
ALTER TABLE "public"."model_has_roles" ADD CONSTRAINT "model_has_roles_role_id_foreign" FOREIGN KEY ("role_id") REFERENCES "public"."roles" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table permisos_especiales
-- ----------------------------
ALTER TABLE "public"."permisos_especiales" ADD CONSTRAINT "fk_permisos_especiales_id_usuario" FOREIGN KEY ("id_usuario") REFERENCES "public"."users" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table promotor_new
-- ----------------------------
ALTER TABLE "public"."promotor_new" ADD CONSTRAINT "promotor_new_created_user_id_foreign" FOREIGN KEY ("created_user_id") REFERENCES "public"."users" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."promotor_new" ADD CONSTRAINT "promotor_new_updated_user_id_foreign" FOREIGN KEY ("updated_user_id") REFERENCES "public"."users" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."promotor_new" ADD CONSTRAINT "unidadn_promotorn" FOREIGN KEY ("iddependencia") REFERENCES "public"."unidad_new" ("iddependencia") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table respuesta_comentarios
-- ----------------------------
ALTER TABLE "public"."respuesta_comentarios" ADD CONSTRAINT "respuesta_comentarios_comentario_id_foreign" FOREIGN KEY ("comentario_id") REFERENCES "public"."comentarios" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."respuesta_comentarios" ADD CONSTRAINT "respuesta_comentarios_created_user_id_foreign" FOREIGN KEY ("created_user_id") REFERENCES "public"."users" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."respuesta_comentarios" ADD CONSTRAINT "respuesta_comentarios_updated_user_id_foreign" FOREIGN KEY ("updated_user_id") REFERENCES "public"."users" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table role_has_permissions
-- ----------------------------
ALTER TABLE "public"."role_has_permissions" ADD CONSTRAINT "role_has_permissions_permission_id_foreign" FOREIGN KEY ("permission_id") REFERENCES "public"."permissions" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE "public"."role_has_permissions" ADD CONSTRAINT "role_has_permissions_role_id_foreign" FOREIGN KEY ("role_id") REFERENCES "public"."roles" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table telescope_entries_tags
-- ----------------------------
ALTER TABLE "public"."telescope_entries_tags" ADD CONSTRAINT "telescope_entries_tags_entry_uuid_foreign" FOREIGN KEY ("entry_uuid") REFERENCES "public"."telescope_entries" ("uuid") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table template_documento_turno
-- ----------------------------
ALTER TABLE "public"."template_documento_turno" ADD CONSTRAINT "fk_docto_template_id_documento" FOREIGN KEY ("id_documento") REFERENCES "public"."documento_template" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table templates
-- ----------------------------
ALTER TABLE "public"."templates" ADD CONSTRAINT "fk_templates_id_usuario" FOREIGN KEY ("id_usuario") REFERENCES "public"."users" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table unidad_new
-- ----------------------------
ALTER TABLE "public"."unidad_new" ADD CONSTRAINT "unidad_new_created_user_id_foreign" FOREIGN KEY ("created_user_id") REFERENCES "public"."users" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."unidad_new" ADD CONSTRAINT "unidad_new_updated_user_id_foreign" FOREIGN KEY ("updated_user_id") REFERENCES "public"."users" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

COMMIT;
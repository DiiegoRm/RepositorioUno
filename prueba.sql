CREATE TABLE pro_actividad (
  id number(10) NOT NULL,
  id_curso number(10) NOT NULL,
  nombre varchar2(200) NOT NULL
)  ;

CREATE TABLE pro_curso (
  id number(10) NOT NULL,
  nombre varchar2(200) NOT NULL,
  id_profesor number(10) NOT NULL
)  ;

CREATE TABLE pro_detalle_curso (
  id number(10) NOT NULL,
  id_curso number(10) NOT NULL,
  id_estudiante number(10) NOT NULL
)  ;

CREATE TABLE pro_documento (
  id number(10) NOT NULL,
  nombre varchar2(200) NOT NULL
)  ;

CREATE TABLE pro_nota (
  id number(10) NOT NULL,
  id_actividad number(10) NOT NULL,
  id_estudiante number(10) NOT NULL,
  nota number(10) NOT NULL
)  ;

CREATE TABLE pro_nota_comentario (
  id number(10) NOT NULL,
  id_nota number(10) NOT NULL,
  comentario varchar2(200) NOT NULL,
  visto number(10) NOT NULL
)  ;

CREATE TABLE pro_perfil (
  id number(10) NOT NULL,
  nombre varchar2(200) NOT NULL
)  ;

CREATE TABLE pro_relacion_parental (
  id number(10) NOT NULL,
  id_acudiente number(10) NOT NULL,
  id_estudiante number(10) NOT NULL
)  ;

CREATE TABLE pro_usuario (
  id number(10) NOT NULL,
  usuario varchar2(200) NOT NULL,
  password varchar2(200) NOT NULL,
  id_perfil number(10) NOT NULL,
  id_tipo number(10) NOT NULL,
  numero_doc number(10) NOT NULL,
  nombre_uno varchar2(200) NOT NULL,
  nombre_dos varchar2(200) NOT NULL,
  apellido_uno varchar2(200) NOT NULL,
  apellido_dos varchar2(200) NOT NULL,
  telefono number(10) NOT NULL,
  direccion varchar2(200) NOT NULL
)  ;

ALTER TABLE pro_actividad
  ADD PRIMARY KEY (id);

ALTER TABLE pro_curso
  ADD PRIMARY KEY (id);

ALTER TABLE pro_detalle_curso
  ADD PRIMARY KEY (id);

ALTER TABLE pro_documento
  ADD PRIMARY KEY (id);

ALTER TABLE pro_nota
  ADD PRIMARY KEY (id);

ALTER TABLE pro_nota_comentario
  ADD PRIMARY KEY (id);

ALTER TABLE pro_perfil
  ADD PRIMARY KEY (id);

ALTER TABLE pro_relacion_parental
  ADD PRIMARY KEY (id);

ALTER TABLE pro_usuario
  ADD PRIMARY KEY (id);

ALTER TABLE pro_actividad
  ADD CONSTRAINT pro_actividad_ibfk_1 FOREIGN KEY (id_curso) REFERENCES pro_curso (id);

ALTER TABLE pro_curso
  ADD CONSTRAINT pro_curso_ibfk_1 FOREIGN KEY (id_profesor) REFERENCES pro_usuario (id);

ALTER TABLE pro_detalle_curso
  ADD CONSTRAINT pro_detalle_curso_ibfk_1 FOREIGN KEY (id_curso) REFERENCES pro_curso (id);
  
ALTER TABLE pro_detalle_curso
  ADD CONSTRAINT pro_detalle_curso_ibfk_2 FOREIGN KEY (id_estudiante) REFERENCES pro_usuario (id);

ALTER TABLE pro_nota
  ADD CONSTRAINT pro_nota_ibfk_1 FOREIGN KEY (id_actividad) REFERENCES pro_actividad (id);
  
ALTER TABLE pro_nota
  ADD CONSTRAINT pro_nota_ibfk_2 FOREIGN KEY (id_estudiante) REFERENCES pro_usuario (id);

ALTER TABLE pro_nota_comentario
  ADD CONSTRAINT pro_nota_comentario_ibfk_1 FOREIGN KEY (id_nota) REFERENCES pro_nota (id);

ALTER TABLE pro_relacion_parental
  ADD CONSTRAINT pro_relacion_parental_ibfk_1 FOREIGN KEY (id_acudiente) REFERENCES pro_usuario (id);
  
ALTER TABLE pro_relacion_parental
  ADD CONSTRAINT pro_relacion_parental_ibfk_2 FOREIGN KEY (id_estudiante) REFERENCES pro_usuario (id);
  
ALTER TABLE pro_usuario
  ADD CONSTRAINT pro_usuario_ibfk_1 FOREIGN KEY (id_perfil) REFERENCES pro_perfil (id);
  
ALTER TABLE pro_usuario
  ADD CONSTRAINT pro_usuario_ibfk_2 FOREIGN KEY (id_tipo) REFERENCES pro_documento(id);
COMMIT;


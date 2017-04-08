-- Table: pelicula.tbl_genero

-- DROP TABLE pelicula.tbl_genero;

CREATE TABLE pelicula.tbl_genero
(
  id_genero character varying NOT NULL,
  nombre_genero character varying,
  descripcion_genero character varying,
  id_obra character varying,
  CONSTRAINT tbl_genero_pkey PRIMARY KEY (id_genero),
  CONSTRAINT tbl_genero_id_obra_fkey FOREIGN KEY (id_obra)
      REFERENCES pelicula.tbl_obra (id_obra) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE pelicula.tbl_genero
  OWNER TO postgres;

  
CREATE TABLE pelicula.tbl_obra
(
  id_obra character varying NOT NULL,
  nombre_obra character varying,
  descripcion_obra character varying,
  CONSTRAINT obra_pkey PRIMARY KEY (id_obra)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE pelicula.tbl_obra
  OWNER TO postgres;
  

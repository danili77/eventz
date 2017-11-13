drop table if exists usuarios cascade;

create table usuarios(
    id       bigserial   constraint pk_usuarios primary key,
    nombre   varchar(15) not null constraint uq_usuarios_nombre unique,
    password varchar(60) not null,
    token    varchar(32)
);

drop table if exists usuarios cascade;

create table usuarios(
    id       bigserial   constraint pk_usuarios primary key,
    nombre   varchar(15) not null constraint uq_usuarios_nombre unique,
    password varchar(60) not null,
    email    varchar(255) not null,
    token    varchar(32),
    created_at date default current_date
);

drop table if exists tipo_evento cascade;

create table tipo_evento(
    id      bigserial constraint pk_tipo_eventos primary key,
    tipo    varchar(255) not null
);

drop table if exists eventos cascade;

create table eventos(
    id              bigserial    constraint pk_eventos primary key,
    nombre          varchar(100) not null,
    descripcion     text         not null,
    fecha           date  not null default current_date,
    lugar 	    varchar(255) not null,
    tipo_evento     bigint       not null constraint fk_eventos_tipo_evento
                                 references tipo_evento(id) on delete cascade
                                 on update cascade,
    usuarios_id     bigint       not null constraint fk_eventos_usuarios
                                 references usuarios(id)
                                 on delete cascade
                                 on update cascade

);

drop table if exists comentarios cascade;

create table comentarios(
    id                  bigserial   constraint pk_comentarios primary key,
    texto_comentario    varchar(500) not null,
    fecha               date not null default current_date,
    eventos_id          bigint      constraint fk_eventos_id
                                    references eventos(id)
                                    on delete no action
                                    on update cascade,
    usuarios_id         bigint      constraint fk_usuarios_id
                                    references usuarios(id)
                                    on delete no action
                                    on update cascade
);

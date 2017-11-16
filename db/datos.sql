----Insertar usuarios----
insert into usuarios(nombre,password)
values('dani',crypt('dani',gen_salt('bf',13)));

insert into usuarios(nombre,password)
values('pepe',crypt('pepe',gen_salt('bf',13)));

insert into usuarios(nombre,password)
values('maria',crypt('maria',gen_salt('bf',13)));

insert into usuarios(nombre,password)
values('admin',crypt('admin',gen_salt('bf',13)));

---Insertar tipos de eventos---

insert into tipo_evento(tipo)
values('FERIAS-EXPOSICIONES');

insert into tipo_evento(tipo)
values('DEPORTIVO');

insert into tipo_evento(tipo)
values('OCIO');

insert into tipo_evento(tipo)
values('CONVENCIONES');

insert into tipo_evento(tipo)
values('EMPRESA');

insert into tipo_evento(tipo)
values('BENEFICOS');

---Insertar eventos---
insert into eventos(nombre,descripcion,fecha,lugar,tipo_evento,usuarios_id)
values('Feria de Sanlucar de Barrameda','La Feria de la Manzanilla se inaugurará la noche del martes 23 de mayo al final de la Calzada de la Duquesa, en un acto que comenzará a las 22.00 horas con la actuación del dúo sanluqueño Las Carlotas. Será a los pies de la portada, que se encenderá media hora más tarde cuando el alcalde, Víctor Mora, presione el interruptor y la luz se haga en todo el recinto ferial.','2017/05/23','La Calzada,Sanlucar de Barrameda',1,1);


insert into eventos(nombre,descripcion,fecha,lugar,tipo_evento,usuarios_id)
values('Desafio Doñana','El Desafío Doñana es una carrera de resistencia dentro del segmento de los eventos de larga distancia compuesta por tres disciplinas deportivas diferentes: ciclismo, natación y carrera a pie','2017/04/06','Sanlucar-Trebujena',2,2);


insert into eventos(nombre,descripcion,fecha,lugar,tipo_evento,usuarios_id)
values('Festival de musica Ciudad de Chipiona','Juventudes Musicales ha hecho público el programa de la undécima edición del Festival de Música Ciudad de Chipiona 2017, una referencia fundamental de la oferta cultural veraniega en la localidad que este año contará con veinte conciertos, nueve menos que el pasado año, debido a falta de fechas para ofrece más recitales.','2017/02/20','Chipiona',3,3);

insert into eventos(nombre,descripcion,fecha,lugar,tipo_evento,usuarios_id)
values('29º Conferencia de Ferran Adria','El prestigioso chef Ferran Adrià, considerado uno de los mejores cocineros e incluido en la lista de los diez personajes más innovadores del mundo de la revista norteamericana Time en el año 2004, pronunciará este jueves 29 de junio, a las 12 horas y en el Aula Magna de la Facultad de Filosofía y Letras de la Universidad de Cádiz, un conferencia sobre Innovación y Emprendimiento.','2017/03/01','Aula Magna,Cadiz',4,4);

---Insertar comentarios---

insert into comentarios(texto_comentario,eventos_id,usuarios_id)
values('Comentario 1','1','1');

insert into comentarios(texto_comentario,eventos_id,usuarios_id)
values('Comentario 2','2','1');

insert into comentarios(texto_comentario,eventos_id,usuarios_id)
values('Comentario 3','3','1');

insert into comentarios(texto_comentario,eventos_id,usuarios_id)
values('Comentario 4','4','1');


insert into comentarios(texto_comentario,eventos_id,usuarios_id)
values('Comentario 1','1','2');

insert into comentarios(texto_comentario,eventos_id,usuarios_id)
values('Comentario 2','2','2');

insert into comentarios(texto_comentario,eventos_id,usuarios_id)
values('Comentario 3','3','2');

insert into comentarios(texto_comentario,eventos_id,usuarios_id)
values('Comentario 4','4','2');


insert into comentarios(texto_comentario,eventos_id,usuarios_id)
values('Comentario 1','1','3');

insert into comentarios(texto_comentario,eventos_id,usuarios_id)
values('Comentario 2','2','3');

insert into comentarios(texto_comentario,eventos_id,usuarios_id)
values('Comentario 3','3','3');

insert into comentarios(texto_comentario,eventos_id,usuarios_id)
values('Comentario 4','4','3');


insert into comentarios(texto_comentario,eventos_id,usuarios_id)
values('Comentario 1','1','4');

insert into comentarios(texto_comentario,eventos_id,usuarios_id)
values('Comentario 2','2','4');

insert into comentarios(texto_comentario,eventos_id,usuarios_id)
values('Comentario 3','3','4');

insert into comentarios(texto_comentario,eventos_id,usuarios_id)
values('Comentario 4','4','4');

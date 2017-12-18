----Insertar usuarios----
insert into usuarios(nombre,email,password)
values('dani','daniel.lorenzo@iesdonana.org',crypt('dani',gen_salt('bf',13))),
('pepe','pepe@gmail.com',crypt('pepe',gen_salt('bf',13))),
('maria','maria@gmail.com',crypt('maria',gen_salt('bf',13))),
('admin','admin@gmail.com',crypt('admin',gen_salt('bf',13)));

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
values('Feria de Sanlucar de Barrameda','La Feria de la Manzanilla se inaugurará la noche del martes 23 de mayo al final de la Calzada de la Duquesa, en un acto que comenzará a las 22.00 horas con la actuación del dúo sanluqueño Las Carlotas. Será a los pies de la portada, que se encenderá media hora más tarde cuando el alcalde, Víctor Mora, presione el interruptor y la luz se haga en todo el recinto ferial.','2017/05/23','Sanlucar de Barrameda',1,1);


insert into eventos(nombre,descripcion,fecha,lugar,tipo_evento,usuarios_id)
values('Desafio Doñana','El Desafío Doñana es una carrera de resistencia dentro del segmento de los eventos de larga distancia compuesta por tres disciplinas deportivas diferentes: ciclismo, natación y carrera a pie','2017/04/06','Sanlucar de Barrameda',2,2);


insert into eventos(nombre,descripcion,fecha,lugar,tipo_evento,usuarios_id)
values('Festival de musica Ciudad de Chipiona','Juventudes Musicales ha hecho público el programa de la undécima edición del Festival de Música Ciudad de Chipiona 2017, una referencia fundamental de la oferta cultural veraniega en la localidad que este año contará con veinte conciertos, nueve menos que el pasado año, debido a falta de fechas para ofrece más recitales.','2017/02/20','Chipiona',3,3);


insert into eventos(nombre,descripcion,fecha,lugar,tipo_evento,usuarios_id)
values('29º Conferencia de Ferran Adria','El prestigioso chef Ferran Adrià, considerado uno de los mejores cocineros e incluido en la lista de los diez personajes más innovadores del mundo de la revista norteamericana Time en el año 2004, pronunciará este jueves 29 de junio, a las 12 horas y en el Aula Magna de la Facultad de Filosofía y Letras de la Universidad de Cádiz, un conferencia sobre Innovación y Emprendimiento.','2017/03/01','Sanlucar de Barrameda',4,4);


insert into eventos(nombre,descripcion,fecha,lugar,tipo_evento,usuarios_id)
values('Festival asi canta Sanlúcar en navidad','Villancicos y buen ambiente, a un lado, y jornada de convivencia entre numerosos sanluqueños que no quisieron dejar pasar la oportunidad de disfrutar ya del ambiente de la Navidad, y acompañar a la Orden de los Reyes Magos en un pasito más para conseguir su objetivo.Todo el dinero recogido irá destinado a este fin, con el objeto de que ningún niño de la ciudad se quede sin recibir su regalo el próximo 6 de enero.','2017/12/02','Sanlucar de Barrameda',6,6);



---Insertar comentarios---

insert into comentarios(texto_comentario,eventos_id,usuarios_id)
values('Me lo pase genial...','1','1');

insert into comentarios(texto_comentario,eventos_id,usuarios_id)
values('Prueba un poco dura pero bien.','2','1');

insert into comentarios(texto_comentario,eventos_id,usuarios_id)
values('Musica en estado puro...','3','1');

insert into comentarios(texto_comentario,eventos_id,usuarios_id)
values('Se aprende bastante de este cocinero.','4','1');

insert into comentarios(texto_comentario,eventos_id,usuarios_id)
values('Por una buena causa.','6','1');


insert into comentarios(texto_comentario,eventos_id,usuarios_id)
values('Volvere el proximo año...','1','2');

insert into comentarios(texto_comentario,eventos_id,usuarios_id)
values('Prueba magnifica.','2','2');

insert into comentarios(texto_comentario,eventos_id,usuarios_id)
values('Pasamos un dia muy bueno en el.','3','2');

insert into comentarios(texto_comentario,eventos_id,usuarios_id)
values('Innovador chef.','4','2');

insert into comentarios(texto_comentario,eventos_id,usuarios_id)
values('Asisti,me lo pase muy bien y colaboro en una buena causa.','6','2');


insert into comentarios(texto_comentario,eventos_id,usuarios_id)
values('Muy bien...','1','3');

insert into comentarios(texto_comentario,eventos_id,usuarios_id)
values('Muy bien organizada...','2','3');

insert into comentarios(texto_comentario,eventos_id,usuarios_id)
values('Gran cantidad de bandas.','3','3');

insert into comentarios(texto_comentario,eventos_id,usuarios_id)
values('Cocina en estado puro.','4','3');


insert into comentarios(texto_comentario,eventos_id,usuarios_id)
values('Me gusto mucho...','1','4');

insert into comentarios(texto_comentario,eventos_id,usuarios_id)
values('Pesima recepción,por lo demas ok.','2','4');

insert into comentarios(texto_comentario,eventos_id,usuarios_id)
values('Festival magnifico','3','4');

insert into comentarios(texto_comentario,eventos_id,usuarios_id)
values('Genial...','4','4');

var articulo = document.getElementsByTagName("article")[0];

var parrafo = document.createElement("p");
var texto = document.createTextNode("Dispone de las siguientes caracteristicas: ");

parrafo.appendChild(texto);

articulo.appendChild(parrafo);

var lista = document.createElement("ul");

articulo.appendChild(lista);

var li1 = document.createElement("li");
var ti1 = document.createTextNode("Gestión de Eventos.");
li1.appendChild(ti1);
lista.appendChild(li1);

var li2 = document.createElement("li");
var ti2 = document.createTextNode("Paso de listado de eventos a documento PDF.");
li2.appendChild(ti2);
lista.appendChild(li2);


var li3 = document.createElement("li");
var ti3 = document.createTextNode("Gestión de Comentarios sobre eventos");
li3.appendChild(ti3);
lista.appendChild(li3);

var li4 = document.createElement("li");
var ti4 = document.createTextNode("Calendario interactivo.Donde es posible ver los eventos y crear nuevos.");
li4.appendChild(ti4);
lista.appendChild(li4);

var li5 = document.createElement("li");
var ti5 = document.createTextNode("Gestión de Usuarios(Solo el administrador de la página)");
li5.appendChild(ti5);
lista.appendChild(li5);

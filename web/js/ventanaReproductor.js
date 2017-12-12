
var ventana;

function abrirpopup(url)
{
  var ancho = '500px';
  var alto = '500px';

  var x='450px';
  var y='100px';

  ventana = window.open('/site/reproductor', 'Reproductor', 'width=' + ancho + ', height=' + alto + ', left=' + x + ', top=' + y +'location=no, titlebar=no resizable=no');
}

document.getElementById('botonR').addEventListener('click',abrirpopup);


var ventana;

function abrirpopup(url)
{
  var ancho = '500px';
  var alto = '500px';

  var x='450px';//(screen.width/2)-(ancho/2);
  var y='100px';//(screen.height/2)-(alto/2);

  ventana = window.open('/site/reproductor', 'Reproductor', 'width=' + ancho + ', height=' + alto + ', left=' + x + ', top=' + y +'location=no, titlebar=no');
}

document.getElementById('botonR').addEventListener('click',abrirpopup);

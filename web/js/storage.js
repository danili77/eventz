
    var nombre = document.getElementsByTagName("td")[0].innerHTML;
    localStorage.setItem("nombreUsuario",nombre);

    var email = document.getElementsByTagName("td")[1].innerHTML;
    localStorage.setItem("emailUsuario",email);

    var fecha = document.getElementsByTagName("td")[2].innerHTML;
    localStorage.setItem("fechaCreacion",fecha);

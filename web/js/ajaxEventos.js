$(document).on('ready', function () {


    function provincias(r){

        for (i in r){
            $("#evento-provincia").append("<option name="+ i +" value="+r[i]+">"+r[i]+"</option>")
        }
        ordenar();
    }



    (function(){
        $.ajax({
            type: "POST",
            dataType: "JSON",
            success:provincias,
            url: urlProvincia
        });

    })();

    // function ordenar(){
    //     $("select").each(function() {
    //         //guardamos la opción seleccionada
    //         var sel = $(this)[0].selectedIndex;
    //
    //         //ordenamos las opciones
    //         $(this).html($("option", $(this)).sort(function(a, b) {
    //             //   return a.text == b.text ? 0 : a.text < b.text ? -1 : 1 //ordena por texto
    //             return a.value == b.value ? 0 : a.value < b.value ? -1 : 1 //ordena por atributo value
    //         }));
    //
    //         // Reestablecimiento de la opción seleccionada previamente
    //         $(this)[0].selectedIndex = sel; //$(this).prop('selectedIndex', sel);
    //
    //
    //     });
    // }

    // $("#evento-provincia").on("change", peticionCiudades);
    $("#evento-provincia").on("click", mensaje);


    function mensaje()
    {
      alert("entra");
    }
    //
    // function poblacion(r){
    //
    //     for (i in r){
    //         $("#evento-poblacion").append("<option value =\""+r[i]+"\">"+r[i]+"</option>")
    //     }
    //     ordenar();
    //
    //
    // }
    //
    // function peticionCiudades(){
    //
    //   alert("entra");
    //
    //     // var dato = $("#evento-provincia option:selected").attr('name');
    //     //
    //     // $.ajax({
    //     //     data: 'provincia=' + dato,
    //     //     type: "POST",
    //     //     dataType: "JSON",
    //     //     success:poblacion,
    //     //     url: urlPoblacion
    //     // });
    //
    // }

});

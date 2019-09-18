$(".eliminar").click(function() {
    var clave = $(this).attr("id");
    if (confirm("Esta seguro de eliminar este registro !")) {
        $.ajax({
            url: "regAlumno.php",
            data: "opc=eliminar&clave=" + clave,
            type: "POST",
            success: function() {
                location.reload();
            }
        })
    }
});

$(".modificar").click(function() {
    var clave = $(this).attr("id");
    $.ajax({
        url: "regAlumno.php",
        data: "opc=modificar-form&clave=" + clave,
        type: "POST",
        success: function($datos) {
            $(".datos").html($datos);
        }
    })
    $('#modificar').modal('show');
});
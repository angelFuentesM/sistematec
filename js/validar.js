$(function() {
    $("#formAlumno").validate({
        rules: {
            numControl: { required: true, digits: true, minlength: 8, maxlength: 8 },
            paterno: { required: true, maxlength: 20 },
            materno: { required: true, maxlength: 20 },
            nombre: { required: true, maxlength: 20 },
            genero: { required: true },
            grupo_id: { required: true },
            carrera_id: { required: true },
            periodo_id: { required: true },
            reticula_id: { required: true }
        },

        messages: {

            numControl: {
                required: '<p style="color:#FF0000; font-size:12px;";>Campo obligatorio !</p>',
                digits: '<p style="color:#FF0000; font-size:12px;";>Solo digitos!</p>',
                minlength: '<p style="color:#FF0000; font-size:12px;";>8 caracteres !</p>',
                maxlength: '<p style="color:#FF0000; font-size:12px;";>8 caracteres !</p>'
            },

            paterno: {
                required: '<p style="color:#FF0000; font-size:12px;";>Campo obligatorio !</p>',
                maxlength: '<p style="color:#FF0000; font-size:12px;";>Excediste el numero de caracteres !</p>'
            },

            materno: {
                required: '<p style="color:#FF0000; font-size:12px;";>Campo obligatorio !</p>',
                maxlength: '<p style="color:#FF0000; font-size:12px;";>Excediste el numero de caracteres !</p>'
            },

            nombre: {
                required: '<p style="color:#FF0000; font-size:12px;,";>Campo obligatorio !</p>',
                maxlength: '<p style="color:#FF0000; font-size:12px;";>Excediste el numero de caracteres !</p>'
            },

            genero: {
                required: '<p style="color:#FF0000; font-size:12px;";>Campo obligatorio !</p>',
            },

            grupo_id: {
                required: '<p style="color:#FF0000; font-size:12px;";>Campo obligatorio !</p>',
            },

            carrera_id: {
                required: '<p style="color:#FF0000; font-size:12px;";>Campo obligatorio !</p>',
            },
            periodo_id: {
                required: '<p style="color:#FF0000; font-size:12px;";>Campo obligatorio !</p>',
            },
            reticula_id: {
                required: '<p style="color:#FF0000; font-size:12px;";>Campo obligatorio !</p>',
            },
        }
    });
});
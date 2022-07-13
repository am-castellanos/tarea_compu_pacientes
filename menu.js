$(document).ready(main);

var contador = 1;

function main() {
    $('.menu_bar').click(function() {
        // $('nav').toggle(); 

        if (contador == 1) {
            $('nav').animate({
                left: '0'
            });
            contador = 0;
        } else {
            contador = 1;
            $('nav').animate({
                left: '-100%'
            });
        }

    });

};

$(document).ready(function(e) {

    $('#menu1').on('click', function() {
        $('#content').attr('src', 'insertar_datos');
    });

    $('#menu2').on('click', function() {
        $('#content').attr('src', 'reporte');
    });

    $('#menu4').on('click', function() {
        $('#content').attr('src', 'activaralumnos');
    });




});
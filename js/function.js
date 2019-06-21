$('#cerrar').click(function (e) { 
    e.preventDefault();
    $.ajax({
        url: "php/cerrar_sesion.php",
        success: function (response) {
            location.reload();
        }
    });
});
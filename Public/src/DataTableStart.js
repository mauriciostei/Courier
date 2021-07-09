$(document).ready(function() {
    $('#dataTable').DataTable({
        "info":     false,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "Sin registros en la tabla",
            "decimal": ",",
            "thousands": ".",
            "sSearch": "Buscar:",
            "paginate": {
                "previous": "Anterior",
                "next": "Siguiente"
            }
        }
    });
} );
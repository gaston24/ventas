$(document).ready(
    function(){
        $('#tablaVentas').DataTable({
            select: true,
            dom: 'lBfrtip', buttons: ['copy', 'excel', 'pdf', 'print'],
            "pageLength": 100,
            fixedHeader: true
        });
    }
);


$(document).ready(
    function () {
        $('#headSuc').html( $('#headSuc').html()+ ': '+ $('#sucursales').html());
        $('#headCantComp').html( $('#headCantComp').html()+ ': '+ $('#cantComp').html());
        $('#headImporte').html( $('#headImporte').html()+ ': '+ $('#importe').html());
    }
);


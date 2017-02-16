$(function () {
 $('.js-basic-example').DataTable({
    // bPaginate: true,
    // bLengthChange: false,
    // bFilter: true,
    // bInfo: false,
    // bAutoWidth: false
     dom: '<"bottom"f>rt<"bottom"p><"clear">'
 });
    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'pdf', 'print'
        ]
    });
});
var table;
$(function () {
table = $('.js-basic-example').DataTable({
    // bPaginate: true,
    // bLengthChange: true,
    // bFilter: true,
    // bInfo: false,
    // bAutoWidth: false
     dom: '<"bottom"f>rt<"bottom"p><"clear">',
     lengthMenu:[5],
     ordering : false
 });
    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtp',
        buttons: [
            'pdf', 'print'
        ],
        lengthMenu:[5],
        ordering : false
    });
});

// $('td#id_ord').on('click', function () {
//     console.log($(this).text())
// })

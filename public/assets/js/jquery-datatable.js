var table;
$(function () {
table = $('.js-basic-example').DataTable({
     dom: '<"bottom"f>rt<"bottom"p><"clear">',
     lengthMenu:[5]
 });
    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtp',
        buttons: [
            'pdf', 'print'
        ],
        lengthMenu:[5]
    });
});

function save()
{

    if ($('#input_domain').val() == '') {
        alert('Domain tidak boleh kosong!')
    }else{
        $('#btnSave').text('saving...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable 

        url = "http://localhost:8088/member/submit_form";

        // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            success: function(data)
            {
                $('#myModal').modal('hide');
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable
                $('#input_domain').val('');
              
                window.location.reload(1);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding domain');
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
            }
        });
    }
}
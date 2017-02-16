    <?php  
        $array_js = array(
            'jquery.min.js',
            'bootstrap.js',
            'bootstrap-select.js',
            'jquery.slimscroll.js',
            'waves.js',
            'jquery.dataTables.js',
            'dataTables.bootstrap.js',
            'dataTables.buttons.min.js',
            'buttons.flash.min.js',
            'jszip.min.js',
            'pdfmake.min.js',
            'vfs_fonts.js',
            'buttons.html5.min.js',
            'buttons.print.min.js',
            'admin.js',
            'jquery-datatable.js',
            'demo.js'
            
        );

        echo "\n\n\t";
        foreach($array_js as $val)
            echo js_asset('', $val);
    ?>

    <script type="text/javascript">
        function save()
        {
            if ($('#input_domain').val() == '') {
                alert('Domain tidak boleh kosong!')
            }else{
                $('#btnSave').text('saving...'); //change button text
                $('#btnSave').attr('disabled',true); //set button disable 

                url = "<?php echo base_url()?>member/submit_form";

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
    </script>
</body>

</html>
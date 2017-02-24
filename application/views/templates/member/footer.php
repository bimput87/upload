<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');   ?>
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
            'demo.js',
            'app.min.js',
            'fastclick.js',
            'jQuery.print.js'
            
        );

        echo "\n\n\t";
        foreach($array_js as $val)
            echo js_asset('', $val);

        if ($this->uri->segment(2) == 'invoice') {
            ?>
            <script type="text/javascript">
                function print() {
                    $('#print').print({
                        addGlobalStyles : true,
                        stylesheet : true,
                        rejectWindow : true,
                        noPrintSelector : ".btn btn-default, .no-print",
                        iframe : true,
                        append : null,
                        prepend : null  
                    })
                }
            </script>
            <?php
        }

        if ($this->uri->segment(2) == 'profile') {
            ?>
            <script type="text/javascript">
                setTimeout(function() {
                    $('.alert').fadeOut(1000)
                    },
                    1000
                )
            </script>

            <?php
        }

 // ^[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(\/.*)?$|i
        if ($this->uri->segment(1) == 'member') {
            ?>
        <script type="text/javascript">
           
                $('#myModal').on('shown.bs.modal', function () {
                    $('#input_domain').focus()
                })

                $('#myModal').on('hide.bs.modal', function () {
                    $('#input_domain').val('')
                })
            </script>
            <script type="text/javascript">
                function formValidation() {
                    if ($('#input_domain').val() == '') {
                        alert('domain tidak boleh kosong')
                        return false
                    }else{
                        var hasil = CheckIsValidDomain($('#input_domain').val())
                        if (hasil != null) {
                            alert('Alhamdulillah sukses ma !')
                            return true
                        } else {
                            // alert('Gagal maneh :( !')
                            setTimeout(function() {
                                $('.error').html('<div class="alert bg-red">domain incorrect</div>').fadeOut(4000)
                                },
                                300
                            )
                            return false
                        }
                    }
                }

                function CheckIsValidDomain(domain) { 
                    var re = new RegExp(/^((?:(?:(?:\w[\.\-\+]?)*)\w)+)((?:(?:(?:\w[\.\-\+]?){0,62})\w)+)\.(\w{2,6})$/); 
                    return domain.match(re);
                }

            </script>
            <?php
        }
    ?>
</body>

</html>
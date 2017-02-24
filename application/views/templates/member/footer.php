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
                    $('.alert').fadeOut(1000);
                    },
                    1000
                );
            </script>
            <?php
        }
    ?>
</body>

</html>
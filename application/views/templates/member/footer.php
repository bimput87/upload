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
                // function print() {
                    // var prtContent = document.getElementById("print");
                    // var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
                    // WinPrint.document.write(prtContent.innerHTML);
                    // WinPrint.document.close();
                    // WinPrint.focus();
                    // WinPrint.print();
                    // WinPrint.close();
                    $('#print').print({
                        addGlobalStyles : true,
                        stylesheet : true,
                        rejectWindow : true,
                        noPrintSelector : ".btn btn-default, .no-print",
                        iframe : true,
                        append : null,
                        prepend : null  
                    })
                // }
            </script>
            <?php
        }
    ?>
</body>

</html>
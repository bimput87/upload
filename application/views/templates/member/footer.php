    <?php  
        $array_js = array(
            'jquery-2.2.3.min.js',
            'bootstrap.min.js',
            'bootstrap-select.js',
            'jquery.slimscroll.js',
            'waves.js',
            'jquery.countTo.js',
            'raphael.min.js',
            'morris.js',
            'Chart.bundle.js',
            'jquery.flot.js',
            'jquery.flot.resize.js',
            'jquery.flot.pie.js',
            'jquery.flot.categories.js',
            'jquery.flot.time.js',
            'jquery.sparkline.js',
            'admin.js',
            'index.js',
            'demo.js'
        );

        echo "\n\n\t";
        foreach($array_js as $val)
            echo js_asset('', $val);
    ?>
    

</body>

</html>
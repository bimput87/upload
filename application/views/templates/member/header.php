<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?php echo $title ?></title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo site_url() ?>favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <?php  
        $array_css = array(
            'bootstrap.min.css',
            'waves.css',
            'morris.css',
            'animate.css',
            'style.css',
            'theme-red.min.css',
            'dataTables.bootstrap.css'
        );

        echo "\t\n";

        foreach($array_css as $val)
            echo css_asset('', $val);
    ?>
    
</head>

<body class="theme-red">

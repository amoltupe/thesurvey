<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="The complete Survey">
        <meta name="author" content="The complete Survey">

        <title><?php echo isset($page_title) ? PAGE_TITLE . ' : ' . $page_title : PAGE_TITLE; ?></title>
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo BASE_URL; ?>bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

 
        <!-- Custom CSS -->
        <link href="<?php echo BASE_URL; ?>dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
<style type="text/css">
input[type=checkbox], input[type=radio] {
    margin: 3px 10px 10px 1px;
    
    line-height: normal;
}

#page-wrapper{
    margin: 0px !important;
}
</style>
    </head>


    <body>

        <div id="wrapper" >

            <?php
                if (strtoupper($this->uri->segment(2)) !== 'LOGIN') { ?>
                    <div id="page-wrapper">
                <?php } ?>
                <br>
                <?php 
                    if( $sussessMsg = $this->session->flashdata(FLASH_SUCCESS)){
                ?>
                    <div class="alert alert-success alert-dismissable auto-close-area" style="text-align: center;">
                        <button aria-hidden="true" data-dismiss="alert" class="close auto-close-btn" type="button">×</button>
                        <?php echo $sussessMsg;?>
                    </div>
                    <?php exit;} if( $errorMsg = $this->session->flashdata(FLASH_ERROR)){?>
                    <div class="alert alert-danger alert-dismissable auto-close-area" style="text-align: center;">
                        <button aria-hidden="true" data-dismiss="alert" class="close auto-close-btn" type="button">×</button>
                        <?php echo $errorMsg;?>
                    </div>
                <?php }?>
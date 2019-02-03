<head>

    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo __($this->fetch('title')); ?>
    </title>
    <?php
    echo $this->Html->meta('icon');
    //CSS
    echo $this->Html->css(array("bootstrap.min",
        'bootstrap-select',
        "https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css",
        "http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css",
        "/plugins/datepicker/datepicker3",
        "/plugins/datepicker/bootstrap-datetimepicker.min",
        "/plugins/daterangepicker/daterangepicker-bs3",
        "morris/morris.css",
        "custom.css",
        "/plugins/auto-complete/token-input",
        "/plugins/auto-complete/token-input-facebook",
        "jvectormap/jquery-jvectormap-1.2.2",
        "AdminLTE.min",
        "skins/_all-skins.min.css",
        "highlight",
        "main",
        "bootstrap-switch.min"));
    echo $this->fetch('script');
    ?>
    <?php echo $this->Html->script('jQuery-2.1.3.min'); ?>
</head>
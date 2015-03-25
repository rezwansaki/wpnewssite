<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php bloginfo('name'); ?></title>

        <!-- Bootstrap -->
        <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-2.1.1.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
        
        <script src="<?php echo get_template_directory_uri(); ?>/comments.css"></script>

        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>"> <!-- style.css file -->


        <?php wp_head(); ?>

    </head>

    <body>


        <div class="container" id="main_container">

            <div class="row" id="topbar">
                <div class="col-md-4">
                    <a href="<?php bloginfo('home'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt=""></a>
                </div>

                <div class="col-md-5" id="menu">
                    <!-- top menu -->
                    
                        <?php

                        $args = array(
                            'theme_location' => 'top-bar-top',
                        'depth'          => 2,
                        'container'      => false,
                        'menu_class'     => 'breadcrumb',
                        'walker'         => new Bootstrap_Walker_Nav_Menu()
                        );

                        wp_nav_menu($args);

                        ?>	
                    <!-- /top menu -->
                </div>

                <div class="col-md-3" id="search">
                    <!-- Search -->
                    
                    
                    
                    <!--<form class="navbar-form navbar-left" role="search">-->
                        <div class="form-group">
                           <form method="GET" action="<?php esc_url(bloginfo('home')); ?>">
                            <input name="s" type="text" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    <!--</form>-->
                    <!-- /Search -->
                </div>
            </div>

            <div class="row" id="navbar">
                <div class="col-md-12">
                    <!-- Navbar -->
                    <nav class="navbar navbar-inverse">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <?php

                                    $args = array(
                                    'theme_location' => 'top-bar',
                                    'depth'          => 2,
                                    'container'      => false,
                                    'menu_class'     => 'nav navbar-nav',
                                    'walker'         => new Bootstrap_Walker_Nav_Menu()
                                    );

                                    wp_nav_menu($args);

                                ?>	

                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                    </nav>
                    <!-- /Navbar -->
                </div>
            </div>
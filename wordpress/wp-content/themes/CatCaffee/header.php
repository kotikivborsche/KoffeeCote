<html lang="en"><head>
    <meta name="mailru-domain" content="QbzvWutreKZT6jy2">
    <meta name="msvalidate.01" content="B2A3A804815BA42F51EDDA9D2F82CA9B"> 
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content name="description">
    <meta content name="author">
    <!-- Favicons -->
    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:400,600,300,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700" rel="stylesheet" type="text/css">
    <?php wp_head();?>
    
    <style>
      /* стили на всякий случай */
        #home {background-image: url(<?= get_template_directory_uri();?>/images/header-bg.jpg);	}
        #homev2 {background-image: url(<?= get_template_directory_uri();?>/images/header-bg-single-one.jpg);	}
        #aboutus {background-image: url(<?= get_template_directory_uri();?>/images/aboutus-header.jpg);	}
        #menubg {background-image: url(<?= get_template_directory_uri();?>/images/menu-header.jpg);	}
        #servicesbg {background-image: url(<?= get_template_directory_uri();?>/images/services-header.jpg);	}
        #gallerybg {background-image: url(<?= get_template_directory_uri();?>/images/gallery-header.jpg);	}
        #eventsbg {background-image: url(<?= get_template_directory_uri();?>/images/events-header.jpg);	}
        #teambg {background-image: url(<?= get_template_directory_uri();?>/images/team-header.jpg);	}
        #contactbg {background-image: url(<?= get_template_directory_uri();?>/images/contact-header.jpg);	}
        section {
            overflow: hidden;
        }
    </style>
</head>

<body>
    <nav id="navigation-single" class="navbar navbar-default nav-justified navbar-fixed-top navbar-shrink">
  <div class="container">  
    <div class="navbar-header page-scroll">
      <button class="navbar-toggle" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" type="button"><span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
    </div>  
    <!-- карточка для кота -->
<?php include "includes/catForm.php" ?>
<!-- меню -->
    <?php
wp_nav_menu( [
                                'theme_location'  => '',
                                'menu'            => '',
                                'container'       => 'div',
                                'container_class' => 'collapse navbar-collapse',
                                'container_id'    => 'bs-example-navbar-collapse-1',
                                'menu_class'      => 'nav nav-justified',
                                'menu_id'         => '',
                                'echo'            => true,
                                'fallback_cb'     => 'wp_page_menu',
                                'before'          => '',
                                'after'           => '',
                                'link_before'     => '',
                                'link_after'      => '',
                                'items_wrap'      => '<ul class="nav nav-justified">%3$s</ul>',
                                'depth'           => 0,
                                'walker'          => '',
                            ] );
                    ?>
  </div>

</nav>
<!-- \меню -->

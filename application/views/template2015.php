<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <?php
        $this->load->library('takmoph_libraries');
        $this->load->driver('cache');
        //$this->load->library('encrypt');
        $this->load->model('newexpress_model');
        $this->load->model('banner_model');
        $this->load->model('menubar_model');

        $barmodel = new menubar_model();
        $style = $barmodel->get_style();
        $navbar = $barmodel->get_navbarmenu_all();
        $lib = new takmoph_libraries();
        ?>

        <link rel="shortcut icon" href="<?php echo base_url()?>upload_images/logo/<?php echo $style->logo ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="content-language" content="th" />
        <title><?php echo $style->webname_short ?> | <?php echo $style->webname_full ?></title>
        <meta name="description" content="<?php echo $style->webname_short ?>,<?php echo $style->webname_full ?>" />
        <meta name="keywords" content="<?php echo $style->webname_short ?>,<?php echo $style->webname_full ?>" />
        <meta name="robots" content="index, follow" />
        <meta name="author" content="">
        

        <style type="text/css">
            #nav-bar ul li a:active{ background: <?php echo $style->color_head ?>;}
            #nav-bar ul li a:after{ background: <?php echo $style->color_head ?>;}
            #nav-bar ul li a:hover{ background: <?php echo $style->color_head ?>;}
            #nav-bar ul li a:focus{ background: <?php echo $style->color_head ?>;}
        </style>
        <!-- New Themes -->
        <link href="<?php echo base_url() ?>themes/2016/css/system.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo base_url() ?>js/jquery-1.11.3.min.js" type="text/javascript"></script>

        <!-- Bootstrap 3-->
        <link href="<?php echo base_url() ?>themes/2016/css/bootstrap-flatly.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo base_url() ?>themes/2016/js/bootstrap.js" type="text/javascript"></script>
        <link href="<?php echo base_url() ?>themes/2016/css/half-slider.css" rel="stylesheet" type="text/css" />


        <!-- Icon aware-some -->
        <link href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />

        <!-- Jquery Library -->
        <script src="<?php echo base_url() ?>js/library/configweb.js" type="text/javascript"></script>

        <!-- Datatable -->

        <link rel="stylesheet" href="<?= base_url() ?>assets/DataTables-1.10.10/media/css/dataTables.bootstrap.css" type="text/css" media="all" />
        <script src="<?= base_url() ?>assets/DataTables-1.10.10/media/js/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/DataTables-1.10.10/media/js/dataTables.bootstrap.js" type="text/javascript"></script>


        <!-- Assets -->
        <link href="<?php echo base_url() ?>assets/card-css/card-css.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>css/hover.css" rel="stylesheet" type="text/css" />

        <!-- Jquery.Bxslide-->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery.bxslider/jquery.bxslider.css" media="screen">
        <script src="<?php echo base_url() ?>assets/jquery.bxslider/jquery.bxslider.js"></script>

        <!-- fancybox -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/fancyBox2.1.5/source/jquery.fancybox.css" media="screen">
        <script src="<?php echo base_url() ?>assets/fancyBox2.1.5/source/jquery.fancybox.js"></script>

        <!-- images hover effect -->
        <link href="<?php echo base_url() ?>themes/2016/css/images-hover-effect.css" rel="stylesheet" type="text/css" />

    </head>

    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="nav-bar"
             style=" background: <?php echo $style->color_navbar; ?>">
            <div class="alert alert-success" id="tab-sing-in"
                 style="background: <?php echo $style->color_head; ?>;">
                <div class="container" style="color: <?php echo $style->color_text ?>">
                    <?php echo $style->webname_full ?>
                    <a href="<?php echo site_url('users/login') ?>" class="pull-right"
                      style="color: <?php echo $style->color_text ?>;"><i class="fa fa-sign-in"></i> Sign In</a>
                </div>

            </div>

            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                    style=" background: <?php echo $style->color_head ?>; border:none;" id="hamberger">
                        <span class="sr-only">Toggle navigation</span>
                        <!--
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      -->
                      <font style="color:<?php echo $style->color_text ?>;"><i class="fa fa-bars"></i> Menu</font>
                    </button>
                    <a class="navbar-brand" href="#" style=" margin-top: 0px; padding-top: 5px;">
                        <img src="<?php echo base_url()?>upload_images/logo/<?php echo $style->logo ?>" style=" height: 52px;"/>
                        <!--
                        <img src="<?//php echo base_url() ?>images/logomoph.png" style=" height: 52px;"/>
                      -->
                    </a>
                    <a class="navbar-brand" href="#" style=" margin-top: 0px; color: <?php echo $style->color_text ?>;"><?php echo $style->webname_short ?></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="border:none;">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="<?php echo site_url() ?>" style="color: <?php echo $style->color_text ?>;"><i class="fa fa-home"></i> หน้าแรก</a>
                        </li>

                        <!-- GetMenuBar -->

                        <?php
                        foreach ($navbar->result() as $nb):
                            ?>
                            <?php if ($nb->type == '0') { ?>
                                <li>
                                  <a href="<?php echo site_url('site/page/'.$this->takmoph_libraries->encode($nb->id))?>"
                                  style=" color: <?php echo $style->color_text ?>;">
                                  <?php echo $nb->title ?></a>
                                  </li>
                            <?php } else { ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" style=" color: <?php echo $style->color_text ?>;"
                                       data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <?php echo $nb->title ?> <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" style=" background: <?php echo $style->color_navbar ?>;">

                                        <!--
                                            ########## Subnavbar ###########
                                        -->

                                        <?php
                                        $subnav = $barmodel->get_sub_navbarmenu($nb->id);
                                        foreach ($subnav->result() as $snSub):
                                            ?>
                                            <li>
                                                <a href="<?php echo site_url('site/page/'.$this->takmoph_libraries->encode($snSub->id))?>"
                                                   style="color: <?php echo $style->color_text ?>;">
                                                    <i class="fa fa-angle-right"></i>
                                                    <?php echo $snSub->title ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php endforeach; ?>
                        <!-- EndMenuNavbar -->
                    </ul><!--- /.nav navbar-nav pull-right-->
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>


        <nav class="navbar navbar-default" role="navigation" style=" margin: 0px;">
            <div class="alert alert-info" style="margin: 19px;">
                <div class="container">NAVBAR</div>
            </div>
        </nav>

        <!-- Half Page Image Background Carousel Header -->
        <header id="myCarousel" class="carousel slide">
            <!-- Indicators
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
            </ol>
            -->
            <!-- Wrapper for Slides -->
            <div class="carousel-inner">
                <?php
                $banner = new banner_model();
                $banners = $banner->get_banner();

                $n = 0;
                foreach ($banners->result() as $bn):
                    $n++;
                    if ($n == '1') {
                        $class = "item active";
                    } else {
                        $class = "item";
                    }
                    ?>
                    <div class="<?php echo $class; ?>">
                        <!-- Set the first background image using inline CSS below. -->
                        <div class="fill" style="background-image:url('<?php echo base_url() ?>images/images_slide/<?php echo $bn->banner ?>');"></div>
                        <div class="carousel-caption">
                            <h2></h2>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="icon-prev"></span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="icon-next"></span>
            </a>

        </header>

        <!--
            #### Slide Hot News ####
        -->
        <div class="alert" id="box-express">
            <div class="container">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <!-- Wrapper for slides -->

                    <div class="carousel-inner" role="listbox">
                        <?php
                        $express_model = new newexpress_model();
                        $newsexpress = $express_model->get_express();
                        $i = 0;
                        foreach ($newsexpress->result() as $ns):
                            $i++;
                            if ($i == 1) {
                                $class = "item active";
                            } else {
                                $class = "item";
                            }
                            ?>
                            <div class="<?php echo $class; ?>">
                                <div class="text-express" style="color: #ff0033;">
                                    <font style="color: #ff0033;"><i class="fa fa-fire"></i> ประกาศด่วน</font>
                                    <?php echo $this->tak->thaidate($ns->create_date); ?>
                                    <a href="<?php echo site_url('newexpress/view/' . $ns->id) ?>">
                                        <button type="button" class="btn btn-warning btn-xs">อ่าน ... <i class="fa fa-angle-double-right"></i></button></a>
                                    <br/>
                                    <?php echo $ns->title; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev" style=" background: none;">
                        <span class="fa fa-angle-left btn pull-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next" style=" background: none;">
                        <span class="fa fa-angle-right btn pull-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <div id="tooplate_content">
            <?php
            if ($detail == "") {
                $this->load->view($page . ".php");
            } else {
                $this->load->view($page . ".php", $detail);
            }
            ?>

        </div> <!-- end of content -->

        <!--########################### Footer ########################-->
        <nav class="navbar navbar-inverse" role="navigation" style=" margin: 0px; background: <?php echo $style->color_navbar; ?>" id="footer">
            <div class="container" style="color:<?php echo $style->color_text ?>;">
                <?php echo $style->footer ?>
                <hr style="border-top:solid 1px <?php echo $style->color_head ?>;"/>
                Copyright © 2015 - <?php echo date('Y')?> AsbWeb By Theassemblerthemes.
                
                <div id="counter" style=" float: right;">
                    จำนวนผู้เยี่ยมชม <span class="badge"><?php echo $this->counter_model->counter(); ?></span> คน
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-inverse" role="navigation" style=" margin: 0px; background:#333333; border-radius:0px;">
          <div class="container" style="padding-top:20px;">
            <div style="font-size:10px; color:<?php echo $style->color_text ?>; text-align:center;">
              &copy; Create By The Assembler Themes | Kimniyom | Mini CMS
              <a href="http://www.theassembler.net" target="_blank">www.theassembler.net</a>
            </div>
          </div>
        </nav>
        <!--########################### EndFooter #####################-->


        <!-- Script to Activate the Carousel -->
        <script>
            $('.carousel').carousel({
                interval: 5000 //changes the speed
            });
        </script>


    </body>
</html>

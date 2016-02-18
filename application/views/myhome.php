<style type="text/css">
    #box_new{ padding:0px 0px 0px 0px; background:#FFF;}
    h3{text-shadow: 0 1px 0 rgba(255, 255, 255, 0.4); color: #002166;}
</style>

<?php
$this->load->library("takmoph_libraries");
$this->load->model("menu_model");
$this->load->model('homepage_model');
$this->load->model('sub_homepage_model');
$this->load->model('menubar_model');
$this->load->model('photo_model');
$libraries = new takmoph_libraries();
$photoModel = new photo_model();
$style = $this->menubar_model->get_style();
?>

<div class="well" id="bg_gray">
    <div class="bottom-line"></div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style=" margin: 0px;">
                <h3><i class="fa fa-th-large"></i> เมนู</h3>
                <hr id="hr"/>
                <!--
                    #
                    #
                    # Link Menu
                    #
                    #
                -->

                <?php
                $menu = $this->tak->get_mas_menu();
                foreach ($menu->result() as $rs):
                    $menu_model = new menu_model();
                    //$color = $menu_model->get_color($rs->menu_color);

                    ?>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding:0px 5px 5px 0px;">
                        <?php
                        if ($rs->mas_status == '0') {
                            ?>
                            <a href="<?= site_url($rs->link . '/' . $rs->admin_menu_id . '/' . $rs->mas_menu) ?>" style="text-decoration: none;">

                                <div id="submenu" class="btn btn-block hvr-trim" style="background:<?php echo $rs->bgcolor ?>;color:<?php echo $rs->textcolor ?>; border-radius:0px;">
                                    <div id="submenu_img"><img src="<?= base_url() ?>icon_menu/<?= $rs->menu_icon ?>" style="height:32px;"/></div>
                                    <center>
                                        <div class="text-menu"><?= $rs->mas_menu ?></div>
                                    </center>
                                </div>
                            </a>

                            <!-- ลิงค์ ข้างนอก -->
                        <?php } else if ($rs->mas_status == '2') {
                            ?>

                            <a href="<?php echo $rs->link_out; ?>" target="_blank" style=" text-decoration: none;">
                                <div id="submenu" class="btn btn-block hvr-trim" style="background:<?php echo $rs->bgcolor ?>;color:<?php echo $rs->textcolor ?>; border-radius:0px;">
                                    <div id="submenu_img"><img src="<?= base_url() ?>icon_menu/<?= $rs->menu_icon ?>" style="height:32px;"/></div>
                                    <center>
                                        <div class="text-menu"> <?= $rs->mas_menu ?></div>
                                    </center>
                                </div></a>

                            <!-- Droupdown -->
                            <?php
                        } else {
                            ?>

                            <a href="<?php echo site_url('menu/submenu/' . $rs->id); ?>" style=" text-decoration: none;">
                                <div id="submenu" class="btn btn-block hvr-trim" style="background:<?php echo $rs->bgcolor ?>;color:<?php echo $rs->textcolor ?>; border-radius:0px;">
                                    <div id="submenu_img"><img src="<?= base_url() ?>icon_menu/<?= $rs->menu_icon ?>" style="height:32px;"/></div>
                                    <center>
                                        <div class="text-menu"> <?= $rs->mas_menu ?></div>
                                    </center>
                                </div></a>
                        <?php } ?>

                    </div>

                <?php endforeach; ?>


                <!-- #######################################
                                                    Menu Down Load
                ########################################-->

                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding:0px 5px 5px 0px;">
                    <a href="<?php echo site_url('formdownload'); ?>" style="text-decoration:">
                        <div id="submenu" class="btn btn-info btn-block hvr-trim" style="border-radius:0px;">
                            <div id="submenu_img"><img src="<?= base_url() ?>icon_menu/folder-icon.png" style="height:32px;"/></div>
                            <center>
                                <div class="text-menu"> แบบฟอร์มต่าง ๆ </div>
                            </center>
                        </div></a>
                </div>


            </div><!-- End Menu Group -->
            <!-- #######################################
                                                END MENU GROUP
                ########################################-->

            <!-- ######################################
                                                    ข่าวล่าสุด
            ##########################################-->

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <h3><i class="fa fa-newspaper-o"></i> ข่าวล่าสุด</h3>
                <hr id="hr"/>
                <!-- Slide News -->
                <?php
                $i = 0;
                $news = $this->news->get_news_limit();
                foreach ($news->result() as $new):
                    $i++;
                    ?>
                    <div class="font_news">
                        <a href="<?php echo site_url('news/view/' . $new->id) ?>">
                            <div class="media hvr-bounce-to-right" id="box-lastnews" style=" width: 100%; margin-bottom: 10px;">
                                <span  class="pull-left">
                                  <?php if($new->images != ''){?>
                                    <img src="<?php echo base_url() ?>upload_images/news/<?php echo $new->images; ?>" class="img-responsive img_news" style="max-width: 120px;"/>
                                  <?php } else { ?>
                                    <img src="<?php echo base_url() ?>images/News-Mic-iPhone-icon.jpg" class="img-responsive img_news" style="max-width: 90px;"/>
                                  <?php } ?>
                                </span>
                                <div clas="media-body" style=" padding: 10px;">
                                    <?php echo $new->titel; ?>
                                    <br/>
                                    <font class="pull-right" style=" font-size: 12px;">
                                    <?php echo $libraries->thaidate($new->date); ?>
                                    </font>
                                </div>
                            </div>
                        </a>
                    </div>

                <?php endforeach; ?>
                <div class="row" style=" margin-bottom: 20px; margin-top: 10px;">
                    <a href="<?php echo site_url('news') ?>" style=" position: absolute; right: 15px;">
                        <button type="button" class="btn btn-default btn-sm" style=" margin-right: 0px;">ข่าวทั้งหมด <i class="fa fa-arrow-circle-o-right"></i></button>
                    </a>
                </div>
                <!-- EndSlide News -->
            </div><!-- End Col -->

        </div><!-- End Row -->
    </div><!-- End container -->
</div> <!-- End Well -->

<div class="bottom-line"></div>


<!--
 ########### HomePage ################
-->
<div class="box_homepage">
  <div class="container">
    <div id="homepage"></div>
  </div>
</div>

<!--
  ####### Album #####
-->

<div class="alert" id="bg_gray" style="width:100%; border-radius:0px; margin-bottom:0px;">
  <div class="container" style=" padding-left:25px;">
    <h3><i class="fa fa-file-image-o"></i> รูปภาพ / กิจกรรม</h3>
    <hr id="hr"/>
    <div class="slider5" style="margin-bottom:0px; padding-bottom:0px;">
      <?php $photo = $photoModel->album_limit(10);
      foreach ($photo->result() as $albums):
        $firstAlbum = $photoModel->get_first_album($albums->id);
        ?>

        <a href="<?php echo site_url('photo/gallery/'.$albums->id)?>" class="hover14">
        <div class="slide">
          <div class="container-card" style="height:160px; text-align: center; box-shadow:none; margin-bottom:0px;">
            <figure>
            <div class="img-wrapper">
                  <img src="<?php echo base_url() ?>upload_images/photo/<?php echo $firstAlbum ?>" class="img-responsive" style="height:160px;" title="<?php echo $albums->title ?>"/>
            </div>
            </figure>
          </div>
        </div>
      </a>
    <?php endforeach; ?>
    </div>
    <center><br/>
      <a href="<?php echo site_url('photo/page')?>">
      <button type="button" class="btn btn-info btn-sm">ดูทั้งหมด ...</button></a>
    </center>
  </div>
</div>


<!-- ระบบงานต่าง ๆ id="bg_gray"-->
<div class="well" id="box-menu-system"
style="background:<?php echo $style->color_head ?>; border-radius:0px;">
    <div class="bottom-line"></div>
    <div style="margin-top: 0px;">
        <div class="container" style=" margin-bottom: 30px;">
            <h3 style="color:<?php echo $style->color_text ?>; text-shadow:none;"><i class="fa fa-th"></i> ระบบงาน</h3>
            <hr id="hr" style="border:<?php echo $style->color_text ?> solid 2px;"/>
            <div class="row">

                <!-- Menu Program -->
                <?php
                $menu_system = $this->tak->get_menu_system();
                foreach ($menu_system->result() as $mm):
                    ?>
                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                        <a href="<?= $mm->link ?>" target="_blank" style=" text-decoration: none;">
                            <div class="hvr-grow" style=" width: 100%;">
                                <div class="container-card" style="max-height: 150px; text-align: center;" id="menu-hover">
                                    <div class="img-wrapper">
                                        <img src="<?php echo base_url() ?>icon_menu/<?php echo $mm->system_images ?>" class="img-responsive" style="height:100px;"/>
                                    </div>
                                    <p class="detail" style=" margin: 0px; padding: 2px; font-weight: bold; padding-top: 10px;">
                                        <?php echo $mm->system_title ?><br/>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    loadhomepage();
    $(document).ready(function () {
        var width = $(window).width();
        if (width < 768) {
            $(".img_news").css("width", "100px");
            $(".font_news").css("font-size", "12px");
        }

        /*
        $('.slider5').bxSlider({
            auto: true,
            minSlides: 1,
            pause: 4000,
            moveSlides: 1,
            maxSlides: 4,
            slideWidth: 260,
            slideMargin: 13,
            touchEnabled: true,
            pager: false,
            controls: false,
            captions: true,
            autoHover: true
        });
        */

    });

    function loadhomepage() {
        var url = "<?php echo site_url('homepage/index') ?>";
        var data = {a:1};
        $.post(url,data,function(success){
            $("#homepage").html(success);
        });

    }

    $(document).ready(function(){
      var size = $(window).width();
      if(size >= 768){
        $('.slider5').bxSlider({
          slideWidth: 300,
          minSlides: 4,
          maxSlides: 4,
          moveSlides: 4,
          slideMargin: 10,
          captions: true,
          auto: true,
          touchEnabled: true,
          pager: false
        });
      } else {
        $('.slider5').bxSlider({
          slideWidth: 300,
          minSlides: 3,
          maxSlides: 3,
          moveSlides: 3,
          slideMargin: 10,
          captions: true,
          auto: true,
          touchEnabled: true,
          pager: false
        });
      }
    });

</script>

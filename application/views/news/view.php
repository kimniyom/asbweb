<style type="text/css">
    #im-resize{ width: 85px; height: 48px; margin-bottom: 5px;}
</style>

<body>
  <script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.5&appId=1637139006560611";
		fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>

<div class="container">

    <?php
    $this->load->library('takmoph_libraries');
    $model = new takmoph_libraries();

    $list = array(
        array('url' => 'news', 'label' => 'ข่าว'),
            //array('url' => '', 'label' => 'menu2')
    );

    $active = $head;
    ?>
    <div class="row" style=" margin: 0px; padding: 0px;">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="padding-left: 0px;">
            <h3 id="head_submenu"><i class="fa fa-newspaper-o"></i> <?php echo $head ?></h3>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="padding-right: 0px;">
            <?php echo $model->breadcrumb($list, $active); ?>
        </div>
    </div>

    <hr id="hr"/>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
            <i class="fa fa-eye text-primary"></i> อ่าน : <?php echo $news->views ?>
            <i class="fa fa-newspaper-o text-danger"></i> <?php echo $this->tak->thaidate($news->date) ?>

            <!-- Shaee FaceBook -->
            <?php $shareUrl = current_url();?>
        		<div class="fb-share-button" data-href="<?php echo $shareUrl ?>" data-layout="button_count"></div>

            <div style="font-size:18px; border-radius: 0px; color: #E13300; padding-bottom: 10px; margin-bottom: 10px;">
                :: เรื่อง <?php echo $news->titel ?>
            </div>
            <?php if ($images_first != "") { ?>
                <center><img src="<?= base_url() ?>upload_images/news/<?= $images_first ?>" class="img-polaroid img-responsive" /></center><br />
            <?php } ?>
            <?php echo $news->detail ?>

            <!-- ##################
                Images News
            ####################-->
            <?php if ($images_first != "") : ?>
                <div class="row">
                    <div style="width:100%; height:10px; border-bottom:#666 solid 1px; margin:5px 0px;"></div>
                    <?php foreach ($images->result() as $rs): ?>
                        <div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
                            <a href="<?php echo base_url() ?>upload_images/news/<?= $rs->images ?>" class="fancybox" rel="ligthbox">
                                <div class="container-card" style="max-height: 100px;">
                                    <div class="img-wrapper">

                                        <img src="<?php echo base_url() ?>upload_images/news/<?= $rs->images ?>" class="img-responsive" style="height:100px;"/>

                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="alert alert-success" style=" text-align:right; border-radius: 0px;">
                <i class="fa fa-user text-warning"></i> โดย : <?php echo $news->name . ' ' . $news->lname ?>
                <i class="fa fa-newspaper-o text-danger"></i> <?php echo $this->tak->thaidate($news->date) ?>
            </div>

            <!--
                ############# ข่าว HOT ############
            -->

            <div class="row">

                <h4 id="head_submenu" style=" color: #ff0000; font-weight: bold; margin-left: 15px;"><i class="fa fa-fire"></i> ข่าว HOT</h4>
                <hr/>
                <?php
                $i = 0;
                foreach ($hot->result() as $hots): $i++;
                    $images = $this->news->get_first_images_news($hots->id);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="container-card" style=" max-height: 200px;">
                            <div class="img-wrapper">
                                <?php if (!empty($images)) { ?>
                                    <img src="<?php echo base_url() ?>upload_images/news/<?php echo $images; ?>" class="img-responsive img-polaroid" style="height:100px;"/>
                                <?php } else { ?>
                                  <center>
                                    <img src="<?php echo base_url() ?>images/News-Mic-iPhone-icon.jpg" class="img-responsive img_news" style="height:100px;"/>
                                  </center>
                                <?php } ?>
                            </div>
                            <p class="detail">
                                <?php
                                //$this->session->userdata('width');

                                $text = strlen($hots->titel);
                                if ($text > 160) {
                                    //echo iconv_substr($news->titel,'0','100')."...";
                                    if ($this->session->userdata('width') > 1000 || $this->session->userdata('width') <= 768) {
                                        print mb_substr($hots->titel, 0, 40, 'UTF-8') . "...";
                                    } else {
                                        echo $hots->titel;
                                    }
                                } else {
                                    echo $hots->titel;
                                }
                                ?><br/>
                            </p>
                            <a href="<?php echo site_url('news/view/' . $hots->id) ?>">
                                <button type="button" class="btn btn-danger btn-sm" id="btn-card"> อ่านข่าว ...</button>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
                
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
            <h4 id="head_submenu" style=" color: #3399ff; font-weight: bold; margin-left: 15px;"><i class="fa fa-newspaper-o"></i> ข่าวล่าสุด</h4>
            <hr/>
            <?php
            $i = 0;
            foreach ($near->result() as $news): $i++;
                $images = $this->news->get_first_images_news($news->id);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-12">
                    <div class="container-card" style=" max-height: 200px;">
                        <div class="img-wrapper">
                            <?php if (!empty($images)) { ?>
                                <img src="<?php echo base_url() ?>upload_images/news/<?php echo $images; ?>" class="img-responsive img-polaroid" style="height:100px;"/>
                            <?php } else { ?>
                              <center>
                                <img src="<?php echo base_url() ?>images/News-Mic-iPhone-icon.jpg" class="img-responsive img_news" style="height:100px;"/>
                              </center>
                            <?php } ?>
                        </div>
                        <p class="detail">
                            <?php
                            $this->session->userdata('width');

                            $text = strlen($news->titel);
                            if ($text > 160) {
                                //echo iconv_substr($news->titel,'0','100')."...";
                                if ($this->session->userdata('width') > 1000 || $this->session->userdata('width') <= 768) {
                                    print mb_substr($news->titel, 0, 40, 'UTF-8') . "...";
                                } else {
                                    echo $news->titel;
                                }
                            } else {
                                echo $news->titel;
                            }
                            ?><br/>
                        </p>
                        <a href="<?php echo site_url('news/view/' . $news->id) ?>">
                            <button type="button" class="btn btn-primary btn-sm" id="btn-card"> อ่านข่าว ...</button>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        var width = $(window).width();
        var url = "<?php echo site_url('site/set_desktop') ?>";
        var data = {width: width};

        $.post(url, data, function (success) {
        });
    });

    $(document).ready(function () {
        //FANCYBOX
        //https://github.com/fancyapps/fancyBox
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    });
</script>
</body>

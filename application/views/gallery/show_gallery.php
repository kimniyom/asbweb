<?php $shareUrl = current_url(); ?>

<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.5&appId=1637139006560611";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<div class="container" id="album-views">
    <?php
    $this->load->library('takmoph_libraries');
    $this->load->model('photo_model', 'photo');
    $model = new takmoph_libraries();

    $list = array(
        array('url' => 'photo/page', 'label' => 'อัลบั้ม / กิจกรรม'),
            //array('url' => '', 'label' => 'menu2')
    );

    $text = strlen($head);
    if ($text > 70) {
        //echo iconv_substr($news->titel,'0','100')."...";
        $active = mb_substr($album->title, 0, 30, 'UTF-8') . "...";
    } else {
        $active = $head;
    }

    //echo $model->breadcrumb($list, $active);
    ?>

    <div class="row" style=" margin: 0px; padding: 0px;">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="padding-left: 0px;">
            <h3 id="head_submenu">
                <img src="<?php echo base_url() ?>images/Album-icon.png" style="width:48px;"/> <?php echo $active ?>
            </h3>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="padding-right: 0px;">
            <?php echo $model->breadcrumb($list, $active); ?>
        </div>
    </div>
    <hr id="hr"/>

    <i class="fa fa-eye text-warning"></i> อ่าน
    <span class="badge"><?php echo $this->photo->read_album($album->id); ?></span>
    <!-- Shaee FaceBook -->
    <div class="fb-share-button" data-href="<?php echo $shareUrl ?>" data-layout="button_count"></div>
    <center>
        <h4><?php echo $head; ?></h4>
        <p style="color:#999999;">รายละเอียด : <?php
            if (!empty($album->detail)) {
                echo $album->detail;
            } else {
                echo "-";
            }
            ?></p>
        <hr/>
    </center>
    <div class="row">
        <?php
        $i = 0;
        foreach ($gallery->result() as $rs): $i++;
            ?>
            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                <a href="<?php echo base_url() ?>upload_images/photo/<?php echo $rs->images; ?>"
                   class="fancybox hvr-float-shadow" rel="ligthbox">
                    <div class="container-card" style="height:200px;">
                        <div class="img-wrapper">
                            <?php if (!empty($rs->images)) { ?>
                                <img src="<?php echo base_url() ?>upload_images/photo/<?php echo $rs->images; ?>" class="img-responsive img-polaroid" style="height:200px;"/>
                            <?php } else { ?>
                                <center>
                                    <img src="<?php echo base_url() ?>upload_images/photo/no-sign_1334604348.png" class="img-responsive img_news"/>
                                </center>
                            <?php } ?>
                        </div>
                    </div></a>
            </div>
        <?php endforeach; ?>
    </div>
    <hr/>
    <div class="pull-right">
        <i class="fa fa-calendar-o"></i> <?php echo $model->thaidate($album->create_date); ?>
        <i class="fa fa-user"></i> <?php echo $album->name . " " . $album->lname; ?>
    </div>
</div>
<br/>

<script type="text/javascript">
    $(document).ready(function () {
        //FANCYBOX
        //https://github.com/fancyapps/fancyBox
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    });
</script>


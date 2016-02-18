
<div class="container">
    <?php
    $this->load->library('takmoph_libraries');
    $model = new takmoph_libraries();

    $list = array(
        //array('url' => 'backend/homepage', 'label' => 'ตัวอย่าง'),
        array('url' => 'homepage/all/' . $this->takmoph_libraries->encode($result->homepage_id), 'label' => $result->title_name)
    );

    $active = $head;
    ?>

    <div class="row" style=" margin: 0px; padding: 0px;">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="padding-left: 0px;">
            <h3 id="head_submenu">
                <i class="fa fa-file-text-o fa-2x text-warning"></i>
                <?php
                $text = strlen($result->title);
                if ($text > 70) {
                    //echo iconv_substr($news->titel,'0','100')."...";
                    print mb_substr($result->title, 0, 30, 'UTF-8') . "...";
                } else {
                    echo $result->title;
                }
                ?>
            </h3>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="padding-right: 0px;">
            <?php echo $model->breadcrumb($list, $active); ?>
        </div>
    </div>

    <hr id="hr"/>
    <i class="fa fa-clock-o text-warning"></i> <?php echo $model->thaidate($result->create_date) ?>
    <!-- Shaee FaceBook -->
    <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Loader" type="text/javascript"></script>
    <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
    <a name="fb_share" type="button_count" href="http://www.facebook.com/sharer.php">Share</a>

    <h4 style=" color: #0066cc;">
        เรื่อง :: <?php echo $result->title ?>
    </h4>
    <br/>

    <div class="detail_page">
        <?php echo $result->detail ?>
    </div>
    <br/>

    <hr/>
    <div class="pull-right">
        <i class="fa fa-clock-o text-warning"></i> <?php echo $model->thaidate($result->create_date) ?>
    </div>
    <br/><br/>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        var style = {"height": "auto"};
        $(".detail_page img").addClass('img-responsive');
        $(".detail_page img").css(style);
    });
</script>

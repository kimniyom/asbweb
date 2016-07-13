<style type="text/css">
    .box-all{
        height: 350px;
    }
</style>
<?php
$this->load->library('takmoph_libraries');
$model = new takmoph_libraries();
$groupnewsModel = new groupnews_model();
/*
  $list = array(
  array('url' => '', 'label' => 'menu1'),
  array('url' => '', 'label' => 'menu2')
  );
 * 
 */

$active = $head;
$list = "";
//echo $model->breadcrumb($list, $active);
?>
<div class="row" style=" margin: 0px; padding: 5px;">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="padding-left: 0px;">
        <h3 id="head_submenu"><i class="fa fa-newspaper-o"></i> <?php echo $head ?></h3>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="padding-right: 0px;">
        <?php echo $model->breadcrumb($list, $active); ?>
    </div>
</div>
<hr id="hr"/>
<div class="row">
    <div class="col-sm-12 col-md-3 col-lg-3">
        <div class="list-group">
            <div class="list-group-item active">
                ประเภทข่าว
            </div>
            <?php
            $groupnews = $groupnewsModel->get_groypnews_active();
            foreach ($groupnews->result() as $rs):
                ?>
                <a href="<?php echo site_url('news/newsall/' . $rs->id) ?>" class="list-group-item"><?php echo $rs->groupname ?></a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="col-sm-12 col-md-9 col-lg-9">
        <?php
        $i = 0;
        foreach ($new->result() as $news): $i++;
            $images = $this->news->get_first_images_news($news->id);
            ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="container-card set-views-card box-all">
                    <div class="img-wrapper">
                        <?php if (!empty($images)) { ?>
                            <img src="<?php echo base_url() ?>upload_images/news/<?php echo $images; ?>" class="img-responsive img-polaroid img-news-all" style="height:200px;"/>
                        <?php } else { ?>
                            <center>
                                <img src="<?php echo base_url() ?>images/News-Mic-iPhone-icon.jpg" class="img-responsive img_news img-news-all"/>
                            </center>
                        <?php } ?>
                    </div>
                    <p class="detail" style=" color: #996600;">
                        <?php echo $news->titel ?><br/>
                        <font style=" font-size: 14px; color: #ff3300;" class="pull-right"><?php echo $model->thaidate($news->date) ?></font>
                    </p>
                    <a href="<?php echo site_url('news/view/' . $news->id . '/' . $group->id) ?>">
                        <button type="button" class="btn btn-primary btn-sm" id="btn-card"> อ่านข่าว ...</button>
                    </a>
                </div>
            </div>

        <?php endforeach; ?>
    </div>

</div>
<div style="text-align:center;">
    <?php echo $s_pagination ?>
</div>

<script type="text/javascript">
    $("#document").ready(function(){
       $("#side-left").hide();
       $("#side-right").removeClass('col-xs-12 col-sm-12 col-md-9 col-lg-9 BR');
       $("#side-right").addClass('col-md-12 col-lg-12');
    });
</script>

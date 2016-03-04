
    <?php
    $this->load->library('takmoph_libraries');
    $model = new takmoph_libraries();
    /*
      $list = array(
      array('url' => '', 'label' => 'menu1'),
      array('url' => '', 'label' => 'menu2')
      );
     *
     */
    $active = $head;
    $list = "";
    echo $model->breadcrumb($list, $active);
    ?>
    <h3 id="head_submenu"><i class="fa fa-newspaper-o"></i> <?php echo $head ?></h3>
    <hr id="hr"/>
    <div class="row">
        <?php
        $i = 0;
        foreach ($new->result() as $news): $i++;
            $images = $this->news->get_first_images_news($news->id);
            ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="container-card">
                    <div class="img-wrapper">
                        <?php if (!empty($images)) { ?>
                            <img src="<?php echo base_url() ?>upload_images/news/<?php echo $images; ?>" class="img-responsive img-polaroid" style="height:250px;"/>
                        <?php } else { ?>
                          <center>
                            <img src="<?php echo base_url() ?>images/News-Mic-iPhone-icon.jpg" class="img-responsive img_news"/>
                          </center>
                        <?php } ?>
                    </div>
                    <p class="detail">
                        <?php echo $news->titel ?><br/>
                        <font style=" font-size: 12px;" class="pull-right"><?php echo $model->thaidate($news->date) ?></font>
                    </p>
                    <a href="<?php echo site_url('news/view/' . $news->id) ?>">
                        <button type="button" class="btn btn-primary btn-sm" id="btn-card"> อ่านข่าว ...</button>
                    </a>
                </div>
            </div>

        <?php endforeach; ?>

    </div>
    <div style="text-align:center;">
      <?php echo $s_pagination ?>
    </div>

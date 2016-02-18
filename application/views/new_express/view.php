<div class="container">
    <?php
    $this->load->library('takmoph_libraries');
    $lib = new takmoph_libraries();

    $list = array(
        array('url' => 'newexpress', 'label' => 'ประกาศ'),
            //array('url' => '', 'label' => 'menu2')
    );

   
    $active = "ด่วน";
//$list = "";
    //echo $lib->breadcrumb($list, $active);
    ?>
    <div class="row" style=" margin: 0px; padding: 0px;">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="padding-left: 0px;">
            <h3 id="head_submenu"><i class="fa fa-fire text-info"></i> ประกาศด่วน</h3>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="padding-right: 0px;">
            <?php echo $lib->breadcrumb($list, $active); ?>
        </div>
    </div>

    <hr id="hr"/>
    <h4>เรื่อง :: <?php echo $model->title; ?></h4><br/>
    <?php echo $model->detail ?>
    <hr/>
    <div class="pull-right" style=" margin-right: 15px;"><i class="fa fa-calendar"></i> <?php echo $model->create_date; ?></div>
    <br/><br/>

</div>
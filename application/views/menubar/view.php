
<?php
$this->load->library('takmoph_libraries');
$model = new takmoph_libraries();

/*
$list = array(
    //array('url' => 'backend/menubar', 'label' => 'MenuBar'),
        //array('url' => '', 'label' => 'menu2')
);
*/
$active = $head;
$list = "";
?>

<div class="container">
  <div class="row" style=" margin: 0px; padding: 0px;">
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="padding-left: 0px;">
          <h3 id="head_submenu"><i class="fa fa-building"></i> <?php echo $head ?></h3>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="padding-right: 0px;">
          <?php echo $model->breadcrumb($list, $active); ?>
      </div>
  </div>

  <hr id="hr"/>
  <?php echo $page->page ?>
</div>

<div class="container">

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
    ?>
    <div class="row" style=" margin: 0px; padding: 0px;">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="padding-left: 0px;">
            <h3 id="head_submenu"><img src="<?= base_url() ?>icon_menu/<?php echo $masmenu->icon ?>"> <?php echo $head ?></h3>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="padding-right: 0px;">
            <?php echo $model->breadcrumb($list, $active); ?>
        </div>
    </div>


    <hr id="hr"/>

    <table class="table table-hover table-bordered table-responsive" id="tb_submenu">
        <thead style=" display: none;">
            <tr>
                <th style=" display: none;">#</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($submenu->result() as $sub):
                $i ++;

                if ($sub->link != '') {
                    $link = site_url('menu/get_menu/' . $sub->link);
                    $target = "";
                    $typefile = "fa fa-link";
                    $text = "Page";
                } else {
                    $link = base_url() . "file_download/" . $sub->file;
                    $target = "target='_blank'";
                    $text = "Download";
                    $file = substr($sub->file, -3);
                    if ($file == "pdf") {
                        $typefile = "fa fa-file-pdf-o";
                    } else if ($file == "zip") {
                        $typefile = "fa fa-file-zip-o";
                    } else if ($file == "rar") {
                        $typefile = "fa fa-file-zip-o";
                    } else {
                        $typefile = "fa fa-file-o";
                    }
                }
                ?>
                <tr>
                    <td style=" display: none;"><?php echo $i; ?></td>
                    <td><i class="<?php echo $typefile ?> fa-2x text-warning"></i> 
                        <?= $sub->sub_name ?>
                        <a href="<?= $link ?>" <?= $target ?> class="pull-right">
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-download"></i> <?php echo $text; ?></button></a>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#tb_submenu").dataTable();
        });
    </script>
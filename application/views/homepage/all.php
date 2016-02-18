<div class="container">
    <?php
    $this->load->library('takmoph_libraries');
    $model = new takmoph_libraries();

    /*
      $list = array(
      array('url' => 'backend/homepage', 'label' => 'ตัวอย่าง'),
      //array('url' => '', 'label' => 'menu2')
      );
     *
     */

    $active = $head;
    $list = "";
    //echo $model->breadcrumb($list, $active);
    ?>

    <div class="row" style=" margin: 0px; padding: 0px;">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="padding-left: 0px;">
            <h3 id="head_submenu">
                <i class="fa fa-file-text-o fa-2x"></i>
                <?php
                $text = strlen($homepage->title_name);
                if ($text > 70) {
                    //echo iconv_substr($news->titel,'0','100')."...";
                    print mb_substr($homepage->title_name, 0, 30, 'UTF-8') . "...";
                } else {
                    echo $homepage->title_name;
                }
                ?>
            </h3>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="padding-right: 0px;">
            <?php echo $model->breadcrumb($list, $active); ?>
        </div>
    </div>

    <hr id="hr"/>

    <table class="table table-bordered table-hover" id="tb_subhome">
        <thead>
            <tr style=" display: none;">
                <th style="display: none;">#</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($result->result() as $rs):
                $i++;
                ?>
                <tr>
                    <td style="display: none;"><?php echo $i; ?></td>
                    <td>
                        <font style=" color: #ff0000;"><i class="fa fa-calendar"></i> <?php echo $model->thaidate($rs->create_date) ?> </font>
                        <?php echo $rs->title; ?>
                    </td>
                    <td style=" width: 10%; text-align: center;">
                        <a href="<?php echo site_url('homepage/view/' . $this->takmoph_libraries->encode($rs->id)) ?>">
                            <button class="btn btn-default btn-sm">รายละเอียด</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#tb_subhome").DataTable();
    });
</script>

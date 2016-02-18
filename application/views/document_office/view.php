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
            <h3 id="head_submenu"><i class="fa fa-file-text-o text-info"></i> <?php echo $head ?></h3>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="padding-right: 0px;">
            <?php echo $model->breadcrumb($list, $active); ?>
        </div>
    </div>


    <hr id="hr"/>

    <table class="table table-hover table-bordered table-responsive" id="tb_document" style=" color: #666666;">
        <thead style=" display: none;">
            <tr>
                <th style=" display: none;">#</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($document->result() as $sub):
                $i ++;
                ?>
                <tr>
                    <td style=" display: none;"><?php echo $i; ?></td>
                    <td><i class="fa fa-file-text-o fa-2x text-danger"></i> 
                        <?= $sub->DO_Title ?>
                    </td>
                    <td>
                        <a href="http://203.157.203.22/archives/docex_img.php?DO_Id=<?= $sub->DO_Id ?>" target="_blank" class="pull-right">
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-download"></i> เอกสาร</button></a>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#tb_document").dataTable();
        });
    </script>
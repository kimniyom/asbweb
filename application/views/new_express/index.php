   
<div class="container">
    <?php
    $this->load->library('takmoph_libraries');
    $lib = new takmoph_libraries();

    $list = array(
            //array('url' => 'newexpress', 'label' => 'ประกาศ'),
            //array('url' => '', 'label' => 'menu2')
    );


    $active = "ประกาศด่วน";
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

    <table class="table table-striped" id="tb_news_express">
        <thead>
            <tr>
                <th style=" display: none;">#</th>
                <th style=" display: none;"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($express->result() as $rs):
                $i++;
                ?>
                <tr>
                    <td style=" display: none;"><?php echo $i; ?></td>
                    <td>
                        <font style="color:red;">(<?php echo $rs->create_date ?>) </font>
                        <a href="<?php echo site_url('newexpress/view/'.$rs->id)?>" style=" text-decoration: none;"><?php echo $rs->title; ?></a> </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#tb_news_express").dataTable();
    });

</script>
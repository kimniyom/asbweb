<?php
$this->load->library('takmoph_libraries');

$model = new takmoph_libraries();
$homepage = new homepage_model();
$sub_homepage = new sub_homepage_model();
?>

<div class="row">
    <?php foreach ($mas_homepage->result() as $rs): ?>
        <div class="<?php echo $rs->style ?>">
            <?php
            if ($rs->box_color == "#FFFFFF") {
                $padding = "padding-left:0px; padding-right:0px;";
            } else {
                $padding = "";
            }
            ?>
            <div class="well well-sm"
                 style="border-radius:0px; background:<?php echo $rs->box_color ?>;
                 padding-bottom:20px;">
                <h3 style=" margin-bottom: 0px;margin-top:10px;color:<?php echo $rs->head_color ?>;">
                    <?php echo $rs->title_name ?>
                </h3>

                <hr style="border:<?php echo $rs->head_color ?> solid 2px; margin-top: 5px; margin-bottom: 5px;"/>

                <div class="list-group">
                    <?php
                    $subhomepage = $sub_homepage->get_subhomepage($rs->id, $rs->limit);
                    $i = 0;
                    foreach ($subhomepage->result() as $sm):
                        $i++;
                        if ($i == 1) {
                            $img_new = '<img src="' . base_url() . 'images/icon_new.gif"/>';
                        } else {
                            $img_new = "";
                        }
                        ?>
                        <a href="<?php echo site_url('homepage/view/' . $this->takmoph_libraries->encode($sm->id)) ?>" class="list-group-item" style="border-radius:0px;">
                            <font style="color:red; font-size: 12px;">
                            <i class="fa fa-calendar"></i>
                            <?php echo $model->thaidate($sm->create_date) ?>
                            </font>
                            <?php echo $sm->title ?> <?php echo $img_new; ?>
                        </a>
                    <?php endforeach; ?>
                    <?php if ($subhomepage->result()) { ?>
                        <a href="<?php echo site_url('homepage/all/' . $this->takmoph_libraries->encode($rs->id)) ?>">
                            <button type="button" class="btn btn-xs pull-right" style="margin-top: 5px; background:<?php echo $rs->head_color ?>; color:<?php echo $rs->box_color ?>;">ทั้งหมด ...<i class="fa fa-angle-double-right"></i></button></a>
                            <?php } ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

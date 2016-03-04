
<div class="row">
    <?php
    $i = 0;
    foreach ($bg->result() as $rs): $i++;
        ?>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <a class="hover14">
                <div class="container-card" style="height:200px;">
                    <figure>
                        <div class="img-wrapper">
                            <?php if (!empty($rs->background)) { ?>
                                <img src="<?php echo base_url() ?>upload_images/bg/<?php echo $rs->background; ?>" class="img-responsive img-polaroid" style="height:200px;"/>
                            <?php } else { ?>
                                <center>
                                    <img src="<?php echo base_url() ?>images/no-sign_1334604348.png" class="img-responsive img-polaroid" style="height:200px;"/>
                                </center>
                            <?php } ?>
                        </div>
                    </figure>
                    <div id="btn-card">
                        <?php if ($rs->active == '0') { ?>
                            <button type="button" class="btn btn-default btn-sm" 
                                    onclick="set_bg('<?php echo $rs->id ?>')">
                                <i class="fa fa-image text-success"></i> ใช้เป็นภาพพื้นหลัง</button>
                            <button type="button" class="btn btn-default btn-sm" onclick="delete_bg('<?php echo $rs->id ?>')">
                                <i class="fa fa-trash text-danger"></i> ลบ</button>
                        <?php } else { ?>
                            <div class="btn btn-danger disabled">รูปนี้ถูกใช้เป็นพื้นหลัง</div>
                        <?php } ?>
                    </div>
                </div>
            </a>
        </div>
<?php endforeach; ?>
</div>

<!--
  ####### Inser Update Delete ##########
-->


<script type="text/javascript">
    function delete_bg(id) {
        var r = confirm("คุณแน่ใจหรือไม่ ... ?");
        if (r == true) {
            var url = "<?php echo site_url('backend/background/delete') ?>";
            var id = id;
            var data = {id: id};
            $.post(url, data, function (success) {
                swal({title: "Success", text: "ลบข้อมูลแล้ว ...", type: "success",
                    showCancelButton: false,
                    loseOnConfirm: true,
                    showLoaderOnConfirm: false},
                        function () {
                            window.location.reload();
                        });
            });
        }
    }

    function set_bg(id) {
        var url = "<?php echo site_url('backend/background/set_bg') ?>";
        var id = id;
        var data = {id: id};
        $.post(url, data, function (success) {
            swal({title: "Success", text: "ตั้งค่าพื้นหลังสำเร็จ ...", type: "success",
                showCancelButton: false,
                loseOnConfirm: true,
                showLoaderOnConfirm: false},
                    function () {
                        window.location.reload();
                    });
        });
    }
</script>

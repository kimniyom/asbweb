<script type="text/javascript">
    $(document).ready(function () {
        $('#file_upload').uploadify({
            'buttonText': 'กรุณาเลือกรูปภาพ ...',
            'auto': true, //เปิดใช้การอัพโหลดแบบอัติโนมัติ
            'swf': '<?= base_url() ?>lib/images/uploadify.swf', //โฟเดอร์ที่เก็บไฟล์ปุ่มอัพโหลด
            'uploader': '<?= site_url('backend/banner/upload') ?>', //เมื่อ submit แล้วให้ action ไปที่ไฟล์ไหน
            'fileSizeLimit': '10MB', //อัพโหลดได้ครั้งละไม่เกิน 1024kb
            'width': '350',
            'height': '40',
            'fileTypeExts': '*.gif; *.jpg; *.png', //กำหนดชนิดของไฟล์ที่สามารถอัพโหลดได้
            'multi': true, //เปิดใช้งานการอัพโหลดแบบหลายไฟล์ในครั้งเดียว
            'queueSizeLimit': 1, //อัพโหลดได้ครั้งละ 5 ไฟล์
            'onUploadComplete': function (success) { //เมื่ออัพโหลดเสร็จแล้วให้เรียกใช้งาน function load()
                window.location.reload();
            }
        });
    });
</script>

<script type="text/javascript">
    function check_status(id, val) {
        var id = id;
        var status = val;
        var url = "<?= site_url('backend/banner/update_banner/') ?>";
        var data = {id: id, status: status};

        $.post(url, data,
                function (sucess) {
                    window.location.reload();
                }
        );//Endpost

    }
</script>

<?php
$this->load->library('takmoph_libraries');
$model = new takmoph_libraries();

$list = array(
    array('url' => 'takmoph_admin', 'label' => 'เมนูหลัก'),
        //array('url' => 'backend/form_download/get_mas_from', 'label' => 'แบบฟอร์ม'),
);

$active = "upload";
echo $model->breadcrumb_backend($list, $active);
?>

<h3><i class="fa fa-upload"></i> <?= $head ?></h3>

<hr/>

อัพโหลดได้ไม่เกินครั้งละ 10MB,<br/>
อัพโหลดได้ไม่เกินครั้งละ 1 ไฟล์ <br/>
แสดงผลได้ดีที่ขนาด 1280 x 370 px
<br /><br />
<form>
    <div id="queue"></div>
    <div style="width:350px;">
        <input id="file_upload" name="file_upload" type="file" multiple>
    </div>
</form><br /><br /><br />

<table width="100%" id="tb_banner" class="table table-striped">
    <thead>
        <tr>
            <th align="left">banner</th>
            <th>สถานะ</th>
            <th>ลบ</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($banner->result() as $rs):
            ?>
            <tr>
                <td><img src="<?= base_url() ?>images/images_slide/<?= $rs->banner ?>" class="img-responsive img-thumbnail" style=" max-height: 200px;"/></td>
                <td>
                    <?php if ($rs->status == '1') { ?>
                        แสดง <input type="radio" id="status_show" checked="checked" onclick="check_status('<?= $rs->id ?>', '0');"/>
                    <?php } else { ?>
                        ไม่แสดง <input type="radio" id="status_noshow" onclick="check_status('<?= $rs->id ?>', '1');"/>
                    <?php } ?>
                </td>
                <td>
                    <a href="<?= site_url('backend/banner/delete_banner/' . $rs->id . '/' . $rs->banner) ?>" class="btn btn-danger">
                        <i class="fa fa-trash-o"></i> ลบ
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
